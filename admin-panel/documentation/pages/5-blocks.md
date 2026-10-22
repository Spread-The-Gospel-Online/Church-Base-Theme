# Blocks

The theme adds extra **blocks** to the WordPress editor — small drop-in pieces of content like a list of upcoming events, a sermons grid, a calendar, or a contact form. You add them the same way as any other block: click the **+** button in the editor and search for the block by name.

Most theme blocks are listed under their own name in the inserter. The pattern-only blocks (Sermon Audio, Sermon Pastor, and so on) are only useful inside a pattern — see the *Patterns* page for those.

## Content blocks

### Latest Sermons

Shows the most recent sermons as a grid of cards. The editor sidebar lets you set:

- **Number of sermons** to display.
- **Number of columns** to lay them out in.
- A **Sermon Pattern** to use for each card — if you choose one of your patterns, the block uses your design for the tile (see *Patterns*).

### Upcoming Events

Shows the next few events as a grid of cards, ordered by date. The sidebar lets you set:

- **Number of events** to display.
- **Number of columns** to lay them out in.

### Church Calendar

A full interactive calendar that fills itself in with all of your published events. Useful on a dedicated *Calendar* page. The calendar's borders are styled in **Appearance → Customize → Events Settings**.

### Staff Members

Shows a selected group of staff members as cards. In the sidebar:

- **Staff IDs** — pick which staff members appear.
- **Number of columns** to lay them out in.
- A **Staff Pattern** to design the card yourself (see *Patterns*).

### Lorem Ipsum

A small helper for designers: drop it in and it fills itself with placeholder text. Set the number of paragraphs in the sidebar. Useful while building patterns or layouts.

## Spacing settings on every block

Open the editor sidebar for **any** block on the page — even the built-in WordPress blocks — and you will find a **Spacing** panel added by the theme. It contains:

- **Element Vertical Padding** — how much space sits inside the block, above and below its content. Choose *Theme Default*, *None*, *Small*, *Medium*, or *Large*. Leaving it on **Theme Default** means the block follows the *Default Padding Size* set in **Appearance → Customize → General Settings**, so it changes with the rest of the site.
- **Border Radius** — how rounded the block's corners are: *None*, *Small*, *Medium*, or *Large*. These match the **Border Radius** sizes set in *General Settings*.
- **Is Contained Width?** — when on, the block sits in a centered column the same width as your page content. When off, it runs the full width of the screen. Useful for full-bleed images and colored bands.
- **Mobile Margin** — how much space sits below the block on phones, from 0 to 200.
- **Desktop Margin** — the same, for larger screens, so you can space things out more generously there.

These give you a consistent vertical rhythm without having to think about pixel values. Because the padding and radius options point back at the Customizer rather than at fixed sizes, changing those site-wide values restyles every block that was left on the standard options.

New blocks come with sensible starting points: a top-level block is contained by default, a block nested inside another is not, and blocks inside a pattern or a notification start full-width.

## Per-page hero settings

When a page has a hero (the big banner at the top), you can override the site-wide hero defaults for that one page. With nothing selected in the editor, open the editor sidebar and look for the **Hero Settings** panel. You can set:

- A different **background image**.
- A different **text color**, **background color**, and **opacity** for the overlay.
- A different **height**.

If you do not override any of these, the page uses the values from **Appearance → Customize → Hero Settings**.

## Member-only content

The **Member Settings** panel (also in the editor sidebar) holds a single **Member Only?** checkbox. Tick it and anyone who is not logged in to the site is sent to your homepage instead of seeing that item.

There are three things to know before you rely on it:

- **It works on posts, sermons, events, staff, and ministries — but not on Pages.** The checkbox appears when you edit a Page, but it has no effect there. To restrict a Page, use WordPress's own **Password protected** or **Private** visibility options in the Publish panel instead.
- **Any logged-in account can see it**, whatever their role. A subscriber sees the same content as an administrator. There is no separate "members" group.
- **The title and summary still appear in lists.** A restricted item is hidden only on its own page — it can still show up in archives, the search results page, and blocks like Latest Sermons. Keep anything sensitive out of the title and excerpt.

> Note: This is a convenience feature for keeping ordinary content out of the way of casual visitors — a members' meeting write-up, for instance. It is not real security, and it should not be used for anything confidential such as personal details, financial information, or safeguarding records. For genuinely private material, use a membership plugin or keep it off the website.

## The contact form

Drop a **Form** block onto a page and you get a form container you can fill with input blocks. The form's sidebar has a **Form Submission** panel where you choose what happens when someone submits it:

- **Email** — sends the submission to one or more email addresses. Type the addresses you want notifications to go to.
- **Endpoint** — sends the submission to a URL you provide. Use this if your church has its own forms system or signup service.

Give the form a **Form Name** (used in subject lines and labels) and a **Form ID** if you want to refer to it elsewhere.

Inside the form you can use:

- **Text Input** — a single-line text field. Set the label, the field name, optional placeholder, and whether the field is required.
- **Email** — same as Text Input, but for email addresses. Validates the format automatically.
- **Select** — a dropdown. The **options** field takes a comma-separated list of choices.
- **Checkbox** — a single checkbox, with a label and a name.
- **Submit** — the submit button. Set its text and pick between a primary or secondary style.
- **Form Response** — the box that appears with a success or error message after someone submits. Set the message text, alignment, and border size.

The first time you add a Form block the inner blocks come pre-filled with a sensible starter layout, so you usually only need to adjust labels and submission settings.

## What about the "Sermon Audio", "Sermon Pastor" blocks?

These are **pattern-only blocks** — they only do something useful inside a pattern that is being used as a sermon tile or sermon page. See the *Patterns* page for what each one does and how to use them.
