<html-if if="state.searchOpen === true" style="display: none;">
	<form search-box
		  class="search-bar"
		  method="GET"
		  action="<?= get_site_url() ?>">
		<div class="ccontain search-bar__input-wrap">
			<label for="s">Search Term</label>
			<input search-input name="s" id="s" type="text" />
			<input type="submit" value="Search" class="button" />
		</div>
	</form>
	<button class="search-bar__overlay"
			onclick="window.setState('searchOpen', false)"
			aria-label="Close Search Bar">		
	</button>
</html-if>