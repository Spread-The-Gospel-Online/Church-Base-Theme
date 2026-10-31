# Customizer

The **Customizer** is where almost every styling choice on the site lives — colors, fonts, header and footer, the look of the hero banner, the cards on each archive, and much more. Open it from **Appearance → Customize**.

The Customizer shows a live preview of the site on the right while you make changes on the left. Nothing is saved until you click **Publish** at the top — feel free to try things out.

Two things to know before you start:

- **Every section is always listed**, even for content types you have switched off in *Theme Settings*. If you do not use events, you will still see an *Events Settings* section — it simply has nothing to affect. Only the admin menus disappear when you disable a content type, not the styling sections.
- **The homepage and Additional CSS panels have been removed.** Choose which page is your homepage under **Settings → Reading** instead. The theme does not offer a free-text CSS box, because the settings below are designed to cover the same ground.

## Brand and identity

These are the first sections to fill in, because they set the look that the rest of the site builds on.

### Church Info

Your church's name, telephone number, email address, and street address. Several places on the site pull these in automatically (for example the footer and contact pages).

### Site Colors

A two-step color system. First you set a small palette of **base colors** (your primary tint, a secondary tint, accent, whites, greys, and a few outline colors for accessibility). Then, further down the section, you pick which base color is used for each individual area of the site — header background, menu links, hero text, card backgrounds, button colors, footer text, and so on.

The base colors you set here are also added to the color picker that appears in the block editor, so the same palette is available when you write a page or post.

If you are setting your colors up for the first time, start at **Appearance → Theme Planner** instead — it builds the primary, secondary, and accent colors for you from a single choice, and writes them into this same palette. See the *Theme Planner* page.

### Typography Settings

The fonts the site uses, in four groups.

**Custom Font Families** — set up to three fonts. Each one takes a Google Fonts embed parameter (for example `Open+Sans:ital,wght@0,300..800;1,300..800`) plus the matching CSS rule (for example `"Open Sans", sans-serif`). The first two come pre-filled with Open Sans and Roboto.

**Font Assignments** — choose which of your three families is used for **General** body text, **Headings**, the **Quotation Mark Family** on blockquotes, and the **Header Menu Family**.

**Typography Styling** — whether headings are upper-case, plus letter spacing and line height set separately for headings and for general text.

**Font Sizes** — separate desktop and mobile sizes for **H1**, **H2**, and **H3** headings, and for general content.

**Font Colors** — your link color, link hover color, and general text color, each picked from the palette in *Site Colors*.

> Tip: A couple of the size and spacing controls in this section carry the wrong label (two are labelled "Heading Letter Spacing", and some H2 and H3 sizes read "H1"). They are in top-to-bottom order — H1 desktop, H1 mobile, H2 desktop, H2 mobile, H3 desktop, H3 mobile — so go by position rather than the label, and watch the preview.

## Overall layout

### General Settings

Site-wide values that affect every page:

- **Content Width** — how wide the main content area is.
- **Bible Version Used** — which translation Bible references on the site link to (ASV, ESV, KJV, NIV, NKJV, or YLT).
- **Page Sidebar Position** — whether the sidebar appears on the left or the right.
- **Image Parallax Effect** — turn the parallax scroll effect on or off. Leaving this on *Disable Parallax* also hides the parallax checkboxes from the block editor entirely.
- **Base Font Size** — the baseline text size everything else scales from.
- **Default Padding Size** and **Padding Scale** — the spacing step the whole site uses. Blocks that are set to *Theme Default* padding follow the size you pick here.
- **Border Widths** and **Border Radius** — three sizes each (small, medium, wide / small, medium, large) used consistently throughout the site.

### Header Settings

Everything about the bar at the top of every page:

- **Fixed Header** — keep the header pinned to the top as the visitor scrolls, on every screen size, on desktop only, or not at all.
- **Transparent Fixed Header** — let the hero image show through the fixed header when one is present.
- **Logo Position** — **Left** (the default) puts the logo on the left, followed by the menu. **Center** places the menu on the left, the logo in the middle, and the search icon on the right. With a centered logo the menu is always left-aligned, so the menu alignment option is hidden.
- **Header Logo Image** — upload your logo.
- **Logo Sizes** — separate sizes for the default state and when the header is "scrolled" (pinned, smaller).
- **Logo Vertical Padding** — space above and below the logo, set separately for mobile and desktop (default 8px each).
- **Menu** — alignment (left / middle / right, only when the logo is on the left), font size, letter spacing, uppercase, and font weight.

