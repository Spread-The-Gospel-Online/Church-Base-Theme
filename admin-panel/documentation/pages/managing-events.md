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

If the recurring value is set, then once the event date has passed, the date automatically rolls forward to the next occurrence. So a weekly Sunday service can be created once and the date will keep moving forward on its own.

Leave the recurring value blank for one-off events.

### Location

A free-text field for where the event is. You can write a plain address, but you can also paste a **Google Maps embed URL** here and the theme will display an embedded map at the bottom of the event's page.

## What appears on an event's page

The built-in event layout shows the title, featured image, the date and location, the description from the main editor, and (when the location is a Google Maps embed URL) an embedded map.

## Showing events elsewhere on the site

Two blocks make it easy to surface events from any page:

- **Calendar** — a full interactive calendar with every published event on it. Drop it on a page (for example a dedicated *Calendar* page) and the calendar fills itself in.
- **Upcoming Events** — a small grid of the next few events, ordered by date. Use it on the homepage or in a sidebar layout to highlight what is coming up.

See the *Blocks* page for what each block offers.

## Styling the calendar

The look of the events calendar block is configured in **Appearance → Customize → Events Settings**.
