<?php
$proxy = 'http://fixie:bBt21X0wwYroR2Z@velodrome.usefixie.com:80';
$proxyauth = 'http://fixie:bBt21X0wwYroR2Z@velodrome.usefixie.com:80';
$access_token = 'EOFJCU+NGmGZ4ca8OVjNKzz6WkNdqcrWKS2KK11Fx1g1Ti0BNdDPa019isWZHK47m31zNpHaY6lIWJ0LRzIqnxsgrBt0a+dKb56qqBmOlDuZctrN5jBIO04MagDmuy0poH2Hd4aQXAO7TKs5UM/ofAdB04t89/1O/w1cDnyilFU=';

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
