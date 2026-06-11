(() => {
	const createElement = window.wp.element.createElement

	wp.hooks.addFilter(
		'blocks.getSaveElement',
		'church/core-block-edits',
		(element, blockType, attributes) => {
			if (blockType.name === 'core/accordion-item' && element) {
				element.props.className += ' accordion ';
				return createElement('details', element.props)
			}
			else if (blockType.name === 'core/accordion-heading' && element) {
				return createElement('summary', element.props)
			}

			return element
		}
	)
})()
