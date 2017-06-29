<html>
<body>
    <div>
    <center>
   <h1 style="text-align:center;">PUSH MESSAGE</h1>
   
   <form action="pushbot.php" method="POST" >  
      <br><br>
      <TEXTAREA  name="txet"rows="10" cols="80"> </TEXTAREA>                                             
         <br><br><br>
         <SELECT name="[name]"> 
         <OPTION SELECTED>---selet member---
         <OPTION VALUE=U7de80d0a2ceea863e831375badd2eb55>ffon
         <OPTION VALUE=Ub5fea2ff169cba24b2179fd33e59e454>Oil
         </SELECT>
        <input type="submit" value="SUBMIT" >
      
     
  
<?php
       
$strAccessToken = "xV/huVeGtwzqkP96ryoZdb3X0BHoAyuIXaXlIbf2axHa+CTebqsx8np2B8jQGVhnm31zNpHaY6lIWJ0LRzIqnxsgrBt0a+dKb56qqBmOlDttf2ciCpLUM4jXevfZFg1pqEJjUsahi4On8qIg1ocUWgdB04t89/1O/w1cDnyilFU=";

$text= $_POST['text'];
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


?
               </form>
    </div>
</body>
</html>
