# Customizer

The **Customizer** is where almost every styling choice on the site lives — colors, fonts, header and footer, the look of the hero banner, the cards on each archive, and much more. Open it from **Appearance → Customize**.

The Customizer shows a live preview of the site on the right while you make changes on the left. Nothing is saved until you click **Publish** at the top — feel free to try things out.

Longer sections are broken up by **grey sub-headings** — *Archive Grid*, *Logo*, *Header Typography*, *Theme Spacing*, and so on. These are labels only, not settings; they group the controls beneath them so a long section stays easy to scan.

## Brand and identity

These are the first sections to fill in, because they set the look that the rest of the site builds on.

### Church Info

Your church's name, telephone number, email address, and street address. Several places on the site pull these in automatically (for example the footer and contact pages).

### Site Colors

A two-step color system. First you set a small palette of **base colors** (your primary tint, a secondary tint, accent, whites, greys, and a few outline colors for accessibility). Then, further down the section, you pick which base color is used for each individual area of the site — header background, menu links, hero text, card backgrounds, button colors, footer text, and so on.

The base colors you set here are also added to the color picker that appears in the block editor, so the same palette is available when you write a page or post.

> Tip: To set your primary, secondary, and accent colors quickly — and have all of their lighter shades worked out for you — use **Appearance → Theme Planner** instead. See the *Theme Planner* page. Come back here afterwards to fine-tune which color is used where.

Note that some color pickers appear in the section they belong to rather than here. The calendar colors are under *Events Settings*, and the card colors for each archive are under that archive's own section, below a sub-heading ending in "Section Colors".

### Typography Settings

Everything about the type on your site. The section is grouped into five parts:

- **Custom Font Families** — three font slots. For each one you enter the Google Fonts family parameter (the part of the embed code that names the font and its weights) and the matching CSS rule. You do not have to use all three.
- **Font Assignments** — which of those families is used for general body text and for headings. Two more assignments live in other sections: the blockquote quotation mark font is under *Blockquotes Settings*, and the header menu font is under *Header Settings*.
- **Typography Styling** — whether headings are upper-case, plus letter spacing and line height, set separately for headings and for general text.
- **Font Sizes** — sizes for your first, second, and third-level headings, each with its own desktop and mobile value, plus a **General Content Font Size** for body text (again desktop and mobile). Sizes are multiples of your base font size, so `2` means twice the base.
- **Font Colors** — the text colors used across the site.

> Tip: Because every size is a multiple of the base font size set in *General Settings*, raising that one value scales the whole site's type at once. Adjust it first, then fine-tune individual sizes here.

## Overall layout

### General Settings

Site-wide values that affect every page. At the top is:

