<?php

// Minimal, dependency-free Markdown -> HTML converter for the admin documentation pages.
// Supports: ATX headings, fenced code blocks, inline code, bold/italic, links, images,
// unordered/ordered lists (single level), blockquotes, horizontal rules, and paragraphs.
// Output is sanitized by the caller with wp_kses_post(). For richer Markdown (tables,
// nested lists, etc.) drop in Parsedown.php and call it here instead.

// Inline-level formatting applied to a single block of text.
function church_documentation_inline ($text) {
	// Pull inline code out first so emphasis/link rules don't touch its contents.
	$code_spans = array();
	$text = preg_replace_callback('/`([^`]+)`/', function ($m) use (&$code_spans) {
		$key = "\x00CODE" . count($code_spans) . "\x00";
		$code_spans[$key] = '<code>' . htmlspecialchars($m[1], ENT_QUOTES, 'UTF-8') . '</code>';
		return $key;
	}, $text);

	// Images: ![alt](src)
	$text = preg_replace_callback('/!\[([^\]]*)\]\(([^)\s]+)\)/', function ($m) {
		return '<img src="' . esc_url($m[2]) . '" alt="' . esc_attr($m[1]) . '">';
	}, $text);

	// Links: [text](url)
	$text = preg_replace_callback('/\[([^\]]+)\]\(([^)\s]+)\)/', function ($m) {
		return '<a href="' . esc_url($m[2]) . '">' . $m[1] . '</a>';
	}, $text);

	// Bold then italic.
	$text = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $text);
	$text = preg_replace('/\*(.+?)\*/', '<em>$1</em>', $text);
	$text = preg_replace('/_(.+?)_/', '<em>$1</em>', $text);

	// Restore code spans.
	return strtr($text, $code_spans);
}

function church_documentation_markdown_to_html ($markdown) {
	$lines = explode("\n", str_replace("\r\n", "\n", $markdown));
	$count = count($lines);
	$html = '';
	$paragraph = array();

	$flush_paragraph = function () use (&$paragraph, &$html) {
		if (!empty($paragraph)) {
			$html .= '<p>' . church_documentation_inline(trim(implode(' ', $paragraph))) . '</p>';
			$paragraph = array();
		}
	};

	$i = 0;
	while ($i < $count) {
		$trimmed = trim($lines[$i]);

		// Fenced code block.
		if (strpos($trimmed, '```') === 0) {
			$flush_paragraph();
			$i++;
			$code = array();
			while ($i < $count && strpos(trim($lines[$i]), '```') !== 0) {
				$code[] = $lines[$i];
				$i++;
			}
			$i++; // skip the closing fence
			$html .= '<pre><code>' . htmlspecialchars(implode("\n", $code), ENT_QUOTES, 'UTF-8') . '</code></pre>';
			continue;
		}

		// Blank line ends a paragraph.
		if ($trimmed === '') {
			$flush_paragraph();
			$i++;
			continue;
		}

		// Heading.
		if (preg_match('/^(#{1,6})\s+(.*)$/', $trimmed, $m)) {
			$flush_paragraph();
			$level = strlen($m[1]);
			$html .= '<h' . $level . '>' . church_documentation_inline(trim($m[2])) . '</h' . $level . '>';
			$i++;
			continue;
		}

		// Horizontal rule.
		if (preg_match('/^(-{3,}|\*{3,}|_{3,})$/', $trimmed)) {
			$flush_paragraph();
			$html .= '<hr>';
			$i++;
			continue;
		}

		// Blockquote (consecutive `>` lines).
		if (preg_match('/^>\s?(.*)$/', $trimmed)) {
			$flush_paragraph();
			$quote = array();
			while ($i < $count && preg_match('/^>\s?(.*)$/', trim($lines[$i]), $qm)) {
				$quote[] = $qm[1];
				$i++;
			}
			$html .= '<blockquote>' . church_documentation_inline(trim(implode(' ', $quote))) . '</blockquote>';
			continue;
		}

		// Unordered list.
		if (preg_match('/^[-*+]\s+(.*)$/', $trimmed)) {
			$flush_paragraph();
			$items = '';
			while ($i < $count && preg_match('/^[-*+]\s+(.*)$/', trim($lines[$i]), $lm)) {
				$items .= '<li>' . church_documentation_inline(trim($lm[1])) . '</li>';
				$i++;
			}
			$html .= '<ul>' . $items . '</ul>';
			continue;
		}

		// Ordered list.
		if (preg_match('/^\d+\.\s+(.*)$/', $trimmed)) {
			$flush_paragraph();
			$items = '';
			while ($i < $count && preg_match('/^\d+\.\s+(.*)$/', trim($lines[$i]), $lm)) {
				$items .= '<li>' . church_documentation_inline(trim($lm[1])) . '</li>';
				$i++;
			}
			$html .= '<ol>' . $items . '</ol>';
			continue;
		}

		// Otherwise accumulate into the current paragraph.
		$paragraph[] = $trimmed;
		$i++;
	}

	$flush_paragraph();

	return $html;
}
