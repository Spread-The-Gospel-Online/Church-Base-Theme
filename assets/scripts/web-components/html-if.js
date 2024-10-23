class HTMLIf extends HTMLElement {
  constructor () {
    super()

    this.statement = this.getAttribute('if')
    // set initial display
    this.setIsDisplayed()
    // add event listeners
    this.statement.split(' ').forEach((piece) => {
      if (piece.startsWith('state.')) {
        window.watchState(piece.replace('state.', ''), () => {
          this.setIsDisplayed()
        })
      }
    })
  }

  setIsDisplayed () {
    if (eval(this.statement)) {
      this.style.removeProperty('display')
    } else {
      this.style.display = 'none'
    }
  }
}

document.addEventListener('DOMContentLoaded', () => {
  customElements.define('html-if', HTMLIf)
})