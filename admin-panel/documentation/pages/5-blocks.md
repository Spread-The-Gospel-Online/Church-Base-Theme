# Blocks

The theme adds extra **blocks** to the WordPress editor — small drop-in pieces of content like a list of upcoming events, a sermons grid, a calendar, or a contact form. You add them the same way as any other block: click the **+** button in the editor and search for the block by name.

All of the theme's blocks are grouped under a **Theme** heading in the block inserter, so you can browse them in one place.

Some of them only appear when they are relevant, which is why you may not find them by searching:

- The pattern-only blocks (Sermon Audio, Sermon Pastor, and so on) appear **only while you are editing a pattern** — see the *Patterns* page.
- The form field blocks (Text Input, Email, Select, and so on) appear **only inside a Form block**.

## Content blocks

### Latest Sermons

Shows the most recent sermons as a grid of cards, under a *Recent Sermons* heading. The editor sidebar lets you set:

- **Number of sermons** to display — up to 4.
- **Number of columns** to lay them out in — up to 4. Leave it alone and the block follows your *Sermon Grid Size (Desktop)* setting from the Customizer.
- A **Sermon Pattern** to use for each card — if you choose one of your patterns, the block uses your design for the tile (see *Patterns*). Otherwise it uses the same card design as the sermons listing page.

> Note: the preview inside the editor may show two sermons no matter what you set **Number of sermons** to. Your chosen number is used correctly on the live page — preview the page to check it.

### Upcoming Events

Shows the next few events, ordered by date, soonest first. The sidebar lets you set:

- **Number of events** to display — up to 4.
- **Number of columns** to lay them out in — up to 4.

### Church Calendar

A full month calendar that fills itself in with all of your published events, with buttons to move to the previous or next month. Each event appears as a link on its day.

This block has no settings of its own beyond the shared Spacing panel. Its borders and colors are styled in **Appearance → Customize → Events Settings**.

You do not need to add it to a *Calendar* page by hand if you simply want the events listing — the events listing page already shows this calendar. Use the block when you want a calendar somewhere else, such as your homepage.

### Staff Members

Shows a selected group of staff members as cards. In the sidebar:

- **Select Staff** — click to expand, then tick each person you want to include. Everyone you have published appears in the list by name.
- **Number of Columns** to lay them out in.
- **Staff Pattern** — the pattern used to design each card (see *Patterns*).

This block **needs a Staff Pattern selected** before it will show anything. If you add it and the area stays empty, that is the reason — choose a pattern. If you just want a plain list of everyone, leave the staff listing page to build itself instead; see *Managing Staff*.

### Lorem Ipsum

A small helper for designers: drop it in and it fills itself with placeholder text. Set **Number of Paragraphs** (up to 5) in the sidebar. Useful while building patterns or layouts before the real copy is written.

Remember to remove it before you publish — the placeholder text is fetched fresh each time the page loads, so it will appear to visitors too.

## Spacing settings on every block

Open the editor sidebar for **any** block on the page — even the built-in WordPress blocks — and you will find a **Spacing** panel added by the theme. It contains:

- **Element Vertical Padding** — the space inside the block, above and below its content. *Theme Default* follows the padding size you set in **Appearance → Customize → General Settings**; or choose *None*, *Small*, *Medium*, or *Large*.
- **Border Radius** — how rounded the block's corners are: *None*, *Small*, *Medium*, or *Large*. The actual roundness of each size comes from General Settings.
- **Is Contained Width?** — on means the block lines up with your page content; off means it stretches the full width of the screen. Top-level blocks start contained and nested blocks start full-width, which is usually what you want.
- **Mobile Margin** — the space below the block on phones, from 0 to 200.
- **Desktop Margin** — the same, but applied on larger screens, so you can space things out more generously there.

These give you a consistent vertical rhythm without having to think about pixel values.

Two things to know:

- The **Border Radius** setting takes effect on standard WordPress blocks. It does not currently round the theme's own blocks (Latest Sermons, Upcoming Events, Church Calendar, Staff Members, Lorem Ipsum, Form).
- The accordion blocks do not have a Spacing panel — their spacing is set in **Appearance → Customize → Accordion Settings** instead.

## Parallax on images

If you have switched **Image Parallax Effect** on in **Appearance → Customize → General Settings**, every **Image** and **Cover** block gains two extra checkboxes. They are in the block's **Advanced** panel, right at the bottom of the block settings sidebar:

- **Enable Parallax?** — the image scrolls more slowly than the rest of the page, giving a sense of depth.
- **Set Parallax As Banner?** — treats the image as a full banner, which suits a wide image across the top of a section.

If you do not see these checkboxes, the effect is switched off site-wide — turn it on in General Settings first.

