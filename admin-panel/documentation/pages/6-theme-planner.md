# Theme Planner

The **Theme Planner** is a shortcut for choosing your site's main colors. Instead of picking every shade by hand in the Customizer, you choose one **Primary** color and the Planner works out the lighter shades for you — and can suggest matching **Secondary** and **Accent** colors.

Find it under **Appearance → Theme Planner**.

## Before you start

Open **Appearance → Customize** once and close it again before you use the Theme Planner for the first time.

The theme's colors are only written into the database the first time the Customizer is opened. If you go straight to the Theme Planner on a brand-new site, the color pickers will show black instead of the theme's real starting colors, and saving would store black. Opening the Customizer once avoids this.

## How the page is laid out

The page has three blocks of controls, one per color family.

### Primary

- **Primary color** — the color picker. This is your main brand color, and it should be the darkest of the family.
- Below it sit four swatches: **Primary 100**, **Primary 200**, **Primary 300**, and **Primary 400**. Only the first one (100) is the color you picked. The other three are generated automatically by mixing your color with white — 200 is slightly lighter, 300 lighter again, and 400 the lightest. You cannot edit them here.

### Secondary

- **Secondary color** — the picker for your supporting color.
- The same four generated swatches: **Secondary 100** through **Secondary 400**.

### Accent

- **Accent color** — a single highlight color, used for things like link hovers and button accents.
- Accent has no lighter shades — it is one color on its own.

## Getting colour suggestions

Underneath the Primary swatches there is a suggestions box. It looks at the Primary color you picked and proposes a Secondary and an Accent that sit well with it.

**Suggestion type** chooses the kind of color relationship you want:

- *Split complementary* — the default. Two colors from the opposite side of the color wheel. Good contrast while still feeling co-ordinated.
- *Triadic* — three colors spaced evenly around the wheel. Bolder and more colorful.
- *Analogous* — colors sitting next to your Primary on the wheel. Calm and harmonious.

The rest of the box:

- Two small circles show the proposed colors, labelled **→ Secondary** and **→ Accent**.
- **Swap** — flips the two suggestions, so the one headed for Secondary goes to Accent instead. This only changes the preview.
- **Apply to Secondary & Accent** — takes the two previewed colors and drops them into the real Secondary and Accent pickers above, regenerating their shades.

Nothing is saved while you experiment with suggestions. Applying a suggestion only fills in the pickers — you still have to save.

## Saving

Click **Save Colors**. The page reloads with a **Colors saved.** message at the top.

Saving does two things:

- It stores the nine colors (four Primary, four Secondary, and Accent) as your site colors — the very same values that live in **Appearance → Customize → Site Colors**.
- It rebuilds the site's stylesheet, so visitors see the new colors straight away.

## What the Theme Planner does not touch

The Planner only manages the Primary family, the Secondary family, and Accent. Everything else in your palette is left exactly as it was:

- White, Off White, and the four greys
- Black
- ADA Outlines (the accessibility focus-outline color)
- Error (used for emergency notifications and form errors)

To change any of those — or to set an individual Primary or Secondary shade by hand rather than letting it be generated — use **Appearance → Customize → Site Colors**.

> Important: the Theme Planner **overwrites** the Primary, Secondary, and Accent colors you may have already set in the Customizer. If you have hand-tuned those shades, export your settings first from **Settings → Theme Settings** so you can get them back.

## Which tool should I use?

- Starting a new site, or want a whole palette quickly? Use the **Theme Planner**.
- Adjusting one specific shade, a grey, or deciding which color is used for a particular part of the site (header background, button text, and so on)? Use **Appearance → Customize → Site Colors**.

The two tools edit the same colors, so you can move between them freely.
