<?php
$url = "https://apiplatform.rtic-thai.info:8243/logistics/1.0.0/odRouting?date_time=2017-07-01T10:08:00
&st_y=13.795082&st_x=100.596549&en_y=13.107056&en_x=101.133106&toll=1";		
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
    

   // var_dump(urldecode($result));
    //$a = json_decode($result);
    //echo 'this is decode\n';
    //var_dump($a[0]->Legs[0]->Route);
     //echo 'this is urldecode\n';
     //var_dump($a);

   
//       //  $de = rawurlencode($result);
// //   $de = rawurlencode($result);
// //      //$de =json_decode($result);
        
// //        // var_dump($de);
// //        // echo "                                 ";
// //         $da = rawurldecode($de);
// //         $aa = json_decode($da);
// //         $bb = $aa[0]->Legs;
// //         $bbb = $bb[0]->Route;
// // //         $cc = rawurlencode($bb);
// //         var_dump($bbb . "   ");
// //         var_dump(urldecode($bbb));
        
// // //        var_dump($bb);


?>
