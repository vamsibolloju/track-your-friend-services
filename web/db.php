<?php
 header("Access-Control-Allow-Origin: *");

  	 $dbhost = 'remotemysql.com:3306';
         $dbuser = '1deMfqHP74';
         //$dbpass = '1cM9QTG0rE';
	 $dbpass = '9qESYR0Jnh';
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
