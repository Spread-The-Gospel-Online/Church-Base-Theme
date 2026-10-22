# Managing Ministries

The Ministries content type is for the groups and programmes your church runs — youth group, women's Bible study, men's breakfast, worship team, small groups, outreach, and so on. Each ministry gets its own page, and all of them together make a ministries list page.

Ministries is **off by default**. Turn it on by ticking *ministries* in **Settings → Theme Settings** and clicking **Save Changes**; a **Ministries** menu then appears in the admin sidebar.

## Adding a ministry

1. In the admin sidebar, click **Ministries → Add New**.
2. Set the **title** — the name of the ministry.
3. Use the main editor for the description: who it is for, when and where it meets, who leads it, and how to get involved. You can use any blocks here, so it is a good place for a contact form, a photo gallery, or a sign-up button.
4. Set a **featured image** in the sidebar. It becomes the banner at the top of the ministry's page and the image on its card in the list.
5. Click **Publish**.

That is the whole form — ministries are deliberately simple. There are no extra fields to fill in, no categories to manage, and nothing to keep in sync. Everything a visitor needs goes in the title, the image, and the description.

### What shows on the card

Ministry cards show the featured image, the title, and a short snippet of text. Because there is no separate summary field for ministries, that snippet is taken from the **start of your description**.

So lead with a sentence that reads well on its own. "Our youth group meets every Friday evening for games, worship, and teaching" makes a good card; "Welcome! We are so glad you are here" does not tell a visitor anything.

If a ministry has no featured image, the card falls back to the **Default Card Image** you set in **Appearance → Customize → General Archive**.

## The ministries list page

The ministries list is built for you — it shows every published ministry as a card in a grid, newest first, with page controls at the bottom if there are more than fit on one screen.

As with the other content types, the banner image at the top of that list comes from a regular page whose slug is `ministries`. The theme shows a notice at the top of the admin offering to create that page for you; click the button and set a featured image on it. You do not need to put anything in the page's content — the list is generated regardless.

## Styling ministries

Ministries do not have a Customizer section of their own. They are styled by the **General Archive** section instead (**Appearance → Customize → General Archive**), which controls the look of cards and grids for all of the theme's general content — ministries, pages, and posts.

From there you can set how many columns the grid uses, the shape of each card, whether the text sits below the image or on top of it, text alignment, spacing, overlay opacity, and the card colors. You can also hand the whole card design over to a pattern you build yourself with the **Card Contents Pattern** setting.

See the *Customizer* page for the full list of what is in that section, and the *Patterns* page for how designing your own card works.

> Tip: Because every general content type shares the **General Archive** settings, a change there affects your ministries list, your blog posts, and any page archives at the same time. That is what keeps the site looking consistent — but it does mean you cannot give ministries a different card shape from your posts.

## Showing ministries elsewhere

There is no dedicated block for ministries. To feature them on your homepage or anywhere else, either link to the ministries list page, or build the section you want with ordinary blocks — a row of columns with an image, heading, and link for each ministry works well, and you can save it as a pattern or a layout so it is easy to reuse and update.

See the *Layouts* page for showing the same block of content across many pages at once.
