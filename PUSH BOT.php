<?php
 
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('<channel access token>	
Long term token which is displayed permanently.EOFJCU+NGmGZ4ca8OVjNKzz6WkNdqcrWKS2KK11Fx1g1Ti0BNdDPa019isWZHK47m31zNpHaY6lIWJ0LRzIqnxsgrBt0a+dKb56qqBmOlDuZctrN5jBIO04MagDmuy0poH2Hd4aQXAO7TKs5UM/ofAdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '<channel secret>']);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->pushMessage('<to>', $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
