
function doFirst(){
    var del_btn = document.getElementById('del_btn');
    // del_btn.addEventListener('click',del_position_img);


    del_btn.addEventListener('click', function(){
        del_position_img();


        // ========canvas 刪除 start====================================================================
        let myCanvas = document.getElementById('myCanvas');
        let ctx = myCanvas.getContext("2d"); 
        ctx.clearRect(0,0,myCanvas.width,myCanvas.height);

        let img = new Image();
        img.onload = function(){
            //ctx.translate(50, 50);
            //ctx.rotate(0.5); 
            ctx.drawImage(img,0,0,myCanvas.width,myCanvas.height); //drawImage(img,x,y,width,height)
        }
        img.src = document.getElementById("cuShow").src;
        // ===========canvas 刪除 end=================================================================
    });


    function del_position_img(){
        del_img = document.getElementById('pic_position_img');
        var scale = 1;
        del_img.style.transform = "scale(" + scale + ")";
        del_img.remove();
    
    }


}



window.addEventListener('load',doFirst);