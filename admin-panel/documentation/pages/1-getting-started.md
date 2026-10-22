# Getting Started

Welcome to the Church Theme. This page walks you through the first few things to set up after the theme is activated, so the rest of the site behaves the way you expect.

## A quick tour of where things live

You will spend most of your time in three places:

- **Posts, Pages, and the other content menus in the sidebar** — where you write content. The theme adds extra menus here for the kinds of content it knows about (sermons, events, staff, and so on).
- **Appearance → Customize** — where you change how the site looks: colors, fonts, hero areas, headers, footers, and the styling for each kind of content. See the *Customizer* page for an overview of what is in each section.
- **Settings → Theme Settings** — where you turn the theme's content types on or off, and where you can back up or restore your styling choices. See the *Theme Settings* page.

There is also a **Documentation** menu (just below Settings) — that is where you are right now.

## First-time setup

There are three small setup steps the theme needs before everything works correctly. The theme will show you reminder notices at the top of the admin screen for any of these that still need doing.

### 1. Set your permalinks

Go to **Settings → Permalinks** and choose **Post name**. The theme's archive pages (such as the sermons list or events list) rely on this setting — if permalinks are set to anything else, those pages will not load properly.

### 2. Create the archive pages

The big banner image at the top of each archive page (the sermons list, events list, staff list, and so on) is taken from a regular page whose slug matches the content type. For example, the sermons archive uses a page with the slug `sermons`.

You do not need to remember any of this. When an archive page is missing, the theme shows a notice at the top of the admin with a button to create it for you. Click the button, set a featured image on the new page, and the archive will use that image as its banner.

For most content types you can leave the page's content empty — the list is built for you and only the featured image is used. **The staff page is the exception:** whatever you put in it is shown in place of the staff list, so it needs a **Staff Members** block adding before your team will appear. See *Managing Staff*.

The same applies to a **404 page**: the theme shows a notice if a page with the slug `404-page` does not exist, and offers to create it for you.

### 3. Choose which content types you use

Not every church needs every kind of content. Go to **Settings → Theme Settings** and tick the content types you want available: *sermons*, *sermon-series*, *ministries*, *events*, and *staff*. Anything you leave unticked is hidden from the admin entirely, so the sidebar stays focused on what you actually use. You can change this at any time.

## Setting up your menu

Go to **Appearance → Menus** and build your primary navigation. Be sure to assign it to the **Primary Menu** location at the bottom of the menus page — the theme will show a notice at the top of the admin until you do.

## Making the site look like yours

Start with **Appearance → Theme Planner**. Pick your main brand color and the theme works out a matching secondary and accent color, along with all the lighter shades of each. It is the quickest way to get the whole site into your church's colors — see the *Theme Planner* page.

Then open **Appearance → Customize** and work through the sections to set:

- **Church Info** — your church name, telephone, email, and address.
- **Site Colors** — fine-tune which color is used where, now that the Theme Planner has set your palette.
- **Typography Settings** — which fonts the site uses for headings, body text, and menus, and how large they are.
- **Header Settings** — your logo and the header layout.
- **Footer Settings** — copyright text and links to your social media accounts.

There is a lot more available in the Customizer. The *Customizer* page in this documentation has a section-by-section overview to help you find what you need.

## What to read next

- **Theme Planner** — set your whole color palette from one brand color.
- **Customizer** — every Customizer section explained.
- **Theme Settings** — turning content types on and off, plus backing up and restoring your settings.
- **Layouts** — show the same block of content automatically across many pages without editing each one.
- **Patterns** — redesign parts of the site (footer, sermon pages, tiles) visually, without code.
- **Blocks** — the extra editor blocks the theme adds, plus the spacing, hero, and members-only options on every block.
- **Managing Sermons / Events / Staff / Ministries / Notifications** — the day-to-day content guides for each section.
