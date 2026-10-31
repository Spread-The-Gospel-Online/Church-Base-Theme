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

The space inside each toast is set by **Notification Content Padding** under **Appearance → Customize → Notifications Settings**, and the **Info Notification Color** and **Notice Notification Color** are chosen there too.

There is no setting for the **Emergency** type — it always uses the **Error** color from the *Site Colors* section, so change it there if you need to.

An Emergency toast is also announced to screen readers as soon as it appears, which is why it is worth reserving for genuinely urgent messages.

## A couple of things to watch

- **Notifications have no page of their own.** They exist only as toasts, so there is nothing to preview — publish one and look at the public site to see it.
- **The End Date deletes the notification permanently.** When the background job clears an expired notification it removes it outright rather than moving it to the trash, so if you want to reuse the wording later, copy it somewhere first.
- Notifications cannot be switched off in *Theme Settings* — the menu is always there, whether or not you use it.
