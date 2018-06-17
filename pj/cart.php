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
		<link rel = "stylesheet" href = "cart-wrapper-css.css"/>
		<link rel = "stylesheet" href = "footer-css.css"/>
	</head>
	<body>
		<div>
			<?php
				include_once('header.php');
			?>
			<div class = "wrapper">
				<div class = "information">
					<h2>购物车</h2>
					<div class = "display2">
					
					<div class = "show">
						<a href = "item-info.html"></a>
						<div class = "description">
							<h2>Good job</h2>
							<h3>By Liu-dashuai</h3>
							<div class = "m">
								<button class = "bt-blue" type = "text">价格：$1223123.00</button>
								<button class = "bt-red"onclick = "alert('删除成功~~！！~~！！')" type = "text">删除</button>

							</div>
						</div>
					</div>
					<div class = "show">

						<a href = "item-info.html"><img src = "images/works/square-medium/001020.jpg"/></a>
						<div class = "description">
							<h2>Good job again</h2>
							<h3>By Liu-dali</h3>
							<div class = "m">
								<button class = "bt-blue" type = "text">价格：$1223123.00</button>
								<button class = "bt-red" onclick = "alert('删除成功~~！！~~！！')"type = "text">删除</button>

							</div>
						</div>
					</div>
					<div class = "show">
						<a href = "item-info.html"><img src = "images/works/square-medium/001050.jpg"/></a>
						<div class = "description">
							<h2>Best Masterpiece</h2>
							<h3>By Liu-daxian</h3>
							<div class = "m">
								<button class = "bt-blue" type = "text">价格：$1223123.00</button>
								<button class = "bt-red" onclick = "alert('删除成功~~！！~~！！')"type = "text">删除</button>

							</div>
						</div>
					</div>
					<div class = "r">
					<button onclick = "alert('结款成功！')"class = "rounded" type = "text">结款:$230</button>
					</div>
					</div>
					
			</div>
				
			
		</div>
		<div class = "footer">
					&copy Produced by 17302010003
			</div>	
	</div>
	</body>
<html>