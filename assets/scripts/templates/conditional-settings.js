/**
 * Shows or hides one Customizer control based on another control's value.
 *
 * @param inputToWatch - ID of the control whose value decides visibility
 * @param inputToToggle - ID of the control to show or hide
 * @param conditionType - 'show_on' or 'hide_on'
 * @param conditionValue - value that triggers the condition
 */
window.watchCustomizerInput = ({ inputToWatch, inputToToggle, conditionType, conditionValue }) => {
	wp.customize.bind('ready', () => {
		const controlToToggle = wp.customize.control(inputToToggle)
		const controlToWatch = wp.customize.control(inputToWatch)

		if (!controlToToggle || !controlToWatch) {
			return
		}

		// Deliberately overriding core's validate (the pattern core uses for its own conditional
		// controls): the preview re-sends every control's active state each time it reloads,
		// which would otherwise undo a plain deactivate().
		controlToToggle.active.validate = () => {
			return shouldShowCustomizerInput(controlToWatch.setting(), conditionType, conditionValue)
		}

		refreshControlVisibility(controlToToggle)

		wp.customize(inputToWatch).bind(() => {
			refreshControlVisibility(controlToToggle)
		})
	})
}

// Any set() runs through validate, which swaps in the condition's result.
const refreshControlVisibility = (control) => {
	control.active.set(true)
}

const shouldShowCustomizerInput = (watchedValue, conditionType, conditionValue) => {
	const isMatch = `${watchedValue}` === conditionValue

	return conditionType === 'hide_on'
		? !isMatch
		: isMatch
}