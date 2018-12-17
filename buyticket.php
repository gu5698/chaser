<?php include_once 'function/member.php';?>

<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Chaser</title>
    <?php require_once 'template/common_css.php'; ?>
    <link rel="stylesheet" type="text/css" href="css/loading.css" />
    <link rel="stylesheet" href="css/buyticket.min.css" />
    <script src="js/loading/modernizr.custom.js"></script>
    <link rel="stylesheet" href="css/chatbot.css">
   
    <!-- /anl -->
    <script src="js/creditly1.js"></script>
    <script src="js/creditly2.js"></script>
    <script type="text/javascript">
        $(function () {
            var creditly = Creditly.initialize(
                '.creditly-wrapper .expiration-month-and-year',
                '.creditly-wrapper .credit-card-number',
                '.creditly-wrapper .security-code',
                '.creditly-wrapper .card-type');
            $(".creditly-card-form .submit").click(function (e) {
                e.preventDefault();
                var output = creditly.validate();
                if (output) {
                    // Your validated credit card output
                    console.log(output);
                }
            });
        });
    </script>
</head>
<body>
    <!-- /anl -->
    <div id="ip-container" class="ip-container">
        <header class="ip-header">
            <h1 class="ip-logo"><img class="ip-inner" src="images/logo.png" /></h1>
            <div class="ip-loader">
                <svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
                    <path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z" />
                    <path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z" />
                </svg>
            </div>
        </header>
        <?php require_once 'template/common_navbar.php'; ?>
        <!-- /anl -->
        <div class="nothing-box"></div>

        <div class="wrap">
            <div class="container">
                <div class="row">
                        
                    <div class="col-12">
                        <div class="main1">
                            <table>
                                <tr>
                                    <td class="fz-4">
                                        <div class="tabbox fz-3">購票資訊</div>
                                        購票明細
                                    </td class="fz-4">
                                    <td class="fz-4">門票價格</td>
                                    <td class="fz-4 phon-hidden">門票數量</td>
                                    <td class="fz-4 phon-hidden">總計</td>
                                </tr>
                                <form method="post" action="ticketdoing.php" id="ticketfrom">
                                <tr>
                                    <td class="downtd tkname fz-4">特務藝廊門票</td>
                                    <td class="downtd price fz-4"><span class="money" id="money">420</span>USD</td><input type="hidden" name="singlemoney" value="420">
                                    <td class="downtd many fz-4 phon-hidden">
                                        <i class="fas fa-minus idt"></i>
                                        <i class="fas fa-plus iphone"></i>
                                        <input type="text" name="tick_much" value="1" id="manybox" disabled><input type="hidden" name="much" value="1" id="hiddenmuch">
                                        <i class="fas fa-minus iphone"></i>
                                        <i class="fas fa-plus idt"></i>
                                    </td>
                                    <td class="downtd totalprice fz-4 phon-hidden xprice"><span class="money" id="totalmoney">420</span>USD</td><input type="hidden" id="hiddentext"name="totalmoney" value="420">
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="main2">
                            <table>
                                <tr>
                                    <td>
                                        <div class="tabbox fz-3"><span>訂購人資訊</span></div>
                                        <input type="hidden" name="mem_id" value="<?=$_SESSION['member']["id"]?>">
                                        <p><span class="fz-4">姓名</span><input type="text" name="name"id="name" value="<?= $_SESSION['member']['username']?>"></p>
                                        <p><span class="fz-4">電話</span><input type="tel" name="tel" id="tel" value="<?=$_SESSION['member']["phone"]?>"></p>
                                        <p><span class="fz-4">電子信箱</span><input type="email" name="email"id="email" value="<?=$_SESSION['member']["email"]?>"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tdfooter fz-4">本票卷無實體售票，僅有電子票卷將會送到會員專區，謝謝!!!</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </form>

                    <div class="col-12">
                        <div class="main3">
                            <section class="creditly-wrapper">
                                <div class="credit-card-wrapper">
                                    <div class="first-row form-group">
                                        <div class="col-12 col-md-8 controls">
                                            <label class="control-label fz-4">信用卡卡號</label>
                                            <input class="number credit-card-number form-control" type="text" name="number"
                                                pattern="\d*" inputmode="numeric" autocomplete="cc-number"
                                                autocompletetype="cc-number" x-autocompletetype="cc-number" placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;">
                                        </div>
                                        <div class="col-12 col-md-4 controls">
                                            <label class="control-label fz-4">三碼檢查碼</label>
                                            <input class="security-code form-control" inputmode="numeric" pattern="\d*"
                                                type="text" name="security-code" placeholder="&#149;&#149;&#149;">
                                        </div>
                                    </div>
                                    <div class="second-row form-group">
                                        <div class="col-12 col-md-8 controls">
                                            <label class="control-label control-labeld fz-4">持卡人姓名</label>
                                            <input class="billing-address-name form-control" type="text" name="name"
                                                placeholder="Amos Lee">
                                        </div>
                                        <div class="col-12 col-md-4 controls">
                                            <label class="control-label control-labeld fz-4">到期日</label>
                                            <input class="expiration-month-and-year form-control" type="text" name="expiration-month-and-year"
                                                placeholder="MM / YY">
                                        </div>
                                    </div>
                                    <div class="card-type"></div>
                                </div>
                            </section>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="main4">
                            <a class="fz-4 okbtn" id="okbtn" name="">結帳</a>
                            <a href="gallery.php" class="fz-4 okbtn" id="okbtn2" name="">返回藝廊</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /anl -->
        <?php include_once 'chatbot.php'; ?>
        <!-- start footer -->
        <footer class="footer">
            <div class="fz-small">© 2018 Chaser. All Rights Reserved.</div>
        </footer>
        <!-- end footer -->
        <!-- /anl -->
        <div class="myalert" id="myalert">
            <div class="alertnav">
                <span class="fz-3">警告</span>
            </div>
            <h3 class="alerttitle fz-2" id="alerttitle"></h3>
            <button class="okalertbtn fz-4" id="okalertbtn">確定</button>
        </div>
        <!-- /anl -->
    </div>
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- TweenMax CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
    <!-- JC-JS -->
    <script src="js/loading/classie.js"></script>
    <script src="js/loading/pathLoader.js"></script>
    <script src="js/loading/main.js"></script>
    <script src="js/buyticket.js"></script>
     <script src="js\chatbot.js"></script>
    <?php require_once 'template/common_js.php'; ?>
</body>

</html>