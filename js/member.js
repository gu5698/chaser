/**
 * 會員相關的處理
 */

;(function () {
    "use strict";

    /**
     * 物件初始化
     *
     * 預先產生會員畫面所需要的 dom 以及物件
     * 預先定義會員畫面的操作事件
     */
    function init($) {
        /**
         * 在切換 accordion(手風琴效果) 時的動作
         * 先將所有的 .avtive 都移除
         * 再將點擊的 secion 加上 .active
         */
        
            $('.wrap-member-body .section').click(function () {
                $('.wrap-member-body .section').removeClass('active');
                $(this).addClass('active');
            });
        

        /**
         * 上傳圖片時預覽的效果
         */
        if (jQuery.uploadPreview) {
            $.uploadPreview({
                input_field: "#image-upload",   // 指定的 input 欄位
                preview_box: "#image-preview",  // 預覽的 div
                label_field: "#image-label",    // label 的欄位
                label_default: "Choose File",   // 預設 label 的文字
                label_selected: "Change File",  // 已經有選擇圖片檔案時，label的文字
                no_label: false                 // 要不要有label
            });
        }

        $('#password-new').on('change', validatePassword);      // 新密碼欄位的change事件
        $('#password-confirm').on('keyup', validatePassword);   // 再次輸入密碼欄位的keyup事件

        /**
         * 當畫面中含有 .icon-member 的元素時
         * 加上 onclick 事件，使得讓元素被點擊時可以打開登入畫面
         * 如果已經登入，就打開選單
         */
        $('.icon-member').click(function () {
            if ($('.member-menu').length == 0) {
                $.login();
            } else {
                var menu = $('.member-menu');
                if (menu.hasClass('op1-vv')) {
                    menu.removeClass('op1-vv');
                } else {
                    menu.addClass('op1-vv');
                }
            }
            return false;
        });
        // 關掉已經打開的選單
        $('body').on('click', function () {
            $(this).find('.dropdown-menu.open').removeClass('open');
        });

        /**
         * 會員註冊事件
         *
         * 將原本 registerForm 的 submit 攔截
         * 透過 jQuery 的 ajax 方法，將資料傳遞至後端
         */
        $('body').on('submit', '#registerForm', function () {
            // jQuery 的 ajax 方法
            $.post('member.php', $(this).serialize(), function (res) {
                if (!res.status) {
                    alert('註冊失敗:' + res.msg);
                } else {
                    alert('已註冊成功')
                    clearAllPopup();
                    // window.location.reload();
                }
            }, 'json').error(function () {
                alert('系統異常!!')
            });
            return false;
        });

        /**
         * 會員登入事件
         *
         * 將原本 loginForm 的 submit 攔截
         * 透過 jQuery 的 ajax 方法，將資料傳遞至後端
         */
        $('body').on('submit', '#loginForm', function () {
            // jQuery 的 ajax 方法
            $.post('member.php', $(this).serialize(), function (res) {
                if (!res.status) {
                    alert('登入失敗:' + res.msg);
                } else {
                    alert('已成功登入')
                    clearAllPopup();
                    window.location.reload();
                }
            }, 'json').error(function () {
                alert('系統異常!!')
            });
            return false;
        });

        /**
         * 產生 popup 所需要的 dom
         * .member-mask 背景半透明黑
         * .login-lightbox 登入
         * .register-lightbox 註冊
         */
        $('<div id="member-mask" class="member-mask"></div>').appendTo('body');
        $('<div class="login-lightbox"></div>').appendTo('body');
        $('<div class="register-lightbox"></div>').appendTo('body');

        /**
         * 預設隱藏所有 popup 的 dom
         */
        clearAllPopup();

        /**
         * 定義 ajax start 的事件
         */
        $(document).ajaxStart(function () {
            $('<div class="loading"></div>').appendTo('body');
        });

        /**
         * 定義 ajax stop 的事件
         */
        $(document).ajaxStop(function () {
            $('.loading').remove();
        });

        /**
         * global function
         *
         * 實際產生登入的函式
         * 透過 ajax 方法，將登入的 HTML DOM 置入 .login-lightbox
         *
         * .burning 是產生火的效果
         * particles 是產生星空的效果
         *
         * @param options
         */
        $.login = function (options) {
            clearAllPopup();
            if (options != undefined && options == 'hide') {
                return;
            }
            $('.member-mask,.login-lightbox').show();
            $('.login-lightbox').load('member.php?login=1', function () {
                $('.burning').burn();
                $('.burning').burn('diffusion', 2);
            });

            particlesJS.load('member-mask', 'js/assets/particles.json', function () {
                console.log('callback - particles.js config loaded');
            });

        }

        /**
         * global function
         *
         * 實際產生註冊的函式
         * 透過 ajax 方法，將登入的 HTML DOM 置入 .register-lightbox
         *
         * .burning 是產生火的效果
         * particles 是產生星空的效果
         *
         * @param options
         */
        $.register = function (options) {
            clearAllPopup();
            if (options != undefined && options == 'hide') {
                return;
            }
            $('.member-mask,.register-lightbox').show();
            $('.register-lightbox').load('member.php?register=1', function () {
                $('.burning').burn();
                $('.burning').burn('diffusion', 2);
            });

            particlesJS.load('member-mask', 'js/assets/particles.json', function () {
                console.log('callback - particles.js config loaded');
            });

        }

        $.closePopup=function(){
            clearAllPopup();
        }

    }

    /**
     * 判斷新密碼與再次輸入新密碼是否相同
     * 如果不相同，則觸發驗證錯誤
     */
    function validatePassword() {
        var password = document.getElementById("password-new")
            , confirm_password = document.getElementById("password-confirm");
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("兩次輸入的密碼不相同");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    function clearAllPopup() {
        $('.member-mask').hide();
        $('.login-lightbox').hide();
        $('.login-lightbox *').remove();
        $('.register-lightbox').hide();
        $('.register-lightbox *').remove();
    }


    /**
     * 修改會員資料事件
     *
     * 將原本 registerForm 的 submit 攔截
     * 透過 jQuery 的 ajax 方法，將資料傳遞至後端
     */
    $('body').on('submit', '#editForm', function () {
        // jQuery 的 ajax 方法
        // $.post('member.php', $(this).serialize(), function (res) {
        //     if (!res.status) {
        //         alert('變更失敗:' + res.msg);
        //     } else {
        //         alert('已變更成功')
        //         clearAllPopup();
        //         // window.location.reload();
        //     }
        // }, 'json').error(function () {
        //     alert('系統異常!!')
        // });
        // return false;
    });

    $(document).ready(function () {
        var md = new MobileDetect(window.navigator.userAgent);

        // 呼叫初始化函式
        init(jQuery);

        var hash = window.location.hash;
        if (hash == '#main') {
            $('.wrap-member-body .section:eq(0)').click();
        } else if (hash == '#page1') {
            $('.wrap-member-body .section:eq(1)').click();
        } else if (hash == '#page2') {
            $('.wrap-member-body .section:eq(2)').click();
        } else if (hash == '#page3') {
            $('.wrap-member-body .section:eq(3)').click();
        }

        if(hash=='' && md.mobile()!=null) {
            $('.wrap-member-body .section:eq(0)').click();
        }

        $('.member-menu-main').click(function () {
            window.location = 'member.php#main';
            if (window.location.pathname.endsWith('/member.php')) {
                $('.wrap-member-body .section:eq(0)').click();
            }
        });
        $('.member-menu-page1').click(function () {
            window.location = 'member.php#page1';
            if (window.location.pathname.endsWith('/member.php')) {
                $('.wrap-member-body .section:eq(1)').click();
            }
        });
        $('.member-menu-page2').click(function () {
            window.location = 'member.php#page2';
            if (window.location.pathname.endsWith('/member.php')) {
                $('.wrap-member-body .section:eq(2)').click();
            }
        });
        $('.member-menu-page3').click(function () {
            window.location = 'member.php#page3';
            if (window.location.pathname.endsWith('/member.php')) {
                $('.wrap-member-body .section:eq(3)').click();
            }
        });
        $('.member-menu-logout').click(function () {
            window.location = 'member.php?action=do_logout';
        });

    });

})();
