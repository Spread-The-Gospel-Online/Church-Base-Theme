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

- An hourly background job publishes a notification once its **Start Date** has passed, and deletes it once its **End Date** has passed (after end-of-day on that date).
- A notification missing either a Start Date or an End Date is **skipped** by the background job. It will not be published or deleted automatically — you would need to publish it (or remove it) yourself, just like a regular post. If you want a notification to come and go on its own, give it both dates.
- Any notification that is **published** is shown to visitors, whatever its dates say. The dates drive the background job, not the display. So if you publish a notification by hand, it goes live immediately even if its start date is weeks away.
- The toast appears for every visitor until they dismiss it. Once a visitor clicks the close button on a toast, it stays hidden for the rest of their browsing session (it comes back if they close and reopen the browser).

> Important: when the end date passes, the notification is **deleted permanently** — it does not go to the Trash and it cannot be restored. If a notification contains wording you will want again next year, copy the text somewhere safe, or leave the End Date blank and unpublish it by hand instead.

## Appearance

How much space sits inside each toast is set under **Appearance → Customize → Notifications**. The **Info** and **Notice** colors are at the bottom of that same section; **Emergency** notifications use the *Error* color from the *Site Colors* section.
