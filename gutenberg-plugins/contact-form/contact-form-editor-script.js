(() => {
  const el = window.wp.element.createElement
  const { Fragment, useEffect } = window.wp.element
  const { registerBlockType } = window.wp.blocks
  const { InnerBlocks, InspectorControls, useBlockProps } = window.wp.blockEditor
  const { PanelBody, TextControl, ToggleControl, TextareaControl, SelectControl } = window.wp.components

  // The Form only permits the contact-form input blocks plus a handful of core
  // layout/content blocks as direct children.
  const ALLOWED_BLOCKS = [
    'church/block-text-input',
    'church/block-select',
    'church/block-email',
    'church/block-checkbox',
    'church/block-submit',
    'core/paragraph',
    'core/group',
    'core/columns',
    'core/table',
  ]

  // FORM ---------------------------------------------------------------------
  // InnerBlocks container. save() returns InnerBlocks.Content so the child block
  // delimiters persist in post_content; the PHP render_callback wraps the rendered
  // children in a <form>.
  registerBlockType('church/block-form', {
    title: 'Form',
    attributes: {
      // non-empty so global-filters/layouts.js keeps injecting the spacing attrs
      submissionType: { type: 'string', default: 'email' }, // 'email' | 'endpoint'
      emailAddresses: { type: 'string', default: '' },
      endpointUrl: { type: 'string', default: '' },
      formName: { type: 'string', default: '' },
      formId: { type: 'string', default: '' }, // auto-generated; keys the recipients option
    },
    // color + typography supports surface the default "Styles" tab in the inspector
    supports: {
      color: { background: true, text: true, gradients: true, link: true },
      typography: { fontSize: true, lineHeight: true },
    },
    edit: function ({ attributes, setAttributes }) {
      const blockProps = useBlockProps({ className: 'church-contact-form' })
      // Generate a stable per-form id once. The render callback stores the recipients
      // under a theme option keyed by this id; the endpoint reads them server-side.
      useEffect(() => {
        if (!attributes.formId) {
          setAttributes({ formId: 'form-id-' + Math.random().toString(36).slice(2) + Date.now().toString(36) })
        }
      }, [])
      return el(
        Fragment,
        {},
        el(
          InspectorControls,
          {},
          el(
            PanelBody,
            { title: 'Form Submission' },
            el(TextControl, {
              label: 'Form name',
              help: 'Shown in the submission email subject',
              value: attributes.formName,
              onChange: (formName) => setAttributes({ formName }),
            }),
            el(SelectControl, {
              label: 'On submit',
              value: attributes.submissionType,
              options: [
                { label: 'Send email', value: 'email' },
                { label: 'Post to endpoint', value: 'endpoint' },
              ],
              onChange: (submissionType) => setAttributes({ submissionType }),
            }),
            attributes.submissionType === 'email'
              ? el(TextControl, {
                  label: 'Email addresses',
                  help: 'Comma-separated recipients',
                  value: attributes.emailAddresses,
                  onChange: (emailAddresses) => setAttributes({ emailAddresses }),
                })
              : el(TextControl, {
                  label: 'Endpoint URL',
                  value: attributes.endpointUrl,
                  onChange: (endpointUrl) => setAttributes({ endpointUrl }),
                })
          )
        ),
        el(
          'form',
          blockProps,
          el(InnerBlocks, {
            allowedBlocks: ALLOWED_BLOCKS,
            template: [
              ['church/block-text-input'],
              ['church/block-email'],
              ['church/block-submit'],
            ],
          })
        )
      )
    },
    save: function () {
      return el(InnerBlocks.Content)
    },
  })

  // TEXT INPUT ---------------------------------------------------------------
  registerBlockType('church/block-text-input', {
    title: 'Text Input',
    ancestor: ['church/block-form'],
    attributes: {
      label: { type: 'string', default: 'Label' },
      name: { type: 'string', default: '' },
      placeholder: { type: 'string', default: '' },
      required: { type: 'boolean', default: false },
    },
    edit: function ({ attributes, setAttributes }) {
      return el(
        'div',
        { className: 'church-form-field' },
        el(
          InspectorControls,
          {},
          el(
            PanelBody,
            { title: 'Field Settings' },
            el(TextControl, {
              label: 'Label',
              value: attributes.label,
              onChange: (label) => setAttributes({ label }),
            }),
            el(TextControl, {
              label: 'Name',
              value: attributes.name,
              onChange: (name) => setAttributes({ name }),
            }),
            el(TextControl, {
              label: 'Placeholder',
              value: attributes.placeholder,
              onChange: (placeholder) => setAttributes({ placeholder }),
            }),
            el(ToggleControl, {
              label: 'Required',
              checked: attributes.required,
              onChange: (required) => setAttributes({ required }),
            })
          )
        ),
        el('label', {}, attributes.label),
        el('input', { type: 'text', placeholder: attributes.placeholder, disabled: true })
      )
    },
    save: function () {
      return null
    },
  })

  // EMAIL --------------------------------------------------------------------
  registerBlockType('church/block-email', {
    title: 'Email',
    ancestor: ['church/block-form'],
    attributes: {
      label: { type: 'string', default: 'Email' },
      name: { type: 'string', default: 'email' },
      placeholder: { type: 'string', default: '' },
      required: { type: 'boolean', default: false },
    },
    edit: function ({ attributes, setAttributes }) {
      return el(
        'div',
        { className: 'church-form-field' },
        el(
          InspectorControls,
          {},
          el(
            PanelBody,
            { title: 'Field Settings' },
            el(TextControl, {
              label: 'Label',
              value: attributes.label,
              onChange: (label) => setAttributes({ label }),
            }),
            el(TextControl, {
              label: 'Name',
              value: attributes.name,
              onChange: (name) => setAttributes({ name }),
            }),
            el(TextControl, {
              label: 'Placeholder',
              value: attributes.placeholder,
              onChange: (placeholder) => setAttributes({ placeholder }),
            }),
            el(ToggleControl, {
              label: 'Required',
              checked: attributes.required,
              onChange: (required) => setAttributes({ required }),
            })
          )
        ),
        el('label', {}, attributes.label),
        el('input', { type: 'email', placeholder: attributes.placeholder, disabled: true })
      )
    },
    save: function () {
      return null
    },
  })

  // SELECT -------------------------------------------------------------------
  registerBlockType('church/block-select', {
    title: 'Select',
    ancestor: ['church/block-form'],
    attributes: {
      label: { type: 'string', default: 'Select' },
      name: { type: 'string', default: '' },
      options: { type: 'string', default: '' }, // one option per line
      required: { type: 'boolean', default: false },
    },
    edit: function ({ attributes, setAttributes }) {
      const options = (attributes.options || '')
        .split('\n')
        .map((option) => option.trim())
        .filter(Boolean)

      return el(
        'div',
        { className: 'church-form-field' },
        el(
          InspectorControls,
          {},
          el(
            PanelBody,
            { title: 'Field Settings' },
            el(TextControl, {
              label: 'Label',
              value: attributes.label,
              onChange: (label) => setAttributes({ label }),
            }),
            el(TextControl, {
              label: 'Name',
              value: attributes.name,
              onChange: (name) => setAttributes({ name }),
            }),
            el(TextareaControl, {
              label: 'Options (one per line)',
              value: attributes.options,
              onChange: (options) => setAttributes({ options }),
            }),
            el(ToggleControl, {
              label: 'Required',
              checked: attributes.required,
              onChange: (required) => setAttributes({ required }),
            })
          )
        ),
        el('label', {}, attributes.label),
        el(
          'select',
          { disabled: true },
          options.map((option, index) => el('option', { key: index }, option))
        )
      )
    },
    save: function () {
      return null
    },
  })

  // CHECKBOX -----------------------------------------------------------------
  registerBlockType('church/block-checkbox', {
    title: 'Checkbox',
    ancestor: ['church/block-form'],
    attributes: {
      label: { type: 'string', default: 'Checkbox' },
      name: { type: 'string', default: '' },
      required: { type: 'boolean', default: false },
    },
    edit: function ({ attributes, setAttributes }) {
      return el(
        'div',
        { className: 'church-form-field' },
        el(
          InspectorControls,
          {},
          el(
            PanelBody,
            { title: 'Field Settings' },
            el(TextControl, {
              label: 'Label',
              value: attributes.label,
              onChange: (label) => setAttributes({ label }),
            }),
            el(TextControl, {
              label: 'Name',
              value: attributes.name,
              onChange: (name) => setAttributes({ name }),
            }),
            el(ToggleControl, {
              label: 'Required',
              checked: attributes.required,
              onChange: (required) => setAttributes({ required }),
            })
          )
        ),
        el(
          'label',
          {},
          el('input', { type: 'checkbox', disabled: true }),
          ' ',
          attributes.label
        )
      )
    },
    save: function () {
      return null
    },
  })

  // SUBMIT -------------------------------------------------------------------
  registerBlockType('church/block-submit', {
    title: 'Submit',
    ancestor: ['church/block-form'],
    attributes: {
      text: { type: 'string', default: 'Submit' },
      buttonType: { type: 'string', default: 'primary' },
    },
    edit: function ({ attributes, setAttributes }) {
      return el(
        'div',
        { className: 'church-form-field' },
        el(
          InspectorControls,
          {},
          el(
            PanelBody,
            { title: 'Button Settings' },
            el(TextControl, {
              label: 'Button Text',
              value: attributes.text,
              onChange: (text) => setAttributes({ text }),
            }),
            el(SelectControl, {
              label: 'Button Type',
              value: attributes.buttonType,
              options: [
                { label: 'Primary', value: 'primary' },
                { label: 'Secondary', value: 'secondary' },
                { label: 'Accent', value: 'accent' },
              ],
              onChange: (buttonType) => setAttributes({ buttonType }),
            })
          )
        ),
        el(
          'button',
          {
            type: 'button',
            disabled: true,
            className: 'button button--' + attributes.buttonType,
          },
          attributes.text
        )
      )
    },
    save: function () {
      return null
    },
  })
})()
