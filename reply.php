<?php
 
$strAccessToken = "xV/huVeGtwzqkP96ryoZdb3X0BHoAyuIXaXlIbf2axHa+CTebqsx8np2B8jQGVhnm31zNpHaY6lIWJ0LRzIqnxsgrBt0a+dKb56qqBmOlDttf2ciCpLUM4jXevfZFg1pqEJjUsahi4On8qIg1ocUWgdB04t89/1O/w1cDnyilFU=";
 
$content = file_get_contents('php://input');
var_dump($content);
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
var_dump($strUrl); 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 var_dump($arrHeader);
if($arrJson['events'][0]['message']['text'] == "Hi" or "hi"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
 var_dump($arrPostData);
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "UserID :: ".$arrJson['events'][0]['source']['userId'];
 var_dump($arrPostData);
 
}
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
 
?>
