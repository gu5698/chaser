var scale = 1;
var pic_img = document.getElementById('pic_position_img');
var big_btn = document.getElementById('scaleBigger')
var small_btn = document.getElementById('scaleSmaller')
var delimg_btn = document.getElementById('del_btn');

function doFirst(){
// scale = 1;
// pic_img = document.getElementById('pic_position_img');
// big_btn = document.getElementById('scaleBigger')
// small_btn = document.getElementById('scaleSmaller')
// delimg_btn = document.getElementById('del_btn');

big_btn.addEventListener('click',bigger);
small_btn.addEventListener('click',smaller);
delimg_btn.addEventListener('click',delete_img);
}

function bigger(){
// var img = document.getElementById('pic_position_img');
if(scale < 1.2){
    scale+=0.1;
    pic_img.style.transform = "scale(" + scale +")";
}
}

function smaller(){
// var img = document.getElementById('pic_position_img');
if(scale > 0.6){
    scale-=0.1;
    pic_img.style.transform = "scale(" + scale +")";
}
}

function delete_img(){
// del_img = document.getElementById('pic_position_img');
scale = 1;
pic_img.style.transform = "scale(" + scale + ")";
pic_img.remove();
}

window.addEventListener("load",doFirst);