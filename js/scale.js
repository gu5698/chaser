function doFirst() {
    scale = 1;
    document.getElementById('scaleBigger').addEventListener('click', bigger);
    document.getElementById('scaleSmaller').addEventListener('click', smaller);





    // =========================canvas 放大 縮小 start===================================================
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


    function drawSmallImg(){
        setTimeout(() => {
            let picPositionImg  = document.getElementById('pic_position_img');


            let offsetX = picDropPostion.offsetLeft + picPositionImg.offsetLeft;
            let offsetY = picDropPostion.offsetTop + picPositionImg.offsetTop;

            ctx.translate(picPositionImg.width / -2,picPositionImg.height / -2);
            ctx.drawImage(picPositionImg,offsetX,offsetY,picPositionImg.width * scale,picPositionImg.height * scale); //drawImage(img,x,y,width,height)
            ctx.translate(picPositionImg.width / 2,picPositionImg.height / 2);
        }, 100);
    }

    function drawSmallImgScale(){
        setTimeout(() => {
            let picPositionImg  = document.getElementById('pic_position_img');
            let offsetX = picDropPostion.offsetLeft + picPositionImg.offsetLeft;
            let offsetY = picDropPostion.offsetTop + picPositionImg.offsetTop;

            // console.log(window.getComputedStyle(picPositionImg).width, picPositionImg.width);

            ctx.translate(picPositionImg.width / -2,picPositionImg.height / -2);
            ctx.drawImage(picPositionImg,offsetX + (picPositionImg.width - picPositionImg.width * scale) / 2,offsetY + (picPositionImg.width - picPositionImg.width * scale) / 3,picPositionImg.width * scale,picPositionImg.height * scale); //drawImage(img,x,y,width,height)
            ctx.translate(picPositionImg.width / 2,picPositionImg.height / 2);
        }, 100);
    }


    let picDropPostion = document.getElementById('pic_dropPostion');

    image01.addEventListener('dragend',function(){
        drawMainImg();
        drawSmallImg();
    });

    image02.addEventListener('dragend',function(){
        drawMainImg();
        drawSmallImg();

    });

    image03.addEventListener('dragend',function(){
        drawMainImg();
        drawSmallImg();        
    });
    // ==============================canvas 放大 縮小 end==============================================



    function bigger() {
        var img = document.getElementById('pic_position_img');
        if (scale < 1.2) {
            scale += 0.1;
            img.style.transform = "scale(" + scale + ")";
            // test canvas

            drawMainImg();
            drawSmallImgScale();
        }
    }
    
    function smaller() {
        var img = document.getElementById('pic_position_img');
        if (scale > 0.6) {
            scale -= 0.1;
            img.style.transform = "scale(" + scale + ")";
    
            drawMainImg();
            drawSmallImgScale();
        }
    }
}


window.addEventListener("load", doFirst);