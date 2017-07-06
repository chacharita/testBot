<!DOCTYPE html>
<html>
<body>
    <div>
    
   <h1>REGISTER</h1>
   
    <form method="POST"> 

      Date:<input type="text" name="Date_time"><br>  
      st_y: <input type="text" name="st_y"><br>
      st_x : <input type="text" name="st_x"><br>
      en_y: <input type="text" name="en_y"><br>  
      en_x: <input type="text" name="en_x"><br> 
      toll: <input type="text" name="toll"><br><br>    
      <input type="submit" value="submit">         
    </form>
    </div>
</body>
</html>


<?php
   
$url = "https://apiplatform.rtic-thai.info:8243/logistics/1.0.0/odRouting";     
$strAccessToken = "31cc9ed0-50f1-3b99-b4d1-8aca20de6213";

   $datetime = $_POST['Datetime'];
   $st_y = $_POST['st_y'];
   $st_x = $_POST['st_x'];
   $en_x = $_POST['en_y'];
   $en_x = $_POST['en_x'];
   $toll = $_POST['toll'];
 
   $post_data =array(  
        $date_time='yyyy-mm-dd' ,
        $st_y = '08:00:00',
        $st_x= '08:00:00',     
        $en_y= '17:00:00' ,      
        $en_x= '17:00:00'  ,    
        $toll= '[0 or 1]'
    ); 
       
    
    $header = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $strAccessToken
            );
   
    
    $ch = curl_init($url);
 
            curl_setopt($ch, CURLOPT_GET, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS,($_GET));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            $result = curl_exec($ch);
            curl_close($ch);
       
   
    //echo "response";
    //var_dump($result);


?>
