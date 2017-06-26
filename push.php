<?php
 
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('xV/huVeGtwzqkP96ryoZdb3X0BHoAyuIXaXlIbf2axHa+CTebqsx8np2B8jQGVhnm31zNpHaY6lIWJ0LRzIqnxsgrBt0a+dKb56qqBmOlDttf2ciCpLUM4jXevfZFg1pqEJjUsahi4On8qIg1ocUWgdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '5cc92d0cde1b2781c60f291c953befa1']);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->pushMessage('U8e595fe987f94b2efd9db19c6039a1e1', $textMessageBuilder);

echo $response->getHTTPStatus() . ' 55555' . $response->getRawBody();
