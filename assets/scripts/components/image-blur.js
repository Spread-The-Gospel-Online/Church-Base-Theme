import { setupObservers } from '../utils/observers.js';

const BLUR_CLASS = 'image--blur';

/**
 * Swaps a blurred thumbnail for its full image once it enters the viewport,
 * removing the blur after the full image has finished loading.
 *
 * @param: {Node} image: the img element that entered/exited the viewport
 * @param: {Object} observer: the observer watching the image
 * @param: {boolean} isIntersecting: whether the image is in the viewport
 */
const loadFullImage = (image, observer, isIntersecting) => {
  if (!isIntersecting) {
    return;
  }
  if (observer) {
    observer.unobserve(image);
  }
  // attach before setting src so a cached image can't load before the listener exists
  image.addEventListener('load', () => {
    image.classList.remove(BLUR_CLASS);
  }, { once: true });
  image.setAttribute('src', image.getAttribute('data-full-image-url'));
};

setupObservers({
  queryString: '[data-full-image-url]',
  callback: loadFullImage,
});
