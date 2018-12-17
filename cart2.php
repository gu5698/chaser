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

<body class="customerdetail">

    <div id="header"></div>

    <div class="container title lightBox" id="lightBox" style="display:none;">
        <div class="row">
            <div class="col-10 offset-1 col-md-3 offset-md-4">
                <div class="cart-table">
                    <form method="POST" action="index.php" onsubmit="return check_select()">
                        <div class="stamp">
                            <h2 class="locnum">座標：51.49,-0.11</h2> <span class="shadow"></span>
                        </div>
                        <h2>訂購人資訊</h2>
                        <div class="cart-form-group">
                            <label for="name">接頭人</label>
                            <input type="text" name="name" required="required" class="form-control" id="name">
                            <div class="bottom-line"></div>
                        </div>
                        <div class="cart-form-group">
                            <label for="tel">電話</label>
                            <input type="tel" name="tel" required="required" class="form-control" id="tel">
                            <div class="bottom-line"></div>
                        </div>
                        <div class="cart-form-group">
                            <label for="email">電郵</label>
                            <input type="email" name="email" required="required" class="form-control" id="email">
                            <div class="bottom-line"></div>
                        </div>
                        <h2>優惠券</h2>
                        <div class="cart-form-group lastfg">
                            <label for="name">優惠券編號</label>
                            <input type="text" name="coupon" required="required" class="form-control" id="coupon">
                            <div class="bottom-line"></div>
                        </div>
                        <!-- <input type="submit" class="cart1-btn" value="送出"> -->
                        <a href="cart3.php" class="cart1-btn">送出
                            <i class="fas fa-caret-right"></i>
                        </a>
                    </form>
                </div>
            </div>
            <div id="close"></div>
        </div>
    </div>

    <div class="background mapimg">
        <img src="images/cart/Image 18.png" alt="">
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
                <img class="circle_1" src="images/customize/circle_1.png" alt="circle1">
                <img class="shot" src="images/customize/000.png" alt="shot">
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

    <div class="container title">
        <div class="row">
            <div class="col-12">
                <div class="map">
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.944684012856!2d121.19001421451404!3d24.967996584003384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346823c1ec904dcb%3A0xcdc129d4455ce456!2z5ZyL56uL5Lit5aSu5aSn5a24!5e0!3m2!1szh-TW!2stw!4v1538460774215" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                    <!-- <img src="images/cart/map.png" alt=""> -->
                    <div class="pin blackprince">
                        <i class="fas fa-truck-moving"></i>
                        <img src="images/cart/blackprince.jpeg" alt="blackprince" onclick="showLoginForm(51.4902634,-0.1169246)">
                    </div>
                    <div class="pin huntsman">
                        <i class="fas fa-truck-moving"></i>
                        <img src="images/cart/huntsman.jpg" alt="huntsman&son" onclick="showLoginForm(51.510902,-0.1423517)">
                    </div>
                    <div class="pin hat">
                        <i class="fas fa-truck-moving"></i>
                        <img src="images/cart/hat.jpg" alt="lock&co" onclick="showLoginForm(51.5057266,-0.1404056)">
                    </div>
                    <div class="pin college">
                        <i class="fas fa-truck-moving"></i>
                        <img src="images/cart/colle.jpg" alt="college" onclick="showLoginForm(51.4987997,-0.1770659)">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container finbtn">
        <div class="row">
            <div class="col-5 col-md-2 offset-md-1">
                <a href="cart1.php" class="cart1-btn">
                    <i class="fas fa-caret-left"></i>上一步
                </a>
            </div>
            <div class="col-7 col-md-3 offset-md-5">
                <!-- <input class="cart1-btn" type="submit" value="結帳"> -->
                <p class="fz-3">請選交貨地點</p>
                <!-- <a href="#" class="cart1-btn">
                    <i class="fas fa-caret-right"></i>
                </a> -->
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
    <!-- <script src="https://cdnjs.com/libraries/fullPage.js"></script> -->
    <!-- jquery -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="js/common.js"></script>
    <!-- custom -->
    <script src="js/cart.js"></script>

    <script src="js\chatbot.js"></script>
    <?php require_once 'template/common_navbar.php';?>

</body>

</html>