<?php include_once 'function/member.php'; ?>
<?php
try {
    require_once "connection.php";

    $pdo->beginTransaction();

    $sql = "select picid, positionno,imgname from gallery where upordown=1 order by positionno;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $sql2 = "select couponid from coupon where caniuse=1 order by couponid DESC;";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute();
    $row2 = $stmt2->fetch();

} catch (PDOException $e) {
    $pdo->rollBack();
    exit('資料庫連結失敗，錯誤訊息為:' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Chaser</title>
    <?php require_once 'template/common_css.php'; ?>
    <link rel="stylesheet" type="text/css" href="css/loading.css" />
    <link rel="stylesheet" href="css/gallery.min.css" />
    <script src="js/loading/modernizr.custom.js"></script>
    <script src="js/piano.js"></script>
    <link href="css/piano.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="css/chatbot.css">
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
        <div class="wrapper">
            <div class="wall pic-wall wall1">
                <!-- <div class="picad"> -->
                    <img src="images/gallery-img/inside.png" id="insidepic2" alt="">
                <!-- </div> -->
                <div class="wall-footer"></div>
            </div>
            <div class="wall wall2">
                <div class="wall-footer"></div>
            </div>
            <?php $row = $stmt->fetch();?>
            <div class="wall pic-wall wall3" id="wall3">
                <div class="artpicbox cen">
                    <div class="picinsidebox">
                        <a href="msg-board.php?pstno=1" class="pica" id="pstno1" name="">
                            <img src="images/gallery-img/gallery-uploadpic-file/<?=$row["imgname"];?>" class="artpic img-fluid">
                        </a>
                    </div>
                    <img src="images\gallery-img\frame5.png" alt="" class="frame">
                </div>
                <div class="wall-footer"></div>
            </div>
            <div class="wall wall4">
                <div class="wall-footer"></div>
            </div>
            <?php $row = $stmt->fetch();?>
            <div class="wall pic-wall wall5">
                <div class="artpicbox cen">
                    <div class="picinsidebox">
                        <a href="msg-board.php?pstno=2" class="pica" id="pstno2" name="">
                            <img src="images/gallery-img/gallery-uploadpic-file/<?=$row["imgname"];?>" class="artpic img-fluid">
                        </a>
                    </div>
                    <img src="images\gallery-img\frame5.png" alt="" class="frame">
                </div>
                <div class="wall-footer"></div>
            </div>
            <div class="wall wall6">
                <div class="wall-footer"></div>
            </div>
            <?php $row = $stmt->fetch();?>
            <div class="wall pic-wall wall7">
                <div class="artpicbox cen">
                    <div class="picinsidebox">
                        <a href="msg-board.php?pstno=3" class="pica" id="pstno3" name="">
                            <img src="images/gallery-img/gallery-uploadpic-file/<?=$row["imgname"];?>" class="artpic img-fluid">
                        </a>
                    </div>
                    <img src="images\gallery-img\frame5.png" alt="" class="frame">
                </div>
                <div class="wall-footer"></div>
            </div>
            <div class="wall wall8">
                <div class="wall-footer"></div>
            </div>
            <?php $row = $stmt->fetch();?>
            <div class="wall pic-wall wall9">
                <div class="artpicbox cen">
                    <div class="picinsidebox">
                        <a href="msg-board.php?pstno=4" class="pica" id="pstno4" name="">
                            <img src="images/gallery-img/gallery-uploadpic-file/<?=$row["imgname"];?>" class="artpic img-fluid">
                        </a>
                    </div>
                    <img src="images\gallery-img\frame5.png" alt="" class="frame">
                </div>
                <div class="wall-footer"></div>
            </div>
            <div class="wall wall10">
                <div class="wall-footer"></div>
            </div>
            <?php $row = $stmt->fetch();?>
            <div class="wall pic-wall wall11">
                <div class="artpicbox cen">
                    <div class="picinsidebox">
                        <a href="msg-board.php?pstno=5" class="pica" id="pstno5" name="">
                            <img src="images/gallery-img/gallery-uploadpic-file/<?=$row["imgname"];?>" class="artpic img-fluid">
                        </a>
                        <div id="pianoimg"></div>
                    </div>
                    <img src="images\gallery-img\frame5.png" alt="" class="frame">
                </div>
                <div class="wall-footer"></div>
            </div>
            <div class="wall wall12">
                <div class="wall-footer"></div>
            </div>
            <div class="backwall wall bw1"></div>
            <div class="backwall wall bw2"></div>
            <div class="backwall wall bw3"></div>
            <div class="backwall wall bw4"></div>
            <div class="group">
                <div class="wall left"></div>
                <div class="wall right"></div>
                <div class="wall back">
                    <img src="images\gallery-img\gear.png" id="gear1" alt="">
                    <img src="images\gallery-img\gear.png" id="gear2" alt="">
                    <img src="images\gallery-img\gear.png" id="gear3" alt="">
                    <div class="slide">
                        <div id="slide_btn"><img src="images\gallery-img\slide_btn.png" alt=""></div>
                    </div>
                    <img src="images\gallery-img\paper.png" class="paper" alt="" id="paper">
                </div>
                <?php $row = $stmt->fetch();?>

                <div class="wall pic-wall wall13">
                    <!-- <div class="artpicbox cen"> -->
                    <a href="msg-board.php?pstno=6" class="pica" id="pstno6" name="">
                        <img src="images\gallery-img\gallery-uploadpic-file\<?=$row["imgname"];?>" class="artpic2">
                        <img src="images\gallery-img\frame5.png" alt="" class="fcenframe">
                    </a>
                    <!-- </div> -->
                    <div class="wall-footer"></div>
                </div>
            </div>


            <div class="wall wall14">
                <div class="wall-footer"></div>
            </div>
            <?php $row = $stmt->fetch();?>

            <div class="wall pic-wall wall15">
                <div class="artpicbox cen">
                    <div class="picinsidebox">
                        <a href="msg-board.php?pstno=7" class="pica" id="pstno7" name="">
                            <img src="images/gallery-img/gallery-uploadpic-file/<?=$row["imgname"];?>" class="artpic img-fluid">
                        </a>
                    </div>
                    <img src="images\gallery-img\frame5.png" alt="" class="frame">
                </div>
                <div class="wall-footer"></div>
            </div>
            <div class="wall wall16">
                <div class="wall-footer"></div>
            </div>
            <?php $row = $stmt->fetch();?>

            <div class="wall pic-wall wall17">
                <div class="artpicbox cen">
                    <div class="picinsidebox">
                        <a href="msg-board.php?pstno=8" class="pica" id="pstno8" name="">
                            <img src="images/gallery-img/gallery-uploadpic-file/<?=$row["imgname"];?>" class="artpic img-fluid">
                        </a>
                    </div>
                    <img src="images\gallery-img\frame5.png" alt="" class="frame">
                </div>
                <div class="wall-footer"></div>
            </div>
            <div class="wall wall18">
                <div class="wall-footer"></div>
            </div>
            <?php $row = $stmt->fetch();?>

            <div class="wall pic-wall wall19">
                <div class="artpicbox cen">
                    <div class="picinsidebox">
                        <a href="msg-board.php?pstno=9" class="pica" id="pstno9" name="">
                            <img src="images/gallery-img/gallery-uploadpic-file/<?=$row["imgname"];?>" class="artpic img-fluid">
                        </a>
                    </div>
                    <img src="images\gallery-img\frame5.png" alt="" class="frame">
                </div>
                <div class="wall-footer"></div>
            </div>
            <div class="wall wall20">
                <div class="wall-footer"></div>
            </div>
            <?php $row = $stmt->fetch();?>

            <div class="wall pic-wall wall21">
                <div class="artpicbox cen2">
                    <div class="picinsidebox">
                        <a href="msg-board.php?pstno=10" class="pica" id="pstno10" name="">
                            <img src="images/gallery-img/gallery-uploadpic-file/<?=$row["imgname"];?>" class="artpic img-fluid">
                        </a>
                    </div>
                    <img src="images\gallery-img\frame5.png" alt="" class="frame">
                </div>
                <div class="wall-footer"></div>
            </div>
            <div class="floor"></div>
        </div>
    </div>
    <!-- <a href="#" class="" id="" name=""> -->
        <img src="images\gallery-img\buyticket.png" class="buyticket" id="buyticket" alt="">
    <!-- </a> -->
    <img src="images\gallery-img\scroll.png" class="scroll-icon" alt="">
    <div id="all">
        <div id="main">
            <i class="fas fa-times-circle" id="closepiano"></i>
            <div id="key60" class="key whiteKey">A<br><span>Do</span></div>
            <div id="key62" class="key whiteKey">S<br><span>Re</span></div>
            <div id="key64" class="key whiteKey">D<br><span>Mi</span></div>
            <div id="key65" class="key whiteKey">F<br><span>Fa</span></div>
            <div id="key67" class="key whiteKey">G<br><span>Sol</span></div>
            <div id="key69" class="key whiteKey">H<br><span>La</span></div>
            <div id="key71" class="key whiteKey">J<br><span>Si</span></div>
            <div id="key72" class="key whiteKey">K<br><span>Do</span></div>
            <div id="key61" class="key blackKey">W</div>
            <div id="key63" class="key blackKey">E</div>
            <div id="key66" class="key blackKey">T</div>
            <div id="key68" class="key blackKey">Y</div>
            <div id="key70" class="key blackKey">U</div>
        </div>
        <form method="get" action="" id="form">
            <input type='text' id='test' value="">
        </form>
    </div>
    <div id="paper-box">
        <i class="fas fa-times" id="paperclose"></i>
        <img src="images\gallery-img\paper.png" class="img-fluid" alt="" id="paper-big">
        <p class="" id="papercoupon">gallery<?=$row2["couponid"];?></p>
    </div>
    <!-- /anl -->
    <?php include_once 'chatbot.php'; ?>
    <!-- start footer -->
    <footer class="footer">
        <div class="fz-small">© 2018 Chaser. All Rights Reserved.</div>
    </footer>
    <!-- end footer -->
    <!-- /anl -->
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
    <script src="js/gallery.js"></script>
    <script src="js/loading/classie.js"></script>
    <script src="js/loading/pathLoader.js"></script>
    <script src="js/loading/main.js"></script>
    <script src="js/chilun.js"></script>
    <script src="js/pianoverification.js"></script>
    <script src="js\chatbot.js"></script>
    <?php require_once 'template/common_js.php';?>
    <script>

    function myalert(word) {
    $('#myalert').show()
    $('#alerttitle').text(word);
    
}

$('#okbtn').click(function () { 
    $('#myalert').hide();
});

$('#buyticket').click(function () { 
<?php if( isset($_SESSION["member"]["email"]) === false):?>
        myalert("很抱歉，要購票必須要先登入喔!!!");   
<?php else:?>
       document.location.href="buyticket.php";
<?php endif; ?>
});
    </script>
</body>

</html>