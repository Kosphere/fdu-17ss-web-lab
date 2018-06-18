<div class = "header">
				<script type="text/javascript" src="jquery-3.3.1.js"></script>
				<div class = "nav-menu">
				
					<div class = "nav-dec">
						<div class = "signature">
							<img src = "images/LOGO.png">
							<p>ArtStore是国内最大的艺术品交易网站，没有中间商赚差价
							</p>
						</div>
					</div>

					<div class = "nav">
						
						<li class = "nav-index">
						<div class = "selected">
						</div>
						<a href = "index.php">首页</a>
						
						</li>
						<li class = "nav-search">
						<a href = "search.php">搜索</a>
						</li>
						<li class = "nav-cart">
							<a href = "cart.php">购物车</a>
							<div class = "hidden">
							<a href = "item-info.php"><img src = "images/works/square-small/001020.jpg"/></a>
							<a href = "item-info.php"><img src = "images/works/square-small/001050.jpg"/></a>
							</div>
						</li>
						<li class = "nav-item-info">
						<a href = "item-info.php">详情</a>
						</li>
						<?php

							if(isset($_SESSION['id'])){
								
								echo'<li class = "nav-login">
								<a class = "long-a" href = "user-info.php">个人中心</a>
								</li>
								<li class = "nav-regist">
								<a href = "#" onclick = "$.ajax({type:\'POST\',url:\'logout.php\',data:\'a=1\',async:true,success:function(){window.location=\'index.php\';}});">登出</a>
								</li>';
							}
							else{
								echo '<li class = "nav-login">
								<a href = "" id = "log">登陆</a>
								</li>
								<li class = "nav-regist">
								<a href = "regist.php">注册</a>
								</li>';
							}
							
							
						?>
					</div>
					
					<div class = "logo">
						<a href = "index.php"></a>
					</div>
					<div class = "search">
					<form method = "get" action ="search.php">
					<fieldset>
						<input type="text" id="input-search" name = "title" placeholder=""/>
						<button id = "bt-search" type = "submit">搜索
						</button>
						</fieldset>
					</form>
					</div>
					<script type="text/javascript">
					$("#log").attr('href',('login.php?url='+window.location.href));
					</script>
					
					<!--<div class="blur-bg" style="background-image: url('back.png');">gg</div>-->
				</div>

			

			</div>
			