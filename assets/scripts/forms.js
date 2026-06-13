// Intercepts contact-form submissions and POSTs the fields as JSON.
// A form's `action` holds either a custom endpoint URL or the literal "email":
//   - action !== "email"  -> POST the fields to that endpoint URL
//   - action === "email"  -> POST the fields to the church/v1/form-submit endpoint
// Only loaded on pages that contain the form block (see footer.php).

const REST_ROOT = (window.wpApiSettings && window.wpApiSettings.root) || `${window.siteURL || ''}/wp-json/`;
const FORM_SUBMIT_URL = `${REST_ROOT}church/v1/form-submit`;

document.querySelectorAll('[data-ajax-form]').forEach((form) => {
  form.addEventListener('submit', (event) => {
    event.preventDefault();

    const action = form.getAttribute('action');
    const fields = [...form.querySelectorAll('input, textarea, select')].reduce((data, field) => {
      if (!field.name) return data;
      data[field.name] = field.type === 'checkbox' ? field.checked : field.value;
      return data;
    }, {});

    const url = action && action !== 'email' ? action : FORM_SUBMIT_URL;

    fetch(url, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(fields),
    }).catch((error) => console.error('Form submit failed', error));
  });
});
