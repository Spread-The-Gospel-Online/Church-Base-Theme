(() => {
  const blockName = 'church/block-upcoming-events'

  const el = window.wp.element.createElement
  const registerBlockType = window.wp.blocks.registerBlockType
  const Fields = wp.components

  window.wp.hooks.addFilter(
    'editor.BlockEdit',
    'church/block-upcoming-events',
    wp.compose.createHigherOrderComponent(function (BlockEdit) {
      return function (props) {
        if (props.name !== blockName) return el(wp.element.Fragment, {}, el(BlockEdit, props))
        return el(
          wp.element.Fragment, 
          {}, 
          el(BlockEdit, props),
          el(
            wp.editor.InspectorControls, {}, el(
              Fields.PanelBody, {}, el(
                Fields.RangeControl,
                {
                  label: 'Number of events',
                  value: props.attributes.numberOfEvents,
                  initialPosition: 2,
                  min: 1,
                  max: 4,
                  onChange: function (e) {
                    props.setAttributes({ numberOfEvents: e });
                  }
                }
              )
            )
          ),
          el(
            wp.editor.InspectorControls, {}, el(
              Fields.PanelBody, {}, el(
                Fields.RangeControl,
                {
                  label: 'Number of columns',
                  value: props.attributes.numberOfColumns,
                  initialPosition: 2,
                  min: 1,
                  max: 4,
                  onChange: function (e) {
                    props.setAttributes({ numberOfColumns: e });
                  }
                }
              )
            )
          )
        )
      }
    })
  )

  // Register the block
  registerBlockType(blockName, {
    title: 'Upcoming Events',
    attributes: {
      numberOfEvents: {
        type: "number"
      },
      numberOfColumns: {
        type: "number"
      }
    },
    edit: function ({ attributes }) {
      setTimeout(() => loadEvents(attributes), 2000)
      return el('div', {
        'data-get-upcoming-events': attributes.numberOfEvents ? attributes.numberOfEvents : 2,
        'data-columns': attributes.numberOfColumns ? attributes.numberOfColumns : 2
      }, 'loading...')
    },
    save: function () {
      return null
    },
  })


  const loadEvents = (attributes) => {
    const eventWrappers = document.querySelectorAll('[data-get-upcoming-events]')
    
    eventWrappers.forEach((wrapper) => {
      fetch(`/church/wp-json/church/v1/getServerContentsUpcomingEvents?numberOfEvents=${attributes.numberOfEvents}&numberOfColumns=${attributes.numberOfColumns}`)
        .then((blob) => blob.text())
        .then((data) => {
          wrapper.innerHTML = data
          const innerLinks = wrapper.querySelectorAll('a')
          innerLinks.forEach((link) => link.removeAttribute('href'))
        })
    })
  }
})()