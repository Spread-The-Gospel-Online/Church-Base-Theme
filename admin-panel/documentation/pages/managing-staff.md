# Managing Staff

The Staff content type holds the people at your church — pastors, elders, ministry leaders, office staff, anyone you want to introduce to visitors. Each staff member gets their own page, and pastors automatically get a list of their sermons on that page.

Staff is one of the two content types enabled by default. If it is not showing in your sidebar, tick it in **Settings → Theme Settings**.

## Adding a staff member

1. In the admin sidebar, click **Staff → Add New**.
2. Set the **title** — this is the person's name, and it is what appears on their card and page.
3. Set a **featured image** in the sidebar. This is their photo; it is used on staff cards and as the banner on their page, so a clear head-and-shoulders shot works best.
4. Write their **bio** in the main editor area. This is the full write-up that appears on their own page, and you can use any blocks you like here.
5. Open the **Excerpt** panel in the sidebar and write a short summary — a sentence or two.
6. Click **Publish**.

### Where the job title goes

There is no separate field for a job title or role. The **Excerpt** is the place for it, because the excerpt is what shows on staff cards in lists and blocks. Something like "Lead Pastor" or "Children's Ministry Director — serving since 2014" reads well in both places.

If you want the role displayed more prominently on the person's own page, add it as a heading at the top of the bio in the main editor.

### Social media links

Social links are set once for the whole site, not per person — you will find them under **Appearance → Customize → Footer Settings**. If you want to link to an individual staff member's accounts, add the links into their bio in the main editor.

## Pastors and their sermons

A sermon records which staff member preached it, and the connection is made **from the sermon, not from the staff member**. When you add or edit a sermon, you pick the person in the **Pastor** box in the sidebar — see *Managing Sermons*.

Once that link exists, the staff member's page automatically lists every sermon they have preached, below their bio. You do not have to maintain that list; it builds itself from the sermons. If there are more sermons than fit on one page, page controls appear beneath them.

> Tip: If you use automatic sermon importing, the theme creates staff members for you. When it imports a sermon by a pastor it does not recognise, it adds a new staff member with that name so the sermon has someone to attach to. Those entries arrive with just a name — go back and add a photo, bio, and excerpt when you get a chance.

## The staff list page

The staff list lives at a page whose slug is `staff`. This is the archive page the theme prompts you to create during setup, and it is also where the banner image for the staff section comes from.

**This page works differently from the other archives, so it is worth understanding.** Once a page with the slug `staff` exists, the theme shows **that page's content** rather than building a list for you. That is deliberate — it lets you write an introduction, arrange people into groups, and generally control how your team is presented.

It also means an empty `staff` page produces an empty staff list. So after creating the page:

1. Set a **featured image** on it — this becomes the banner at the top.
2. Add any introductory text you want above the team.
3. Add a **Staff Members** block and choose the people to show.
4. Publish.

If you want your team split into sections — pastoral staff, then support staff, then elders — add a heading and a separate **Staff Members** block for each group, choosing the relevant people in each one.

## The Staff Members block

The **Staff Members** block is how you place staff anywhere on the site: on the staff page, on your homepage, inside a layout, or on a regular page. Add it the same way as any block, with the **+** button.

Its sidebar settings are:

- **Select Staff** — a checklist of everyone in Staff. Tick the people you want this block to show. They appear in the order WordPress returns them, so use several blocks if you need a specific grouping.
- **Number of Columns** — how many cards sit side by side, from 1 to 4.
- **Staff Pattern** — use one of your patterns as the card design instead of the theme's built-in card. See the *Patterns* page.

## Styling staff pages

There is one setting for staff, under **Appearance → Customize → Staff Page**:

- **Staff Contents Pattern** — replaces the built-in layout of each staff member's page with a pattern you design yourself. Leave it on **No Pattern** to use the theme's built-in layout.

Staff cards in lists take their look from the **General Archive** section of the Customizer, alongside the other general content types. See the *Customizer* page.

## What to read next

- **Managing Sermons** — how to link a sermon to the pastor who preached it.
- **Patterns** — designing your own staff cards and staff pages.
- **Blocks** — the full list of theme blocks, including Staff Members.
