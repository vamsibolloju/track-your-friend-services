<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

include_once 'db.php';

$data = json_decode(file_get_contents('php://input'), true);
$user->mobile = $data["mobile"];
$user->password = $data["password"];

if(isset($data["mobile"]) && isset($data["password"]) ){
 $sql = "SELECT * FROM users WHERE mobile = '" . $data["mobile"] . "' AND password = '" . $data["password"] . "' LIMIT 1";
 $result = executeQuery($sql);
 if(mysqli_num_rows($result)){
        $user = mysqli_fetch_assoc($result);		 
        $user['friends'] = getFriends($user['id']);
        echo json_encode($user); 
 };
}
else{
$error->message = "no user found with credentials";
echo json_encode($error);
}

function getFriends($user_id){
     $sql = "SELECT friend_id from userfriends where user_id = ' " . $user_id . " ' ";
     $result = executeQuery($sql);
     $friends = []; 		
     if (mysqli_num_rows($result) > 0) {
       while($friend = mysqli_fetch_assoc($result)) {
	$friends[] = $friend['friend_id'];
       }
     }
     return $friends;		
}

