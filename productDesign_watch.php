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
    <link rel="stylesheet" href="css/productDesign_watch.css">
    <script src="js/Chart.bundle.js"></script>
    <script src="js/utils.js"></script>
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
                            <div id="chartgroup01" class="item_content">
                                <button id="chartbtn01" class="item_content_row01 item_content_option item_content_option01 active" >
                                </button>
                                <button id="chartbtn02" class="item_content_row01 item_content_option item_content_option02" ></button>
                            </div>
                        </div>
                    </div>

                    <div class="item item02">
                        <div class="item_title">
                            <p class="fz-4">錶帶</p><i class="fas fa-angle-down fz-4"></i>
                        </div>
                        <div class="item_content_wrap">
                            <div id="chartgroup02" class="item_content">
                                <button id="chartbtn03" obj="obj3" class="item_content_row02 item_content_option item_content_option03 active" ></button>
                                <button id="chartbtn04" obj="obj4" class="item_content_row02 item_content_option item_content_option04" ></button>
                                <button id="chartbtn05" obj="obj5" class="item_content_row02 item_content_option item_content_option05" ></button>
                            </div>
                        </div>
                    </div>

                    <div class="item item03">
                        <div class="item_title">
                            <p class="fz-4">內置武器</p><i class="fas fa-angle-down fz-4"></i>
                        </div>
                        <div class="item_content_wrap">
                            <div id="chartgroup03" class="item_content">
                                <button id="chartbtn06" class="item_content_row03 item_content_option item_content_option06 active" ></button>
                                <button id="chartbtn07" class="item_content_row03 item_content_option item_content_option07" ></button>
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
                                        <input type="file" accept=".png,.jpg" class="upload_pic" id="uploadPic" onclick="this.value=null"/>
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

                    <!-- 傳奠資料給productTempImages -->
                    <form method="post" accept-charset="utf-8" name="form1">
                        <input name="hidden_data" id='hidden_data' type="hidden"/>
                    </form>
                    <a href="fill_info.php" class="btnCustomize fz-6" onclick="saveImage()">
                    下一步
                    <!-- <p class="fz-6">下一步</p> -->
                    </a>

                    <!-- 測試用button -->
                    <!-- <button href="fill_info.html#1" class="btnCustomize fz-6" onclick="saveImage()">下一步</button> -->

                </div>


            </div>
            <div class="mid_part">
                <div class="tech_circle_wrap">
                    <img class="tecCircle01" src="images/customize/tech_circle.png" alt="tech_circle">
                    <img class="tecCircle02" src="images/customize/tech_circle_2.png" alt="tech_circle_2">
                    <div class="cuProduct" id="cuProduct">
                        <img src="images/customize/watch/watch12/png/killy_y_blk.png" alt="" id="cuShow">
                        <div id="pic_dropPostion"></div>
                    </div>
                </div>

                <!-- canvas start uploadimgs Start  -->
                <canvas id="myCanvas" style="display:none"></canvas>
                <!-- style="display:none" -->
                <!-- canvas start uploadimgs end   -->

            </div>
            <div class="right_part">
                <div class="name_wrap">
                    <p class="name fz-5">射擊手錶</p>
                    <p class="price fz-5">7,600 USD</p>
                    <div class="name_wrap_line"></div>
                    <div class="name_wrap_line-circle"></div>
                </div>
                <div class="cu_chart">
                    <canvas id="ability" ></canvas>
                    <input type="hidden" id="atk" class="txt" name="" value="7" />
                    <input type="hidden" id="def" class="txt" name="" value="4" />
                    <input type="hidden" id="dex" class="txt" name="" value="7" />
                    <input type="hidden" id="dur" class="txt" name="" value="5" />
                    <input type="hidden" id="hide" class="txt" name="" value="7" />
                </div>
            </div>

        </div>
    </div>






    <!-- start footer -->
    <footer class="footer">
        <div class="fz-small">© 2018 Chaser. All Rights Reserved.</div>
    </footer>
    <!-- end footer -->

<?php include_once 'chatbot.php'; ?>

<!-- 主內容 END -->

<?php require_once 'template/common_js.php';?>

<!-- 個人js START -->
    <script src="js/chatbot.js"></script>
    <script src="js/cuShowItem.js"></script>
    <script src="js/chartChange_watch.js"></script>
    <script src="js/dragdrop.js"></script>
    <script src="js/scale.js"></script>
    <script src="js/del_pic.js"></script>
    <script src="js/cuWatch.js"></script>
    <script src="js/productUploadImg.js"></script>
    <script src="js/productlLoadSaveImg.js"></script>
<!-- 個人js END -->

</body>
</html>