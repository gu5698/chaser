var screenWidth = document.body.clientWidth;

function doFirst() {


	if (screenWidth >= 768) {
		//先跟HTML畫面產生關聯(尋找物件)
		//再建事件聆聽的功能

		// ---------圖一
		image01 = document.getElementById('drag_logo01');   //01
		image01.addEventListener('dragstart', startDrag01);   //dragstart拖曳事件開始
		image01.addEventListener('dragend', endDrag01);     //dragend拖曳事件結束

		dropPostion = document.getElementById('pic_dropPostion');  //註冊拖曳地
		// dropPostion.addEventListener('dragenter',function(e){e.preventDefault();});
		dropPostion.addEventListener('dragover', function (e) { e.preventDefault(); });  //停留時預防預設動作
		dropPostion.addEventListener('drop', dropped);  //drop放下事件,執行dropped函式

		function startDrag01(e) {
			var data = '<img src="images/customize/logo_1.png" alt="logo_1" id="pic_position_img">';
			e.dataTransfer.setData('image/jpeg', data);
		}
		function endDrag01() {
			// image01.style.visibility = 'hidden';
		}

		function dropped(e) {
			e.preventDefault();
			dropPostion.innerHTML = e.dataTransfer.getData('image/jpeg');
		}


		// ------圖二--------------------------------------------------------------------------



		image02 = document.getElementById('drag_logo02');
		image02.addEventListener('dragstart', startDrag02);   //dragstart拖曳事件開始
		image02.addEventListener('dragend', endDrag02);     //dragend拖曳事件結束

		dropPostion = document.getElementById('pic_dropPostion');  //註冊拖曳地
		// dropPostion.addEventListener('dragenter',function(e){e.preventDefault();});
		dropPostion.addEventListener('dragover', function (e) { e.preventDefault(); });  //停留時預防預設動作
		dropPostion.addEventListener('drop', dropped);  //drop放下事件,執行dropped函式

		function startDrag02(e) {
			var data = '<img src="images/customize/logo_2.png" alt="logo_2" id="pic_position_img">';
			e.dataTransfer.setData('image/jpeg', data);
		}
		function endDrag02() {
			// image02.style.visibility = 'hidden';
		}

		function dropped(e) {
			e.preventDefault();
			dropPostion.innerHTML = e.dataTransfer.getData('image/jpeg');
		}

		// ------圖三------------------------------------------------------------------------

		image03 = document.getElementById('drag_logo03');
		image03.addEventListener('dragstart', startDrag03);   //dragstart拖曳事件開始
		image03.addEventListener('dragend', endDrag03);     //dragend拖曳事件結束

		dropPostion = document.getElementById('pic_dropPostion');  //註冊拖曳地
		// dropPostion.addEventListener('dragenter',function(e){e.preventDefault();});
		dropPostion.addEventListener('dragover', function (e) { e.preventDefault(); });  //停留時預防預設動作
		dropPostion.addEventListener('drop', dropped);  //drop放下事件,執行dropped函式

		function startDrag03(e) {
			var data = '<img src="images/customize/logo_3.png" alt="logo_3" id="pic_position_img">';
			e.dataTransfer.setData('image/jpeg', data);
		}
		function endDrag03() {
			// image03.style.visibility = 'hidden';
		}

		function dropped(e) {
			e.preventDefault();
			dropPostion.innerHTML = e.dataTransfer.getData('image/jpeg');
		}
	}

	if (screenWidth <= 767) {
		//圖一
		var img01 = document.getElementById('drag_logo01');
		var putimg_position = document.getElementById('pic_dropPostion');
		img01.addEventListener('click', function () {
			putimg01 = document.createElement("img");
			putimg01.setAttribute("id", "pic_position_img");
			putimg01.src = "images/customize/logo_1.png";
			if(!(document.getElementById('pic_position_img'))){
				putimg_position.appendChild(putimg01);
			}
			
		});


		//圖二
		var img02 = document.getElementById('drag_logo02');
		var putimg_position = document.getElementById('pic_dropPostion');
		img02.addEventListener('click', function () {
			putimg02 = document.createElement("img");
			putimg02.setAttribute("id", "pic_position_img");
			putimg02.src = "images/customize/logo_2.png";
			if(!(document.getElementById('pic_position_img'))){
				putimg_position.appendChild(putimg02);
			}
			
		});

		//圖三
		var img03 = document.getElementById('drag_logo03');
		var putimg_position = document.getElementById('pic_dropPostion');
		img03.addEventListener('click', function () {
			putimg03 = document.createElement("img");
			putimg03.setAttribute("id", "pic_position_img");
			putimg03.src = "images/customize/logo_3.png";
			if(!(document.getElementById('pic_position_img'))){
				putimg_position.appendChild(putimg03);
			}
			
		});

	}

}
window.addEventListener('load', doFirst);