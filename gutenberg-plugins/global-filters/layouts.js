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
          blockContainer: { type: 'boolean' },
          blockPadding: { type: 'string' },
          blockBottomMargin: { type: 'number' },
          blockBottomMarginDesktop: { type: 'number' },
        });
      }
      return settings
    }
  )

  // Remove extra 'has-link-color' class from blocks
  wp.hooks.addFilter('blocks.getSaveContent.extraProps', 'vcgb/fullwidth-custom-control', (extraProps, blockType, attributes) => {
    if (!extraProps.className) {
      extraProps.className = ''
    }
  
    if (attributes.textColor && attributes.textColor != 'link') {
      extraProps.className = extraProps.className.replace('has-link-color', '')
    }
  
    if (attributes.blockPadding) {
      extraProps.className += ` block-padding-${attributes.blockPadding}`
    } else {
      extraProps.className += ` block-padding-none`
    }

    extraProps.className += ` ${attributes.blockContainer ? 'ccontain' : 'full-width'}`

    if (attributes.blockBottomMargin) {
      extraProps.className += ` mb-${attributes.blockBottomMargin}`
    }

    if (attributes.blockBottomMarginDesktop) {
      extraProps.className += ` lg:mb-${attributes.blockBottomMarginDesktop}`
    }

    return extraProps
  })

  wp.hooks.addFilter('editor.BlockEdit', 'vcgb/fullwidth-custom-control', createHigherOrderComponent((BlockEdit) => {
    return (props) => {
      const { attributes, setAttributes, isSelected } = props;
      const postType = wp.data.select('core/editor').getCurrentPostType()

      const defaultMarginMobile = (postType === 'wp_block') ? 10 : 30
      const defaultMarginDesktop = (postType === 'wp_block') ? 20 : 40
      
      const haveParents = wp.data.select('core/block-editor').getBlockParents(props.clientId).length > 0
      
      // set if the block has a container by default
      if (attributes.blockContainer === undefined) {
        if (postType === 'wp_block') {
          setAttributes({ blockContainer: false })
        } else {
          setAttributes({ blockContainer: !haveParents })
        }
      }

      if (attributes.blockBottomMargin === undefined) {
        setAttributes({ blockBottomMargin: defaultMarginMobile })
      }

      if (attributes.blockBottomMarginDesktop === undefined) {
        setAttributes({ blockBottomMarginDesktop: defaultMarginDesktop })
      }

      const blockPadding = attributes.blockPadding ? attributes.blockPadding : 'none'
      const isContainedWidth = attributes.blockContainer

      return el(Fragment, {},
        el(BlockEdit, { ...props }),
        el(InspectorControls, {}, 
          el(PanelBody, { title: 'Spacing' },
            el(SelectControl, {
              label: 'Element Vertical Padding',
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
            }),
            el(ToggleControl, {
              label: 'Is Contained Width?',
              checked: isContainedWidth,
              onChange: (newIsContainedWidth) => {
                setAttributes({ blockContainer: newIsContainedWidth })
              }
            }),
            el(Fields.RangeControl, {
              label: 'Mobile Margin',
              initialPosition: attributes.blockBottomMargin || 0,
              min: 0,
              max: 200,
              onChange: function (newMargin) {
                setAttributes({ blockBottomMargin: newMargin })
              }
            }),
            el(Fields.RangeControl, {
              label: 'Desktop Margin',
              initialPosition: attributes.blockBottomMarginDesktop || 0,
              min: 0,
              max: 200,
              onChange: function (newMargin) {
                setAttributes({ blockBottomMarginDesktop: newMargin })
              }
            })
          )
        )
      )
    }
  }))
})()