// 眼鏡本體的img
// function loadImage(){
//   var canvas = document.getElementById("myCanvas");
//   var ctx = canvas.getContext("2d"); 
//   var img = new Image();
//   img.onload = function(){
//     //ctx.translate(50, 50);
//     //ctx.rotate(0.5); 
//     ctx.drawImage(img,0,0,305,99); //drawImage(img,x,y,width,height)
//   }
//   img.src = document.getElementById("srcImg").src;
// }

// 眼鏡客製化logo的部份img
// function loadImage2(){
//   var canvas = document.getElementById("myCanvas");
//   var ctx = canvas.getContext("2d"); 
//   var img = new Image();
//   img.onload = function(){
//     ctx.drawImage(img,23,25,61,25);  
//   }  
//   img.src = document.getElementById("pic_position_img").src;
// }

// 儲存文件的function
function saveImage() {
  var canvas = document.getElementById("myCanvas");
  var dataURL = canvas.toDataURL("image/png");
  document.getElementById('hidden_data').value = dataURL;
  var formData = new FormData(document.forms["form1"]);
 
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'producttempimg.php', true);
    // 訊息：用來測試canvas截圖是否有成功
  // xhr.onreadystatechange = function() {
  //     if (xhr.readyState == 4) {
  //           if( xhr.status == 200 ){
  //             alert('Succesfully uploaded');  
  //           }else{
  //             alert(xhr.status);
  //           }
  //     }
  // };
  xhr.send(formData);
}

// cuProduct 內 商品imgID
// window.addEventListener("load", function () {
//   loadImage();
// })




// 用javascript 設定canvas的寬高
// (function() {
//   var canvas = document.getElementById('myCanvas'),
//           context = canvas.getContext('2d');

//   // resize the canvas to fill browser window dynamically
//   window.addEventListener('resize', resizeCanvas, false);

//   function resizeCanvas() {
//           canvas.width = window.innerWidth;
//           canvas.height = window.innerHeight;
//           // canvas.width = window.outerWidth
//           // canvas.width = '100%';
//           // canvas.width = '700px';
//           // canvas.height = '500px';
        
//           /**
//            * Your drawings need to be inside this function otherwise they will be reset when 
//            * you resize the browser window and the canvas goes will be cleared.
//            */
//           drawStuff(); 
//   }
//   resizeCanvas();
//   function drawStuff() {
//           // do your drawing stuff here
//   }
// })();