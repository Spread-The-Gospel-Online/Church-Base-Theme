import { cacheDom } from '../utils/dom.js'

const dom = {}
const qsAll = {
	images: '.parallax img'
}

document.addEventListener('DOMContentLoaded', () => {
	cacheDom(dom, {}, qsAll, false)

	setParallaxPositions()
	document.addEventListener('scroll', () => {
		setParallaxPositions()
	})
})

const setParallaxPositions = () => {
	const documentPosition = document.documentElement.clientHeight / 2
	dom.images.forEach((image) => {
		const imageInfo = image.getBoundingClientRect()
		const imagePosition = imageInfo.height / 2 + imageInfo.top
		const position = (documentPosition - imagePosition) * 65.0 / documentPosition
		image.style.setProperty('--parallax-position', `${Math.max(-100, Math.min(position, 100)) / 2.0 + 50}%`)
	})
}