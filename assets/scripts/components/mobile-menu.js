import { cacheDom } from '../utils/dom.js';

const dom = {}
const qs = {
  mobileMenu: 'data-mobile-menu',
  openMenu: 'data-open-mobile-menu',
}
const qsAll = {
  closeMenu: 'data-close-mobile-menu'
}

export const setupMobileMenu = () => {
  cacheDom(dom, qs, qsAll)

  dom.openMenu.addEventListener('click', () => dom.mobileMenu.classList.add('open'))
  dom.closeMenu.forEach((closeButton) => {
    closeButton.addEventListener('click', () => dom.mobileMenu.classList.remove('open'))
  })
}