# Managing Staff

The Staff content type holds the people at your church — pastors, elders, office staff, ministry leaders. Each person gets their own page, they are listed together on the staff page, and they can be attached to sermons as the preaching pastor.

Staff is one of the two content types switched on by default (the other is Sermons), so you should find **Staff** in the admin sidebar straight away. If you do not, tick `staff` under **Settings → Theme Settings**.

## Adding a staff member

1. In the admin sidebar, click **Staff → Add New**.
2. Set the **title** — the person's name. This is what appears everywhere they are listed.
3. Use the main editor area for their biography.
4. Set a **featured image** — their photo. It is used on staff cards and as the banner on their own page.
5. Fill in the **Excerpt** box for a short summary. This is the one-or-two-line version used on cards where there is no room for the full biography. If you cannot see the Excerpt box, open the **Options** menu (the three dots, top right), choose **Preferences**, and switch **Excerpt** on under *Panels*.
6. Click **Publish**.

There are no extra fields to fill in — no separate box for a job title or role. If you want someone's role to show, put it at the start of the excerpt or the biography, or design a staff card with a pattern.

## What appears on a staff member's page

The built-in layout shows their photo as the banner, and then their sermons: if the Sermons content type is enabled, each person's page lists every sermon where they are set as the pastor, with page links at the bottom when there are more than will fit on one page.

The number of sermons per page comes from WordPress's own **Settings → Reading → Blog pages show at most** value.

To design the page yourself, use the **Staff Contents Pattern** setting in **Appearance → Customize → Staff Page**. See the *Patterns* page for how that works.

## The staff listing page

How the staff listing at `/staff/` behaves depends on whether you have created a Page with the slug `staff`:

- **No `staff` Page exists** — the theme builds the listing for you automatically. Every published staff member appears, two to a row, with their photo beside their name and excerpt.
- **A `staff` Page exists** — the theme shows *that page's content* instead, and the automatic listing disappears. The page's banner image also becomes the banner for the listing.

This catches people out. The theme shows a reminder notice asking you to create a `staff` page (so the listing gets a proper banner image), but as soon as that page exists, whatever you put in it replaces the automatic list. If you want both a banner and a list of people, create the `staff` page and add a **Staff Members** block to it — see the *Blocks* page.

If the `staff` page has a parent page or child pages, a navigation sidebar is added alongside the content.

## Staff created automatically by the sermon importer

If you have set up automatic sermon importing, be aware that the importer creates staff entries on your behalf.

When a sermon arrives from your feed, the theme reads the preacher's name and looks for a matching staff member. If there is no match, it creates one — published immediately, with the name filled in and nothing else. No photo, no biography, no excerpt.

So after the importer has run, you may find staff entries you did not create. They are not a mistake: they are the preachers from your feed. Open each one and fill in a photo and a biography, or delete the ones you do not want listed. See *Managing Sermons* for more on the importer.

> Tip: because these auto-created entries are published straight away, they will show up on your staff listing page looking empty. It is worth reviewing **Staff** shortly after the first import run.

## Showing staff elsewhere on the site

Use the **Staff Members** block on any page to show a chosen group of people. You pick exactly who appears, how many columns to use, and which pattern designs each card. Note that this block needs a pattern selected before it will display anything. See the *Blocks* page.

## Linking staff to sermons

The link between a sermon and a staff member is made from the **sermon**, not from here. Open a sermon and choose the person in its **Pastor** box. Once that is set, the sermon shows their name (linked to their page), and the sermon appears in the list on their page.

Only published staff members appear in that **Pastor** box, so add the person before you try to attach them to a sermon.
