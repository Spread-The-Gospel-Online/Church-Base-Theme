(() => {
  const el = window.wp.element.createElement
  const { Fragment } = window.wp.element
  const { registerPlugin } = window.wp.plugins
  const { registerBlockType } = window.wp.blocks
  const { PluginDocumentSettingPanel, PluginSidebarMoreMenuItem, PluginSidebar } = window.wp.editPost
  const Fields = wp.components
  const coreEditor = wp.data.select('core/editor');

  registerPlugin( 'plugin-church-layouts-plugin', {
    icon: 'editor-table',
    render: function () {
      if (wp.data.select('core/editor').getCurrentPostType() !== 'layouts') {
        return;
      }
      
      const currentMeta = coreEditor.getEditedPostAttribute('meta')
      return el(Fragment, {},
        el(PluginSidebarMoreMenuItem, {
          target: 'church-layouts-sidebar'
        }, 'Layout Settings'),
        el(PluginSidebar, {
          name: 'church-layouts-sidebar',
          title: 'Layout Settings'
        }, 
          el('div', { class: 'components-panel__body is-opened' },
            el(Fragment, {},
              el('p', {}, 'Layout Item Position'),
              el('select', {
                type: 'checkbox',
                defaultValue: currentMeta.page_section,
                onChange: (event) => {
                  const test = wp.data.dispatch('core/editor')
                    .editPost({ meta: { page_section: event.target.value }})
                }},
                el('option', { value: 'none' }, 'None (will not show)'),
                el('option', { value: 'before' }, 'Before Hero'),
                el('option', { value: 'after_header' }, 'Before Content'),
                el('option', { value: 'after' }, 'After Content'),
              ),
            )
          )
        )
      )
    }
  })
})()
