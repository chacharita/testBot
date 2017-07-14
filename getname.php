<html>
    99
<title>@ME</title>

<h1 align = 'center'>@ME</h1>
    <P align=center>
        <img src="http://qr-official.line.me/L/oUypr1a-r8.png">
    </P>
    <div align=center>line@ffon</div>


<?php
    function qr_code(){
        $proxy = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
        $proxyauth = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
        $strAccessToken = "f9/uoIUNEP1kL2paNPKAH+EGLrCz2VYyDLRzADLiG6cUM838OEmvwuLDaHOX8Y8gQPMU/R+dN8JPUEl4UZ3VdcnPVwB3VGFVHPu6HhvSBcssXN77lyH4cRgzSRe+ubJT6jlMGO8SmAXXZaS0FNIeAQdB04t89/1O/w1cDnyilFU=";
        
        $content = file_get_contents('php://input');
        $arrJson = json_decode($content, true);
        $strUrl = "https://api.line.me/v2/bot/profile/{userId}";
    
        //$arrHeader = array();
//        $arrHeader[] = "Content-Type: application/json";
//        $arrHeader[] = "Authorization: Bearer {$strAccessToken}";
//        $arrPostData = array();
//        $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
//        $arrPostData['messages'][0]['type'] = "text";
//        $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
//        $get_mid =  $arrJson['events'][0]['source']['userId'];
        
        $chAdd = curl_init();
        curl_setopt($chAdd,CURLOPT_URL, 'http://uat.dxplace.com/dxtms/testem?mid='."Ub5fea2ff169cba24b2179fd33e59e454");
        curl_setopt($chAdd,CURLOPT_CUSTOMREQUEST , 'GET');
        curl_setopt($chAdd,CURLOPT_RETURNTRANSFER , true);
        curl_setopt($chAdd, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
                                                )
        );
        $result = curl_exec($chAdd);
        $err    = curl_error($chAdd);
        curl_close($chAdd);
        
        if ($arrJson['events'][0]['message']['text'] == "สวัสดี") {
            $arrPostData = array();
            $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
            $arrPostData['messages'][0]['type'] = "text";
            $arrPostData['messages'][0]['text'] = "สวัสดี ".$arrJson['events'][0]['source']['userId'];
        }
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
        $result = curl_exec($ch);
        curl_close ($ch);
        
    }
    qr_code();
    
            
    
    ?>
    
    </html>
