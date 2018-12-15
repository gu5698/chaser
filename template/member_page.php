<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>會員專區</title>

    <!--    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon/apple-touch-icon.png">-->
    <!--    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon/favicon-32x32.png">-->
    <!--    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon/favicon-16x16.png">-->
    <!--    <link rel="manifest" href="/images/favicon/site.webmanifest">-->
    <!--    <link rel="mask-icon" href="/images/favicon/safari-pinned-tab.svg" color="#5bbad5">-->
    <!--    <meta name="msapplication-TileColor" content="#da532c">-->
    <!--    <meta name="theme-color" content="#ffffff">-->

    <!-- fontawesome -->
    <!--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">-->

    <!--    <link rel="stylesheet" href="css/css-reset.min.css">-->
    <!--    <link rel="stylesheet" href="css/navbar.css">-->
    <!--    <link rel="stylesheet" href="css/grid.css">-->
    <!--    <link rel="stylesheet" href="css/fonts.css">-->
    <!--    <link rel="stylesheet" href="css/member.css">-->
    <!--    <link rel="stylesheet" href="css/member_mobile.css">-->
    <?php require_once 'template/common_css.php'; ?>

</head>
<body>
<!-- start navbar -->
<!--<nav class="navbar">-->
<!--    <ul>-->
<!--        <li class="navbar-item navbar-logo">-->
<!--            <a href="index.html"><img src="images/logo.svg" alt="logo"></a>-->
<!--        </li>-->
<!--        <li class="navbar-item"><a href="#">裝備客製<span class="d-block fz-6">CUSTOMIZE</span></a></li>-->
<!--        <li class="navbar-item"><a href="#">裝備商城<span class="d-block fz-6">MARKET</span></a></li>-->
<!--        <li class="navbar-item"><a href="#">傳奇特務藝廊<span class="d-block fz-6">GALLERY</span></a></li>-->
<!--        <li class="navbar-item"><a href="#">關於我們<span class="d-block fz-6">ABOUT</span></a></li>-->
<!--        <li class="navbar-item navbar-icon icon-member">-->
<!--            --><?php //if (is_login()): ?>
<!--                --><?php //echo login_user('username'); ?><!--您好-->
<!--            --><?php //endif; ?>
<!--            <a href="#"><i class="fas fa-user-secret"></i></a>-->
<!--        </li>-->
<!--        <li class="navbar-item navbar-icon icon-cart"><a href="#"><i class="fas fa-shopping-cart"></i></a></li>-->
<!--    </ul>-->
<!--</nav>-->
<!-- end navbar -->
<?php require_once 'template/common_navbar.php'; ?>

