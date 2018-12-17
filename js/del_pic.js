
function doFirst(){
    var del_btn = document.getElementById('del_btn');
    del_btn.addEventListener('click',del_position_img);
}
function del_position_img(){
    del_img = document.getElementById('pic_position_img');
    var scale = 1;
    del_img.style.transform = "scale(" + scale + ")";
    del_img.remove();
}


window.addEventListener('load',doFirst);