 //調整圖片大小
//  window.onload = resizeImages;
//  window.onresize = resizeImages;

//  function resizeImages() {
//      $(function (e) {
//          var screenWeight = document.documentElement.clientWidth;
//          var screenHeight = document.documentElement.clientHeight;
//          $(".pageImg").css("width",screenWeight);
//          $(".pageImg").css("height",screenHeight);
//          $("#pageUl").css("bottom", screenHeight >> 1);
//      });
//  }
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


//滾輪index
// var index = scrollFun(event);
// console.log(scrollFun());

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
             return index;
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
             return index;
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
        // $(".barimg").removeClass('border');

        // $(".barimg").css('filter','brightness(70%)');
        // $("#img"+index).css('filter','brightness(100%)');
     }
 }

//一開始就到中間商品
 // window.onload = function(){
 //  pageTo = Math.round(pageNum/2);
 //  toPage(pageTo);
 //  index = pageTo;
 //  var slideHeight = $('#mall_slider ul li').height();
 //  $('#slider_ul').css('top',-slideHeight*2+'px');
 //  return index;
 // }

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
          $('#slider_ul').animate({
              top: + slideHeight
          }, 300, function () {
              $('#slider_ul li:last-child').prependTo('#slider_ul');
              $('#slider_ul').css('top', '');
          });
      };
  
      function moveNext() {
          $('#slider_ul').animate({
              top: - slideHeight
          }, 300, function () {
              $('#slider_ul li:first-child').appendTo('#slider_ul');
              $('#slider_ul').css('top', '');
          });
      };
  
      $('.control_prev').click(function () {
          movePre();
          // index--;
          // toPage(index)
      });
  
      $('.control_next').click(function () {
          moveNext()
          // index++;
          // toPage(index)
      });
  });

//獲得id值
var iid;
$('.barimg').click(function(){
  iid = $(this).data("iid");
  console.log(iid);
});

var capa_attr = [30,40,70,50,90];
genChart();
//barimg click
var barimg = document.querySelectorAll('.barimg');
var barcount = barimg.length;
for(var i = 0;i<barcount;i++){
    barimg[i].index = i;
    barimg[i].onclick = function(){
        index = this.index + 1;
        toPage(this.index + 1);
        console.log(index);

            let xhr = new XMLHttpRequest();
            xhr.onload = () =>{
              if(xhr.responseText == 'not found'){
                console.log('not found');
              }else if(xhr.responseText == 'error'){
                console.log('系統錯誤');
              }else{ //回傳
                // console.log('result', xhr.responseText);
                capa_attr = xhr.responseText.split(",");
                console.log('capa_attr', capa_attr);
                genChart();
              }
            }
            //設定好所要連結的程式
            var url = "changeChart.php";
            xhr.open("POST", url, true);
            
            //送出資料
            var id = `index=${iid}`;
            xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
            xhr.send(id);
    }
}

// $('.barimg').click(function(){
//   $(this).addClass('border');
// })

//能力圖
function genChart(){
  Chart.defaults.global.defaultFontColor = '#fdd084'; 
  Chart.defaults.global.defaultFontSize = 0;
  var ctx = document.getElementById('mall_mychart').getContext('2d');
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'radar',

    // The data for our dataset
    data: {
        labels: ["攻擊", "防禦", "速度", "耐久", "隱匿"],
        datasets: [
            {
            label: '',
            data: [0, 100],
            },
            {
            label: '',
            backgroundColor: 'rgba(116,210,161,.6)',
            borderColor:'#74D2A1',
            borderWidth:3,
            data: capa_attr,
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
        legend:{
            display:false,
        },
        tooltips:{
            enabled:false,
        }
      }
  });

}

//科技圓圈
TweenMax.fromTo('#mall_main .circle1-1',10,{
    rotation:360
},{
    rotation:0,
    repeat:-1,
    ease: Power0.easeNone,
})
TweenMax.fromTo('#mall_main .circle1-2',10,{
    rotation:0
},{
    rotation:360,
    repeat:-1,
    ease: Power0.easeNone,
})
TweenMax.fromTo('#mall_main .circle2',12,{
    rotation:0
},{
    rotation:360,
    repeat:-1,
    ease: Power0.easeNone,
})
// TweenMax.fromTo('#mall_main .circle3',10,{
//     rotation:0
// },{
//     rotation:360,
//     repeat:-1,
//     ease: Power0.easeNone,
// })
TweenMax.fromTo('#mall_main .circle4',10,{
    rotation:360
},{
    rotation:0,
    repeat:-1,
    ease: Power0.easeNone,
})
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
var door = document.getElementById('mall_door');
door.addEventListener("animationend",function(){
    door.style.display = 'none';
})

//control_bar
window.addEventListener("load", function(){
	document.getElementById("control_bar").onclick=function(){
		var control = document.getElementById("control_bar");
        control.classList.toggle("hide_control");
        var bar = document.getElementsByClassName('mall_bar');
        bar[0].classList.toggle('hide_bar');
        var triangle = document.querySelector('#control_bar .triangle');
        triangle.classList.toggle('hide_triangle');
	};
})

//購買數量增減
$(document).ready(function(){
  var val = 1;

  $('.fa-plus').click(function(){
    var oldamount = $(this).siblings('.mall_amount').val();
    if(oldamount<99){
      var newamount = parseInt(oldamount) + 1;
    }else{
      newamount = 99;
    }
    $(this).siblings('.mall_amount').val(newamount);

    if(newamount != 1){
      $(this).siblings('.fa-minus').css('color','#fdd084');
    }
  });

  $('.fa-minus').click(function(){
    var oldamount = $(this).siblings('.mall_amount').val();
    if(oldamount>1){
      var amount = parseInt(oldamount) - 1;
    }else{
      amount = 1;
    }
    $(this).siblings('.mall_amount').val(amount);

    if(amount == 1){
      $(this).css('color','#ccc');
    }
  });

  $('.mall_amount').keyup(function(){
     if(parseInt($(this).val()) < 1){
        $(this).val(1);
    }else if(parseInt($(this).val()) > 99){
        $(this).val(99);
    }
  });
})

//RWD
if($(window).width()<768){
    $('.hide_bar .barimg').removeClass('border');
    $('.mall_bar').removeClass('dd_bar');
}
