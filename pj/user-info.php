<!DOCTYPE html>
<?php session_start(); 
if(!isset($_SESSION['id']))
	echo"<script>window.location.href='login.php?url='+window.location.href</script>";
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
					<?php
						$sql = "select * from customerlogon where customerID = ".$_SESSION['id'];
						$result = mysqli_query($connection, $sql);
						$row = $result->fetch_assoc();
						echo '<p>用户：'.$row['UserName'].'</p>';
						$sql = "select * from customers where customerID = ".$_SESSION['id'];
						$result = mysqli_query($connection, $sql);
						$row = $result->fetch_assoc();
						echo'
					<p>电话：'.$row['Phone'].'</p>
					<p>邮箱：'.$row['Email'].'</p>
					<p>地址：'.$row['Address'].'</p>
					<p id = "balance">余额：$'.$row['balance'].'</p>
					<p>';
					?>
					
					<input type = "text" id = "cost"/><br/><br/>
					<a href = "#" onclick = "cost();"class = "rounded" >充值信仰</a>
					
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
					<td class = "td1">订单编号</td><td class = "td2">商品名称
					</td><td class = "td2">订单时间</td><td class = "td3">订单金额</td>
					</tr>
					<?php
						$sql = "select * from orders where customerID = ".$_SESSION['id'];
						$result = mysqli_query($connection, $sql);
						while($row = $result->fetch_assoc()){
							
						echo '<tr>
					<td class = "td1">'.$row['OrderID'].'</td><td class = "td2">';
					$sql = "select * from orderdetails where orderID = ".$row['OrderID'];
						$result2 = mysqli_query($connection, $sql);
						while($row2 = $result2->fetch_assoc()){
							$sql = "select * from artworks where artworkID = ".$row2['PaintingID'];
							$result3 = mysqli_query($connection, $sql);
							$row3 = $result3->fetch_assoc();
							echo '<a href = "item-info.php?id='.$row3['artworkID'].'">'.$row3['title'].'</a><br/>';
						}
					echo'</td><td class = "td2">'.$row['DateStarted'].'</td><td class = "td3">$'.$row['price'].'</td>
					</tr>';
						}
					?>
					

					</table>
					</div>
					<div class = "user-info">
					我卖出的艺术品：
					<table>
					
					<tr>
					<td class = "td2">商品名称
					</td><td class = "td2">订单时间</td><td class = "td3">订单金额</td><td class = "td1">购买人</td>
					<td class = "td2">地址</td><td class = "td3">电话</td><td class = "td2">邮箱</td>
					</tr>
					<?php
						$sql = "select * from orderdetails where ownerID = ".$_SESSION['id'];
						$result = mysqli_query($connection, $sql);
						while($row = $result->fetch_assoc()){
							$sql = "select * from orders where orderID = ".$row['OrderID'];
							$result2 = mysqli_query($connection, $sql);
							$row2 = $result2->fetch_assoc();
						echo '<tr><td>';
					
					
						
							$sql = "select * from artworks where artworkID = ".$row['PaintingID'];
							$result3 = mysqli_query($connection, $sql);
							$row3 = $result3->fetch_assoc();
							echo '<a href = "item-info.php?id='.$row3['artworkID'].'">'.$row3['title'].'</a>';
						
					echo'</td><td class = "td2">'.$row2['DateStarted'].'</td><td class = "td3">$'.$row3['price'].'</td>
					';
					$sql = "select * from customerlogon where customerID = ".$row2['CustomerID'];
							$result3 = mysqli_query($connection, $sql);
							$row3 = $result3->fetch_assoc();
							echo'<td class = "td2">'.$row3['UserName'].'</td>';
							$sql = "select * from customers where customerID = ".$row2['CustomerID'];
							$result3 = mysqli_query($connection, $sql);
							$row3 = $result3->fetch_assoc();
							echo'<td class = "td2">'.$row3['Address'].'</td>
							<td class = "td2">'.$row3['Phone'].'</td>
							<td class = "td2">'.$row3['Email'].'</td></tr>';
						}
					?>
					

					</table>
					</div>

				</div>
			</div>
			<div class = "footer">
					&copy Produced by 17302010003
			</div>		

			
		</div>
	<script>
	function cost(){
		$.ajax({type:'POST',url:'cost.php',data:{'add':$('#cost').val()},
			async:true,success:function(msg){
					$('#balance').html(msg);
				

			},
			failure:function(){console.log('failed!');}});}</script>
	</body>
<html>