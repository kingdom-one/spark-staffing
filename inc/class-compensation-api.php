<?php
class Compensation_API {
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
        curl_close($ch);
        return $result;
    }
}