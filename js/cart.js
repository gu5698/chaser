// load header & footer
// $(function () {
//     $("#header").load("common.html");
//     // $("#footer").load("footer.html");
// });

// 表單特效
$(function () {
    ////输入框获得焦点时
    $("input").focus(function (event) {
        //label动态上升，升至顶部
        $(this).siblings("label").stop().animate({
            "top": "-1.5rem"
        }, 500);
        //div模拟的下边框伸出，其width动态改变至input的width
        $(this).next(".bottom-line").stop().animate({
            "width": "101%"
        }, 500);
    });
    ////输入框失去焦点时
    $("input").blur(function (event) {
        //input內無字
        if ($(this).val() == "") {
            //label动态下降，恢复原位
            $(this).siblings("label").stop().animate({
                "top": "-0.5rem"
            }, 500);
            //用div模拟的下边框缩回，其width动态恢复为默认宽度0
            $(this).next(".bottom-line").stop().animate({
                "width": "0"
            }, 500);
        };
    });
});

// hamburger
$(document).ready(function () {
    $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function () {
        $(this).toggleClass('open');
    });
});

// 燈箱開關
function showLoginForm() {
    document.getElementById("lightBox").style.display = '';
}

function cancelLogin() {
    document.getElementById("lightBox").style.display = 'none';
}

function init() {
    document.getElementsByClassName("pin").onclick = showLoginForm;
    document.getElementById('close').onclick = cancelLogin;
};

window.onload = init;

// 燈箱表單驗證
function check_select() {
    // console.log("form", form, "time",  time );

    if (time.value == "---") {
        alert("請幫我們選個時間唷！");
        return false;
    } else {
        return true;
    }
}

//cart1
//增加list項目
$(document).ready(function () {
    // 每次點擊加號時input框中數值+1
    $(".fa-plus").click(function () {
        var num = parseInt($(this).parents(".quantity").children("input").val()) + 1;
        $(this).parents(".quantity").children("input").val(num);
    });
    // 每次點擊減號時input框中數值+1
    $(".fa-minus").click(function () {
        var num = parseInt($(this).parents(".quantity").children("input").val()) - 1;
        // input框數值不小於1
        if (num > 0) {
            $(this).parents(".quantity").children("input").val(num);
        }
    });
    // input框失去焦點時檢查，其值若小於1，則修正成1
    $("input").blur(function (event) {
        if (parseInt($("input").val()) < 1) {
            $("input").val(1);
        }
    });
    // 垃圾桶遭點擊時，會刪除整筆product資訊
    $(".fa-trash-alt").click(function () {
        $(this).parents(".products").css("display", "none");
        $(this).parents(".shoplist").css("display", "none");
    });
    // 購物車被點擊時，確認視窗寬度，並判斷是否讓購物車顯示
    $(".fa-shopping-cart").parents("li").click(function () {
        if ($(document).width() < 768) {

            if ($(".sub-menu").css("opacity") == "0") {
                $(".sub-menu").css({
                    "opacity": "1",
                    "visibility": "visible"
                });
            } else {
                $(".sub-menu").css({
                    "opacity": "0",
                    "visibility": "hidden"
                });
            };
        };
    });
    $(".fa-shopping-cart").parents("li").mouseenter(function () {
        if ($(document).width() >= 768) {
            $(".sub-menu").css({
                "opacity": "1",
                "visibility": "visible"
            });
        }
    });
    $(".fa-shopping-cart").parents("li").mouseleave(function () {
        if ($(document).width() >= 768) {
            $(".sub-menu").css({
                "opacity": "0",
                "visibility": "hidden"
            });
        }
    });
});