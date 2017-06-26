<?php
$access_token = 'q7LU8lDc2QzTK/CsXkpl7H+ByXLICd56hC9Si/80Kx/zOQrKhizwUbHCBLkyqm+Em31zNpHaY6lIWJ0LRzIqnxsgrBt0a+dKb56qqBmOlDtOdYT7cJsUczpnD920dvFMImgowb6GQzB3mp++tbVJMAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
