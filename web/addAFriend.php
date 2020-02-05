<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

include_once 'db.php';
$data = json_decode(file_get_contents('php://input'), true);

if(isset($data["user_id"]) && isset($data["friend_id"]) ){
 $sql = "INSERT INTO userfriends(user_id, friend_id) VALUES ('".$data["user_id"]."', '".$data["friend_id"]."')";
 $result = executeQuery($sql);
 if($result){
    $response->message = "Friend added sucessfully";
 }else{
    $response->message = "Error ocured";
 }
}
else{
 $response->message = "no user found with credentials"; 
}
echo json_encode($response);

