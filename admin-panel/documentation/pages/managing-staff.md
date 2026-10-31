# Managing Staff

**Staff** holds the people at your church — pastors, elders, ministry leaders, office staff. It is one of the two content types switched on by default, because sermons use it: every sermon is linked to the staff member who preached it.

## Adding a staff member

1. In the admin sidebar, click **Staff → Add New**.
2. Set the **title** to the person's name. This is what shows as the heading on their page and as the label everywhere else they appear.
3. Set a **featured image** — their photo. It becomes the banner image at the top of their page and the image on staff cards.
4. Write a short bio in the **Excerpt** field in the side panel. See *How a staff page is put together* below for why the excerpt matters.
5. Click **Publish**.

## How a staff page is put together

A staff member's own page is deliberately simple. It shows:

- Their photo and name as the banner at the top.
- Whatever your **Staff Contents Pattern** contains, if you have set one.
- A paginated list of every sermon they preached, shown as sermon cards.

The important thing to know is that the **main editor area is not displayed** on a staff page. If you type a bio into the editor, nobody will see it. To show a bio you need to set a Staff Contents Pattern in **Appearance → Customize → Staff Page** and design it there, using a **Post Excerpt** block to pull in each person's excerpt and a **Post Title** block for their name. See the *Patterns* page for how patterns work.

Without a pattern set, a staff page is just the photo, the name, and their sermons. That is a perfectly reasonable setup for a church that only wants a staff directory, but if you want bios, you need the pattern.

## Staff members created for you

If you import sermons from a feed, the theme reads the preacher's name out of the feed and links the sermon to the matching staff member. When nobody of that name exists yet, it **creates the staff member automatically** so the sermon has someone to point at.

These auto-created entries have a name and nothing else — no photo, no excerpt, no bio. It is worth looking through **Staff** after your first import and filling them in. See *Managing Sermons* for more on importing.

## Showing staff around the site

- **The staff archive** — a listing page of everyone, at the `staff` address on your site. As with the other archives, its banner image comes from a Page whose slug is `staff`; the theme shows a reminder notice with a button to create that page if it is missing.
- **The Staff Members block** — drop it on any page to show a hand-picked group of people as cards. Open **Select Staff** in the block's sidebar and tick the people you want, then set **Number of Columns**. See the *Blocks* page.
- **Sermon pages** — each sermon shows its preacher's name as a link through to their page.

## Pastors and their sermons

Because sermons point at staff members, each staff page doubles as "everything this person preached". The list is paginated using your normal **Settings → Reading** posts-per-page value, and the sermon cards use the same styling as the main sermons list — set in **Appearance → Customize → Sermon Archive Styles**.

To change who preached a sermon, edit the sermon itself and pick a different person in its **Pastor** box. There is no way to set this from the staff member's side.

> Tip: The Pastor box on a sermon has no "nobody" option — once you have chosen a preacher you can change who it is, but you cannot clear it from that panel.
