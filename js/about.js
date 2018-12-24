
/********************************************************
                // about-datatransmission 動畫轉場//
*********************************************************/

    function hide_loader() {
        $("#aboutSection1").css('display', "none");
        // $("#aboutSection2").css('display', "block");
        $("#aboutSection2").removeClass("d-none");
    }

     $(window).ready(function () {//loading時執行這個function
        setTimeout(function () {
            hide_loader()
        }, 8500);
    }); 

   	
/********************************************************
                // about-palmprint-animation skip-button//
*********************************************************/
function skip(){
    // var aboutSkip = document.getElementById("about-skip");
    var as1 = document.getElementById("aboutSection1");
    var as2 = document.getElementById("aboutSection2");
    as1.style.display ="none";
    console.log(as2);
    as2.classList.remove("d-none");
    // as2.style.transition = "0.5s";
    console.log(as2);
    }
    
    window.addEventListener('click',skip);




/********************************************************
                // 動畫 - 指紋辨識//
*********************************************************/
// TweenMax.to('.about-palmprint', 1, {
TweenMax.fromTo('#about-palmprint', 1, {
    // width: 0,
    opacity: .3
}, {
        // width: 400,
        delay: .2,
        opacity: 1,
        // repeat: 1, //重複
    })

TweenMax.fromTo('#about-fingerscan1', 1, {
    // width: 0,
    opacity: 0,
}, {
        // width: 400,
        delay: 1.2,
        opacity: 0.7,
        scale: 1.2,
        repeat: 0, //重複
        // rotation: 360
    })

TweenMax.fromTo('#about-fingerscan2', 1, {
    // width: 0,
    opacity: 0
}, {
        // width: 400,
        delay: 1.7,
        opacity: 0.7,
        scale: 1.2,
        repeat: 0, //重複
        // rotation: 360
    })

TweenMax.fromTo('#about-fingerscan3', 1, {
    // width: 0,
    opacity: 0
}, {
        // width: 400,
        delay: 2.2,
        opacity: 0.7,
        scale: 1.2,
        repeat: 0, //重複
        // rotation: 360
    })

TweenMax.fromTo('#about-fingerscan4', 1, {
    // width: 0,
    opacity: 0
}, {
        // width: 400,
        delay: 2.7,
        opacity: 0.7,
        scale: 1.2,
        repeat: 0, //重複
        // rotation: 360
    })
TweenMax.fromTo('#about-fingerscan5', 1, {
    // width: 0,
    opacity: 0
}, {
        // width: 400,
        delay: 3.2,
        opacity: 0.7,
        scale: 1.2,
        repeat: 0, //重複
        // rotation: 360
    })

TweenMax.fromTo('#about-fingerscan-area', 1, {
    // width: 0,
    opacity: .1,

}, {
        rotation: 270,
        // width: 400,
        delay: 3.4,
        opacity: 0.7,
        repeat: 0, //重複

    })

TweenMax.fromTo('#about-alert-1', 1, {
    // scale: 0
    opacity: 0,
}, {
        // y: '+=50',
        // scaleX: 2,
        // scaleY: 1.2,
        delay: 7,
        opacity: .8,
        //repeat: 0, //重複
        scaleX: 4,
        scaleY: 3
    })

/********************************************************
                // windowFrame 動畫 //
*********************************************************/
// TweenMax.to('#about-windowsframe-01', 30, {
//     // rotation: 210,
//     rotation: 360,
//     // y: '+=50',
//     // scaleX: 2,
//     // scaleY: 1.2,
//     // delay: .5,
//     opacity: 1,
//     repeat: -1, //重複
// })







/********************************************************
                // 動畫 衛星巡航 //
*********************************************************/
TweenMax.to('#about-gear-02', 30, {
    // rotation: 210,
    rotation: 360,
    // y: '+=50',
    // scaleX: 2,
    // scaleY: 1.2,
    // delay: .5,
    opacity: 1,
    repeat: -1, //重複
})

TweenMax.to('#about-gear-03', 20, {
    // rotation: 210,
    rotation: -360,
    // y: '+=50',
    // scaleX: 2,
    // scaleY: 1.2,
    // delay: .5,
    opacity: 1,
    repeat: -1, //重複
})

TweenMax.to('#about-gear-04', 20, {
    // rotation: 210,
    // scale: 4,
    // delay: .5,
    opacity: 1,
    repeat: -1, //重複
})




