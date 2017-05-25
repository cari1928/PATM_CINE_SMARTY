<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL            => "http://192.168.1.67/cineSlim/public/index.php/api/sucursal/listado/app",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING       => "",
  CURLOPT_MAXREDIRS      => 10,
  CURLOPT_TIMEOUT        => 30,
  CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST  => "GET",
  CURLOPT_HTTPHEADER     => array(
    "authorization: Basic cm9vdDpyb290",
    "cache-control: no-cache",
    "postman-token: 007e6b22-3ae6-1ee8-84bd-6e57d9f90976",
  ),
));

$response = curl_exec($curl);
$err      = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
