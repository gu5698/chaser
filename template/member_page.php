<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>會員專區</title>

    <?php require_once 'template/common_css.php'; ?>

</head>
<body>

<?php require_once 'template/common_navbar.php'; ?>

<!-- 主內容 START -->
<div class="wrap-main">

    <div class="wrap-member-body">

        <section class="section section-1">

            <div class="section-header">
                <h2 class="fz-2">會員管理</h2>
            </div>
            <div class="section-body">
                <h3 class="form-title">修改會員資料</h3>
                <form name="editForm" id="editForm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="do_edit">
                    <fieldset>
                        <!--                        <legend>修改會員資料</legend>-->
                        <div class="member-form">
                            <div class="member-picture">
                                <div id="image-preview">
                                    <input type="file" name="file" id="image-upload"/>
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
                                    <input type="password" id="password" name="password" required placeholder=" " >
                                    <label for="password">密碼</label>
                                    <div class="requirements">您的密碼必需要包含大、小寫字母以及數字，長度超過6碼</div>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password-new" class="changepwd" name="password_new" placeholder=" " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
                                    <label for="password-new">請輸入新密碼</label>
                                    <div class="requirements">您設定的密碼必需要包含大、小寫字母以及數字，長度超過6碼</div>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password-confirm" class="changepwd" name="password_confirm" placeholder=" ">
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
                <h2 class="fz-2">一般訂單</h2>
            </div>
            <div class="section-body">
                <h3 class="form-title">一般訂單</h3>
                <?php if (isset($order)): ?>
                    <table class="member_order_table">
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
                                <td class="center"><?php echo $order_item['order_id']; ?></td>
                                <td class="center"><?php echo $order_item['order_time']; ?></td>
                                <td class="center"><?php echo $order_item['grand_total']; ?></td>
                                <td class="center"><?php echo $order_item['order_stat']; ?></td>
                                <td>
                                    <button type="button" onclick="get_order('<?php echo $order_item['order_id']; ?>')">明細</button>
                                    <?php if('未出貨'== $order_item['order_stat']):?> 
                                    <button type="button" onclick="cancel_order('<?php echo $order_item['order_id']; ?>')">取消訂單</button>
                                    <?php endif;?>
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
                <h2 class="fz-2">客製訂單</h2>
            </div>
            <div class="section-body">
                <h3 class="form-title">客製訂單</h3>
                <?php if (isset($cu_order)): ?>
                    <table class="member_order_table">
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
                                <td class="center"><?php echo $cu_order_item['cu_order_id']; ?></td>
                                <td class="center"><?php echo $cu_order_item['cu_order_time']; ?></td>
                                <td class="center"><?php echo $cu_order_item['total']; ?></td>
                                <td class="center"><?php echo $cu_order_item['cu_order_stat']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>

        </section>

        <section class="section section-4">

            <div class="section-header">
                <h2 class="fz-2">藝廊票券</h2>
            </div>
            <div class="section-body">
                <h3 class="form-title">藝廊票券</h3>
                <?php if (isset($t_order)): ?>
                    <table class="member_order_table">
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
                                <td class="center"><?php echo $t_order_item['t_order_id']; ?></td>
                                <td class="center"><?php echo $t_order_item['t_order_addtime']; ?></td>
                                <td class="center"><?php echo $t_order_item['t_order_much']; ?></td>
                                <td class="center"><?php echo $t_order_item['t_order_total_price']; ?></td>
                                <td class="center">
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

<?php include_once 'chatbot.php'; ?>

<script src="js\chatbot.js"></script>

<!-- 主內容 END -->


<?php require_once 'template/common_js.php'; ?>
<script src="js/plugins/jquery.uploadPreview.min.js" type="text/javascript"></script>

<script>
    $(function () {
        <?php if (!is_login()): ?>
        $.login();
        <?php else:?>
        $('#image-preview').attr('style','background-image: url(images/mem_images/<?php echo login_user('image');?>);background-size:cover;background-position:center;')
        <?php endif; ?>
    });
</script>

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

    function cancel_order(order_id) {
        $.post('member.php', {action:'do_cancle_order', id:order_id}, function (res) {
            if (!res.status) {
                alert('取消失敗:' + res.msg);
            } else {
                alert('訂單已取消')
                window.location.reload();
            }
        }, 'json').error(function () {
            alert('系統異常!!')
        });
    }
    
</script>
</body>
</html>