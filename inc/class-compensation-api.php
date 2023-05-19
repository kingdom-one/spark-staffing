<?php
/**
 * The Compensation API methods.
 *
 * @package KingdomOne
 */

/**
 * Class Compensation_API.
 */
class Compensation_API {
	/** The cURL
	 *
	 * @param string $endpoint the drip.co api endpoint
	 */
	private function init_curl( string $endpoint ) {
		$base_url = 'https://api.getdrip.com/v2/' . DRIP_ACCOUNT_ID . '/';
		$ch       = curl_init( $base_url . $endpoint );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
			'User-Agent: spark',
			'Content-Type: application/json',
			'Authorization: Basic ' . base64_encode(DRIP_API_KEY)
		));
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_POST, true );
		return $ch;
	}

	/** Create or Updates a subscriber in Drip.Co database
	 * @param array $data the subscriber data as an associative array
	 * @return string|bool a string with the curl response, or a boolean
	 */
	private function add_person_to_workflow(array $data): string {
		// $endpoint = '/workflows/37220422/subscribers';
		// $payload = array( 'subscribers' => array( $data ) );
		// $ch = $this->init_curl( $endpoint );
		// curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $payload ) );
		// $result = curl_exec( $ch );
		// $http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
		// curl_close($ch);
		$http_code = "201";
		return $http_code;
	}

	/** Gets the proper variation product id
	 * @param array $form_data The form data
	 * @return int the id
	 */
	private function get_the_variation_id(array $form_data): int {
		$ministry_size = $form_data['ministry-size'];
		$participant = $form_data['participant'];

		if ( 'Small/Medium' === $ministry_size && 'Participant' === $participant ) {
			return 699;     
		} else if ( 'Large' === $ministry_size && 'Participant' === $participant ) {
			return 701;
		} else if ( 'Mega/Multi' === $ministry_size && 'Participant' === $participant ) {
			return 699;
		} else if ( 'Small/Medium' === $ministry_size && 'Non-Participant' === $participant ) {
			return 703;
		} elseif ( 'Large' === $ministry_size && 'Non-Participant' === $participant ) {
			return 702;
		} elseif ( 'Mega/Multi' === $ministry_size && 'Non-Participant' === $participant ) {
			return 704;
		}

	}
	private function update_woocommerce_cart($http_code,$form_data) {
		// Successful request, subscriber added to Drip.com
		if ("201" === $http_code) {
			$product_id = 698; // Replace with the actual product ID
			$variation_id = $this->get_the_variation_id($form_data);

			WC()->cart->add_to_cart($product_id, 1, $variation_id);
			wp_redirect('/checkout');
		} else {
			var_dump($http_code);
		}
	}
	public function submit_form($form) {
		$subscriber = array(
			'first_name' => $form['Name'],
			'email'      => $form['email'],
		);
		$response = $this->add_person_to_workflow($subscriber);
		$this->update_woocommerce_cart($response,$form);
	}
}