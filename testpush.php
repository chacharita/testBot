<?php
$straccessToken = "EOFJCU+NGmGZ4ca8OVjNKzz6WkNdqcrWKS2KK11Fx1g1Ti0BNdDPa019isWZHK47m31zNpHaY6lIWJ0LRzIqnxsgrBt0a+dKb56qqBmOlDuZctrN5jBIO04MagDmuy0poH2Hd4aQXAO7TKs5UM/ofAdB04t89/1O/w1cDnyilFU=";
$strurl = "https://api.line.me/v2/bot/message/push";

$arrHeader = array();
$arrHeader = "Content-Type: application/json";
$arrHeader = "Authorization: Bearer {$straccessToken}";

$arrPostData = array();
$arrPostData['to'] = "U8e595fe987f94b2efd9db19c6039a1e1";
$arrPostData['messages'][0]['type'] = 'text';
$arrPostData['messages'][0]['text'] = 'Hi peemmy';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strurl);
curl_setopt($ch, CURLOPT_HEADDER,flase);
curl_setopt($ch, CURLOPT_POST,true);
curl_setopt($ch, CURLOPT_HTTPHEADDER,$arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);

$result = curl_exec($ch);
curl_close ($ch);

?>




