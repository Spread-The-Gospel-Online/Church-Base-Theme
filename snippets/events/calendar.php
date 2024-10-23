<?php
	$days_of_week = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
	$number_days = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
	$first_day_timestamp = strtotime(date('m') . '/01/' . date('Y'));
	$first_day = date('l', $first_day_timestamp);
	$offset = array_search($first_day, $days_of_week);
?>

<div class="calendar ccontain">
	<?php foreach ($days_of_week as $day) { ?>
		<div class="calendar__header">
			<?= $day ?>
		</div>
	<?php } ?>

	<?php for ($i = 0; $i < $offset; $i++) { ?>
		<div class="calendar__offset"></div>
	<?php } ?>

	<?php for ($i = 0; $i < $number_days; $i++) { ?>
		<?php $day_value = $i < 9 ? '0' . ($i + 1) : $i + 1; ?>
		<?php $events = church_util_get_events_for_day(date('Y') . '-' . date('m') . '-' . $day_value); ?>
		<div class="calendar__day">
			<span><?= $i + 1 ?></span>
			<?php foreach ($events as $event) { ?>
				<a class="text-small" href="<?= get_permalink($event) ?>">
					<?= $event->post_title ?>
				</a>
			<?php } ?>
		</div>
	<?php } ?>
</div>