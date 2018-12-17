<?php
date_default_timezone_set('Asia/Taipei');
$pstno = $_GET['pstno'];
try {
    require_once "connection.php";

    $pdo->beginTransaction();

    $sql = "select picid, pictitle, picuser, piccontent, imgname from gallery where upordown=1 AND positionno={$pstno};";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $row = $stmt->fetch();
    $picid = $row["picid"];

    $sql2 = "select msgid, member.mem_id, member.mem_image, member.mem_name, member.status, msgcontent, msgdatetime, msgupordown 
from message,member 
where message.mem_id = member.mem_id AND picid={$picid} AND msgupordown=1 AND status='Y' order by msgdatetime desc;";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute();
$addtime = date("Y-m-d H:i:s");
} catch (PDOException $e) {
    $pdo->rollBack();
    exit('資料庫連結失敗，錯誤訊息為:' . $e->getMessage());
}

include_once 'function/member.php';
?>
<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Chaser</title>
    <?php require_once 'template/common_css.php'; ?>
    <link rel="stylesheet" href="css/msg-board.min.css" />
    <link rel="stylesheet" type="text/css" href="css/loading.css" />
    <script src="js/loading/modernizr.custom.js"></script>
</head>

<body>
    <!-- /anl -->
    <div id="ip-container" class="ip-container">
        <header class="ip-header">
            <h1 class="ip-logo"><img class="ip-inner" src="images/logo.png" /></h1>
            <div class="ip-loader">
                <svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
                    <path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z" />
                    <path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z" />
                </svg>
            </div>
        </header>
        <?php require_once 'template/common_navbar.php'; ?>
        <!-- /anl -->
        <div class="nothing-box"></div>

        <div class="msg-box" id="msg-box">
            <div class="row no-gutters">
                <div class="col-12 col-md-3 ">
                    <a href="gallery.php" id="backgallery"><i class="fas fa-reply"></i>&nbsp&nbsp返回藝廊</a>
                    <div class="firstbox">
                        <div class="img-box">
                            <img src="images/gallery-img/gallery-uploadpic-file/<?=$row["imgname"];?>" class="msgmainpic img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 ">
                    <div class="content-item">
                        <div class="total-item">
                            <div class="item item-1">
                                <h1 class="fz-1"><?=$row["pictitle"];?></h1>
                                <p class="fz-4"><?=$row["picuser"];?></p>
                            </div>
                            <div class="item item-2">
                                <!-- <h2 class="fz-2">用品描述</h2> -->
                                <!-- <p class="fz-4">道不盡紅塵奢戀，訴不完人間恩怨，世世代代都是緣，留著相同的血，喝著相同的水，這條路漫漫又長遠。紅花當然配綠葉道不盡紅塵奢戀，訴不完人間恩怨，世世代代都是緣，留著相同的血，喝著相同的水，這條路漫漫又長遠。紅花當然配綠葉道不盡紅塵奢戀，訴不完人間恩怨，世世代代都是緣，留著相同的血，喝著相同的水，這條路漫漫又長遠。紅花當然配綠葉道不盡紅塵奢戀，訴不完人間恩怨，世世代代都是緣，留著相同的血，喝著相同的水，這條路漫漫又長遠。紅花當然配綠葉</p> -->
                                <p class="fz-4"><?=$row["piccontent"];?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 ">
                    <div class="msg">
                        <div class="message-board" id="message-board">

                        <?php foreach ($stmt2 as $row2): ?>
                            <div class="message-box">
                                <div class="msg-text-flex">
                                    <img src="images\mem_images\<?=$row2["mem_image"];?>" class="message-userimg">
                                    <div class="text-box">
                                        <span class="username"><?=$row2["mem_name"];?></span>
                                        <?=$row2["msgcontent"];?>
                                    </div>
                                </div>
                                <p>
                                    <span class="datetime"><?=$row2["msgdatetime"];?></span>
                                    <label for="exclamation" id="exclamation-label">檢舉&nbsp</label>
                                    <i class="fas fa-exclamation-triangle" id="exclamation"></i>
                                </p>
                                <div class="report">
                                    <span class="span-title">請選擇檢舉原因:</span>
                                    <span class="report-select" id="report1">情色</span>
                                    <span class="report-select" id="report2">暴力</span>
                                    <span class="report-select" id="report3">騷擾</span>
                                    <span class="report-select" id="report4">自殺或自殘</span>
                                    <input type="hidden" id="tx1" i="memid" value="<?=$row2["mem_id"];?>">
                                    <input type="hidden" id="tx2" i="picid" value="<?=$row["picid"];?>">
                                    <input type="hidden" id="tx3" i="msgid" value="<?=$row2["msgid"];?>">
                                    <button class="report-btn">送出檢舉</button>
                                    <!-- <button class="close-report-btn">關閉</button> -->
                                </div>
                            </div>
                        <?php endforeach?>


                           
                            <div class="leave-zone" id="leave-zone">
                                <!-- <a href="gallery.html" id="toback"><i class="fas fa-reply"></i>&nbsp&nbsp返回藝廊</a> -->
                                <div>
                                    <img src="images\mem_images\<?=isset ($_SESSION['member']["image"])? $_SESSION['member']["image"]: "preset.jpg";?>" class="leave-userimg">
                                    <div class="a3"></div>
                                    <textarea class="message-textarea" id="message-textarea" rows="" cols="100" placeholder="歡迎留言:"></textarea>
                                    <button href="#/" class="messagr-btn" id="messagr-btn">送出留言</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="myalert" id="myalert">
        <div class="alertnav">
            <span class="fz-3">警告</span>
        </div>
        <h3 class="alerttitle fz-2" id="alerttitle"></h3>
        <button class="okbtn fz-4" id="okbtn">確定</button>
    </div>

    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- TweenMax CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
    <!-- JC-JS -->
    <script src="js/msg-board.js"></script>
    <script src="js/loading/classie.js"></script>
    <script src="js/loading/pathLoader.js"></script>
    <script src="js/loading/main.js"></script>
    <?php require_once 'template/common_js.php'; ?>

