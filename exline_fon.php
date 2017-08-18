<?php
/**
 * Implement hook_menu().
 */
function dx_vrp_menu()
{
    $items         = array();
    $menu = 'dx_line';

    $items[$menu.'/line_member'] = array(
          'page callback'     => 'dx_line_member',
          'access callback'   => true,
    );
    $items[$menu.'/line_master'] = array(
          'page callback'     => 'dx_line_master',
          'access callback'   => true,
    );
    $items[$menu.'/get_line_master'] = array(
          'page callback'     => 'dx_line_get_line_master',
          'access callback'   => true,
    );
    $items[$menu.'/get_line_member'] = array(
          'page callback'     => 'dx_line_get_line_member',
          'access callback'   => true,
    );
       //-----------------------fon--------------------------
     $items[$menu.'/get_line_member_add'] = array(
          'page callback'     => 'dx_line_get_line_member_add_lm_jennie',
          'access callback'   => true,
    );
    $items[$menu.'/master_result'] = array(
          'page callback'     =>   'dx_line_master_result',
          'access callback'   =>   true,
    );
    $items[$menu.'/member_result'] = array(
          'page callback'     =>   'dx_line_member_result',
          'access callback'   =>   true,
    );
    $items[$menu.'/member_result2'] = array(
          'page callback'     =>   'dx_line_member_result2',
          'access callback'   =>   true,
    );
    $items[$menu.'/push_msg'] = array(
          'page callback'     =>   'dx_line_push_msg',
          'access callback'   =>   true,
    );
    $items[$menu.'/get_form'] = array(
          'page callback'     =>   'getform',
          'access callback'   =>   true,
    );
    $items[$menu.'/get_line_member_add_lm_cat'] = array(
          'page callback'     =>   'dx_line_get_line_member_add_lm_cat',
          'access callback'   =>   true,
    );
    $items[$menu.'/mainPage'] = array(
          'page callback'     =>   'main_page',
          'access callback'   =>   true,
    );
       
     //-------------------------------------------------------

    return $items;
}

function dx_line_theme()
{

    //$menu = 'dx_line';
    return array(
        'line_master_view' => array(
            'template' => 'line_master',
            'path'     => DX_MODULE_BASE_PATH.'/modules/dx_line',
        ),
        'line_member_viw' => array(
            'template' => 'line_member',
            'path'     =>  DX_MODULE_BASE_PATH.'/modules/dx_line',
        ),
        'line_member_viw2' => array(
            'template' => 'pushMsg',
            'path'     =>  DX_MODULE_BASE_PATH.'/modules/dx_line',
        ),
        'line_test_form' => array(
            'template' => 'line_test_form',
            'path'     =>  DX_MODULE_BASE_PATH.'/modules/dx_line',
        ),
    );
}


