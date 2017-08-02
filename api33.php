<?php

$curl = curl_init();

curl_setopt_array($curl, array(

  CURLOPT_URL => "https://apiplatform.rtic-thai.info:8243/logistics/1.0.0/mvrp",
  CURLOPT_RETURNTRANSFER => true,

  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "commons=2017-06-01%2C1%2C0%2C1&vehicles=1,13.773944,100.542689,13.8036917,100.5542416,08:00:00,17:00:00,80
\n2,13.773944, 100.542689,13.81042,100.65585,08:00:00,17:00:00,40&stops=1%2C13.8036917%2C100.5542416%2C30%2C08%3A00%3A00%2C17%3A00%3A00%0A%5Cn2%2C13.8755595%2C100.6191486%2C30%2C08%3A00%3A00%2C17%3A00%3A00",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer 31cc9ed0-50f1-3b99-b4d1-8aca20de6213",
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded",
    "postman-token: 2021c1d0-3d7f-2f3a-0b02-a529d335a0fa"
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
