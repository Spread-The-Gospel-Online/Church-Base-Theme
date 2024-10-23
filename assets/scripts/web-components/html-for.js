class HTMLFor extends HTMLElement {
  constructor () {
    super()

    this.template = document.createElement('div')
    this.template.innerHTML = this.innerHTML

    this.stateItem = this.getAttribute('each')
    this.setInnerItems()

    watchState(this.stateItem, (items) => {
      this.items = items
      this.setInnerItems()
    })
  }

  setInnerItems () {
    this.innerHTML = ''
    this.items && this.items.forEach((parentItem) => {
      const newEl = this.template.cloneNode(true)
      newEl.querySelectorAll('[item]').forEach((item) => {
        const prop = item.getAttribute('item')
        item.innerHTML = parentItem[prop]
      })
      this.appendChild(newEl)
    })
  }
}

document.addEventListener('DOMContentLoaded', () => {
  customElements.define('html-for', HTMLFor)
})