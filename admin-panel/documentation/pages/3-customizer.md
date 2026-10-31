# Customizer

The **Customizer** is where almost every styling choice on the site lives — colors, fonts, header and footer, the look of the hero banner, the cards on each archive, and much more. Open it from **Appearance → Customize**.

The Customizer shows a live preview of the site on the right while you make changes on the left. Nothing is saved until you click **Publish** at the top — feel free to try things out.

## Finding your way around a section

Most sections are long, so they are broken up by **grey sub-headings** that group related controls — for example *Header Layout*, *Logo*, *Header Typography*, and *Header Section Colors* inside **Header Settings**. Scroll to the sub-heading you want rather than reading every control.

Two things are worth knowing before you start:

- **Colors live with the thing they color.** The *Site Colors* section holds your palette, but the choice of *which* palette color each part of the site uses is made inside that part's own section, under a sub-heading ending in **Section Colors**. Footer colors are in *Footer Settings*, header colors in *Header Settings*, and so on.
- **Patterns switch settings off.** Several sections offer a *Pattern* choice. Picking a pattern hands that area's design over to you, so the built-in styling controls below it are hidden. See the *Patterns* page.

The theme also removes two standard Customizer sections it does not use: *Additional CSS* and *Homepage Settings*. Set your homepage under **Settings → Reading** instead.

## Brand and identity

These are the first sections to fill in, because they set the look that the rest of the site builds on.

### Church Info

Your church's **Church Name**, **Telephone**, **Email**, and **Address**. Several places on the site pull these in automatically.

### Site Colors

This section holds your **palette** — the fixed set of colors everything else chooses from:

- **Primary 100** through **Primary 400** — your main brand color, from darkest to lightest.
- **Secondary 100** through **Secondary 400** — a supporting color, again dark to light.
- **Accent** — a highlight color, used for things like link hovers.
- **White**, **Off White**, **Grey One** through **Grey Four**, and **Black** — the neutrals.
- **ADA Outlines** — the outline color shown around a control when someone navigates with a keyboard. Keep this clearly visible against your backgrounds.
- **Error** — used for error messages, such as a contact form that failed to send, and for *Emergency* notifications.

Everything except *Error* is also added to the color picker in the block editor, so the same palette is available when you write a page or post.

You do not have to pick all eleven brand shades by hand. **Appearance → Theme Planner** lets you choose one Primary color and generates the lighter shades and a matching Secondary and Accent for you — see the *Theme Planner* page.

### Typography Settings

The fonts the site uses, in four groups:

- **Custom Font Families** — up to three families. Each takes two values: the family parameter from a Google Fonts embed URL, and the matching CSS rule. The section shows an example of each.
- **Font Assignments** — which of your three families is used for **General** body text and for **Headings**. (Two more assignments live elsewhere: *Quotation Mark Family* in *Blockquotes Settings* and *Header Menu Family* in *Header Settings*.)
- **Typography Styling** — **Header Text Transform** (none or uppercase), plus letter spacing and line height for headings and for general text.
- **Font Sizes** — separate desktop and mobile sizes for **H1**, **H2**, **H3**, and general content.
- **Font Colors** — **Link Color**, **Link Color (Hover)**, and **General Content Color**.

## Overall layout

### General Settings

Site-wide values that affect every page:

