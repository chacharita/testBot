<?php
$access_token = 'I+9Wl+pMsEgrvaZYoXMTQbE4QMC23IoaWeXj8VGTKFRYodER3+mEwrR/PLdy0Zawm31zNpHaY6lIWJ0LRzIqnxsgrBt0a+dKb56qqBmOlDtS2v9Ymb6Fx8Va3tbZcTAKpl0gopvWAFvcBaJPKZUApgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
