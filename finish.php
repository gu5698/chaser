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
<link rel="stylesheet" href="css/finish.css">
<!-- 個人CSS END -->

</head>
<body>

<?php require_once 'template/common_navbar.php';?>

<!-- 主內容 START -->
<div id="fullscreen">
        <div class="step_wrap">
            <div class="step">
                <div class="circle circle_1">
                    <img class="circle_1" src="images/customize/circle_2.png" alt="circle1">
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
                    <span class="statement_03 fz-5">交貨資訊</span>
                    <span class="number fz-4">3</span>
                </div>
                <div class="line"></div>

                <div class="circle circle_4">
                    <img src="images/customize/circle_1.png" alt="circle2">
                    <img class="shot" src="images/customize/000.png" alt="shot">
                    <span class="statement_04 fz-5">成功訂貨</span>
                    <span class="number fz-4">4</span>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="part_wrap">
                <div class="part01">
                    <img src="images/customize/logo_1.png" alt="logo">
                </div>
                <div class="part02">
                    <p class="fz-3">訂貨成功，感謝您的購買!!!</p>
                    <a href="mall.php" class="gotomall fz-6">前往裝備商城</a>
                    <a href="gallery.php" class="gotogallery fz-6">參觀傳奇特務藝廊</a>
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

<!-- 個人js START -->
<script src="js\chatbot.js"></script>

<!-- 個人js END -->

<?php require_once 'template/common_js.php';?>

</body>
</html>