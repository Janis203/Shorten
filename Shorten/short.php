<?php
$longURL = trim(readline("Enter long URL: "));
$apiUrl = 'https://cleanuri.com/api/v1/shorten';
$curl = curl_init($apiUrl);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
$data = http_build_query(['url' => $longURL]);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$response = curl_exec($curl);
$responseData = json_decode($response);
echo $responseData->result_url;
curl_close($curl);