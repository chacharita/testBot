<?php
    // *** Configuration ***
$proxy = 'http://fixie:bBt21X0wwYroR2Z@velodrome.usefixie.com:80';
$proxyauth = 'http://fixie:bBt21X0wwYroR2Z@velodrome.usefixie.com:80';
    
    //  *** Input ***
    

  // *** Params ***
    $messages = array(
        "type" => "text",
        "text" => 'testtttt naja' 
    );
     //  Loop Send Line msg
    $i =1;          
    //foreach($midUser as $key => $mid)
    //{ 
        
        $post_data = array(
            "to"        => 'U16c42e452723cf9c2682d7bf0001b0d8',
            "messages"  => [$messages]
        );
      
        //send_line_msg($post_data, $strAccessToken);
         $header = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . 'xjGIR1MZNjzmCI9qagfTX7ksvvmLJYmOZZfCaAvY52kld2Hm4SeDJtzRv31ZDyIum31zNpHaY6lIWJ0LRzIqnxsgrBt0a+dKb56qqBmOlDtKyONakxR1kk6ADFzu3Ko5WWqxfhMcufHu3ldcWEhREAdB04t89/1O/w1cDnyilFU='
            );
     
        $url = 'https://api.line.me/v2/bot/message/push' ;
        $result ="";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
     
            $result = curl_exec($ch);var_dump($result);
            curl_close($ch);
            

            
   
 
 ?>
