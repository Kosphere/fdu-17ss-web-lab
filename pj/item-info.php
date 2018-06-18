<!DOCTYPE html>
<?php session_start(); 
?>
<html  lang = "zh-cmn-Hans">
	<head>
		<meta charset = "utf-8">
		<title>Art Store</title>
		<link rel="shortcut icon" href="logo.ico">
		<meta name = "description" content = "ArtStore是国内最大的艺术品交易网站，没有中间商赚差价">
		<link rel = "stylesheet" href = "reset.css" />
		<link rel = "stylesheet" href = "header-css.css"/>
		<link rel = "stylesheet" href = "item-info-wrapper-css.css"/>
		<link rel = "stylesheet" href = "footer-css.css"/>
	</head>
	<body>
		<div>
		<script type = "text/javascript" src = "addtocart.js"></script>
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
			?>
			<div class = "wrapper">
				<div class = "information">
				<?php
				if(isset($_GET['id'])){
					echo '<script type = "text/javascript">let artid='.$_GET['id'].'</script>';
					$sql = "SELECT * FROM 
					artworks WHERE artworkid = '".$_GET['id']."'";
					if($result = mysqli_query($connection, $sql)){
						while($row = $result->fetch_assoc()){
							echo '<div class = "details">
				<h1>'.$row['title'].'</h1>
				<p>By <a href = "search.php?by='.$row['artist'].'"><i>'.$row['artist'].'</i></a></p>
					<img src = "img\\'.$row['imageFileName'].'"/>
					<div id = "description">
					<p class = "pdes">'.$row['description'].'</p>
					<h2>Price:<span class = "price"><i>$'.$row['price'].'</i></span></h2>
					<p>
						<button class = "rounded" type = "text">添加到心愿单</button>
						<button class = "rounded" onclick = "';
						if(isset($_SESSION['id'])){
							echo 'add();';
						}
						else{
							echo 'window.location=\'login.php?url=\'+window.location.href;';
						}
						echo '" type = "text" ';
						if($row['orderID']==null){
							echo '>加入购物车';
						}
						else{
							echo 'disabled="disabled">已售出';
						}
						echo'</button>
					</p>
					<table>
						<tr><td class= "caption"colspan = "2"><h3>Product Details</h3></td></tr>
						<tr><td>Date:</td><td>'.$row['yearOfWork'].'</td></tr>
						<tr><td>Dimensions:</td><td>'.$row['width'].' cm X '.$row['height'].' cm</td></tr>
						<tr><td>Genres:</td><td>'.$row['genre'].'</td></tr>
						<tr><td>view:</td><td>'.$row['view'].'</td></tr>
					</table>
					</div>
				
					</div>';
					$sql = "update artworks set view='".($row['view']+1)."' where artworkID='".$row['artworkID']."'";
					mysqli_query($connection, $sql);
					}
					
					}
					else{
						echo '搜索结果不存在';
					}
					
				}
				else{
					echo'<div class = "details">
				<h1>Mother and Child(Olga and Son)</h1>
				<p>By <a href = "search.php?by=PabloPicasso"><i>PabloPicasso</i></a></p>
					<img src = "images\works\medium\114030.jpg"/>
					<div id = "description">
					<span>This work is amazing but there is no introduction for it.</span>
					<h2>Price:<span class = "price"><i>$1000000.00</i></span></h2>
					<p>
						<button class = "rounded" type = "text">添加到心愿单</button>
						<button class = "rounded" onclick = "';
						if(isset($_SESSION['id'])){
							echo 'add();';
						}
						else{
							echo 'window.location=\'login.php?url=\'+window.location.href;';
						}
						echo '" type = "text">添加到购物车</button>
					</p>
					<table>
						<tr><td class= "caption"colspan = "2"><h3>Product Details</h3></td></tr>
						<tr><td>Date:</td><td>1922</td></tr>
						<tr><td>Medium:</td><td>Oil on canvas</td></tr>
						<tr><td>Dimensions:</td><td>100 cm X 80 cm</td></tr>
						<tr><td>Home:</td><td>Baltimore Art Museum</td></tr>
						<tr><td>Genres:</td><td>Neoclassical</td></tr>
						<tr><td>Subjects:</td><td>People,Family</td></tr>
					</table>
					</div>
				
					</div>';
				}
				?>
				<div class = "float-r">
				<table>
				<tr><td class= "caption"><h2>流行艺术家</h2></td></tr>
				<tr><td>Pablo</td></tr>
				<tr><td>Henri</td></tr>
				<tr><td>Jacques</td></tr>
				<tr><td>Eugene</td></tr>
				<tr><td>Francisco</td></tr>
				<tr><td>Gustave</td></tr>
				<tr><td>Edouard</td></tr>
				<tr><td>James Abbott</td></tr>
				</table>
				<table>
				<tr><td class= "caption"><h2>流行流派</h2></td></tr>
				<tr><td>Courbet</td></tr>
				<tr><td>Manet</td></tr>
				<tr><td>Whistler</td></tr>
				</table>
				</div>

				
				</div>
			</div>
			<div id = "toastcontainer">

</div>


			<div class = "footer">
					&copy Produced by 17302010003
			</div>		
			</div>
			
		</div>

	</body>
<html>