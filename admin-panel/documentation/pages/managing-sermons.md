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

If your church uses a service that publishes a podcast-style sermon feed (an RSS or XML feed), the theme can pull sermons in for you automatically — you do not need to add each one by hand.

### Setting up the feed

1. Go to **Sermons → Sermon Settings**.
2. Paste the URL of your sermon feed into the **Sermon Feed** field. (Most feeds end in `.xml`.)
3. Click **Save Changes**.

Leave the field blank and the theme assumes you are uploading sermons manually — no feed is checked.

### How automatic import works

- A background job runs once a week (Sunday afternoon) and fetches the feed.
- Any sermons in the feed that the site does not already have are added as new sermons. Existing sermons are left alone, so re-running the import will never create duplicates.
- For each new sermon, the theme captures the title, description, publish date, and audio link from the feed.
- The theme also reads the pastor's name from the feed and links the sermon to the matching staff member. If no staff member with that name exists yet, the theme creates one automatically — you can fill in their photo, bio, and other details later.

### Fetching updates manually

If you do not want to wait for the weekly run, the **Sermon Settings** page shows a **Fetch Sermons** button (only when a feed URL is set). Click it and the import runs immediately.

## What appears on a sermon's page

The built-in sermon layout shows:

- The sermon's featured image as the hero.
- The title.
- The publish date, the pastor's name, the series the sermon belongs to, and the Bible passage (if set).
- The sermon's description or notes.
- An audio player and a download link, if an audio URL was captured during import.

You can change the order of date / pastor / series / passage in **Appearance → Customize → Sermon Page Styles**. If you want a completely different layout, see the *Patterns* page — the *Sermon Contents Pattern* setting lets you replace the built-in layout with one you design.

## What the sermons list looks like

The sermons archive page (the page with the slug `sermons`) shows every published sermon as a card in a grid. The look of these cards — how many columns, the card's shape, whether the title sits on top of the image or below it, and what details appear — is controlled in **Appearance → Customize → Sermon Archive Styles**.

If you would rather design the card yourself, use the *Card Contents Pattern* setting there. See *Patterns* for how that works.

## Sermon series

A sermon series is a separate content type — go to **Sermon Series → Add New** to create one. Each series has its own page and the sermons assigned to it list there.

> Tip: Use the **Sermon Series Default Image** in the Customizer to provide a fallback image so series that have not been given a featured image still look polished in lists.
