# Getting Started

Welcome to the Church Theme. This page walks you through the first few things to set up after the theme is activated, so the rest of the site behaves the way you expect.

## A quick tour of where things live

You will spend most of your time in three places:

- **Posts, Pages, and the other content menus in the sidebar** — where you write content. The theme adds extra menus here for the kinds of content it knows about (sermons, events, staff, and so on).
- **Appearance → Customize** — where you change how the site looks: colors, fonts, hero areas, headers, footers, and the styling for each kind of content. See the *Customizer* page for an overview of what is in each section.
- **Settings → Theme Settings** — where you turn the theme's content types on or off, and where you can back up or restore your styling choices. See the *Theme Settings* page.

Two more worth knowing about:

- **Appearance → Theme Planner** — the quickest way to set your colors. Pick one brand color and it builds the rest of the palette for you. See the *Theme Planner* page.
- **Settings → Theme Plugins** — one-click installation of the plugins built for this theme.

There is also a **Documentation** menu (just below Settings) — that is where you are right now.

A few parts of the standard WordPress admin have been tidied away on purpose, so do not go looking for them: the **Comments** menu and its dashboard widget, **Appearance → Theme File Editor**, and the Customizer's **Additional CSS** and **Homepage Settings** panels. Set your homepage under **Settings → Reading** instead.

## First-time setup

There are three small setup steps the theme needs before everything works correctly. The theme will show you reminder notices at the top of the admin screen for any of these that still need doing.

### 1. Set your permalinks

Go to **Settings → Permalinks** and choose **Post name**. The theme's archive pages (such as the sermons list or events list) rely on this setting — if permalinks are set to anything else, those pages will not load properly.

### 2. Create the archive pages

The big banner image and heading at the top of each archive page (the sermons list, events list, staff list, and so on) are taken from a regular page whose slug matches the content type. For example, the sermons archive uses a page with the slug `sermons`.

For sermons, sermon series, events, and staff you do not need to remember any of this. When one of those archive pages is missing, the theme shows a notice at the top of the admin with a button to create it for you. Click the button, set a featured image on the new page, and the archive will use that image as its banner.

Two exceptions to be aware of:

- **Ministries gets no reminder.** If you enable ministries, create a Page with the slug `ministries` yourself. See *Managing Ministries*.
- **The 404 page has to be made by hand.** The theme warns you when it is missing, but the **Create 404 Page** button on that notice does not work. Go to **Pages → Add New**, title it something like "Page Not Found", set the slug to exactly `404-page`, add whatever content and featured image you want, and publish. Until then, visitors who hit a broken link just see a bare "404".

It is worth doing these properly rather than skipping them: an archive page with no matching Page gets **no banner and no heading at all** — not just a missing image.

### 3. Choose which content types you use

Not every church needs every kind of content. Go to **Settings → Theme Settings** and tick the content types you want available: *sermons*, *sermon-series*, *ministries*, *events*, and *staff*. Anything you leave unticked is hidden from the admin entirely, so the sidebar stays focused on what you actually use. You can change this at any time.

## Setting up your menus

Go to **Appearance → Menus** and build your navigation. The theme has two menu locations, assigned at the bottom of the menus page:

- **Primary Menu** — the main navigation in the header. The theme shows a notice at the top of the admin until you assign one.
- **Footer Menu** — a second menu shown in the footer. There is no reminder for this one, so it is easy to forget. It is optional: leave it unassigned and the footer simply shows your social icons and copyright line.

## Making the site look like yours

Start at **Appearance → Theme Planner** and pick your main brand color — it fills in the primary, secondary, and accent colors across the whole site in one go. See the *Theme Planner* page.

Then open **Appearance → Customize** and work through the sections to set:

- **Church Info** — your church name, telephone, email, and address.
- **Site Colors** — fine-tune the palette, and choose which color each part of the site uses.
- **Typography Settings** — which fonts the site uses for headings, body text, and menus, plus their sizes and spacing.
- **Header Settings** — your logo, where it sits, and the header layout.
- **Footer Settings** — copyright text and links to your social media accounts.

There is a lot more available in the Customizer. The *Customizer* page in this documentation has a section-by-section overview to help you find what you need.

> Tip: While you are logged in you see styling changes straight away, but visitors who are not logged in only get them once the Customizer has been published. If a change is not showing up for everyone, open the Customizer and click **Publish** once more.

## What to read next

- **Customizer** — every Customizer section explained.
- **Theme Planner** — build your whole color palette from one choice.
- **Theme Settings** — turning content types on and off, plus backing up and restoring your settings.
- **Layouts** — show the same block of content automatically across many pages without editing each one.
- **Patterns** — redesign parts of the site (footer, sermon pages, tiles) visually, without code.
- **Blocks** — the extra editor blocks the theme adds.
- **Managing Sermons / Staff / Events / Ministries / Notifications** — the day-to-day content guides for each section.
