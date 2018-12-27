<?php include_once 'function/member.php'; ?>
<?php
if( is_login() ){  //己登入
?>


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

    <div class="background">
        <img src="images/cart/background.png" alt="">
    </div>

    <div class="step_wrap">
        <div class="step">
            <div class="circle circle_1">
                <a href="cart1.php">
                    <img src="images/customize/circle_2.png" alt="circle2">
                    <span class="number fz-4">1</span>
                </a>
                <span class="statement_01 fz-5">購物明細</span>
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
            <div class="line"></div>

            <div class="circle circle_4">
                <img src="images/customize/circle_2.png" alt="circle2">
                <span class="statement_04 fz-5">訂購成功</span>
                <span class="number fz-4">4</span>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="container title" id="lightBox">
            <div class="row">
                <div class="col-10 offset-1 col-md-5 offset-md-0 whitebg">
                    <div class="cart-table">
                        <form method="GET" action="cart2Rcvdetail.php">
                            <h2>訂購人資訊</h2>
                            <div class="cart-form-group">
                                <label for="name">姓名</label>
                                <input type="text" name="rcvname" required="required" class="form-control" id="name" value="<?php echo login_user('username'); ?>">
                                <div class="bottom-line"></div>
                            </div>
                            <div class="cart-form-group">
                                <label for="tel">電話</label>
                                <input type="tel" name="rcvtel" required="required" class="form-control" id="tel" value="<?php echo login_user('phone'); ?>">
                                <div class="bottom-line"></div>
                            </div>
                            <div class="cart-form-group lastfg">
                                <label for="email">電郵</label>
                                <input type="email" name="rcvemail" required="required" class="form-control" id="email" value="<?php echo login_user('email'); ?>">
                                <div class="bottom-line"></div>
                            </div>
                            <h2>請選交貨地點</h2>
                            <p class="locnum fz-6">座標：51.49 , 0.17</p>
                            <input type="hidden" name="locnum" value="51.49 , 0.17">
                            <div class="map">
                                <div class="pin blackprince">
                                    <i class="fas fa-truck-moving"></i>
                                    <img src="images/cart/blackprince.jpeg" alt="blackprince">
                                </div>
                                <div class="pin huntsman">
                                    <i class="fas fa-truck-moving"></i>
                                    <img src="images/cart/huntsman.jpg" alt="huntsman&son">
                                </div>
                                <div class="pin hat">
                                    <i class="fas fa-truck-moving"></i>
                                    <img src="images/cart/hat.jpg" alt="lock&co">
                                </div>
                                <div class="pin college">
                                    <i class="fas fa-truck-moving"></i>
                                    <img src="images/cart/colle.jpg" alt="college">
                                </div>
                            </div>
                            <div class="finbtn">
                                <div class="row">
                                    <div class="col-9 offset-3 col-md-7 offset-md-5">
                                        <a href="cart1.php" class="cart1-btn">上一步</a>
                                        <?php if(is_login()){ ?>
                                            <a href="#" class="cart1-btn rcvnext">送出</a>
                                        <?php }else{ ?>
                                            <a href="javascript:$.login();" class="cart1-btn">下一步</a>
                                        <?php } ?>
                                    </div>
                                </div>
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
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.com/libraries/fullPage.js"></script> -->
    <!-- jquery -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="js/common.js"></script>
    <!-- custom -->
    <script src="js/cart/submenu.js"></script>
    <script src="js/cart/cart.js"></script>

    <script src="js/chatbot.js"></script>
    <?php require_once 'template/common_navbar.php';?>

</body>

</html>

<?php }else header("Location:cart1.php"); //未登入 ?>