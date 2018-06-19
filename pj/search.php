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
		<link rel = "stylesheet" href = "search-wrapper-css.css"/>
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
				if(!isset($_GET['by']))
					$_GET['by'] = '';
				if(!isset($_GET['title']))
					$_GET['title'] = '';
				if(!isset($_GET['des']))
					$_GET['des'] = '';
				if(!isset($_GET['sort']))
					$_GET['sort'] = 'view';
				$sql = "SELECT count(*) from artworks where title like '%".$_GET['title']."%' and artist like '%".$_GET['by']."%' and description like '%".$_GET['des']."%'";
				

			?>
			<div class = "wrapper">
				<form class = "sort-form" method = "get" action ="search.php">
				<fieldset>
					标题：<input type = "text" name = "title"/>
					作者：<input type = "text" name = "by"/>
					描述：<input type = "text" name = "des"/>
					<input type="radio" name="sort" value="price"/>价格
					<input type="radio" name="sort" value="view" checked />热度
					<button type = 'submit'>搜索</button>
				</fieldset>
				</form>
				<p class = "search-tit">搜索结果:</p>
				<div class = "display2">
				<?PHP
								
				$result = mysqli_query($connection, $sql);
				$row = $result->fetch_assoc();
				
				if($row['count(*)']!=0){
					$rownumber = floor(($row['count(*)']-1)/20)+1;
					$sql = "SELECT * from artworks where title like '%".$_GET['title']."%' and artist like '%".$_GET['by']."%' and description like '%".$_GET['des']."%' order by ".$_GET['sort'];
					echo '<script>let sql = "'.$sql.'";let rownumber = '.$rownumber.';let a;</script>';
					$sql .= " limit 0,20";
					
					$result = mysqli_query($connection, $sql);
					while($row = $result->fetch_assoc()){
						if(strlen($row['description'])>600){
							$row['description'] = substr($row['description'],0,600).'......';
						}
							echo '<div class = "show">
									<a href = "item-info.php?id='.$row['artworkID'].'" style=\'background-image:url("img/'.$row['imageFileName'].'")\'></a>
									<div class = "description">
										<h4>'.$row['title'].'</h4>
										<h5>By '.$row['artist'].'</h5>
										<h5>$'.$row['price'].'</h5>
										<span class = "tiny">'.$row['description'].'</span>
										<a class = "login-bt" href = "item-info.php?id='.$row['artworkID'].'">
											learn more
										</a>
									</div>
								</div>';
							
						}
						echo '<div class = "page-bts">
					<ul class="page-ul"><li><a class="active" href="#">1</a></li>
						';
					for($i=2;$i<=$rownumber;$i++){
						echo '<li><a href="#" onclick = "changepage(this.innerHTML);">'.$i.'</a></li>';
					}
					echo '<input type = "number" id="pg" min="1" placeholder = "1/'.$rownumber.'" max = "'.$rownumber.'"/><button onclick = "let num = $(\'#pg\').val();if(num>'.$rownumber.'){num='.$rownumber.'}if(num<1)num=1;changepage(num);">跳转</button>
					</ul>
					</div>';
					
				}
				?>
				
				
				
					


					
						
					
					
				</div>
			</div>
			<div class = "footer">
					&copy Produced by 17302010003
				</div>	
				
<script type="text/javascript" src="search.js"></script>
			</div>
		</div>

	</body>
<html>