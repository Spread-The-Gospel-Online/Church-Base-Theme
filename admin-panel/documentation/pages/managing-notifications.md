# Managing Notifications

Site notifications appear as dismissible **toasts** in the lower-right corner of the public site.

## Creating a notification

1. Go to **Notifications** in the admin sidebar and click *Add New*.
2. Set the **title** and **content** — these become the toast heading and body.
3. Open the **Notification Details** box and set the start date, end date, and type.

The **Type** can be `info`, `notice`, or `emergency`. Will default to info.

## How it behaves

- An hourly job publishes a notification once its start date has passed, and deletes it once its end date has passed.
- A notification with no start or end date is always published and is never automatically removed.
- Visitors can dismiss a notification; it then stays hidden for the rest of their browsing session.

## Appearance

Notification appearance is configurable under **Appearance → Customize → Notifications**.
