# Managing Events

The Events content type lets you publish things happening at the church — services, meetings, conferences, fellowship dinners, anything with a date. Each event has its own page, and there is an automatically-updated calendar you can drop on any page.

Events is **switched off by default**. If you cannot see an **Events** menu in the admin sidebar, go to **Settings → Theme Settings** and tick `events`. See the *Theme Settings* page.

## Adding an event

1. In the admin sidebar, click **Events → Add New**.
2. Set the **title** of the event.
3. Use the main editor for a description, schedule, registration link, or anything else visitors should know.
4. Set a **featured image** if you have one — it becomes the hero image on the event's page and the image on event cards.
5. Open the **Event Details** box in the side panel and fill in the date, optional recurrence, and location (covered below).
6. Click **Publish**.

## The Event Details box

This is the side-panel box that turns a regular post into an event. It has three fields you fill in, in this order from the top: the event date, the recurring value, and the location.

### Event Date

A single date picker for when the event happens. This is what the site uses to sort upcoming events and to decide when an event is in the past.

### Recurring value (optional)

This is the **unlabelled text box** directly below the date picker, with help text underneath it about entering "2 weeks" instead of "every 2 weeks". It has no heading of its own, so it is easy to miss — if you are looking for where to set up a repeating event, that is the box.

For an event that repeats on a regular schedule, fill it in with just the **number and unit** of how often it repeats. For example:

- `1 week` — every week.
- `2 weeks` — every other week.
- `3 days` — every three days.

Write only the number and unit — not `every 2 weeks` or `bi-weekly`. If what you type cannot be understood, a red warning appears in the box telling you there is an issue with your recurring value.

Stick to **days and weeks**. Longer units such as `1 month` are accepted and the event's own date will roll forward correctly, but the calendar misreads them when working out which days to show the event on, so a monthly event will appear on the wrong days. For a monthly meeting, either enter `4 weeks` or create each occurrence as its own event.

If the recurring value is set, then once the event date has passed, the date automatically rolls forward to the next occurrence. So a weekly Sunday service can be created once and the date will keep moving forward on its own.

Leave the recurring value blank for one-off events.

### Ministry

Ignore this one. The box shows a bold **Ministry** heading with no field underneath it — it is a leftover from unfinished work. There is currently no way to attach an event to a ministry. See *Managing Ministries*.

### Location

A free-text field for where the event is. You can write a plain address here.

You can also paste a **Google Maps embed URL** and the theme will display an embedded map at the bottom of the event's page. The map only appears if the address you paste contains the word `maps`, which a Google Maps URL always does — so a plain street address shows as text, and a Maps link shows as a map.

## What appears on an event's page

The built-in event layout shows the featured image as the banner, the title, an **Add to Google Calendar** link, the description from the main editor, and (when the location is a Google Maps embed URL) an embedded map.

The **Add to Google Calendar** link lets a visitor save the event to their own calendar in one click. It carries the event's title, date, and a link back to the page. Note that it always sets the start time to 4pm, because events only have a date and no time field — so mention the actual start time in the event description.

## The events listing page

The events listing at `/events/` shows a **month calendar**, not a list of event cards. Visitors see the current month with each event as a link on its day, and buttons to move between months.

Recurring events are filled in across the calendar automatically, so a weekly service appears on every matching day without you creating each one.

If you would rather visitors saw a list of upcoming events, add an **Upcoming Events** block to your homepage or another page.

## Showing events elsewhere on the site

Two blocks make it easy to surface events from any page:

- **Church Calendar** — the same month calendar used on the listing page. Drop it anywhere you want a full calendar.
- **Upcoming Events** — a small grid of the next few events, ordered by date. Use it on the homepage or in a layout to highlight what is coming up.

See the *Blocks* page for what each block offers.

## Styling the calendar

The calendar's border width and its colors are configured in **Appearance → Customize → Events Settings**.
