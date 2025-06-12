import { cacheDom } from '../utils/dom.js'

const dom = {}
const qs = {
	wrapper: 'data-calendar-wrapper',
	previousMonth: 'data-previous-month',
	nextMonth: 'data-next-month',
}

const setupListeners = () => {
	cacheDom(dom, qs)
	
	dom.previousMonth.addEventListener('click', setupPreviousMonthListener)
	dom.nextMonth.addEventListener('click', setupNextMonthListener)
}

const setupPreviousMonthListener = () => setupMonthListener(dom.previousMonth.getAttribute(qs.previousMonth))
const setupNextMonthListener = () => setupMonthListener(dom.nextMonth.getAttribute(qs.nextMonth))

const setupMonthListener = (monthToFetch) => {
	fetch(`${window.wpApiSettings.root}church/v1/getServerContentsCalendar?date=${monthToFetch}`)
		.then((blob) => blob.text())
		.then((response) => {
			dom.previousMonth.removeEventListener('click', setupPreviousMonthListener)
			dom.nextMonth.removeEventListener('click', setupNextMonthListener)

			const htmlObject = document.createElement('div')
			htmlObject.innerHTML = response
			console.log(htmlObject.querySelector(`[${qs.wrapper}]`))
			dom.wrapper.innerHTML = htmlObject.querySelector(`[${qs.wrapper}]`).innerHTML

			setupListeners()
		})
}

document.addEventListener('DOMContentLoaded', setupListeners)