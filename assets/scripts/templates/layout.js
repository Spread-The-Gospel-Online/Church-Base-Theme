import '../utils/state.js'
import '../web-components/html-if.js'

import { setupMobileMenu } from '../components/mobile-menu.js'
import '../components/search.js'
import '../components/forms.js'

document.addEventListener('DOMContentLoaded', () => {
  window.setState('searchOpen', false)
  setupMobileMenu()
})