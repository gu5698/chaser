 //調整圖片大小
 window.onload = resizeImages;
 window.onresize = resizeImages;

 function resizeImages() {
     $(function (e) {
         var screenWeight = document.documentElement.clientWidth;
         var screenHeight = document.documentElement.clientHeight;
         $(".pageImg").css("width",screenWeight);
         $(".pageImg").css("height",screenHeight);
         $("#pageUl").css("bottom", screenHeight >> 1);
     });
 }
 var index = 1;
 var curIndex = 1;
 var wrap = document.getElementById("mall_wrap");
 var main = document.getElementById("mall_main");
 var hei = document.body.clientHeight;
 wrap.style.height = hei + "px";
 var obj = document.getElementsByTagName("div");
 for (var i = 0; i < obj.length; i++) {
     if (obj[i].className == 'mall_page') {
         obj[i].style.height = hei + "px";
     }
 }
 var pageNum = document.querySelectorAll(".mall_page").length;

 var startTime = 0, //翻屏開始
     endTime = 0,
     now = 0;
 //瀏覽器兼容      
 if ((navigator.userAgent.toLowerCase().indexOf("firefox") != -1)) {
     document.addEventListener("DOMMouseScroll", scrollFun, false);
 } else if (document.addEventListener) {
     document.addEventListener("mousewheel", scrollFun, false);
 } else if (document.attachEvent) {
     document.attachEvent("onmousewheel", scrollFun);
 } else {
     document.onmousewheel = scrollFun;
 }

 //滾動事件處理
 function scrollFun(event) {
     startTime = new Date().getTime();
     var delta = event.detail || (-event.wheelDelta);
     //mousewheel事件中的 “event.wheelDelta” 屬性值：正值說明滾龍向上滾動
     //DOMMouseScroll事件中的 “event.detail” 屬性值：負值說明滾龍向上滾動
     if ((endTime - startTime) < -1000) {
         if (delta > 0 && parseInt(main.offsetTop) > -(hei * (pageNum - 1))) {
             //向下滾動
             index++;
             toPage(index);

             //搭配Gear
             
            //  TweenMax.fromTo('#mall_main .gear1',1,{
            //     rotation: 360,
            // },{
            //    rotation: 300,
            //    ease: Power3.easeOut,
            // })
            //  TweenMax.fromTo('#mall_main .gear2',1,{
            //     rotation: 300,
            //  },{
            //     rotation: 360,
            //     ease: Power3.easeOut,
            //  })
            //  TweenMax.fromTo('#mall_main .gear3',1,{
            //     rotation: 300,
            //  },{
            //     rotation: 360,
            //     ease: Power3.easeOut,
            //  })
            //  TweenMax.fromTo('#mall_main .gear4',1,{
            //     rotation: 360,
            //  },{
            //     rotation: 300,
            //     ease: Power3.easeOut,
            //  })
            //  //滾動向下搭配bar
            //  var bar = document.getElementById('bar');
            //  var imgs = bar.getElementsByClassName('pageimg');
            //  var first = imgs[0];
            //  bar.appendChild(first);
         }
         else if (delta < 0 && parseInt(main.offsetTop) < 0) {
             //向上滾動
             index--;
             toPage(index);

             //搭配Gear
            //  TweenMax.fromTo('#mall_main .gear1',1,{
            //     rotation:300,
            //  },{
            //     rotation:360,
            //     ease: Power4.easeOut,
            //  })
            //  TweenMax.fromTo('#mall_main .gear2',1,{
            //     rotation:360,
            //  },{
            //     rotation:300,
            //     ease: Power4.easeOut,
            //  })
            //  TweenMax.fromTo('#mall_main .gear3',1,{
            //     rotation: 360,
            //  },{
            //     rotation: 300,
            //     ease: Power3.easeOut,
            //  })
            //  TweenMax.fromTo('#mall_main .gear4',1,{
            //     rotation: 360,
            //  },{
            //     rotation: 300,
            //     ease: Power3.easeOut,
            //  })
            //  //向上滾動搭配bar
            //  var bar = document.getElementById('bar');
            //  var imgs = bar.getElementsByClassName('pageimg');
            //  var first = imgs[0];
            //  var last = imgs[imgs.length - 1];
            //  bar.insertBefore(last,first);
         }
         endTime = new Date().getTime();
     } else {
         event.preventDefault();
     }
 }

 function toPage(index) {
     //jquery動畫效果
     if(index!=curIndex){
         var delta=index - curIndex;
         now = now - delta * hei;        
         $("#mall_main").animate({
             top: (now + 'px')
         }, 1000);
         curIndex = index;
        //  //更改列表選項
        $(".barimg").removeClass('border');
        $("#img"+index).addClass('border');
        // $(".barimg").css('filter','brightness(70%)');
        // $("#img"+index).css('filter','brightness(100%)');
     }
 }
 //右側slider
 jQuery(document).ready(function ($) {
    // setInterval(function(){
    //   moveNext();
    // },2000)
      var slideCount = $('#mall_slider ul li').length;
      var slideWidth = $('#mall_slider ul li').width();
      var slideHeight = $('#mall_slider ul li').height();
      var sliderUlHeight = slideCount * slideHeight;

      $('#mall_slider').css('height',3*slideHeight);
      $('.mall_bar').css('height',3*slideHeight);
  
  
      $('#mall_slider').css({ width: slideWidth});
      
      $('#mall_slider ul').css({ hidth: sliderUlHeight ,marginTop: - slideHeight });
      
      $('#mall_slider ul li:last-child').prependTo('#mall_slider ul');
  
      function movePre() {
          $('#mall_slider ul').animate({
              top: + slideHeight
          }, 300, function () {
              $('#mall_slider ul li:last-child').prependTo('#mall_slider ul');
              $('#mall_slider ul').css('top', '');
          });
      };
  
      function moveNext() {
          $('#mall_slider ul').animate({
              top: - slideHeight
          }, 300, function () {
              $('#mall_slider ul li:first-child').appendTo('#mall_slider ul');
              $('#mall_slider ul').css('top', '');
          });
      };
  
      $('.control_prev').click(function () {
          movePre();
      });
  
      $('.control_next').click(function () {
          moveNext()
      });
  });    

 document.getElementById('img1').onclick = function(){
     toPage(1);
 }
 document.getElementById('img2').onclick = function(){
     toPage(2);
 }
 document.getElementById('img3').onclick = function(){
     toPage(3);
 }
 document.getElementById('img4').onclick = function(){
     toPage(4);
 }
 document.getElementById('img5').onclick = function(){
     toPage(5);
 }

