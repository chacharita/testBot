<?php
$access_token = 'LNVFUuQGohgqx9acOtpSSfaf7V+scYu39GeSMnL4iVnbTNPNhzMuIqYpbRw88IXMm31zNpHaY6lIWJ0LRzIqnxsgrBt0a+dKb56qqBmOlDsOkcI9sYomzG2oRYNpNLWwMpEe8VNIywbsFm3xDahWsQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
