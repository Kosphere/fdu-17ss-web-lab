<?php
	session_start();
	//var_dump($_FILES);
	header('Content-type:text/json;charset=utf-8');
	$time = $_POST['time'];
	$host = "localhost";
	$database = "art";
	$user = "root"; 
	$pass = "";
	$connection = mysqli_connect($host,$user,$pass,$database);
	$error = mysqli_connect_error(); 
	if ($error != null) {
		$output = "<p>Unable to connect to database<p>" . $error;
	exit($output);}
	$total=0;
	for($i=0;$i<count($_POST['id']);$i++){
	$sql = "select * from artworks where artworkID = '".$_POST['id'][$i]."' and orderID is NULL";
	if($result = mysqli_query($connection, $sql)){
	$row = $result->fetch_assoc();
	$total+=$row['price'];
	if(strtotime($time)<strtotime($row['timeReleased'])){
	echo 0;
	exit();
	}
	}
	else{
	echo 0;
	exit();
	}
	}
	$sql = "select balance from customers where customerID = '".$_SESSION['id']."'";
	$result = mysqli_query($connection, $sql);
	$row = $result->fetch_assoc();
	$balance = $row['balance'];
	if($row['balance']<$total){
		echo 2;
		exit();
	}
	
	$sql = "insert into orders (CustomerID,DateStarted,price) values ('".$_SESSION['id']."','".date("Y-m-d h:i:s")."','".$total."')";
	
	
	mysqli_query($connection, $sql);
	$sql = 'SELECT LAST_INSERT_ID()';
	$result = mysqli_query($connection, $sql);
	$row = $result->fetch_assoc();
	$index = $row['LAST_INSERT_ID()'];
	for($i=0;$i<count($_POST['id']);$i++){
		$sql = "select ownerID from artworks where artworkID = ".$_POST['id'][$i];
		$owner = mysqli_query($connection, $sql)->fetch_assoc()['ownerID'];
		$sql = "update artworks set orderID = '".$index."' where artworkID = '".$_POST['id'][$i]."'";
		mysqli_query($connection, $sql);
		
		$sql = "insert into orderdetails (orderID,PaintingID,ownerID) values ('".$index."','".$_POST['id'][$i]."','".$owner."')";
		mysqli_query($connection, $sql);
		$sql = "delete from carts where userID = '".$_SESSION['id']."' and artworkID = ".$_POST['id'][$i]."";
		mysqli_query($connection, $sql);
	}
	$balance-=$total;
	$sql = "update customers set balance ='".$balance."'";
	mysqli_query($connection, $sql);
	echo 1;
?>