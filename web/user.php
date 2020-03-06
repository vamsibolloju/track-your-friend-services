<?php
     $user_id = $_GET['name'];
     header("Access-Control-Allow-Origin: *");
     include_once 'db.php'; 
     $sql = "SELECT id, name, email, mobile, lat , lon FROM users where name = '" . $user_id . "' ";
     $result = executeQuery($sql);
     $users;
	
     if (mysqli_num_rows($result) > 0) {
       while($u = mysqli_fetch_assoc($result)) {
	$user = $u;	
       }
     }

     $sql = "SELECT friend_id from userfriends where user_id = ' " . $user['id'] . " ' ";
     $result = executeQuery($sql);
     $friends = []; 		
     if (mysqli_num_rows($result) > 0) {
       while($friend = mysqli_fetch_assoc($result)) {
	$friends[] = $friend['friend_id'];
       }
     }

     $user['friends'] = $friends;		

     echo json_encode($user);
    	
?>
