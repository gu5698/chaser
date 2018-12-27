//Lightbox
	$('#gogo').click(function(){
		$('#go').css('display','block');
	})
	$('#mall_close').click(function(){
		$('#go').css('display','none');
	})


//control
function control(){
	var form = document.getElementsByClassName('controlform');
	for(var i=0;i<form.length;i++){
		form[i].submit();
	}
	alert("上/下架成功");
}

//additemFile
// var myForm = document.getElementById('myForm');
// var image = document.getElementById('image');
// var formData = new FormData(myForm);

// image.addEventListener('change',function(){
// 	// formData.append("image", image.files[0]);
// 	console.log(...formData);
// })




// let xhr = new XMLHttpRequest();
// xhr.onload = () =>{
 
// }
// //設定好所要連結的程式
// var url = "additemFile.php";
// xhr.open("POST", url, true);
// //送出資料
// xhr.send(formData);
