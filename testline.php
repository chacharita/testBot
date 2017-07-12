<!DOCTYPE html>
<html lang="th">

<body>
    



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
            "to"        => 'Ub5fea2ff169cba24b2179fd33e59e454',
            "messages"  => [$messages]
        );
      
        //send_line_msg($post_data, $strAccessToken);
         $header = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . '1QL7okx51BouvIsuWwVjsedRkrWPMt+syYO6BBdnPyamRGH6KsFUvs3E/oerQ/pfm31zNpHaY6lIWJ0LRzIqnxsgrBt0a+dKb56qqBmOlDuMPKje21tH34ndFCI0PNzXa530i04eOa4CgOiHUFqOJwdB04t89/1O/w1cDnyilFU='
            );
     
        $url = 'https://api.line.me/v2/bot/message/push' ;
        $result ="";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
     
            $result = curl_exec($ch);
            curl_close($ch);
            //return $result;

            
   
 
 ?>
</body>

</html>
