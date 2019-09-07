<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://curp.munett.com/v1/curp",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => '{"paternal_surname": "CALDERON", "mothers_maiden_name": "HINOJOSA", "names": "FELIPE DE JESUS", "sex": "H", "birthdate": "18/08/1962", "entity_birth": "MN", "options" : {"rfc" : true,"nss" : true}}',
  CURLOPT_HTTPHEADER => array(
    "authorization: Token token=API_KEY_HERE",
    "content-type: application/json",
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}