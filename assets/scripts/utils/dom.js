export function cacheDom (dom, selectors = {}, selectorsAll = {}, assumeAttributes = true) {
  Object.keys(selectors).forEach((selectorName) => {
    const selector = selectors[selectorName];
    const qs = assumeAttributes ? `[${selector}]` : selector;
    dom[selectorName] = document.querySelector(qs) || false;
  });

  Object.keys(selectorsAll).forEach((selectorName) => {
    const selector = selectorsAll[selectorName];
    const qs = assumeAttributes ? `[${selector}]` : selector;
    dom[selectorName] = [...document.querySelectorAll(qs)];
  });
};