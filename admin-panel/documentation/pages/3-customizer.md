# Customizer

The **Customizer** is where almost every styling choice on the site lives — colors, fonts, header and footer, the look of the hero banner, the cards on each archive, and much more. Open it from **Appearance → Customize**.

The Customizer shows a live preview of the site on the right while you make changes on the left. Nothing is saved until you click **Publish** at the top — feel free to try things out.

## Brand and identity

These are the first sections to fill in, because they set the look that the rest of the site builds on.

### Church Info

Your church's name, telephone number, email address, and street address. Several places on the site pull these in automatically (for example the footer and contact pages).

### Site Colors

A two-step color system. First you set your palette of **base colors**. Then, in the "Section Colors" group at the bottom of most other Customizer sections, you pick which base color is used for each individual area of the site — header background, menu links, hero text, card backgrounds, button colors, footer text, and so on.

The base palette has eighteen colors:

- **Primary 100 – 400** — your main brand color in four shades, darkest (100) to lightest (400).
- **Secondary 100 – 400** — a supporting color, also in four shades.
- **Accent** — a single highlight color, used for things like link hover states.
- **White**, **Off White**, **Grey One** through **Grey Four**, and **Black** — the neutrals.
- **ADA Outlines** — the focus outline color shown when someone tabs through the site with a keyboard. Keep this clearly visible against your backgrounds.
- **Error** — used only for form error messages. Unlike the others, it is deliberately left out of the editor palette and the color dropdowns.

Every base color except *Error* is also added to the color picker in the block editor, so the same palette is available when you write a page or post.

> Tip: If you only want to set your brand colors and let the theme work out the shades, use **Appearance → Theme Planner** instead. See the *Theme Planner* page.

### Typography Settings

Everything about the fonts the site uses. The section is grouped into:

- **Custom Font Families** — configure up to three font families. For each one you provide the family parameter from a Google Fonts embed URL (for example `Open+Sans:ital,wght@0,300..800;1,300..800`) and the matching CSS rule (for example `"Open Sans", sans-serif`). Two families come pre-filled: Open Sans and Roboto.
- **Font Assignments** — choose which of your three families is used for **General** body text and for **Headings**. (The *Header Menu* and blockquote *Quotation Mark* families are assigned in the Header and Blockquotes sections.)
- **Typography Styling** — whether headings are upper-case, plus letter spacing and line height for headings and for body text.
- **Font Sizes** — separate desktop and mobile sizes for **H1**, **H2**, and **H3** headings, and for general body content.
- **Font Colors** — the **Link Color**, the **Link Color (Hover)**, and the **General Content Color** used for body text.

> Note: a few controls in the Font Sizes and Typography Styling groups currently repeat an earlier label (for example two controls both reading "Heading Letter Spacing", where the second is really heading line height, and the H2 and H3 size controls reusing the H1 and H2 labels). They are listed in order — heading sizes run largest to smallest, desktop then mobile — so go by position in the list rather than the label.

## Overall layout

### General Settings

Site-wide values that affect every page:

- **Content Width** — how wide the main content area is.
- **Bible Version Used** — which translation Bible references on the site link to (ASV, ESV, KJV, NIV, NKJV, or YLT).
- **Page Sidebar Position** — whether the sidebar appears on the left or the right.
- **Image Parallax Effect** — turn the parallax scroll effect on or off. When this is enabled, Image and Cover blocks also gain **Enable Parallax?** and **Set Parallax As Banner?** checkboxes in their *Advanced* block settings, so you can apply the effect to individual images. See the *Blocks* page.
- **Base Font Size** — the baseline text size everything else scales from.
- **Default Padding Size** and **Padding Scale** — the standard amount of space used inside blocks and sections. *Default Padding Size* picks small, medium, or large; *Padding Scale* sets the underlying value those sizes are built from, so you can loosen or tighten the whole site's spacing at once.
- **Border Widths** and **Border Radius** — three sizes each (small, medium, wide / small, medium, large) used consistently throughout the site.

