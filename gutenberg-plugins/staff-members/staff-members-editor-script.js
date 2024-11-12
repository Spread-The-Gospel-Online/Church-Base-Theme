const blockNameStaff = 'church/block-staff-members'

window.wp.hooks.addFilter(
  'editor.BlockEdit',
  'church/block-staff-members',
  wp.compose.createHigherOrderComponent(function (BlockEdit) {
    return function (props) {
      if (props.name !== blockNameStaff) return el(wp.element.Fragment, {}, el(BlockEdit, props))
      return el(
        wp.element.Fragment, 
        {}, 
        el(BlockEdit, props),
        el(
          wp.editor.InspectorControls, {}, el(
            Fields.PanelBody, {},
            el('details', {style: { 'marginBottom': '2rem' }},
              el('summary', {},
                'Select Staff'
              ),
              ...window.staffData.staff.reduce((allStaff, staffMember) => {
                allStaff.push(el('div', {},
                  el('input', {
                    id: `staff-member-${staffMember.ID}`,
                    type: 'checkbox',
                    defaultChecked: (props.attributes.staffIDs || '').split(',').includes(`${staffMember.ID}`),
                    onChange: (event) => {
                      const attributeAsArray = (props.attributes.staffIDs || '').split(',')
                      if (attributeAsArray.includes(`${staffMember.ID}`)) {
                        attributeAsArray.splice(attributeAsArray.indexOf(`${staffMember.ID}`), 1)
                      } else {
                        attributeAsArray.push(staffMember.ID)
                      }
                      props.setAttributes({ staffIDs: attributeAsArray.join(',') })
                    }
                  }),
                  el('label', { for: `staff-member-${staffMember.ID}` }, staffMember.post_title)
                ))
                return allStaff
              }, [])
            ),
            el(Fields.RangeControl, {
              label: 'Number of Columns',
              value: props.attributes.numberOfColumns,
              initialPosition: 2,
              min: 1,
              max: 4,
              onChange: function (e) {
                props.setAttributes({ numberOfColumns: e });
              }
            }),
            el(Fields.SelectControl, {
              label: 'Staff Layout',
              value: props.attributes.staffLayout,
              options: [
                { value: 'expanded', label: 'Expanded' },
                { value: 'compact', label: 'Compact' }
              ],
              onChange: function (e) {
                props.setAttributes({ staffLayout: e });
              }
            }),
            el(Fields.SelectControl, {
              label: 'Image/Text Layout',
              value: props.attributes.imageTextLayout,
              options: [
                { value: 'horizontal', label: 'Side by side' },
                { value: 'vertical', label: 'Stacked' }
              ],
              onChange: function (e) {
                props.setAttributes({ imageTextLayout: e });
              }
            }),
            el(Fields.RangeControl, {
              label: 'Image Width',
              value: props.attributes.imageWidth,
              initialPosition: 100,
              min: 10,
              max: 650,
              onChange: function (e) {
                props.setAttributes({ imageWidth: e });
              }
            }),
          )
        )
      )
    }
  })
)

// Register the block
registerBlockType(blockNameStaff, {
  title: 'Staff Members',
  attributes: {
    staffIDs: {
      type: "string"
    },
    numberOfColumns: {
      type: "number"
    },
    staffLayout: {
      type: "string"
    },
    imageTextLayout: {
      type: "string"
    },
    imageWidth: {
      type: "number"
    },
  },
  edit: function ({ attributes }) {
    setTimeout(() => loadStaffMembers(attributes), 3000)
    return el('div', {
      'data-get-staff-members': attributes.staffIDs ? attributes.staffIDs : 'nostaff'
    }, 'loading...')
  },
  save: function () {
    return null
  },
})


const loadStaffMembers = (attributes) => {
  console.log(attributes)
  const staffWrappers = document.querySelectorAll(`[data-get-staff-members="${attributes.staffIDs}"]`)
  
  staffWrappers.forEach((wrapper) => {
    fetch(`/church/wp-json/church/v1/getServerContentsStaff?staffIDs=${attributes.staffIDs}&numberOfColumns=${attributes.numberOfColumns}&staffLayout=${attributes.staffLayout}&imageTextLayout=${attributes.imageTextLayout}&imageWidth=${imageWidth}`)
      .then((blob) => blob.text())
      .then((data) => {
        wrapper.innerHTML = data
        const innerLinks = wrapper.querySelectorAll('a')
        innerLinks.forEach((link) => link.removeAttribute('href'))
      })
  })
}