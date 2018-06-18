<?php
	header('Content-type:text/json;charset=utf-8');
	$username=$_POST['username'];
	$password=$_POST['password'];

	$host = "localhost";
	$database = "art";
	$user = "root"; 
	$pass = "";
	$connection = mysqli_connect($host,$user,$pass,$database);
	$error = mysqli_connect_error(); 
	if ($error != null) {
		$output = "<p>Unable to connect to database<p>" . $error;
	exit($output);}
	$sql = "SELECT Pass,customerID FROM CustomerLogon WHERE UserName = '".$username."'";
	if($result = mysqli_query($connection, $sql)){
		if($row = $result->fetch_assoc()){
			if($row['Pass'] == $password){
				session_start(); 
				$_SESSION['id'] = $row['customerID'];
				echo 1;
			}
			else{
				echo 0;
			}
		}
		else{
			echo 2;
		}
	}

		


?>