<?php
	session_start();
	
	header('Content-type:text/json;charset=utf-8');
	$add = $_POST['add'];
	$host = "localhost";
	$database = "art";
	$user = "root"; 
	$pass = "";
	$connection = mysqli_connect($host,$user,$pass,$database);
	$error = mysqli_connect_error(); 
	if ($error != null) {
		$output = "<p>Unable to connect to database<p>" . $error;
	exit($output);}
	$sql = "select balance from customers where CustomerID = ".$_SESSION['id'];
	$balance = mysqli_query($connection, $sql)->fetch_assoc()['balance']+$add;
	$sql = "update customers set balance = '".$balance."' where CustomerID = ".$_SESSION['id'];
	mysqli_query($connection, $sql);
	echo $balance;
?>