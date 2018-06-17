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
		<link rel = "stylesheet" href = "user-info-wrapper-css.css"/>
		<link rel = "stylesheet" href = "footer-css.css"/>
	</head>
	<body>
		<div>
			<?php
				include_once('header.php');
			?>
			<div class = "wrapper">
				<div class = "information">
					<p>用户：刘大力</p>
					<p>电话：</p>
					<p>邮箱：</p>
					<p>地址：</p>
					<p>余额：$1231231231.00</p>
					<p>
					<a class = "rounded" href = "cart.html" >购物车</a>
					<a href = "#"class = "rounded" >充值信仰</a>
					
					</p>
				</div>
				<div class = "information2">
					<div class = "user-info">
					我上传的艺术品：
					</div>
					<div class = "user-info">
					我购买的艺术品：
					<table>
					<tr>
					<td class = "td1">订单编号：20160526060</td><td class = "td2">商品名称：Sunflowers
					</td><td class = "td2">订单时间：2016.5.26</td><td class = "td3">订单金额:$400</td>
					</tr>
<tr>
					<td class = "td1">订单编号：20160526023</td><td class = "td2">商品名称：Hash
					</td><td class = "td2">订单时间：2016.5.26</td><td class = "td3">订单金额:$200</td>
					</tr>

					</table>
					</div>
					<div class = "user-info">
					我卖出的艺术品：
					</div>

				</div>
			</div>
			<div class = "footer">
					&copy Produced by 17302010003
			</div>		

			
		</div>

	</body>
<html>