//能力圖
Chart.defaults.global.defaultFontColor = '#fdd084'; 
Chart.defaults.global.defaultFontSize = 0;
 var ctx = document.getElementById('mall_mychart').getContext('2d');
	var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'radar',

    // The data for our dataset
    data: {
        labels: ["攻擊", "防禦", "隱匿", "耐久", "速度"],
        datasets: [{
            label: '',
            data: [0, 100],
            },
            {
            label: '',
            backgroundColor: 'rgba(116,210,161,.6)',
            borderColor:'#74D2A1',
            borderWidth:3,
            data: [80, 60, 80, 75, 90],
            pointStyle:'star',
            pointBorderColor:'#FFF',
        }]
    },

    // Configuration options go here
    options: {
        scale: {
            gridLines: { color: "#00fafc" },
            angleLines: { color: "#00fafc" },
            pointLabels: {
                fontSize: 15
              }
        },    
    }
    });

//科技圓圈
// TweenMax.fromTo('#mall_main .circle1-1',10,{
//     rotation:360
// },{
//     rotation:0,
//     repeat:-1,
//     ease: Power0.easeNone,
// })
// TweenMax.fromTo('#mall_main .circle1-2',10,{
//     rotation:0
// },{
//     rotation:360,
//     repeat:-1,
//     ease: Power0.easeNone,
// })
// TweenMax.fromTo('#mall_main .circle2',12,{
//     rotation:360
// },{
//     rotation:0,
//     repeat:-1,
//     ease: Power0.easeNone,
// })
// TweenMax.fromTo('#mall_main .circle3',10,{
//     rotation:0
// },{
//     rotation:360,
//     repeat:-1,
//     ease: Power0.easeNone,
// })
// TweenMax.fromTo('#mall_main .circle4',10,{
//     rotation:360
// },{
//     rotation:0,
//     repeat:-1,
//     ease: Power0.easeNone,
// })
// TweenMax.fromTo('#mall_main .circle5',10,{
//     rotation:0
// },{
//     rotation:360,
//     repeat:-1,
//     ease: Power0.easeNone,
// })


//triangle
TweenMax.fromTo('.mall_box .triangle',1,{
    x:0,
    opacity:1,
},{
    x:30,
    opacity:0,
    repeat:-1,
    ease: Power0.easeNone,
})

// //scroll
// TweenMax.to('#scroll_circle',1,{
//     y:70,
//     opacity:1,
//     repeat:-1,
//     ease: Power0.easeNone,
// })

//滑鼠移動觸發圖片浮動
if($(window).width()>767){
    var currentMousePos = { x: -1, y: -1 },
        wHeight= $(window).height(),
        wWidth= $(window).width();
    $(document).mousemove(function(event) {
    currentMousePos.x = event.pageX;
    currentMousePos.y = event.pageY;

    var around1 = (currentMousePos.y * 100 / wHeight * 0.3 - 25) + 'deg',
        around2 = -1 * (currentMousePos.x * 100 / wWidth * 0.3 - 25) + 'deg',
        trans1 = (currentMousePos.x * 100 / wHeight * 0.3 - 25) + 'px',
        trans2 = (currentMousePos.y * 100 / wHeight * 0.3 - 25) + 'px'

        $(".mall_bigImg img").css({
            "transform": "translate3d(" + trans1 + ", " + trans2 +", 0) scale(1) rotatex(" + around1 + ") rotatey(" + around2 + ")"
        });

    });
}

//door
var door = document.getElementsByClassName('mall_door');
door[0].addEventListener("animationend",function(){
    door[0].style.display = 'none';
})

//control_bar
window.addEventListener("load", function(){
	document.getElementById("control_bar").onclick=function(){
		var control = document.getElementById("control_bar");
        control.classList.toggle("hide_control");
        var bar = document.getElementsByClassName('mall_bar');
        bar[0].classList.toggle('hide_bar');
	};
})

//RWD
if($(window).width()<768){
    $('.hide_bar .barimg').removeClass('border');
    $('.mall_bar').removeClass('down_bar');
}
