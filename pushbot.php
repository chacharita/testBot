<!DOCTYPE html>
<html>
<body>
    <div>
    <center>
    <h1 style="text-align>PUSH_MESSAGE</h1>
   <center>
    <form action="pushbot.php" method="POST">
    <SELECT>
         <OPTION name="[name]">--- เลือก Member ---
         <OPTION VALUE=U7de80d0a2ceea863e831375badd2eb55>ffon 
         <OPTION VALUE=U8e595fe987f94b2efd9db19c6039a1e1>OIL
         <OPTION VALUE=U16c42e452723cf9c2682d7bf0001b0d8>P'eam  
      </SELECT>
        <br>     
        INPUT MESSAGE <input type="text" :center ; name="inputtext" size="50" width="1200"><br>
        
        <label for="inputimage" class="col-lg-2 control-label">Photo URL</label>
         <input type="text" class="form-control" id="inputimage" name="inputimage" placeholder="Photo URL" size="60"><br>
        
         <input type="submit" value="SUBMIT" > 
    </form>
    </div>
</body>
</html>

<?php
       
$strAccessToken = "xV/huVeGtwzqkP96ryoZdb3X0BHoAyuIXaXlIbf2axHa+CTebqsx8np2B8jQGVhnm31zNpHaY6lIWJ0LRzIqnxsgrBt0a+dKb56qqBmOlDttf2ciCpLUM4jXevfZFg1pqEJjUsahi4On8qIg1ocUWgdB04t89/1O/w1cDnyilFU=";

$text= $_POST['inputtext'];
$user = $_POST['name'];

$mids = array($user);

       foreach($mids as $key => $mid){        
        $messages = [
            "type" => "text",
            "text" => $text 
         
         ];
    
      $post_data = [
            "to" => $mid,
            "messages" => [$messages]
        ];
      
        $header = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $strAccessToken
        );
        $url = 'https://api.line.me/v2/bot/message/push';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
 
        $result = curl_exec($ch);
        curl_close($ch);
       

}


?>
