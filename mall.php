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
<html>
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
                        <img class="circle1-1 circle" src="images/technologyCircle/circle1-1.png" alt="">
                        <img class="circle1-2 circle" src="images/technologyCircle/circle1-2.png" alt="">
                        <img class="circle2 circle" src="images/technologyCircle/circle2.png" alt="">
                        <!-- <img class="circle3 circle" src="images/technologyCircle/circle3.png" alt=""> -->
                        <img class="circle4 circle" src="images/technologyCircle/circle4.png" alt="">
                        <!-- <img class="circle5 circle" src="images/technologyCircle/circle5.png" alt=""> -->
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
                        <div class="mall_ability col-md-4 offset-md-1 col-8">
                            <h2 class="fz-2 title1">裝備功能</h2>
                            <ul class="mall_features fz-4">
                                <li><div class="diamond"></div><h3 class="col-md-11 offset-1">鋼筆筆頭內藏有毒針，可對敵使用</h3></li>
                                <li><div class="diamond"></div><h3 class="col-md-11 offset-1">筆身有有隱藏按鈕，可啟動錄音功能</h3></li>
                                <li><div class="diamond"></div><h3 class="col-md-11 offset-1">看似普通的筆，其實暗藏殺機</h3></li>
                                <li><div class="diamond"></div><h3 class="col-md-11 offset-1">內藏針孔攝影機，偷拍神器</h3></li>
                            </ul>
                        </div>
                        <div class="mall_bigImg col-md-4 col-12">
                            <img src="images/pageImg/<?php echo $prodrow->product_image; ?>" alt="">
                        </div>
                        <div class="mall_capability">
                             <canvas id="mall_mychart"></canvas>
                        </div>
                        <div class="mall_box col-md-2 col-8">
                            <h2><?php echo $prodrow->product_name; ?></h2>
                            <h3>售價 : <span><?php echo $prodrow->product_price; ?></span> USD</h3>
                            <h3>數量 :
                                <span>
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                    <input class="mall_amount" type="number" value='1' min='1' max='99'>
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </span>
                            </h3>
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
    }if($errorMsg != ''){
        echo $errorMsg;
    }else{
        while($prodimg = $products->fetchObject()){
?>
                    <li class="barimg">
                         <img src="images/pageImg/<?php echo $prodimg->product_image; ?>" alt="">
                    </li>
                   <!--  <li id="img2" class="barimg"><img src="images/pageImg/item2.png" alt=""></li>
                    <li id="img3" class="barimg"><img src="images/pageImg/item3.png" alt=""></li>
                    <li id="img4" class="barimg"><img src="images/pageImg/item4.png" alt=""></li>
                    <li id="img5" class="barimg"><img src="images/pageImg/item5.png" alt=""></li> -->
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