<?php // phpcs:ignore WordPress.Files.FileName.NotHyphenatedLowercase
/**
 * Paid Memberships Pro Register Helper Functions
 *
 * @package KingdomOne
 */

global $pmprorh_options;



/**
 * Add Fields to Registration/Checkout Page of Paid Memebership Pro
 */
function my_pmprorh_init() {
	if ( ! function_exists( 'pmprorh_add_registration_field' ) ) {
		return false;
	}

	$fields = array();

	// Username
	$fields[] = new PMProRH_Field(
		'second_hint',
		'readonly',
		array(
			'label'    => 'Important Note: Choosing a username will determine your profile URLs',
			'hint'     => 'If registering as a church, set your username to be appropriate to the organization name.',
			'divclass' => 'username--alert',
		)
	);
	foreach ( $fields as $field ) {
		pmprorh_add_registration_field( 'after_username', $field );
	}
	// /** Locations List:
	// * after_username
	// * after_password
	// * after_email
	// * after_captcha
	// * checkout_boxes
	// * after_billing_fields
	// * before_submit_button
	// * just_profile – The field will only be shown on the Edit User/Profile pages. To use this, “profile” must be set to either true or admin.
	// */
};
add_action( 'init', 'my_pmprorh_init' );


/**
 * Add Website and Biographical Info to Membership Checkout
 */
function my_default_wp_user_checkout_fields() {
	if ( class_exists( 'PMProRH_Field' ) ) {
		pmprorh_add_checkout_box( 'additional', 'Profile Information', 'These fields will begin the profile creation process.', 10 );
		$fields = array();

		// First Name
		$fields[] = new PMProRH_Field(
			'first_name',
			'text',
			array(
				'label'    => 'First Name',
				'profile'  => true,
				'required' => true,
			)
		);

		// Last Name
		$fields[] = new PMProRH_Field(
			'last_name',
			'text',
			array(
				'label'    => 'Last Name',
				'profile'  => true,
				'required' => true,
			)
		);
		// Member Type
		$fields[] = new PMProRH_Field(
			'member_type', // input name, will also be used as meta key
			'radio',
			array(
				'required'   => 'true',
				'label'      => 'Member Type',
				'divclass'   => 'spark-pmpro-checkout-fields__account-type',
				'class'      => 'spark-pmpro-checkout-fields__account-type--input',
				'buddypress' => 'Account Type',
				'levels'     => array( 1, 2 ),
				'options'    => array(
					'candidate' => 'Candidate',
					'church'    => 'Church',
				),
			)
		);
		// Location
		$fields[] = new PMProRH_Field(
			'location',
			'text',
			array(
				'label'      => 'Location',
				'buddypress' => 'Location',
				'required'   => 'true',
				'hint'       => '"Remote" or "Anywhere, CA"',
				'divclass'   => 'spark-pmpro-checkout-fields__location',
				'class'      => 'spark-pmpro-checkout-fields__location--input',
				'levels'     => array( 1, 2 ),
			)
		);
		// Denominational Affiliation
		$fields[] = new PMProRH_Field(
			'denomination',
			'select2',
			array(
				'label'      => 'Denominational Affiliation',
				'buddypress' => 'Denominational Affiliation',
				'divclass'   => 'spark-pmpro-checkout-fields__church',
				'class'      => 'pmpro_checkout-fields__church--name',
				'levels'     => array( 1, 2 ),
				'hint'       => 'Select all that apply',
				'options'    => array(
					'Any/No Preference',
					'Anglican',
					'Assemblies of God',
					'Associate Reformed Presbyterian',
					'Baptist',
					'Baptist&mdash;American',
					'Baptist&mdash;SBC',
					'Brethren',
					'Calvary Chapel',
					'Catholic',
					'Christian Church',
					'Christian Missionary Alliance',
					'Church of Christ',
					'Churches of God',
					'Church of God&mdash;Anderson',
					'Church of God&mdash;Cleveland',
					'Church of the Nazarene',
					'Congregational',
					'Disciples of Christ',
					'Episcopal',
					'Evangelical Covenant',
					'Evangelical Free',
					'Evangelical Friends',
					'Foursquare',
					'General Conference',
					'Grace Bretheren',
					'Lutheran',
					'Mennonite',
					'Methodist&mdash;Free',
					'Methodist&mdash;Primitive',
					'Methodist&mdash;United',
					'Missionary Church',
					'Non-Denominational',
					'Pentecostal',
					'Presbyterian',
					'Presbyterian&mdash;PCA',
					'Presbyterian&mdash;PCAUSA',
					'Reformed',
					'Salvation Army',
					'United Brethren',
					'Vineyard',
					'Wesleyan',
				),
				'multiple'   => true,
			)
		);
		// Begin Church Fields
		$fields[] = new PMProRH_Field(
			'church_name',
			'text',
			array(
				'label'      => 'Church Name',
				'buddypress' => 'Church Name',
				'divclass'   => 'spark-pmpro-checkout-fields__church',
				'class'      => 'spark-pmpro-checkout-fields__church--name',
				'depends'    => array(
					array(
						'id'    => 'member_type',
						'value' => 'church',
					),
				),
			)
		);
		// Begin Candidate Fields
		$fields[] = new PMProRH_Field(
			'relocation',
			'radio',
			array(
				'label'      => 'Open to Relocating?',
				'buddypress' => 'Open to Relocating?',
				'options'    => array(
					'yes' => 'Yes',
					'no'  => 'No',
				),
				'divclass'   => 'spark-pmpro-checkout-fields__candidate',
				'class'      => 'spark-pmpro-checkout-fields__candidate',
				'depends'    => array(
					array(
						'id'    => 'member_type',
						'value' => 'candidate',
					),
				),
			)
		);

		foreach ( $fields as $field ) {
			pmprorh_add_registration_field( 'additional', $field );
		}
	}
}
add_action( 'init', 'my_default_wp_user_checkout_fields' );