<!DOCTYPE html>
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
			<?php
				include_once('header.php');
			?>
			<div class = "wrapper">
				<div class = "information">
				
				<div class = "details">
				<h1>Mother and Child(Olga and Son)</h1>
				<p>By <a href = "search.html"><i>PabloPicasso</i></a></p>
					<img src = "images\works\medium\114030.jpg"/>
					<div id = "description">
					<span>This work is amazing but there is no introduction for it.</span>
					<h2>Price:<span class = "price"><i>$1000000.00</i></span></h2>
					<p>
						<button class = "rounded" type = "text">添加到心愿单</button>
						<button class = "rounded" onclick = "alert('添加成功！')" type = "text">添加到购物车</button>
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
				
				</div>
				<div class = "float-r">
				<table>
				<tr><td class= "caption"><h2>流行艺术家</h2></td></tr>
				<tr><td>sadfadsf</td></tr>
				<tr><td>dfads</td></tr>
				<tr><td>sadfa</td></tr>
				<tr><td>sdaf</td></tr>
				<tr><td>asdfq</td></tr>
				<tr><td>uyky</td></tr>
				<tr><td>asfhr</td></tr>
				<tr><td>qwe</td></tr>
				</table>
				<table>
				<tr><td class= "caption"><h2>流行流派</h2></td></tr>
				<tr><td>sadfadsf</td></tr>
				<tr><td>dfads</td></tr>
				<tr><td>sadfa</td></tr>
				</table>
				</div>

				
				</div>
			</div>
			<div class = "footer">
					&copy Produced by 17302010003
			</div>		
			</div>
			
		</div>

	</body>
<html>