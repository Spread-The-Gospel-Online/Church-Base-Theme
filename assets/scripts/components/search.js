import { cacheDom } from '../utils/dom.js';

const dom = {}
const qs = {
  searchBox: 'search-box',
  searchInput: 'search-input'
}

const handleFormSubmit = (event) => {
  event.preventDefault()
  const query = dom.searchInput.value
}

document.addEventListener('DOMContentLoaded', () => {
  cacheDom(dom, qs)

  if (dom.searchBox.hasAttribute('is-ajax')) {
    dom.searchBox.addEventListener('submit', handleFormSubmit)
  }

  window.watchState('searchOpen', (isOpen) => {
    if (isOpen) {
      document.body.classList.add('search-open')
    } else {
      document.body.classList.remove('search-open')
    }
  })
})

document.addEventListener('keydown', (event) => {
  if (event.keyCode === 27) {
    window.setState('searchOpen', false)
  }
})

window.watchState('searchOpen', (isOpen) => {
  if (isOpen) {
    setTimeout(() => dom.searchInput.focus(), 0)
  }
})