<?php include_once 'function/member.php'; ?>
<?php is_login();?>

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
    <div id="header"></div>

    <div class="background">
        <img src="images/cart/background.png" alt="">
    </div>

    <div class="step_wrap">
        <div class="step">
            <div class="circle circle_1">
                <img src="images/customize/circle_2.png" alt="circle2">
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
                <img class="circle_1" src="images/customize/circle_1.png" alt="circle1">
                <img class="shot" src="images/customize/000.png" alt="shot">
                <span class="statement_03 fz-5">確認訂單</span>
                <span class="number fz-4">3</span>
            </div>
        </div>
    </div>

    <div class="container" style="padding-bottom: 3rem;">
        <div class="row whitebg">
        <div class="container title c3 dn">
            <div class="row">
                <div class="col-10 offset-1 list_border">
                    <div class="row">
                        <div class="col-md-3 offset-md-1">
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

        <div class="container c3">
            <div class="row">

                <?php
                $total = 0;
                foreach($_SESSION["pname"] as $psn => $pname) {
                    $subTotal = $_SESSION["price"][$psn] * $_SESSION["qty"][$psn];
                    $total += $subTotal;
                ?>

                <div class="col-5 offset-1 col-md-12 mddn list_border">
                    <div class="row">
                        <div class="col-md-3 offset-md-1 pb">
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
                <div class="col-5 col-md-10 offset-md-1 list_border">
                    <div class="row">
                        <div class="col-md-3 offset-md-1">
                            <h3><?php echo $_SESSION["pname"][$psn];?></h3>
                            <p>毒針</p>
                            <p>錄音</p>
                        </div>
                        <div class="col-md-3">
                            <p><?php echo $_SESSION["price"][$psn];?></p>
                        </div>
                        <div class="col-md-3">
                            <p><?php echo $_SESSION["qty"][$psn];?></p>
                        </div>
                        <div class="col-md-2">
                            <p><?php echo $subTotal;?></p>
                        </div>
                    </div>
                </div>

                <?php } ?>

            </div>
        </div>


        <div class="container c3">
            <div class="row">
                <div class="col-5 offset-1 col-md-12 mddn list_border">
                    <div class="row">
                        <div class="col-md-3 offset-md-1 pb">
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
                <div class="col-5 col-md-10 offset-md-1 list_border">
                    <div class="row">
                        <div class="col-md-3 offset-md-1">
                            <h3>特製鋼筆</h3>
                            <p>毒針</p>
                            <p>錄音</p>
                        </div>
                        <div class="col-md-3">
                            <p>2000</p>
                        </div>
                        <div class="col-md-3">
                            <p>1</p>
                        </div>
                        <div class="col-md-2">
                            <p>2000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container total c3">
            <div class="row">
                <div class="col-10 offset-1 list_border">
                    <div class="row">
                        <div class="col-6 col-md-2 offset-md-8">
                            <p>商品小計</p>
                        </div>
                        <div class="col-6 col-md-2">
                            <p><?php echo $total; ?></p>
                        </div>
                        <div class="col-6 col-md-5 offset-md-1">
                            <h3>使用折價券號碼</h3>
                        </div>
                        <div class="col-6 col-md-4">
                            <p><?php echo $_SESSION["coupon"];?></p>
                        </div>
                        <div class="col-6 mddn">
                            <h3>優惠方式</h3>
                        </div>
                        <div class="col-6 col-md-2">
                            <p>95折</p>
                        </div>
                        <div class="col-6 col-md-9 offset-md-1">
                            <p>折扣後價格</p>
                        </div>
                        <div class="col-6 col-md-2">
                            <p><?php echo $total; ?></p>
                        </div>
                        <div class="col-5 offset-1 col-md-2 offset-md-8">
                            <p>總計</p>
                        </div>
                        <div class="col-6 col-md-2">
                            <p><?php echo $total; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container c3">
            <div class="row">
                <div class="col-10 offset-1 col-md-10">
                    <div class="row">
                        <div class="col-6 col-md-5 offset-md-1">
                            <h3>接頭人</h3>
                        </div>
                        <div class="col-6 col-md-5">
                            <p><?php echo $_SESSION["rcvname"]?></p>
                        </div>
                        <div class="col-6 col-md-5 offset-md-1">
                            <h3>電話</h3>
                        </div>
                        <div class="col-6 col-md-5">
                            <p><?php echo $_SESSION["rcvtel"]?></p>
                        </div>
                        <div class="col-6 col-md-5 offset-md-1">
                            <h3>電郵</h3>
                        </div>
                        <div class="col-6 col-md-5">
                            <p><?php echo $_SESSION["rcvemail"]?></p>
                        </div>
                        <div class="col-6 col-md-5 offset-md-1">
                            <h3>交貨地點座標</h3>
                        </div>
                        <div class="col-6 col-md-5">
                            <p><?php echo $_SESSION["locnum"]?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container finbtn">
            <div class="row">
                <div class="col-9 offset-3 col-md-4 offset-md-7">
                    <a href="cart2.php" class="cart1-btn">上一步</a>
                    <a href="cartToDb.php" class="cart1-btn">確認送出訂單</a>
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

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
    <!-- jquery -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="js/common.js"></script>
    <!-- custom -->
    <script src="js/cart.js"></script>

    <script src="js\chatbot.js"></script>
    <?php require_once 'template/common_navbar.php';?>

</body>

</html>