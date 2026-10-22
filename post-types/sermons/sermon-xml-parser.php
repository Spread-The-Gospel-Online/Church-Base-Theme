<?php

class Sermon_Proccesser {

	const ITUNES_NS  = 'http://www.itunes.com/dtds/podcast-1.0.dtd';
	const DC_NS      = 'http://purl.org/dc/elements/1.1/';
	const CONTENT_NS = 'http://purl.org/rss/1.0/modules/content/';
	const MEDIA_NS   = 'http://search.yahoo.com/mrss/';

	public static function fetch_updates () {
		$rss_feed = self::fetch_feed();
		if ($rss_feed === false) {
			// fetch_feed() has already recorded the failure reason.
			return;
		}

		$sermons = self::convert_xml_to_object($rss_feed);
		if ($sermons === false) {
			// convert_xml_to_object() has already recorded the parse error.
			return;
		}

		$imported = self::save_new_sermons($sermons);
		$message = $imported > 0
			? "Sermon import ran successfully. {$imported} new sermon(s) imported."
			: 'Sermon import ran successfully. No new sermons found in the feed.';
		self::record_status(true, $message, $imported);
	}

	public static function save_new_sermons ($sermons) {
		if ($sermons === null || $sermons === false) {
			return 0;
		}

		$imported_count = 0;

		foreach ($sermons as $sermon) {
			$data = self::extract_sermon_data($sermon);

			// A title-less item can't form a slug and isn't a usable sermon.
			if ($data['title'] === '') {
				continue;
			}

			$slug = sanitize_title($data['title']);
			if (get_page_by_path($slug, OBJECT, 'sermons')) {
				continue;
			}

			$sermon_id = wp_insert_post(array(
				'post_title' => $data['title'],
				'post_name' => $slug,
				'post_content' => $data['content'],
				'post_type' => 'sermons',
				'post_date' => date('Y-m-d H:i:s', $data['timestamp']),
				'post_status' => 'publish'
			));
			if (!$sermon_id || is_wp_error($sermon_id)) {
				continue;
			}

			update_post_meta($sermon_id, 'link', $data['link']);
			update_post_meta($sermon_id, 'audio_link', $data['audio_url']);
			if ($data['alternative_url'] !== '') {
				update_post_meta($sermon_id, 'alternative_url', $data['alternative_url']);
			}
			self::set_sermon_cover_image($sermon_id, $data['image_url'], $data['image_alt']);

			if ($data['author'] !== '') {
				self::save_pastor_to_sermon($sermon_id, $data['author']);
			}

			$imported_count++;
		}

		return $imported_count;
	}

	// Normalizes one feed item/entry (RSS, Atom, or a YouTube Media-RSS entry) into a flat
	// array, pulling each field from a prioritized list of sources (first non-empty wins).
	public static function extract_sermon_data ($item) {
		$media = self::entry_media_node($item);

		$date_raw = self::first_non_empty(array(
			self::entry_text($item, 'pubDate'),
			self::entry_text($item, 'published'),
			self::entry_text($item, 'updated'),
			self::entry_namespaced_text($item, self::DC_NS, 'date')
		));
		$timestamp = $date_raw !== '' ? strtotime($date_raw) : false;
		if (!$timestamp) {
			$timestamp = time();
		}

		return array(
			'title' => self::entry_text($item, 'title'),
			'link' => self::first_non_empty(array(
				self::entry_text($item, 'link'),
				self::entry_link_href($item, 'alternate')
			)),
			// The entry's canonical web page (e.g. a YouTube watch URL). 'alternate' is the
			// standard Atom rel; 'alternative' is accepted defensively.
			'alternative_url' => self::first_non_empty(array(
				self::entry_link_href($item, 'alternate'),
				self::entry_link_href($item, 'alternative')
			)),
			// media:content is intentionally excluded: on YouTube it is a flash player URL, not audio.
			'audio_url' => self::first_non_empty(array(
				isset($item->enclosure) ? (string) $item->enclosure['url'] : '',
				self::entry_link_href($item, 'enclosure')
			)),
			'content' => self::first_non_empty(array(
				self::entry_namespaced_text($item, self::CONTENT_NS, 'encoded'),
				self::entry_text($item, 'content'),
				self::entry_text($item, 'description'),
				self::entry_text($item, 'summary'),
				self::media_text($media, 'description')
			)),
			'timestamp' => $timestamp,
			'author' => self::first_non_empty(array(
				self::entry_namespaced_text($item, self::ITUNES_NS, 'author'),
				self::entry_namespaced_text($item, self::DC_NS, 'creator'),
				isset($item->author->name) ? (string) $item->author->name : ''
			)),
			'image_url' => self::media_attr($media, 'thumbnail', 'url'),
			'image_alt' => self::media_text($media, 'description')
		);
	}

	// Returns the first trimmed, non-empty string from a list, or '' if none.
	private static function first_non_empty ($values) {
		foreach ($values as $value) {
			$trimmed = trim($value);
			if ($trimmed !== '') {
				return $trimmed;
			}
		}
		return '';
	}

	// Text of a default-namespace child (works for RSS and Atom): title, link, description, etc.
	private static function entry_text ($item, $child) {
		return isset($item->$child) ? (string) $item->$child : '';
	}

