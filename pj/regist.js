function judge1(){
let input1 = document.getElementById('username').value;
judges[0] = false;
	if((input1.length)==0){
		document.getElementById('n1').innerHTML = "此项不得为空";
	}
	else if((input1.length)<6){
		document.getElementById('n1').innerHTML = "用户名需要大于6位";
	}
	else if (t1.test(input1)){
		document.getElementById('n1').innerHTML = "用户名不得为纯数字";
		
	}	else if (t2.test(input1)){
		document.getElementById('n1').innerHTML = "用户名不得为纯字母";
		
	}
	else{
		document.getElementById('n1').innerHTML = "";
		judges[0] = true;
	}
}
function judge2(){
let input2 = document.getElementById('password').value;
judges[1] = false;
	if((input2.length)==0){
		document.getElementById('n2').innerHTML = "此项不得为空";
	}
	else if((input2.length)<6){
		document.getElementById('n2').innerHTML = "密码需要大于6位";
	}
	else if(input2==document.getElementById('username').value){
		document.getElementById('n2').innerHTML = "密码不能和用户名相同";
	}	
	
		else{
		document.getElementById('n2').innerHTML = "";
		judges[1] = true;
	}
}
function judge3(){
let input3 = document.getElementById('confirm-password').value;
judges[2] = false;

	if((input3.length)==0){
		document.getElementById('n3').innerHTML = "此项不得为空";
	}
	else if(input3!==document.getElementById('password').value){
		document.getElementById('n3').innerHTML = "两次密码输入不一致";
	}	
		else{
		document.getElementById('n3').innerHTML = "";
		judges[2] = true;
	}
}
function judge4(){
let input4 = document.getElementById('email').value;
judges[3] = false;

	if((input4.length)==0){
		document.getElementById('n4').innerHTML = "此项不得为空";
	}
	else if(input4.indexOf("@")<0){
		document.getElementById('n4').innerHTML = "格式为xxx@xxx";
	}	
		else{
		document.getElementById('n4').innerHTML = "";
		judges[3] = true;
	}
}
function judge5(){
let input4 = document.getElementById('tel').value;
judges[4] = false;

	if((input4.length)==0){
		document.getElementById('n5').innerHTML = "此项不得为空";
	}
		else{
		document.getElementById('n5').innerHTML = "";
		judges[4] = true;
	}
}
function judge6(){
let input4 = document.getElementById('addr').value;
judges[5] = false;
	if((input4.length)==0){
		document.getElementById('n6').innerHTML = "此项不得为空";
	}
		else{
		document.getElementById('n6').innerHTML = "";
		judges[5] = true;
	}
}
function mySubmit(){
	for(let i = 0;i<6;i++){
		if(!judges[i])
			return;
		$.ajax({type:'POST',url:'regist-check.php',data:{'username':$('#username').val(),
		'password':$('#password').val(),'confirm-password':$('#confirm-password').val(),
		'email':$('#email').val(),'tel':$('#tel').val(),'addr':$('#addr').val()},
			async:true,success:function(msg){
				console.log(msg);
				if(msg == 1){window.location="index.php";}
				else{$('#notice').html("用户名已存在！");}
			},failure:function(){console.log('failed!');}});
	}
}
let t1 = /^[0-9]*$/;
let t2 = /^[a-zA-Z]*$/;
let judges = new Array(6);
for(let i = 0;i<6;i++){
		judges[i]=false;
	}