# Managing Ministries

The Ministries content type is for the groups and programmes your church runs — youth group, worship, small groups, outreach, children's ministry, and so on. Each ministry gets its own page, and together they form a ministries listing page.

It is the simplest of the theme's content types: a title, a description, and an image. There are no special fields to learn.

## Turning it on

Ministries is **not** enabled by default. Go to **Settings → Theme Settings**, tick **ministries**, and click **Save Changes**. A **Ministries** menu then appears in the admin sidebar. See the *Theme Settings* page.

## Adding a ministry

1. In the admin sidebar, click **Ministries → Add New**.
2. Set the **title** — the name of the ministry.
3. Set a **featured image**. It becomes the banner at the top of the ministry's page and the image on its card in the listing.
4. Use the main editor for the description — who it is for, when it meets, who to contact. You can use any blocks here, including the theme's own, so a ministry page can be as rich as any other page.
5. Click **Publish**.

That is the whole form. Unlike sermons or events, there is nothing extra to fill in.

## What a ministry's page looks like

A ministry page shows the featured image as its banner with the ministry's name over it, followed by everything you wrote in the editor. There are no pattern settings for ministry pages, so what you build in the editor is exactly what visitors see.

## The ministries listing page

Your ministries are listed at the `ministries` address on your site. The theme builds this list for you — every published ministry appears as a card showing its image, its name, and its excerpt if it has one, with page-number links at the bottom once you have a lot of them.

The look of these cards comes from **Appearance → Customize → General Archive** — the number of columns, the card shape, whether the text sits over or under the image, and the colors. That section is shared with your blog posts, so a change there affects both. See the *Customizer* page.

### Giving the listing a banner image

The theme does not remind you about this one, so it is easy to miss. To put a banner image at the top of the ministries listing, create a **Page** whose slug is `ministries` and give it a featured image.

Unlike the staff list, adding this page does not replace the automatic list — the theme uses the page only for the banner image and heading, and still lists your ministries underneath.

## Things ministries do not do

Worth knowing so you do not go looking:

- **No categories or tags.** There is no way to group or filter ministries beyond the single list.
- **No link to events.** The *Event Details* panel shows a bold **Ministry** heading with no field under it — that is an unfinished placeholder, and there is no way to attach an event to a ministry. If you want to connect the two, link to the ministry page from the event's description by hand.
- **No ministry-specific styling.** There is no *Ministries* section in the Customizer; they follow the general archive and page styles.

> Tip: You can still surface ministries elsewhere automatically. A **Layout** set to the *archive* template type with *ministries* ticked will appear at the top or bottom of the ministries list — handy for a shared "Get involved" call to action. See the *Layouts* page.

## What to read next

- **Theme Settings** — switching ministries on and off.
- **Customizer** — the *General Archive* section, which styles the ministries cards.
- **Layouts** — adding shared content above or below the ministries list.
