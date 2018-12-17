<?php
    require_once("connection.php");

    $order_id = $_GET["order_id"];
    $name = $_GET["name"];
    $time = $_GET["time"];
    $much = $_GET["much"];
    $single_money = $_GET["single_money"];
    $total_money = $_GET["total_money"];

    $order_id = str_pad($order_id,7,'0',STR_PAD_LEFT);

    $sql = "select qrc_id from qrc_ticket where t_order_id={$order_id} AND qrc_caniuse=1;";
    $pdoStatement = $pdo->query( $sql);
    $rows = $pdoStatement->fetchAll();;
?>
<?php include_once 'function/member.php'; ?>
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
    <link rel="stylesheet" href="css/chatbot.css">
    <script src="js/loading/modernizr.custom.js"></script>
    <!-- /anl -->
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
                        <div class="main5">
                            <h2>恭喜你 購票成功</h2>
                            <h2>Your order is now confirmed.</h2>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="main6">
                            <table>
                                <tr>
                                    <td>
                                        <span class="spleft">訂票編號</span>
                                        <span class="spright">ticket<?=$order_id?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="spleft">訂購人</span>
                                        <span class="spright"><?=$name?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="spleft">購買時間</span>
                                        <span class="spright"><?=$time?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="spleft">門票數量</span>
                                        <span class="spright"><?=$much?>張</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="spleft">門票單價</span>
                                        <span class="spright"><?=$single_money?>&nbsp&nbspUSD</span>
                                    </td>
                                </tr>
                                <tr class="totaltr">
                                    <td>
                                        <span class="spleft">總計</span>
                                        <span class="spright"><?=$total_money?>&nbsp&nbspUSD</span>
                                    </td>
                                    <td class="tdfooter fz-4">
                                        您購買特務藝廊的QRCode門票可以在會員專區查詢喔!!!
                                    </td>
                                    <td class="tdfooter fz-4">
                                        <a href="gallery.php" class="back" id="" name="">返回藝廊</a>
                                        <a href="#/" class="back" id="qrcbtn" name="">QRCode</a>
                                        <a href="member.php" class="back" id="" name="">會員專區</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="qrcode_view">
            <div class="alertnav">
                <span class="fz-3">QRCode門票</span>
                <span class="close fz-3"><i class="fas fa-times"></i></span>
            </div>
            <div class="row">
                <?php foreach( $rows as $row):?>
                    <div class="col-12 col-md-4">
                        <div class="qrcode_item" id="qrcode_item">
                            <?php 
                                $qrc_id = $row["qrc_id"];
                                echo "<img src='https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=http://140.115.236.72/demo-projects/CD104/CD104G4/qrcode.php?qrcodenum={$qrc_id}&choe=UTF-8' title='傳奇特務展'>";    
                            ?>	
                        </div>
                    </div> 
                <?php endforeach;?>
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
    </div>
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- TweenMax CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
    <!-- JC-JS -->
    <script src="js/loading/classie.js"></script>
    <script src="js/loading/pathLoader.js"></script>
    <script src="js/loading/main.js"></script>
    <script src="js\chatbot.js"></script>
    <?php require_once 'template/common_js.php'; ?>
    
    <script>
        $(document).ready(function () {
        
            resize();
            function resize() {
                left = $(window).width()/2 - ($('.qrcode_view').width() / 2);
                $('.qrcode_view').css({
                    left:left + 'px'
                })
            }

            $('#qrcbtn').click(function () { 
                resize();
                $('.qrcode_view').show();
            });
            $('.close').click(function () { 
                $('.qrcode_view').hide();
            });
        });  
    </script>
  
</body>

</html>