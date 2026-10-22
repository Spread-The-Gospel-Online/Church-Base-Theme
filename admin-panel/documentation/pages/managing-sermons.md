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

If your church already publishes sermons somewhere else, the theme can pull them in for you automatically — you do not need to add each one by hand.

### What kind of feed works

Most sermon and video services publish a feed, and the theme understands the common formats:

- **Podcast and audio feeds** — the RSS feed from a sermon-hosting or podcast service. This is the usual case, and it brings in the audio player.
- **A YouTube channel feed** — if you post your services to YouTube, the channel's feed works too, and each imported sermon gets the video embedded on its page.
- **Other standard feeds** — the theme reads both of the common feed formats, so a feed from a church management system will generally work as well.

If you are not sure whether your service offers a feed, look for a "Podcast", "RSS", or "Subscribe" link in its settings, or ask its support team for the feed URL.

### Setting up the feed

1. Go to **Sermons → Sermon Settings**.
2. Paste the URL of your sermon feed into the **Sermon Feed** field. (Most feeds end in `.xml`.)
3. Click **Save Changes**.

Leave the field blank and the theme assumes you are uploading sermons manually — no feed is checked.

### How automatic import works

- A background job runs once a week, on Sunday afternoon, and fetches the feed.
- Any sermons in the feed that the site does not already have are added as new, published sermons. Existing sermons are left alone, so re-running the import will never create duplicates.
- For each new sermon, the theme captures the title, description, publish date, audio link, video page link, and cover image from the feed. Not every feed provides all of these — the theme takes whatever is there and skips the rest.
- The theme also reads the pastor's name from the feed and links the sermon to the matching staff member. If no staff member with that name exists yet, the theme creates one automatically — you can fill in their photo, bio, and other details later. See *Managing Staff*.

Because matching is done on the sermon's title, renaming a sermon on your hosting service makes the theme treat it as a new sermon and import it again. If that happens, delete whichever copy you do not want.

### Fetching updates manually

If you do not want to wait for the weekly run, the **Sermon Settings** page shows a **Fetch Sermons** button (only when a feed URL is set). Click it and the import runs immediately.

### If the import fails

When an automatic run cannot complete, the theme puts a warning notice at the top of the admin screens. It names the problem, shows when the feed was last checked, and offers a **Review Sermon Settings** link straight to the settings page.

The message tells you what to do next. Common ones are:

- **No feed URL is configured** — the Sermon Feed field is empty. Paste your feed URL in and save.
- **Could not reach the sermon feed** — the address could not be loaded at all. Check the URL for typos, and try opening it in a browser tab to confirm it still works.
- **The feed returned an error**, with a number — your hosting service answered but refused the request. The feed may have moved, or been made private. Check the URL in your hosting service's settings.
- **The feed could not be read**, or **returned an empty response** — the address loaded but did not contain a usable feed. This usually means the URL points at a normal web page rather than the feed itself.

The notice stays until a run succeeds, so you can fix the setting and click **Fetch Sermons** to clear it straight away. A successful run never shows a notice — no news is good news.

## What appears on a sermon's page

The built-in sermon layout shows:

- The sermon's featured image as the hero.
- The title.
- An embedded video player, when the sermon came from a YouTube feed.
- The publish date, the pastor's name, the series the sermon belongs to, and the Bible passage (if set).
- The sermon's description or notes.
- An audio player and a download link, if an audio URL was captured during import.

You can change the order of date / pastor / series / passage in **Appearance → Customize → Sermon Page Styles**, along with how many columns those details sit in and how wide they are. The same section has a **Hide Sermon Hero** setting — turn it on and sermon pages start with the video or audio player rather than the banner image, which suits churches whose sermons are mostly watched or listened to.

If you want a completely different layout, see the *Patterns* page — the *Sermon Contents Pattern* setting lets you replace the built-in layout with one you design.

## What the sermons list looks like

The sermons archive page (the page with the slug `sermons`) shows every published sermon as a card in a grid. The look of these cards — how many columns, the card's shape, whether the title sits on top of the image or below it, and what details appear — is controlled in **Appearance → Customize → Sermon Archive Styles**.

If you would rather design the card yourself, use the *Card Contents Pattern* setting there. See *Patterns* for how that works.

## Sermon series

A sermon series is a separate content type — go to **Sermon Series → Add New** to create one. Each series has its own page and the sermons assigned to it list there.

> Tip: Use the **Sermon Series Default Image** in the Customizer to provide a fallback image so series that have not been given a featured image still look polished in lists.
