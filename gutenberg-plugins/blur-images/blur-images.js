(() => {
  const el = window.wp.element.createElement;
  const { Fragment } = window.wp.element;
  const { createHigherOrderComponent } = window.wp.compose;
  const { PanelBody, ToggleControl } = window.wp.components;
  const { InspectorControls } = window.wp.blockEditor;

  const BLUR_BLOCKS = ['core/image', 'core/cover'];

  // no default, so untouched blocks keep following the theme setting
  wp.hooks.addFilter('blocks.registerBlockType', 'church/blur-images-attribute', (settings, name) => {
    if (!BLUR_BLOCKS.includes(name)) {
      return settings;
    }
    return {
      ...settings,
      attributes: {
        ...settings.attributes,
        blurImage: { type: 'boolean' },
      },
    };
  });

  wp.hooks.addFilter('editor.BlockEdit', 'church/blur-images-control', createHigherOrderComponent((BlockEdit) => {
    return (props) => {
      if (!BLUR_BLOCKS.includes(props.name)) {
        return el(BlockEdit, props);
      }
      const { attributes, setAttributes } = props;
      const isBlurred = attributes.blurImage ?? window.churchBlurImagesDefault;

      return el(Fragment, {},
        el(BlockEdit, props),
        el(InspectorControls, {},
          el(PanelBody, { title: 'Blur Image' },
            el(ToggleControl, {
              label: 'Blur image while loading',
              checked: isBlurred,
              onChange: (blurImage) => {
                setAttributes({ blurImage });
              },
            })
          )
        )
      );
    };
  }, 'withBlurImageControl'));
})();
