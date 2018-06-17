function yanzhengma(){
	yzm = parseInt(Math.random()*8999)+1000;
	document.getElementById('yanzhengma').innerHTML = yzm;
}
function loginSubmit(){
	var fname = document.getElementById('username').value;
	var fpass = document.getElementById('password').value;
	if(document.getElementById('cnumber').value==yzm){
		
		
		if(fname==""){
			$('#notice').html("用户名不可为空！");
		}
		else if(fpass == ""){
			$('#notice').html("密码不可为空！");
		}
		else{
			$.ajax({type:'POST',url:'login-check.php',data:{'username':fname,'password':fpass},
			async:true,success:function(msg){
				console.log(msg);
				if(msg == 1){ret();}
				else if(msg == 2){$('#notice').html("用户名不存在！");}
				else{$('#notice').html("密码错误！");}
			},failure:function(){console.log('failed!');}});
			
		}
	}
	else{$('#notice').html("验证码错误！");}
	yanzhengma();
}

var yzm;
$('#notice').html('');
yanzhengma();





