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
			?>
			<div class = "wrapper">
				<p class = "search-tit">搜索结果:</p>
				<form class = "sort-form">
				<fieldset>
					<input type="radio" name="sort" value="1"/>价格
					<input type="radio" name="sort" value="2" checked />热度
					<input type="radio" name="sort" value="3"/>标题
				</fieldset>
				</form>
				<div class = "display2">
				<div class = "show">
						<a href = "item-info.html"></a>
						<div class = "description">
							<h2>Good job</h2>
							<h3>By Liu-dashuai</h3>
							very good work!
							<a class = "login-bt" href = "item-info.html">
								learn more
							</a>
						</div>
					</div>
					<div class = "show">
						<a href = "item-info.html"><img src = "images/works/square-medium/001020.jpg"/></a>
						<div class = "description">
							<h2>Good job again</h2>
							<h3>By Liu-dali</h3>
							very very good work!
							<a class = "login-bt" href = "item-info.html">
								learn more
							</a>
						</div>
					</div>
					<div class = "show">
						<a href = "item-info.html"><img src = "images/works/square-medium/001050.jpg"/></a>
						<div class = "description">
							<h2>Best Masterpiece</h2>
							<h3>By Liu-daxian</h3>
							very very very good work!
							<a class = "login-bt" href = "item-info.html">
								learn more
							</a>
						</div>
					</div>
					<div class = "page-bts">
					<ul class="page-ul">
						<li><a href="#">«</a></li>
						<li><a class="active" href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">6</a></li>
						<li><a href="#">7</a></li>
						<li><a href="#">»</a></li>
					</ul>
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