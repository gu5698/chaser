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

    // 移到最下方
    // console.log(messageBody.clientHeight, messageBody.scrollHeight, messageBody.offsetHeight);
    messageBody.scrollTop = messageBody.scrollHeight;

    // enter
    messageTextarea.addEventListener('keydown', (e)=>{
        console.log(e.keyCode, e.shiftKey);
        if(e.keyCode == 13 && e.shiftKey){
            return;
        }
        else if(e.keyCode == 13){
            e.preventDefault();
            if(messageTextarea.value != ''){
                let newMessage = document.createElement("div");
                newMessage.className = 'message message-user';
                newMessage.innerText = messageTextarea.value;
                messageBody.appendChild(newMessage);
                messageTextarea.value = '';
                // 移到最下方
                messageBody.scrollTop = messageBody.scrollHeight;
            }
        }
    });
    messageSubmit.addEventListener('click', (e)=>{
        if(messageTextarea.value != ''){
            let newMessage = document.createElement("div");
            newMessage.className = 'message message-user';
            newMessage.innerText = messageTextarea.value;
            messageBody.appendChild(newMessage);
            messageTextarea.value = '';
            // 移到最下方
            messageBody.scrollTop = messageBody.scrollHeight;
        }
    });


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