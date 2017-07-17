<?php
   
$url = "https://apiplatform.rtic-thai.info:8243/logistics/1.0.0/mvrp";     
$strAccessToken = "31cc9ed0-50f1-3b99-b4d1-8aca20de6213";

$stops = $_POST['stops'];
$vehicles = $_POST['vehicles'];
$commons = $_POST['commons'];

//var_dump($_POST);
    
    $header = array(
            'Content-Type:application/x-www-form-urlencoded',
            'Authorization: Bearer'. $strAccessToken
            );
   
    
    $ch = curl_init($url);
 
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'POST');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
            curl_setopt($ch, CURLOPT_POSTFIELDS($_POST));
            curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
            $result = curl_exec($ch);
            curl_close($ch);
    
    var_dump(json_decode($result));

?>
