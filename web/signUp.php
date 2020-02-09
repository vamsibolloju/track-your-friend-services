 <?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include_once 'db.php';

$data = json_decode(file_get_contents('php://input'), true);


if( isset($data["name"]) && isset($data["mobile"]) && isset($data["password"]) && isset($data["email"]) ){
 $sql = "SELECT * FROM users WHERE name = '" . $data["name"] . "' OR mobile = '" . $data["mobile"] . "' OR EMAIL = '" . $data["email"] . "' LIMIT 1";
 $result = executeQuery($sql);
 if(mysqli_num_rows($result)){
        $user = mysqli_fetch_assoc($result);		 
        $response->message = "User is already there with some of these details";
	$response->user = $user;
	echo json_encode($response); 
 } else {
  	$sql = "INSERT INTO users(name, mobile, email, password) VALUES ('".$data["name"]."', '".$data["mobile"]."', '".$data["email"]."', '".$data["password"]."'  )";

 	$result = executeQuery($sql);
 	if($result){
    		echo "User created sucessfully";	
 	}else{
    		echo "Some error";
 	};
 };
}
else{
$error->message = "no data";
echo json_encode($error);
}

?>
