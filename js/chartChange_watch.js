// /ajs
let dataArr;

function takeValue() {
    dataArr = new Array()
    var t = document.getElementsByClassName('txt')
    len = t.length
    for (var i = 0; i < len; i++) {
        dataArr.push(parseInt(t[i].value))
    }
    return dataArr
}
var color = Chart.helpers.color
var config = {
    type: 'radar',
    data: {
        labels: ['攻擊', '防禦', '速度', '耐久', '隱匿'],
        datasets: [{
                label: '特務客製化裝備',
                data: takeValue(),
                backgroundColor:  'rgba(116,210,161,.6)',                  
                borderColor: '#74D2A1',
                borderWidth: 3,
                pointBorderColor:'#FFF',
            },
            {
                label: '',
                data: [10, 0],
                backgroundColor: 'rgba(255, 255, 0, 0)',
                borderColor: 'rgba(0,0,255,0)',
                pointStyle:'star',
                borderWidth: 0,
                pointBorderColor:'#ff0',
            }
        ],
        scales: {
            display: false
        }
    },
    options: {
        scale: {
            gridLines: { color: "#00fafc" },
            angleLines: { color: "#00fafc" },
            pointLabels: {
                fontSize: 15,
                fontColor: "#fdd084"
              }
        },
        legend: {                                  //++
            display: false,
        },
        tooltips: {
            enabled: false
        }                                           //++   
    }
}
window.onload = function () {
    window.myRadar = new Chart(document.getElementById('ability'), config)

    var btn1 = document.getElementById('chartbtn01')
    var btn2 = document.getElementById('chartbtn02')
    var btn3 = document.getElementById('chartbtn03')
    var btn4 = document.getElementById('chartbtn04')
    var btn5 = document.getElementById('chartbtn05')
    var btn6 = document.getElementById('chartbtn06')
    var btn7 = document.getElementById('chartbtn07')
    var g1 = document.getElementById('chartgroup01')
    var g2 = document.getElementById('chartgroup02')
    var g3 = document.getElementById('chartgroup03')
    var v1 = document.getElementById('atk')
    var v2 = document.getElementById('def')
    var v3 = document.getElementById('dex')
    var v4 = document.getElementById('dur')
    var v5 = document.getElementById('hide')
    var obj0 = {
        val1: '0',
        val2: '0',
        val3: '0',
        val4: '0',
        val5: '0'
    }
    var obj1 = {
        val1: '1',
        val2: '1',
        val3: '1',
        val4: '1',
        val5: '1'
    }
    var obj2 = {
        val1: '1',
        val2: '1',
        val3: '1',
        val4: '1',
        val5: '1'
    }
    var obj3 = {
        val1: '1',
        val2: '1',
        val3: '4',
        val4: '3',
        val5: '4'
    }
    var obj4 = {
        val1: '2',
        val2: '3',
        val3: '2',
        val4: '4',
        val5: '1'
    }
    var obj5 = {
        val1: '2',
        val2: '3',
        val3: '2',
        val4: '3',
        val5: '3'
    }
    var obj6 = {
        val1: '5',
        val2: '2',
        val3: '2',
        val4: '1',
        val5: '2'
    }
    var obj7 = {
        val1: '4',
        val2: '4',
        val3: '2',
        val4: '1',
        val5: '3'
    }
    btn1.addEventListener('click', function () {
        clickfunc('#chartbtn01', '#chartgroup01 .active', obj1, obj2)
        whatpic();
    })
    btn2.addEventListener('click', function () {
        clickfunc('#chartbtn02', '#chartgroup01 .active', obj2, obj1)
        whatpic();
    })
    btn3.addEventListener('click', function () {
        if ($(this).hasClass('active')) {
            return false
        } else {
            var whereActive = $('#chartgroup02 .active').attr('obj')
            $('#chartgroup02 .active').removeClass('active')
            $(this).addClass('active')
            if (whereActive == 'obj4') {
                doing(obj3, obj4)
            } else {
                doing(obj3, obj5)
            }
        }
        whatpic();
    })
    btn4.addEventListener('click', function () {
        if ($(this).hasClass('active')) {
            return false
        } else {
            var whereActive = $('#chartgroup02 .active').attr('obj');
            $('#chartgroup02 .active').removeClass('active')
            $(this).addClass('active')
            if (whereActive == 'obj3') {
                doing(obj4, obj3)
            } else {
                doing(obj4, obj5)
            }
        }
        whatpic();
    })
    btn5.addEventListener('click', function () {
        if ($(this).hasClass('active')) {
            return false
        } else {
            var whereActive = $('#chartgroup02 .active').attr('obj')
            $('#chartgroup02 .active').removeClass('active')
            $(this).addClass('active')
            if (whereActive == 'obj3') {
                doing(obj5, obj3)
            } else {
                doing(obj5, obj4)
            }
        }
        whatpic();
    })
    btn6.addEventListener('click', function () {
        clickfunc('#chartbtn06', '#chartgroup03 .active', obj6, obj7)
        whatpic();
    })
    btn7.addEventListener('click', function () {
        clickfunc('#chartbtn07', '#chartgroup03 .active', obj7, obj6)
        whatpic();
    })
    var clickfunc = (who, group, obj_1, obj_2) => {
        if ($(who).hasClass('active')) {
            return false
        } else {
            $(group).removeClass('active')
            $(who).addClass('active')
            doing(obj_1, obj_2)
        }
    }
    var doing = (plusobj, minusobj) => {
        nowv1 = parseInt(v1.value)
        nowv2 = parseInt(v2.value)
        nowv3 = parseInt(v3.value)
        nowv4 = parseInt(v4.value)
        nowv5 = parseInt(v5.value)
        v1.value = nowv1 + parseInt(plusobj.val1) - parseInt(minusobj.val1)
        v2.value = nowv2 + parseInt(plusobj.val2) - parseInt(minusobj.val2)
        v3.value = nowv3 + parseInt(plusobj.val3) - parseInt(minusobj.val3)
        v4.value = nowv4 + parseInt(plusobj.val4) - parseInt(minusobj.val4)
        v5.value = nowv5 + parseInt(plusobj.val5) - parseInt(minusobj.val5)
        console.log('加的數值:' + plusobj.val1)
        console.log('減的數值:' + minusobj.val1)
    }
    let btns = document.querySelectorAll('.item_content_option')
    for (let i = 0; i < btns.length; i++) {
        btns[i].addEventListener('click', function (e) {
            dataArr = new Array();
            var t = document.getElementsByClassName('txt')
            len = t.length
            for (var i = 0; i < len; i++) {
                dataArr.push(parseInt(t[i].value))
            }
            myRadar.data.datasets[0].data = dataArr
            myRadar.update();
        })
    }
}
