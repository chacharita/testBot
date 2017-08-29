<?php
$request = new HttpRequest();
$request->setUrl('https://apiplatform.rtic-thai.info:8243/logistics/1.0.0/odRouting');
$request->setMethod(HTTP_METH_GET);

$request->setQueryData(array(
  'date_time' => '2017-04-26T08:00:00',
  'st_y' => '13.8036917',
  'st_x' => '100.5542416',
  'en_y' => '13.8755595',
  'en_x' => '100.6191486',
  'toll' => '1'
));

$request->setHeaders(array(
  'postman-token' => 'ff7180e0-da3c-e904-c197-4b5a1fff509a',
  'cache-control' => 'no-cache',
  'content-type' => 'application/json',
  'authorization' => 'Bearer 31cc9ed0-50f1-3b99-b4d1-8aca20de6213'
));

try {
  $response = $request->send();

  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}
?>
