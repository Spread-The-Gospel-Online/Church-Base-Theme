# Getting Started

Welcome to the Church Theme. This page walks you through the first few things to set up after the theme is activated, so the rest of the site behaves the way you expect.

## A quick tour of where things live

You will spend most of your time in three places:

- **Posts, Pages, and the other content menus in the sidebar** — where you write content. The theme adds extra menus here for the kinds of content it knows about (sermons, events, staff, and so on). These sit at the very bottom of the sidebar, below Settings.
- **Appearance → Customize** — where you change how the site looks: colors, fonts, hero areas, headers, footers, and the styling for each kind of content. See the *Customizer* page for an overview of what is in each section.
- **Settings → Theme Settings** — where you turn the theme's content types on or off, and where you can back up or restore your styling choices. See the *Theme Settings* page.

Two more places worth knowing about:

- **Appearance → Theme Planner** — a quick way to build your color palette from a single starting color. See the *Theme Planner* page.
- **Documentation** (just below Settings) — that is where you are right now.

A couple of standard WordPress items are deliberately hidden by this theme, in case you go looking for them: the **Comments** menu and **Appearance → Theme File Editor**.

## First-time setup

There are three small setup steps the theme needs before everything works correctly. The theme will show you reminder notices at the top of the admin screen for any of these that still need doing.

### 1. Set your permalinks

Go to **Settings → Permalinks** and choose **Post name**. The theme's archive pages (such as the sermons list or events list) rely on this setting — if permalinks are set to anything else, those pages will not load properly.

### 2. Create the archive pages

The big banner image at the top of each archive page (the sermons list, events list, staff list, and so on) is taken from a regular page whose slug matches the content type. For example, the sermons archive uses a page with the slug `sermons`.

You do not need to remember any of this. When an archive page is missing, the theme shows a notice at the top of the admin with a button to create it for you. Click the button, set a featured image on the new page, and the archive will use that image as its banner.

Two exceptions to be aware of:

- **Ministries** gets no reminder notice and no button. If you enable Ministries, create its page yourself — see *Managing Ministries*.
- The **404 page** notice has a **Create 404 Page** button that does not currently work; clicking it produces an error. Create the page by hand instead: go to **Pages → Add New**, title it something like *Page Not Found*, and make sure its URL slug is exactly `404-page`. Add whatever you want visitors to see when they hit a broken link — a short apology and links to your main pages work well — then publish. The notice disappears once the page exists.

### 3. Choose which content types you use

Not every church needs every kind of content. Go to **Settings → Theme Settings** and tick the content types you want available: *sermons*, *sermon-series*, *ministries*, *events*, and *staff*. Anything you leave unticked is hidden from the admin entirely, so the sidebar stays focused on what you actually use. You can change this at any time.

Out of the box only **sermons** and **staff** are ticked, so if you want events, sermon series, or ministries, this is where you switch them on.

## Setting up your menu

Go to **Appearance → Menus** and build your primary navigation. Be sure to assign it to the **Primary Menu** location at the bottom of the menus page — the theme will show a notice at the top of the admin until you do.

The notice has an **Add Primary Menu** button, which takes you to the right screen to create the menu; you still name it, add your links, and tick the **Primary Menu** location yourself.

There is a second location, **Footer Menu**, for links in the footer. It is optional and the theme will not remind you about it, so set it up if you want it.

## Making the site look like yours

Open **Appearance → Customize** and work through the sections to set:

- **Church Info** — your church name, telephone, email, and address.
- **Site Colors** — the main color palette for the whole site.
- **Typography Settings** — which fonts the site uses for headings, body text, and menus.
- **Header Settings** — your logo and the header layout.
- **Footer Settings** — copyright text and links to your social media accounts.

There is a lot more available in the Customizer. The *Customizer* page in this documentation has a section-by-section overview to help you find what you need.

Once you have published your choices, export them from **Settings → Theme Settings** and keep the file. It is a one-click backup of everything you just set up.

## What to read next

- **Customizer** — every Customizer section explained.
- **Theme Planner** — build your whole color palette from one starting color.
- **Theme Settings** — turning content types on and off, plus backing up and restoring your settings.
- **Layouts** — show the same block of content automatically across many pages without editing each one.
- **Patterns** — redesign parts of the site (footer, sermon pages, tiles) visually, without code.
- **Blocks** — the extra editor blocks the theme adds.
- **Managing Sermons / Events / Staff / Ministries / Notifications** — the day-to-day content guides for each section.
