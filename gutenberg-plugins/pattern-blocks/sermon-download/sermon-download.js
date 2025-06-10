(() => {
  const blockName = 'church/block-sermon-download'

  const el = window.wp.element.createElement
  const registerBlockType = window.wp.blocks.registerBlockType
  
  // Register the block
  registerBlockType(blockName, {
    title: 'Sermon Download',
    attributes: { },
    edit: function ({ attributes }) {
      return el('div', {
        'data-get-series': true
      }, 'Sermon Download')
    },
    save: function () {
      return null
    },
  })

  // Only want this block available for patterns
  window.wp.data.subscribe(() => {
    const postType = wp.data.select('core/editor').getCurrentPostType()
    if (postType && postType !== 'wp_block') {
      wp.blocks.unregisterBlockType(blockName)
    }
  })
})()