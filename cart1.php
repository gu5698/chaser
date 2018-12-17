<?php include_once 'function/member.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chaser</title>

    <?php require_once 'template/common_css.php';?>

    <!-- custom -->
    <link rel="stylesheet" href="css/cart.css">
</head>

<body>
    <?php require_once 'template/common_navbar.php';?>

    <div id="header"></div>

    <div class="background">
        <img src="images/cart/background.png" alt="">
    </div>

    <!-- <div class="whitebg"></div> -->

    <div class="step_wrap">
        <div class="step">
            <div class="circle circle_1">
                <img class="circle_1" src="images/customize/circle_1.png" alt="circle1">
                <img class="shot" src="images/customize/000.png" alt="shot">
                <span class="statement_01 fz-5">購物明細</span>
                <span class="number fz-4">1</span>
            </div>
            <div class="line"></div>

            <div class="circle circle_2">
                <img src="images/customize/circle_2.png" alt="circle2">
                <span class="statement_02 fz-5">填寫資料</span>
                <span class="number fz-4">2</span>
            </div>
            <div class="line"></div>

            <div class="circle circle_3">
                <img src="images/customize/circle_2.png" alt="circle2">
                <span class="statement_03 fz-5">確認訂單</span>
                <span class="number fz-4">3</span>
            </div>
        </div>
    </div>

    <div class="whitebg">

        <div class="container title dn c3">
            <div class="row">
                <div class="col-8 offset-3 list_border">
                    <div class="row">
                        <div class="col-md-3">
                            <p>商品資料</p>
                        </div>
                        <div class="col-md-3">
                            <p>單件價格</p>
                        </div>
                        <div class="col-md-3">
                            <p>數量</p>
                        </div>
                        <div class="col-md-2">
                            <p>小計</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container products">
            <div class="row">
                <div class="col-5 col-md-3">
                    <img class="img" src="images/mall/item4.png" alt="">
                </div>
                <div class="col-6 list_border col-md-8">
                    <div class="row">
                        <div class="col-9 col-md-3">
                            <h3>特製鋼筆</h3>
                            <p>毒針</p>
                            <p>錄音</p>
                        </div>
                        <div class="col-9 col-md-2">
                            <p>2000</p>
                        </div>
                        <div class="col-9 col-md-4 quantity">
                            <span class="g-c">
                                <i class="fas fa-minus"></i>
                            </span>
                            <input type="number" value="1" min="1">
                            <span class="g-c">
                                <i class="fas fa-plus"></i>
                            </span>
                        </div>
                        <div class="col-md-2 dn">
                            <p>2000</p>
                        </div>
                        <div class="col-1 col-md-1 drop">
                            <span class="g-c">
                                <i class="fas fa-trash-alt"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container products">
            <div class="row">
                <div class="col-5 col-md-3">
                    <img class="img" src="images/mall/item4.png" alt="">
                </div>
                <div class="col-6 list_border col-md-8">
                    <div class="row">
                        <div class="col-9 col-md-3">
                            <h3>特製鋼筆</h3>
                            <p>毒針</p>
                            <p>錄音</p>
                        </div>
                        <div class="col-9 col-md-2">
                            <p>2000</p>
                        </div>
                        <div class="col-9 col-md-4 quantity">
                            <span class="g-c">
                                <i class="fas fa-minus"></i>
                            </span>
                            <input type="number" value="1" min="1">
                            <span class="g-c">
                                <i class="fas fa-plus"></i>
                            </span>
                        </div>
                        <div class="col-md-2 dn">
                            <p>2000</p>
                        </div>
                        <div class="col-1 col-md-1 drop">
                            <span class="g-c">
                                <i class="fas fa-trash-alt"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container total c3">
            <div class="row">
                <div class="col-5 offset-1 col-md-2 offset-md-8">
                    <p>總計</p>
                </div>
                <div class="col-6 col-md-2">
                    <p>4000元</p>
                </div>
            </div>
        </div>

    </div>

    <div class="container finbtn">
        <div class="row">
            <div class="col-5 offset-1 col-md-5">
                <a href="mall.php" class="cart1-btn">
                    <i class="fas fa-shopping-basket"></i>繼續購物
                </a>
            </div>
            <div class="col-5 col-md-5">
                <a href="cart2.php" class="cart1-btn">下一步
                    <i class="fas fa-caret-right"></i>
                </a>
            </div>
        </div>
    </div>
    <?php include_once 'chatbot.php'; ?>

    <!-- start footer -->
    <footer class="footer">
        <div class="fz-small">© 2018 Chaser. All Rights Reserved.</div>
    </footer>
    <!-- end footer -->

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
    <!-- jquery -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="js/common.js"></script>
    <!-- custom -->
    <script src="js/cart.js"></script>

    <script src="js\chatbot.js"></script>
    <?php require_once 'template/common_js.php';?>

</body>

</html>