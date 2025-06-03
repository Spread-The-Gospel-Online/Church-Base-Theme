<html-if if="state.searchOpen === true" style="display: none;">
	<form search-box
		  class="search-bar"
		  method="GET"
		  action="<?= get_site_url() ?>"
		  is-ajax>
		<div class="ccontain">
			<input search-input name="s" type="text" />
			<input type="submit" value="Search" />
		</div>
	</form>
</html-if>