<h3 class="form-title ">會員註冊</h3>
<form name="registerForm" id="registerForm" method="post">
    <input type="hidden" name="action" value="do_register">
    <fieldset>
        <div class="member-form">
            <div class="member-rows">
                <div class="form-group">
                    <input type="text" id="register-username" name="username" required placeholder=" ">
                    <label for="register-username">姓名</label>
                    <div class="requirements">請輸入姓名</div>
                </div>
                <div class="form-group">
                    <input type="email" id="register-email" name="email" required placeholder=" " pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                    <label for="register-email">電子郵件</label>
                    <div class="requirements">請輸入正確的電子郵件</div>
                </div>
                <div class="form-group">
                    <input type="tel" id="register-phone" name="phone" required placeholder=" " pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$">
                    <label for="register-phone">手機號碼</label>
                    <div class="requirements">請輸入正確的手機號碼</div>
                </div>
                <div class="form-group">
                    <input type="password" id="register-password" name="password" required placeholder=" " pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
                    <label for="register-password">密碼</label>
                    <div class="requirements">您的密碼必需要包含大、小寫字母以及數字，長度超過6碼</div>
                </div>
                <div class="form-group">
                    <input type="password" id="register-password-confirm" name="password_confirm" required placeholder=" ">
                    <label for="register-password-confirm">再次確認密碼</label>
                    <div class="requirements">兩次輸入的密碼不相同</div>
                </div>
            </div>
        </div>
        <div class="member-bottom">
            <button type="button" class="btn" onclick="$.register('hide');"><span>取消</span></button>
            <button type="submit" class="btn primary"><span>註冊</span></button>
        </div>
        <p class="text-center">
            已經成為會員？ <a href="#" onclick="$.login();">我要登入</a>
        </p>
    </fieldset>
</form>