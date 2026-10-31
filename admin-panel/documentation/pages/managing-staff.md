# Managing Staff

The Staff content type holds the people at your church — pastors, elders, ministry leaders, office staff. Each person can have their own page, and sermons are linked to the staff member who preached them.

Staff is one of the two content types switched on by default.

## Adding a staff member

1. In the admin sidebar, click **Staff → Add New**.
2. Set the **title** — the person's name.
3. Set a **featured image** — their photo. This becomes the banner on their page.
4. Use the **excerpt** for a short summary, such as their role.
5. Use the main editor for their fuller biography.
6. Click **Publish**.

There are no extra fields to fill in. A staff member is just a name, a photo, a short summary, and a biography — the link to sermons is made from the sermon side, not here.

## Staff members created for you

If your site imports sermons from a feed, the importer reads the pastor's name from each sermon and links it to a matching staff member. When no one with that name exists, **it creates one automatically** and publishes it.

So you may find staff entries you did not add. They will have only a name — no photo, no summary, no biography. Go through **Staff** after a large import and fill in the details for anyone who should have a proper page. See *Managing Sermons*.

## Linking sermons to a person

You do this from the sermon, not from the staff member. When editing a sermon, use the **Pastor** panel in the side column and pick a name. See *Managing Sermons*.

Once sermons are linked, each staff member's page lists the sermons they preached, with page-number links at the bottom if there are a lot of them.

## Designing the staff page

Staff pages depend on patterns more than any other part of the theme, so this is worth setting up before you add many people.

Out of the box, a staff member's page shows their photo and name as the banner, followed by the sermons they preached. The **biography from the main editor is not displayed**.

To show a biography — or anything else — go to **Appearance → Customize → Staff Page** and choose a **Staff Contents Pattern**. The pattern you pick takes over the body of every staff member's page. Build it once, including a Post Content or Post Excerpt block for the biography, and every person's page uses it with their own details filled in. See the *Patterns* page.

## The staff list page

This one catches people out, so it is worth reading carefully.

The staff list lives at the `staff` address on your site, and what appears there depends on whether you have created a **Page** with the slug `staff`:

- **A `staff` page exists** — the theme shows that page's content. This is the arrangement to use.
- **No `staff` page exists** — the list comes out empty. There is no working automatic list of staff members.

The theme's setup notice already encourages you to create a `staff` page so the list has a banner image. Do that, then build the list on the page itself:

1. Create a Page with the slug `staff` and give it a featured image for the banner.
2. Write an introduction if you want one.
3. Add a **Staff Members** block, tick the people to include, and set the number of columns.
4. In that block's **Staff Pattern** setting, choose a pattern for the cards.

> Important: the Staff Members block shows nothing until you choose a **Staff Pattern**. If you add the block and the area comes out blank, a missing pattern is almost always the reason. Build a small pattern with a Cover block (with *Use featured image* turned on) and a Post Title block, and select it here. See *Patterns*.

## What to read next

- **Patterns** — designing the staff page body and the staff cards. Staff pages need this more than most.
- **Managing Sermons** — linking a sermon to the person who preached it.
- **Blocks** — the Staff Members block.
