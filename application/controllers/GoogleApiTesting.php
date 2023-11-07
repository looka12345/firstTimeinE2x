<?php 
defined('BASEPATH')OR exit ('No direct script access allowed');

class GoogleApiTesting extends CI_Controller{

    public function FetchHotelVerificationStatus()
    {
        $curl_handle = curl_init();

$url = "https://travelpartner.googleapis.com/v3/accounts/1413232314/hotelViews";
curl_setopt($curl_handle, CURLOPT_URL, $url);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
$curl_data = curl_exec($curl_handle);
curl_close($curl_handle);
$response_data = json_decode($curl_data);

print_r($response_data);

    }




}



?>