<!DOCTYPE html>
<?php session_start(); 
if(!isset($_SESSION['id']))
	echo"<script>window.location.href='login.php?url='+window.location.href</script>";
?>
<html  lang = "zh-cmn-Hans">
	<head>
		<meta charset = "utf-8">
		<title>Art Store</title>
		<link rel="shortcut icon" href="logo.ico">
		<meta name = "description" content = "ArtStore是国内最大的艺术品交易网站，没有中间商赚差价">
		<link rel = "stylesheet" href = "reset.css" />
		<link rel = "stylesheet" href = "header-css.css"/>
		<link rel = "stylesheet" href = "upload-wrapper-css.css"/>
		<link rel = "stylesheet" href = "footer-css.css"/>
	</head>
	<body>
		<script type = "text/javascript" src = "upload.js"></script>
		<div>
			<?php
				include_once('header.php');
				if(isset($_GET['refresh']))
					echo '<script>let refresh = 1</script>';
				else
					echo '<script>let refresh = 0</script>';
			?>
			<div class = "wrapper">
				<div class = "title-line">
					<span class = "title">上传/修改</span>
				</div>
				<div id = "login">
					<form id="inputs" enctype="multipart/form-data" method = "post" action = "upload-check.php">
						<fieldset>
							<p>
								<label>艺术品名称：</label>
								<input type = "text" name = "title" id = "username" onblur="judge1();" <?php if(isset($_GET['title']))echo 'value = "'.$_GET['title'].'"';?>/>
								<span id = "n1"></span>
							</p>
							<p>
								<label>作者：</label>
								<input type = "text" name = "artist"id = "password"onblur="judge2();"<?php if(isset($_GET['artist']))echo 'value = "'.$_GET['artist'].'"'?>/>
								<span id = "n2"></span>
							</p>
							<p>
								<label>简介：</label>
								<input type = "text" name = "description"id = "confirm-password"onblur="judge3();<?php if(isset($_GET['description']))echo 'value = "'.$_GET['description'].'"'?>"/>
								<span id = "n3"></span>
							</p>
							<p>
								<label>年份：</label>
								<input type = "text" name = "year"id = "email"onblur="judge4();"<?php if(isset($_GET['year']))echo 'value = "'.$_GET['year'].'"'?>/>
								<span id = "n4"></span>
							</p>
							<p>
								<label>流派：</label>
								<input type = "text" name = "genre"id = "tel"onblur="judge5();"<?php if(isset($_GET['genre']))echo 'value = "'.$_GET['genre'].'"'?>/>
								<span id = "n5"></span>
							</p>
							<p>
								<label>长度：</label>
								<input type = "text" name = "width"id = "addr"onblur="judge6();"<?php if(isset($_GET['width']))echo 'value = "'.$_GET['width'].'"'?>/>
								<span id = "n6"></span>
							</p>
							<p>
								<label>宽度：</label>
								<input type = "text" name = "height"id = "height"onblur="judge7();"<?php if(isset($_GET['height']))echo 'value = "'.$_GET['height'].'"'?>/>
								<span id = "n7"></span>
							</p>
							<p>
								<label>价格：</label>
								<input type = "text" name = "price"id = "price"onblur="judge8();" <?php if(isset($_GET['price']))echo 'value = "'.$_GET['price'].'"'?>/>
								<span id = "n8"></span>
							</p>
							<p>
								<label>图片：</label>
								<input type="file" name="image" id = 'input-img' onchange = "document.getElementById('preview').src = window.URL.createObjectURL(this.files[0]); "/>

								<span id = "n9"></span>
							</p>
							<span id = 'notice'></span>
								<input type = "text"class='hide'name = "refresh"id = "refresh" <?php if(isset($_GET['refresh']))echo 'value = "'.$_GET['refresh'].'"';else echo 'value = "0"';?>/>
								
							<div id = "showpic"><img id="preview"src = '<?php if(isset($_GET['image']))echo 'value = "'.$_GET['image'].'"'?>'/></div>
							<p id = "bts">
							<a class = "login-bt" onclick  = "mySubmit();"href = "#">上传</a>
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