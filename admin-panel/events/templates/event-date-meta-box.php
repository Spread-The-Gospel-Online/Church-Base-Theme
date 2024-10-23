<?php

$event_date = get_post_meta($post->ID, 'event_date', true);
$event_recurring = get_post_meta($post->ID, 'event_recurring', true);
$event_date_eval = strtotime('+' . $event_recurring);

$warning = '';
if (!!$event_recurring && !$event_date_eval) {
	$warning = <<<HTML
		<p style="margin-top: 0.5rem; color: red">
			There is an issue with your recurring value
		</p>
	HTML;
}

$markup = <<<HTML
	<div>
		<input type="date" 
			   name="event-date"
			   id="event-date"
			   value="$event_date" 
			   style="width: 100%;" />
	</div>
	<div style="margin-top: 1.5rem;">
		<input type="string" 
			   name="event-date-recurring"
			   id="event-date-recurring" 
			   value="$event_recurring"
			   style="width: 100%;" />
		$warning
		<p style="margin-top: 0.5rem;">
			Enter recurring value just as the number and the unit of measurement, i.e. "2 weeks" instead of "every 2 weeks"
		</p>
		<p style="margin-top: 0.5rem;">
			If the recurring value is set, then once the event date has passed it will auto update
		</p>
	</div>
HTML;

wp_nonce_field(
	'updating_events_meta_fields',
	'events_meta_nonce'
);

echo $markup;