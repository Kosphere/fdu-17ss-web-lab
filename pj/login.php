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
		<link rel = "stylesheet" href = "login-wrapper-css.css"/>
		<link rel = "stylesheet" href = "footer-css.css"/>
		
	</head>
	<body>

		<div>
			<?php
				include_once('header.php');
			?>
				

			</div>
			<div class = "wrapper">
			
								<div id = "foot"></div>
					<script>
var wname = "登录";
</script>
				<script type="text/javascript" src="index.js"></script>
				<br/>
				<?php
				if(isset($_GET['login'])){
					echo '<span>请登陆后再使用此功能</span>';
				}
				
				?>
				
				<div class = "title-line">
				
					<span class = "title">登录</span>
				</div>
				<div id = "login">
					<form class = "big-input" method = "post" action = "login-check.php">
						<fieldset>
							<p>
								<label>用户名：</label>
								<input type = "text" name = "username" id = "username"/>
							</p>
							<p>
								<label>密码：</label>
								<input type = "password" name = "password"id = "password">
							</p>
							<p>
								
								<label id = "yanzhengma">2131</label>
								
								<input type = "text" name = "cnumber" id = "cnumber">
							</p>
							<span id = 'notice'></span>
							<p id = "bts">
							<a class = "login-bt" id = "btok" href ="#" onclick = "loginSubmit()">
								登录
							</a>
							<a class = "login-bt" href = "regist.html">注册</a>
							</p>
							
						</fieldset>
					</form>
				</div>
					
			</div>
					<script type="text/javascript"  src="login.js"></script>
					<?php
						echo '<script type="text/javascript">
						function ret(){
							window.location = "'.$_GET["url"].'";
						}
						</script>';
					?>
			<div class = "footer">
					&copy Produced by 17302010003
				</div>	
			</div>

		

	</body>
<html>