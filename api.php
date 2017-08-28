<?php
$url = "https://apiplatform.rtic-thai.info:8243/logistics/1.0.0/odRouting?date_time=2017-07-01T10:08:00&st_y=13.795082&st_x=100.596549&en_y=13.107056&en_x=101.133106&toll=1";		
$strAccessToken = "31cc9ed0-50f1-3b99-b4d1-8aca20de6213";		
    $header = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $strAccessToken
            );
   
    
    $ch = curl_init($url);
 
            curl_setopt($ch, CURLOPT_GET, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            $result = curl_exec($ch);
            curl_close($ch);
       
   
    
    var_dump($result);
    ?>
