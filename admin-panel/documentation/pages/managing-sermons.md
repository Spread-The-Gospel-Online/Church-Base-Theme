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

> Note: *Pastor* and *Related Sermon Series* are both lists of radio buttons with no "none" choice. Once you pick one you can change it, but you cannot clear it back to nothing from this panel.

## Importing sermons automatically from a feed

If your church publishes sermons through a podcast service or a video channel, the theme can pull them in for you automatically — you do not need to add each one by hand.

### Setting up the feed

1. Go to **Sermons → Sermon Settings**.
2. Paste the URL of your sermon feed into the **Sermon Feed** field. This is the only setting on the page.
3. Click **Save Changes**.

The importer understands both common feed formats — podcast-style RSS feeds (most end in `.xml`) and the Atom feeds used by video channels such as YouTube.

Leave the field blank and the theme assumes you are adding sermons by hand.

### How automatic import works

- A background job runs once a week, on Sunday afternoon, and fetches the feed. Like all WordPress scheduled jobs it needs someone to visit the site to trigger it, so on a very quiet site it can run a little late.
- Any sermon in the feed that the site does not already have is added as a new, published sermon.
- For each new sermon the theme captures the **title**, the **description**, the **publish date**, the **audio file**, and a **link back to the original** listing.
- If the feed provides an image, it is downloaded and set as the sermon's **featured image**, with its alt text filled in from the feed where available.
- The theme reads the **pastor's name** from the feed and links the sermon to the matching staff member. If no staff member with that name exists yet, one is created automatically and published with just their name — go to **Staff** afterwards to add their photo, bio, and role.
- For video feeds, the theme also stores the video page address, which is what makes the embedded video appear on the sermon page (see below).

### What the import does not do

A few things are worth knowing up front, because they are the usual surprises:

- **Series are never imported.** Imported sermons always start with no series attached. Assign them by hand using the *Related Sermon Series* panel.
- **Existing sermons are never updated.** The importer only ever adds sermons it does not already have. If you correct a description or swap the audio file in your feed, the change will not reach a sermon that has already been imported — edit it in WordPress instead.
- **A sermon is matched by its title.** That is how duplicates are avoided. The consequence is that if you *rename* an item in your feed, the theme treats it as a brand-new sermon and imports it a second time. If that happens, delete whichever copy you do not want.
- **There is no limit on how many sermons come in at once.** The very first import from a long-running feed can bring in a lot of sermons and take a while, because each image is downloaded individually. If it does not finish, simply run it again — it picks up where it left off.
- The theme waits up to 15 seconds for your feed to respond before giving up.

### Fetching updates manually

If you do not want to wait for the weekly run, the **Sermon Settings** page shows a **Fetch Sermons** button. It only appears once a feed URL is saved. Click it and the import runs immediately.

### When the import has a problem

If a run fails, the theme shows a warning at the top of the admin: **"Sermon auto-import problem:"** followed by what went wrong, when it last checked, and a **Review Sermon Settings** link.

The usual messages are:

- *No sermon feed URL is configured* — the Sermon Feed field is empty.
- *Could not reach the sermon feed* — the address is wrong, or the service was unreachable.
- *Sermon feed returned HTTP 404* (or another number) — the address is wrong or the feed has moved.
- *Sermon feed at … returned an empty response* — the service answered but sent nothing.
- *Sermon feed could not be parsed as XML* — the address does not point at a feed, or the feed is malformed.

In each case, follow the link, check the feed URL, save, and press **Fetch Sermons** to retry. A successful run clears the warning.

> Note: if you add sermons by hand and leave *Sermon Feed* deliberately blank, this warning can still appear after the weekly check runs, saying no feed is configured. It is safe to ignore.

## What appears on a sermon's page

The built-in sermon layout shows:

- The sermon's featured image as the hero, unless you set **Hide Sermon Hero** to *Yes*.
- The title.
- An embedded video, when the sermon came from a video feed.
- An audio player, when an audio file was captured.
- A set of detail cards — the date, the pastor's name, and the series.
- A download link for the audio.
- The sermon's description or notes.

You can change the order of the detail cards, and how many columns they sit in, under **Appearance → Customize → Sermon Page Styles**. The video, audio player, and download link are always in fixed positions and are not part of that order.

> Note: the order list includes a **Passage** item, but there is no Bible-passage field to fill in — the feature is unfinished and currently prints the word "passage" on the page. There is no way to hide it from this list; if you need it gone, use a *Sermon Contents Pattern* (below) to take over the layout.

If you want a completely different layout, see the *Patterns* page — the *Sermon Contents Pattern* setting lets you replace the built-in layout with one you design. Be aware that a pattern replaces the built-in layout **entirely**, including the video, audio player, and download link. Pattern blocks are available to put the audio player, download button, pastor, and series link back; there is no block for the embedded video.

## What the sermons list looks like

The sermons archive page (the page with the slug `sermons`) shows every published sermon as a card in a grid. The look of these cards is controlled in **Appearance → Customize → Sermon Archive Styles** — how many columns, the card's shape, whether the text sits on top of the image or below it, and which details appear.

The card order list offers **Title**, **Date**, and **Pastor**, plus a **Do Not Display** marker: drag any item below *Do Not Display* and it is left off the card. The series and the embedded video never appear on archive cards.

If you would rather design the card yourself, use the *Card Contents Pattern* setting there. See *Patterns* for how that works.

## Sermon series

A sermon series is a separate content type — go to **Sermon Series → Add New** to create one. Each series has its own page and the sermons assigned to it list there.

> Tip: Use the **Sermon Series Default Image** in the Customizer to provide a fallback image so series that have not been given a featured image still look polished in lists.
