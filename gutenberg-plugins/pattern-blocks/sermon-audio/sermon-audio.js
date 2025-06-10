(() => {
  const blockName = 'church/sermon-audio'

  const el = window.wp.element.createElement
  const registerBlockType = window.wp.blocks.registerBlockType
  
  // Register the block
  registerBlockType(blockName, {
    title: 'Sermon Audio',
    attributes: { },
    edit: function ({ attributes }) {
      return el('audio', {
        'controls': true,
        'style': { width: '100%' },
        'data-get-series': true
      })
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