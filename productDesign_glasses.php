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
<link rel="stylesheet" href="css/productDesign_glasses.css">
    <script src="js/Chart.min.js"></script>

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
                    <!-- <img class="shot" src="images/customize/000.png" alt="shot"> -->
                    <span class="statement_01 fz-6">選擇商品</span>
                    <span class="number fz-4">1</span>
                </div>
                <div class="line"></div>

                <div class="circle circle_2">
                    <img src="images/customize/circle_1.png" alt="circle2">
                    <img class="shot" src="images/customize/000.png" alt="shot">
                    <span class="statement_02 fz-6">設計商品</span>
                    <span class="number fz-4">2</span>
                </div>
                <div class="line"></div>

                <div class="circle circle_3">
                    <img src="images/customize/circle_2.png" alt="circle2">
                    <span class="statement_03 fz-6">交貨資訊</span>
                    <span class="number fz-4">3</span>
                </div>
                <div class="line"></div>

                <div class="circle circle_4">
                    <img src="images/customize/circle_2.png" alt="circle2">
                    <span class="statement_04 fz-6">成功訂貨</span>
                    <span class="number fz-4">4</span>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="left_part">
                <div class="item_wrap">
                    <div class="item item01">
                        <div class="item_title">
                            <p class="fz-4">款式</p><i class="fas fa-angle-down fz-4"></i>
                        </div>
                        <div class="item_content_wrap">
                            <div class="item_content">
                                <button class="item_content_row01 item_content_option item_content_option01 active" onclick="designItem01(event)">
                                </button>
                                <button class="item_content_row01 item_content_option item_content_option02" onclick="designItem01(event)"></button>
                            </div>
                        </div>
                    </div>

                    <div class="item item02">
                        <div class="item_title">
                            <p class="fz-4">配色</p><i class="fas fa-angle-down fz-4"></i>
                        </div>
                        <div class="item_content_wrap">
                            <div class="item_content">
                                <button class="item_content_row02 item_content_option item_content_option03 active" onclick="designItem02(event)"></button>
                                <button class="item_content_row02 item_content_option item_content_option04" onclick="designItem02(event)"></button>
                                <button class="item_content_row02 item_content_option item_content_option05" onclick="designItem02(event)"></button>
                            </div>
                        </div>
                    </div>

                    <div class="item item03">
                        <div class="item_title">
                            <p class="fz-4">能力</p><i class="fas fa-angle-down fz-4"></i>
                        </div>
                        <div class="item_content_wrap">
                            <div class="item_content">
                                <button class="item_content_row03 item_content_option item_content_option06 active" onclick="designItem03(event)"></button>
                                <button class="item_content_row03 item_content_option item_content_option07" onclick="designItem03(event)"></button>
                            </div>
                        </div>
                    </div>

                    <div class="item item04">
                        <div class="item_title">
                            <p class="fz-4">圖案</p><i class="fas fa-angle-down fz-4"></i>
                        </div>
                        <div class="item_content_wrap">
                            <div class="item_content">
                                <p class="dragpic_statement fz-small">請將圖片拖曳至虛線框內</p>
                                <div class="first_part">
                                    <div class="item_content_option">
                                        <img src="images/customize/logo_1.png" alt="logo_1" id="drag_logo01">
                                    </div>
                                    <div class="item_content_option">
                                        <img src="images/customize/logo_2.png" alt="logo_2" id="drag_logo02">
                                    </div>
                                    <div class="item_content_option">
                                        <img src="images/customize/logo_3.png" alt="logo_3" id="drag_logo03">
                                    </div>
                                </div>
                                <div class="second_part">
                                    <div class="function_btn">
                                        <div id="scaleBigger" class="bigger">
                                                <img src="images/customize/cuControlBig.png" alt="bigger">
                                        </div>
                                        <div id="scaleSmaller" class="smaller">
                                            <img src="images/customize/cuControlSmall.png" alt="smaller">
                                        </div>
                                        <div  id="del_btn" class="delete">
                                            <img src="images/customize/cuControlDelete.png" alt="Delete">
                                        </div>
                                    </div>
                                    
                                    <label class="upload_pic">
                                        <input type="file" accept=".png,.jpg" class="upload_pic" />
                                        <p class="fz-small">上傳圖片<span class="fz-small">(png/jpg)</span></p>
                                    </label>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="btn_wrap">
                    <a href="productSelect.php" class="btnCustomize fz-6">
                        上一步
                        <!-- <p class="fz-6">上一步</p> -->
                    </a>
                    <a href="fill_info.php" class="btnCustomize fz-6">
                        下一步
                        <!-- <p class="fz-6">下一步</p> -->
                    </a>
                </div>


            </div>
            <div class="mid_part">
                <div class="tech_circle_wrap">
                    <img class="tecCircle01" src="images/customize/tech_circle.png" alt="tech_circle">
                    <img class="tecCircle02" src="images/customize/tech_circle_2.png" alt="tech_circle_2">
                    <div class="cuProduct">
                        <img src="images/customize/glasses/circle-black-特效分析.gif" alt="">
                        <div id="pic_dropPostion"></div>
                    </div>
                </div>

            </div>
            <div class="right_part">
                <div class="name_wrap">
                    <p class="name fz-3">科技眼鏡</p>
                    <p class="price fz-4">8,600 USD</p>
                    <div class="name_wrap_line"></div>
                    <div class="name_wrap_line-circle"></div>
                </div>
                <div class="cu_chart">
                    <canvas id="ability" ></canvas>
                </div>
            </div>

        </div>
    </div>





    <!-- start footer -->
    <footer class="footer">
        <div class="fz-small">© 2018 Chaser. All Rights Reserved.</div>
    </footer>
    <!-- end footer -->

<!-- 主內容 END -->

<!-- 個人js START -->

<script src="js/chart.js"></script>
<script src="js/cuShowItem.js"></script>
<script src="js/dragdrop.js"></script>
<script src="js/scale.js"></script>
<script src="js/del_pic.js"></script>
<script src="js/designItem.js"></script>

<!-- 個人js END -->

<?php require_once 'template/common_js.php';?>

</body>
</html>