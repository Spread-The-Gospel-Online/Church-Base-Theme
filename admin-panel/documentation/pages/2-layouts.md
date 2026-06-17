# Layouts

**Layouts** let you build a block of content once and show it automatically across many pages of your site — without touching any code. Create a layout, design it however you like, then choose where it should apear. The same layout can show up on your homepage, on every sermon, across a whole list of events, and more.

## Building a layout

Go to **Layouts** in the admin menu and choose **Add New**. A layout opens in the full WordPress block editor — the same editor you use for pages — so you can add **any content**: text, headings, images, buttons, columns, galleries, embeds, and any of the theme's blocks. Give your layout a title, design it, then publish it.

## Choosing where it appears

Every layout has a few simple settings that decide where it shows up. A layout only appears
on a page when **all** of its settings match that page.

### 1. Position on the page

In the editor's right sidebar, open **Layout Settings** and pick a **Layout Item Position**:

- **None (will not show)** — the layout is hidden everywhere. Use this to switch a layout off without deleting it.
- **Before Hero** — at the very top, above the large header/hero image.
- **Before Content** — between the hero and the main page content.
- **After Content** — below the main content, just above the footer.

### 2. Page types

In the **Template Types** box (side panel), tick where the layout is allowed to appear:

- **Homepage** — your site's front page.
- **Single** — an individual item's own page, such as one sermon, one event, or one staff member.
- **Archive** — a listing page that shows many items of one type, such as the full sermons list or events list.

You can tick more than one, so a single layout can appear in several places at once.

### 3. Content types

In the **Post Types** box (side panel), tick which kinds of content the layout applies to —
for example **sermons**, **events**, **staff**, **pages**, or **posts**.

This works together with **Single** and **Archive** above. For example, ticking **Single**
plus **sermons** shows the layout on each individual sermon. (The **Homepage** option ignores
this box, since there is only one homepage.)

## Putting it together

A layout appears on a page when its **Position** is set (not "None") and the page matches your
**Template Types** and **Post Types** choices. A few examples:

- **Homepage welcome banner** — Position: Before Content; Template Types: Homepage. Shows on the front page only.
- **Sermon call-to-action** — Position: After Content; Template Types: Single; Post Types: sermons. Shows at the bottom of every individual sermon.
- **Events intro** — Position: Before Content; Template Types: Archive; Post Types: events. Shows at the top of the events list.

> Tip: Because one layout can target several page types and content types at once, you can
> reuse the same content in many places — update it once and every spot stays in sync.
