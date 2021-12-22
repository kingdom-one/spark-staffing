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
- 
### Plugins Folder
- `bp-custom.php` acts as BuddyPress's `functions.php` and contains functions to register templates and define avatar size.
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

