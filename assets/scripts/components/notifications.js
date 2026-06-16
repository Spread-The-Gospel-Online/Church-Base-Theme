// Notification toasts render hidden. On load we reveal only the toasts the user hasn't
// already dismissed this session; dismissing a toast records its id so it stays hidden
// for the rest of the session. Closed ids are kept as an array under the sessionStorage
// key 'closed-toasts'.

const STORAGE_KEY = 'closed-toasts'

const getClosedToasts = () => {
  try {
    const stored = sessionStorage.getItem(STORAGE_KEY)
    return stored ? JSON.parse(stored) : []
  } catch (error) {
    return []
  }
}

const addClosedToast = (id) => {
  const closed = getClosedToasts()
  if (!closed.includes(id)) {
    sessionStorage.setItem(STORAGE_KEY, JSON.stringify([...closed, id]))
  }
}

document.addEventListener('DOMContentLoaded', () => {
  const closedToasts = getClosedToasts()

  document.querySelectorAll('[data-notification-toast]').forEach((toast) => {
    const id = toast.getAttribute('data-toast-id')

    // Reveal toasts the user hasn't dismissed this session.
    if (!closedToasts.includes(id)) {
      toast.classList.remove('hidden')
    }

    const closeButton = toast.querySelector('[data-notification-dismiss]')
    if (!closeButton) {
      return
    }

    closeButton.addEventListener('click', () => {
      addClosedToast(id)
      toast.classList.add('toast--dismissing')
      toast.addEventListener('transitionend', () => {
        toast.remove()
      }, { once: true })
    })
  })
})
