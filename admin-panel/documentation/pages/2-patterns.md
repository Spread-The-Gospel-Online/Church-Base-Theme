# Patterns

This theme uses **WordPress patterns** to let you redesign parts of your site visually, without code. A pattern is a saved, reusable block layout you build in the editor. Once you create one, you can tell the theme to use it for a specific part of your site — like the footer, a sermon page, or the tiles in a sermon list.

## Where to find and edit patterns

To create or edit a pattern, open the block editor (for example, start editing any page), then click the **Options** menu — the three dots in the top-right corner — and choose **Manage Patterns**. You can also hover over the **Appearance** menu, and then select the **Design** submenu item. From there you will go to a page with options to review styles or manage patterns. 

Once in the manage patterns page you will see a list of every pattern you have, where you can add a new one or open an existing one to edit. You can also browse and drop in patterns from the **Patterns** tab inside the block inserter (the **+** button).

## How patterns are used

Several settings let you pick a pattern from a dropdown. Each dropdown lists the patterns you have created, plus a **No Pattern** option.

- Choose **No Pattern** (the default) and the theme uses its built-in design, controlled by the normal settings for that area.
- Choose one of your patterns and the theme uses your design instead. The built-in layout options for that area are hidden, because your pattern is now in charge.

## Adding dynamic content to a pattern

A pattern would not be very useful if it showed the same fixed text everywhere. To solve this, the theme gives you special blocks that fill themselves in with live information. While editing a pattern you can add blocks such as:

- **Sermon Audio** — the audio player for the sermon
- **Sermon Pastor** — the pastor who gave the sermon
- **Sermon Download** — a download button for the sermon
- **Series Link** — a link to the sermon's series
- **Post Title** — the item's title
- **Post Excerpt** — a short summary of the item
- **Post Date** — the date the item was published

Drop these into your pattern and you do not have to fill them in by hand — they show the correct details automatically for whichever item is being displayed.

When a pattern takes over a tile, the theme no longer adds the featured image for you, so include it inside the pattern using a **Cover** block with its **Use featured image** option turned on. The Cover block pulls in each item's image automatically, and because you can place other blocks — such as the title or excerpt — on top of it, it is the easiest way to show content over the image.

## Patterns used as tiles

Some areas show a grid of items — for example every sermon in a sermon list, or every person on the staff page. When you use a pattern for one of these areas, the theme reuses your single pattern as the tile for **every** item, and injects each item's own content into the tile. You design the tile once, and the theme fills it in for each sermon or staff member automatically.

## Settings that use patterns

You will find these in the Customizer (**Appearance → Customize**):

- **Footer Pattern** — in *Footer Settings*. Uses your pattern as the site footer.
- **Sermon Contents Pattern** — in *Sermon Page Styles*. Uses your pattern for the body of each sermon page.
- **Card Contents Pattern** — in *Sermon Archive Styles*. Uses your pattern as the tile for each sermon in a sermon list, with each sermon's content injected in.
- **Staff Contents Pattern** — in *Staff Page*. Uses your pattern for each staff member's page.

> Tip: Switch any setting back to **No Pattern** to return to the theme's built-in design and its standard options.

## Learn more

For a full guide to creating and managing patterns in WordPress, see the official documentation: [WordPress Patterns](https://wordpress.org/documentation/article/block-pattern/).
