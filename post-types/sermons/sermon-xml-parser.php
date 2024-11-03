<?php

class Sermon_Proccesser {

	public static function fetch_updates () {
		$rss_feed = self::fetch_feed();
		$sermons = self::convert_xml_to_object($rss_feed);
		self::save_new_sermons($sermons);
	}

	public static function save_new_sermons ($sermons) {
		foreach ($sermons as $sermon) {
			$title = $sermon->title;
			$slug = sanitize_title($title);
			$sermon_exists = get_page_by_path($slug, OBJECT, 'sermons');
			if (!$sermon_exists) {
				$timestamp = strtotime((string) $sermon->pubDate);
				$enclosure = (array) $sermon->enclosure;
				$audio_url = $enclosure['@attributes']['url'];
				$sermon_id = wp_insert_post(array(
					'post_title' => $title,
					'post_name' => $slug,
					'post_content' => (string) $sermon->description,
					'post_type' => 'sermons',
					'post_date' => date('Y-m-d H:i:s', $timestamp),
					'post_status' => 'publish'
				));
				update_post_meta($sermon_id, 'link', (string) $sermon->link);
				update_post_meta($sermon_id, 'audio_link', (string) $audio_url);
				
				$item_dc = $sermon->children('http://purl.org/dc/elements/1.1/');
				$pastor_name = $item_dc->creator;
				if ($pastor_name) {
					self::save_pastor_to_sermon($sermon_id, $pastor_name);
				}
			}
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
		$feed_object = simplexml_load_string($rss);
		$feed = (array) $feed_object->channel;
		return $feed['item'];
	}

	public static function fetch_feed () {
		$feed_url = get_option('sermon_feed');
		$ch = curl_init($feed_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}

}