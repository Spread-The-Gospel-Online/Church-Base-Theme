# Getting Started

Welcome to the Church Theme. This page walks you through the first few things to set up after the theme is activated, so the rest of the site behaves the way you expect.

## A quick tour of where things live

You will spend most of your time in three places:

- **Posts, Pages, and the other content menus in the sidebar** — where you write content. The theme adds extra menus here for the kinds of content it knows about (sermons, events, staff, and so on).
- **Appearance → Customize** — where you change how the site looks: colors, fonts, hero areas, headers, footers, and the styling for each kind of content. See the *Customizer* page for an overview of what is in each section.
- **Settings → Theme Settings** — where you turn the theme's content types on or off, and where you can back up or restore your styling choices. See the *Theme Settings* page.

Two more places are worth knowing about:

- **Appearance → Theme Planner** — builds your whole color palette from one starting color. See the *Theme Planner* page.
- **Documentation** (just below Settings) — that is where you are right now.

A couple of standard WordPress items are hidden by this theme, so do not go looking for them: the **Comments** menu and the **Appearance → Theme File Editor** screen are both removed, and the comment counter is taken out of the toolbar.

## First-time setup

There are four small setup steps the theme needs before everything works correctly. The theme will show you reminder notices at the top of the admin screen for most of these while they still need doing.

### 1. Set your permalinks

Go to **Settings → Permalinks** and choose **Post name**. The theme's archive pages (such as the sermons list or events list) rely on this setting — if permalinks are set to anything else, those pages will not load properly.

### 2. Create the archive pages

The big banner image at the top of each archive page (the sermons list, events list, staff list, and so on) is taken from a regular page whose slug matches the content type. For example, the sermons archive uses a page with the slug `sermons`.

You do not need to remember any of this. When an archive page is missing, the theme shows a notice at the top of the admin with a button to create it for you. Click the button, set a featured image on the new page, and the archive will use that image as its banner.

Setting a featured image on your **homepage** is worth doing at the same time. It acts as the final fallback banner for anything that has no image of its own — see *Where hero images come from* on the *Customizer* page.

### 3. Create a 404 page

The theme shows a notice if a page with the slug `404-page` does not exist. Without one, visitors who follow a broken link see a bare "404" heading.

Create this page yourself rather than using the notice's button, which does not currently work: go to **Pages → Add New**, give it a title such as "Page Not Found", set the slug to `404-page`, add whatever message and links you want, give it a featured image, and publish. The theme then uses that page's title, content, and image for the 404 screen.

### 4. Choose which content types you use

Not every church needs every kind of content. Go to **Settings → Theme Settings** and tick the content types you want available: *sermons*, *sermon-series*, *ministries*, *events*, and *staff*.

Only **sermons** and **staff** are ticked to begin with, so if you want series, events, or ministries you need to turn them on here. Anything you leave unticked is hidden from the admin entirely, so the sidebar stays focused on what you actually use. You can change this at any time.

## Setting up your menus

Go to **Appearance → Menus** and build your navigation. The theme offers two menu locations, and you assign a menu to a location at the bottom of the menus page:

- **Primary Menu** — the main navigation in the header. The theme shows a notice at the top of the admin until you have assigned one.
- **Footer Menu** — an optional second menu shown in the footer, laid out in columns on desktop and as a collapsible accordion on phones.

## Notices the theme may show you

The theme nudges you at the top of the admin when something needed is missing. Each notice explains itself, and most come with a button that takes you straight to the fix:

- **"You are missing a menu for Primary Menu."** — with an **Add Primary Menu** button.
- **"You are missing an archive page for ..."** — one per content type, each with a button that creates the page for you.
- **A missing 404 page** — create it by hand as described above.
- **"Sermon auto-import problem:"** — only if you have set up a sermon feed and a run failed. See *Managing Sermons*.

## Making the site look like yours

The quickest start is **Appearance → Theme Planner**: pick one brand color and it builds the rest of your palette for you. Then open **Appearance → Customize** and work through the sections to set:

- **Church Info** — your church name, telephone, email, and address.
- **Site Colors** — your palette, if you want to fine-tune what the Theme Planner produced.
- **Typography Settings** — which fonts the site uses for headings and body text, and their sizes.
- **Header Settings** — your logo, the header layout, and the header's colors.
- **Footer Settings** — copyright text, links to your social media accounts, and the footer's colors.

Remember that the choice of which palette color each area uses lives inside that area's own Customizer section, not in *Site Colors*. There is a lot more available besides; the *Customizer* page in this documentation has a section-by-section overview to help you find what you need.

## What to read next

- **Customizer** — every Customizer section explained.
- **Theme Planner** — build your color palette from a single starting color.
- **Theme Settings** — turning content types on and off, plus backing up and restoring your settings.
- **Layouts** — show the same block of content automatically across many pages without editing each one.
- **Patterns** — redesign parts of the site (footer, sermon pages, tiles) visually, without code.
- **Blocks** — the extra editor blocks the theme adds, and the per-page hero and member settings.
- **Managing Sermons / Events / Notifications** — the day-to-day content guides for each section.
