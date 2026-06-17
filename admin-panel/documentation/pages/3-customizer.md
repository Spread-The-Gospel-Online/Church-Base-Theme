# Customizer

The **Customizer** is where almost every styling choice on the site lives — colors, fonts, header and footer, the look of the hero banner, the cards on each archive, and much more. Open it from **Appearance → Customize**.

The Customizer shows a live preview of the site on the right while you make changes on the left. Nothing is saved until you click **Publish** at the top — feel free to try things out.

## Brand and identity

These are the first sections to fill in, because they set the look that the rest of the site builds on.

### Church Info

Your church's name, telephone number, email address, and street address. Several places on the site pull these in automatically (for example the footer and contact pages).

### Site Colors

A two-step color system. First you set a small palette of **base colors** (your primary tint, a secondary tint, accent, whites, greys, and a few outline colors for accessibility). Then, further down the section, you pick which base color is used for each individual area of the site — header background, menu links, hero text, card backgrounds, button colors, footer text, and so on.

The base colors you set here are also added to the color picker that appears in the block editor, so the same palette is available when you write a page or post.

### Font Settings

The fonts the site uses. You can configure three font families (using Google Fonts embed parameters) and then choose which one is used for general body text, headings, blockquote quotation marks, and the header menu. You can also set heading sizes, line height, letter spacing, and whether headings are upper-case.

## Overall layout

### General Settings

Site-wide values that affect every page:

- **Content Width** — how wide the main content area is.
- **Bible Version Used** — which translation Bible references on the site link to (ASV, ESV, KJV, NIV, NKJV, or YLT).
- **Page Sidebar Position** — whether the sidebar appears on the left or the right.
- **Image Parallax Effect** — turn the parallax scroll effect on or off for hero images.
- **Base Font Size** and **Padding** controls — set the baseline values everything else scales from.
- **Border Widths** and **Border Radius** — three sizes each (small, medium, wide / small, medium, large) used consistently throughout the site.

### Header Settings

Everything about the bar at the top of every page:

- **Fixed Header** — keep the header pinned to the top as the visitor scrolls, on every screen size, on desktop only, or not at all.
- **Transparent Fixed Header** — let the hero image show through the fixed header when one is present.
- **Header Logo Image** — upload your logo.
- **Logo Sizes** — separate sizes for the default state and when the header is "scrolled" (pinned, smaller).
- **Menu** — alignment (left / middle / right), font size, letter spacing, uppercase, and font weight.

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

The sermons list page. Choose how many columns of sermon cards to show on tablet and desktop, the aspect ratio of each card's image, how text sits over or under the image, and the order of the title, date, and pastor on each card.

You can also pick a **Card Contents Pattern** here — see *Patterns* for how using a pattern turns a sermon tile into a layout you design yourself.

### Sermon Page Styles

The look of an individual sermon page. Pick a default sermon image (used when a sermon has no featured image), the order of the date / pastor / series / passage details, and how many columns the sermon body content is laid out in.

You can also pick a **Sermon Contents Pattern** here to replace the built-in layout entirely with one you design.

### Sermon Series Settings

A default image for sermon series that do not have a featured image, and the aspect ratio for series cards.

### Staff Page

Controls staff member pages. Lets you pick a **Staff Contents Pattern** to replace the built-in layout for each staff member's page with a pattern you design.

### Events Settings

Currently controls the border width on the events calendar block.

## Components

These sections fine-tune individual pieces that can appear on any page.

### Form Settings

Form-input styling, including whether labels appear above their input or to the left.

### Notifications Settings

Padding for the notification toasts that appear in the lower-right corner of the public site. The colors come from *Site Colors*. See *Managing Notifications* for how to create notifications.

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
