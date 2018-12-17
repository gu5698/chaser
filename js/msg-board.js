$(document).ready(function () {

    if ($(window).width() > 767) {
        pictop();

        $(window).resize(function () {
            pictop()
        })

        function pictop() {
            let pictop = ($(window).height() - 90) / 2 - ($('.img-box').height() / 2);
            let aa = ($('.content-item').height() - $('.total-item').height()) / 2
            $('.img-box').css({
                top: pictop + 'px'
            })
            $('.total-item').css({
                marginTop: aa + 'px'
            })
        }
    }

    if ($(window).width() < 768) {
        $('.open-msg-box').click(function () {
            $('#msg-box').show()
            $('.img-box').show()
            $('.close-icon').show()
        })
        $('.close-icon').click(function () {
            $('#msg-box').hide()
            $('.img-box').hide()
            $('.close-icon').hide()
        })

        var setText = $('#leave-zone'),
            textBottom = setText.offset().top - $(window).height() + 130;
        var bottomValue = $(window).height() - 130;
        $(window).on('load scroll resize', function () {
            if ($(window).scrollTop() > textBottom) {
                setText.css({
                    top: bottomValue,
                    position: 'fixed',
                });
            } else {
                setText.css({
                    top: '0',
                    position: 'absolute',
                });
            }
        });
    }

    $('#message-board').on('click', '#exclamation,#exclamation-label', function () {
        let a = $(this).parent().siblings('.report');
        $('.report-select').removeClass('selectreport');
        $('.report-select').siblings('.report-select').css({
            backgroundColor: '#000',
            color: '#FDD084',
        });
        a.toggle();
        $('.report').not(a).hide();
    });

})