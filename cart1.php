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
            <div class="line"></div>

            <div class="circle circle_4">
                <img src="images/customize/circle_2.png" alt="circle2">
                <span class="statement_04 fz-5">訂購成功</span>
                <span class="number fz-4">4</span>
            </div>
        </div>
    </div>

    <form method="GET" action="cart1AddToSession.php" id="form">

    <div class="container" id="container">
        <div class="row whitebg">
            <div class="container title dn c3 itemList">
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

            <div class="container total c3">
                <div class="row">
                    <div class="col-5 offset-1 col-md-2 offset-md-8">
                        <p>小計</p>
                    </div>
                    <div class="col-6 col-md-2">
                        <p class="totalprice"></p>
                    </div>
                </div>
            </div>

            <div class="container coupon">
                <div class="row">
                    <div class="col-12 col-md-11">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <div class="cart-table">
                                    <h2>優惠券</h2>
                                    <div class="cart-form-group lastfg">
                                        <label for="coupon">優惠券編號</label>
                                        <input type="text" name="coupon" required="required" class="form-control" id="coupon">
                                        <div class="bottom-line"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <?php if(is_login()){ ?>
                                    <a href="#" class="cart1-btn couponbtn">使用優惠券</a>
                                <?php }else{ ?>
                                    <a href="javascript:$.login();" class="cart1-btn">使用優惠券</a>
                                <?php } ?>
                            </div>
                            <div class="col-6 col-md-1">
                                <div class="discount"></div>
                                <input class="discount" name="discount" type="hidden" value="">
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
                        <p class="totalprice couponprice"></p>
                    </div>
                </div>
            </div>

            <div class="container finbtn">
                <div class="row">
                    <div class="col-8 offset-4 col-md-4 offset-md-7">
                        <a href="mall.php" class="cart1-btn">繼續購物</a>
                        <?php if(is_login()){ ?>
                            <a href="#" class="cart1-btn next">下一步</a>
                        <?php }else{ ?>
                            <a href="javascript:$.login();" class="cart1-btn">下一步</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </form>

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

    <script src="js/cart/submenu.js"></script>
    <script src="js/cart/createCartList.js"></script>
    <script src="js/cart/cart.js"></script>
    <script src="js/chatbot.js"></script>
    <?php require_once 'template/common_js.php';?>

</body>

</html>