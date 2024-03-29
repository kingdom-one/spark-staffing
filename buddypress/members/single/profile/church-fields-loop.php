<?php
/**
 * Spark - Candidate Profile Loop
 */

do_action( 'bp_before_profile_loop_content' );
if ( ! is_user_logged_in() ) {
	echo '<style>#item-buttons,.x-item-list-tabs-subnav {display: none;}</style>';
}
?>
<div class="profile">
	<?php
	if ( bp_has_profile() ) :
		while ( bp_profile_groups() ) :
			bp_the_profile_group();
			if ( bp_profile_group_has_fields() ) :
				do_action( 'bp_before_profile_field_content' );
				?>
	<section class="bp-widget bp-profile__section--container 
				<?php
				echo ( ! bp_is_my_profile() && ! pmpro_hasMembershipLevel( array( '3', '4' ) ) ) ? 'restricted ' : ' ';
																			bp_the_profile_group_slug();
				?>
																			">
		<h2 class="bp-profile__section--header">
				<?php
				if ( bp_get_the_profile_group_id() === 2 ) {
							$church_name = bp_get_profile_field_data( 'field=Church Name' );
							echo 'About ' . $church_name;
				} elseif ( bp_get_the_profile_group_id() === 4 ) {
					echo 'Get connected';
				} elseif ( bp_get_the_profile_group_id() === 5 ) {
					echo 'at a glance';
				} else {
					bp_the_profile_group_name();
				}
				?>
		</h2>
		<div class="profile-fields bp-profile__section--content">
				<?php
				while ( bp_profile_fields() ) :
					bp_the_profile_field();
					?>
					<?php if ( bp_field_has_data() ) : ?>
						<?php if ( bp_get_the_profile_field_type() === 'web' ) : ?>
			<div <?php bp_field_css_class( 'social__container' ); ?>>
							<?php bp_the_profile_field_value(); ?>
			</div>
			<?php else : ?>
			<div <?php bp_field_css_class(); ?>>
				<h3 class="profile-fields--label">
					<?php bp_the_profile_field_name(); ?>
				</h3>
				<div class="profile-fields--value">
					<?php bp_the_profile_field_value(); ?>
				</div>
			</div>
			<?php endif; ?>
				<?php endif; ?>
					<?php do_action( 'bp_profile_field_item' ); ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>

				<?php
				do_action( 'bp_after_profile_field_content' );
				endwhile;
				do_action( 'bp_profile_field_buttons' );
				endif;
				do_action( 'bp_after_profile_loop_content' );