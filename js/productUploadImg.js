
function doFirst() {
    // document.querySelectorAll("upload_pic").find('input').value('');
  
    document.getElementById('uploadPic').onchange = fileChange;
    // onchange 在元素值改變時觸發。屬性適用於：<input>、<textarea> 以及 <select> 元素。


    // ============================================================================
    let cuProduct = document.getElementById('cuProduct');

    let cuProductWidth = parseInt(window.getComputedStyle(cuProduct).width);
    // window.getComputedStyle() 方法可以得到元素於套用啟用之樣式表以及解析其中可能包含的任何基本運算後的所有 CSS 屬性值。
    let cuProductHeight = parseInt(window.getComputedStyle(cuProduct).height);

    // console.log(cuProductWidth, cuProductHeight);

    let myCanvas = document.getElementById('myCanvas');
    let ctx = myCanvas.getContext("2d"); 
    // console.log(myCanvas);

    myCanvas.width = cuProductWidth;
    myCanvas.height = cuProductHeight;


    function drawMainImg(){
        ctx.clearRect(0,0,myCanvas.width,myCanvas.height);
        // clearRect() 方法清空畫布

        let img = new Image();
        img.onload = function(){
            ctx.drawImage(img,0,0,myCanvas.width,myCanvas.height); //drawImage(img,x,y,width,height)
        }
        img.src = document.getElementById("cuShow").src;
    }



    let picDropPostion = document.getElementById('pic_dropPostion');
    let uploadPic = document.getElementById('uploadPic');

    uploadPic.addEventListener('change',function(){
        drawMainImg();
        
        setTimeout(() => {
            let picPositionImg2 = document.getElementById('pic_position_img');
            console.log(picPositionImg2);
            

            let offsetX = picDropPostion.offsetLeft + picPositionImg2.offsetLeft;
            let offsetY = picDropPostion.offsetTop + picPositionImg2.offsetTop;
            
            ctx.translate(picPositionImg2.width / -2,picPositionImg2.height / -2);
            ctx.drawImage(picPositionImg2,offsetX,offsetY,picPositionImg2.width * scale,picPositionImg2.height * scale); //drawImage(img,x,y,width,height)
            ctx.translate(picPositionImg2.width / 2,picPositionImg2.height / 2);
        }, 100);
    });
    // ============================================================================
}

function delePicPositionImg() {
    var picPositionImg = document.getElementById('pic_position_img');
    picPositionImg.parentNode.removeChild(picPositionImg);
    // 移除 在 pic_dropPostion 裡面的 pic_position_img
}

function fileChange() {
    var file = document.getElementById('uploadPic').files[0];
    var readfile = new FileReader();
    // FileReader 處理要非同步讀取的圖檔並跟 img 元素連接。

    readfile.readAsDataURL(file);
    // 即將被讀取的 Blob 或 File 對象。

    readfile.addEventListener('load', function () {
        var picDropPosition = document.getElementById('pic_dropPostion');
        // 決定上團圖片陂置放的位置

        if (picDropPosition.childNodes[0] != null) {
            //此判斷式是為確 定 id="pic_dropPostion" 裡面是否有其它節點若有即移除

            delePicPositionImg()
            // / 移除 在 pic_dropPostion 裡面的 pic_position_img   

            var uploadImg = document.createElement("img");
            // Document.createElement() 方法可以依指定的標籤名稱（tagName）建立 HTML 元素 img

            uploadImg.setAttribute('id', 'pic_position_img');
            // 利用setAttribute 給予id屬性 與id名稱

            picDropPosition.appendChild(uploadImg);
            uploadImg.src = this.result;
            // event.result屬性包含由指定事件觸發的事件處理程序返回的最後/上一個值。
            
        } else {
            var uploadImg = document.createElement("img");
            // Document.createElement() 方法可以依指定的標籤名稱（tagName）建立 HTML 元素 img

            uploadImg.setAttribute('id', 'pic_position_img');
            // 利用setAttribute 給予id屬性 與id名稱

            picDropPosition.appendChild(uploadImg);
            uploadImg.src = this.result;
            // event.result屬性包含由指定事件觸發的事件處理程序返回的最後/上一個值。
        
        }

        
    });
}
window.addEventListener('load', doFirst);