### Sections you will not find

The theme removes two of WordPress's own Customizer sections, because it provides its own equivalents:

- **Additional CSS** — removed. The theme's styling is driven by the settings in these sections.
- **Homepage Settings** — removed. Set your front page under **Settings → Reading** instead.

### Header Settings

Everything about the bar at the top of every page:

- **Fixed Header** — keep the header pinned to the top as the visitor scrolls, on every screen size, on desktop only, or not at all.
- **Transparent Fixed Header** — let the hero image show through the fixed header when one is present.
- **Logo Position** — **Left** (the default) puts the logo on the left, followed by the menu. **Center** places the menu on the left, the logo in the middle, and the search icon on the right. With a centered logo the menu is always left-aligned, so the menu alignment option is hidden.
- **Header Logo Image** — upload your logo.
- **Logo Sizes** — separate sizes for the default state and when the header is "scrolled" (pinned, smaller).
- **Logo Vertical Padding** — space above and below the logo, set separately for mobile and desktop (default 8px each).
- **Menu** — alignment (left / middle / right, only when the logo is on the left), which of your font families the menu uses, font size, letter spacing, uppercase, and font weight.
- **Header Section Colors** — the header background, menu text and its hover color, and the submenu background and text colors for dropdown menu items.

### Footer Settings

Controls the bottom of every page:

- **Footer Pattern** — choose one of your reusable patterns as the footer. See the *Patterns* page for how this works.
- **Footer Pattern Width** — how wide the footer content sits on the page.
- **Vertical Footer Padding** — how much space sits above and below the footer content.
- **Display Copyright** and **Copyright Text** — the small print at the bottom. Use `YYYY` anywhere in the copyright text and the site will substitute the current year.
- **Social Media Links** — Facebook, Twitter, Instagram, and YouTube URLs.

### Hero Settings

The large banner at the top of most pages:

- **Default Height** — how tall the hero is when it has a background image, as a percentage of the visitor's screen.
- **Text-Only Hero Height** — the height when there is no background image.
- **Minimum Height** — a floor so the hero never collapses too small on phones.
- **Background Opacity** — how dark the overlay over the background image is.

Individual pages can override these in the block editor — see the *Blocks* page.

### Breadcrumbs Settings

Where the trail of links above the page title is shown (above the hero, on top of the hero, at the bottom of the hero, below the hero, or hidden) and the background opacity of the breadcrumb bar.

## How each kind of content looks

The Customizer has dedicated sections for the look of each content type.

### Sermon Archive Styles

The sermons list page. The section is grouped into:

- **Sermon Grid** — how many columns of sermon cards to show on tablet (1–3) and on desktop (1–4).
- **Card Pattern** — a **Card Contents Pattern** to design the tile yourself. See *Patterns*. When a pattern is selected it takes charge of the card, and the settings below no longer apply.
- **Archive Card Settings** — **Card Contents Order** (drag *Title*, *Date*, and *Pastor* into the order you want, or drag items under *Do Not Display* to hide them), the padding and gap between those items, whether the text sits **Below image** or **On top of image**, the text alignment, the background opacity behind the text, the image overlay opacity at rest and on hover, and the card's aspect ratio (as a height percentage).
- **Archive Section Colors** — the image overlay, card background, card text, and card link colors.

### General Archive

The same set of card and grid controls, but for every *other* listing page on the site — your blog posts, ministries, and any content type that does not have a list page of its own. If you have ever wondered why a sermon card and a blog card look different, this is the section that controls the second one.

- **Archive Grid** — columns on tablet (1–3) and desktop (1–4), plus a **Default Card Image** used whenever a post has no featured image of its own.
- **Card Pattern** — a **Card Contents Pattern**, exactly as above.
- **Archive Card Settings** — item padding and gap, content position (below or on top of the image), text alignment, text background opacity, image overlay opacity at rest and on hover, and the card aspect ratio.
- **Archive Section Colors** — the image overlay, card background, card text, and card link colors for these cards.