function dx_line_member($data = null, $add_by = null)
{
//fon

    try {
        //-----------------------------fon
         $json = $data;
         //------------------------------
     
        //$json = isset($_GET['data']) ? $_GET['data'] : '';
        //$message = json_decode($json);

        //$add_by = isset($_GET['add_by']) ? $_GET['add_by'] : 0;

        $message = json_decode($json);
 
        $line_name = isset($message->displayName) ? $message->displayName : '';
        $mid = isset($message->userId) ? $message->userId : '';
        $image = isset($message->pictureUrl) ? $message->pictureUrl : '';
    

        if ($mid!= '') {
            //----------------------------------fon
            $result_check_mid = db_select('line_member', 'lm')      //check mid
                                        ->fields('lm')
                                        ->condition('user_id', $mid, '=')
                                        ->execute()
                                        ->fetch();

          
            if ($result_check_mid = true) {    //Already data in db
              
                $result_update_status = db_update('line_member')      //update status
                                      ->fields(array('status' => '0'))
                                      ->condition('user_id', $mid, '=')
                                      ->condition('line_master_id', $add_by, '=')
                                      ->execute() ;
                               
                                                                
                $nid = db_insert('line_member')                    //insert new data
                               ->fields(array(
                                'line_master_id' => $add_by,
                                'member_name' => json_encode($line_name),
                                'user_id' => $mid,
                                'join_date' => time(),
                                'remark' => '',
                                'status' => 1,
                                'create_user' => $add_by,
                                'created' => time(),
                                'update_user' => $add_by,
                                'updated' => time(),
                               ))
                              ->execute();
             
                               $res['success'] = 1;
                               $res['id'] = $nid;
                               $res['msg'] = 'add new is successfully.';
             
             //----------------------------------
            } else {    //not have data in db
                $nid = db_insert('line_member')      //insert data
                            ->fields(array(
                            'line_master_id' => $add_by,
                            'member_name' => json_encode($line_name),
                            'user_id' => $mid,
                            'join_date' => time(),
                            'remark' => '',
                            'status' => 1,
                            'create_user' => $add_by,
                            'created' => time(),
                            'update_user' => $add_by,
                            'updated' => time(),
                            ))
                            ->execute();

                $res['success'] = 1;
                $res['id'] = $nid;
                $res['msg'] = 'add new is successfully.';
            }
        } else {
            $res['success'] = 1;
            $res['msg'] = 'mid == null';
        }
    } catch (Exception $e) {
        $res['success'] = 0;
        $res['msg'] = 'Exception';
        $res['error'] = $e->getMessage();
    }

    $res['line_name'] = $line_name;
    $res['mid'] = $mid;
    $res['image'] = $image;
    $res['add_by'] = $add_by;
    $res['json'] = $json;
    dx_line_log($res);
    return drupal_json_output($res);
}
function dx_line_get_line_master_by_name($name = null)
{
    $sql = db_select('line_master', 'lm');
    $sql->fields('lm', array('line_name','id'));
    $sql->condition('lm.line_name', $name, '=');
    $result = $sql->execute()->fetchObject();
    return $result;
}
function dx_line_master()
{

    $line_name = isset($_GET['line_name']) ? $_GET['line_name'] : '';
    $access_token = isset($_GET['access_token']) ? $_GET['access_token'] : '';
    $add_by = isset($_GET['add_by']) ? $_GET['add_by'] : 0;

    if ($line_name!='' && $access_token!='') {
        try {
            $id = db_insert('line_master')
                            ->fields(array(
                            'line_name' => $line_name,
                            'access_token' => $access_token,
                            'remark' => '',
                            'status' => 1,
                            'create_user' => $add_by,
                            'created' => time(),
                            'update_user' => $add_by,
                            'updated' => time(),
                            ))
                            ->execute();

            $res['success'] = true;
            $res['id'] = $id;
            $res['access_token'] = $access_token;
            $res['msg'] = 'add new is successfully.';
        } catch (Exception $e) {
            $res['success'] = false;
            $res['access_token'] = $access_token;
            $res['id'] = 0;
            $res['msg'] = 'Sorry, we can\'t add your data. ';
            $res['error'] = $e->getMessage();
        }
    } else {
        $res['success'] = false;
        $res['id'] = 0;
        $res['line_name'] = $line_name;
        $res['access_token'] = $access_token;
        $res['msg'] = 'Data is wrong.';
    }
    return drupal_json_output($res);
}
function dx_line_get_line_master_data()
{
    $sql = db_select('line_master', 'lm');
    $sql->fields('lm');
    $sql->orderBy('lm.id', 'DESC');
    return $sql->execute()->fetchAll();
}
function dx_line_get_line_master()
{

    return drupal_json_output(dx_line_get_line_master_data());
}
function dx_line_get_line_member_data()
{
  
    $sql = db_select('line_member', 'lm');
    $sql -> leftJoin('line_master', 'ms', 'ms.id = lm.line_master_id');
    $sql -> leftJoin('line_master', 'ms_2', 'ms_2.id = lm.create_user');
    $sql -> leftJoin('line_master', 'ms_3', 'ms_3.id = lm.update_user');
    $sql->fields('lm');
    $sql->addField('ms', 'line_name', 'line_master_name');
    $sql->addField('ms_2', 'line_name', 'created_user');
    $sql->addField('ms_3', 'line_name', 'updated_user');
    $sql->addExpression("from_unixtime(lm.join_date, '%d/%m/%Y %H:%i')", 'join_date');
    $sql->addExpression("from_unixtime(lm.created, '%d/%m/%Y %H:%i')", 'created');
    $sql->addExpression("from_unixtime(lm.updated, '%d/%m/%Y %H:%i')", 'updated');
    $sql->orderBy('lm.id', 'DESC');
    $result = $sql->execute()->fetchAll();
    $all_data = array();
    foreach ($result as $key => $value) {
        $value->member_name = json_decode($value->member_name);
        $all_data[] = $value;
    }
    return $all_data;
}
function dx_line_get_line_member()
{
        
    return drupal_json_output(dx_line_get_line_member_data());
}
function dx_line_return_result_member_stustas_active(){
    
    $result = db_select('line_member', 'lm')      
                                ->fields('lm')
                                ->condition('status', '1', '=')
                                ->execute()
                                ->fetchAll();
    $all_data = array();
    foreach ($result as $key => $value) {
        $value->member_name = json_decode($value->member_name);
        $all_data[] = $value;
    }                            
    return $all_data;
}
function dx_line_log($data = null)
{

    $msg = "\n".'Date : '.date("Y-m-d H:i:s") . "\n";
    $msg.= 'Success : '. $data['success'] . "\n";
    $msg.= 'Line name : '. $data['line_name'] . "\n";
    $msg.= 'Mid : '.$data['mid'] ."\n";
    $msg.= 'id : ' . $data['id'] ."\n";
    $msg.= 'Image : '.$data['image'] ."\n";
    $msg.= 'Add by : '.$data['add_by'] ."\n";
    $msg.= 'Json : '.$data['json'] ."\n";
    $msg.= 'Exception  : '.$data['error'] ."\n";
    $msg.= 'Message  : '.$data['msg'] ."\n";
    $msg.= '________________________________________'."\n";

    $myfile = fopen("/var/www/html/uat.dxplace.com/sites/all/modules/dxplace/modules/dx_line/line_member_log.txt", "a+") or die("Unable to open file!");
    fwrite($myfile, $msg);
    fclose($myfile);
}
//------------------------------------fon----------------------------------------------------
//https://uat.dxplace.com/dx_line/get_line_member_add  : web hook line
function dx_line_get_line_member_add_lm_cat()        //line cat
{
    $add_by_id = '5';
    $strAccessToken = "1/CozcPxOM0va9kPsnUmqKNjfmy1+3DPvm/7Dj+tWydeJwlPMtfZMXK6sfzR+QBC4FWPPWQ3PmZTCz7TBSK54Dx6Hp3/ZzNI6oeiwFY6I29sNuYXQ67b0MucbIaYxcAfehaEvdxtPMiYAu4S3ktR5wdB04t89/1O/w1cDnyilFU=";
    $content = file_get_contents('php://input');
    $arrJson = json_decode($content, true);
    $strUrl = "https://api.line.me/v2/bot/message/reply";
    $arrHeader = array();
    $arrHeader[] = "Content-Type: application/json";
    $arrHeader[] = "Authorization: Bearer {$strAccessToken}";

    if ($arrJson['events'][0]['type'] == 'follow') {
        $arrPostData = array();
        $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
        $arrPostData['messages'][0]['type'] = "text";
        $arrPostData['messages'][0]['text'] = "Id User :".$arrJson['events'][0]['source']['userId']."<br>"."(event type : ".$arrJson['events'][0]['type'].")";
        $mid = $arrJson['events'][0]['source']['userId'];
        dx_line_member_getName($mid, $strAccessToken, $add_by_id);
    } else {
        $arrPostData = array();
        $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
        $arrPostData['messages'][0]['type'] = 'text';
        $arrPostData['messages'][0]['text'] = "event type : ".$arrJson['events'][0]['message']['type'];
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $strUrl);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close ($ch);
}
function dx_line_get_line_member_add_lm_jennie()       //line jennie
{
    $add_by_id = '4';    //id in db
    $strAccessToken = "4IBuBmV6FywcyJmUK34M8karKQx3d4ferATfOBddUE5lOKYK4hMX5nn6zHmY0xU435cWVjdmcsqIsDjlsWQNO2siGwPWEXtl7Y67lf2v0nEGIAfvuKDtBJZx4JUtwgb+PJWLcRN8TArRFMfNP3ZGKQdB04t89/1O/w1cDnyilFU=";
    $content = file_get_contents('php://input');
    $arrJson = json_decode($content, true);
    $strUrl = "https://api.line.me/v2/bot/message/reply";
    $arrHeader = array();
    $arrHeader[] = "Content-Type: application/json";
    $arrHeader[] = "Authorization: Bearer {$strAccessToken}";
    
//    $mid = $arrJson['events'][0]['source']['userId'];                
//    $arrPostData = array();
//    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
//    $arrPostData['messages'][0]['type'] = "text";
//    $arrPostData['messages'][0]['text'] = "Id User : ".$mid."  (event type : ".$arrJson['events'][0]['type'].")"; 
//    dx_line_member_getName($mid,$strAccessToken,$add_by_id);  

    if ($arrJson['events'][0]['type'] == 'follow') {
        $arrPostData = array();
        $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
        $arrPostData['messages'][0]['type'] = "text";
        $arrPostData['messages'][0]['text'] = "Id User :".$arrJson['events'][0]['source']['userId']."<br>"."(event type : ".$arrJson['events'][0]['type'].")";
        $mid = $arrJson['events'][0]['source']['userId'];
        dx_line_member_getName($mid, $strAccessToken, $add_by_id);
    } else {
        $arrPostData = array();
        $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
        $arrPostData['messages'][0]['type'] = 'text';
        $arrPostData['messages'][0]['text'] = "event type : ".$arrJson['events'][0]['message']['type'];
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $strUrl);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close ($ch);
}
function dx_line_member_getName($mid = null, $token = null, $add_by = null)      //get data of member
{
    $strAccessToken = $token;
    $content = file_get_contents('php://input');
    $arrJson = json_decode($content, true);
    $strUrl = "https://api.line.me/v2/bot/profile/$mid";
    $header = array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $strAccessToken
    );
    $chAdd = curl_init();
    curl_setopt($chAdd, CURLOPT_URL, $strUrl);
    curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chAdd, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($chAdd);
    $err    = curl_error($chAdd);
    curl_close($chAdd);
   
    dx_line_member($result, $add_by);
    
    $data = "\n".'dataSend : '.$result."\n".
            '________________________________________'."\n";
            
    $myfile = fopen("/var/www/html/uat.dxplace.com/sites/all/modules/dxplace/modules/dx_line/ft_dx_line_member_getName.txt", "a+") or die("Unable to open file!");
    fwrite($myfile, $data);
    fclose($myfile);
}
 
