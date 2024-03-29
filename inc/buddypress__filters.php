<?php // phpcs:ignore WordPress.Files.FileName.NotHyphenatedLowercase

/**
 * Declare Custom Index types
 */

add_filter(
	'bp_template_hierarchy_members_single_item',
	function ( $templates ) {
		$member_types = bp_get_member_type( bp_displayed_user_id(), false );
		if ( $member_types ) {
			foreach ( $member_types as $member_type ) {
				array_unshift( $templates, "members/single/index-{$member_type}.php" );
			};
		}
		return $templates;
	}
);



/**
 * Define Avatar Size
 */
if ( ! defined( 'BP_AVATAR_THUMB_WIDTH' ) ) {
	define( 'BP_AVATAR_THUMB_WIDTH', 250 );
}
if ( ! defined( 'BP_AVATAR_THUMB_HEIGHT' ) ) {
	define( 'BP_AVATAR_THUMB_HEIGHT', 250 );
}
if ( ! defined( 'BP_AVATAR_FULL_WIDTH' ) ) {
	define( 'BP_AVATAR_FULL_WIDTH', 500 );
}
if ( ! defined( 'BP_AVATAR_FULL_HEIGHT' ) ) {
	define( 'BP_AVATAR_FULL_HEIGHT', 500 );
}

// phpcs:ignore Squiz.Commenting.FunctionComment.MissingParamTag
/** Exclude Profile Fields on View Profile
 *
 * @link https://buddydev.com/hiding-buddypress-profile-field-groups-conditionally/ */
function spark_exclude_profile_field_groups_on_view_profile( $args ) {
	if ( bp_is_user_profile_edit() ) {
		return $args;
	}
	// field group IDs to hide
	$hidden_groups = array( 1, 6, 7 );

	// check if groups are already hidden
	$excluded_groups = array();
	if ( ! empty( $args['exclude_groups'] ) ) {
		$excluded_groups = wp_parse_id_list( $args['exclude_groups'] );
	}
	$excluded_groups = array_merge( $excluded_groups, $hidden_groups );

	$args['exclude_groups'] = join( ',', $excluded_groups );

	return $args;
}
add_filter( 'bp_before_has_profile_parse_args', 'spark_exclude_profile_field_groups_on_view_profile' );

/**
 * Skip Church Profile Fields from Public Viewing
 *
 * @param {array} $args - field IDs to suppress
 */
function skip_church_xprofile_fields( $args ) {
	// hide account type
	// display if editing profile
	if ( bp_is_user_profile_edit() || is_admin() ) {
		return $args;
	}
	if ( bp_is_user_profile() ) {
		$args['exclude_fields'] = array( 63, 181 );
		return $args;
	}
}
add_filter( 'bp_before_has_profile_parse_args', 'skip_church_xprofile_fields' );