	// Text of a namespaced child: itunes:author, dc:creator, content:encoded, etc.
	private static function entry_namespaced_text ($item, $namespace_uri, $child) {
		$children = $item->children($namespace_uri);
		return isset($children->$child) ? (string) $children->$child : '';
	}

	// href of the first Atom <link> whose rel matches ($rel absent is treated as 'alternate').
	private static function entry_link_href ($item, $rel) {
		foreach ($item->link as $link) {
			$link_rel = (string) $link['rel'];
			if ($link_rel === $rel || ($link_rel === '' && $rel === 'alternate')) {
				return (string) $link['href'];
			}
		}
		return '';
	}

	// The SimpleXML node holding media:* children: <media:group> (YouTube) if present,
	// else the entry's own media children (flat Media-RSS), else null.
	private static function entry_media_node ($item) {
		$media = $item->children(self::MEDIA_NS);
		if (isset($media->group)) {
			return $media->group;
		}
		if (isset($media->thumbnail) || isset($media->content) || isset($media->description)) {
			return $media;
		}
		return null;
	}

	// An unprefixed attribute of a media child (e.g. media:thumbnail@url). The attribute lives in
	// no namespace, so it must be read via attributes() rather than bracket access after children().
	private static function media_attr ($media_node, $child, $attribute) {
		if ($media_node === null || !isset($media_node->$child)) {
			return '';
		}
		return (string) $media_node->$child->attributes()->$attribute;
	}

	private static function media_text ($media_node, $child) {
		if ($media_node === null || !isset($media_node->$child)) {
			return '';
		}
		return (string) $media_node->$child;
	}

	// Downloads a feed image into the media library and sets it as the sermon's featured image,
	// storing the alt text on the attachment. Failures are non-fatal: the sermon imports coverless.
	private static function set_sermon_cover_image ($sermon_id, $image_url, $alt) {
		if ($image_url === '') {
			return;
		}

		require_once ABSPATH . 'wp-admin/includes/media.php';
		require_once ABSPATH . 'wp-admin/includes/file.php';
		require_once ABSPATH . 'wp-admin/includes/image.php';

		$attachment_id = media_sideload_image($image_url, $sermon_id, null, 'id');
		if (is_wp_error($attachment_id)) {
			return;
		}

		set_post_thumbnail($sermon_id, $attachment_id);
		if ($alt !== '') {
			update_post_meta($attachment_id, '_wp_attachment_image_alt', $alt);
		}
	}

	public static function save_pastor_to_sermon ($sermon_id, $pastor_name) {
		$pastor_slug = sanitize_title($pastor_name);
		$pastor = get_page_by_path($pastor_slug, OBJECT, 'staff');
		if (!$pastor) {
			$pastor_id = wp_insert_post(array(
				'post_title' => $pastor_name,
				'post_name' => $pastor_slug,
				'post_type' => 'staff',
				'post_status' => 'publish'
			));
		} else {
			$pastor_id = $pastor->ID;
		}
		update_post_meta($sermon_id, 'sermon_pastor', $pastor_id);
	}

	public static function convert_xml_to_object ($rss) {
		if (!$rss) {
			return array();
		}

		// Suppress libxml's own warnings so malformed-XML noise never reaches debug.log;
		// we handle the failure explicitly via the false return below.
		libxml_use_internal_errors(true);
		$feed_object = simplexml_load_string($rss);
		libxml_clear_errors();

		if ($feed_object === false) {
			self::record_status(false, 'Sermon feed could not be parsed as XML.');
			return false;
		}

		// RSS puts items at <rss><channel><item>; Atom puts them at <feed><entry> (no channel).
		// Returning the SimpleXML node (not a cast array) lets foreach handle 0, 1 or many
		// uniformly and preserves namespaced children (itunes:, dc:, media:) for the extractor.
		if (isset($feed_object->channel->item)) {
			return $feed_object->channel->item;
		}

		if (isset($feed_object->entry)) {
			return $feed_object->entry;
		}

		return array();
	}

	public static function fetch_feed () {
		$feed_url = get_option('sermon_feed');
		if (!$feed_url) {
			self::record_status(false, 'No sermon feed URL is configured. Set one under Sermons → Sermon Settings.');
			return false;
		}

		$response = wp_remote_get($feed_url, array('timeout' => 15));

		if (is_wp_error($response)) {
			self::record_status(false, 'Could not reach the sermon feed: ' . $response->get_error_message());
			return false;
		}

		$status_code = wp_remote_retrieve_response_code($response);
		if ($status_code < 200 || $status_code >= 300) {
			self::record_status(false, "Sermon feed returned HTTP {$status_code} for {$feed_url}.");
			return false;
		}

		$body = wp_remote_retrieve_body($response);
		if (!$body) {
			self::record_status(false, "Sermon feed at {$feed_url} returned an empty response.");
			return false;
		}

		return $body;
	}

	private static function record_status ($ok, $message, $count = 0) {
		update_option('sermon_import_status', array(
			'ok' => $ok,
			'message' => $message,
			'time' => time(),
			'count' => $count
		));
	}

}
