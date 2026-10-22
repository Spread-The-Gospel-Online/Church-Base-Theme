// Theme Planner — generate lighter shades for each family and harmony-based
// Secondary/Accent suggestions from the picked Primary. Vanilla JS, no jQuery.

const hexToRgb = (hex) => {
  const value = hex.replace('#', '')
  const full = value.length === 3
    ? value.split('').map((char) => char + char).join('')
    : value
  return {
    r: parseInt(full.slice(0, 2), 16),
    g: parseInt(full.slice(2, 4), 16),
    b: parseInt(full.slice(4, 6), 16)
  }
}

const rgbToHex = ({ r, g, b }) => {
  const toHex = (channel) => Math.round(channel).toString(16).padStart(2, '0')
  return `#${toHex(r)}${toHex(g)}${toHex(b)}`
}

// Tint a color toward white by `amount` (0–1).
const lighten = (hex, amount) => {
  const { r, g, b } = hexToRgb(hex)
  const tint = (channel) => channel + (255 - channel) * amount
  return rgbToHex({ r: tint(r), g: tint(g), b: tint(b) })
}

const rgbToHsl = ({ r, g, b }) => {
  const rn = r / 255
  const gn = g / 255
  const bn = b / 255
  const max = Math.max(rn, gn, bn)
  const min = Math.min(rn, gn, bn)
  const delta = max - min
  const l = (max + min) / 2

  if (delta === 0) {
    return { h: 0, s: 0, l }
  }

  const s = delta / (1 - Math.abs(2 * l - 1))
  let h = 0
  if (max === rn) {
    h = ((gn - bn) / delta) % 6
  } else if (max === gn) {
    h = (bn - rn) / delta + 2
  } else {
    h = (rn - gn) / delta + 4
  }
  h *= 60
  if (h < 0) {
    h += 360
  }
  return { h, s, l }
}

const hslToRgb = ({ h, s, l }) => {
  const chroma = (1 - Math.abs(2 * l - 1)) * s
  const hp = h / 60
  const x = chroma * (1 - Math.abs((hp % 2) - 1))

  let channels = [0, 0, 0]
  if (hp < 1) {
    channels = [chroma, x, 0]
  } else if (hp < 2) {
    channels = [x, chroma, 0]
  } else if (hp < 3) {
    channels = [0, chroma, x]
  } else if (hp < 4) {
    channels = [0, x, chroma]
  } else if (hp < 5) {
    channels = [x, 0, chroma]
  } else {
    channels = [chroma, 0, x]
  }

  const m = l - chroma / 2
  return {
    r: (channels[0] + m) * 255,
    g: (channels[1] + m) * 255,
    b: (channels[2] + m) * 255
  }
}

// Rotate a color's hue by `deg` on the HSL wheel, keeping saturation/lightness.
const rotateHue = (hex, deg) => {
  const hsl = rgbToHsl(hexToRgb(hex))
  return rgbToHex(hslToRgb({ ...hsl, h: ((hsl.h + deg) % 360 + 360) % 360 }))
}

// Harmony schemes: the two hue offsets (degrees) applied to the primary color.
const SCHEMES = {
  'split-complementary': [150, 210],
  'triadic': [90, 270],
  'analogous': [30, -30]
}

// The two suggested colors for a base color under the given scheme.
const computeSuggestions = (baseHex, scheme) => {
  const offsets = SCHEMES[scheme] || SCHEMES['split-complementary']
  return offsets.map((deg) => rotateHue(baseHex, deg))
}

// Whether the two suggestions are swapped between their Secondary/Accent targets.
let suggestionsSwapped = false

// The colors currently destined for the Secondary and Accent inputs, read live
// from the primary picker + selected scheme (respecting the swap toggle).
const currentTargets = () => {
  const primary = document.querySelector('[data-tp-picker][data-family="primary"]')
  const scheme = document.querySelector('[data-tp-scheme]')
  if (!primary || !scheme) {
    return { secondary: '#000000', accent: '#000000' }
  }
  const [first, second] = computeSuggestions(primary.value, scheme.value)
  return suggestionsSwapped
    ? { secondary: second, accent: first }
    : { secondary: first, accent: second }
}

// Update the two preview swatches only — never touches the real inputs.
const renderSuggestions = () => {
  const targets = currentTargets()
  const secondarySwatch = document.querySelector('[data-tp-suggestion="secondary"]')
  const accentSwatch = document.querySelector('[data-tp-suggestion="accent"]')
  if (secondarySwatch) {
    secondarySwatch.style.background = targets.secondary
  }
  if (accentSwatch) {
    accentSwatch.style.background = targets.accent
  }
}

const setSwatch = (family, shade, hex) => {
  const swatch = document.querySelector(
    `[data-tp-swatch][data-family="${family}"][data-shade="${shade}"]`
  )
  if (swatch) {
    swatch.style.background = hex
  }
}

// Regenerate a family's lighter variants (swatches + hidden inputs) from its
// picked -100 color. Called only when the user changes a picker.
const regenerateFamily = (family, baseHex) => {
  setSwatch(family, '100', baseHex)

  document
    .querySelectorAll(`[data-tp-variant][data-family="${family}"]`)
    .forEach((input) => {
      const shadeHex = lighten(baseHex, parseFloat(input.dataset.lighten))
      input.value = shadeHex
      setSwatch(family, input.dataset.shade, shadeHex)
    })

  if (family === 'primary') {
    renderSuggestions()
  }
}

const applyColor = (family, hex) => {
  const picker = document.querySelector(`[data-tp-picker][data-family="${family}"]`)
  if (!picker) {
    return
  }
  // Assigning .value doesn't fire an input event, so regenerate manually.
  picker.value = hex
  regenerateFamily(family, hex)
}

const init = () => {
  document.querySelectorAll('[data-tp-picker]').forEach((picker) => {
    // Regenerate that family's ramp live as its color changes. Stored variant
    // values stay untouched on load — only user input triggers regeneration.
    picker.addEventListener('input', () => {
      regenerateFamily(picker.dataset.family, picker.value)
    })
  })

  // Suggestion type dropdown → refresh the preview swatches.
  const scheme = document.querySelector('[data-tp-scheme]')
  if (scheme) {
    scheme.addEventListener('change', renderSuggestions)
  }

  // Swap → flip which suggestion targets Secondary vs Accent.
  const swap = document.querySelector('[data-tp-swap]')
  if (swap) {
    swap.addEventListener('click', () => {
      suggestionsSwapped = !suggestionsSwapped
      renderSuggestions()
    })
  }

  // Apply → push both suggestions into the real Secondary/Accent inputs.
  const apply = document.querySelector('[data-tp-apply-suggestions]')
  if (apply) {
    apply.addEventListener('click', () => {
      const targets = currentTargets()
      applyColor('secondary', targets.secondary)
      applyColor('accent', targets.accent)
    })
  }

  // Seed the preview swatches once (display only, does not alter inputs).
  renderSuggestions()
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', init)
} else {
  init()
}
