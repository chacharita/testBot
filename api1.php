

<?php
 echo 22;  
$url = "https://apiplatform.rtic-thai.info:8243/logistics/1.0.0/odRouting?date_time=2017-04-26T08:00:00&st_y=13.803691&st_x=100.554241&en_y=13.8755595&en_x=100.6191486&toll=0";     
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
            'Content-Type: application/json',
            'Authorization: Bearer ' . $strAccessToken
            );
   
    
    $ch = curl_init($url);
 
            curl_setopt($ch, CURLOPT_GET, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //curl_setopt($ch, CURLOPT_POSTFIELDS,($_GET));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            $result = curl_exec($ch);
            curl_close($ch);
       
   
    //echo "response";
    //echo json_dec 
    var_dump(json_encode($result));
    var_dump(json_decode($result));
    


?>