function dx_line_master_result()
{

    return theme('line_master_view', array('line_master' => dx_line_get_line_master_data()));
}
function dx_line_member_result()
{
    
    return theme('line_member_view', array('line_member' => dx_line_get_line_member_data()));
}

function dx_line_member_result2()
{
    return theme('line_member_view2', array('line_member' => dx_line_get_line_member_data()));
}
function dx_line_push_msg()
{
                     
    $token = 'token';
    $text = $_GET['textArea'];
    $midUser = $_GET['mid'];
    echo "Mid User ";
    echo "<br>";
    var_dump($midUser);
    echo "token ";
    echo "<br>";
    var_dump($token);
    echo "text ";
    echo "<br>";
    var_dump($text);
    //foreach($midUser as $key => $mid){
//        $messages = [
//            "type" => "text",
//            "text" => $text
//        ];

//        $post_data = [
//            "to" => $mid,
//            "messages" => [$messages]
//        ];

//        $header = array(
//            'Content-Type: application/json',
//            'Authorization: Bearer ' . $strAccessToken
//        );
//        $url = 'https://api.line.me/v2/bot/message/push';
//        $ch = curl_init($url);
//        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
//        $result = curl_exec($ch);
//        curl_close($ch);
//    }
//    var_dump($result);
}


/*
* 
*   function transport_ui_upload_file_manage_page($transport = null){
   
    $build['transport_upload_manage_page'] = drupal_get_form('transport_upload_manage_page', $param);
    return $build;
}

function transport_upload_manage_page($form,&$form_state,$param = null){
    
    $file = 'line';
    $form[$file] = array(
        '#type'       => 'container',
        '#prefix'     => '<div class="transprort-import-file-container" id="import-file-transport-container">',
        '#suffix'     => '</div>',
    );
    // $form[$file]['file_upload'] = array(
    //     '#type'                            => 'file',
    //     '#title'                         => 'Attach File',
    //     //'#attributes'             => array('style' => 'width: 50%;'),
    //     '#description'                     => t('Upload a file, allowed extensions: doc docx xls xlsx pdf png jpg jpeg'),
    // );
    $form[$file]['file_id'] = array(
        '#type'                            => 'managed_file',
        '#title'                         => 'Attach File',
        '#default_value'                 => 0,
        '#upload_location'                 => variable_get('job_document','private://job_document/'),
        '#upload_validators'             => array(
            'file_validate_extensions'         => array($allowed_file_type),
            'file_validate_size'             => array(10*1024*1024),
        ),
    );
    $form[$file]['file_des'] = array(
        '#type'                            => 'textfield',  //description
        '#attributes'                     => array(
                                            'placeholder' => t('Description'),
        ),
    );
    $form[$file]['file_upload_btn'] = array(
        '#type'            => 'submit',
        '#value'        => t('Upload'),
        '#submit'        => array('transport_upload_manage_page_submit'),
        '#attributes'   => array('class' => array('btn', 'btn-primary' , 'glyphicon' , 'glyphicon-upload')),

    );
    
    return $form;
}
 
* 
* 
*/