<!-- 主內容 START -->
<div class="wrap-main">

    <div class="wrap-member-body">

        <section class="section section-1">

            <div class="section-header">
                <h2>會員管理</h2>
            </div>
            <div class="section-body">
                <h3 class="form-title">修改會員資料</h3>
                <form name="editForm" id="editForm" method="post">
                    <input type="hidden" name="action" value="do_edit">
                    <fieldset>
                        <!--                        <legend>修改會員資料</legend>-->
                        <div class="member-form">
                            <div class="member-picture">
                                <div id="image-preview">
                                    <input type="file" name="image" id="image-upload"/>
                                    <label for="image-upload" id="image-label">上傳照片</label>
                                </div>
                            </div>
                            <div class="member-rows">
                                <div class="form-group">
                                    <input type="text" id="username" name="username" required placeholder=" " value="<?php echo login_user('username'); ?>">
                                    <label for="username">姓名</label>
                                    <div class="requirements">請輸入姓名</div>
                                </div>
                                <div class="form-group">
                                    <input type="email" id="email" name="email" required placeholder=" " pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php echo login_user('email'); ?>">
                                    <label for="email">電子郵件</label>
                                    <div class="requirements">請輸入正確的電子郵件</div>
                                </div>
                                <div class="form-group">
                                    <input type="tel" id="phone" name="phone" required placeholder=" " pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" value="<?php echo login_user('phone'); ?>">
                                    <label for="phone">手機號碼</label>
                                    <div class="requirements">請輸入正確的手機號碼</div>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password" name="password" required placeholder=" " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
                                    <label for="password">密碼</label>
                                    <div class="requirements">您的密碼必需要包含大、小寫字母以及數字，長度超過6碼</div>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password-new" name="password_new" required placeholder=" " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
                                    <label for="password-new">請輸入新密碼</label>
                                    <div class="requirements">您設定的密碼必需要包含大、小寫字母以及數字，長度超過6碼</div>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password-confirm" name="password_confirm" required placeholder=" ">
                                    <label for="password-confirm">再次確認密碼</label>
                                    <div class="requirements">兩次輸入的密碼不相同</div>
                                </div>
                            </div>
                        </div>
                        <div class="member-bottom">
                            <!--                            <button type="button" class="btn"><span>返回</span></button>-->
                            <button type="submit" class="btn primary"><span>確認修改</span></button>
                        </div>
                    </fieldset>
                </form>
            </div>

        </section>

        <section class="section section-2">

            <div class="section-header">
                <h2>一般訂單</h2>
            </div>
            <div class="section-body">
                <h3 class="form-title">一般訂單</h3>
                <?php if (isset($order)): ?>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>訂單編號</th>
                            <th>訂單日期</th>
                            <th>訂單金額</th>
                            <th>訂單狀態</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($order as $order_item): ?>
                            <tr>
                                <td><?php echo $order_item['order_id']; ?></td>
                                <td><?php echo $order_item['order_time']; ?></td>
                                <td><?php echo $order_item['grand_total']; ?></td>
                                <td><?php echo $order_item['order_stat']; ?></td>
                                <td>
                                    <button type="button" onclick="get_order('<?php echo $order_item['order_id']; ?>')">明細</button>
                                    <button type="button">取消訂單</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>

        </section>

        <section class="section section-3">

            <div class="section-header">
                <h2>客製訂單</h2>
            </div>
            <div class="section-body">
                <h3 class="form-title">客製訂單</h3>
                <?php if (isset($cu_order)): ?>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>訂單編號</th>
                            <th>訂單日期</th>
                            <th>訂單金額</th>
                            <th>訂單狀態</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($cu_order as $cu_order_item): ?>
                            <tr>
                                <td><?php echo $cu_order_item['cu_order_id']; ?></td>
                                <td><?php echo $cu_order_item['cu_order_time']; ?></td>
                                <td><?php echo $cu_order_item['total']; ?></td>
                                <td><?php echo $cu_order_item['cu_order_stat']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>

        </section>

        <section class="section section-4">

            <div class="section-header">
                <h2>藝廊票券</h2>
            </div>
            <div class="section-body">
                <h3 class="form-title">藝廊票券</h3>
                <?php if (isset($t_order)): ?>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>購票編號</th>
                            <th>購票日期</th>
                            <th>購買張數</th>
                            <th>總金額</th>
                            <th>電子票券</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($t_order as $t_order_item): ?>
                            <tr>
                                <td><?php echo $t_order_item['t_order_id']; ?></td>
                                <td><?php echo $t_order_item['t_order_addtime']; ?></td>
                                <td><?php echo $t_order_item['t_order_much']; ?></td>
                                <td><?php echo $t_order_item['t_order_total_price']; ?></td>
                                <td>
                                    <button type="button" onclick="get_ticket('<?php echo $t_order_item['t_order_id']; ?>')">QR Code</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>

        </section>

    </div>

</div>
<!-- 主內容 END -->

<!--<div id="login-mask" class="login-mask"></div>-->

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>-->
<!--<script src="js/plugins/jquery.uploadPreview.min.js" type="text/javascript"></script>-->
<!--<script src="js/plugins/jquery.burn.min.js" type="text/javascript"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>-->
<!--<script src="js/member.js" type="text/javascript"></script>-->
<?php require_once 'template/common_js.php'; ?>

<?php if (!is_login()): ?>
    <script>
        $(function () {
            $.login();
        });
    </script>
<?php endif; ?>

<script>
    function get_ticket(t_order_id) {
        $('.member-mask,.login-lightbox').show();
        $('.login-lightbox').addClass('ticket');
        $('.login-lightbox').load('member.php?action=get_ticket&id=' + t_order_id);
    }

    function get_order(order_id) {
        $('.member-mask,.login-lightbox').show();
        $('.login-lightbox').addClass('ticket');
        $('.login-lightbox').load('member.php?action=get_order&id=' + order_id);
    }

    $(document).ready(function () {
        // navbar
        let navbar = document.getElementById('navbar');
        let navbarIcon = document.querySelectorAll('.navbar-icon');

        if (window.matchMedia('(max-width: 768px)').matches) {
            for(let i=0; i<navbarIcon.length; i++){
                navbar.appendChild(navbarIcon[i]);
            }
        }
        window.addEventListener('resize', ()=>{
            if (window.matchMedia('(max-width: 768px)').matches) {
                for(let i=0; i<navbarIcon.length; i++){
                    navbar.appendChild(navbarIcon[i]);
                }
            }else{
                for(let i=0; i<navbarIcon.length; i++){
                    navbar.querySelector('ul').appendChild(navbarIcon[i]);
                }

                navbar.querySelector('ul').classList.remove('op1-vv');
            }
        });
        // 漢堡
        let navbarToggle = document.getElementById('navbar-toggle');
        navbarToggle.addEventListener('click', () => {
            navbar.querySelector('ul').classList.toggle('op1-vv');
        });
    });
</script>
</body>
</html>