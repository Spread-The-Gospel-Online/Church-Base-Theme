<?php
// Shared documentation child page. In scope (from Church_Documentation_Page::render):
//   $pages   — slug => ['title' => , 'path' => ]
//   $slug    — the resolved current doc slug
//   $current — the current page entry (or null)
//   $html    — parsed Markdown HTML for the current doc
?>
<div class="wrap">
	<?php if (empty($pages)) { ?>
		<h1>Documentation</h1>
		<p>No documentation found. Add Markdown (<code>.md</code>) files to <code>admin-panel/documentation/pages/</code> and they will appear here automatically.</p>
	<?php } else { ?>
		<h1><?= esc_html($current['title']) ?></h1>

		<?php if (count($pages) > 1) { ?>
			<p>
				<?php
				$links = array();
				foreach ($pages as $page_slug => $page) {
					if ($page_slug === $slug) {
						$links[] = '<strong>' . esc_html($page['title']) . '</strong>';
					} else {
						$url = admin_url('admin.php?page=church-documentation&doc=' . $page_slug);
						$links[] = '<a href="' . esc_url($url) . '">' . esc_html($page['title']) . '</a>';
					}
				}
				echo implode(' &nbsp;|&nbsp; ', $links);
				?>
			</p>
			<hr />
		<?php } ?>

		<style>
			.church-documentation-body ul,
			.church-documentation-body ol {
				margin-left: 2rem;
			}
			.church-documentation-body ul {
				list-style: disc;
			}
			.church-documentation-body ol {
				list-style: decimal;
			}
		</style>
		<div class="church-documentation-body">
			<?= wp_kses_post($html) ?>
		</div>
	<?php } ?>
</div>
