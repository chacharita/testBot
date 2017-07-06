<?php
   
    $url = "https://apiplatform.rtic-thai.info:8243/logistics/1.0.0/odRouting?";     
    $strAccessToken = true;
    
    $post_data => 
        $date_time='yyyy-mm-dd' ,
        $st_y = '08:00:00',
        $st_x= '08:00:00',     
        $en_y= '17:00:00' ,      
        $en_x= '17:00:00'  ,    
        $toll= '[0 or 1]'
    ; 
       
    
    $header = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $strAccessToken
            );
   
    
    $ch = curl_init($url);
 
            curl_setopt($ch, CURLOPT_GET, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_GETFIELDS,($post_data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            $result = curl_exec($ch);
            curl_close($ch);
       
   
    echo response;


?>
