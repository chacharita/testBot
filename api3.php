<?php
$request = new HttpRequest();
            $request->setUrl('https://apiplatform.rtic-thai.info:8243/logistics/1.0.0/mvrp');
            $request->setMethod(HTTP_METH_POST);
            
            $request->setHeaders(array(
              'postman-token' => '3646c7a0-f430-14d7-c849-2a640839678b',
              'cache-control' => 'no-cache',
              'authorization' => 'Bearer 31cc9ed0-50f1-3b99-b4d1-8aca20de6213',
              'content-type' => 'application/x-www-form-urlencoded'
            ));
            
            $request->setContentType('application/x-www-form-urlencoded');
            $request->setPostFields(array(
              'commons' => '2017-08-08,1,1,1',
              'vehicles' => '1,13.8036917,100.5542416,13.8036917,100.5542416,08:00:00,17:00:00,80',
              'stops' => '1,13.813567,100.560139,30,08:00:00,17:00:00'
            ));
            
            try {
              $response = $request->send();
            
              echo $response->getBody();
            } catch (HttpException $ex) {
              echo $ex;
            }
       
  
    exit();   
 }
?>
