jQuery(document).ready(function () {
    var num = 0;
    $("#slide_btn").mousedown(function (event) {
        var btn_x = event.pageX - $("#slide_btn").offset().left,
            isMove = true;
        $(document).mousemove(function (event) {
            if (isMove) {
                if (parseInt($("#slide_btn").css("left")) >= 80) {
                    $("#slide_btn").css({
                        "left": 80
                    });
                } else {
                    $("#slide_btn").css({
                        "left": event.pageX - btn_x
                    });
                }
            };
        }).mouseup(function () {
            TweenMax.to('.group', 2, {
                transform: 'rotateY(0deg)',
                ease: Linear.easeInOut,
                onStart: function () {
                    TweenMax.to('#gear1', 2, {
                        rotation: 720,
                        ease: Linear.easeInOut
                    })
                    TweenMax.to('#gear2', 2, {
                        rotation: -1080,
                        ease: Linear.easeInOut
                    })
                    TweenMax.to('#gear3', 2, {
                        rotation: 720,
                        ease: Linear.easeInOut
                    })
                    isMove = false;
                    $("#slide_btn").css({
                        "left": 0
                    })
                },
            })
        })
    })
})