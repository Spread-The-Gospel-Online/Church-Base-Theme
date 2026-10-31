# Getting Started

Welcome to the Church Theme. This page walks you through the first few things to set up after the theme is activated, so the rest of the site behaves the way you expect.

## A quick tour of where things live

You will spend most of your time in three places:

- **Posts, Pages, and the other content menus in the sidebar** — where you write content. The theme adds extra menus here for the kinds of content it knows about (sermons, events, staff, and so on).
- **Appearance → Customize** — where you change how the site looks: colors, fonts, hero areas, headers, footers, and the styling for each kind of content. See the *Customizer* page for an overview of what is in each section.
- **Settings → Theme Settings** — where you turn the theme's content types on or off, and where you can back up or restore your styling choices. See the *Theme Settings* page.

There is also **Appearance → Theme Planner**, a shortcut for setting your brand colors (see the *Theme Planner* page), and a **Documentation** menu just below Settings — that is where you are right now.

A couple of things you may notice are missing: the theme removes the **Comments** menu and the **Appearance → Theme File Editor**, and it hides the admin toolbar when you are viewing the public site.

> Note: every admin page the theme adds — Theme Settings, Theme Planner, Sermon Settings, and this Documentation area — is visible to **administrators** only. Editors can still write and publish content.

## First-time setup

There are three small setup steps the theme needs before everything works correctly. The theme will show you reminder notices at the top of the admin screen for any of these that still need doing.

### 1. Set your permalinks

Go to **Settings → Permalinks** and choose **Post name**. The theme's archive pages (such as the sermons list or events list) rely on this setting — if permalinks are set to anything else, those pages will not load properly.

### 2. Create the archive pages

The big banner image at the top of each archive page (the sermons list, events list, staff list, and so on) is taken from a regular page whose slug matches the content type. For example, the sermons archive uses a page with the slug `sermons`.

You do not need to remember any of this. When an archive page is missing, the theme shows a notice at the top of the admin with a button to create it for you. Click the button, set a featured image on the new page, and the archive will use that image as its banner.

The theme also shows a notice when you have no **404 page** — the page visitors land on when they follow a broken link. Its *Create 404 Page* button does not currently work, so create this one yourself: go to **Pages → Add New**, give it any title you like, and set its slug to `404-page`. Add whatever message and links you want visitors to see, then publish it. The notice will clear.

### 3. Choose which content types you use

Not every church needs every kind of content. Go to **Settings → Theme Settings** and tick the content types you want available: *sermons*, *sermon-series*, *ministries*, *events*, and *staff*. Anything you leave unticked is hidden from the admin entirely, so the sidebar stays focused on what you actually use. You can change this at any time.

Out of the box only **sermons** and **staff** are switched on, so if you were expecting to see Events or Sermon Series menus, this is the page that adds them.

## Setting up your menu

Go to **Appearance → Menus** and build your primary navigation. Be sure to assign it to the **Primary Menu** location at the bottom of the menus page — the theme will show a notice at the top of the admin until you do.

There is a second location, **Footer Menu**, which you can fill in the same way. The theme does not remind you about that one, so it is easy to forget.

## Making the site look like yours

Open **Appearance → Customize** and work through the sections to set:

- **Church Info** — your church name, telephone, email, and address.
- **Site Colors** — the main color palette for the whole site. For a faster start, use **Appearance → Theme Planner** instead: pick one brand color and it fills in the rest.
- **Typography Settings** — which fonts the site uses for headings, body text, and menus, plus heading sizes and text colors.
- **Header Settings** — your logo and the header layout.
- **Footer Settings** — copyright text and links to your social media accounts.

There is a lot more available in the Customizer. The *Customizer* page in this documentation has a section-by-section overview to help you find what you need.

## What to read next

- **Customizer** — every Customizer section explained.
- **Theme Planner** — the quickest way to set your brand colors.
- **Theme Settings** — turning content types on and off, plus backing up and restoring your settings.
- **Layouts** — show the same block of content automatically across many pages without editing each one.
- **Patterns** — redesign parts of the site (footer, sermon pages, tiles) visually, without code.
- **Blocks** — the extra editor blocks the theme adds.
- **Managing Sermons / Events / Ministries / Notifications / Staff** — the day-to-day content guides for each section.
