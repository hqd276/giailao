<?php
/**
 * Created by PhpStorm.
 * User: moouse
 * Date: 8/6/2015
 * Time: 2:06 PM
 */
header('Access-Control-Allow-Origin: *');
if($_POST['process'] == 'login_qb'){
    login();
}else{
    getQbId();
}
function login(){
    $uid = $_POST['id'];
    $file_name = 'quickblox_acc/'.$uid.'.txt';
    if(!file_exists($file_name)) {
        $file = fopen($file_name, "w");
        $content = $_POST['qbId'];
        fwrite($file, $content);
        fclose($file);
    }
}

function getQbId(){
    $uid = $_POST['id'];
    $file_name = 'quickblox_acc/'.$uid.'.txt';
    if(!file_exists($file_name)){
        echo false;
    }else{
        $file = fopen($file_name,"r");
        $content = fread($file,filesize($file_name));
        fclose($file);
        echo $content;
    }
}
//}else{
//    $file = fopen($file_name,"r");
//    $content = fread($file,filesize($file_name));
//    fclose($file);
////    echo $content;
//}