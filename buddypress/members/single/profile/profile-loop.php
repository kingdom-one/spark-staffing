<?php
/**
 * BuddyPress - Members Profile Loop
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 * @version 3.0.0
 */

// This action is documented in bp-templates/bp-legacy/buddypress/members/single/profile/profile-wp.php
do_action( 'bp_before_profile_loop_content' );

if ( ! is_user_logged_in() ) {
	echo '<style>#item-buttons,.x-item-list-tabs-subnav {display: none;}</style>';
} ?>

<div class="profile">
	<?php
	if ( bp_has_profile() ) :
		while ( bp_profile_groups() ) :
			bp_the_profile_group();
			if ( bp_profile_group_has_fields() ) :
				do_action( 'bp_before_profile_field_content' );
				?>
				<section class="bp-widget <?php bp_the_profile_group_slug(); ?>">
					<h2><?php bp_the_profile_group_name(); ?></h2>

					<section class="profile-fields">
						<?php
						while ( bp_profile_fields() ) :
							bp_the_profile_field();
							?>
							<?php if ( bp_field_has_data() ) : ?>
								<div <?php bp_field_css_class(); ?>>
									<div class="label"><?php bp_the_profile_field_name(); ?></div>
									<div class="data"><?php bp_the_profile_field_value(); ?></div>
								</div>
							<?php endif; ?>
							<?php do_action( 'bp_profile_field_item' ); ?>
						<?php endwhile; ?>
					</section>
				</section>

							<?php
							do_action( 'bp_after_profile_field_content' );
							endif;
							endwhile;
							do_action( 'bp_profile_field_buttons' );
							endif;
							do_action( 'bp_after_profile_loop_content' );
