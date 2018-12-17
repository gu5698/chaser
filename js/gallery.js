$(document).ready(function () {
    re3d();
    let scrollLeft = $(window).scrollLeft()
    window.addEventListener('scroll', re3d)

    function re3d() {
        let scrollCenter = $(window).scrollLeft() + $(window).width() / 2
        $('.wrapper').css({
            'perspective-origin': `${scrollCenter}px`
        })
    }
    window.addEventListener('wheel', function (e) {

        e.preventDefault()
        let step = 100

        if (document.documentElement.scrollLeft + $(window).width() <= 10200) {
            if (e.deltaY > 0) {
                document.documentElement.scrollLeft += step
            } else if (e.deltaY < 0) {
                document.documentElement.scrollLeft -= step
            }
        } else {
            if (e.deltaY < 0) {
                document.documentElement.scrollLeft -= step
            }
        }
    })
    $('#pianoimg').click(function () {
        $("#test").val("");
        $('#all').slideDown();
    })
    $('#paper').click(function () {
        $('#paper').css({
            display: 'none'
        });
        $('#paper-box').slideDown();
        addcoupon();
    })
    $('#paperclose').click(function () {
        $('#papercopon').css({
            display: 'none'
        });
        $('#paper-box').slideUp()
    })
    TweenMax.to('.scroll-icon', 3, {
        rotation: 360,
        ease: Linear.easeInOut,
        repeat: -1
    })

    function addcoupon() {
        var xhr = new XMLHttpRequest();
        xhr.onload = function () {
            if (xhr.status == 200) {
                // console.log(xhr.responseText)
                // document.getElementById("showPanel").innerHTML = xhr.responseText;
            } else {
                // alert(xhr.status);
            }
        }

        var url = "addcoupon.php";
        xhr.open("Get", url, true);
        xhr.send(null);
    }
})