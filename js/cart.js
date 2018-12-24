//cart1
//增加list項目
$(document).ready(function () {

  // 購物車被點擊時，確認視窗寬度，並判斷是否讓購物車顯示
  // $(".fa-shopping-cart").parents("li").click(function () {
  //   if ($(document).width() < 768) {
  //     if ($(".sub-menu").css("opacity") == "0") {
  //       $(".sub-menu").css({
  //         opacity: "1",
  //         visibility: "visible"
  //       });
  //     } else {
  //       $(".sub-menu").css({
  //         opacity: "0",
  //         visibility: "hidden"
  //       });
  //     }
  //   }
  // });
  // $(".fa-shopping-cart").parents("li").mouseenter(function () {
  //   if ($(document).width() >= 768) {
  //     $(".sub-menu").css({
  //       opacity: "1",
  //       visibility: "visible"
  //     });
  //   }
  // });
  // $(".fa-shopping-cart").parents("li").mouseleave(function () {
  //   if ($(document).width() >= 768) {
  //     $(".sub-menu").css({
  //       opacity: "0",
  //       visibility: "hidden"
  //     });
  //   }
  // });

  // 未完工
  // $(".list-counter").html($(".shoplist").length);

  // 換座標
  $(".blackprince").click(function () {
    $(".locnum").html("座標：51.49, -0.11");
    $('input[name="locnum"]').val("51.49, -0.11");
  });
  $(".huntsman").click(function () {
    $(".locnum").html("座標：51.51, -0.14");
    $('input[name="locnum"]').val("51.51, -0.14");
  });
  $(".hat").click(function () {
    $(".locnum").html("座標：51.50, -0.14");
    $('input[name="locnum"]').val("51.50, -0.14");
  });
  $(".college").click(function () {
    $(".locnum").html("座標：51.50, -0.18");
    $('input[name="locnum"]').val("51.50, -0.18");
  });
});

//cart2
// 表單特效
$(function () {
  ////输入框获得焦点时
  $("input").focus(function (event) {
    //label动态上升，升至顶部
    $(this).siblings("label").stop().animate({
        top: "-1.5rem"
      },
      500
    );
    //div模拟的下边框伸出，其width动态改变至input的width
    $(this).next(".bottom-line").stop().animate({
        width: "60%"
      },
      500
    );
  });
  ////输入框失去焦点时
  $("input").blur(function (event) {
    //input內無字
    if ($(this).val() == "") {
      //label动态下降，恢复原位
      $(this).siblings("label").stop().animate({
          top: "-0.5rem"
        },
        500
      );
      //用div模拟的下边框缩回，其width动态恢复为默认宽度0
      $(this).next(".bottom-line").stop().animate({
          width: "0"
        },
        500
      );
    }
  });
});

//增加list項目
$(document).ready(function () {
  function stateChanged() {
    if (xhr.readyState == 4) { //server 執行完畢
      if (xhr.status == 200) { //正確執行完畢
        alert(xhr.responseText);
      } else {
        alert(xhr.status);
      } //xhr.status
    } //xhr.readyState
  }

  function checkId() {
    //產生XMLHttpRequest物件
    xhr = new XMLHttpRequest();

    //註冊callback function
    xhr.onreadystatechange = stateChanged;

    //設定好所要連結的程式
    var url = "GetResponseText.php?memId=" + document.getElementById("memId").value;
    xhr.open("get", url, true);

    //送出資料
    xhr.send(null);

  } //function_checkId



  //..........................................
  window.addEventListener("load", function () {
    document.getElementById("btnCheckId").addEventListener("click", checkId, false);
  }, false);

  // 表單送出
  $(".rcvnext").click(function () {
    $("form").submit();
  });
});