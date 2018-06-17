<!DOCTYPE html>
<html  lang = "zh-cmn-Hans">
	<head>
		<meta charset = "utf-8">
		<title>Art Store</title>
		<link rel="shortcut icon" href="logo.ico">
		<meta name = "description" content = "ArtStore是国内最大的艺术品交易网站，没有中间商赚差价">
		<link rel = "stylesheet" href = "reset.css" />
		<link rel = "stylesheet" href = "header-css.css"/>
		<link rel = "stylesheet" href = "regist-wrapper-css.css"/>
		<link rel = "stylesheet" href = "footer-css.css"/>
	</head>
	<body>
		<script type = "text/javascript" src = "regist.js"></script>
		<div>
			<?php
				include_once('header.php');
			?>
			<div class = "wrapper">
				<div class = "title-line">
					<span class = "title">注册</span>
				</div>
				<div id = "login">
					<form class="big-input" method = "post" action = "process.php">
						<fieldset>
							<p>
								<label>用户名：</label>
								<input type = "text" name = "username" id = "username" onblur="judge1();"/>
								<span id = "n1"></span>
							</p>
							<p>
								<label>密码：</label>
								<input type = "password" name = "password"id = "password"onblur="judge2();"/>
								<span id = "n2"></span>
							</p>
							<p>
								<label>确认密码：</label>
								<input type = "password" name = "confirm-password"id = "confirm-password"onblur="judge3();"/>
								<span id = "n3"></span>
							</p>
							<p>
								<label>邮箱：</label>
								<input type = "text" name = "email"id = "email"onblur="judge4();"/>
								<span id = "n4"></span>
							</p>
							<p>
								<label>电话：</label>
								<input type = "text" name = "tel"id = "tel"onblur="judge5();"/>
								<span id = "n5"></span>
							</p>
							<p>
								<label>地址：</label>
								<input type = "text" name = "addr"id = "addr"onblur="judge6();"/>
								<span id = "n6"></span>
							</p>
							<span id = 'notice'></span>
							<p id = "bts">
							<a class = "login-bt" href = "login.html">
								已有账号
							</a>
							<a class = "login-bt" onclick  = "mySubmit();"href = "#">现在注册</a>
							</p>
						</fieldset>
					</form>
				</div>
					
			</div>
			<div class = "footer">
					&copy Produced by 17302010003
				</div>	
			</div>
		</div>

	</body>
<html>