window.addEventListener('load', getCoupon);

function getCoupon(){
    let getCoupon = document.getElementById('get-coupon');
    let couponTimerSec = document.getElementById('coupon-timer-sec');
    // 倒數時間
    let nowSec = 5;
    let nowSecFixed = nowSec.toFixed(2);
    couponTimerSec.innerText = nowSecFixed;

    // 密碼
    let keys = [38,38,40,40,37,39,37,39,66,65];
    let keysLeft;
    
    window.addEventListener( 'keydown', keyCodeMatch );
    // 重置密碼
    reset();

    function reset(){
        keysLeft = keys.slice(0);
        // console.log(keysLeft);
    }
    
    function keyCodeMatch( e ){
        if( e.keyCode === keysLeft[0] ){
            keysLeft.shift();

            if( keysLeft.length > 0 ){
                return;
            }
            window.removeEventListener( 'keydown', keyCodeMatch );
            getCoupon.style.visibility = 'visible';
            getCoupon.style.opacity = 1;
            TweenMax.to('#coupon-number .flash', .5, {right: '-200%', delay: .5});
            setTimeout(countdown, 1300);
        } else {            
            // console.log('keysLeft', keysLeft);
            if( keysLeft.length === keys.length ){
                return;
            }
            reset();            
            // console.log('keysLeft', keysLeft);
        }
    }

    function countdown(){
        let countdownTimer = setInterval(() => {
            nowSec -= 0.04;
            nowSecFixed = nowSec.toFixed(2);
            // console.log(nowSec, nowSecFixed);
            
            couponTimerSec.innerText = nowSecFixed;

            if(nowSec <= 0){
                clearInterval(countdownTimer);
                couponTimerSec.innerText = '0.00';
                getCoupon.querySelector('.coupon').style.background = 'rgba(200,0,0,.8) repeating-linear-gradient(to bottom, rgba(0,0,0,1), rgba(0,0,0,1) 1px, transparent 1px, transparent 3px)';
                setTimeout(()=>{
                    getCoupon.style.visibility = 'hidden';
                    getCoupon.style.opacity = 0;
                }, 500);
            }
        }, 40);
    }
} // end getCoupon
