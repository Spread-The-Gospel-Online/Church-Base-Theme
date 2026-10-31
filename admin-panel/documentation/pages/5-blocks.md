# Blocks

The theme adds extra **blocks** to the WordPress editor — small drop-in pieces of content like a list of upcoming events, a sermons grid, a calendar, or a contact form. You add them the same way as any other block: click the **+** button in the editor and search for the block by name.

Most theme blocks are listed under their own name in the inserter. The pattern-only blocks (Sermon Audio, Sermon Pastor, and so on) are only useful inside a pattern — see the *Patterns* page for those.

## Content blocks

### Latest Sermons

Shows the most recent sermons as a grid of cards. The editor sidebar lets you set:

- **Number of sermons** — 1 to 4.
- **Number of columns** — 1 to 4. Leave it alone and the block uses your *Sermon Archive Styles* column setting.
- **Sermon Pattern** — if you choose one of your patterns, the block uses your design for each tile instead of the built-in one (see *Patterns*).

The block prints a **"Recent Sermons"** heading above the grid. That heading is fixed and cannot be changed from the editor.

### Upcoming Events

Shows the next few events as a grid of cards, ordered by date. The sidebar lets you set:

- **Number of events** — 1 to 4.
- **Number of columns** — 1 to 4.

### Church Calendar

A full interactive calendar that fills itself in with all of your published events. Useful on a dedicated *Calendar* page.

This block has **no settings of its own** — drop it in and it works. Its borders and colors are styled in **Appearance → Customize → Events Settings**.

### Staff Members

Shows a selected group of staff members as cards. In the sidebar:

- **Select Staff** — click to expand a list of every staff member, then tick the ones you want to appear.
- **Number of Columns** — 1 to 4.
- **Staff Pattern** — the pattern used to lay out each card (see *Patterns*).

> Important: this block shows nothing until you choose a **Staff Pattern**. Unlike the sermon and event blocks, it has no built-in card design to fall back on. If the block comes out blank on the published page, a missing pattern is almost always why.

> Note: the editor preview for this block does not always apply the chosen *Staff Pattern* correctly. If the preview looks wrong, check the published page before changing anything.

### Lorem Ipsum

A small helper for designers: drop it in and it fills itself with placeholder text. Set the **Number of Paragraphs** (1 to 5) in the sidebar. Useful while building patterns or layouts.

## Spacing settings on every block

Open the editor sidebar for **any** block on the page — even the built-in WordPress blocks — and you will find a **Spacing** panel added by the theme. It contains:

- **Element Vertical Padding** — how much space sits inside the block, above and below its content. Choose *Theme Default* (the site-wide value from *General Settings*), *None*, *Small*, *Medium*, or *Large*.
- **Border Radius** — how rounded the block's corners are: *None*, *Small*, *Medium*, or *Large*, using the radius sizes from *General Settings*.
- **Is Contained Width?** — when on, the block sits in a centered column the same width as your page content. Turn it off for a full-width block.
- **Mobile Margin** — how much space sits below the block on phones (0 to 200).
- **Desktop Margin** — the same, but from large screens up, so you can space things out more generously.

These give you a consistent vertical rhythm without having to think about pixel values.

> Note: the Spacing panel appears on every block, but only the theme's own blocks and the core blocks that use theme styling act on every option. On some third-party blocks the settings will have no visible effect. The two core accordion blocks do not get the panel at all.

## Per-page hero settings

When a page has a hero (the big banner at the top), you can override the site-wide hero defaults for that one page.

These settings live in their own sidebar, not in the document panel. Open the editor's **options** menu (the three dots in the top-right) and choose **Hero Settings**, or click its icon in the top bar. You can set:

- **Opacity** — how dark the overlay over the background image is.
- **Hero Background Color**.
- **Hero Text Color**.
- **Hero Height**.
- **Reset Hero Settings To Defaults** — clears all four back to the Customizer values.

If you do not override any of these, the page uses the values from **Appearance → Customize → Hero Settings**.

> Note: there is no background-image field here. A page's hero image is its **featured image**. If a page has none, the theme falls back to that content type's archive page image, and then to your homepage's featured image.

## Member-only content

The **Member Settings** sidebar — also reached from the editor's options menu — has a single **Member Only?** checkbox. Tick it to mark an individual page as members-only: visitors who are not logged in are sent to the home page instead of seeing the content.

## Parallax on individual images

When **Image Parallax Effect** is enabled in *General Settings*, Image and Cover blocks gain two checkboxes in their **Advanced** panel at the bottom of the block sidebar:

- **Enable Parallax?** — the image scrolls more slowly than the rest of the page.
- **Set Parallax As Banner?** — uses the taller banner version of the effect.

If the site-wide setting is switched off, these checkboxes do not appear at all.

## Accordions

The theme restyles the core WordPress **Accordion** blocks so they use the browser's own expand and collapse behavior. You build them exactly as WordPress documents; the theme handles the appearance, which you control under **Appearance → Customize → Accordion Settings**.

## The contact form

Drop a **Form** block onto a page and you get a form container you can fill with input blocks. The form's sidebar has a **Form Submission** panel where you choose what happens when someone submits it:

- **Form name** — shown in the submission email's subject line.
- **On submit** — either **Send email** or **Post to endpoint**.
- **Email addresses** — appears when *Send email* is chosen. Enter the recipients, separated by commas. These are stored on the server rather than in the page, so they are not exposed to visitors.
- **Endpoint URL** — appears when *Post to endpoint* is chosen. Use this if your church has its own forms system or signup service.

Inside the form you can use:

- **Text Input** — a single-line text field. Set the **Label**, **Name**, **Placeholder**, and whether the field is **Required**.
- **Email** — the same, but for email addresses. Validates the format automatically.
- **Select** — a dropdown. The **Options (one per line)** box takes one choice per line.
- **Checkbox** — a single checkbox, with a **Label**, a **Name**, and a **Required** toggle.
- **Submit** — the submit button. Set its **Button Text** and pick a **Button Type**: *Primary*, *Secondary*, or *Accent*.
- **Form Response** — the box that appears after someone submits. Set the **Success message**, the **Error message**, the **Border** size, and the **Text alignment**.

The first time you add a Form block the inner blocks come pre-filled with a sensible starter layout, so you usually only need to adjust labels and submission settings.

> Note: the form's internal ID is generated for you when you insert the block. There is nothing to fill in, and you should not need to think about it.

## What about the "Sermon Audio", "Sermon Pastor" blocks?

These are **pattern-only blocks** — they only do something useful inside a pattern that is being used as a sermon tile or sermon page, and they only appear in the inserter while you are editing a pattern. They are **Sermon Audio**, **Sermon Pastor**, **Sermon Download**, and **Series Link**. See the *Patterns* page for what each one does and how to use them.
