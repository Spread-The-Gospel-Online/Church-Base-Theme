(() => {
  // don't need for widgets
  if (window.location.href.includes('widgets.php')) {
    return
  }

  const el = window.wp.element.createElement
  const { Fragment } = window.wp.element
  const { registerPlugin } = window.wp.plugins
  const { registerBlockType } = window.wp.blocks
  const { PluginDocumentSettingPanel, PluginSidebarMoreMenuItem, PluginSidebar } = window.wp.editPost
  const Fields = wp.components
  const coreEditor = wp.data.select('core/editor');

  const sendUpdate = (key, value) => {
    const meta = {}
    meta[key] = value
    const dispatcher = wp.data.dispatch('core/editor').editPost({ meta })
  }

  registerPlugin( 'plugin-church-hero-styles', {
    icon: 'cover-image',
    render: function () {
      if (wp.data.select('core/editor').getCurrentPostType() === 'layouts') {
        return;
      }

      const currentMeta = coreEditor.getEditedPostAttribute('meta')
      if (!currentMeta) { return }
      const [bgColor, setBGColor] = wp.element.useState(currentMeta.hero_background ? currentMeta.hero_background : heroDefaults.heroBGDefault)
      const [textColor, setTextColor] = wp.element.useState(currentMeta.hero_text ? currentMeta.hero_text : heroDefaults.heroTextDefault)

      return el(Fragment, {},
        el(PluginSidebarMoreMenuItem, {
          target: 'church-hero-sidebar'
        }, 'Hero Settings'),
        el(PluginSidebar, {
          name: 'church-hero-sidebar',
          title: 'Hero Settings'
        }, 
          el('div', { class: 'components-panel__body is-opened' },
            el(Fragment, {},
              el('button', {
                style: {
                  marginBottom: '25px'
                },
                class: 'components-button is-primary',
                onClick: () => {
                  const opacityInputs = document.querySelectorAll('#hero-opacity-slider input')
                  opacityInputs.forEach((input) => input.value = heroDefaults.heroOpacityDefault)
                  sendUpdate('hero_opacity', null)

                  const heightInputs = document.querySelectorAll('#hero-height-slider input')
                  heightInputs.forEach((input) => input.value = heroDefaults.heroHeightDefault)
                  sendUpdate('hero_height', null)                  

                  setBGColor(heroDefaults.heroBGDefault)
                  sendUpdate('hero_background', null)

                  setTextColor(heroDefaults.heroTextDefault)
                  sendUpdate('hero_text', null)
                }
              }, 'Reset Hero Settings To Defaults'),
              el('div', { id: 'hero-opacity-slider', class: 'hero-components' },
                el('div', {},
                  el(Fields.RangeControl, {
                    label: 'Opacity',
                    initialPosition: parseFloat(currentMeta.hero_opacity ? currentMeta.hero_opacity : heroDefaults.heroOpacityDefault),
                    min: 0,
                    max: 1,
                    step: 0.05,
                    onChange: (newValue) => {
                      sendUpdate('hero_opacity', `${newValue}`)
                    }
                  })
                )
              ),
              el('p', {}, 'Hero Background Color'),
              el(Fields.ColorPicker, {
                color: bgColor,
                defaultValue: bgColor,
                onChange: (newColor) => {
                  setBGColor(newColor)
                  sendUpdate('hero_background', newColor)
                }
              }),
              el('p', {}, 'Hero Text Color'),
              el(Fields.ColorPicker, {
                label: 'Hero Background Color',
                color: textColor,
                defaultValue: textColor,
                onChange: (newColor) => {
                  setTextColor(newColor)
                  sendUpdate('hero_text', newColor)
                }
              }),
              el('div', { id: 'hero-height-slider', class: 'hero-components' },
                el('div', {},
                  el(Fields.RangeControl, {
                    label: 'Hero Height',
                    initialPosition: parseFloat(currentMeta.hero_height ? currentMeta.hero_height : heroDefaults.heroHeightDefault),
                    min: 0,
                    max: 100,
                    step: 1,
                    onChange: (newValue) => {
                      sendUpdate('hero_height', `${newValue}`)
                    }
                  })
                )
              ),
            )
          )
        )
      )
    }
  })
})()
