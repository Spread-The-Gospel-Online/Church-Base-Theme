# Customizer

The **Customizer** is where almost every styling choice on the site lives — colors, fonts, header and footer, the look of the hero banner, the cards on each archive, and much more. Open it from **Appearance → Customize**.

The Customizer shows a live preview of the site on the right while you make changes on the left. Nothing is saved until you click **Publish** at the top — feel free to try things out.

Two of WordPress's own Customizer sections are deliberately hidden by this theme: **Additional CSS** and **Homepage Settings**. If you are looking for them, that is why they are not there. Set your homepage under **Settings → Reading** instead.

## Brand and identity

These are the first sections to fill in, because they set the look that the rest of the site builds on.

### Church Info

Your church's name, telephone number, email address, and street address. Several places on the site pull these in automatically (for example the footer and contact pages).

### Site Colors

A two-step color system. First you set a small palette of **base colors** (your primary tint, a secondary tint, accent, whites, greys, and a few outline colors for accessibility). Then, further down the section, you pick which base color is used for each individual area of the site — header background, menu links, hero text, card backgrounds, button colors, footer text, and so on.

Those "which color goes where" choices do not all live in this section. They are grouped into the section they belong to, under a **Colors** heading at the bottom of it — so the header colors sit at the bottom of *Header Settings*, the footer colors at the bottom of *Footer Settings*, and so on. This section holds the base palette itself.

Every dropdown that assigns a color also offers **Transparent** as its last choice, which is useful for things like outline-only buttons.

The base colors you set here are also added to the color picker that appears in the block editor, so the same palette is available when you write a page or post. The **Error** color is kept out of that editor palette on purpose — it is reserved for emergency notifications and form errors.

> Tip: if you just want a whole palette quickly rather than setting each color by hand, try **Appearance → Theme Planner**. Pick one color and it generates the rest. See the *Theme Planner* page.

### Typography Settings

The fonts the site uses. You can configure three font families (using Google Fonts embed parameters) and then choose which one is used for general body text, headings, blockquote quotation marks, and the header menu. You can also set heading sizes, line height, letter spacing, and whether headings are upper-case. Your link colors and general text color live at the bottom of this section too.

The **Font Sizes** group near the bottom sets your heading sizes, with a separate value for mobile and desktop. There are six controls, and several of them currently share the same label, so go by their order rather than their text. They run: H1 desktop, H1 mobile, H2 desktop, H2 mobile, H3 desktop, H3 mobile — followed by the two general content sizes.

## Overall layout

### General Settings

Site-wide values that affect every page:

- **Bible Version Used** — which translation Bible references on the site link to (ASV, ESV, KJV, NIV, NKJV, or YLT).
- **Content Width** — how wide the main content area is, in pixels.
- **Page Sidebar Position** — whether the sidebar appears on the left or the right.
- **Image Parallax Effect** — turn the parallax scroll effect on or off. This is off by default. Switching it on also adds a pair of parallax checkboxes to every Image and Cover block — see the *Blocks* page.
- **Base Font Size** — the baseline text size everything else scales from.
- **Default Padding Size** (small, medium, or large) and **Padding Scale** — together these set the standard spacing the whole site uses. The scale is the step between sizes, so raising it spaces everything out more generously.
- **Border Widths** and **Border Radius** — three sizes each (small, medium, wide / small, medium, large) used consistently throughout the site. These are the sizes offered by the per-block **Border Radius** setting and by the accordion and calendar border settings.

### Header Settings

Everything about the bar at the top of every page:

- **Fixed Header** — keep the header pinned to the top as the visitor scrolls, on every screen size, on desktop only, or not at all.
- **Transparent Fixed Header** — let the hero image show through the fixed header when one is present.
- **Header Logo Image** — upload your logo.
- **Logo Sizes** — separate sizes for the default state and when the header is "scrolled" (pinned, smaller).
- **Logo Vertical Padding** — space above and below the logo, set separately for mobile and desktop (default 8px each).
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

Note that these sections stay visible even for content types you have switched off in **Settings → Theme Settings**. If you have turned Events off, for example, *Events Settings* is still listed here — it simply has nothing to affect.

### Sermon Archive Styles

