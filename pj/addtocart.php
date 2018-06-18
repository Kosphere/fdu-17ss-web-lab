<?php
	session_start();
	header('Content-type:text/json;charset=utf-8');
	$id = $_SESSION['id'];
	$artid= $_POST['artid'];
	$host = "localhost";
	$database = "art";
	$user = "root"; 
	$pass = "";
	$connection = mysqli_connect($host,$user,$pass,$database);
	$error = mysqli_connect_error(); 
	if ($error != null) {
		$output = "<p>Unable to connect to database<p>" . $error;
	exit($output);
	}
	$sql = "SELECT * FROM CARTS WHERE USERID = ".$id." AND ARTWORKID = ".$artid."";
	$result = mysqli_query($connection, $sql);
	if($row = $result->fetch_assoc()){
		echo 0;
	}
	else{
	$sql = "INSERT INTO CARTS VALUES('','".$id."','".$artid."')";
	$result = mysqli_query($connection, $sql);
	echo 1;
	}

		


?>