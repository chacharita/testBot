<?php
   
$url = ".https://apiplatform.rtic-thai.info:8243/logistics/1.0.0/mvrp";     
$strAccessToken = "31cc9ed0-50f1-3b99-b4d1-8aca20de6213";
  // var_dump($_GET);
 
//    $post_data =array(  
//         $date_time='yyyy-mm-dd' ,
//         $st_y = '08:00:00',
//         $st_x= '08:00:00',     
//         $en_y= '17:00:00' ,      
//         $en_x= '17:00:00'  ,    
//         $toll= '[0 or 1]'
//     ); 
       
    
    $header = array(
            'Content-Type:application/x-www-form-urlencoded',
            'Authorization: Bearer ' . $strAccessToken
            );
   
    
    $ch = curl_init($url);
 
            curl_setopt($ch, CURLOPT_GET, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS,($_POST));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            $result = curl_exec($ch);
            curl_close($ch);
       
   
    //echo "response";
    var_dump($result);
?>
