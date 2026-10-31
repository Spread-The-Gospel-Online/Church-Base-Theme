# Managing Events

The Events content type lets you publish things happening at the church — services, meetings, conferences, fellowship dinners, anything with a date. Each event has its own page, and there is an automatically-updated calendar block you can drop on any page.

## Adding an event

1. In the admin sidebar, click **Events → Add New**.
2. Set the **title** of the event.
3. Use the main editor for a description, schedule, registration link, or anything else visitors should know.
4. Set a **featured image** if you have one — it becomes the hero image on the event's page and the image on event cards.
5. Open the **Event Details** box in the side panel and fill in the date, optional recurrence, and location (covered below).
6. Click **Publish**.

## The Event Details box

This is the side-panel box that turns a regular post into an event.

### Event Date

A single date picker for when the event happens. This is what the site uses to sort upcoming events and to decide when an event is in the past.

### Recurring value (optional)

For an event that repeats on a regular schedule, fill in this field with just the **number and unit** of how often it repeats. For example:

- `1 week` — every week.
- `2 weeks` — every other week.
- `1 month` — once a month.
- `3 days` — every three days.

Write only the number and unit — not `every 2 weeks` or `bi-weekly`. The theme uses the value the same way a calendar app would.

The recurrence box sits just under the Event Date with no label of its own, so look for the second text field in the panel. If you type something the theme cannot make sense of, a red **"There is an issue with your recurring value"** warning appears beneath it — reword it as a plain number and unit and the warning goes away.

If the recurring value is set, then once the event date has passed, the date automatically rolls forward to the next occurrence. So a weekly Sunday service can be created once and the date will keep moving forward on its own. This means you will sometimes see a recurring event's date change by itself in the admin — that is expected.

Leave the recurring value blank for one-off events.

### Location

A free-text field for where the event is. You can write a plain address, but you can also paste a **Google Maps embed URL** here and the theme will display an embedded map at the bottom of the event's page.

> Note: You may spot a bold **Ministry** heading in this panel with no field underneath it. It is a leftover and does nothing — events and ministries are not linked. You can ignore it.

## What appears on an event's page

The built-in event layout shows the title, featured image, the date and location, the description from the main editor, and (when the location is a Google Maps embed URL) an embedded map.

## The events list page

The events archive — the page at the `events` address on your site — is **the calendar**, not a grid of event cards. It shows the banner image from your `events` Page, then a full month-by-month calendar of everything you have published.

That means you do not need to build a separate calendar page: enabling events and creating the `events` Page gives you one. You can still drop the calendar onto any other page with the block below if you want it somewhere specific.

## Showing events elsewhere on the site

Two blocks make it easy to surface events from any page:

- **Church Calendar** — a full interactive calendar with every published event on it. Drop it on a page and the calendar fills itself in.
- **Upcoming Events** — a simple list of the next few events, ordered by date, laid out in the number of columns you choose. It shows event names only — no images, dates, or descriptions — so it works best as a short "what's coming up" prompt that links visitors on to the calendar.

See the *Blocks* page for what each block offers.

## Styling the calendar

The look of the events calendar is configured in **Appearance → Customize → Events Settings** — the border width plus the calendar's colors: the header background and text, the outline, and the two alternating day backgrounds.
