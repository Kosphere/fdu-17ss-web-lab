<?php session_start();  
if(!isset($_SESSION['id']))
	echo"<script>window.location.href='login.php?url='+window.location.href</script>";
?>
<!DOCTYPE html>


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
				echo '<script>let time = "'.date('y-m-d h:i:s').'";let ids = new Array();</script>';
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
				$sql = "select artworkID from carts where userID = '".$_SESSION['id']."'";
				
			?>
			<div class = "wrapper">
				<div class = "information">
					<h2>购物车</h2>
					<div class = "display2">
					<?php
						$total=0;
						$h=0;
						if($result = mysqli_query($connection, $sql)){
							while($row2 = $result->fetch_assoc()){
								$h=1;
								$sql = "select * from artworks where artworkID = '".$row2['artworkID']."'";
								$result2 = mysqli_query($connection, $sql);
								$row = $result2->fetch_assoc();
								$total+=$row['price'];
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
										<a class = "login-bt" href = "#"onclick = "mydelete('.$row['artworkID'].');">
											delete
										</a>
									</div>
								</div>';
								echo '<script>ids.push("'.$row['artworkID'].'")</script>';
							}
						}
					
		
					if ($h==1)
						echo '<div class = "r">
					<button onclick = "mysubmit();"class = "rounded" type = "text">结款:$<?php echo $total; ?></button>
					</div>';
					?>
					</div>
					
			</div>
				
			
		</div>
		<div id = "toastcontainer">

</div>
		<div class = "footer">
					&copy Produced by 17302010003
			</div>	
			<script type="text/javascript">
let wname = "购物车";
function mydelete(artid){
	$.ajax({type:'POST',url:'cartdelete.php',data:{'artworkID':artid},
			async:true,success:function(msg){
				
				location.reload();
			},
			error:function(err){console.log(err);}});	
}
function mysubmit(){
	$.ajax({type:'POST',url:'cartsubmit.php',data:{'time':time,'id':ids},
			async:true,success:function(msg){
				
				console.log(msg);
				if(msg==1){
					$('#toastcontainer').html('<div class="toast toast--green"><div class="toast__icon"><svg version="1.1" class="toast__svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">\
							<g><g><path d="M504.502,75.496c-9.997-9.998-26.205-9.998-36.204,0L161.594,382.203L43.702,264.311c-9.997-9.998-26.205-9.997-36.204,0    c-9.998,9.997-9.998,26.205,0,36.203l135.994,135.992c9.994,9.997,26.214,9.99,36.204,0L504.502,111.7    C514.5,101.703,514.499,85.494,504.502,75.496z"></path>\
								</g></g>\
								</svg>\
							  </div>\
							  <div class="toast__content">\
								<p class="toast__type">成功</p>\
								<p class="toast__message">已完成购买。</p>\
							  </div>\
							  <div class="toast__close">\
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.642 15.642" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 15.642 15.642">\
							  <path fill-rule="evenodd" d="M8.882,7.821l6.541-6.541c0.293-0.293,0.293-0.768,0-1.061  c-0.293-0.293-0.768-0.293-1.061,0L7.821,6.76L1.28,0.22c-0.293-0.293-0.768-0.293-1.061,0c-0.293,0.293-0.293,0.768,0,1.061  l6.541,6.541L0.22,14.362c-0.293,0.293-0.293,0.768,0,1.061c0.147,0.146,0.338,0.22,0.53,0.22s0.384-0.073,0.53-0.22l6.541-6.541  l6.541,6.541c0.147,0.146,0.338,0.22,0.53,0.22c0.192,0,0.384-0.073,0.53-0.22c0.293-0.293,0.293-0.768,0-1.061L8.882,7.821z"></path>\
							</svg>\
							  </div>\
							</div>');
				}else if(msg==2){
					$('#toastcontainer').html('<div class="toast toast--yellow add-margin">\
						  <div class="toast__icon">\
						<svg version="1.1" class="toast__svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 301.691 301.691" style="enable-background:new 0 0 301.691 301.691;" xml:space="preserve">\
						<g>\
							<polygon points="119.151,0 129.6,218.406 172.06,218.406 182.54,0  "></polygon>\
							<rect x="130.563" y="261.168" width="40.525" height="40.523"></rect>\
						</g>\
							</svg>\
						  </div>\
						  <div class="toast__content">\
							<p class="toast__type">失败</p>\
							<p class="toast__message">余额不足。</p>\
						  </div>\
						  <div class="toast__close">\
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.642 15.642" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 15.642 15.642">\
						  <path fill-rule="evenodd" d="M8.882,7.821l6.541-6.541c0.293-0.293,0.293-0.768,0-1.061  c-0.293-0.293-0.768-0.293-1.061,0L7.821,6.76L1.28,0.22c-0.293-0.293-0.768-0.293-1.061,0c-0.293,0.293-0.293,0.768,0,1.061  l6.541,6.541L0.22,14.362c-0.293,0.293-0.293,0.768,0,1.061c0.147,0.146,0.338,0.22,0.53,0.22s0.384-0.073,0.53-0.22l6.541-6.541  l6.541,6.541c0.147,0.146,0.338,0.22,0.53,0.22c0.192,0,0.384-0.073,0.53-0.22c0.293-0.293,0.293-0.768,0-1.061L8.882,7.821z"></path>\
						</svg>\
						  </div>\
						</div>');
				}
				else{
					$('#toastcontainer').html('<div class="toast toast--yellow add-margin">\
						  <div class="toast__icon">\
						<svg version="1.1" class="toast__svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 301.691 301.691" style="enable-background:new 0 0 301.691 301.691;" xml:space="preserve">\
						<g>\
							<polygon points="119.151,0 129.6,218.406 172.06,218.406 182.54,0  "></polygon>\
							<rect x="130.563" y="261.168" width="40.525" height="40.523"></rect>\
						</g>\
							</svg>\
						  </div>\
						  <div class="toast__content">\
							<p class="toast__type">失败</p>\
							<p class="toast__message">购物车发生变动。</p>\
						  </div>\
						  <div class="toast__close">\
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15.642 15.642" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 15.642 15.642">\
						  <path fill-rule="evenodd" d="M8.882,7.821l6.541-6.541c0.293-0.293,0.293-0.768,0-1.061  c-0.293-0.293-0.768-0.293-1.061,0L7.821,6.76L1.28,0.22c-0.293-0.293-0.768-0.293-1.061,0c-0.293,0.293-0.293,0.768,0,1.061  l6.541,6.541L0.22,14.362c-0.293,0.293-0.293,0.768,0,1.061c0.147,0.146,0.338,0.22,0.53,0.22s0.384-0.073,0.53-0.22l6.541-6.541  l6.541,6.541c0.147,0.146,0.338,0.22,0.53,0.22c0.192,0,0.384-0.073,0.53-0.22c0.293-0.293,0.293-0.768,0-1.061L8.882,7.821z"></path>\
						</svg>\
						  </div>\
						</div>');
				}
			jQuery('.toast__close').click(function(e){
    e.preventDefault();
    var parent = $(this).parent('.toast');
    parent.fadeOut("slow", function() { $(this).remove(); } );
	
  });
			setTimeout(location.reload(),2000);	
			},
			error:function(err){console.log(err);}});	

}

</script>
	</div>
	</body>
<html>