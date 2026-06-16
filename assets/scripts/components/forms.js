// Intercepts contact-form submissions and POSTs the fields as JSON.
// A form's `action` holds either a custom endpoint URL or the literal "email":
//   - action !== "email"  -> POST the fields to that endpoint URL
//   - action === "email"  -> POST the fields to the church/v1/form-submit endpoint
// Only loaded on pages that contain the form block (see footer.php).

const REST_ROOT = (window.wpApiSettings && window.wpApiSettings.root) || `${window.siteURL || ''}/wp-json/`;
const FORM_SUBMIT_URL = `${REST_ROOT}church/v1/form-submit`;

document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('[data-ajax-form]').forEach((form) => {
    form.addEventListener('submit', async (event) => {
      event.preventDefault();

      const action = form.getAttribute('action');
      const fields = [...form.querySelectorAll('input, textarea, select')].reduce((data, field) => {
        if (!field.name) return data;

        const value = field.type === 'checkbox'
          ? field.checked
          : field.value;

        return {
          ...data,
          [field.name]: value,
        };
      }, {});

      const url = action && action !== 'email'
        ? action
        : FORM_SUBMIT_URL;

      // res.ok is true only for HTTP 200-299; a network failure rejects and counts as an error.
      let ok = false;
      try {
        const res = await fetch(url, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(fields),
        });
        ok = res.ok;
      } catch (error) {
        console.error('Form submit failed', error);
      }

      // Without a Form Response block there is nothing to reveal; leave the form untouched.
      const successMessage = form.querySelector('[data-form-response-success]');
      const errorMessage = form.querySelector('[data-form-response-error]');
      if (!successMessage && !errorMessage) return;

      // Hide every field/control, then reveal the matching message.
      [...form.children].forEach((child) => {
        child.classList.add('hidden');
      });

      const message = ok
        ? successMessage
        : errorMessage;
      if (message) {
        message.classList.remove('hidden');
      }
    });
  });
});
