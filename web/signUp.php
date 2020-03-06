 <?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include_once 'db.php';

$data = json_decode(file_get_contents('php://input'), true);
//$user->name = $data["name"];
//$user->email = $data["email"];


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

  //echo "new user will be created";
  //echo $sql; 
 };
 

 //$sql = "INSERT INTO users(name, mobile, password) VALUES ('".$data["name"]."', '".$data["mobile"]."', '".$data["password"]."'  )";
 //$result = executeQuery($sql);
 //echo $result;
}
else{
$error->message = "no data";
echo json_encode($error);
}



/*
         if(isset($_POST["name"])){
 $dbhost = 'remotemysql.com:3306';
         $dbuser = '1deMfqHP74';
         $dbpass = '1cM9QTG0rE';
         $dbname = '1deMfqHP74';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
   
            // Check connection
            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            } 
            $sql = "INSERT INTO users(name, email, password) VALUES ('".$_POST["name"]."', '".$_POST["email"]."', '".$_POST["password"]."'  )";

            if (mysqli_query($conn, $sql)) {
               echo "New record created successfully";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $conn->close();
         }
*/
      ?>
