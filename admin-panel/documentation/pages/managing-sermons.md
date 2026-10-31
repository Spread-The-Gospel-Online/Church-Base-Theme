# Managing Sermons

Sermons are one of the main content types in the theme. Each sermon has its own page on the site (with the audio player, pastor, and series shown), and the full list of sermons appears on the sermons archive page.

This page covers adding sermons manually and setting up automatic sermon importing from a feed.

## Adding a sermon by hand

1. In the admin sidebar, click **Sermons → Add New**.
2. Set the **title** — usually the sermon's title.
3. Use the main editor area for the sermon's description, transcript, or notes.
4. Set a **featured image** in the sidebar. If you do not, the theme falls back to the sermon series' image, and then to the *Default Sermon Image* from the *Sermon Page Styles* Customizer section.
5. In the side panel, open the **Pastor** box and choose who preached. It lists everyone in *Staff*, so add the person under **Staff** first if they are not there.
6. In the side panel, open **Related Sermon Series** and choose a series if the sermon belongs to one. (Leave it alone if the sermon is a one-off.)
7. The **publish date** controls where the sermon shows up in the sermons list, so set it to the date the sermon was preached if it is different from today.
8. Click **Publish**.

A note about the **Pastor** and **Related Sermon Series** boxes: both are lists of round radio buttons, and once you have picked one there is no way to un-pick it — there is no "none" option. If you choose a series by mistake, pick the correct one instead; to remove the series completely you would need to delete the sermon and add it again. Both boxes also appear completely empty if you have not created any staff or series yet.

### Adding audio to a sermon by hand

The audio player and the **Save** download button on a sermon page come from a field that the feed importer fills in. **A sermon you add by hand has no audio player.**

If you want audio on a hand-added sermon, you need to add that field yourself:

1. While editing the sermon, open the **Options** menu (the three dots, top right) and choose **Preferences**.
2. Under *Advanced*, switch on **Custom fields**. The page reloads.
3. Scroll to the **Custom Fields** box below the editor.
4. Click **Enter new** for the name, type `audio_link`, and paste the full web address of the audio file as the value.
5. Click **Add Custom Field**, then update the sermon.

The same applies to the optional `alternative_url` field — if you put a YouTube address in it, the video is embedded at the top of the sermon page.

If adding audio by hand is going to be routine for you, setting up a sermon feed (below) is a far easier path.

## Importing sermons automatically from a feed

If your church uses a service that publishes a podcast-style sermon feed (an RSS or XML feed), the theme can pull sermons in for you automatically — you do not need to add each one by hand.

### Setting up the feed

1. Go to **Sermons → Sermon Settings**.
2. Paste the URL of your sermon feed into the **Sermon Feed** field. (Most feeds end in `.xml`.)
3. Click **Save Changes**.

Leave the field blank and the theme assumes you are uploading sermons manually — no feed is checked.

### How automatic import works

- A background job runs once a week (Sunday afternoon) and fetches the feed.
- Any sermons in the feed that the site does not already have are added as new sermons, published immediately.
- For each new sermon, the theme captures the title, description, publish date, audio link, and image from the feed.
- The theme also reads the pastor's name from the feed and links the sermon to the matching staff member. If no staff member with that name exists yet, the theme creates one automatically — name only, with no photo or biography. Review these under **Staff** after the first import and fill them in. See *Managing Staff*.

Podcast-style feeds and YouTube channel feeds are both understood.

### About duplicates

The theme recognises a sermon it has already imported **by its title**. Sermons already on the site are left alone, so running the import twice does not duplicate anything.

The one thing to watch for: if a sermon's title is **changed at the source** after it has been imported, the next run treats it as a brand new sermon and adds it a second time. If you spot a duplicate pair after a title change upstream, delete whichever copy you do not want.

### Fetching updates manually

If you do not want to wait for the weekly run, the **Sermon Settings** page shows a **Fetch Sermons** button (only when a feed URL is set). Click it and the import runs immediately.

### If the import fails

When a run fails — the feed address is wrong, the service is down, the feed is empty — the theme shows a warning notice at the top of the admin reading **Sermon auto-import problem:** followed by what went wrong and when it last tried. It includes a **Review Sermon Settings** link to take you back to the feed field.

A successful run is silent, so no notice means everything is working.

## What appears on a sermon's page

The built-in sermon layout shows:

- The sermon's featured image as the hero. You can switch this off for every sermon with the **Hide Sermon Hero** setting in *Sermon Page Styles*.
- The title.
- An embedded YouTube video, if one came from the feed.
- An audio player and a **Save** download link, if an audio address is set.
- The publish date, the pastor's name, and the series the sermon belongs to.
- The sermon's description or notes. Plain web addresses typed into the editor are turned into links automatically.

You can change the order of these details in **Appearance → Customize → Sermon Page Styles**, along with how many columns they are laid out in and how wide that area is. If you want a completely different layout, see the *Patterns* page — the *Sermon Contents Pattern* setting lets you replace the built-in layout with one you design.

> A note on **Passage**: the Sermon Contents Order list includes a *Passage* item, but there is no Bible passage field on a sermon to fill in, and the item is not finished — it currently prints the word "passage" on the live page. Until that is completed, drag *Passage* to the bottom of the order list and put any scripture reference in the sermon's description instead.

## What the sermons list looks like

The sermons archive page (the page with the slug `sermons`) shows every published sermon as a card in a grid. The look of these cards — how many columns, the card's shape, whether the title sits on top of the image or below it, and what details appear — is controlled in **Appearance → Customize → Sermon Archive Styles**.

If you would rather design the card yourself, use the *Card Contents Pattern* setting there. See *Patterns* for how that works.

## Sermon series

A sermon series groups related sermons together — a book study, an Advent series, a conference.

Sermon series is a separate content type and it is **switched off by default**. Tick `sermon-series` under **Settings → Theme Settings** to turn it on, then go to **Sermon Series → Add New** to create one.

A series has a title, an editor area, and a featured image — there are no extra fields. You attach sermons to it from the **sermon** side, using each sermon's **Related Sermon Series** box.

### What a series page shows

The series page shows its featured image as the banner, then a grid of the sermons assigned to it — up to 12, one column on phones, two on tablet, three on desktop.

Be aware that **text you type into a series' editor is not currently displayed** on the series page. The page shows the banner and the list of sermons only. If you want an introduction to the series to appear, put it in a pattern or a layout for now.

### Styling series

**Appearance → Customize → Sermon Series Settings** has two options: a **Sermon Series Default Image** used for series with no featured image, and the aspect ratio of series cards.

> Tip: setting the default image means series you have not got round to illustrating still look polished in lists. The series image is also used as the fallback for any sermon in that series that has no featured image of its own.