function getform()
{
    
    $list_line_master = dx_line_get_line_master_data();
    $data = drupal_get_form('testform_form', $list_line_master);
    
    return $data;
}
function testform_form($form, &$form_state, $list_line_master = null)
{
    
    $form_state['list_line_master'] = $list_line_master;
    
    foreach ($list_line_master as $key => $value) {
        $form['list_line_master'][$key] = array(

            '#type' => 'checkbox',
            '#title' => $value->id."  ".$value->line_name,
            '#default_value' => $value->id,
        );
      //  $form['submit'] = array(
//            '#type' => 'submit',
//            '#value' => t('submit'),
//            '#weight' => 19,
//        );
//        $form['cancel'] = array(
//            '#type' => 'button',
//            '#value' => t('cancel'),
//            '#weight' => 19,
//        );
    }

  //$form['#theme'] = array('line_test_form');
    return $form;
}
function testform_form_submit($form, &$form_state)
{
  
    $obj_line_member = dx_line_get_line_member_data();
    $obj_line_master =  $form_state['list_line_master'];
    $array_line_master = $form_state['complete form']['list_line_master'];
    

   
   // var_dump($list_line_member);echo "<br>";  //['line_master_id']
//    var_dump($obj_line_master['access_token']);echo "<br>"; //['access_token']
    
   // var_dump($list_line_member);echo "<br>";echo "<br>";echo "<br>";
//    var_dump($obj_line_master);
//    
    
    foreach ($array_line_master as $key => $array_line_masters) {
        if ($array_line_masters["#value"] == 1) {
            foreach ($obj_line_master as $key => $obj_master) {
                if ($array_line_masters["#default_value"] == $obj_master->id) {
                    foreach ($obj_line_member as $key => $obj_member) {
                        if ($array_line_masters["#default_value"] == $obj_member->line_master_id) {
                            echo $obj_member->member_name;
                            echo "<br>";
                            //echo  count($obj_member->member_name);
                        }
                    }
                    $token = $obj_master->access_token;
                    echo $token;
                    echo "<br>";
                }
            }
        }
    }

    
    exit();
}
//------------------------------------------
function main_page()
{
    $list_master = dx_line_get_line_master_data();
    $list_member = dx_line_return_result_member_stustas_active();
    var_dump($list_member)  ;
    $data =  drupal_get_form('multifield_form', $list_master, $list_member);
    return  $data;

}

