function scrollWin() {
    var ScreenWidth = document.body.clientWidth;
    var pos = 0;
    if(ScreenWidth >= 768){
        var delay = setTimeout(function move(){
        var timer = setInterval(move,5);
        function move(){
            if (pos == 170){
            clearInterval(timer);
        }else{
            pos++
            window.scrollTo(0,pos);
        }

        }
        },1000);
    }
    
}
window.addEventListener("load",scrollWin);