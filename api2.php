<?php
$url = "https://apiplatform.rtic-thai.info:8243/logistics/1.0.0/smvrp?date_time=2016-06-14T08:00:00&polyline=%7BjesAayaeR_lHbgAvlEcxI%7EtFou%40wwGpoO&service_time=30&mode=1&toll=1&vehicle=2";     
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
       
   
    
    var_dump(json_decode($result));
    
    
?>
