window.addEventListener("load",function(){
    var item = document.getElementsByClassName('item');
    var delay = setTimeout(showitem,1500)
    function showitem(){
        item[0].style.display = "block";
        item[1].style.display = "block";
        item[2].style.display = "block";
    }
})