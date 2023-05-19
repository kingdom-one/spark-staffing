# spark\* staffing, a child of Pro Theme

## Changelog

### v1.4.0

Add Spark Compensation form!

## Overview

This is a child theme for spark\* staffing, a [Kingdom One](https://kingdomone.co) project, that is based on [Pro Theme by Themeco](https://theme.co).

Included are child overrides for Buddypress and WP Job Manager.

# Custom Files

## Top Level

-   `functions.php`
    -   Enqueues Child styles
    -   Removes X Theme Buddypress Styles
    -   Adds Theme Support for WP Job Manager Template files (see below)
    -   Calls in plugin filter files (located in ./inc/)
    -   `./inc/` now holds `bp-custom.php`, `pmpro-customizations.php` and WP Job manager filters
-   `single-job_listing.php` modifies WP Job Manager _Single Job Listing_ template to be based on Pro Theme's Template: **No Container (Header | Footer)**
    -   This will be modified to add a sidebar with new jobs.
    -   This contains re-worked classes to more-closely conform to BEM system.

---

## BuddyPress

-   Public Profiles are custom `index-{$slug}.php` files
    -   Code Copied from `home.php`, `profile.php` and `profile-loop.php'
    -   Classes added to more-closely follow BEM
-   Changed 'Members' Slug to /profile for better URLs (in WP Pages editor)
-   Updated `index-church.php` header class to pull in spark\* styles.

### Filters File

-   Registers custom template file hierarchy (in order to use `index-${slug}.php` files)
-   Defines Avatar size (250x250 thumbs and 500x500 full)
-   Excludes Profile Field Groups from Public view
-   Excludes Single Profile Fields

---

## WP Job Manager

-   The following files were edited to have classes more-closely conform to BEM:
    -   `job-submit.php`
    -   `job-preview.php`
    -   `job-dashboard.php`
    -   `content-single-job_listing-meta.php`
    -   `content-job_listing.php`
    -   `content-single-job_listing-company.php`

### Filters File

-   edits Job Submission fields on front-end job submission page (/post-a-job).

---

## Paid Memberships Pro

-   Almost all pages are edited within **Cornerstone.**
    -   Modifications are located at _Section -> Row -> Column (Element CSS)_
-   Pages that display Tables (resume dashboard, job dashboard and application dashboard) are now styled with `scss/components/_tables.scss` with overrides where necessary
    -   Cornerstone Sections containing shortcodes are given the `#pmpro-dashboard-table` ID to power this function.

### Filters File

-   modifies account registration builder

===

# Plugin-Specific Notes

## Paid Memberships Pro

### /checkout Page

-   Moved Checkout Page modifications to SCSS

---

## WP Job Manager

### Additional Plugins

-   Bookmarks
-   WC Paid Listings
-   Job Alerts
-   Applications
-   Resume Manager

===

# Javascript Files

`index.js` is bundled with @wordpress/scripts module

-   Modules List:
    -   `featuredJob.js` module to add "Featured Job" to highlighted posts.
        -   Need to reconfig to `await` jobs
    -   `footerScripts.JS` inserts copyright & homepage icon credits
    -   `headers.js`
        -   controls **sign up** button styles
        -   prevents clicking on top-level menu items from reloading the page
    -   `requiredFields.js` replaces standard \* with branded ones
    -   `profileScripts.js` controls social Icons swap/svg generation
    -   `postAJob.js` allows click on whole `li` to select appropriate radio box.

===

## Plugins to Extend Feature Set?

-   BuddyDev
    -   BP Simple Front End Post (inactive)
    -   BuddyBlog (inactive)
    -   BuddyPress Featured Memmbers (inactive)
    -   BuddyPress Profile Completion (inactive)
    -   BuddyPress XProfile Custom Field Types
-   Conditional Profile Fields for BuddyPress
