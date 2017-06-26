<?php

$access_token = 'QscSihNBPjAHy2fAVZ0SKQiHc5/C3/HQPtFx/KCsM6SdTXaE2PRunuzV1Xz/cJXLm31zNpHaY6lIWJ0LRzIqnxsgrBt0a+dKb56qqBmOlDsqZSCZc4bYV1Wk80CYLNIUNbz6+/Ors6gOS2kjzh6UPAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
