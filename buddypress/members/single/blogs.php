<?php

/**
 * BuddyPress - Users Blogs
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 * @version 3.0.0
 */

?>

<div class="item-list-tabs" id="subnav" aria-label="<?php esc_attr_e('Member secondary navigation', 'buddypress'); ?>"
    role="navigation">
    <ul>

        <?php bp_get_options_nav(); ?>

        <li id="blogs-order-select" class="last filter">

            <label for="blogs-order-by"><?php _e('Order By:', 'buddypress'); ?></label>
            <select id="blogs-order-by">
                <option value="active"><?php _e('Last Active', 'buddypress'); ?></option>
                <option value="newest"><?php _e('Newest', 'buddypress'); ?></option>
                <option value="alphabetical"><?php _e('Alphabetical', 'buddypress'); ?></option>

                <?php

				/**
				 * Fires inside the members blogs order options select input.
				 *
				 * @since 1.2.0
				 */
				do_action('bp_member_blog_order_options'); ?>

            </select>
        </li>
    </ul>
</div><!-- .item-list-tabs -->

<?php
switch (bp_current_action()):

		// Home/My Blogs
	case 'my-sites':

		/**
		 * Fires before the display of member blogs content.
		 *
		 * @since 1.2.0
		 */
		do_action('bp_before_member_blogs_content'); ?>

<div class="blogs myblogs">

    <?php bp_get_template_part('blogs/blogs-loop') ?>

</div><!-- .blogs.myblogs -->

<?php

		/**
		 * Fires after the display of member blogs content.
		 *
		 * @since 1.2.0
		 */
		do_action('bp_after_member_blogs_content');
		break;

		// Any other
	default:
		bp_get_template_part('members/single/plugins');
		break;
endswitch;
/**
 * Register a custom Form
 *
 */
// function my_post_form() {
// $settings = array(
// 	'post_type'             => 'post', //which post type
// 	'post_author'           =>  bp_loggedin_user_id(), //who will be the author of the submitted post
// 	'post_status'           => 'published', //how the post should be saved, change it to 'publish' if you want to make the post published automatically
// 	'current_user_can_post' =>  is_user_logged_in(), //who can post
// 	'show_categories'       => true, //whether to show categories list or not, make sure to keep it true
// 	'allowed_categories'    => array(get_all_category_ids()) //array of allowed categories which should be shown, use  get_all_category_ids() if you want to allow all categories
// );

// $form = bp_new_simple_blog_post_form('my form', $settings);
	// create a Form Instance and register it
// }

// add_action('bp_init', 'my_post_form', 4);//register a form