<?php include_once 'function/member.php' ;?>

<?php
    $errorMsg = '';
    try{
        require_once("connect.php");
        $sql = "select * from product";
        $products = $pdo->query($sql);
    }catch(PDOException $e){
        echo "error reason : ",$e->getMessage(),"<br>";
        echo "error line : ",$e->getLine(),"<br>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php require_once 'template/common_css.php'; ?>
    <!-- 個人連結start -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/TweenMax.min.js"></script>
    <!-- favicon -->
    <link rel="shortcut icon" href="images/common/favicon.ico" type="image/x-icon">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
    crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/mall.css">
     <!-- 個人連結end -->

     <?php require_once 'template/common_navbar.php'; ?>
    <title>Chaser</title>
</head>
<body>
    <!-- 主內容 START -->
        <div id="mall_wrap">
                <div id="mall_main">
                        <!-- <img class="circle1-1 circle" src="images/technologyCircle/circle1-1.png" alt="">
                        <img class="circle1-2 circle" src="images/technologyCircle/circle1-2.png" alt="">
                        <img class="circle2 circle" src="images/technologyCircle/circle2.png" alt="">
                        <img class="circle3 circle" src="images/technologyCircle/circle3.png" alt="">
                        <img class="circle4 circle" src="images/technologyCircle/circle4.png" alt="">
                        <img class="circle5 circle" src="images/technologyCircle/circle5.png" alt=""> -->
                        <!-- <img class="gear1 gear" src="images/gear/gear1.png" alt="">
                        <img class="gear2 gear" src="images/gear/gear2.png" alt="">
                        <img class="gear3 gear" src="images/gear/gear3.png" alt="">
                        <img class="gear4 gear" src="images/gear/gear4.png" alt=""> -->
<?php
    if($errorMsg != ''){
        echo $errorMsg;
    }else{
        while($prodrow = $products->fetchObject()){
?>
                    <div class="mall_page">
                        <div class="mall_ability col-md-3 offset-md-1 col-8">
                            <h2 class="fz-2 title1">裝備功能</h2>
                            <ul class="mall_features fz-4">
                                <li><div class="diamond"></div><h3 class="col-md-11 offset-1">鋼筆筆頭內藏有毒針，可對敵使用</h3></li>
                                <li><div class="diamond"></div><h3 class="col-md-11 offset-1">筆身有有隱藏按鈕，可啟動錄音功能</h3></li>
                                <li><div class="diamond"></div><h3 class="col-md-11 offset-1">看似普通的筆，其實暗藏殺機</h3></li>
                                <li><div class="diamond"></div><h3 class="col-md-11 offset-1">內藏針孔攝影機，偷拍神器</h3></li>
                            </ul>
                        </div>
                        <div class="mall_bigImg col-md-4 col-12">
                            <img src="images/pageImg/<?php echo $prodrow->pruduct_image; ?>" alt="">
                        </div>
                        <div class="mall_capability">
                             <canvas id="mall_mychart"></canvas>
                        </div>
                        <div class="mall_box col-md-2 col-8">
                            <h2><?php echo $prodrow->product_name; ?></h2>
                            <h3>售價 : <span><?php echo $prodrow->product_price; ?></span> btc</h3>
                            <h3>數量 : <span><input type="number" value='1'></span></h3>
                            <div class="button">
                                <a href=""><span><h3 class="buy">直接購買</h3><div class="triangle"></div></span></a>
                                <span class="addCart"><h3>加入購物車</h3></span>
                            </div>
                        </div>
                    </div>
<?php
    }//while
}//else
?>
                </div>
            </div>
            <div id="control_bar" class="hide_control">
                <div class="triangle hide_triangle"><i class="fas fa-caret-left"></i></div>
            </div>
            <div class="mall_bar hide_bar down_bar">
                <div class="control_next"><i class="fas fa-chevron-down"></i></div>
                <div class="control_prev"><i class="fas fa-chevron-up"></i></div>
                <div id="mall_slider">
                    <ul id="slider_ul">
                <?php
                    $errorMsg = '';
                    try{
                        require_once("connect.php");
                        $sql = "select * from product";
                        $products = $pdo->query($sql);
                    }catch(PDOException $e){
                        echo "error reason : ",$e->getMessage(),"<br>";
                        echo "error line : ",$e->getLine(),"<br>";
                    }
                    if($errorMsg != ''){
                        echo $errorMsg;
                    }else{
                        while($pro = $products->fetchObject()){
                ?>
                    <li class="barimg border">
                        <img src="images/pageImg/<?php echo $pro->pruduct_image; ?>" alt="">
                    </li>
                <?php
                        }//while
                    }//else
                ?>
                    </ul>
                </div>
            </div>
            <div id="mall_door">
                 <div id="mall_doorL">

                </div>
                 <div id="mall_doorR">

                </div>
            </div>
            <div id="mall_open">
                <img src="images/door/open.png" alt="">
            </div>
            <div class="mall_scroll">
                <div class="chevron"></div>
                <div class="chevron"></div>
                <div class="chevron"></div>
            </div>
<!-- start chatbot -->
<div id="chatbot" class="chatbot">
    <div id="avatar" class="avatar">
        <img src="images/common/chatbot-body.svg" alt="chatbot-body" class="chatbot-body">
        <img src="images/common/chatbot-head-1.svg" alt="chatbot-head-1" id="chatbot-head" class="chatbot-head">
        <img src="images/common/chatbot-hat.svg" alt="chatbot-hat" class="chatbot-hat">
    </div>
    <div id="greeting" class="greeting fz-p">
        <div class="message">取進電例報日到會但，爭什費高企分聽樣裡時黨不腦音面靜，手防親，臺一麼不請路女……易去然了不難次多因不，展人語古始關過？都文早實而正開。多現影大，終不分外汽有地算正看成八留呢足保子。馬工統好系強們，學建理了好生的明為題</div>
        <i id="greeting-close" class="far fa-times-circle"></i>
    </div>
    <div class="message-window">
        <div id="message-head" class="message-head">
            <div class="title fz-6">CHASER</div>
            <i class="fas fa-comments icon-message"></i>
            <i class="fas fa-angle-up icon-minimize"></i>
        </div>
        <div id="message-body" class="message-body">
            <div class="message message-bot"><a href="#">歡迎來到CHASER</a></div>
        </div>
        <div class="message-input">
            <textarea id="message-textarea"></textarea>
            <i id="message-submit" class="fab fa-telegram-plane icon-submit"></i>
        </div>
    </div>
</div>
<!-- end chatbot -->
<!-- ====================================================================================================================== -->
<!-- start footer -->
<footer class="footer">
    <div class="fz-small">© 2018 Chaser. All Rights Reserved.</div>
</footer>
<!-- end footer -->
</body>
<script src="js/mall.js"></script>
<!-- 主內容 END -->

<?php require_once 'template/common_js.php'; ?>
</html>