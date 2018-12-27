// 換座標
$(".map_position04").click(function () {
    $(".location").html("座標：51.49, -0.11");
});
$(".map_position02").click(function () {
    $(".location").html("座標：51.51, -0.14");
});
$(".map_position03").click(function () {
    $(".location").html("座標：51.50, -0.14");
});
$(".map_position01").click(function () {
    $(".location").html("座標：51.50, -0.18");
});


// 表單特效
$(function () {
    ////输入框获得焦点时
    $("input").focus(function (event) {
        //label动态上升，向左移動
        $(this).siblings("label").stop().animate({
            "top": "-1.5rem"
        }, 500);
        //div模拟的下边框伸出，其width动态改变至input的width
        $(this).next(".bottom-line").stop().animate({
            "width": "60%"
        }, 500);
    });
    ////输入框失去焦点时
    $("input").blur(function (event) {
        //input內無字
        if ($(this).val() == "") {
            //label动态向右，恢复原位
            $(this).siblings("label").stop().animate({
                "top": "-0.5rem"
            }, 500);
            //用div模拟的下边框缩回，其width动态恢复为默认宽度0
            $(this).next(".bottom-line").stop().animate({
                "width": "0"
            }, 500);
        }
    });
});