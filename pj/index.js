if(localStorage.getItem('pjhis1')==null){
	var arr = wname;
	var arr2 = window.location.href;
	localStorage.setItem('pjhis1',arr);
	localStorage.setItem('pjhis2',arr2);
	localStorage.setItem('pjhisn',1);
	var str = "你的足迹：";
	str = str + wname;
	document.getElementById('foot').innerHTML = str;
}
else{
	var steps = localStorage.getItem('pjhisn');

	var arr = localStorage.getItem('pjhis1');
	var arr2 = localStorage.getItem('pjhis2');
	var myarr = arr.split(",");
	var myarr2 = arr2.split(",");
	var str = "你的足迹：";
	for(var i =0;i<steps;i++){
		str = str+'<a href = "'+myarr2[i]+'">'+myarr[i]+'</a>'+'->';
	}
	arr = arr + "," + wname;
	arr2 = arr2 + "," + window.location.href;
	steps = parseInt(steps) + 1;
	localStorage.setItem('pjhis1',arr);
	localStorage.setItem('pjhis2',arr2);
	localStorage.setItem('pjhisn',steps);

	str = str + wname;
	document.getElementById('foot').innerHTML = str;
	
}
