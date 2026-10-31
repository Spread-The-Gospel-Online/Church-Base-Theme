# Blocks

The theme adds extra **blocks** to the WordPress editor — small drop-in pieces of content like a list of upcoming events, a sermons grid, a calendar, or a contact form. You add them the same way as any other block: click the **+** button in the editor and search for the block by name.

You will find the theme's blocks grouped under **Theme** in the inserter. The pattern-only blocks (Sermon Audio, Sermon Pastor, and so on) only show up while you are editing a pattern — see the *Patterns* page for those.

## Content blocks

### Latest Sermons

Shows the most recent sermons as a grid of cards. The editor sidebar lets you set:

- **Number of sermons** to display, from 1 to 4.
- **Number of columns** to lay them out in, from 1 to 4.
- A **Sermon Pattern** to use for each card — if you choose one of your patterns, the block uses your design for the tile (see *Patterns*).

Apart from the pattern, the cards look the way your **Customize → Sermon Archive Styles** settings say they should.

### Upcoming Events

Shows the next few events, ordered by date, starting from today. The sidebar lets you set:

- **Number of events** to display, from 1 to 4.
- **Number of columns** to lay them out in, from 1 to 4.

This block lists event **names** only — there are no images, dates, or descriptions on them, and the names currently appear in their web-address form (`mens-breakfast` rather than "Mens Breakfast"). Treat it as a compact pointer towards your calendar page rather than a showcase; use **Church Calendar** or a Layout with your own content if you need something richer.

### Church Calendar

A full interactive calendar that fills itself in with all of your published events, with month-by-month navigation. The calendar's borders and colors are styled in **Appearance → Customize → Events Settings**.

Your events archive page already shows this calendar, so you only need the block if you want a calendar somewhere else as well — on the homepage, say.

### Staff Members

Shows a selected group of staff members as cards. In the sidebar:

- **Select Staff** — click to expand, then tick each person you want to appear. Nobody is selected to begin with, so a new block looks empty until you choose someone.
- **Number of Columns** to lay them out in, from 1 to 4.
- A **Staff Pattern** to design the card yourself (see *Patterns*).

> Tip: In the editor the preview ignores the Staff Pattern you pick. Save and view the page to see your pattern applied.

## Spacing settings on every block

Open the editor sidebar for **any** block on the page — even the built-in WordPress blocks — and you will find a **Spacing** panel added by the theme. It contains:

- **Element Vertical Padding** — how much space sits inside the block above and below its content. *Theme Default* follows the padding size you set in **Customize → General Settings**; the other choices are None, Small, Medium, and Large.
- **Border Radius** — how rounded the block's corners are: None, Small, Medium, or Large, using the radius sizes from *General Settings*.
- **Is Contained Width?** — on means the block lines up with your page content; off means it runs the full width of the screen. New top-level blocks start contained, and blocks nested inside another block start uncontained.
- **Mobile Margin** — the space below the block on phones, from 0 to 200.
- **Desktop Margin** — the same, for larger screens, so you can space things out more generously there.

These give you a consistent vertical rhythm without having to think about pixel values.

The one exception is the accordion blocks, which manage their own spacing — see **Customize → Accordion Settings** for those.

## Per-page hero settings

When a page has a hero (the big banner at the top), you can override the site-wide hero defaults for that one page. Open the **⋮** menu in the top-right corner of the editor and choose **Hero Settings**. You can set:

- **Opacity** — how dark the overlay over the background image is.
- **Hero Background Color** — the color behind the hero, which shows through the image according to the opacity, and fills the hero entirely when there is no image.
- **Hero Text Color** — the color of the page title in the hero.
- **Hero Height** — how tall the hero is, as a percentage of the visitor's screen.

There is also a **Reset Hero Settings To Defaults** button that clears all four back to the site-wide values.

The hero's **image** is not set here — it is the page's **featured image**, which you set in the normal place in the editor sidebar. If a page has no featured image, the theme falls back to the archive page's image for that content type, then your homepage's image.

If you do not override any of these, the page uses the values from **Appearance → Customize → Hero Settings**.

This panel is available on every kind of content except Layouts.

## Member-only content

The **Member Settings** panel — also reached from the editor's **⋮** menu — lets you mark an individual page, post, sermon, or event as members-only with a single **Member Only?** checkbox. Use this for content that should not be public:

- Visitors who are not logged in are sent to the login page, and come back to the page once they log in.
- Members-only content is also left out of archives, search results, the RSS feed, and the site's API for anyone not logged in.

## Parallax on images

When **Image Parallax Effect** is enabled in **Customize → General Settings**, every **Image** and **Cover** block gains two checkboxes in its **Advanced** panel:

- **Enable Parallax?** — the image drifts as the visitor scrolls past it.
- **Set Parallax As Banner?** — treats the image as a full banner rather than an inline image.

While the setting is disabled these checkboxes do not appear at all, so if you cannot find them, check that setting first.

## The contact form

Drop a **Form** block onto a page and you get a form container you can fill with input blocks. The form's sidebar has a **Form Submission** panel with:

- **Form name** — shown in the subject line of the notification email.
- **On submit** — either **Send email** or **Post to endpoint**.
- **Email addresses** — appears when you chose *Send email*. Type the addresses that should receive submissions, separated by commas. New or changed addresses only take effect when the page is **published** or updated, never while it is still a draft.
- **Endpoint URL** — appears when you chose *Post to endpoint*. Use this if your church has its own forms system or signup service.

Inside the form you can use:

- **Text Input** — a single-line text field. Set the **Label**, the **Name**, an optional **Placeholder**, and whether the field is **Required**.
- **Email** — same as Text Input, but for email addresses. Validates the format automatically.
- **Select** — a dropdown. Type the choices into **Options (one per line)**, one on each line.
- **Checkbox** — a single checkbox, with a label and a name.
- **Submit** — the submit button. Set its **Button Text** and pick a **Button Type**: Primary, Secondary, or Accent.
- **Form Response** — the box that appears after someone submits. Set the **Success message**, the **Error message**, the **Border** size, and the **Text alignment**.

The **Name** on each field is the label the submission arrives under in your email, so give each one something you will recognise — `phone`, `childs-name`, and so on.

These field blocks only show up in the inserter when you are already inside a Form block, so add the Form first. The first time you add one, it comes pre-filled with a Text Input, an Email field, and a Submit button, so you usually only need to adjust labels and submission settings.

## Blur settings on images

Every **Image** and **Cover** block has a **Blur Image** panel with a single **Blur image while loading** toggle. A new block follows whatever you chose in **Customize → Images**; flip the toggle to override it for that one image. See the *Customizer* page for what the blur does.

## What about the "Sermon Audio", "Sermon Pastor" blocks?

These are **pattern-only blocks** — they only appear in the inserter while you are editing a pattern, and they only have anything to show when that pattern is being used for a sermon. See the *Patterns* page for what each one does and how to use them.
