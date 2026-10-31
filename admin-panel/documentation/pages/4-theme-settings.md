# Theme Settings

The **Theme Settings** page (under **Settings → Theme Settings**) is where you turn the theme's content types on and off, and where you back up or restore everything you have configured in the Customizer.

## Enabling content types

The theme adds several optional content types to WordPress: *sermons*, *sermon-series*, *ministries*, *events*, and *staff*. Not every church needs all of them, so this page lets you decide which ones are active.

Tick a content type and it appears in the admin sidebar as its own menu, with its own settings, archive page, and styling options. Untick a content type and it is hidden everywhere — the menu disappears, its Customizer sections are no longer shown, and the rest of the admin gets a little simpler.

By default only **sermons** and **staff** are enabled, so sermon series, events, and ministries need turning on here before you can use them.

A few things to know:

- Disabling a content type does not delete the entries you have already created — it only hides them. If you tick the box again later, they reappear.
- A few features always stay on no matter what: **Layouts** and **Notifications**. These are part of the theme's foundation.
- If you enable a new content type, the theme may prompt you to also create its archive page (for example, a page with the slug `sermons` for the sermons archive). The reminder appears as a notice at the top of the admin, with a button to create the page for you.
- **Ministries** is deliberately plain: a title, a description, and a featured image, with no extra fields and no special layout. Ministry pages use the standard page layout and the ministries list uses the *General Archive* card settings.

Click **Save Changes** to apply your choices.

## Backing up and restoring your settings

Below the Enabled Post Types table you will see an **Export / Import** area with two small forms. These cover almost every styling and configuration choice you make in **Appearance → Customize** — colors, fonts, header, footer, hero, cards, and the like — including the palette produced by the *Theme Planner*.

### Exporting

Click **Export Theme Settings** to download a single file containing all of your Customizer settings, named after your site. Keep this file somewhere safe — it is your backup.

This is also the safety net to use before anything that overwrites your styling in bulk, such as running the *Theme Planner* or importing someone else's settings.

This is also how you copy settings from one site to another. For example, export from a staging site and import on the live site to bring your look across in one step.

### Importing

Click **Choose File**, pick a previously-exported settings file, and click **Import Theme Settings**. The site immediately switches to those settings.

A few things to know:

- Import **overwrites** your current Customizer settings. If you have not exported your current state, you may want to do that first as a backup.
- Importing does not change any of your actual content (sermons, events, pages, posts, and so on). It only restores styling and configuration.
- The recommended workflow is **export → keep the file → import**. Hand-editing the file is not supported.

## Theme Plugins

The **Theme Plugins** page (under **Settings → Theme Plugins**) lists the plugins built to work with this theme. It is visible only to administrators who are allowed to install plugins — if your host has locked plugin installation down, the page does not appear at all.

Currently it offers one plugin:

- **Mailchimp Newsletter Post Type** — adds a Newsletters section and automatically imports your sent Mailchimp campaigns onto the site.

How the page behaves:

- A plugin that is already on your site shows a confirmation that it was added, with a link to the Plugins page.
- A plugin that isn't on your site shows a short description and an **Install** button. Clicking it downloads the plugin and adds it to your site.

A few things to know:

- Installing doesn't turn the plugin on. Go to **Plugins** and click **Activate** afterward.
- This page installs plugins but doesn't update them.
- If something goes wrong, the page explains what happened. The one you may need your web host for is a message about **ZipArchive** — that is a PHP extension your server is missing and they will need to enable it.
