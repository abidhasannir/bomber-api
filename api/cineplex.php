<?php
$phn = $_REQUEST["phone"];
$url = "https://cineplex-ticket-api.cineplexbd.com/api/v1/otp-resend";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0",
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

//{"r_token": "jycbgygsecsgcfhsgcvysegfgrr46rrgve4urv64iu6","msisdn":"01960876721"}

$ps = array(
"r_token"=>"jycbgygsecsgcfhsgcvysegfgrr46rrgve4urv64iu6","msisdn"=>$phn

);

$data = json_encode($ps);

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo($resp);

?>

