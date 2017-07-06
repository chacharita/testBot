<?php
   
    $url = "https://apiplatform.rtic-thai.info:8243/logistics/1.0.0/odRouting?";     
    $strAccessToken = true;
   // $post_data =[
    //];
        
       
   // $isRequestHeader = false;
   
    $header = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $strAccessToken
            );
   
    
    $ch = curl_init($url);
 
            curl_setopt($ch, CURLOPT_GET, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS,($date_time , $st_y, $st_x,$en_y , $toll));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            $result = curl_exec($ch);
            curl_close($ch);
       
   
    echo "555555";


?>
