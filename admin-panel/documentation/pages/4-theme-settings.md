# Theme Settings

The **Theme Settings** page (under **Settings → Theme Settings**) is where you turn the theme's content types on and off, and where you back up or restore everything you have configured in the Customizer.

## Enabling content types

The theme adds several optional content types to WordPress: *sermons*, *sermon-series*, *ministries*, *events*, and *staff*. Not every church needs all of them, so this page lets you decide which ones are active.

Tick a content type and it appears in the admin sidebar as its own menu, with its own archive page and single pages. Untick it and that menu disappears, along with its pages on the public site.

By default, **sermons** and **staff** are enabled.

A few things to know:

- Disabling a content type does not delete the entries you have already created — it only hides them. If you tick the box again later, they reappear.
- **The Customizer sections stay put.** Turning off events does not remove the *Events Settings* section from **Appearance → Customize**; it just has nothing left to style. So do not read the presence of a section as a sign that a content type is enabled.
- A few features always stay on no matter what: **Layouts** and **Notifications**. These are part of the theme's foundation, which is why they are not in the list.
- If you enable **sermons**, **sermon-series**, **events**, or **staff**, the theme will prompt you to create the matching archive page (for example, a page with the slug `sermons` for the sermons archive). The reminder appears as a notice at the top of the admin, with a button to create the page for you.
- **Ministries is the exception** — there is no reminder for it. If you enable ministries you need to create a Page with the slug `ministries` yourself, or the ministries list will have no banner image and no heading. See *Managing Ministries*.
- The checkboxes are labelled with the internal names (`sermon-series` rather than "Sermon Series"). They are the same five content types described above.

Click **Save Changes** to apply your choices.

## Backing up and restoring your settings

Below the Enabled Post Types table you will see an **Export / Import** area with two small forms. These cover almost every styling and configuration choice you make in **Appearance → Customize** — colors, fonts, header, footer, hero, cards, and the like.

### Exporting

Click **Export Theme Settings** to download a single file containing all of your Customizer settings. It is named after your site — something like `my-church-theme-settings.json`. Keep this file somewhere safe — it is your backup.

This is also how you copy settings from one site to another. For example, export from a staging site and import on the live site to bring your look across in one step.

### Importing

Click **Choose File**, pick a previously-exported settings file, and click **Import Theme Settings**.

A few things to know:

- Import **overwrites** your current Customizer settings. If you have not exported your current state, you may want to do that first as a backup.
- Importing does not change any of your actual content (sermons, events, pages, posts, and so on). It only restores styling and configuration.
- **Open the Customizer and click Publish afterwards.** Importing updates the settings but does not rebuild the stylesheet that visitors who are not logged in are served. Until you publish the Customizer once, you will see the imported look and they will not.
- Neither export nor import shows a confirmation message, so open the Customizer to check that your settings arrived.
- The recommended workflow is **export → keep the file → import**. Hand-editing the file is not supported — anything the export would not have written is ignored on the way back in.

## Theme Plugins

The **Theme Plugins** page (under **Settings → Theme Plugins**) lists the plugins built to work with this theme, such as the Mailchimp newsletter plugin. Only administrators can see it.

- A plugin that is already on your site shows an **Installed** notice.
- A plugin that isn't on your site shows a short description and an **Install** button. Clicking it downloads the plugin and adds it to your site.

A few things to know:

- Installing doesn't turn the plugin on. Go to **Plugins** and click **Activate** afterward.
- This page installs plugins but doesn't update them.
- If installing fails with a message about ZipArchive, ask your web host to enable PHP's ZipArchive extension.
