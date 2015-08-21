<?php
/**
 * Created by PhpStorm.
 * User: moouse
 * Date: 8/6/2015
 * Time: 2:09 PM
 */
header('Access-Control-Allow-Origin: *');
if(isset($_POST['process'])){
    switch ($_POST['process']){
        case 'login_qb':
            require_once('modules/quickblox.php');
            break;
        case 'get_qbId':
            require_once('modules/quickblox.php');
            break;
        default:
            require_once('modules/mongo_to_json.php');
            break;
    }
}