import { setupObservers } from '../utils/observers.js'

const qs = {
  headerTrigger: '[data-fixed-header-observer]'
}

document.addEventListener('DOMContentLoaded', () => {
  setupObservers({
    queryString: qs.headerTrigger,
    callback: (trigger, observer, isIntersecting) => {
      if (isIntersecting) {
        document.body.classList.remove('body-scrolled')
      } else {
        document.body.classList.add('body-scrolled')
      }
    }
  })
})