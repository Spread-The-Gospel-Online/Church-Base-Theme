# Theme Settings

The **Theme Settings** page (under **Settings → Theme Settings**) is where you turn the theme's content types on and off, and where you back up or restore everything you have configured in the Customizer.

## Enabling content types

The theme adds several optional content types to WordPress: *sermons*, *sermon-series*, *ministries*, *events*, and *staff*. Not every church needs all of them, so this page lets you decide which ones are active.

Tick a content type and it appears in the admin sidebar as its own menu, with its own settings, archive page, and styling options. Untick a content type and it is hidden everywhere — the menu disappears, its Customizer sections are no longer shown, and the rest of the admin gets a little simpler.

By default, **sermons** and **staff** are enabled.

A few things to know:

- Disabling a content type does not delete the entries you have already created — it only hides them. If you tick the box again later, they reappear.
- A few features always stay on no matter what: **Layouts** and **Notifications**. These are part of the theme's foundation.
- If you enable a new content type, the theme may prompt you to also create its archive page (for example, a page with the slug `sermons` for the sermons archive). The reminder appears as a notice at the top of the admin, with a button to create the page for you. **Ministries is the exception** — it gets no reminder and no button, so if you enable it you need to create its page by hand. See *Managing Ministries*.
- Turning a content type off does **not** remove its section from the Customizer. If you switch Events off, for example, *Events Settings* still appears under **Appearance → Customize**; it simply has nothing left to affect.
- You cannot switch all five off at once. If you untick every box and save, the theme puts *sermons* and *staff* back. Leave at least one ticked to keep control of the list.

Click **Save Changes** to apply your choices.

## Backing up and restoring your settings

Below the Enabled Post Types table you will see an **Export / Import** area with two small forms. These cover almost every styling and configuration choice you make in **Appearance → Customize** — colors, fonts, header, footer, hero, cards, and the like.

### Exporting

Click **Export Theme Settings** and your browser downloads a single file containing all of your Customizer settings. It is named after your site — something like `my-church-theme-settings.json`. Keep it somewhere safe — it is your backup.

This is also how you copy settings from one site to another. For example, export from a staging site and import on the live site to bring your look across in one step.

### Importing

Click **Choose File**, pick a previously-exported settings file, and click **Import Theme Settings**.

**Then open Appearance → Customize and click Publish.** This second step matters: the import stores your settings, but visitors are served a pre-built stylesheet that is only refreshed when you publish the Customizer (or save the Theme Planner). Until you do, your own logged-in view may look correct while logged-out visitors still see the old colors and fonts.

A few things to know:

- The page gives you **no confirmation message** after an import — it simply reloads. To check it worked, open the Customizer and look at a setting you know should have changed.
- Import **overwrites** your current Customizer settings. If you have not exported your current state, do that first as a backup.
- Importing does not change any of your actual content (sermons, events, pages, posts, and so on). It only restores styling and configuration.
- The recommended workflow is **export → keep the file → import → publish the Customizer**. Hand-editing the file is not supported.

## Related settings elsewhere

Two other places hold theme-wide configuration:

- **Appearance → Theme Planner** — build your color palette from a single starting color. See the *Theme Planner* page.
- **Sermons → Sermon Settings** — the sermon feed address and the manual import button. See *Managing Sermons*.