The sermons list page. Choose how many columns of sermon cards to show on tablet and desktop, the aspect ratio of each card's image, how text sits over or under the image (**Card Content Position**), how it is aligned, the padding and gap between the card's details, the overlay and background opacities, and the order of the title, date, and pastor on each card.

**Card Contents Order** is a drag-and-drop list, and it works differently from how it looks. As well as *Title*, *Date*, and *Pastor* it contains an item called **Do Not Display**. That item is a cut-off line, not a thing that gets displayed: anything you drag *below* **Do Not Display** is left off the card entirely. So to hide the pastor from your sermon cards, drag *Pastor* underneath *Do Not Display*.

You can also pick a **Card Contents Pattern** here — see *Patterns* for how using a pattern turns a sermon tile into a layout you design yourself. When a pattern is chosen, the card settings below it no longer apply, and a few of them hide themselves to make that clear. The rest stay visible but stop having any effect.

### Sermon Page Styles

The look of an individual sermon page:

- **Hide Sermon Hero** — set this to *Yes* to drop the large banner image from the top of every sermon page, so the page starts with the sermon content.
- **Default Sermon Image** — used when a sermon has no featured image of its own.
- **Sermon Contents Pattern** — replace the built-in layout entirely with a pattern you design.
- **Sermon Content Grid Size** — how many columns the sermon's details are laid out in. The audio player is always full width.
- **Sermon Content Grid Width** — how wide that content area is, in pixels.
- **Sermon Contents Order** — drag the date, pastor, series, and passage details into the order you want. Unlike the archive card list above, there is no "do not display" option here: all four always show.

### Sermon Series Settings

A default image for sermon series that do not have a featured image, and the aspect ratio for series cards.

### General Archive

This is the catch-all section for listing pages that do not have a section of their own — ministries, blog posts, and anything else. If you have enabled Ministries, this is where its cards are styled.

- **Grid Size (Tablet)** and **Grid Size (Desktop)** — how many cards per row.
- **Default Card Image** — used when an item has no featured image.
- **Card Contents Pattern** — design the card yourself with a pattern instead (see *Patterns*).
- **Card Content Item Padding** and **Card Content Items Gap** — spacing inside each card.
- **Card Content Position** — whether the text sits below the image or on top of it.
- **Card Content Text Align** — left, center, or right.
- **Card Text Content Background Opacity**, **Card Image Overlay Opacity**, and **Card Image Overlay Opacity (Hover)** — how solid the text background and image overlays are.
- **Card Aspect Ratio (Height)** — the shape of the card image.
- Card colors sit at the bottom of the section.

The settings mirror *Sermon Archive Styles* with one difference: there is no drag-and-drop order list, because these cards show a fixed title and excerpt.

### Staff Page

Controls staff member pages. Lets you pick a **Staff Contents Pattern** to replace the built-in layout for each staff member's page with a pattern you design. See *Managing Staff*.

### Events Settings

Controls the **Events Calendar Border Width** (none, small, medium, or wide) plus the calendar's colors — its header background and text, its outline, and the two alternating day-cell backgrounds.

## Components

These sections fine-tune individual pieces that can appear on any page.

### Form Settings

**Form Label Position** decides whether a field's label sits *above input* or *to the left of input*, for every form on the site.

This is also where your **button colors** live, at the bottom of the section — background, border, and text for both the primary and secondary button styles, each with its own hover color. Those are the colors used by the **Submit** button in your forms, so if you are hunting for button colors, look here rather than in *Site Colors*.

### Notifications

**Notification Content Padding** (small, medium, or large) sets the space above and below the text inside each notification toast in the lower-right corner of the public site. The **Info** and **Notice** colors are set at the bottom of this section; emergency notifications use the *Error* color from *Site Colors*. See *Managing Notifications* for how to create notifications.

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

This rebuild is the step that gets your changes in front of visitors, and only **Publish** (or saving the Theme Planner) triggers it. If you have imported a settings file and the site still looks unchanged to logged-out visitors, open the Customizer and click **Publish** to force the rebuild.

If you ever need to back up or transfer your Customizer choices, see the *Theme Settings* page — it has an export/import tool.
