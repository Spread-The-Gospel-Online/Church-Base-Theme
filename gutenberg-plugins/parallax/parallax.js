(() => {
  const el = window.wp.element.createElement
  const { createHigherOrderComponent } = window.wp.compose;
  const { Fragment } = window.wp.element;
  const { ToggleControl, RangeControl } = window.wp.components;
  const { InspectorAdvancedControls, InspectorControls } = window.wp.blockEditor;
  
  wp.hooks.addFilter('editor.BlockEdit', 'vcgb/parallax-custom-control', createHigherOrderComponent((BlockEdit) => {
    return (props) => {
      if (['wp-block-cover', 'core/image'].includes(props.name)) return el(Fragment, {}, el(BlockEdit, props))
      const { attributes, setAttributes, isSelected } = props;
      const classes = attributes.className      

      return el(Fragment, {},
        el(BlockEdit, { ...props }),
        el(InspectorAdvancedControls, {}, 
          el(Fragment, {},
            el('div', {},
              el('input', {
                id: 'is-parallax',
                type: 'checkbox',
                defaultChecked: classes ? classes.includes('parallax') : false,
                onChange: (event) => {
                  const currentClasses = attributes.className ? attributes.className : ''
                  setAttributes({ className: event.target.checked
                    ? `${currentClasses} parallax`
                    : `${currentClasses.replace('parallax', '')}`
                  })
                }
              }),
              el('label', { for: 'is-parallax' }, 'Enable Parallax?')
            )
          ),
          el('div', {},
            el('input', {
              id: 'is-parallax-banner',
              type: 'checkbox',
              defaultChecked: classes ? classes.includes('parallax--banner') : false,
              onChange: (event) => {
                const currentClasses = attributes.className ? attributes.className : ''
                setAttributes({ className: event.target.checked
                  ? `${currentClasses} parallax--banner`
                  : `${currentClasses.replace('parallax--banner', '')}`
                })
              }
            }),
            el('label', { for: 'is-parallax-banner' }, 'Set Parallax As Banner?')
          )
        )
      )
    }
  }))
})()