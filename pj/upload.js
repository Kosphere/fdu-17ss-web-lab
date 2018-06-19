function judge1(){
let input1 = document.getElementById('username').value;
judges[0] = false;
	if((input1.length)==0){
		document.getElementById('n1').innerHTML = "此项不得为空";
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
	else if(input4 != Math.floor(input4)){
		
		document.getElementById('n4').innerHTML = "此项必须是整数";
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
	}else if(!(input4 > 0)){
		document.getElementById('n6').innerHTML = "此项必须是正数";
	}
		else{
		document.getElementById('n6').innerHTML = "";
		judges[5] = true;
	}
}
function judge7(){
let input4 = document.getElementById('height').value;
judges[6] = false;
	if((input4.length)==0){
		document.getElementById('n7').innerHTML = "此项不得为空";
	}else if(!(input4 > 0)){
		document.getElementById('n7').innerHTML = "此项必须是正数";
	}
		else{
		document.getElementById('n7').innerHTML = "";
		judges[6] = true;
	}
}
function judge8(){
let input4 = document.getElementById('price').value;
judges[7] = false;
	if((input4.length)==0){
		document.getElementById('n8').innerHTML = "此项不得为空";
	}else if((!(input4 > 0))||(input4 != Math.floor(input4))){
		document.getElementById('n8').innerHTML = "此项必须是正数";
	}
		else{
		document.getElementById('n8').innerHTML = "";
		judges[7] = true;
	}
}
function judge9(){
let input4 = document.getElementById('input-img').value;
judges[8] = false;
	if((input4.length)==0){
		document.getElementById('n9').innerHTML = "此项不得为空";
	}
		else{
		document.getElementById('n9').innerHTML = "";
		judges[8] = true;
	}
}
function mySubmit(){
	for(let i = 0;i<9;i++){
		if(!judges[i])
			return;
		document.getElementById('inputs').submit();
		// $.ajax({type:'POST',url:'upload-check.php',data:{'title':$('#username').val(),
		// 'artist':$('#password').val(),'description':$('#confirm-password').val(),
		// 'year':$('#email').val(),'genre':$('#tel').val(),'width':$('#addr').val(),
		// 'height':$('#height').val(),'price':$('#price').val(),'image':$('#input-img').val(),'refresh':refresh},
			// async:true,success:function(msg){
				// if(msg==0){$('#notice').html("上传失败！");}
				// else{window.location="item-info?id="+msg;}
			// },failure:function(){console.log('failed!');}});
	}
}
let t1 = /^[0-9]*$/;
let t2 = /^[a-zA-Z]*$/;
let judges = new Array(6);
for(let i = 0;i<9;i++){
		judges[i]=false;
	}