Unlike *Sermon Archive Styles*, this section has no drag-and-drop order control — a general card always shows the title and, if the post has one, its excerpt.

> Tip: When a post has no featured image and you have not set a *Default Card Image*, the theme falls back to the banner image from that content type's archive page, and then to your homepage's featured image — so cards rarely end up blank.

### Sermon Page Styles

The look of an individual sermon page.

- **Hide Sermon Hero** — set to *Yes* to drop the large banner image from sermon pages entirely.
- **Default Sermon Image** — used when a sermon has no featured image of its own.
- **Sermon Contents Pattern** — replace the built-in layout entirely with one you design. See *Patterns*.
- **Sermon Content Grid Size** — how many columns (1–4) the sermon's detail cards are laid out in. The audio card is always full width.
- **Sermon Content Grid Width** — how wide that grid sits on the page, in pixels.
- **Sermon Contents Order** — drag the *Date*, *Pastor*, *Series*, and *Passage* details into the order you want.
- **Sermon Section Colors** — the background and text colors for the sermon download button, at rest and on hover.

### Sermon Series Settings

A default image for sermon series that do not have a featured image, and the aspect ratio for series cards.

### Staff Page

Controls staff member pages. Lets you pick a **Staff Contents Pattern** to replace the built-in layout for each staff member's page with a pattern you design.

### Events Settings

Controls the events calendar block: the **Events Calendar Border Width** (none, small, medium, or wide), and under **Events Section Colors** the calendar's header background and header text, the grid outline, and the two alternating day-cell backgrounds.

> Note: the two header colors currently share the label "Calendar Header Background". The first sets the header background; the second sets the header text.

## Components

These sections fine-tune individual pieces that can appear on any page.

### Form Settings

Form-input styling, including whether labels appear above their input or to the left.

### Notifications

Controls the notification toasts that appear in the lower-right corner of the public site:

- **Notification Content Padding** — small, medium, or large.
- **Info Notification Color** and **Notice Notification Color** — the accent color used for each of those two notification types.

Emergency notifications do not have their own color setting. See *Managing Notifications* for how to create notifications.

### Images

**Blur Images During Loading** — when set to *Yes*, sermon/series/search cards and page heros first show a small, blurred version of their image. As each image scrolls into view, the full-size image loads in and the blur fades away. Images that come from a default-image setting rather than a featured image load normally without the blur.

**Blur Transition Time (seconds)** — how long the blur takes to fade away once the full image has loaded, adjustable to a tenth of a second (default 0.3).

**Image & Cover blocks** — each Image and Cover block has a **Blur Image** panel in its block settings sidebar with a **Blur image while loading** toggle. A new block follows the theme setting above; flip the toggle to turn blur loading on or off for that one image.

### Accordion Settings

The look of the expandable accordion component:

- **Accordion Border Width** — none, small, medium, or wide.
- **Accordion Title Style** — which text style the accordion title uses (Heading 1 through Heading 5, or Large / Normal / Small Text).
- **Accordion Title Padding** — small, medium, or large.
- **Accordion Colors** — the content text color, the border color, and the color of the open/close indicator.

### Blockquotes Settings

How blockquotes are styled: maximum width, the size of the decorative quotation marks, and which of your configured fonts is used for the quote.

### Pagination Styles

Color settings for the page-number controls at the bottom of long lists.

## What gets saved when you click Publish

When you click **Publish**, two things happen:

- Your settings are stored in the database, so the site uses them everywhere.
- A static stylesheet is rebuilt in the background so visitors get the new look immediately, without having to wait for the site to assemble it on every page load.

If you ever need to back up or transfer your Customizer choices, see the *Theme Settings* page — it has an export/import tool.
