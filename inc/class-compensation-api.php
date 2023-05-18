<?php
class Compensation_API {
    public function __construct()
    {
        // require plugin_dir_path() . '';
    }
    private function init_curl($endpoint) {
        $base_url = "https://api.getdrip.com/v2/" . DRIP_ACCOUNT_ID . "/";
        $ch = curl_init($base_url . $endpoint);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'User-Agent: spark',
            'Content-Type: application/json',
            'Authorization: Basic ' . base64_encode(DRIP_API_KEY)
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        return $ch;
    }
    /** Create or Updates a subscriber in Drip.Co database
     * @param array $data the subscriber data as an associative array
     * @return string | bool a string with the curl response, or a boolean
     */
    public function add_person_to_workflow(array $data): string | bool {
        $endpoint = '/workflows/37220422/subscribers';
        $payload = array('subscribers' => array($data));
        $ch = $this->init_curl($endpoint);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        $result = curl_exec($ch);
        $http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $http_code;
    }
    public function update_woocommerce_cart($http_code) {
        // Successful request, subscriber added to Drip.com
        if (201 === $http_code) {

        // Update the user's cart in WooCommerce
        $productID = 123; // Replace with the actual product ID
        $quantity = 1; // Replace with the desired quantity

        // Initialize WooCommerce API
        include_once('path/to/woocommerce-api.php'); // Adjust the path to the WooCommerce API library

        $consumerKey = 'YOUR_CONSUMER_KEY'; // Replace with your WooCommerce API consumer key
        $consumerSecret = 'YOUR_CONSUMER_SECRET'; // Replace with your WooCommerce API consumer secret
        $storeURL = get_site_url() . '/store'; // Replace with your store URL

        $woocommerce = new Automattic\WooCommerce\Client($storeURL, $consumerKey, $consumerSecret, [
            'version' => 'wc/v3',
        ]);

        // Create or update the cart for the user
        $cartResponse = $woocommerce->post('cart', [
            'customer_id' => get_current_user_id(), // Replace with the user's ID or any identifier
            'line_items' => [
                [
                    'product_id' => $productID,
                    'quantity' => $quantity,
                ],
            ],
        ]);

        // Redirect the user to the checkout page
        wp_redirect('/checkout');
        exit();
    } else {
        //
    }
}
}