<?php // phpcs:ignore WordPress.Files.FileName.NotHyphenatedLowercase


add_filter( 'wp_head', 'add_margin_to_product_page' );

/** Add margin to product pages */
function add_margin_to_product_page() {
	if ( is_product() && 1184 === get_the_ID() ) {
		echo '<style>.x-main { margin-top: 5em; }</style>';
	}
}

add_action( 'woocommerce_thankyou', 'custom_woocommerce_auto_complete_order' );
// phpcs:ignore Squiz.Commenting.FunctionComment.MissingParamTag
/**
 * Auto Complete all WooCommerce orders.
 */
function custom_woocommerce_auto_complete_order( $order_id ) {
	if ( ! $order_id ) {
		return;
	}

	$order = wc_get_order( $order_id );
	$order->update_status( 'completed' );
}

add_filter( 'woocommerce_checkout_fields', 'override_billing_fields' );
// phpcs:ignore Squiz.Commenting.FunctionComment.MissingParamTag
/** Swap Company for Ministry  */
function override_billing_fields( $fields ) {
	unset( $fields['billing']['billing_address_2'] );
	$fields['billing']['billing_company']['placeholder']      = 'Ministry Name';
	$fields['billing']['billing_company']['label']            = 'Ministry Name';
	$fields['billing']['billing_first_name']['placeholder']   = 'First Name';
	$fields['shipping']['shipping_first_name']['placeholder'] = 'First Name';
	$fields['shipping']['shipping_last_name']['placeholder']  = 'Last Name';
	$fields['shipping']['shipping_company']['placeholder']    = 'Company Name';
	$fields['billing']['billing_last_name']['placeholder']    = 'Last Name';
	$fields['billing']['billing_email']['placeholder']        = 'Email Address ';
	$fields['billing']['billing_phone']['placeholder']        = 'Phone ';
	return $fields;
}

/** Only filter fields for new users */
if ( ! is_user_logged_in() ) {
	add_filter( 'woocommerce_checkout_fields', 'custom_override_checkout_fields' );
	add_action( 'woocommerce_form_field_text', 'account_settings_heading', 10, 2 );
}
// phpcs:ignore Squiz.Commenting.FunctionComment.Missing
function custom_override_checkout_fields( $fields ) {
	unset( $fields['order']['order_comments'] );
	$fields['account'] = array(
		'account_username'   => array(
			'type'        => 'text',
			'label'       => __( 'Username', 'woocommerce' ),
			'description' => __( 'This will be your profile slug (e.g. sparkstaffing.co/profile/username)', 'woocommerce' ),
			'placeholder' => _x( 'Username', 'placeholder', 'woocommerce' ),
			'required'    => true,
		),
		'account_password'   => array(
			'type'        => 'password',
			'label'       => __( 'Account password', 'woocommerce' ),
			'placeholder' => _x( 'Password', 'placeholder', 'woocommerce' ),
			'class'       => array( 'form-row-first' ),
			'required'    => true,
		),
		'account_password-2' => array(
			'type'        => 'password',
			'label'       => __( 'Verify password', 'woocommerce' ),
			'placeholder' => _x( 'Password', 'placeholder', 'woocommerce' ),
			'class'       => array( 'form-row-last' ),
			'label_class' => array( 'hidden' ),
			'required'    => true,
		),
	);
	return $fields;
}

// phpcs:ignore Squiz.Commenting.FunctionComment.MissingParamTag
/** Add h2 to Account Page */
function account_settings_heading( $field, $key ) {
	// will only execute if the field is account_username and we are on the checkout page...
	if ( is_checkout() && ( 'account_username' === $key ) ) {
		$field = '<h2 class="form-row form-row-wide">Account Details</h2>' . $field;
	}
	return $field;
}
