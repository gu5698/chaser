<?php
    try {
        require_once "connectchaser.php";

        $sqlMission = "SELECT * FROM mission";

        $pdostmMission = $pdo -> query($sqlMission);
        $missions = $pdostmMission -> fetchAll(PDO::FETCH_ASSOC);

        // print_r($missions);
        $missionsLen = count($missions);
        // echo "missionsLen:", $missionsLen;
        $missionsJson = json_encode($missions); //!!!

        //======================================================
        $sqlProduct = "SELECT * FROM product";

        $pdostmProduct = $pdo -> query($sqlProduct);
        $products = $pdostmProduct -> fetchAll(PDO::FETCH_ASSOC);

        // print_r($products);
        $productsLen = count($products);
        // echo "productsLen:", $productsLen;
        $productsJson = json_encode($products); //!!!
 
        //======================================================
        
    } catch (PDOException $e) {
        echo "錯誤原因:", $e->getMessage(), "<hr>";
        echo "錯誤行號:", $e->getLine(), "<hr>";
    }
?>


<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chaser</title>
    <!-- loading -->
    <link rel="stylesheet" type="text/css" href="css/loading.css" />
    <!-- favicon -->
    <link rel="shortcut icon" href="images/common/favicon.ico" type="image/x-icon">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- custom -->
    <link rel="stylesheet" href="css/scroll.css">
    <link rel="stylesheet" href="css/index.css">
    <script>
        let missionsJson = JSON.parse(`<?php echo $missionsJson; ?>`);
        let productsJson = JSON.parse(`<?php echo $productsJson; ?>`);
    </script>
