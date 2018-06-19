<?php
	session_start();
	//var_dump($_FILES);
	header('Content-type:text/json;charset=utf-8');
	$refresh = $_POST['refresh'];
	
	$title=$_POST['title'];
	$artist=$_POST['artist'];
	$description=$_POST['description'];
	$year=$_POST['year'];
	$genre=$_POST['genre'];
	$width=$_POST['width'];
	$height=$_POST['height'];
	$price=$_POST['price'];
	if(isset($_FILES["image"])){
	if ($_FILES["image"]["error"] > 0)
	{
	echo "Error: " . $_FILES["image"]["error"] . "<br />";
	}
	else
	{
		if (file_exists("img/" . $_FILES["image"]["name"]))
		{

			$filename = substr($_FILES["image"]["name"],0,strripos($_FILES["image"]["name"],'.')).'1'.substr($_FILES["image"]["name"],strripos($_FILES["image"]["name"],'.'));

		}
		else{
			$filename =$_FILES["image"]["name"];
		}
	//echo $filename;
	
		move_uploaded_file($_FILES["image"]["tmp_name"],"img/" . $filename);
	}
	}
	$host = "localhost";
	$database = "art";
	$user = "root"; 
	$pass = "";
	$connection = mysqli_connect($host,$user,$pass,$database);
	$error = mysqli_connect_error(); 
	if ($error != null) {
		$output = "<p>Unable to connect to database<p>" . $error;
	exit($output);}

	if($refresh==0){
		$sql= "select artworkID from artworks order by artworkID desc limit 1";
		$artworkID = mysqli_query($connection, $sql)->fetch_assoc()['artworkID']+1;
		$sql = "insert into artworks (artworkID,artist,imageFileName,title,description,yearOfWork,genre,width,
		height,price,view,ownerID,timeReleased) 
		values ('".$artworkID."','".$artist."','".$filename."','".$title."','".$description."','".$year."'
		,'".$genre."','".$width."','".$height."','".$price."','0','".$_SESSION['id']."','".date("Y-m-d h:i:s")."')";
	}
	else{
	$sql = "update artworks set artist='".$artist."',";
	if($_POST['image']!='')
		$sql.="imageFileName='".$filename."',";
	$sql.="title='".$title."',description='".$description."',
	yearOfWork='".$year."',genre='".$genre."',width='".$width."',
		height='".$height."',price='".$price."',timeReleased='".date("Y-m-d h:i:s")."' where artworkID = '".$refresh."'";
		$artworkID = $refresh;
	}
	mysqli_query($connection, $sql);
	
		header("location:item-info.php?id=".$artworkID);
	

		


?>