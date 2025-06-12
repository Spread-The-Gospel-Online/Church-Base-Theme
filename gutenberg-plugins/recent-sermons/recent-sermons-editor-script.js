const blockName = 'church/block-recent-sermons'

const el = window.wp.element.createElement
const registerBlockType = window.wp.blocks.registerBlockType
const Fields = wp.components

window.wp.hooks.addFilter(
  'editor.BlockEdit',
  'church/block-recent-sermons',
  wp.compose.createHigherOrderComponent(function (BlockEdit) {
    return function (props) {
      if (props.name !== blockName) return el(wp.element.Fragment, {}, el(BlockEdit, props))
      return el(
        wp.element.Fragment, 
        {}, 
        el(BlockEdit, props),
        el(
          wp.editor.InspectorControls, {}, el(
            Fields.PanelBody, {}, 
              el(Fields.RangeControl, {
                label: 'Number of sermons',
                value: props.attributes.numberOfSermons,
                initialPosition: 2,
                min: 1,
                max: 4,
                onChange: function (e) {
                  props.setAttributes({ numberOfSermons: e });
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
  title: 'Latest Sermons',
  attributes: {
    numberOfSermons: {
      type: "number"
    },
    numberOfColumns: {
      type: "number"
    }
  },
  edit: function ({ attributes }) {
    setTimeout(() => loadSermons(attributes), 3000)
    return el('div', {
      'data-get-latest-sermons': attributes.numberOfSermons ? attributes.numberOfSermons : 2
    }, 'loading...')
  },
  save: function () {
    return null
  },
})


const loadSermons = (attributes) => {
  const sermonWrappers = document.querySelectorAll('[data-get-latest-sermons]')
  
  sermonWrappers.forEach((wrapper) => {
    fetch(`${window.wpApiSettings.root}church/v1/getServerContentsLatestSermons?numberSermons=${attributes.numberOfSermons}&numberOfColumns=${attributes.numberOfColumns}`)
      .then((blob) => blob.text())
      .then((data) => {
        wrapper.innerHTML = data
        const innerLinks = wrapper.querySelectorAll('a')
        innerLinks.forEach((link) => link.removeAttribute('href'))
      })
  })
}