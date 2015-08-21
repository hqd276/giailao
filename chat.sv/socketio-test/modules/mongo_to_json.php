<?php
/**
 * Created by PhpStorm.
 * User: PenNMouse
 * Date: 3/28/2015
 * Time: 10:55 AM
 */
header('Access-Control-Allow-Origin: *');
//check method is called
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_SESSION['index'])){
    $_SESSION['index'] = array();
}

if($_POST["process"] == "store_message"){
  storeMessage();
}elseif($_POST["process"] == "store_message_room"){
    storeMessageRoom();
}elseif($_POST["process"] == "get_message"){
    getMessage();
}elseif($_POST["process"] == "get_message_room"){
    getMessageRoom();
}elseif($_POST["process"] == "create_room"){
    createRoom();
}elseif($_POST["process"] == "join_room"){
    updateRoomMem();
}elseif($_POST["process"] == "login"){
    login();
};


function login(){
    // $connection = new MongoClient();
    // $collection = $connection->data->users;
    $id = $_POST["id"];
    $friends = array();
    $friends[] = array('id'=>rand(10,99),'username'=>'Hoang Dung'.rand(10,99));
    $friends[] = array('id'=>rand(10,99),'username'=>'Hoang Dung'.rand(10,99));
    $friends[] = array('id'=>rand(10,99),'username'=>'Hoang Dung'.rand(10,99));
    $friends[] = array('id'=>rand(10,99),'username'=>'Hoang Dung'.rand(10,99));
    $friends[] = array('id'=>rand(10,99),'username'=>'Hoang Dung'.rand(10,99));
    $json = json_encode(array('_id'=>$id,'username'=>'Hoang Dung','friends'=>$friends));
    // $json = json_encode($data);
    echo($json);exit();

    // $user = $collection->find(array('_id' => $id));
    // foreach($user as $d){
    //     $data = $d;
    // };
    // if($data){
    //     $json = json_encode($data);
    //     echo($json);
    // }
}


//Store message
//create new document if don't exist chatting before
//or update document if exist chatting before
function storeMessage()
{
    $connection = new MongoClient();
    $db = $connection->data;
    $collection = $connection->data->message;
    $messageID = $_POST["_id"]."_".$_POST["fID"];
    $_messageID = $_POST["fID"]."_".$_POST["_id"];
    $newMessage[] = $_POST["detail"];
    $isExsitChatting = $collection->find(array('_id' => $messageID));
    //***NOTE: method find() return cursor, so use foreach to get data
    foreach ($isExsitChatting as $da) {
        $data = $da;
    };
    if (!$data) {
        $collection->insert(array("_id" => $messageID, "message" => $newMessage));
        $collection->insert(array("_id" => $_messageID, "message" => $newMessage));
    } else {
        $collection->update(array("_id" => $messageID), array('$push' => array("message" => $newMessage)));
        $collection->update(array("_id" => $_messageID), array('$push' => array("message" => $newMessage)));
    };
};

function getMessage(){
    $connection = new MongoClient();
    $db = $connection->data;
    $collection = $connection->data->message;
    $messageID = $_POST["_id"]."_".$_POST["fID"];
    $isExsitChatting = $collection->find(array('_id' => $messageID));

    foreach ($isExsitChatting as $d) {
        $data = $d;
    };


    if(isset($data)){
        $result = array();
        $result["_id"] = $data["_id"];
//        $len = count($data["message"]);

        if(isset($_SESSION['taken'][$_POST["_id"]])){
            $_SESSION['taken'][$_POST["_id"]] += 10;
        }else{
            $_SESSION['taken'][$_POST["_id"]] = 0;
        }

        if($_SESSION["taken"][$_POST["_id"]] > count($data["message"])){
            $len = count($data["message"]) - $_SESSION["taken"][$_POST["_id"]] + 10;
        }else{
            $len = count($data["message"]) - $_SESSION["taken"][$_POST["_id"]];
        }

        if($len > 10){
            $end = $len - 10;
        }else{
            $end = 0;
        }
        for($i=$len-1;$i>$end-1;$i--){
//            if(!$data["message"][$i]){
//                break;
//            }else{
                $result["message"][$i] = $data["message"][$i];
//            }
        }
//        var_dump($len);
//        var_dump($_SESSION['taken'][$_POST["_id"]]);
//        var_dump(count($data["message"]));
//        var_dump($data);
//        var_dump($result);
//        $json2= json_encode($data);
        $json = json_encode($result);
        echo($json);
//        var_dump($json);
//        var_dump($json2);
    };
};

function createRoom(){
    $connection = new MongoClient();
    $collection = $connection->data->roomChat;
    $collection2 = $connection->data->users;
    $roomID = $_POST["roomID"];
    $roomName = $_POST["roomName"];
    $user = array("id" => $roomID, "username" => $roomName);
    $roomMems = explode(",",$_POST["roomList"]);
    $collection->insert(array("_id" => $roomID, "roomName" => $roomName, "roomMem" => array($roomMems[1])));
    $collection2->update(array("_id" => $roomMems[1]),array('$push' => array("friends" => $user)));
    for($i = 2; $i < sizeof($roomMems); $i++) {
        $collection->update(array("_id" => $roomID),array('$push' => array("roomMem" => $roomMems[$i])));
        $collection2->update(array("_id" => $roomMems[$i]),array('$push' => array("friends" => $user)));
    };
};

function updateRoomMem(){
    $connection = new MongoClient();
    $collection = $connection->data->roomChat;
    $collection2 = $connection->data->users;
    $roomID = $_POST["roomID"];
//    $roomName = $_POST["roomName"];
    $cursor = $collection->find(array('_id' => $roomID));
    foreach($cursor as $d){
        $data = $d;
    };
    $roomName = $data->roomName;
    $roomMems = explode(",",$_POST["roomList"]);
    $user = array("id" => $roomID, "username" => $roomName);
    for($i = 1; $i < sizeof($roomMems); $i++){
        $collection->update(array("_id" => $roomID),array('$push' => array("roomMem" => $roomMems[$i])));
        $collection2->update(array("_id" => $roomMems[$i]),array('$push' => array("friends" => $user)));
    };

}


function storeMessageRoom(){
    $connection = new MongoClient();
    $db = $connection->data;
    $collection = $connection->data->message_room;
    $messageRoomID = $_POST["gid"];
//    $_messageID = $_POST["fID"]."_".$_POST["_id"];
    $newMessage = $_POST["detail"];
    $isExsitChatting = $collection->find(array('_id' => $messageRoomID));
    //***NOTE: method find() return cursor, so use foreach to get data
    foreach ($isExsitChatting as $da) {
        $data = $da;
    };
    if (!$data) {
        $collection->insert(array("_id" => $messageRoomID, "message" => array($newMessage)));

    } else {
        $collection->update(array("_id" => $messageRoomID), array('$push' => array("message" => $newMessage)));

    };
};

function getMessageRoom(){
    $connection = new MongoClient();
    $db = $connection->data;

    $collection = $connection->data->message_room;
    $messageRoomID = $_POST["gid"];
    $isExsitChatting = $collection->find(array('_id' => $messageRoomID));

    foreach ($isExsitChatting as $d) {
        $data = $d;
    };

    if($data){
        $json = json_encode($data);
        echo($json);
    };
};