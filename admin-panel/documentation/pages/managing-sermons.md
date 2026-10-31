# Managing Sermons

Sermons are one of the main content types in the theme. Each sermon has its own page on the site (with the audio player, pastor, and series shown), and the full list of sermons appears on the sermons archive page.

This page covers adding sermons manually and setting up automatic sermon importing from a feed.

## Adding a sermon by hand

1. In the admin sidebar, click **Sermons → Add New**.
2. Set the **title** — usually the sermon's title.
3. Use the main editor area for the sermon's description, transcript, or notes.
4. Set a **featured image** in the sidebar. If you do not, the *Default Sermon Image* from the *Sermon Page Styles* Customizer section will be used instead.
5. In the side panel, choose the **Pastor** — a list of everyone in *Staff*. Pick one.
6. In the side panel, choose the **Related Sermon Series** if the sermon belongs to a series. (You can leave this blank if the sermon is a one-off.)
7. The **publish date** controls where the sermon shows up in the sermons list, so set it to the date the sermon was preached if it is different from today.
8. Click **Publish**.

## Importing sermons automatically from a feed

If your church publishes its sermons somewhere that offers a feed, the theme can pull them in for you automatically — you do not need to add each one by hand. Three kinds of feed work:

- A **podcast feed** from a sermon-hosting or podcast service. Most of these end in `.xml`.
- A **YouTube channel feed**, if you post your services to YouTube.
- Most other standard blog or news feeds.

### Setting up the feed

1. Go to **Sermons → Sermon Settings**.
2. Paste the URL of your sermon feed into the **Sermon Feed** field.
3. Click **Save Changes**.

Leave the field blank and the theme assumes you are uploading sermons manually — no feed is checked.

### How automatic import works

- A background job runs once a week, on Sunday afternoons, and fetches the feed.
- Any sermons in the feed that the site does not already have are added as new, published sermons. Existing sermons are left alone, so re-running the import will never create duplicates.
- For each new sermon, the theme captures the title, description, publish date, and audio link from the feed.
- It also downloads the sermon's artwork or video thumbnail into your media library and sets it as the sermon's featured image, so imported sermons look right in lists straight away.
- From a YouTube feed it captures the video link as well, and the video is embedded at the top of the sermon's page.
- The theme reads the pastor's name from the feed and links the sermon to the matching staff member. If no staff member with that name exists yet, the theme creates one automatically — you can fill in their photo and details later. See *Managing Staff*.

### Fetching updates manually

If you do not want to wait for the weekly run, the **Sermon Settings** page shows a **Fetch Sermons** button (only when a feed URL is set). Click it and the import runs immediately.

### When the import fails

If an automatic import goes wrong, the theme puts a warning notice at the top of every admin screen beginning **"Sermon auto-import problem:"**, along with when it last tried and a **Review Sermon Settings** link. The message tells you what happened — the feed could not be reached, it returned an error, it came back empty, it was not readable, or no feed URL is set at all.

Most of the time it is a mistyped or moved feed address, so start by checking the URL on the Sermon Settings page and pressing **Fetch Sermons** to try again. The notice clears once an import succeeds.

Successful imports are quiet — no notice appears — so if you want to confirm one ran, look at the top of your sermons list for new entries.

## What appears on a sermon's page

The built-in sermon layout shows:

- The sermon's featured image as the hero.
- The title.
- An embedded video, if the sermon came in from a YouTube feed.
- An audio player and a **Save** download link, if an audio file was captured during import.
- The publish date, the pastor's name, the series the sermon belongs to, and the Bible passage (if set).
- The sermon's description or notes.

Any plain web address you type into the sermon's description becomes a clickable link automatically, so you do not need to format links by hand.

In **Appearance → Customize → Sermon Page Styles** you can change the order of the date / pastor / series / passage details, how many columns they sit in, and — with **Hide Sermon Hero** — drop the banner image from sermon pages altogether. If you want a completely different layout, see the *Patterns* page: the *Sermon Contents Pattern* setting lets you replace the built-in layout with one you design.

## What the sermons list looks like

The sermons archive page (the page with the slug `sermons`) shows every published sermon as a card in a grid. The look of these cards — how many columns, the card's shape, whether the title sits on top of the image or below it, and what details appear — is controlled in **Appearance → Customize → Sermon Archive Styles**.

The same card styling is used everywhere sermons are listed, including the **Latest Sermons** block and the list of sermons on a staff member's page.

If you would rather design the card yourself, use the *Card Contents Pattern* setting there. See *Patterns* for how that works.

## Browsing one pastor's sermons

Every staff member's page lists the sermons they preached, paginated. That makes a staff page double as a per-pastor sermon archive, and it is the easiest way to point someone at one preacher's messages. See *Managing Staff*.

## Sermon series

A sermon series is a separate content type — switch on **sermon-series** in **Settings → Theme Settings**, then go to **Sermon Series → Add New** to create one. Each series has its own page and the sermons assigned to it list there.

You assign a sermon to a series from the sermon, not from the series: edit the sermon and pick from its **Related Sermon Series** box.

> Tip: Use the **Sermon Series Default Image** in the Customizer to provide a fallback image so series that have not been given a featured image still look polished in lists.
