window.watchCustomizerInput = ({ inputToWatch, inputToToggle, conditionType, conditionValue }) => {
	wp.customize.bind('ready', () => {
		const inputToControl = wp.customize.control(inputToToggle)
		const inputElToWatch = wp.customize.control(inputToWatch)

		if (!inputToControl || !inputElToWatch) { return; }

		// initial setup
		checkForUpdatingCustomizerInput(inputToControl, inputElToWatch.setting(), conditionType, conditionValue)

		// on value change recheck
		wp.customize(inputToWatch).bind((value) => {
			checkForUpdatingCustomizerInput(inputToControl, inputElToWatch.setting(), conditionType, conditionValue)
		})
	})
}

const checkForUpdatingCustomizerInput = (inputToControl, value, conditionType, conditionValue) => {
	let shouldShow = false;
	if (conditionType == 'hide_on') {
		shouldShow = `${value}` !== conditionValue
	} else {
		shouldShow = `${value}` === conditionValue
	}

	if (shouldShow) {
		inputToControl.activate()
	} else {
		inputToControl.deactivate()
	}
}