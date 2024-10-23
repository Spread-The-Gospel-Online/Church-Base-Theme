(() => {
  const el = window.wp.element.createElement
  const { Fragment } = window.wp.element
  const { registerPlugin } = window.wp.plugins
  const { registerBlockType } = window.wp.blocks
  const { PluginDocumentSettingPanel, PluginSidebarMoreMenuItem, PluginSidebar } = window.wp.editPost
  const Fields = wp.components
  const coreEditor = wp.data.select('core/editor');

  registerPlugin( 'plugin-church-member-plugin', {
    icon: 'admin-users',
    render: function (props) {
      const currentMeta = coreEditor.getEditedPostAttribute('meta')

      if (wp.data.select('core/editor').getCurrentPostType() === 'layouts') {
        return;
      }
      
      return el(Fragment, {},
        el(PluginSidebarMoreMenuItem, {
          target: 'church-member-sidebar'
        }, 'Member Settings'),
        el(PluginSidebar, {
          name: 'church-member-sidebar',
          title: 'Member Settings'
        }, 
          el('div', { class: 'components-panel__body is-opened' },
            el(Fragment, {},
              el('div', {}, 
                el('input', {
                  id: 'is-member-only',
                  type: 'checkbox',
                  defaultChecked: currentMeta.is_member_only === 'yes',
                  onChange: (event) => {
                    const test = wp.data.dispatch('core/editor').editPost({ meta: { is_member_only: event.target.checked ? 'yes' : 'no' }})
                  }
                }),
                el('label', { for: 'is-member-only' }, 'Member Only?')
              )
            )
          )
        )
      )
    }
  })
})()
