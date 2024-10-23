(() => {
  const blockName = 'church/block-calendar'

  const el = window.wp.element.createElement
  const registerBlockType = window.wp.blocks.registerBlockType
  const Fields = wp.components

  // window.wp.hooks.addFilter(
  //   'editor.BlockEdit',
  //   'church/block-calendar',
  //   wp.compose.createHigherOrderComponent(function (BlockEdit) {
  //     return function (props) {
  //       if (props.name !== blockName) return el(wp.element.Fragment, {}, el(BlockEdit, props))
  //       return el(
  //         wp.element.Fragment, 
  //         {}, 
  //         el(BlockEdit, props),
          
  //       )
  //     }
  //   })
  // )

  // Register the block
  registerBlockType(blockName, {
    title: 'Church Calendar',
    edit: function ({ attributes }) {
      setTimeout(() => loadCalendar(attributes), 2000)
      return el('div', {
        'data-get-calendar': 'true'
      }, 'loading...')
    },
    save: function () {
      return null
    },
  })


  const loadCalendar = (attributes) => {
    const calendarWrapper = document.querySelectorAll('[data-get-calendar]')
    
    calendarWrapper.forEach((wrapper) => {
      fetch(`/church/wp-json/church/v1/getServerContentsCalendar`)
        .then((blob) => blob.text())
        .then((data) => {
          wrapper.innerHTML = data
          const innerLinks = wrapper.querySelectorAll('a')
          innerLinks.forEach((link) => link.removeAttribute('href'))
        })
    })
  }
})()