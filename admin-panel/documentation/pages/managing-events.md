# Managing Events

The Events content type lets you publish things happening at the church — services, meetings, conferences, fellowship dinners, anything with a date. Each event has its own page, and there is an automatically-updated calendar block you can drop on any page.

Events are **not** switched on out of the box. If you do not see an Events menu in the sidebar, go to **Settings → Theme Settings** and tick **events**.

## Adding an event

1. In the admin sidebar, click **Events → Add New**.
2. Set the **title** of the event.
3. Use the main editor for a description, schedule, registration link, or anything else visitors should know.
4. Set a **featured image** if you have one — it becomes the hero image on the event's page and the image on event cards.
5. Open the **Event Details** box in the side panel and fill in the date, optional recurrence, and location (covered below).
6. Click **Publish**.

## The Event Details box

This is the side-panel box that turns a regular post into an event. It holds three fields, in this order.

### Event Date

The date picker directly below the **Event Date** heading. This is what the site uses to sort upcoming events, to place the event on the calendar, and to decide when an event is in the past.

There is no time field. If the start time matters, write it into the event's description.

### The recurring value (optional)

The **plain text box immediately below the date picker** has no heading of its own — look for the help text beginning "Enter recurring value just as the number and the unit of measurement". That box is the recurrence setting.

Fill it in with just the **number and unit** of how often the event repeats:

- `1 week` — every week.
- `2 weeks` — every other week.
- `3 days` — every three days.

Write only the number and unit — not `every 2 weeks` or `bi-weekly`. If the box contains something the theme cannot read, a red warning appears underneath it reading "There is an issue with your recurring value".

Leave the recurring value blank for one-off events.

> Use **days** or **weeks**. The calendar block only understands those two units when working out which days a repeating event falls on, so a value like `1 month` will be drawn on the calendar as though it repeated every single day. For a monthly event, either create the entries individually or use a value in weeks.

When a recurring value is set, the event's date rolls forward on its own once the date has passed. So a weekly Sunday service can be created once and will keep moving forward.

### Location

A free-text box for where the event is.

To show a map at the bottom of the event's page, paste a **Google Maps embed address** here — in Google Maps choose **Share → Embed a map**, then copy the web address out of the code it gives you. A plain street address will not produce a map; the theme only shows one when the value looks like a maps address.

Note that whatever you type here is **not printed on the event page** as text — it is only used for the map. If you want visitors to read the address, include it in the event's description as well.

### A heading with no field

The Event Details box also shows a bold **Ministry** heading with nothing underneath it. This is left over from an unfinished feature — there is nothing to fill in, and you can ignore it.

## What appears on an event's page

The built-in event layout shows:

- The featured image as the hero, with the event's title over it.
- An **Add to Google Calendar** link, which lets a visitor save the event to their own calendar.
- Whatever you wrote in the main editor.
- An embedded map at the bottom, when the Location holds a Google Maps embed address.

Two things worth planning around:

- **The date is not printed on the page.** Put the date and time in the description so visitors can read them.
- The *Add to Google Calendar* link always suggests a **4:00 pm** start, because the theme has no time field to read. Mention the real start time in your description.

## Showing events elsewhere on the site

Two blocks make it easy to surface events from any page:

- **Church Calendar** — a full interactive calendar with every published event on it. Drop it on a page (for example a dedicated *Calendar* page) and the calendar fills itself in, including repeats of recurring events.
- **Upcoming Events** — a small grid of the next few events, ordered by date. Use it on the homepage or in a layout to highlight what is coming up.

See the *Blocks* page for the settings each block offers.

## Styling

The calendar's border width and its colors — header background and text, outline, and the two alternating cell backgrounds — are set in **Appearance → Customize → Events Settings**. Event cards in the *Upcoming Events* block follow the *General Archive* card settings described on the *Customizer* page.
