# Managing Ministries

**Ministries** is for the ongoing groups and programmes at your church — youth group, women's ministry, small groups, outreach, music. It is switched off by default; turn it on under **Settings → Theme Settings** by ticking **ministries** and saving.

## Adding a ministry

1. In the admin sidebar, click **Ministries → Add New**.
2. Set the **title** to the ministry's name.
3. Use the main editor for everything visitors need to know — who it is for, when and where it meets, who leads it, how to get involved.
4. Set a **featured image**. It becomes the banner at the top of the ministry's page and the image on its card in the ministries list.
5. Click **Publish**.

Ministries are deliberately plain: there are no extra date, location, or leader fields to fill in. Everything beyond the title and image goes in the editor, where you can use any blocks you like — including the theme's blocks, such as a **Form** for a signup, or **Upcoming Events** to show what the group has coming up.

As with any page, you can also use the **Hero Settings** and **Member Settings** panels from the editor's **⋮** menu to restyle the banner or make a ministry members-only. See the *Blocks* page.

## Create the ministries page yourself

Every archive in the theme takes its banner image and heading from a regular Page whose slug matches the content type. For most content types the theme spots the missing page and offers you a button to create it — but **it does not do this for ministries**.

So after you enable ministries, do this once by hand:

1. Go to **Pages → Add New**.
2. Give it the title **Ministries**, and check that the slug is exactly `ministries`.
3. Set a **featured image** — this becomes the banner across the top of the ministries list.
4. Publish it.

Until that page exists, the ministries list will load but it will have no banner image and no heading at all. This catches people out, so it is worth doing straight after enabling the content type.

## How the ministries list looks

Ministries use the theme's **general** archive styling rather than a dedicated one. Everything about the cards — how many columns on tablet and desktop, the shape of the image, whether the text sits over or below the image, alignment, spacing, and the card colors — is set in **Appearance → Customize → General Archive**.

That section also has a **Default Card Image** used for any ministry you have not given a featured image, and a **Card Contents Pattern** if you would rather design the card yourself. See the *Customizer* and *Patterns* pages.

Because this is the general archive styling, the same settings also control the cards on your blog posts list and any other listing without its own dedicated section — so a change here shows up in more than one place.

> Tip: Disabling ministries later only hides them. The ministries you have written stay in the database and reappear if you tick the box again.
