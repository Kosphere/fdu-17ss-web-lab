function changepage(pagenumber){
	let sql2 = sql + " limit "+(pagenumber-1)*20+",20";
	a = $.ajax({type:'POST',url:'changepage.php',data:{'sql':sql2,'page':pagenumber,'rownumber':rownumber},
			async:true,success:function(msg){

				$('.display2').html(msg);
			},
			error:function(err){$('.display2').html(err.responseText);}});
	
			
}

