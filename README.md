# spark* staffing, a child of Pro Theme
## Overview
This is a child theme for spark* staffing, a [Kingdom One](https://kingdomone.co) project, that is based on [Pro Theme by Themeco](https://theme.co).

Included are child overrides for Buddypress and WP Job Manager.

# Custom Files
## Top Level
- `functions.php`
  - Enqueues Child styles
  - Removes X Theme Buddypress Styles
  - Adds Theme Support for WP Job Manager Template files (see below)
- `single-job_listing.php` modifies WP Job Manager *Single Job Listing* template to be based on Pro Theme's Template: **No Container (Header | Footer)**
  - This will be modified to add a sidebar with new jobs.
  - This contains re-worked classes to more-closely conform to BEM system.


## BuddyPress
- Public Profiles are custom index-{$slug}.php files
  - Code Copied from `home.php`, `profile.php` and `profile-loop.php'
  - Classes added to more-closely follow BEM
- Changed 'Members' Slug to /profile for better URLs (in WP Pages editor)
- Updated `index-church.php` header class to pull in spark* styles.


### Plugins Folder
- `bp-custom.php` acts as BuddyPress's `functions.php` and contains functions to register templates and define avatar size.

### Social Media Fields
- Field Group ID 5
  - Facebook: 184
  - Twitter: 185
  - Instagram: 186
  - TikTok: 187
  - LinkedIn: 188
  - Pinterest: 189
  - Youtube: 190
  - Vimeo: 191


## Plugins to Extend Feature Set
- BuddyDev
  - BP Simple Front End Post
  - BuddyBlog
  - BuddyPress Featured Memmbers
  - BuddyPress Profile Completion
  - BuddyPress XProfile Custom Field Types
- Conditional Profile Fields for BuddyPress

## Job Manager
- The following files were edited to have classes more-closely conform to BEM:
  - `job-submit.php`
  - `job-preview.php`
  - `job-dashboard.php`
  - `content-single-job_listing-meta.php`
  - `content-job_listing.php`
  - `content-single-job_listing-company.php` 
- Added "inc" folder, which includes `filter.php`, which acts as plugin's `functions.php` file
  - Presently, this folder edits Job Submission fields on front-end job submission page (/post-a-job).

### Plugins Folder
- PMPro-Customizations folder includes one file, `pmpro-customizations.php`, to modify account registration builder
  - This requires PMPro-Register-Helper add-on


# Page Customizations

## Paid Memberships Pro
- Almost all pages are edited within **Cornerstone.**
  - Modifications are located at *Section -> Row -> Column (Element CSS)*
- Plugin is modified via `pmpro-customizations.php`, which is a self-authored plugin file.
  - [This is the appropriate way of declaring the plugin-specific `functions.php` file](https://www.paidmembershipspro.com/create-a-plugin-for-pmpro-customizations/)

### /Checkout Page
- Moved Checkout Page modifications to SCSS
- Added JS in Cornerstone to set required label in the appropriate place on `#member_type_div`


# Javascript Files
- Added `featuredJob.js` module to add "Featured Job" to highlighted posts.
  - Need to reconfig to `await` jobs