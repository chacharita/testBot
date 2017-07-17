<!DOCTYPE html>
<html>
<body>
    <div>
    
   <h1>Multi-Drop/Multi-Vehicle Routing</h1>
    
    <form method="POST"> 

      stops____: <input type="text" value = "1,13.8036917,100.5542416,30,08:00:00,17:00:00\n2,13.8755595,100.6191486,30,08:00:00,17:00:00" name="stops"><br> 
      vehicles_: <input type="text" value = "1,13.8036917,100.5542416,13.8036917,100.5542416,08:00:00,17:00:00,80\n2,13.79518,100.61217,13.81042,100.65585,08:00:00,17:00:00,40" name="vehicles"><br>
      commons__: <input type="text" value = "2017-06-01,1,0,1"	name="commons"><br>
       
      <input type="submit" value="submit">         
    </form>
    </div>
<?php
$stops =    $_POST['stops'];
$vehicles = $_POST['vehicles'];
$commons =  $_POST['commons'];

$url = "https://apiplatform.rtic-thai.info:8243/logistics/1.0.0/mvrp";
$strAccessToken = "31cc9ed0-50f1-3b99-b4d1-8aca20de6213";	

$header = array(
'Content-Type:application/x-www-form-urlencoded',
'Authorization: Bearer ' . $strAccessToken
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$result = curl_exec($ch);
curl_close($ch);

var_dump($result);
  var_dump($_POST);
?>
</body>
</html>

