# Managing Notifications

Site notifications appear as dismissible **toasts** in the lower-right corner of the public site. Each published notification becomes one toast.

Notifications are always available — they cannot be switched off under *Theme Settings* the way the other content types can.

## Creating a notification

1. Go to **Notifications** in the admin sidebar and click *Add New*.
2. Set the **title** and **content** — these become the toast heading and body. A notification has no featured image or excerpt; the title and content are all it uses.
3. Open the **Notification Details** box on the side and set a **Start Date**, **End Date**, and **Type**.

The **Type** chooses which icon and color the toast uses:

- **Info** — the default, used for general announcements. Shows a circled "i".
- **Notice** — for things you want people to pay attention to but that are not urgent. Shows a warning triangle.
- **Emergency** — for the most urgent messages. Shows a circled cross, and is announced immediately to screen readers rather than waiting for a natural pause.

## How it behaves

- An hourly background job publishes a notification once its **Start Date** has passed, and deletes it permanently once its **End Date** has passed (after end-of-day on that date). This deletion skips the Trash, so an expired notification cannot be recovered — keep a copy of anything you may want to reuse.
- A notification missing either a Start Date or an End Date is **skipped** by the background job. It will not be published or deleted automatically — you would need to publish it (or remove it) yourself, just like a regular post. If you want a notification to come and go on its own, give it both dates.
- The toast appears for every visitor until they dismiss it. Once a visitor clicks the close button on a toast, it stays hidden for the rest of their browsing session (it comes back if they close and reopen the browser).

## Appearance

Open **Appearance → Customize → Notifications** to set:

- **Notification Content Padding** — small, medium, or large spacing inside each toast.
- **Info Notification Color** and **Notice Notification Color** — pick which of your palette colors each of those two types uses.

**Emergency** notifications do not have a picker here. They always use the **Error** color, which you set in the *Site Colors* section alongside the rest of your palette.
