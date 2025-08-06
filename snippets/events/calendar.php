<?php
	$now = strtotime('now');
	if (isset($base_date)) {
		$now = strtotime($base_date);
	}

	$previous_month = strtotime('-1 month', $now);
	$next_month = strtotime('+1 month', $now);

	$days_of_week = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
	$number_days = cal_days_in_month(CAL_GREGORIAN, date('m', $now), date('Y', $now));
	$first_day_timestamp = strtotime(date('m', $now) . '/01/' . date('Y', $now));
	$first_day = date('l', $first_day_timestamp);
	$offset = array_search($first_day, $days_of_week);

	$recurring_events = church_get_recurring_events();
	$wrapper_classes = util_get_block_wrapper_classes($blockContainer, $blockBottomMargin, $blockBottomMarginDesktop, $blockPadding);
?>

<section class="<?= $wrapper_classes ?>" data-calendar-wrapper>
	<div class="calendar-nav">
		<button data-previous-month="<?= date('F Y', $previous_month) ?>" class="calendar-nav__button">
			<?= date('F', $previous_month) ?>
		</button>
		<h2 class="calendar-nav__current">
			<?= date('F', $now) ?>
		</h2>
		<button data-next-month="<?= date('F Y', $next_month) ?>" class="calendar-nav__button">
			<?= date('F', $next_month) ?>
		</button>
	</div>
	<div class="calendar">
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
			<?php $events = church_util_get_events_for_day(date('Y', $now) . '-' . date('m', $now) . '-' . $day_value, $recurring_events); ?>
			<div class="calendar__day">
				<span class="calendar__date">
					<?= $i + 1 ?>
				</span>
				<?php foreach ($events as $event) { ?>
					<a class="text-small calendar__event-link" href="<?= get_permalink($event) ?>">
						<?= $event->post_title ?>
					</a>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
</section>

<script type="module" defer src="<?= get_template_directory_uri() ?>/assets/scripts/templates/calendar.js"></script>