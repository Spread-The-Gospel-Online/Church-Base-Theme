<?php

// TODO: Should render date based on theme settings
function util_render_date ($date) {
	return date('F j, Y', strtotime($date));
}