### Footer Settings

Controls the bottom of every page:

- **Footer Pattern** — choose one of your reusable patterns to add to the footer. See the *Patterns* page for how this works.
- **Footer Pattern Width** — how wide the footer content sits on the page.
- **Vertical Footer Padding** — how much space sits above and below the footer content.
- **Display Copyright** and **Copyright Text** — the small print at the bottom. Use `YYYY` anywhere in the copyright text and the site will substitute the current year. The text box is hidden while *Display Copyright* is set to No.
- **Social Media Links** — Facebook, Twitter, Instagram, and YouTube URLs.

The footer always has three parts: your social media icons, the footer pattern (if you have chosen one), and the **Footer Menu**. A pattern is added alongside the icons and menu rather than replacing them, so if you design a footer pattern that includes its own links you may want to leave the Footer Menu location unassigned under **Appearance → Menus**.

### Hero Settings

The large banner at the top of most pages:

- **Default Height** — how tall the hero is when it has a background image, as a percentage of the visitor's screen.
- **Text-Only Hero Height** — the height when there is no background image.
- **Minimum Height** — a floor so the hero never collapses too small on phones.
- **Background Opacity** — how dark the overlay over the background image is.

The hero's image is the page's **featured image**. There is no image setting here; to change the picture, change the featured image on the page itself.

Individual pages can override the height, opacity, and colors — open the editor's **⋮** menu and choose **Hero Settings**. See the *Blocks* page.

### Breadcrumbs Settings

Where the trail of links above the page title is shown (above the hero, on top of the hero, at the bottom of the hero, below the hero, or hidden) and the background opacity of the breadcrumb bar.

Breadcrumbs never appear on the homepage, whichever position you choose.

## How each kind of content looks

The Customizer has dedicated sections for the look of each content type.

### Sermon Archive Styles

