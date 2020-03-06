<?php
 header("Access-Control-Allow-Origin: *");

  	 $dbhost = 'localhost:3306';
     $dbuser = 'root';         
	 $dbpass = '';
     $dbname = '1deMfqHP74';
	 $conn;	
	function getDBConnection(){
         global $conn; 
	 if(!$conn){
		global $dbhost, $dbuser, $dbpass, $dbname;
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
	 }
	 return $conn;
	}

	function executeQuery($sql_query) {
		$conn = getDBConnection();
		$result = mysqli_query($conn, $sql_query);
		return $result;
	}
?>
