<nav class="navbar-custom navbar navbar-expand-lg navbar-dark font-weight-bold mb-4">
    <a class="navbar-brand p-0" href="#"><img id="logo" src="images/common/logo.svg" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarToggle">
        <ul class="navbar-nav text-nowrap">
            <li class="nav-item">
                <a id="mission" class="nav-link" href="mission_backstage.php">任務管理</a>
            </li>
            <li class="nav-item">
                <a id="mall" class="nav-link" href="#">商品管理</a>
            </li>
            <li class="nav-item">
                <a id="gallery" class="nav-link" href="gallery_backstage_1.php">藝廊管理</a>
            </li>
            <li class="nav-item">
                <a id="chatbot" class="nav-link" href="chatbot_backstage.php">客服問答管理</a>
            </li>
            <li class="nav-item">
                <a id="coupon" class="nav-link" href="#">優惠卷管理</a>
            </li>
            <li class="nav-item">
                <a id="order" class="nav-link" href="#">訂單管理</a>
            </li> 
            <li class="nav-item">
                <a id="member" class="nav-link" href="#">會員管理</a>
            </li> 
            <li class="nav-item">
                <a id="management" class="nav-link" href="#">後台管理</a>
            </li>
        </ul>
    </div>
</nav>



<script>
    window.onload = function(){
        let mission = document.getElementById('mission');
        let mall = document.getElementById('mall');
        let gallery = document.getElementById('gallery');
        let chatbot = document.getElementById('chatbot');
        let coupon = document.getElementById('coupon');
        let order = document.getElementById('order');
        let member = document.getElementById('member');
        let management = document.getElementById('management');



        if(window.location.href.includes("mission")){
            mission.classList.add('active');
        }else if(window.location.href.includes("mall")){
            mall.classList.add('active');
        }else if(window.location.href.includes("gallery")){
            gallery.classList.add('active');
        }else if(window.location.href.includes("chatbot")){
            chatbot.classList.add('active');
        }else if(window.location.href.includes("coupon")){
            coupon.classList.add('active');
        }else if(window.location.href.includes("order")){
            order.classList.add('active');
        }else if(window.location.href.includes("member")){
            member.classList.add('active');
        }else if(window.location.href.includes("management")){
            management.classList.add('active');
        }
    }
</script>