<?php
	header('Content-type:text/json;charset=utf-8');
	$username=$_POST['username'];
	$password=$_POST['password'];
	$tel=$_POST['tel'];
	$addr=$_POST['addr'];
	$email=$_POST['email'];
	$host = "localhost";
	$database = "art";
	$user = "root"; 
	$pass = "";
	$connection = mysqli_connect($host,$user,$pass,$database);
	$error = mysqli_connect_error(); 
	if ($error != null) {
		$output = "<p>Unable to connect to database<p>" . $error;
	exit($output);}
	$sql = "SELECT UserName,customerID FROM CustomerLogon WHERE UserName = '".$username."'";
	if($result = mysqli_query($connection, $sql)){
		if($row = $result->fetch_assoc()){
			echo 0;
			
		}
		else{
			session_start(); 
			$_SESSION['id'] = $row['COUNT(*)']+5;
			$sql = "SELECT COUNT(*) FROM CustomerLogon";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
			$sql = "INSERT INTO `CustomerLogon` (`CustomerID`, `UserName`, `Pass`, `Salt`, `State`, `DateJoined`, `DateLastModified`) VALUES (".($row['COUNT(*)']+5).", '".$username."', '".$password."', 'HoGiVlunac11vDbbFHpoB0OdDOEkA6Uk', 1, '2012-10-08 00:00:00', '2012-11-15 00:00:00')";
			mysqli_query($connection, $sql);
			$sql = "INSERT INTO `Customers` (`CustomerID`, `FirstName`, `LastName`, `Address`, `City`, `Region`, `Country`, `Postal`, `Phone`, `Email`, `Privacy`) VALUES (".($row['COUNT(*)']+5).", '', '', '".$addr."', 'São José dos Campos', 'SP', 'Brazil', '12227-000', '".$tel."', '".$email."', '1')";
			mysqli_query($connection, $sql);
			echo 1;
		}
	}

		


?>