- **Bible Version Used** — which translation Bible references link to (American Standard, English Standard, King James, New International, New King James, or Young's Literal). Used by the Logos Bible reference plugin.
- **Layout & Behavior** — **Content Width** in pixels; **Page Sidebar Position** (left or right); and **Image Parallax Effect**, which when enabled adds parallax tickboxes to Image and Cover blocks (see the *Blocks* page).
- **Typography** — **Base Font Size**, the baseline everything else scales from.
- **Theme Spacing** — **Default Padding Size** (small, medium, or large) and **Padding Scale**, which together set the padding that blocks use when left on "Theme Default".
- **Border Widths** — small, medium, and wide.
- **Border Radius** — small, medium, and large.

The border and radius sizes are reused by name throughout the site, so changing one here updates every component that uses it.

**About the page sidebar:** the sidebar is a navigation list of related pages, and it appears automatically on any page that has a parent page or has child pages beneath it. The *Page Sidebar Position* setting only decides which side it sits on.

### Header Settings

Everything about the bar at the top of every page:

- **Fixed Header** — not fixed, fixed on every screen size, or fixed on desktop only.
- **Transparent Fixed Header** — let the hero image show through the fixed header when one is present.
- **Logo Position** — **Left** (the default) puts the logo on the left, followed by the menu. **Center** places the menu on the left, the logo in the middle, and the search icon on the right. With a centered logo the menu is always left-aligned, so the *Header Menu Align* option is hidden.
- **Header Menu Align** — left, middle, or right. Only shown when the logo is on the left.
- **Header Logo Image** — upload your logo.
- **Logo Size (Default)** and **Logo Size (Scrolled)** — separate sizes for the normal state and for when a fixed header has shrunk on scroll.
- **Logo Vertical Padding** — space above and below the logo, set separately for mobile and desktop.
- **Header Typography** — **Header Menu Family**, font size, text transform, letter spacing, and font weight for the menu.
- **Header Section Colors** — header background, menu text and its hover color, and submenu background and text colors.

### Footer Settings

Controls the bottom of every page:

- **Footer Pattern** — choose one of your patterns to show in the footer. See the *Patterns* page.
- **Footer Pattern Width** — how much of the footer's width the pattern takes, as a percentage. The **Footer Menu** fills the remaining space beside it, so a smaller number gives the menu more room.
- **Footer Vertical Padding** — space above and below the footer content.
- **Display Copyright** and **Copyright Text** — the small print at the very bottom. Write `YYYY` anywhere in the text and the site substitutes the current year. The text box is hidden when the copyright is switched off.
- **Social Links** — Facebook, Twitter, Instagram, and YouTube profile URLs. These become the icon row at the top of the footer.
- **Footer Section Colors** — footer background and text, plus separate background and text colors for the copyright strip.

The footer always shows your **Footer Menu** (assigned under **Appearance → Menus**) alongside the pattern — as a column layout on desktop and as a collapsible accordion on phones.

### Hero Settings

The large banner at the top of most pages. Everything here is a **site-wide default** that any single page can override from its own Hero Settings sidebar (see the *Blocks* page):

- **Hero Default Height** — how tall the hero is when it has a background image, as a percentage of the visitor's screen.
- **Text Only Hero Height** — the height when there is no background image.
- **Hero Minimum Height** — a floor in pixels, so the hero never collapses too small on phones.
- **Hero Default Background Opacity** — how strong the overlay over the background image is.
- **Hero Section Colors** — **Hero Text** and **Hero Background**.

### Where hero images come from

There is no "hero image" setting. The hero uses the **featured image** of the page or item being viewed. When there isn't one, the theme works down this list until it finds an image:

1. The item's own featured image.
2. For sermons only, the **Default Sermon Image** from *Sermon Page Styles*.
3. The featured image of the archive page for that content type — the page whose slug matches the type, such as `sermons`.
4. The featured image of your homepage.
5. For pages only, the featured image of the parent page.

This is why setting a featured image on each archive page and on your homepage is worth doing early: it gives every other page a sensible banner for free.

### Breadcrumbs Settings

**Breadcrumbs** chooses where the trail of links sits — above the hero banner, at the top of it, at the bottom of it, beneath it, or not shown at all. **Breadcrumbs Background Opacity** controls the strip behind them, and **Breadcrumbs Section Colors** sets its background, text, and hover colors.

## How each kind of content looks

### General Archive

The look of the **general listing pages** — your blog posts, ministries, the sermon series list, and the sermons shown on a single series page. Anything that does not have a section of its own is styled here.

- **Archive Grid** — **Grid Size (Tablet)** (1 to 3 columns) and **Grid Size (Desktop)** (1 to 4 columns).
- **Default Card Image** — used when a post has no featured image of its own.
- **Card Pattern** — a **Card Contents Pattern** to design the card yourself. Choosing one hides the card settings below.
- **Archive Card Settings** — **Card Content Item Padding** and **Card Content Items Gap** (spacing inside the card and between its lines); **Card Content Position** (text below the image or on top of it); **Card Content Text Align**; **Card Text Content Background Opacity**; **Card Image Overlay Opacity** and its hover version; and **Card Aspect Ratio (Height)**, which sets the card image's shape.
- **Archive Section Colors** — card image overlay, card content background, text, and link colors.

By default these cards show the image, the title, and the excerpt — and the excerpt only appears if you have actually written one in the editor's Excerpt box.

### Sermon Archive Styles

The sermons list page.

- **Sermon Grid** — **Sermon Grid Size (Tablet)** (1 to 3) and **Sermon Grid Size (Desktop)** (1 to 4).
- **Card Pattern** — a **Card Contents Pattern** for sermon tiles.
- **Archive Card Settings** — **Card Contents Order**, a drag-and-drop list that sets the order of *Title*, *Date*, and *Pastor* on each card. Drag an item below **Do Not Display** to hide it. Then the same spacing, position, alignment, opacity, and aspect-ratio controls described under *General Archive*.
- **Archive Section Colors** — card overlay, content background, text, and link colors.

### Sermon Page Styles

The look of an individual sermon page.

- **Hide Sermon Hero** — set to *Yes* to drop the banner image from sermon pages entirely.
- **Default Sermon Image** — used when a sermon has no featured image.
- **Sermon Contents Pattern** — replace the built-in sermon layout with one you design.
- **Sermon Content Grid Size** — how many columns the sermon details are laid out in. The audio player is always full width.
- **Sermon Content Grid Width** — how wide that grid of details is, in pixels.
- **Sermon Contents Order** — a drag-and-drop list ordering *Date*, *Pastor*, *Series*, and *Passage*.
- **Sermon Section Colors** — the background and text colors of the sermon download button, including hover.

### Sermon Series Settings

**Sermon Series Default Image** for series without a featured image, and **Sermon Series Card Aspect Ratio (Height)** for the shape of series cards. Everything else about the series list follows *General Archive*.

### Staff Page

Holds a single **Staff Contents Pattern** choice, which replaces the built-in layout for each staff member's page with a pattern you design.

### Events Settings

**Events Calendar Border Width** (none, small, medium, or wide) plus **Events Section Colors** — the calendar's header background and text, its outline, and the two alternating cell background colors.

## Components

These sections fine-tune individual pieces that can appear on any page.

### Form Settings

**Form Label Position** — whether labels appear above their input or to the left. **Form Colors** then covers label text, input borders and backgrounds (normal, hover, and active), and the full set of primary and secondary button colors.

### Notifications

**Notification Content Padding** (small, medium, or large) for the toasts that appear in the lower-right corner of the public site, plus the **Info Notification Color** and **Notice Notification Color**. *Emergency* notifications use the **Error** color from *Site Colors*. See *Managing Notifications* for how to create them.

### Images

- **Blur Images During Loading** — when set to *Yes*, cards and page heros first show a small, blurred version of their image. As each image scrolls into view the full-size image loads in and the blur fades away. Images that come from a default-image setting rather than a featured image load normally, without the blur.
- **Blur Transition Time (seconds)** — how long the blur takes to fade once the full image has loaded, adjustable to a tenth of a second.

Individual Image and Cover blocks can opt in or out of this — see the *Blocks* page.

### Accordion Settings

**Accordion Border Width**; **Accordion Title Style**, which sets the title's size by picking a heading level (Heading 1 to Heading 5) or a text size (large, normal, or small); and **Accordion Title Padding**. **Accordion Colors** covers the content text, the border, and the open/close icon.

### Blockquotes Settings

**Blockquote Max Width**, the **Quotation Mark Family** and **Blockquote Quote Size** for the decorative quote marks, and **Blockquote Colors** for the background and the attribution name.

### Pagination Styles

Colors for the page-number controls at the bottom of long lists: link color and its hover, the link background, and the color of the current page.

## What gets saved when you click Publish

When you click **Publish**, two things happen:

- Your settings are stored, so the site uses them everywhere.
- A static stylesheet is rebuilt in the background so visitors get the new look immediately, without having to wait for the site to assemble it on every page load.

Because of that second step, a styling change may not appear for logged-out visitors until the Customizer has been published at least once. If the site looks stale when you view it signed out, open the Customizer and click **Publish**.

If you ever need to back up or transfer your Customizer choices, see the *Theme Settings* page — it has an export/import tool.
