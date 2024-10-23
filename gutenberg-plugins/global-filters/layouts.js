(() => {
  const el = window.wp.element.createElement
  const { createHigherOrderComponent } = window.wp.compose;
  const { Fragment } = window.wp.element;
  const { ToggleControl, RangeControl } = window.wp.components;
  const { InspectorAdvancedControls, InspectorControls } = window.wp.blockEditor;
  
  wp.hooks.addFilter(
    'blocks.registerBlockType',
    'church/block-container',
    (settings, name) => {
      if (typeof settings.attributes !== 'undefined') {  
        settings.attributes = Object.assign(settings.attributes, {
          blockContainer: {
            type: 'boolean',
          }
        });
      }
      return settings
    }
  )

  wp.hooks.addFilter('editor.BlockEdit', 'vcgb/fullwidth-custom-control', createHigherOrderComponent((BlockEdit) => {
    return (props) => {
      const { attributes, setAttributes, isSelected } = props;
      
      if (!attributes.className || (!attributes.className.includes('full-width') && !attributes.className.includes('ccontain'))) {
        setAttributes({ 
          className: `ccontain`
        })
      }

      const classes = attributes.className ? attributes.className : 'ccontain'
      const haveParents = wp.data.select('core/block-editor').getBlockParents(props.clientId).length > 0
      
      const mobileMarginClasses = classes.split(' ').filter((singleClass) => singleClass.startsWith('mb-'))[0] || false
      const mobileMargin = mobileMarginClasses ? parseInt(mobileMarginClasses.split('-')[1]) : (haveParents ? 0 : 30)
      if (!mobileMarginClasses) {
        setAttributes({ 
          className: `${classes} mb-${mobileMargin}`
        })
      }
      
      const desktopMarginClasses = classes.split(' ').filter((singleClass) => singleClass.startsWith('lg:mb-'))[0] || false
      const desktopMargin = desktopMarginClasses ? parseInt(desktopMarginClasses.split('-')[1]) : (haveParents ? 0 : 40)
      if (!desktopMarginClasses) {
        setAttributes({ 
          className: `${classes} lg:mb-${desktopMargin}`
        })
      }

      return el(Fragment, {},
        el(BlockEdit, { ...props }),
        el(InspectorAdvancedControls, {}, 
          el(Fragment, {},
            el('div', {},
              el('input', {
                id: 'is-contained-width',
                type: 'checkbox',
                defaultChecked: classes.includes('ccontain'),
                onChange: (event) => {
                  const currentClasses = attributes.className ? attributes.className : ''
                  setAttributes({ className: event.target.checked
                    ? `${currentClasses.replace('full-width', '')} ccontain`
                    : `${currentClasses.replace('ccontain', '')} full-width`
                  })
                }
              }),
              el('label', { for: 'is-contained-width' }, 'Is Contained Width?')
            ),
            el('div', { style: { marginTop: 20 } },
              el(Fields.RangeControl, {
                label: 'Mobile Margin',
                initialPosition: mobileMargin,
                min: 0,
                max: 200,
                onChange: function (e) {
                  const oldClasses = attributes.className ? attributes.className : ''
                  const newClasses = oldClasses.split(' ').filter((singleClass) => !singleClass.startsWith('mb-')).join(' ')
                  setAttributes({ 
                    className: `${newClasses} mb-${e}`
                  })
                }
              }),
              el(Fields.RangeControl, {
                label: 'Desktop Margin',
                initialPosition: desktopMargin,
                min: 0,
                max: 200,
                onChange: function (e) {
                  const oldClasses = attributes.className ? attributes.className : ''
                  const newClasses = oldClasses.split(' ').filter((singleClass) => !singleClass.startsWith('lg:mb-')).join(' ')
                  setAttributes({ 
                    className: `${newClasses} lg:mb-${e}`
                  })
                }
              })
            )
          )
        )
      )
    }
  }))
})()