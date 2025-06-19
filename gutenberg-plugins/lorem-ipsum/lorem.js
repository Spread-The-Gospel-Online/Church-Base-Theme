(() => {
  const blockName = 'church/block-lorem-ipsum'
  const registerBlockType = window.wp.blocks.registerBlockType

  window.wp.hooks.addFilter(
    'editor.BlockEdit',
    blockName,
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
                label: 'Number of Paragraphs',
                value: props.attributes.numberParagraphs,
                initialPosition: 2,
                min: 1,
                max: 5,
                onChange: function (e) {
                  props.setAttributes({ numberParagraphs: e });
                }
              })
            )
          )
        )
      }
    })
  )

  // Register the block
  registerBlockType(blockName, {
    title: 'Lorem Ipsum',
    attributes: {
      numberParagraphs: {
        type: "number"
      },
    },
    edit: function ({ attributes }) {
      setTimeout(() => loadLoremIpsum(attributes), 3000)
      return el('div', {
        'data-lorem-ipsum': attributes.numberParagraphs ? attributes.numberParagraphs : 2
      }, 'loading...')
    },
    save: function () {
      return null
    },
  })

  const loadLoremIpsum = (attributes) => {
    const wrappers = document.querySelectorAll(`[data-lorem-ipsum="${attributes.numberParagraphs ? attributes.numberParagraphs : 2}"]`)
    wrappers.forEach((wrapper) => {
      fetch(`/church/wp-json/church/v1/getServerContentsLoremIpsum?numberParagraphs=${attributes.numberParagraphs}`)
        .then((blob) => blob.text())
        .then((data) => {
          wrapper.innerHTML = data
          const innerLinks = wrapper.querySelectorAll('a')
          innerLinks.forEach((link) => link.removeAttribute('href'))
        })
    })
  }
})()
