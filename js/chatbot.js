window.addEventListener('load', chatbotEvent);


function chatbotEvent() {
    // console.log('chatbotEvent');
    // =============================================================
    let chatbot = document.getElementById('chatbot');
    let messageHead = document.getElementById('message-head');
    let greeting = document.getElementById('greeting');
    let avatar = document.getElementById('avatar');
    let greetingCloseBtn = document.getElementById('greeting-close');

    let messageBody= document.getElementById('message-body');
    let messageTextarea= document.getElementById('message-textarea');
    let messageSubmit= document.getElementById('message-submit');

    messageHead.addEventListener('click', function(){
        chatbot.querySelector('.message-window').classList.toggle('show');
    });

    avatar.addEventListener('click', function(){
        // console.log(greeting.style.opacity);

        greeting.style.opacity = 1;
        greeting.style.visibility = 'visible';
    });

    greetingCloseBtn.addEventListener('click', function(){

        greeting.style.opacity = 0;
        greeting.style.visibility = 'hidden';
    });



    if (window.matchMedia("(min-width: 768px)").matches) {
        setTimeout(() => {
            greeting.style.opacity = 1;
            greeting.style.visibility = 'visible';
        }, 5000);
    }


    let chatbotHead = document.getElementById('chatbot-head');
    // console.log(window.location.href.includes('gallery.php'));
    if(window.location.href.includes('gallery.php')){
        chatbotHead.src = 'images/common/chatbot-head-2.svg';
        greeting.querySelector('.message').innerText = '特別任務 : 尋找鋼琴 (提示 : 小蜜蜂)';
    }


    // 移到最下方
    // console.log(messageBody.clientHeight, messageBody.scrollHeight, messageBody.offsetHeight);
    messageBody.scrollTop = messageBody.scrollHeight;

    // enter
    messageTextarea.addEventListener('keydown', (e)=>{
        // console.log(e.keyCode, e.shiftKey);
        if(e.keyCode == 13 && e.shiftKey){
            return;
        }
        else if(e.keyCode == 13){
            e.preventDefault();
            if(messageTextarea.value != ''){
                newUserMsg();
            }
        }
    });
    // click
    messageSubmit.addEventListener('click', (e)=>{
        if(messageTextarea.value != ''){
            newUserMsg();
        }
    });



    // =============================================================AJAX

    function newUserMsg(){
        let newMessages, newestMsg;
        let newMessage = document.createElement("div");
        newMessage.className = 'message message-user';
        newestMsg = messageTextarea.value;
        newMessage.innerText = newestMsg;
        console.log(newestMsg);
        messageBody.appendChild(newMessage);
        messageTextarea.value = '';
        // 移到最下方
        messageBody.scrollTop = messageBody.scrollHeight;

        // 訊息數
        newMessages = document.querySelectorAll('.message-user');
        console.log(newMessages.length);



        // AJAX
        let xhr = new XMLHttpRequest();
    
        xhr.onload = ()=>{
            console.log('return');
            if( xhr.responseText == "not found"){
                console.log("not found");
                let newResponse = document.createElement("div");
                newResponse.className = 'message message-bot';
                newResponse.innerText = '抱歉，CHASER不太了解您的意思，可以請您換個說法嗎？';
                messageBody.appendChild(newResponse);
                messageBody.scrollTop = messageBody.scrollHeight;
            }else if(xhr.responseText == "error"){
                console.log("系統錯誤");
            }else{ //成功
                let newResponse = document.createElement("div");
                newResponse.className = 'message message-bot';
                newResponse.innerHTML = xhr.responseText;
                messageBody.appendChild(newResponse);
                messageBody.scrollTop = messageBody.scrollHeight + 1000;
            }
        }

        let url = 'ajaxChatbot.php';
        xhr.open("post", url, true);
          
        xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");  
    
        let sendUserMsg = `sendUserMsg=${newestMsg}`;
    
        xhr.send(sendUserMsg);

    }

    

    // 呼叫 function
    commonTweenMax();
}
// =================================================================


function commonTweenMax(){
    // console.log('commonTweenMax');
    // chatbot
    TweenMax.to('#chatbot-head', 3, {
        repeat: -1,
        rotationY: 360,
        repeatDelay: 3
    });
}