function multifield_form($form, &$form_state, $list_master = null, $list_member = null)
{
    
    $form = array();
   
    foreach ($list_master as $key_mas => $value_master) {
        foreach ($list_member as $key_mem => $value_member) {
            $form['line_master'][$key_mas] = array(
                '#title' => t($value_master->line_name),
                '#type' => 'checkbox',
                '#default_value' => $value_master->id,
                '#description' => t('select line@'),
                '#ajax' => array(
                    'callback' => 'ajax_multifield_callback',
                    'wrapper' => 'replace_row_div' . $value_master->line_name,
                ),
            ); 
            if($list_master->id == $value_member->line_master_id){
                $form['replace_row' . $value_member->id] = array(
                    '#type' => 'checkbox',
                    '#title' => t("Result : " .$value_member->line_master_id. $value_member->member_name),
                    '#description' => t('select member '),
                    '#prefix' => '<div id="replace_row_div' . $value_member->user_id . '">',
                    '#suffix' => '</div>',
                );
                if (!empty($form_state['values']['line_master' . $value_master->id])) {
                     $form['replace_row' . $value_master->line_name]['#value'] = $form_state['values']['line_member' . $value_member->user_id];
                }                
                
            }   

        }
    }
        return $form;

  
  //------------------------------------------------------------------------

//    for ($i = 0; $i < 5; $i++) {
//        $form['row' . $i] = array(
//        '#title' => t('Row: ' . $i),
//        '#type' => 'select',
//        '#options' => array(0, 1, 2),
//        '#ajax' => array(
//        'callback' => 'ajax_multifield_callback',
//        'wrapper' => 'replace_row_div' . $i,
//        ),
//        );

//        $form['replace_row' . $i] = array(
//          '#type' => 'textfield',
//          '#title' => t("Result row:" . $i),
           //The prefix/suffix provide the div that we're replacing, named by
//           #ajax['wrapper'] above.
//       
//          '#prefix' => '<div id="replace_row_div' . $i . '">',
//          '#suffix' => '</div>',
//        );

//        if (!empty($form_state['values']['row' . $i])) {
//              $form['replace_row' . $i]['#value'] = $form_state['values']['row' . $i];
//        }
//    }
//  
//    return $form;
}

function ajax_multifield_callback($form, &$form_state)
{
    //$fieldname = $form_state["build_info"]["args"];
      //$fieldname = var_dump($form_state);
  //$fieldname = $form_state['triggering_element']['#name'];
  
    //return $form['replace_' . $fieldname];
  //var_dump($form_state);
  //return $form['replace_row'];
    return $form;
    exit();
}
