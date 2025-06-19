import { cacheDom } from '../utils/dom.js';

const dom = {}
const qsAll = {
	ajaxForms: 'ajax-form'
}

document.addEventListener('DOMContentLoaded', () => {
	cacheDom(dom, {}, qsAll)

	dom.ajaxForms.forEach((form) => {
		form.addEventListener('submit', (event) => {
			event.preventDefault()
			const formEndpoint = form.getAttribute('action')
			const formMethod = form.getAttribute('method')
			const formInputs = form.querySelectorAll('input, textarea')
			// build object to send in the fetch
			const dataToSend = [...formInputs].reduce((currentData, input) => {
				if (input.getAttribute('type') == 'checkbox') {
					currentData[input.getAttribute('name')] = input.checked
				} else {
					currentData[input.getAttribute('name')] = input.value
				}
				return currentData
			}, {})
			// send request
			fetch(formEndpoint, {
				method: formMethod,
				headers: { "Content-Type": "application/json" },
				body: JSON.stringify(dataToSend)
			})
				.then((blob) => blob.text())
				.then((response) => {
					form.innerHTML = response
				})
		})
	})
})