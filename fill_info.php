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
<link rel="stylesheet" href="css/fill_info.css">

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
                    <img src="images/customize/circle_1.png" alt="circle2">
                    <img class="shot" src="images/customize/000.png" alt="shot">
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

        <div class="content">
            <div class="product_img_wrap">
                <div class="product_img">
                    <img src="images/customize/watch/watch12/png/navy_y_blk.png" alt="">
                </div>
            </div>
            <div class="info_fill_wrap">
                <div class="info_board">
                    <div class="info_title">
                        <h1 class="fz-1">填寫資料</h1>
                        <p>總價：460,000 USD</p>
                    </div>
                    <div class="info_content">
                        <form action="" method="POST">
                            <div class="form_content_wrap">
                                <div class="info_data_wrap">
                                    <span class="fz-5">姓名：</span><input type="text" placeholder="請輸入姓名">
                                </div>
                            </div>
                            <div class="form_content_wrap">
                                <div class="info_data_wrap">
                                    <span class="fz-5">電話：</span><input type="text" placeholder="請輸入電話">
                                </div>
                            </div>
                            <div class="form_content_wrap">
                                <div class="info_data_wrap">
                                    <span class="fz-5">電郵：</span><input type="text" placeholder="請輸入電子信箱">
                                </div>
                            </div>
                            <div class="form_content_wrap">
                                <div class="info_data_wrap">
                                    <span class="transaction_place" fz-5">請選擇交貨地點</span><p class="location fz-6">座標：51.49 , 0.17</p>
                                </div>
                            </div>
                            <div class="map">
                               <div class="map_position map_position01">
                                    <i class="fas fa-truck-moving"></i>
                                   <div class="map_position_big map_position_big01"></div>
                               </div>
                               <div class="map_position map_position02">
                                    <i class="fas fa-truck-moving"></i>
                                    <div class="map_position_big map_position_big02"></div>
                               </div>
                               <div class="map_position map_position03">
                                    <i class="fas fa-truck-moving"></i>
                                    <div class="map_position_big map_position_big03"></div>
                               </div>
                               <div class="map_position map_position04">
                                    <i class="fas fa-truck-moving"></i>
                                    <div class="map_position_big map_position_big04"></div>
                               </div>
                            </div>
                            <div class="info_btn_wrap">
                                <a href="productDesign_watch.php" class="fz-6">上一步</a>
                                <a href="finish.php" class="fz-6">下一步</a>
                            </div>
                        </form>
                    </div>
                    
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