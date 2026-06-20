# Church Theme

## Development Setup

Requires a few tools for local development.

* [GitHub CLI](https://cli.github.com/): used for running local hook to update docs and trigger the action to sync admin docs with Wiki pages
* [Claude CLI & Subscription](https://code.claude.com/docs/en/quickstart#step-1-install-claude-code): used for running background job to trigger scanning the theme to rebuild documentation

Few settings to update:

* For the project, set local git hooks to run from the `.githooks` directory.
* Ensure that a Claude skill named `documentation-sync` that scans the code base and updates MD files in the docs folder exists.

### Permalinks

Permalinks need to be set to `Post Name` for the theme & archives to work correctly

### Archive Setup

For archives, to set the hero image use a page with a slug that equates to the post type (e.g. for sermons, create a page with the slug "sermons"). The theme will tell you if pages are missing and ask if you want to add them, so you don't need to remember the slugs

### Sermons

Sermons can be setup to pull automatically from an RSS feed. You just need to go to `Sermons` > `Sermon Settings` and add the URL of the RSS feed (will likely end with `.xml`). This will pull in sermons automatically as the feed updates, although you can fetch updates manually if the site is taking longer to update (done on the same page)


## Customizer

The theme has a number of options for customizing the appearance. These will be documented in the repository's Wiki pages

## Documentation

Uses Git hooks and Claude skills for updating documentation and syncing it with the repository wiki pages.