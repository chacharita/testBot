<?php
   
    $urlProtocol = "https://apiplatform.rtic-thai.info:8243/logistics/1.0.0/odRouting?date_time=2017-04-26T08:00:00&st_y=13.
    8036917&st_x=100.5542416&en_y=13.8755595&en_x=100.6191486&toll=1 ";     
    
    //$request = "date_time=Date and Time[yyyy-mm-ddThh:mm:ss]".$st_y="Latitude start point".
    //$st_x="Longitude of start point".$en_y="Latitude of end point".$en_x="Longitude of end point".
   // $toll="toll usage (0: not use, 1: use)";   
   
    $isRequestHeader = false;
    
    
    $exHeaderInfoArr   = array();
    $exHeaderInfoArr[] = "Content-Type: application/json";
    $exHeaderInfoArr[] = "Authorization: Bearer".$urlProtocol;
   // $url = 'https://api/message/request' ;
    
    $ch = curl_init($urlProtocol);
   // $ch = curl_init("$urlProtocol");
    curl_setopt($ch, CURLOPT_URL, $urlProtocol);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
    curl_setopt($ch, CURLOPT_HEADER, (($isRequestHeader) ? 1 : 0));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if( is_array($exHeaderInfo) && !empty($exHeaderInfo) )
    {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $exHeaderInfo);
    }
    $response = curl_exec($ch);
    curl_close($ch);
 
    echo $response;


?>
