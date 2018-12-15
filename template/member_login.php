<h3 class="form-title ">會員登入</h3>
<form name="loginForm" id="loginForm" method="post">
    <input type="hidden" name="action" value="do_login">
    <fieldset>
        <div class="member-form">
            <div class="member-rows">
                <div class="form-group">
                    <input type="email" id="login-email" name="email" required placeholder=" " pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                    <label for="login-email">電子郵件</label>
                    <div class="requirements">請輸入正確的電子郵件</div>
                </div>
                <div class="form-group">
                    <input type="password" id="login-password" name="password" required placeholder=" ">
                    <label for="login-password">密碼</label>
                    <div class="requirements">您的密碼必需要包含大、小寫字母以及數字，長度超過6碼</div>
                </div>
            </div>
        </div>
        <div class="member-bottom">
            <button type="button" class="btn" onclick="$.login('hide');"><span>取消</span></button>
            <button type="submit" class="btn primary"><span>登入</span></button>
        </div>
        <p class="text-center">
            還不是會員嗎？馬上 <a href="#" onclick="$.register();">註冊帳號</a>
        </p>
    </fieldset>
</form>