The sermons list page, and the sermon cards wherever else they appear (including the list on a staff member's page).

- **Sermon Grid Size (Tablet)** and **(Desktop)** — how many columns of cards, up to 3 on tablet and 4 on desktop.
- **Card Contents Pattern** — use a pattern you designed as the card instead. See *Patterns*.
- **Card Contents Order** — a drag-and-drop list of **Title**, **Date**, **Pastor**, and **Do Not Display**. Drag them into the order you want them to appear on the card. Anything you drag *below* **Do Not Display** is left off the card entirely — so that entry acts as a cut-off line rather than being a card item itself.
- **Card Content Position** — whether the text sits *below* the image or *on top of* it.
- **Card Content Text Align** — left, center, or right.
- **Sermon Card Content Item Padding** and **Items Gap** — spacing inside the text area and between the items in it.
- **Sermon Card Text Content Background Opacity** — how solid the text panel is, which matters most when the text sits on top of the image.
- **Sermon Card Image Overlay Opacity** and **(Hover)** — how much the image is darkened normally and when a visitor hovers over the card.
- **Sermon Card Apect Ratio (Height)** — the shape of the card's image. (The label has a typo in it.)
- **Archive Section Colors** — the image overlay, card background, text, and link colors.

The order, text alignment, and items gap controls are hidden as soon as you choose a Card Contents Pattern, since your pattern decides all of that instead.

### Sermon Page Styles

The look of an individual sermon page.

- **Hide Sermon Hero** — set this to *Yes* to drop the big banner image from sermon pages, so the content starts at the top.
- **Default Sermon Image** — used for the banner and cards when a sermon has no featured image of its own.
- **Sermon Contents Pattern** — replace the built-in layout entirely with one you design. See *Patterns*.
- **Sermon Content Grid Size** — how many columns the date / pastor / series / passage details are laid out in. The audio player is always full width.
- **Sermon Content Grid Width** — how wide that block of content is.
- **Sermon Contents Order** — a drag-and-drop list of **Date**, **Pastor**, **Series**, and **Passage**. Hidden once a Sermon Contents Pattern is chosen.
- **Sermon Section Colors** — the colors of the download button, normally and on hover.

### General Archive

The listing pages that do not have a section of their own — your blog posts list, ministries, and anything else without dedicated settings. Search results use the same card shapes too.

- **Grid Size (Tablet)** and **(Desktop)** — how many columns of cards, up to 3 on tablet and 4 on desktop.
- **Default Card Image** — used for any item with no featured image. If you leave it empty, the theme falls back to the archive page's own banner image, then your homepage image.
- **Card Contents Pattern** — use a pattern you designed as the card instead.
- **Card Content Position**, **Text Align**, **Item Padding**, **Items Gap** — the same layout choices as the sermon cards above.
- **Card Text Content Background Opacity**, **Card Image Overlay Opacity**, and **(Hover)** — the same opacity choices as above.
- **Card Aspect Ratio (Height)** — the shape of the card's image.
- **Archive Section Colors** — the overlay, background, text, and link colors for these cards.

Unlike the sermon cards, there is no order control here: a general card is always its image, then its title, then its excerpt.

### Sermon Series Settings

A default image for sermon series that do not have a featured image, and the aspect ratio for series cards.

### Staff Page

One setting: a **Staff Contents Pattern**, which supplies the body of each staff member's page.

This section matters more than its size suggests. A staff page shows the person's photo and name as the banner, then your pattern, then the sermons they preached — and nothing else. The main editor content on a staff member is never displayed, so without a pattern here there is nowhere for a bio to appear. See *Managing Staff*.

### Events Settings

The events calendar block: **Events Calendar Border Width**, plus the calendar's colors — header background, header text, outline, and the two alternating day backgrounds.

## Components

These sections fine-tune individual pieces that can appear on any page.

### Form Settings

**Form Label Position** — whether a field's label sits above its input or to the left of it.

The rest of this section is colors, and it is worth knowing it covers more than forms: as well as the input border, backgrounds, and label text, this is where the site's **primary and secondary button colors** live — background, border, and text, each with a hover state. Those buttons appear well beyond forms, so changes here ripple across the site.

### Notifications Settings

**Notification Content Padding** — the space inside each of the notification toasts that appear in the lower-right corner of the public site.

The toast colors are picked here too: **Info Notification Color** and **Notice Notification Color**. There is no setting for the *Emergency* type — it uses the **Error** color from *Site Colors*. See *Managing Notifications* for how to create notifications.

### Images

**Blur Images During Loading** — when set to *Yes*, sermon/series/search cards and page heros first show a small, blurred version of their image. As each image scrolls into view, the full-size image loads in and the blur fades away. Images that come from a default-image setting rather than a featured image load normally without the blur.

**Blur Transition Time (seconds)** — how long the blur takes to fade away once the full image has loaded, adjustable to a tenth of a second (default 0.3).

**Image & Cover blocks** — each Image and Cover block has a **Blur Image** toggle in its block settings sidebar. A new block follows the theme setting above; flip the toggle to turn blur loading on or off for that one image.

### Accordion Settings

The look of the expandable accordion component:

- **Accordion Border Width** — none, small, medium, or wide.
- **Accordion Title Style** — how big the clickable title is. Choose a heading level (Heading 1 to Heading 5) or a plain text size (Large, Normal, or Small Text), so accordion titles can match the headings around them.
- **Accordion Title Padding** — small, medium, or large.
- **Accordion Colors** — the content color, border color, and the color of the open/close indicator.

### Blockquotes Settings

How blockquotes are styled: maximum width, the size of the decorative quotation marks, and which of your configured fonts is used for the quote.

### Pagination Styles

Color settings for the page-number controls at the bottom of long lists.

## What gets saved when you click Publish

When you click **Publish**, two things happen:

- Your settings are stored in the database, so the site uses them everywhere.
- A static stylesheet is rebuilt in the background so visitors get the new look immediately, without having to wait for the site to assemble it on every page load.

This second step is why a change can seem not to take effect: if you are looking at the site while logged in you see your changes immediately, but visitors who are not logged in only get them once the stylesheet has been rebuilt. Publishing the Customizer is what rebuilds it, so if a styling change is not showing up for everyone, publish the Customizer once more.

If you ever need to back up or transfer your Customizer choices, see the *Theme Settings* page — it has an export/import tool.
