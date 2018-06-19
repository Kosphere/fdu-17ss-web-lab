<!DOCTYPE html>
<?php session_start(); 

?>
<html  lang = "zh-cmn-Hans">
	<head>
		<meta charset = "utf-8">
		<title>Art Store</title>
		<link rel="shortcut icon" href="logo.ico">
		<meta name = "description" content = "ArtStore是国内最大的艺术品交易网站，没有中间商赚差价">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<link rel = "stylesheet" href = "reset.css" />
		<link rel = "stylesheet" href = "header-css.css"/>
		<link rel = "stylesheet" href = "index-wrapper-css.css"/>
		<link rel = "stylesheet" href = "footer-css.css"/>
				
	</head>
	<body>


		<div>
			<?php
				include_once('header.php');
				$host = "localhost";
				$database = "art";
				$user = "root"; 
				$pass = "";
				$connection = mysqli_connect($host,$user,$pass,$database);
				$error = mysqli_connect_error(); 
				if ($error != null) {
					$output = "<p>Unable to connect to database<p>" . $error;
				exit($output);}
				$sql = "SELECT artworkid,imageFileName,title,description FROM artworks where orderid is null order by view desc LIMIT 3";
				
			?>
			<div class = "wrapper">
			<div id = "foot"></div>
				<div id="carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carousel" data-slide-to="0" class="active"></li>
						<li data-target="#carousel" data-slide-to="1"></li>
						<li data-target="#carousel" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
					<?php
					if($result = mysqli_query($connection, $sql)){
						$row = $result->fetch_assoc();
						echo '<div class="carousel-item active">
							<a href = "item-info.php?id='.$row['artworkid'].'">
							<img class="d-block w-100" src="img/'.$row['imageFileName'].'
							" alt="First slide">
							<div class="carousel-caption d-none d-md-block">
							<h5>'.$row['title'].'</h5>
							<p>'.$row['description'].'</p>
							</div>
							</a>
						</div>
						';
					while($row = $result->fetch_assoc()){
						echo '<div class="carousel-item">
							<a href = "item-info.php?id='.$row['artworkid'].'">
							<img class="d-block w-100" src="img/'.$row['imageFileName'].'" 
							alt="First slide">
							<div class="carousel-caption d-none d-md-block">
							<h5>'.$row['title'].'</h5>
							<p>'.$row['description'].'</p>
							</div>
							</a>
						</div>
						';
						
					}
				}
					?>
						
					</div>
					<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				
				
				
				<div class = "display2">
					<?php
					$sql = "SELECT imageFileName,artworkID,artist,title,description FROM artworks where orderid is null order by view asc LIMIT 3";
					if($result = mysqli_query($connection, $sql)){
						while($row = $result->fetch_assoc()){
							echo '<div class = "show">
									<a href = "item-info.php?id='.$row['artworkID'].'" style=\'background-image:url("img/'.$row['imageFileName'].'")\'></a>
									<div class = "description">
										<h4>'.$row['title'].'</h4>
										<h5>By '.$row['artist'].'</h5>
										<span class = "tiny">'.$row['description'].'</span>
										<a class = "login-bt" href = "item-info.php?id='.$row['artworkID'].'">
											learn more
										</a>
									</div>
								</div>';
							
						}
					}
					?>
					
					
						
					
					
				</div>
			</div>
			<div class = "footer">
					&copy Produced by 17302010003
			</div>		
			</div>
		</div>
		<script type="text/javascript">
var wname = "首页";
</script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript" src="index.js"></script>
	</body>
<html>