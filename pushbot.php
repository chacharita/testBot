<?php
       
$strAccessToken = "xV/huVeGtwzqkP96ryoZdb3X0BHoAyuIXaXlIbf2axHa+CTebqsx8np2B8jQGVhnm31zNpHaY6lIWJ0LRzIqnxsgrBt0a+dKb56qqBmOlDttf2ciCpLUM4jXevfZFg1pqEJjUsahi4On8qIg1ocUWgdB04t89/1O/w1cDnyilFU=";
$text= $_POST['inputtext'];
$image = $_POST['inputimage'];
$mids = array(0=>'U7de80d0a2ceea863e831375badd2eb55','U8e595fe987f94b2efd9db19c6039a1e1');

foreach($mids as $key => $mid){        
        $messages = [
            "type" => "text",
            "text" => $text 
           
         ];
       
       
//        $image =[

//                "type" =>"image",
//                "image" => $image
// //                "type" =>"image",
// //               "originalContentUrl"=> "https://example.com/original.jpg",
// //                "previewImageUrl"=> "https://example.com/preview.jpg"
       
       
//        ];
       
   
      $post_data = [
            "to" => $mid,
            "messages" => [$messages]
        ];
        
//        $post_data = [
//             "to" => $mid,
//             "image" => [$image]
//         ];
   
 
        $header = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $strAccessToken
        );
        $url = 'https://api.line.me/v2/bot/message/push';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
 
        $result = curl_exec($ch);
        curl_close($ch);
       
}


?>
