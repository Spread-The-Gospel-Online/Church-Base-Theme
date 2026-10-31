# Managing Sermons

Sermons are one of the main content types in the theme. Each sermon has its own page on the site (with the audio player, pastor, and series shown), and the full list of sermons appears on the sermons archive page.

This page covers adding sermons manually and setting up automatic sermon importing from a feed.

## Adding a sermon by hand

1. In the admin sidebar, click **Sermons → Add New**.
2. Set the **title** — usually the sermon's title.
3. Use the main editor area for the sermon's description, transcript, or notes.
4. Set a **featured image** in the sidebar. If you do not, the *Default Sermon Image* from the *Sermon Page Styles* Customizer section will be used instead.
5. Open the **Pastor** box in the side panel and choose one person. It lists everyone in *Staff*.
6. Open the **Related Sermon Series** box and choose a series, if the sermon belongs to one.
7. The **publish date** controls where the sermon shows up in the sermons list, so set it to the date the sermon was preached if it is different from today.
8. Click **Publish**.

> Note: the Pastor and Related Sermon Series boxes have no "none" option. Once you have picked one you cannot un-pick it from these boxes — you would need to choose a different entry instead.

Sermons also support an **excerpt**, which is used as the summary text on cards in some layouts. Write one in the editor's Excerpt box if you want control over that text.

## Importing sermons automatically from a feed

If your church uses a service that publishes a podcast-style sermon feed (an RSS or XML feed), the theme can pull sermons in for you automatically — you do not need to add each one by hand. Both standard RSS and Atom feeds are understood.

### Setting up the feed

1. Go to **Sermons → Sermon Settings**.
2. Paste the URL of your sermon feed into the **Sermon Feed** field. (Most feeds end in `.xml`.)
3. Click **Save Changes**.

Leave the field blank and the theme assumes you are uploading sermons manually — no feed is checked.

### How automatic import works

- A background job runs **once a week, on Sunday afternoon**, and fetches the feed. Because WordPress schedules this against site traffic, it runs on the first visit after the due time rather than exactly on the hour.
- New sermons are **published immediately** — they do not wait in drafts for review.

For each new sermon, the theme captures:

- The **title**.
- The **description** or show notes, which become the sermon's content.
- The **publish date** from the feed. If the feed has no usable date, the import date is used.
- The **audio link**, which becomes the audio player and the download button.
- The **episode page link**. If that link points at YouTube, the sermon page also shows an embedded video.
- The **episode artwork**, which is downloaded into your Media Library and set as the sermon's featured image.
- The **pastor's name**, which is matched to a staff member (see below).

Two things the import does **not** set, which you may want to fill in afterwards:

- **The sermon series.** Imported sermons are never assigned to a series — open the sermon and pick one in the *Related Sermon Series* box.
- **Anything not in the feed**, such as a Bible passage.

### How duplicates are avoided

The theme recognises a sermon it already has by matching the **title**. Any feed item whose title it has not seen before is added; anything else is left alone, so re-running the import does not create duplicates of the sermons you already have.

Because the match is on the title, it is worth knowing:

- If a sermon's title is **changed in the feed** after it was imported, the next run treats it as a new sermon and imports a second copy.
- If two genuinely different sermons share **exactly the same title**, only the first one is ever imported. Giving sermons distinct titles in your feed avoids this.
- A sermon sitting in the **Trash** still counts as "already have it" and blocks that title from importing again. Empty the Trash if you want a sermon to come back from the feed.

### How pastors are matched

The theme looks for an existing staff member whose name matches the author name in the feed. If there is no match, it creates a new staff member automatically and publishes them — you can add their photo, bio, and other details later.

The match has to be close to exact, so if your feed sometimes says "John Smith" and other times "Pastor John Smith", you will end up with two staff members. If you spot duplicates in **Staff**, the fix is to keep one, reassign any sermons pointing at the other, and delete the spare. Keeping the author name consistent in your feed prevents it.

### Fetching updates manually

If you do not want to wait for the weekly run, the **Sermon Settings** page shows a **Fetch Sermons** button (only when a feed URL is set). Click it and the import runs immediately. The page may take a few seconds to come back while it works — that is normal, especially the first time, when it has images to download.

There is no "imported successfully" message, so to confirm it worked, open **Sermons** and look for the new entries.

### If the import fails

When a run fails, a yellow notice appears at the top of every admin screen reading **"Sermon auto-import problem:"** followed by what went wrong, when it last tried, and a **Review Sermon Settings** link. The most common causes are a mistyped feed URL, a feed that is temporarily down, or a feed that is not valid XML.

This notice cannot be dismissed and stays until a later run succeeds. Once you have corrected the feed URL, click **Fetch Sermons** to retry — a successful run clears the notice.

## What appears on a sermon's page

The built-in sermon layout shows:

- The sermon's featured image as the hero, unless you have turned on *Hide Sermon Hero*.
- The title.
- The publish date, the pastor's name, and the series the sermon belongs to.
- The sermon's description or notes.
- An audio player and a download button, when an audio link is available.
- An embedded video, when the sermon's link points at YouTube.

You can change the order of these details, and how many columns they sit in, under **Appearance → Customize → Sermon Page Styles**. If you want a completely different layout, see the *Patterns* page — the *Sermon Contents Pattern* setting lets you replace the built-in layout with one you design.

> Leave **Passage** out of the *Sermon Contents Order* list. There is no field anywhere for entering a Bible passage, so dragging Passage into the visible part of that list simply prints the word "passage" on every sermon page.

## What the sermons list looks like

The sermons archive page (the page with the slug `sermons`) shows every published sermon as a card in a grid. The look of these cards — how many columns, the card's shape, whether the text sits on top of the image or below it, and which details appear — is controlled in **Appearance → Customize → Sermon Archive Styles**.

If you would rather design the card yourself, use the *Card Contents Pattern* setting there. See *Patterns* for how that works.

## Sermon series

A sermon series is a separate content type — go to **Sermon Series → Add New** to create one. Each series needs only a title, a description, and a featured image; the sermons assigned to it list themselves on its page automatically, twelve at a time.

Series are **not** switched on out of the box. If you do not see a Sermon Series menu, tick **sermon-series** under **Settings → Theme Settings**.

The series list uses the *General Archive* card settings, with its own image and card shape set under **Appearance → Customize → Sermon Series Settings**.

> Tip: Use the **Sermon Series Default Image** there to provide a fallback image, so series you have not given a featured image still look polished in lists.

## Staff pages and sermons

Each staff member's page automatically lists the sermons they preached, so a pastor's page doubles as an archive of their sermons. Staff members need only a title, a description, an excerpt, and a featured image — there are no extra fields to fill in.
