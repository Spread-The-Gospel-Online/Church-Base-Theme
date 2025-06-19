<?php ob_start(); ?>			
			<?php do_action('church_layout_after_content'); ?>
		</div>
		<?php util_render_snippet('layout/global/footer', array(), false); ?>
		<script type="module" src="<?php echo get_template_directory_uri(); ?>/assets/scripts/templates/layout.js"></script>
		<script type="text/javascript" defer>
			var refTagger = { settings: { bibleVersion: 'ESV' } };
			window.siteURL = '<?= get_site_url() ?>';

			(function(d, t) {
				var n=d.querySelector('[nonce]');
				refTagger.settings.nonce = n && (n.nonce||n.getAttribute('nonce'));
				var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
				g.src = 'https://api.reftagger.com/v2/RefTagger.js';
				g.nonce = refTagger.settings.nonce;
				s.parentNode.insertBefore(g, s);
			}(document, 'script'));
		</script>
	</body>
</html>

<?php $contents = ob_get_clean(); ?>
<?php echo preg_replace('/\s+/', ' ', $contents); ?>