- **Bible Version Used** — which translation Bible references on the site link to (ASV, ESV, KJV, NIV, NKJV, or Young's Literal). Defaults to ESV.

Then, under **Layout & Behavior**:

- **Content Width** — how wide the main content area is, in pixels (default 1252).
- **Page Sidebar Position** — whether the sidebar appears on the left or the right.
- **Image Parallax Effect** — turn the parallax scroll effect on or off for hero images.

Under **Typography**:

- **Base Font Size** — the baseline size in pixels, from 16 to 24 (default 16). Every other font size on the site is a multiple of this, so changing it scales all of your type at once.

Under **Theme Spacing**:

- **Default Padding Size** — small, medium, or large (default medium). This is the padding blocks get when they are left on *Theme Default*.
- **Padding Scale** — how far apart the small, medium, and large padding steps are. A larger number makes the difference between them more dramatic; a smaller number keeps your spacing tighter and more uniform.

Under **Border Widths** and **Border Radius** — three sizes each (small, medium, and wide; small, medium, and large). Setting them here once means every bordered or rounded element on the site — cards, forms, accordions, the calendar — stays consistent, and blocks can simply pick "Small" or "Large" rather than needing a pixel value.

### Header Settings

Everything about the bar at the top of every page, grouped into three parts.

Under **Header Layout**:

- **Fixed Header** — keep the header pinned to the top as the visitor scrolls, on every screen size, on desktop only, or not at all.
- **Transparent Fixed Header** — let the hero image show through the fixed header when one is present.
- **Header Menu Align** — left, middle, or right (default middle).

Under **Logo**:

- **Header Logo Image** — upload your logo.
- **Logo Size (Default)** and **Logo Size (Scrolled)** — separate sizes for the normal state and for when the header is pinned and shrunk.
- **Logo Vertical Padding (Mobile)** and **Logo Vertical Padding (Desktop)** — space above and below the logo, set separately for each (default 8 each).

Under **Header Typography**:

- **Header Menu Family** — which of your configured fonts the menu uses.
- **Header Menu Font Size** — in pixels (default 16).
- **Header Menu Text Transform** — leave as-is or force the menu to upper-case.
- **Header Menu Letter Spacing** and **Header Menu Font Weight** — fine-tune the menu's look (default weight 400).

The header's colors are at the bottom of the section, under **Header Section Colors**.

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

Most of them follow the same shape: a grid sub-section for how many columns the list uses, a **Card Pattern** sub-section for handing the card design over to a pattern of your own, an **Archive Card Settings** sub-section for the built-in card, and a colors sub-section at the bottom. The card settings and colors only apply when no pattern is selected — the Customizer tells you so beneath each heading, and hides the controls a pattern has taken over.

### General Archive

The look of cards and grids for the theme's **general content** — ministries, blog posts, and page archives. Anything that is not sermons, series, staff, or events is styled here.

Under **Archive Grid**:

- **Grid Size (Tablet)** — columns on tablet, 1 to 3 (default 2).
- **Grid Size (Desktop)** — columns on desktop, 1 to 4 (default 2).
- **Default Card Image** — used when an item has no featured image of its own.

Under **Card Pattern**:

- **Card Contents Pattern** — use one of your patterns as the card instead of the built-in design. See *Patterns*.

Under **Archive Card Settings** (used only when no pattern is selected):

- **Card Content Item Padding** and **Card Content Items Gap** — spacing inside the card and between the lines of text in it.
- **Card Content Position** — whether the text sits *below the image* or *on top of the image*.
- **Card Content Text Align** — left, center, or right.
- **Card Text Content Background Opacity** — how solid the panel behind the text is. Useful when the text sits on top of the image.
- **Card Image Overlay Opacity** and **Card Image Overlay Opacity (Hover)** — how much the image is darkened normally and when a visitor hovers over it. Set the hover value lower than the resting value and images brighten on hover; set it higher and they darken.
- **Card Aspect Ratio (Height)** — the card's shape. A smaller number gives a wide, short card; a larger number a tall one.

Under **Archive Section Colors** — the image overlay, content background, text color, and link colors (normal and hover) for these cards.

### Sermon Archive Styles

The sermons list page, laid out the same way as *General Archive* above but applying only to sermons. Choose how many columns of sermon cards to show on tablet and desktop, the shape of each card, the spacing and alignment inside it, the image overlay opacity, and the card colors.

Two things are specific to sermons:

- **Card Contents Order** — drag **Title**, **Date**, and **Pastor** into the order you want them on the card. Anything you drag below **Do Not Display** is hidden.
- **Card Contents Pattern** — see *Patterns* for how using a pattern turns a sermon tile into a layout you design yourself.

### Sermon Page Styles

The look of an individual sermon page.

- **Hide Sermon Hero** — set to *Yes* to drop the big banner image from the top of every sermon page. Useful if your sermons rely on a video or audio player and the banner just pushes it below the fold.
- **Default Sermon Image** — used when a sermon has no featured image. The theme first tries the sermon's own image, then its series' image, then this one.
- **Sermon Contents Pattern** — replaces the built-in layout entirely with one you design.
- **Sermon Contents Order** — drag the date, pastor, series, and passage details into the order you want. Hidden when a pattern is in charge.
- **Sermon Content Grid Size** — how many columns those detail cards are laid out in, 1 to 4 (default 2). The audio player is always full width.
- **Sermon Content Grid Width** — how wide that block of detail cards is, in pixels (default 800).

Sermon colors are at the bottom under **Sermon Section Colors**.

### Sermon Series Settings

A default image for sermon series that do not have a featured image, and the aspect ratio for series cards.

### Staff Page

Controls staff member pages. Lets you pick a **Staff Contents Pattern** to replace the built-in layout for each staff member's page with a pattern you design. That is the only setting here — staff cards in lists are styled by *General Archive*. See *Managing Staff*.

### Events Settings

Controls the events calendar block:

- **Events Calendar Border Width** — none, small, medium, or wide (default small). The actual widths come from the **Border Widths** you set in *General Settings*.

Then, under **Events Section Colors**, five colors for the calendar: the header background, the header text, the outline around each day, and two alternating day backgrounds. Having two background colors is what lets the calendar shade weekends, or the days outside the current month, differently from ordinary days.

> Note: The first two of those pickers are both labelled **Calendar Header Background**. The first one sets the header's background; the second sets its text color. Watch the live preview to confirm which you are changing.

## Components

These sections fine-tune individual pieces that can appear on any page.

### Form Settings

Form-input styling, including whether labels appear above their input or to the left.

### Notifications Settings

Padding for the notification toasts that appear in the lower-right corner of the public site. The colors come from *Site Colors*. See *Managing Notifications* for how to create notifications.

### Images

**Blur Images During Loading** — when set to *Yes*, sermon/series/search cards and page heros first show a small, blurred version of their image. As each image scrolls into view, the full-size image loads in and the blur fades away. Images that come from a default-image setting rather than a featured image load normally without the blur.

**Blur Transition Time (seconds)** — how long the blur takes to fade away once the full image has loaded, adjustable to a tenth of a second (default 0.3).

**Image & Cover blocks** — each Image and Cover block has a **Blur Image** toggle in its block settings sidebar. A new block follows the theme setting above; flip the toggle to turn blur loading on or off for that one image.

### Accordion Settings

The look of the expandable accordion component: border width, title font size, and padding around each accordion title.

### Blockquotes Settings

How blockquotes are styled: maximum width, the size of the decorative quotation marks, and which of your configured fonts is used for the quote.

### Pagination Styles

Color settings for the page-number controls at the bottom of long lists.

## What gets saved when you click Publish

When you click **Publish**, two things happen:

- Your settings are stored in the database, so the site uses them everywhere.
- A static stylesheet is rebuilt in the background so visitors get the new look immediately, without having to wait for the site to assemble it on every page load.

If you ever need to back up or transfer your Customizer choices, see the *Theme Settings* page — it has an export/import tool.