</head>
<body>
    <!-- start loading -->
    <div id="ip-container" class="ip-container">
        <header class="ip-header">
            <h1 class="ip-logo"><img id="loading-logo" class="ip-inner" src="images/logo.png" /></h1>
            <div class="ip-loader">
                <svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
                    <path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z" />
                    <path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z" />
                </svg>
            </div>
        </header>
    </div>
    <!-- end loading -->


    <!-- start navbar -->
    <!-- 到時候在各自頁面加上active -->
    <nav id="navbar" class="navbar">
        <div id="navbar-toggle" class="navbar-toggle"><i class="fas fa-bars"></i></div>
        <ul class="navbar-menu">
            <li class="navbar-item navbar-logo"><a href="index.html"><img id="img-logo" src="images/common/logo.svg" alt="logo"></a></li>
            <li id="navbar-link-customize" class="navbar-item navbar-link">
                <a href="#">
                    <img class="navbar-link-icon" src="images/common/navbar-customize.svg" alt="navbar-customize">
                    <div class="title">裝備客製<span class="d-block fz-6">CUSTOMIZE</span></div>
                </a>
            </li>
            <li id="navbar-link-mall" class="navbar-item navbar-link">
                <a href="#">
                    <img class="navbar-link-icon" src="images/common/navbar-mall.svg" alt="navbar-customize">
                    <div class="title">裝備商城<span class="d-block fz-6">MARKET</span></div>
                </a>
            </li>
            <li id="navbar-link-gallery" class="navbar-item navbar-link">
                <a href="#">
                    <img class="navbar-link-icon" src="images/common/navbar-gallery.svg" alt="navbar-customize">
                    <div class="title">傳奇特務藝廊<span class="d-block fz-6">GALLERY</span></div>
                </a>
            </li>
            <li id="navbar-link-about" class="navbar-item navbar-link">
                <a href="#">
                    <img class="navbar-link-icon" src="images/common/navbar-about.svg" alt="navbar-customize">
                    <div class="title">關於我們<span class="d-block fz-6">ABOUT</span></div>
                </a>
            </li>
            <li class="navbar-item navbar-icon icon-member"><a href="#"><i class="fas fa-user-secret"></i></a></li>
            <li class="navbar-item navbar-icon icon-cart">
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
                <ol class="sub-menu fz-5">
                    <li class="shoplist">
                        <img class="product-img" src="images/mall/item4.png" alt="shoplist">
                        <div class="product-name">防彈傘</div>
                        <div class="product-price">200000000000</div>
                        <i class="far fa-trash-alt icon-delete"></i>
                    </li>
                    <li class="shoplist">
                            <img class="product-img" src="images/mall/item4.png" alt="shoplist">
                            <div class="product-name">防彈傘</div>
                            <div class="product-price">2000</div>
                            <i class="far fa-trash-alt icon-delete"></i>
                        </li>
                    <a href="#" class="cart-btn btn-solid">結帳</a>
                </ol>
                <div class="list-counter">2</div>
            </li>
        </ul>
    </nav>
    <!-- end navbar -->

    <!-- start chatbot -->
    <div id="chatbot" class="chatbot">
        <div id="avatar" class="avatar">
            <img src="images/common/chatbot-body.svg" alt="chatbot-body" class="chatbot-body">
            <img src="images/common/chatbot-head-1.svg" alt="chatbot-head-1" id="chatbot-head" class="chatbot-head">
            <img src="images/common/chatbot-hat.svg" alt="chatbot-hat" class="chatbot-hat">
        </div>
        <div id="greeting" class="greeting fz-p">
            <div class="message">&#11014;&#11014;&#11015;&#11015;&#11013;&#11157;&#11013;&#11157;&#9399;&#9398;</div>
            <i id="greeting-close" class="far fa-times-circle"></i>
        </div>
        <div class="message-window">
            <div id="message-head" class="message-head">
                <div class="title fz-6">CHASER</div>
                <i class="fas fa-comments icon-message"></i>
                <i class="fas fa-angle-up icon-minimize"></i>
            </div>
            <div id="message-body" class="message-body">
                <div class="message message-bot"><a href="#">歡迎來到CHASER</a></div>
            </div>
            <div class="message-input">
                <textarea id="message-textarea"></textarea>
                <i id="message-submit" class="fab fa-telegram-plane icon-submit"></i>
            </div>
        </div>
    </div>
    <!-- end chatbot -->

    <!-- start coupon -->
    <div id="get-coupon" class="get-coupon">
        <div class="coupon">
            <div class="corner-decor-l"></div>
            <div class="corner-decor-r"></div>
            <div class="title fz-4">優惠券序號</div>
            <div id="coupon-number" class="coupon-number fz-5">
                happynewyear2019
                <div class="flash"></div>
            </div>
            <div class="coupon-timer fz-6">此訊息將在<span id="coupon-timer-sec" class="coupon-timer-sec fz-4"></span>秒後銷毀</div>
        </div>
    </div>
    <!-- end coupon -->


    <!-- ======================= -->
    <div id="trigger-mission"></div>
    <!-- start sec-mission -->
    <section class="sec-mission">
        <div class="panel">
            <div class="radar">
                <div class="radar-circle radar-circle-1"></div>
                <div class="radar-circle radar-circle-2"></div>
                <div class="radar-circle radar-circle-3"></div>
                <div class="radar-circle radar-circle-4"></div>
                <div class="radar-circle radar-circle-5"></div>
                <div class="radar-circle radar-circle-6"></div>
                <div id="scanner" class="scanner"></div>
            </div>
        </div>
        <!-- ====================== -->
        <div class="mall_scroll">
            <div class="chevron"></div>
            <div class="chevron"></div>
            <div class="chevron"></div>
        </div>
        <!-- ====================== -->
        <div id="mission-group" class="mission-group">
            <!-- ====================== -->
            <!-- ====================== -->
        </div>
        <!-- ====================== -->
        <div id="welcome-message" class="welcome-message fz-5">
            <div id="marquee" class="marquee marquee-1">歡迎來到 CHASER，我們提供裝備上的建議、裝備客製化及商城供選擇。</div>
            <div id="marquee-2" class="marquee marquee-2">歡迎來到 CHASER，我們提供裝備上的建議、裝備客製化及商城供選擇。</div>
        </div>
        <!-- ====================== -->
    </section>
    <!-- end sec-mission -->

    <!-- start sec-customize -->
    <div id="trigger-customize"></div>
    <div id="trigger-customize-2"></div>
    <!-- ====================== -->
    <section class="sec-customize">
        <div class="bg"></div>
        <!-- ====================== -->
        <div class="wrapper container-fluid">
            <div class="row">
                <div class="col-left col-md-4">
                    <div class="title-group">
                        <div class="customize-no fz-4">
                            <div class="now-no">
                                <div id="now-no">no. 1</div>
                                <div class="flash"></div>
                            </div>
                            <div class="progress">
                                <div id="progress-running" class="progress-running"></div>
                            </div>
                            <div>3</div>
                        </div>
                        <div class="customize-name fz-4">
                            <div id="customize-name"></div>
                            <div class="flash"></div>
                        </div>
                        <a href="#" class="btn btn-solid">立即客製</a>
                    </div>
                </div>
                <div class="col-middle col-md-4">
                    <div class="slogan fz-4">立即客製您的裝備</div>
                    <div class="closet-block-group">
                        <!-- =================== -->
                        <div id="closet-block-1" class="closet-block closet-block-1">
                            <img src="images/customize/custom-watch.png" alt="custom-watch">
                        </div>
                        <!-- =================== -->
                        <div id="closet-block-2" class="closet-block closet-block-2">
                            <img src="images/customize/custom-suit.png" alt="custom-suit">
                        </div>
                        <!-- =================== -->
                        <div id="closet-block-3" class="closet-block closet-block-3">
                            <img src="images/customize/custom-glasses.gif" alt="custom-glasses">
                        </div>
                        <!-- =================== -->
                    </div>
                    <div id="btn-prev" class="btn-prev"><i class="fas fa-chevron-circle-left"></i></div>
                    <div id="btn-next" class="btn-next"><i class="fas fa-chevron-circle-right"></i></div>
                </div>
                <div class="col-right col-md-4">
                    <div class="chart-wrapper">
                        <canvas id="mall_mychart"></canvas>
                    </div>
                </div>
            </div>
        </div>
       




        <!-- ====================== -->
        <div class="reveal">
            <div class="reveal-l"></div>
            <div class="reveal-r"></div>
        </div>
    </section>
    <!-- ====================== -->
    <div class="scroll-buffer-customize"></div>
    <!-- end sec-customize -->


    <!-- start sec-market -->
    <div id="trigger-market"></div>
    <!-- ====================== -->
    <section id="sec-market" class="sec-market">
        <div class="bg">
            <div class="drawing-group">
                <img src="images/index/bg-market.png" alt="bg-market" class="drawing">
                <img src="images/index/gear-1.png" alt="gear" class="gear gear-1">
                <img src="images/index/gear-2.png" alt="gear" class="gear gear-2">
                <img src="images/index/gear-3.png" alt="gear" class="gear gear-3">
                <img src="images/index/gear-1.png" alt="gear" class="gear gear-4">
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-product col-md-7">
                    <div class="product-bg">
                        <div class="corner-decor-l"></div>
                        <div class="corner-decor-r"></div>   
                        <div id="prev-product" class="prev-product"><i class="fas fa-caret-left"></i></i></div>
                        <div id="next-product" class="next-product"><i class="fas fa-caret-right"></i></div>
                        <div class="title">
                            <div class="btn btn-border btn-add-cart">加入購物車</div>
                            <div id="product-name" class="product-name fz-5"></div>
                            <div id="product-price" class="product-price fz-5"></div>
                            <div class="flash"></div>
                        </div>
                    </div>
                </div>
                <div class="col-intro col-md-5">
                    <div class="wrapper">
                        <div class="fz-4">裝備商城</div>
                        <p class="fz-p">CHASER 提供優良的裝備，以應付各種任務。</p>
                        <a href="#" class="btn btn-solid">前往商城</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====================== -->
    <div class="scroll-buffer-market"></div>
    <!-- end sec-market -->


    <!-- start sec-gallery -->
    <div id="trigger-gallery"></div>
    <!-- ====================== -->
    <section class="sec-gallery">
    <!-- ====================== -->
    <div id="trigger-gallery-2"></div>
    <!-- ====================== -->
        <div class="bg">
            <div class="spiral spiral-1"></div>
            <div class="spiral spiral-2"></div>
            <div class="spiral spiral-3"></div>
            <div class="spiral spiral-4"></div>
            <div class="spiral spiral-5"></div>
            <div class="spiral spiral-6"></div>
            <div class="spiral spiral-7"></div>
            <div class="spiral spiral-8"></div>
            <div class="spiral-circle"></div>
        </div>
        <div class="wrapper container-fluid">
            <div class="row">
                <div class="col-intro col-md-5 offset-1">
                    <div class="intro">
                        <div class="fz-4">傳奇特務藝廊</div>
                        <p class="fz-p">展示傳說中的特務使用過之經典裝備，有線上及線下實體展覽，百聞不如一見，歡迎參觀。</p>
                        <div class="link-group">
                            <a href="#" class="btn btn-border">線上展覽</a>
                            <a href="#" class="btn btn-solid">實體展覽購票</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end sec-gallery -->


    <!-- start sec-about -->
    <div id="trigger-about"></div>
    <!-- ====================== -->
    <section class="sec-about">
        <video id="about-video" loop>
            <source src="video/index-about.mp4">
        </video>
        <div class="wrapper">
            <div class="tittle fz-4">關於我們</div>
            <div id="enter-about" class="enter-about">
                <svg id="svgShield" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 116 146.14"><g><path d="M87.93,17.75A179.34,179.34,0,0,1,58,.62,179.34,179.34,0,0,1,28.07,17.75C12.75,24.42.5,25.05.5,25.05V75.82c0,14,2.18,29.19,20,46.32A108.56,108.56,0,0,0,58,145.62a108.56,108.56,0,0,0,37.49-23.48c17.83-17.13,20-32.36,20-46.32V25.05S103.25,24.42,87.93,17.75Z"/></g></svg>
                <div class="lock-hole"></div>
                <div class="access fz-6">ACCESS DENIED</div>
            </div>
        </div>
    </section>
    <!-- end sec-about -->


    <!-- start footer -->
    <footer class="footer">
        <div class="fz-small">© 2018 Chaser. All Rights Reserved.</div>
    </footer>
    <!-- end footer -->





    <!-- loading -->
    <script src="js/loading/modernizr.custom.js"></script>
    <script src="js/loading/classie.js"></script>
    <script src="js/loading/pathLoader.js"></script>
    <script src="js/loading/main.js"></script>
    <!-- chart.js -->
    <script src="node_modules\chart.js\dist\Chart.min.js"></script>
    <!-- tweenmax -->
    <script src="node_modules/gsap/src/minified/TweenMax.min.js"></script>
    <script src="node_modules/gsap/src/minified/plugins/CSSRulePlugin.min.js"></script>
    <!-- scrollmagic -->
    <script src="node_modules\scrollmagic\scrollmagic\minified\ScrollMagic.min.js"></script>
    <script src="node_modules\scrollmagic\scrollmagic\minified\plugins\animation.gsap.min.js"></script>
    <script src="node_modules\scrollmagic\scrollmagic\minified\plugins\debug.addIndicators.min.js"></script>
    <!-- holographic projection -->
    <script src="https://unpkg.com/three"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dat-gui/0.5.1/dat.gui.min.js"></script>
    <script src="https://unpkg.com/three@0.83.0/examples/js/shaders/CopyShader.js"></script>
    <script src="https://unpkg.com/three@0.83.0/examples/js/postprocessing/EffectComposer.js"></script>
    <script src="https://unpkg.com/three@0.83.0/examples/js/postprocessing/RenderPass.js"></script>
    <script src="https://unpkg.com/three@0.83.0/examples/js/postprocessing/ShaderPass.js"></script>
    <script src="https://unpkg.com/three@0.83.0/examples/js/shaders/HorizontalBlurShader.js"></script>
    <script src="https://unpkg.com/three@0.83.0/examples/js/shaders/VerticalBlurShader.js"></script>
    <script src="https://unpkg.com/three@0.83.0/examples/js/shaders/FilmShader.js"></script>
    <script src="https://unpkg.com/three@0.83.0/examples/js/shaders/LuminosityHighPassShader.js"></script>
    <script src="https://unpkg.com/three@0.83.0/examples/js/postprocessing/UnrealBloomPass.js"></script>
    <script src="https://cdn.rawgit.com/felixturner/bad-tv-shader/master/BadTVShader.js"></script>
    <!-- custom -->
    <script src="js/common.js"></script>
    <script src="js/chatbot.js"></script>
    <script src="js/index.js"></script>
</body>
</html>