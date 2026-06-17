# Managing Notifications

Site notifications appear as dismissible **toasts** in the lower-right corner of the public site. Each published notification becomes one toast.

## Creating a notification

1. Go to **Notifications** in the admin sidebar and click *Add New*.
2. Set the **title** and **content** — these become the toast heading and body.
3. Open the **Notification Details** box on the side and set a **Start Date**, **End Date**, and **Type**.

The **Type** chooses which icon and color the toast uses:

- **Info** — the default, used for general announcements.
- **Notice** — for things you want people to pay attention to but that are not urgent.
- **Emergency** — for the most urgent messages.

## How it behaves

- An hourly background job publishes a notification once its **Start Date** has passed, and deletes it permanently once its **End Date** has passed (after end-of-day on that date).
- A notification missing either a Start Date or an End Date is **skipped** by the background job. It will not be published or deleted automatically — you would need to publish it (or remove it) yourself, just like a regular post. If you want a notification to come and go on its own, give it both dates.
- The toast appears for every visitor until they dismiss it. Once a visitor clicks the close button on a toast, it stays hidden for the rest of their browsing session (it comes back if they close and reopen the browser).

## Appearance

How the toasts look — colors, spacing, and padding — is configurable under **Appearance → Customize → Notifications Settings**, and the colors used for each type come from the *Site Colors* section.
