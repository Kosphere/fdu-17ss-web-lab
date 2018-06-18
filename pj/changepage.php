<?php
	header('Content-type:text/json;charset=utf-8');
	$sql=$_POST['sql'];
	$page =$_POST['page'];
	$rownumber = $_POST['rownumber'];
	$host = "localhost";
	$database = "art";
	$user = "root"; 
	$pass = "";
	$connection = mysqli_connect($host,$user,$pass,$database);
	$error = mysqli_connect_error(); 
	if ($error != null) {
		$output = "<p>Unable to connect to database<p>" . $error;
	exit($output);}
	$str = '';
	if($result = mysqli_query($connection, $sql)){
		while($row = $result->fetch_assoc()){
						if(strlen($row['description'])>700){
							$row['description'] = substr($row['description'],0,700).'......';
						}
							$str .= '<div class = "show">
									<a href = "item-info.php?id='.$row['artworkID'].'" style=\'background-image:url("img/'.$row['imageFileName'].'")\'></a>
									<div class = "description">
										<h4>'.$row['title'].'</h4>
										<h5>By '.$row['artist'].'</h5>
										<span class = "tiny">'.$row['description'].'</span>
										<a class = "login-bt" href = "item-info.php?id='.$row['artworkID'].'">
											learn more
										</a>
									</div>
								</div>';
							
						}
						$str .= '<div class = "page-bts">
					<ul class="page-ul">
						';
					for($i=1;$i<=$rownumber;$i++){
						if($page == $i)
							$str .='<li><a href="#" onclick = "changepage(this.innerHTML);" class = "active">'.$i.'</a></li>';
						else
							$str .='<li><a href="#" onclick = "changepage(this.innerHTML);">'.$i.'</a></li>';
					}
					$str .= '
					</ul>
					</div>';
					echo $str;
	}

		


?>