<!-- /anl -->
    <script>
$(document).ready(function() {

$('#messagr-btn').click(function() {
<?php if( isset($_SESSION['member']["email"]) === false):?>
     myalert("很抱歉，留言必須要先登入喔!!!");
<?php else :?>
         let textinfo = $("#message-textarea").val();
        if(textinfo != ""){
      var xhr = new XMLHttpRequest();
  //註冊callback function 
  xhr.onreadystatechange = function(){
    if( xhr.readyState == 4){
      if( xhr.status == 200){
        $("#message-textarea").val("");
        myalert("恭喜你，留言成功囉!!!");
        // alert("恭喜你，留言成功囉!!!");
        $("#message-board").prepend(`<div class="message-box">
                                <div class="msg-text-flex">
                                    <img src="images/mem_images/<?=isset($_SESSION['member']["image"])?$_SESSION['member']["image"]:""?>" class="message-userimg">
                                    <div class="text-box">
                                        <span class="username"><?=isset($_SESSION['member']["name"])?$_SESSION['member']["name"]:""?></span>
                                        ${textinfo}
                                    </div>
                                </div>
                                <p>
                                    <span class="datetime"><?=$addtime;?></span>
                                    <label for="exclamation" id="exclamation-label">檢舉&nbsp</label>
                                    <i class="fas fa-exclamation-triangle" id="exclamation"></i>
                                </p>
                                <div class="report">
                                    <span class="span-title">請選擇檢舉原因:</span>
                                    <span class="report-select" id="report1">情色</span>
                                    <span class="report-select" id="report2">暴力</span>
                                    <span class="report-select" id="report3">騷擾</span>
                                    <span class="report-select" id="report4">自殺或自殘</span>
                                    <button class="report-btn">送出檢舉</button>
                                    <input type="hidden" id="tx1" i="memid" value="<?=isset($_SESSION['member']["id"])?$_SESSION['member']["id"]: "";?>">
                                    <input type="hidden" id="tx2" i="picid" value="<?=$row["picid"];?>">
                                    <input type="hidden" id="tx3" i="msgid" value="${xhr.responseText}">
                                    <!-- <button class="close-report-btn">關閉</button> -->
                                </div>
                            </div>`);
      }else{
        // alert("很抱歉，留言失敗!!!");
        myalert("很抱歉，留言失敗!!!");
      }
    }
  }
  //設定好所要連結的程式
  var url = "sendmsg.php";
  xhr.open("post", url, true);
  //送出資料
  let content = $("#message-textarea").val();
  var data_info = "msgcontent=" + content +"&picid=<?=$picid?>"+"&id=<?=isset($_SESSION['member']["id"])?$_SESSION['member']["id"]:"";?>";
  xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
  xhr.send( data_info);
}else{
    myalert("很抱歉，你沒有輸入任何文字喔!!!");
    // alert("很抱歉，你沒有輸入任何文字喔");
}

<?php endif;?>

  })

// /anl
$('.report').on('click','.report-select', function () {
    
        $('.report-select').not(this).removeClass('selectreport');
        $(this).addClass('selectreport');
        $(this).siblings('.report-select').css({
            backgroundColor: '#000',
            color: '#FDD084',
        });
        $(this).css({
            backgroundColor: 'pink',
            color: 'black',
        });
});
$('.report').on('click','.report-btn', function () {
    <?php if ( isset($_SESSION['member']["email"]) === false): ?>
        myalert("很抱歉，檢舉必須要先登入喔!!!");
    <?php else : ?>
        if ($(this).siblings('.report-select').hasClass('selectreport')) {
            lubb = $('.selectreport').text();
            complainid = $(this).siblings('#tx1').val();
            picid = $(this).siblings('#tx2').val();
            msgid = $(this).siblings('#tx3').val();
            reportsentodb();
            $(this).siblings('.selectreport').css({
                backgroundColor: '#000',
                color: '#FDD084',
            });
            $(this).siblings('.report-select').removeClass('selectreport');

        } else {
            myalert("抱歉，你並沒有選擇檢舉理由!!!");
        }
    <?php endif; ?>
});
    function reportsentodb() {
        var xhr = new XMLHttpRequest();
        //註冊callback function 
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    // alert(xhr.responseText);
                    myalert(xhr.responseText);
                }
            }
        }
        var ggg = `reportsendtodb.php?reason=${lubb}&reportaddtime=<?=$addtime;?>&complainid=${complainid}&picid=${picid}&msgid=${msgid}&id=<?=isset($_SESSION['member']["id"])?$_SESSION['member']["id"]:"";?>`;
        //設定好所要連結的程式
        let url = ggg;
        // console.log(url);
        xhr.open("GET", url, true);
        //送出資料
        xhr.send(null);
    }
function myalert(word) {
    $('#myalert').show()
    $('#alerttitle').text(word);
}
$('#okbtn').click(function () { 
    $('#myalert').hide();
});
})
    </script>
</body>

</html>
