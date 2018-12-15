function doFirst(){
    scale = 1;
    document.getElementById('scaleBigger').addEventListener('click',bigger);
    document.getElementById('scaleSmaller').addEventListener('click',smaller);
}

function bigger(){
    var img = document.getElementById('pic_position_img');
    if(scale < 1.2){
        scale+=0.1;
        img.style.transform = "scale(" + scale +")";
    }
}

function smaller(){
    var img = document.getElementById('pic_position_img');
    if(scale > 0.6){
        scale-=0.1;
        img.style.transform = "scale(" + scale +")";
    }
}

window.addEventListener("load",doFirst);