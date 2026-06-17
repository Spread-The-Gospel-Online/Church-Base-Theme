# Theme Settings

The **Theme Settings** page (under **Settings → Theme Settings**) is where you turn the theme's content types on and off, and where you back up or restore everything you have configured in the Customizer.

## Enabling content types

The theme adds several optional content types to WordPress: *sermons*, *sermon-series*, *ministries*, *events*, and *staff*. Not every church needs all of them, so this page lets you decide which ones are active.

Tick a content type and it appears in the admin sidebar as its own menu, with its own settings, archive page, and styling options. Untick a content type and it is hidden everywhere — the menu disappears, its Customizer sections are no longer shown, and the rest of the admin gets a little simpler.

By default, **sermons** and **staff** are enabled.

A few things to know:

- Disabling a content type does not delete the entries you have already created — it only hides them. If you tick the box again later, they reappear.
- A few features always stay on no matter what: **Layouts** and **Notifications**. These are part of the theme's foundation.
- If you enable a new content type, the theme may prompt you to also create its archive page (for example, a page with the slug `sermons` for the sermons archive). The reminder appears as a notice at the top of the admin, with a button to create the page for you.

Click **Save Changes** to apply your choices.

## Backing up and restoring your settings

Below the Enabled Post Types table you will see an **Export / Import** area with two small forms. These cover almost every styling and configuration choice you make in **Appearance → Customize** — colors, fonts, header, footer, hero, cards, and the like.

### Exporting

Click **Export Theme Settings** to download a single file containing all of your Customizer settings. Keep this file somewhere safe — it is your backup.

This is also how you copy settings from one site to another. For example, export from a staging site and import on the live site to bring your look across in one step.

### Importing

Click **Choose File**, pick a previously-exported settings file, and click **Import Theme Settings**. The site immediately switches to those settings.

A few things to know:

- Import **overwrites** your current Customizer settings. If you have not exported your current state, you may want to do that first as a backup.
- Importing does not change any of your actual content (sermons, events, pages, posts, and so on). It only restores styling and configuration.
- The recommended workflow is **export → keep the file → import**. Hand-editing the file is not supported.
