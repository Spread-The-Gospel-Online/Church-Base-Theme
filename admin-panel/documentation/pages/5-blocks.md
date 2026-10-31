# Blocks

The theme adds extra **blocks** to the WordPress editor — small drop-in pieces of content like a list of upcoming events, a sermons grid, a calendar, or a contact form. You add them the same way as any other block: click the **+** button in the editor and search for the block by name. All of the theme's blocks are grouped together under a **Theme** category in the inserter.

The theme also adds a few extra panels to blocks you already use, and three settings sidebars for the page as a whole. Those are covered further down.

## Content blocks

### Latest Sermons

Shows the most recent sermons as a grid of cards. The editor sidebar lets you set:

- **Number of sermons** — between 1 and 4.
- **Number of columns** — between 1 and 4. If you leave it alone it follows your *Sermon Archive Styles* column setting.
- **Sermon Pattern** — if you choose one of your patterns, the block uses your design for each card instead of the built-in one (see *Patterns*).

### Upcoming Events

Shows the next few events as a grid of cards, ordered by date. The sidebar lets you set:

- **Number of events** — between 1 and 4.
- **Number of columns** — between 1 and 4.

### Church Calendar

A full interactive calendar that fills itself in with all of your published events. Useful on a dedicated *Calendar* page. The calendar has no settings of its own — its borders and colors are styled in **Appearance → Customize → Events Settings**.

### Staff Members

Shows a selected group of staff members as cards. In the sidebar:

- **Select Staff** — expand this and tick the people you want to appear. Every staff member you have created is listed here by name.
- **Number of Columns** — between 1 and 4.
- **Staff Pattern** — choose one of your patterns to design the card yourself (see *Patterns*).

### Lorem Ipsum

A small helper for designers: drop it in and it fills itself with placeholder text. Set the **Number of Paragraphs** (1 to 5) in the sidebar. Useful while building patterns or layouts, and normally removed before you publish.

## Accordions

Expandable accordions use the **standard WordPress accordion blocks** rather than a theme block of their own — add an Accordion block and the theme styles it to match your site. Their borders, title style, padding, and colors are set site-wide in **Appearance → Customize → Accordion Settings**.

## Spacing settings on every block

Open the editor sidebar for **any** block on the page — even the built-in WordPress blocks — and you will find a **Spacing** panel added by the theme:

- **Element Vertical Padding** — space inside the block, above and below its content. Choose *Theme Default*, *None*, *Small*, *Medium*, or *Large*. "Theme Default" follows the *Default Padding Size* you set in the Customizer.
- **Border Radius** — how rounded the block's corners are: *None*, *Small*, *Medium*, or *Large*. These match the three radius sizes set in **General Settings**.
- **Is Contained Width?** — when on, the block sits within your normal content width; when off, it stretches the full width of the screen. New top-level blocks start contained.
- **Mobile Margin** — space below the block on phones, from 0 to 200.
- **Desktop Margin** — space below the block on larger screens, from 0 to 200, so you can space things out more generously there.

These give you a consistent vertical rhythm without having to think about pixel values.

## Blurred image loading

Image and Cover blocks get an extra **Blur Image** panel with a single **Blur image while loading** switch. A new block follows the site-wide choice in **Appearance → Customize → Images**; flip the switch to turn blur loading on or off for that one image. See the *Customizer* page for what blurred loading does.

## Parallax on images

If **Image Parallax Effect** is enabled in **Appearance → Customize → General Settings**, Image and Cover blocks gain two tickboxes in the editor sidebar's **Advanced** panel (near the bottom, below the block's other settings):

- **Enable Parallax?** — the image scrolls more slowly than the page, giving a sense of depth.
- **Set Parallax As Banner?** — treats the image as a full-width banner while it moves.

If parallax is switched off in the Customizer these tickboxes do not appear at all.

## Page settings sidebars

Three settings panels apply to the page as a whole rather than to one block. They are **sidebars**, not sections of the usual block sidebar — open one from its icon in the top-right of the editor, or from the **Options** menu (the three dots) where each is listed by name.

### Hero Settings

Overrides the site-wide hero defaults for this one page. Open the sidebar (its icon is a picture frame) and you can set:

- **Opacity** — how dark the overlay over the hero image is, from 0 to 1.
- **Hero Background Color** — the color behind the hero, used where the image does not cover.
- **Hero Text Color** — the color of the title and breadcrumbs in the hero.
- **Hero Height** — the hero's height as a percentage of the visitor's screen.
- **Reset Hero Settings To Defaults** — a button that clears all four, putting the page back on the site-wide values from **Appearance → Customize → Hero Settings**.

There is no image picker here. The hero image is the page's **featured image** — set it in the usual place in the editor sidebar. If a page has no featured image, the theme falls back through a chain of other images; see *Where hero images come from* on the *Customizer* page.

This sidebar is not available while editing a Layout, which has no hero of its own.

### Member Settings

A single **Member Only?** tickbox. When it is ticked, a visitor who is not logged in is sent back to the home page instead of seeing the item.

Two important limits:

- It works on **individual posts and content items** — a post, a sermon, an event, a staff member. It does **not** take effect on standard **Pages**, which stay visible to everyone however this box is set.
- It is **not a security feature.** The hiding happens in the visitor's browser, so a determined person can still read the content. Use it to keep members' notices out of the way of casual visitors, not for anything confidential or sensitive.

### Layout Settings

Only appears while you are editing a **Layout**, and holds the **Layout Item Position** choice. See the *Layouts* page.

## The contact form

Drop a **Form** block onto a page and you get a form container you can fill with input blocks. The form's sidebar has a **Form Submission** panel:

- **Form name** — shown in the subject line of the submission email.
- **On submit** — either *Send email* or *Post to endpoint*.
- **Email addresses** — appears when you chose *Send email*. Type the addresses that should receive submissions, separated by commas.
- **Endpoint URL** — appears when you chose *Post to endpoint*. Use this if your church has its own forms system or signup service.

Submission emails arrive from your site's name and admin email address, with the subject line "new submission from form:" followed by your form name. You do not need to create or manage a form ID — the theme generates one behind the scenes and keeps your recipient addresses on the server, where visitors cannot read them.

The Form block also has the editor's normal **Styles** tab, so you can set its background, text, and link colors and its font size from there.

Inside the form you can use:

- **Text Input** — a single-line text field. Set the **Label**, the **Name**, an optional **Placeholder**, and whether the field is **Required**.
- **Email** — same as Text Input, but for email addresses. Validates the format automatically.
- **Select** — a dropdown. The **Options (one per line)** box takes your choices, one on each line.
- **Checkbox** — a single checkbox, with a **Label** and a **Name**.
- **Submit** — the submit button. Set its **Button Text** and pick a **Button Type** of *Primary*, *Secondary*, or *Accent*.
- **Form Response** — the box that appears after someone submits. Set a **Success message**, an **Error message**, the **Border** size, and the **Text alignment**.

The **Name** on each field is the short identifier that appears beside the answer in the submission email, so give each one something recognisable like `first-name` or `phone`.

The first time you add a Form block the inner blocks come pre-filled with a sensible starter layout, so you usually only need to adjust labels and submission settings. These six blocks can only be placed inside a Form block — they will not appear in the inserter elsewhere on the page.

## What about the "Sermon Audio", "Sermon Pastor" blocks?

These are **pattern-only blocks**. They appear in the inserter **only while you are editing a pattern**, so you will not find them when editing a normal page. They have no settings — each one simply shows the right detail for whichever sermon is being displayed. See the *Patterns* page for the full list and how to use them.
