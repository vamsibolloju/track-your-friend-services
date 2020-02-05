<?php
     header("Access-Control-Allow-Origin: *");
     include_once 'db.php'; 
     $sql = 'SELECT id, name, email, mobile FROM users';

     $result = executeQuery($sql);
     $users = array();
	
     if (mysqli_num_rows($result) > 0) {
       while($user = mysqli_fetch_assoc($result)) {
	$users[] = $user;	
       }
     }	
     echo json_encode($users);	
?>
