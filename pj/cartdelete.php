<?php
	session_start();
	header('Content-type:text/json;charset=utf-8');
	$artworkID = $_POST['artworkID'];
	$host = "localhost";
	$database = "art";
	$user = "root"; 
	$pass = "";
	$connection = mysqli_connect($host,$user,$pass,$database);
	$error = mysqli_connect_error(); 
	if ($error != null) {
		$output = "<p>Unable to connect to database<p>" . $error;
	exit($output);}
	$sql = "delete from carts where artworkID = '".$artworkID."' and userID = '".$_SESSION['id']."'";
	
	if($result = mysqli_query($connection, $sql)){
		
			echo 1;
			
	}
		else{
			
			echo 0;
		}
	

		


?>