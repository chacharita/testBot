<?php
httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('EOFJCU+NGmGZ4ca8OVjNKzz6WkNdqcrWKS2KK11Fx1g1Ti0BNdDPa019isWZHK47m31zNpHaY6lIWJ0LRzIqnxsgrBt0a+dKb56qqBmOlDuZctrN5jBIO04MagDmuy0poH2Hd4aQXAO7TKs5UM/ofAdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '	
5cc92d0cde1b2781c60f291c953befa1']);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('sent');
$response = $bot->pushMessage('ch_rita', $textMessageBuilder);
echo $response->getHTTPStatus() . 'HiHi' . $response->getRawBody();
