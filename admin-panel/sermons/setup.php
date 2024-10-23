<?php

class BRG_Sermon_Admin_Page {

	public static function setup_sermon_settings_page () {
		require_once('templates/sermon-settings-page.php');
	}

	public static function check_sermon_admin_form () {
		if (current_user_can('administrator')) {
			if (isset($_POST['manual-fetch-sermons']) && $_POST['manual-fetch-sermons'] == 'yappa') {
				Sermon_Proccesser::fetch_updates();
			}
		}
	}

}