## Per-page hero settings

When a page has a hero (the big banner at the top), you can override the site-wide hero defaults for that one page.

The hero controls are **not** in the normal settings sidebar. Open the **Options** menu (the three dots in the top-right corner) and choose **Hero Settings** to open its panel. You can set:

- **Opacity** — how dark the overlay over the background image is.
- **Hero Background Color**.
- **Hero Text Color**.
- **Hero Height** — as a percentage of the visitor's screen height.

There is also a **Reset Hero Settings To Defaults** button, which clears all four so the page falls back to **Appearance → Customize → Hero Settings**.

Note there is no background image control in this panel. The hero image is the page's **featured image** — set it in the usual place in the settings sidebar.

The same panel appears on posts, pages, and every other kind of content, so you can style the hero of a single sermon or event too. For archive listing pages, set the hero on the Page whose slug matches the content type (the `sermons` page, the `events` page, and so on).

## Member-only content

The **Member Settings** panel marks an item as members-only. Like Hero Settings, you open it from the **Options** menu (the three dots, top right) rather than the normal sidebar. It has one checkbox, **Member Only?**.

When it is ticked, a visitor who is not logged in gets redirected to your homepage instead of seeing the item.

Two important limits:

- **It does not work on Pages.** It only applies to posts, sermons, events, staff, ministries, and other individual items. Ticking it on a Page has no effect.
- **It is not real access control.** The hiding happens in the visitor's browser, so the content is still present in the page's source code and still reachable through search engine caches. Treat it as a way to keep casual visitors out of in-progress or members-focused content — never as a way to protect anything genuinely private or sensitive.

Anyone with a WordPress account on the site, of any role, can see member-only items once logged in.

## The contact form

Drop a **Form** block onto a page and you get a form container you can fill with input blocks. Select the Form block itself and its sidebar has a **Form Submission** panel:

- **Form name** — shown in the subject line of the notification email, so make it something you will recognise in your inbox ("Contact Us", "Prayer Request").
- **On submit** — what happens when a visitor sends the form. Choose *Send email* (the default) to have it emailed to you, or *Post to endpoint* to send it to another service instead.
- **Email addresses** — appears when *Send email* is chosen. Type the addresses that should receive submissions, separated by commas.
- **Endpoint URL** — appears when *Post to endpoint* is chosen. Use this if your church has its own forms system or signup service.

The Form block also picks up the standard **Styles** tab, so you can set its background, text color, and font size like any other block.

### Where submissions go

This matters, so it is worth being plain about it: **submissions are emailed and nothing else.** They are not saved in WordPress. There is no list of past submissions anywhere in the admin.

If the email fails to send — a wrong address, a spam filter, a mail problem on the server — that submission is **lost with no record of it**. So:

- Always fill in **Email addresses** before publishing the page.
- Submit the form yourself once after publishing, and confirm the email arrives.
- If your site is not reliably sending email, ask your host or developer about an email-sending plugin before you rely on the form.

The notification email arrives with the subject *new submission from form:* followed by your **Form name**, and the body lists each field and what the visitor entered.

### The field blocks

Inside the form you can use:

- **Text Input** — a single-line text field. Set the **Label**, the **Name**, an optional **Placeholder**, and whether the field is **Required**.
- **Email** — same as Text Input, but for email addresses. Validates the format automatically.
- **Select** — a dropdown. The **Options (one per line)** box takes your choices with **one on each line** — press Enter between them, do not separate them with commas.
- **Checkbox** — a single checkbox, with a **Label**, a **Name**, and a **Required** toggle.
- **Submit** — the submit button. Set its **Button Text** and pick a **Button Type**: *Primary*, *Secondary*, or *Accent*. The colors for these come from **Appearance → Customize → Form Settings**.
- **Form Response** — the box that shows a message after someone submits. Set the **Success message**, the **Error message**, the **Border** (none, small, medium, or large), and the **Text alignment**.

About the **Name** field on each input: it is the short identifier that labels the field in your notification email, so give each one something readable like `full-name` or `phone`. Keep them different from each other, and do not leave them blank — a field with no name is not properly linked to its label, which makes the form harder to use with a screen reader.

> Important: add a **Form Response** block to every form. Without one, a visitor who submits the form gets no confirmation at all — the page simply sits there, and they have no way to tell whether it worked.

The first time you add a Form block the inner blocks come pre-filled with a starter layout (a text input, an email field, and a submit button), so you usually only need to adjust labels and submission settings — and add a Form Response block.

## What about the "Sermon Audio", "Sermon Pastor" blocks?

These are **pattern-only blocks** — they only do something useful inside a pattern that is being used as a sermon tile or sermon page. See the *Patterns* page for what each one does and how to use them.
