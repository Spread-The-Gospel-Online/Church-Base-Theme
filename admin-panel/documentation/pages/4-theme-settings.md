# Theme Settings

The **Theme Settings** page (under **Settings → Theme Settings**) is where you turn the theme's content types on and off, and where you back up or restore everything you have configured in the Customizer.

## Enabling content types

The theme adds several optional content types to WordPress: *sermons*, *sermon-series*, *ministries*, *events*, and *staff*. Not every church needs all of them, so this page lets you decide which ones are active.

Tick a content type and it appears in the admin sidebar as its own menu, with its own settings, archive page, and styling options. Untick a content type and it is hidden everywhere — the menu disappears, its Customizer sections are no longer shown, and the rest of the admin gets a little simpler.

By default, **sermons** and **staff** are enabled. The checkboxes are labelled with the internal names, so expect to see `sermon-series` rather than "Sermon Series".

### What each one gives you

- **sermons** — the fullest content type. Each sermon gets a *Pastor* and a *Related Sermon Series* panel, an audio player and download link, its own settings page, and optional automatic importing from a feed. See *Managing Sermons*.
- **sermon-series** — a container for grouping sermons. A series has a title, a description, and a featured image; the sermons assigned to it list on its page automatically. There are no fields to fill in on the series itself — the link is made from each sermon.
- **events** — a title, a description, a featured image, and an *Event Details* panel for the date, an optional repeat, and a location. See *Managing Events*.
- **staff** — a title, a biography, and a photo. Each staff member's page also lists the sermons they preached. Note that staff records can be **created for you** by the sermon importer, so you may find entries you did not add — they will have only a name until you fill in the rest.
- **ministries** — the simplest of the five: a title, a description from the block editor, and a featured image, with a listing page at `/ministries`. There are no extra fields and no ministry-specific settings, and nothing else in the theme links to ministries, so treat it as a straightforward set of pages for the ministries your church runs.

> Note: none of these content types use categories or tags. Sermons are grouped by series, and staff are linked through sermons; there is no other way to group or tag them.

A few things to know:

- Disabling a content type does not delete the entries you have already created — it only hides them. If you tick the box again later, they reappear.
- A few features always stay on no matter what: **Layouts** and **Notifications**. These are part of the theme's foundation, which is why they are not listed as checkboxes.
- If you enable a new content type, the theme may prompt you to also create its archive page (for example, a page with the slug `sermons` for the sermons archive). The reminder appears as a notice at the top of the admin, with a button to create the page for you. These reminders cover sermons, sermon series, events, and staff — **ministries** does not get one, so if you enable ministries and want a banner image on its listing page, create a page with the slug `ministries` yourself and give it a featured image.

Click **Save Changes** to apply your choices.

## Backing up and restoring your settings

Below the Enabled Post Types section you will see an **Export / Import** area with two small forms. These cover almost every styling and configuration choice you make in **Appearance → Customize** — colors, fonts, header, footer, hero, cards, and the like — including the colors set by the *Theme Planner*.

### Exporting

Click **Export Theme Settings** to download a single file containing all of your Customizer settings. Keep this file somewhere safe — it is your backup.

This is also how you copy settings from one site to another. For example, export from a staging site and import on the live site to bring your look across in one step.

### Importing

Click **Choose File**, pick a previously-exported settings file, and click **Import Theme Settings**. The site immediately switches to those settings.

A few things to know:

- Import **overwrites** your current Customizer settings. If you have not exported your current state, you may want to do that first as a backup.
- Importing does not change any of your actual content (sermons, events, pages, posts, and so on). It only restores styling and configuration.
- The recommended workflow is **export → keep the file → import**. Hand-editing the file is not supported.
