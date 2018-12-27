<!-- start navbar -->
<nav id="navbar" class="navbar">
    <!-- <a href="#" id="navbar-toggle" class="navbar-toggle"><i class="fas fa-bars"></i></a>
    <ul>
        <li class="navbar-item navbar-logo"><a href="index.html"><img id="img-logo" src="images/common/logo.svg" alt="logo"></a></li>
        <li class="navbar-item"><a href="customize/produtSelect.html">裝備客製<span class="d-block fz-6">CUSTOMIZE</span></a></li>
        <li class="navbar-item"><a href="mall.php">裝備商城<span class="d-block fz-6">MARKET</span></a></li>
        <li class="navbar-item"><a href="#">傳奇特務藝廊<span class="d-block fz-6">GALLERY</span></a></li>
        <li class="navbar-item"><a href="about/about.html">關於我們<span class="d-block fz-6">ABOUT</span></a></li>
        <li class="navbar-item navbar-icon icon-member"><a href="#"><i class="fas fa-user-secret"></i></a></li>
        <li class="navbar-item navbar-icon icon-cart"><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
    </ul> -->

    <a href="#" id="navbar-toggle" class="navbar-toggle"><i class="fas fa-bars"></i></a>
    <ul class="navbar-menu main-navbar-menu">
        <li class="navbar-item navbar-logo"><a href="main.php"><img id="img-logo" src="images/common/logo.svg" alt="logo"></a></li>
        <li id="navbar-link-customize" class="navbar-item navbar-link">
            <a href="productSelect.php">
                <img class="navbar-link-icon" src="images/common/navbar-customize.svg" alt="navbar-customize">
                <div class="title">裝備客製<span class="d-block fz-6">CUSTOMIZE</span></div>
            </a>
        </li>
        <li id="navbar-link-mall" class="navbar-item navbar-link">
            <a href="mall.php">
                <img class="navbar-link-icon" src="images/common/navbar-mall.svg" alt="navbar-customize">
                <div class="title">裝備商城<span class="d-block fz-6">MARKET</span></div>
            </a>
        </li>
        <li id="navbar-link-gallery" class="navbar-item navbar-link">
            <a href="gallery.php">
                <img class="navbar-link-icon" src="images/common/navbar-gallery.svg" alt="navbar-customize">
                <div class="title">傳奇特務藝廊<span class="d-block fz-6">GALLERY</span></div>
            </a>
        </li>
        <li id="navbar-link-about" class="navbar-item navbar-link">
            <a href="about.php">
                <img class="navbar-link-icon" src="images/common/navbar-about.svg" alt="navbar-customize">
                <div class="title">關於我們<span class="d-block fz-6">ABOUT</span></div>
            </a>
        </li>
        <li class="navbar-icon icon-member text-member">
        <?php if (is_login()): ?>
            <?php echo login_user('username'); ?>
        <?php endif; ?>
        </li>
        <li class="navbar-item navbar-icon icon-member"><a href="#"><i class="fas fa-user-secret"></i></a></li>
        <li class="navbar-item navbar-icon icon-cart">
            <a href="#"><i class="fas fa-shopping-cart"></i></a>
            <ol class="sub-menu fz-5">
                <!-- <li class="shoplist">
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
                </li> -->
               <a href="cart1.php" class="cart-btn btn-solid">結帳</a>
            </ol>
            <div class="list-counter">0</div>
        </li>
    </ul>
    <?php if (is_login()): ?>
        <ul class="navbar-menu member-menu">
            <li class="navbar-item navbar-link"><a href="member.php">會員專區</a></li>
            <!-- <li class="navbar-item"><a href="#">修改會員資料</a></li>
            <li class="navbar-item"><a href="#">一般訂單查詢</a></li>
            <li class="navbar-item"><a href="#">客製訂單查詢</a></li>
            <li class="navbar-item"><a href="#">藝廊票券查詢</a></li> -->
            <li class="navbar-item navbar-link"><a href="member.php?action=do_logout">登出</a></li>
        </ul>
    <?php endif; ?>
</nav>
<?php include_once 'coupon.php'; ?>

<!-- end navbar -->
