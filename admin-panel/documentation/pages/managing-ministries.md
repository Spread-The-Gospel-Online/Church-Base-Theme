# Managing Ministries

The Ministries content type is a simple home for the ministries, groups, and programs your church runs — youth group, women's bible study, outreach, music, and so on. Each ministry gets its own page, and they are listed together at `/ministries/`.

Ministries is a deliberately plain content type. It gives you a title, a description, and an image, and nothing else. There are no extra fields to fill in and no ministry-specific styling settings.

## Turning Ministries on

Ministries is **switched off by default**. To use it:

1. Go to **Settings → Theme Settings**.
2. Tick `ministries` in the **Enabled Post Types** list.
3. Click **Save Changes**.

A **Ministries** menu appears in the admin sidebar. See the *Theme Settings* page for more about enabling content types.

## Adding a ministry

1. In the admin sidebar, click **Ministries → Add New**.
2. Set the **title** — the ministry's name.
3. Use the main editor for the description: who it is for, when it meets, who to contact, and anything else people need. You can use any blocks here, including the theme's own.
4. Set a **featured image**. It becomes the banner on the ministry's page and the image on its card in the listing.
5. Click **Publish**.

## Creating the listing page banner

Unlike the other content types, the theme will **not** remind you to create the archive page for Ministries — you need to do it yourself, or the listing at `/ministries/` will have no banner image.

1. Go to **Pages → Add New**.
2. Give the page the title *Ministries*.
3. Check that its URL slug is exactly `ministries`. WordPress usually sets this from the title, but confirm it in the page's settings sidebar.
4. Set a **featured image** on the page — this becomes the banner at the top of the ministries listing.
5. Publish it.

You do not need to put any content in that page. It exists so the listing has a banner.

## How the listing looks

The ministries listing shows every published ministry as a card in a grid, with page links at the bottom once there are more than fit on one page.

Ministries has no styling section of its own. Its cards are controlled by the shared **General Archive** section in **Appearance → Customize**, which also styles the cards for blog posts and any other content without its own dedicated settings. There you can set how many columns to use on tablet and desktop, the shape of the card images, a fallback image for ministries with no featured image, whether the text sits over or under the image, and the card colors.

You can also design the card yourself with the **Card Contents Pattern** setting in that section. See the *Customizer* and *Patterns* pages.

## What ministries cannot do yet

It is worth being clear about the limits, because parts of the admin hint at more than is actually there:

- **You cannot attach a ministry to an event.** The **Event Details** box on an event shows a bold **Ministry** heading with no field beneath it. That is a leftover; events and ministries are not linked.
- **You cannot attach a ministry to a staff member or a sermon** either.
- There is no "Ministries" block, so there is no one-click way to list ministries on your homepage.

To feature ministries elsewhere on the site, link to `/ministries/` from your menu, or build the listing by hand on a page using standard WordPress blocks — or use a **Layout** to drop the same block of content across your ministry pages. See the *Layouts* page.

## Adding Ministries to your menu

Because the listing is not added to your navigation automatically, add it yourself:

1. Go to **Appearance → Menus**.
2. Open the **Custom Links** panel.
3. Enter your site address followed by `/ministries/` as the URL, and *Ministries* as the link text.
4. Click **Add to Menu**, then **Save Menu**.
