 <?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include_once 'db.php';

$data = json_decode(file_get_contents('php://input'), true);


if( isset($data["user_name"]) && isset($data["lat"]) && isset($data["lon"]) ){
  $sql = "UPDATE users SET lat = '". $data["lat"] ."', lon = '" . $data["lon"] . "' WHERE name = '" . $data["user_name"] . "' ";
  $result = executeQuery($sql);
  if($result){
    $response->message = "User updated sucessfully";	
  }else{
    $response->message = "Some error";	
  };
}
else{
  $response->message = "no data";
}
 
echo json_encode($response);

?>
