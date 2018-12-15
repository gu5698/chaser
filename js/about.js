
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
        }, 11000);
    }); 

   	

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
        delay: 1.5,
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
        delay: 2,
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
        delay: 2.5,
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
        delay: 3,
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
        delay: 3.5,
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
        delay: 4,
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
        delay: 8.5,
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
    var disTop = oUl.offsetHeight - oDiv.offsetHeight;  // 移動最大範圍的值
    //document.querySelectorAll();//獲取多個,返回nodeList(類似於陣列(array)的使用)

//    console.log('disTop');
     // 使用元素往上移動
    function moveUp(){
        var s = 1;  // 移動的距離
        if (oUl.offsetTop < -disTop){
            oUl.style.top = '0px';
        }
        // 因為沒有在html裡設置過top，所以style.top只能取到一個沒有長度的字串
        // 這裡需要用offsetTop獲取top的位置

        oUl.style.top = oUl.offsetTop - s + 'px';
    }
    console.log(oUl);
    setInterval(moveUp, 20);
}
window.addEventListener('load',aboutDataTrans);



/********************************************************
                // about-member - switch//
*********************************************************/

// $('#about-member1').click(function(){
//     $('#about-number-id').innerHTML == "O1800251"; 
// });

// $('#about-member2').click(function(){
//     var n =$(this).attr("id")
//     $('#about-number-id').replace.innerHTML == "O1800256"; 
//     $('#about-profile').attr.replace.("src","images/about/about-number-" + 2 + ".png");
//     // $('#about-profile').src.replace
// });

// $(function(){
//     $("#small img").click(function(){
//         var N =$(this).attr("id").substr(2);
//         $("#BIG").attr("src","images/dog" + N + ".jpg");
//     });
// });

// function shownumber(e){
//     var small = e.target;
//     // target 事件屬性可返回事件的目標節點（觸發該事件的節點），如生成事件的元素、文檔或窗口。
//     document.getElementById("large").src =
//     small.src.replace() 
// }