/********************************************************
                // about-datatransmission 數據傳輪//
*********************************************************/
function aboutDataTrans(){
    var oUl = document.getElementById('aboutDataTransmission');//获取多个里的第1个
    var oDiv = document.getElementById('aboutArea6');
    // var disTop = oUl.offsetHeight - oDiv.offsetHeight;  // 移動最大範圍的值
    //document.querySelectorAll();//獲取多個,返回nodeList(類似於陣列(array)的使用)

//    console.log('disTop');
     // 使用元素往上移動
    function moveUp(){
        var s = 1;  // 移動的距離
        var disTop = oUl.offsetHeight - oDiv.offsetHeight; //// 移動最大範圍的值
        // console.log(oUl.ooffsetTop, disTop);  
        if (oUl.offsetTop < -disTop){
            oUl.style.top = '0px';
        }
        // 因為沒有在html裡設置過top，所以style.top只能取到一個沒有長度的字串
        // 這裡需要用offsetTop獲取top的位置

        oUl.style.top = oUl.offsetTop - s + 'px';
    }
    setInterval(moveUp, 20);
    // moveUp;
}
window.addEventListener('load',aboutDataTrans);



/********************************************************
                // about-member - switch//
*********************************************************/
//button
$(".about-member").click(function(){
    $(".about-techframe-teamgroup").addClass("d-none");
    $(this).find('.about-techframe-teamgroup').removeClass("d-none");
    let imgpath = $(this).attr('imgpath');
    $('#big-img').attr('src',imgpath);
    var aboutMember = $(this).attr('id');
    studyno(aboutMember);
});
//text
function studyno(number){
    if(number=='aboutMember1'){
        totext('O1800251','杜傳皓','JULY 31 2018','裝備客製');
    }else if(number=='aboutMember2'){
        totext('O1800256','邱楷燁','JULY 31 2018','特務藝廊、後端整合');
    }else if(number=='aboutMember3'){
        totext('O1800271','陳崇民','JULY 31 2018','關於我們');
    }else if(number=='aboutMember4'){
        totext('O1800260','曾彥儒','JULY 31 2018','裝備商城、前台頁面');
    }else if(number=='aboutMember5'){
        totext('O1800265','周良彥','JULY 31 2018','首頁、前台整合');
    }else if(number=='aboutMember6'){
        totext('O1800269','古阡華','JULY 31 2018','購物車');
    }else if(number=='aboutMember7'){
        totext('O1800263','廖靜妙','JULY 31 2018','會員中心');
    }
}
//action
function totext(text1,text2,text3,text4){
       $('#text1').text(text1);
        $('#text2').text(text2);
        $('#text3').text(text3);
        $('#text4').text(text4);
}


/********************************************************
                // about-service-connect - hover//
*********************************************************/
if (window.matchMedia("(min-width: 1200px)").matches){
    serviceConnectHover();
}
window.addEventListener('resize', function () {
    console.log(window.matchMedia("(min-width: 1200px)"));
    
    if (window.matchMedia("(min-width: 1200px)").matches){
        serviceConnectHover();
    }
})

// if (window.matchMedia("(min-width: 1200px)").matches){
    // var tl = new TimelineMax({paused:true})
    // tl.to("#ac1", 0.5, {scale:1.1, transformOrigin:"50% 50%", ease:Linear.easeNone})
    // tl.timeScale(2);

    // $("#ac1").hover(function(){
    // tl.play();
    // },function(){
    // tl.reverse();
    // })

    // var tl1 = new TimelineMax({paused:true})
    // tl1.to("#ac3", 0.5, {scale:1.1, transformOrigin:"50% 50%", ease:Linear.easeNone})
    // tl1.timeScale(2);

    // $("#ac3").hover(function(){
    // tl1.play();
    // },function(){
    // tl1.reverse();
    // })

    // var tl2 = new TimelineMax({paused:true})
    // tl2.to("#ac7", 0.5, {scale:1.1, transformOrigin:"50% 50%", ease:Linear.easeNone})
    // tl2.timeScale(2);

    // $("#ac7").hover(function(){
    // tl2.play();
    // },function(){
    // tl2.reverse();
    // }) 

// }

function serviceConnectHover() {
    var tl = new TimelineMax({paused:true})
    tl.to("#ac1", 0.5, {scale:1.1, transformOrigin:"50% 50%", ease:Linear.easeNone})
    tl.timeScale(2);

    $("#ac1").hover(function(){
    tl.play();
    },function(){
    tl.reverse();
    })

    var tl1 = new TimelineMax({paused:true})
    tl1.to("#ac3", 0.5, {scale:1.1, transformOrigin:"50% 50%", ease:Linear.easeNone})
    tl1.timeScale(2);

    $("#ac3").hover(function(){
    tl1.play();
    },function(){
    tl1.reverse();
    })

    var tl2 = new TimelineMax({paused:true})
    tl2.to("#ac7", 0.5, {scale:1.1, transformOrigin:"50% 50%", ease:Linear.easeNone})
    tl2.timeScale(2);

    $("#ac7").hover(function(){
    tl2.play();
    },function(){
    tl2.reverse();
    }) 
}
