<?php include_once 'function/member.php'; ?>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Chaser</title>

    <?php require_once 'template/common_css.php';?>
    <!-- 個人CSS START -->
    <link rel="stylesheet" href="css/productSelect.css">
    <!-- 個人CSS END -->

</head>
<body>

<?php require_once 'template/common_navbar.php';?>

<!-- 主內容 START -->
<div id="fullscreen">

<!-- 內容開始 -->
<div class="step_wrap">
    <div class="step">
        <div class="circle circle_1">
            <img class="circle_1" src="images/customize/circle_1.png" alt="circle1">
            <img class="shot" src="images/customize/000.png" alt="shot">
            <span class="statement_01 fz-5">選擇商品</span>
            <span class="number fz-4">1</span>
        </div>
        <div class="line"></div>

        <div class="circle circle_2">
            <img src="images/customize/circle_2.png" alt="circle2">
            <span class="statement_02 fz-5">設計商品</span>
            <span class="number fz-4">2</span>
        </div>
        <div class="line"></div>

        <div class="circle circle_3">
            <img src="images/customize/circle_2.png" alt="circle2">
            <span class="statement_03 fz-5">填寫資訊</span>
            <span class="number fz-4">3</span>
        </div>
        <div class="line"></div>

        <div class="circle circle_4">
            <img src="images/customize/circle_2.png" alt="circle2">
            <span class="statement_04 fz-5">成功下單</span>
            <span class="number fz-4">4</span>
        </div>
    </div>
</div>

<div class="cu_select">

    <div class="item item1">
        <a href="productDesign_watch.php">
            <img src="images/customize/watch_wallpaper.jpg" alt="watch">
            <div class="item1_cover">
                <div class="glass">
                    <img src="images/customize/break-glass.png" alt="glass">
                </div>
                <div class="img_title">
                    <h1>射擊手錶</h1>
                </div>
            </div>
        </a>
    </div>



    <div class="item item2">
        <a href="#">
            <img src="images/customize/suit_wallpaper.jpg" alt="suit">
            <div class="item2_cover">
                <div class="glass">
                    <img src="images/customize/break-glass.png" alt="glass">
                </div>
                <div class="img_title">
                    <h1>防彈西裝</h1>
                </div>
            </div>
        </a>
    </div>



    <div class="item item3">
        <a href="#">
            <img src="images/customize/suitcase_wallpaper.jpg" alt="suitcase">
            <div class="item3_cover">
                <div class="glass">
                    <img src="images/customize/break-glass.png" alt="glass">
                </div>
                <div class="img_title">
                    <h1>轟炸皮箱</h1>
                </div>
            </div>
        </a>
    </div>

</div>
</div>

</div>






<?php include_once 'chatbot.php'; ?>





<!-- start footer -->
<footer class="footer">
<div class="fz-small">© 2018 Chaser. All Rights Reserved.</div>
</footer>
<!-- end footer -->

<!-- 主內容 END -->

<?php require_once 'template/common_js.php';?>

<!-- 個人js START -->
<script src="js\chatbot.js"></script>
<script src="js/itemDelay.js"></script>
<!-- 個人js END -->

</body>
</html>