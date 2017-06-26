<?php
 
$strAccessToken = "EOFJCU+NGmGZ4ca8OVjNKzz6WkNdqcrWKS2KK11Fx1g1Ti0BNdDPa019isWZHK47m31zNpHaY6lIWJ0LRzIqnxsgrBt0a+dKb56qqBmOlDuZctrN5jBIO04MagDmuy0poH2Hd4aQXAO7TKs5UM/ofAdB04t89/1O/w1cDnyilFU=";
//เข้ารหัสที่เป็นสตริง = strUrl
$strUrl = "https://api.line.me/v2/bot/message/push";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
$arrPostData = array();
$arrPostData['to'] = "	1521139504";
$arrPostData['messages'][0]['type'] = "text";
$arrPostData['messages'][0]['text'] = "Test Push Message";
 
//curl_init() เพื่อเปิดการทำงาน
$ch = curl_init();
//CURLOPT_URL (url ของ api ที่เราต้องการไปเรียก) 
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
//และ CURLOPT_POST (เซตให้เป็น true)
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
//CURLOPT_POSTFIELDS (ข้อมูลที่เราต้องการจะส่งไป) และ CURLOPT_POST (เซตให้เป็น true)
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

//curl_exec ( resource $ch ) เพื่อสั่งให้ curl ทำงานคล้ายๆ การกดปุ่ม submit ใน form ที่ client
$result = curl_exec($ch);
//curl_close ( resource $ch ) สุดท้ายคือการสั่งปิดการทำงาน
curl_close ($ch);
 



?>
