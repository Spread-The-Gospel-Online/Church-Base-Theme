(() => {
  const el = window.wp.element.createElement
  const { createHigherOrderComponent } = window.wp.compose;
  const { Fragment } = window.wp.element;
  const { ToggleControl, RangeControl, PanelBody, TextControl, SelectControl } = window.wp.components;
  const { InspectorAdvancedControls, InspectorControls } = window.wp.blockEditor;
  
  wp.hooks.addFilter(
    'blocks.registerBlockType',
    'church/block-container',
    (settings, name) => {
      if (typeof settings.attributes !== 'undefined') {  
        settings.attributes = Object.assign(settings.attributes, {
          blockContainer: {
            type: 'boolean',
          },
          blockPadding: {
            type: 'string'
          }
        });
      }
      return settings
    }
  )

  // Remove extra 'has-link-color' class from blocks
  wp.hooks.addFilter('blocks.getSaveContent.extraProps', 'vcgb/fullwidth-custom-control', (extraProps, blockType, attributes) => {
    if (extraProps.className) {
      if (attributes.textColor && attributes.textColor != 'link') {
        extraProps.className = extraProps.className.replace('has-link-color', '')
      }

      if (attributes.blockPadding) {
        extraProps.className += ` block-padding-${attributes.blockPadding}`
      }
    }

    return extraProps
  })

  wp.hooks.addFilter('editor.BlockEdit', 'vcgb/fullwidth-custom-control', createHigherOrderComponent((BlockEdit) => {
    return (props) => {
      const { attributes, setAttributes, isSelected } = props;
      const postType = wp.data.select('core/editor').getCurrentPostType()

      const defaultMarginMobile = (postType === 'wp_block') ? 10 : 30
      const defaultMarginDesktop = (postType === 'wp_block') ? 20 : 40
      
      // also set all children to be contained if block is a group
      if (props.name === 'core/group') {
        wp.data.select('core/block-editor').getBlocksByClientId(props.clientId).forEach((block) => {
          if (!block.innerBlocks) {
            return
          }
          block.innerBlocks.forEach((innerBlock) => {
            const innerAttributes = innerBlock.attributes
            if (!innerBlock.className || (!innerBlock.className.includes('full-width') && !innerBlock.className.includes('ccontain'))) {
              wp.data.dispatch('core/block-editor').updateBlockAttributes(innerBlock.clientId, { className: 'ccontain' })
            }
          })
        })
      }

      if (!attributes.className || (!attributes.className.includes('full-width') && !attributes.className.includes('ccontain'))) {
        if (postType === 'wp_block') {
          setAttributes({
            className: `full-width`
          })
        } else {
          setAttributes({ 
            className: `ccontain`
          })
        }
      }

      console.log(attributes)

      const defaultClasses = (postType === 'wp_block') ? 'full-width' : 'ccontain'
      const classes = attributes.className ? attributes.className : defaultClasses
      const haveParents = wp.data.select('core/block-editor').getBlockParents(props.clientId).length > 0
      
      const mobileMarginClasses = classes.split(' ').filter((singleClass) => singleClass.startsWith('mb-'))[0] || false
      const mobileMargin = mobileMarginClasses ? parseInt(mobileMarginClasses.split('-')[1]) : (haveParents ? 0 : defaultMarginMobile)
      if (!mobileMarginClasses) {
        setAttributes({ 
          className: `${classes} mb-${mobileMargin}`
        })
      }
      
      const desktopMarginClasses = classes.split(' ').filter((singleClass) => singleClass.startsWith('lg:mb-'))[0] || false
      const desktopMargin = desktopMarginClasses ? parseInt(desktopMarginClasses.split('-')[1]) : (haveParents ? 0 : defaultMarginDesktop)
      if (!desktopMarginClasses) {
        setAttributes({ 
          className: `${classes} lg:mb-${desktopMargin}`
        })
      }

      const blockPadding = attributes.blockPadding ? attributes.blockPadding : 'none'

      return el(Fragment, {},
        el(BlockEdit, { ...props }),
        el(InspectorControls, {}, 
          el(PanelBody, { title: 'Spacing' },
            el(SelectControl, {
              label: 'Element Padding',
              value: blockPadding,
              options: [
                { label: 'Theme Default', value: 'none' },
                { label: 'Small', value: 'small' },
                { label: 'Medium', value: 'medium' },
                { label: 'Large', value: 'large' }
              ],
              onChange: (newPaddingValue) => {
                setAttributes({ blockPadding: newPaddingValue })
              }
            })
          )
        ),
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