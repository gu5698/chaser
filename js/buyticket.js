$(document).ready(function () {

    $('.fa-plus').click(function () {
        var howmany = $('#manybox').val();
        newmany = parseInt(howmany) + 1;
        $('#manybox').val(newmany);
        $('#hiddenmuch').val(newmany);

        newtotal = 0;
        newtotal = parseInt(newmany * 420);
        $('#totalmoney').text(newtotal);
        $('#hiddentext').val(newtotal);
    });

    $('.fa-minus').click(function () {
        var howmany = $('#manybox').val();
        if (howmany != "1") {
            var newmany = 0;
            newmany = parseInt(howmany) - 1;
            $('#manybox').val(newmany);
            $('#hiddenmuch').val(newmany);

            newtotal = 0;
            newtotal = parseInt(newmany * 420);
            $('#totalmoney').text(newtotal);
            $('#hiddentext').val(newtotal);
        } else {
            return false;
        }
    });

    $('#okbtn').click(function () {
        let aa = $(".credit-card-number").val();
        let bb = $(".security-code").val();
        let cc = $(".billing-address-name").val();
        let dd = $(".expiration-month-and-year").val();
        let ee = $("#name").val();
        let ff = $("#tel").val();
        let gg = $("#email").val();

        if (aa == "" || bb == "" || cc == "" || dd == "") {
            myalert('你的信用卡資訊填寫不完全喔!!!');
            return false;
        } else if (ee == "" || ff == "" || gg == "") {
            myalert('你的訂購人資訊填寫不完全喔!!!');
            return false;
        } else {
            document.getElementById("ticketfrom").submit()
        }
    });

    function myalert(word) {
        $('#myalert').show()
        $('#alerttitle').text(word);
    }

    $('#okalertbtn').click(function () {
        $('#myalert').hide();
    });

});