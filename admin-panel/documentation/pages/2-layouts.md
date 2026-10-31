# Layouts

**Layouts** let you build a block of content once and show it automatically across many pages of your site — without touching any code. Create a layout, design it however you like, then choose where it should appear. The same layout can show up on your homepage, on every sermon, across a whole list of events, and more.

## Building a layout

Go to **Layouts** in the admin menu and choose **Add New**. A layout opens in the full WordPress block editor — the same editor you use for pages — so you can add **any content**: text, headings, images, buttons, columns, galleries, embeds, and any of the theme's blocks. Give your layout a title, design it, then publish it.

## Choosing where it appears

Every layout has a few simple settings that decide where it shows up. On your homepage, on
single items, and on listing pages, a layout only appears when **all** of its settings match
that page. (See *An important exception* below for the one place that is not true yet.)

### 1. Position on the page

**Layout Settings** is its own sidebar rather than a panel in the document column. Open the
editor's **options** menu (the three dots in the top-right) and choose **Layout Settings**, then
pick a **Layout Item Position**:

- **None (will not show)** — the layout is hidden everywhere. Use this to switch a layout off without deleting it.
- **Before Hero** — at the very top, above the large header/hero image.
- **Before Content** — between the hero and the main page content.
- **After Content** — below the main content, just above the footer.

### 2. Page types

In the **Template Types** box (side panel), tick where the layout is allowed to appear:

- **homepage** — your site's front page.
- **single** — an individual item's own page, such as one sermon, one event, or one staff member.
- **archive** — a listing page that shows many items of one type, such as the full sermons list or events list.

You can tick more than one, so a single layout can appear in several places at once.

### 3. Content types

In the **Post Types** box (side panel), tick which kinds of content the layout applies to —
for example **sermons**, **events**, **staff**, **page**, or **post**. The list shows the raw
names WordPress uses internally, so expect lowercase entries like `sermon-series`.

This works together with **single** and **archive** above. For example, ticking **single**
plus **sermons** shows the layout on each individual sermon. (The **homepage** option ignores
this box, since there is only one homepage.)

### An important exception

The matching described above covers your homepage, single items, and listing pages. Any **other**
kind of view — a regular Page, your search results, or the 404 page — is not filtered yet.

On those views, **every layout with a position set is displayed**, whatever you ticked in
*Template Types* and *Post Types*. Ticking only *single* and *sermons* will still put the layout
on all of your regular Pages.

Until this is finished, the practical advice is:

- Expect any layout you create to appear on your regular Pages.
- If a layout should not appear there, set its **Layout Item Position** to *None (will not show)* while you are not using it, rather than relying on the targeting boxes.
- Ticking **page** in *Post Types* currently makes no difference either way.

## Putting it together

On your homepage, single items, and listing pages, a layout appears when its **Position** is set
(not "None") and the page matches your **Template Types** and **Post Types** choices. A few
examples:

- **Homepage welcome banner** — Position: Before Content; Template Types: Homepage. Shows on the front page only.
- **Sermon call-to-action** — Position: After Content; Template Types: Single; Post Types: sermons. Shows at the bottom of every individual sermon.
- **Events intro** — Position: Before Content; Template Types: Archive; Post Types: events. Shows at the top of the events list.

> Tip: Because one layout can target several page types and content types at once, you can
> reuse the same content in many places — update it once and every spot stays in sync.
