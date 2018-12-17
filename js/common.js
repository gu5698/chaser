window.addEventListener('load', commonInit);

// =================================================================

function commonInit(){
    // console.log('commonInit');
    // =======================================================navbar
    let navbar = document.getElementById('navbar');
    let navbarIcon = document.querySelectorAll('.navbar-icon');

    if (window.matchMedia('(max-width: 768px)').matches) {
        for(let i=0; i<navbarIcon.length; i++){
            navbar.appendChild(navbarIcon[i]);
        }
    }
    window.addEventListener('resize', ()=>{
        if (window.matchMedia('(max-width: 768px)').matches) {
            for(let i=0; i<navbarIcon.length; i++){
                navbar.appendChild(navbarIcon[i]);
            }
        }else{
            for(let i=0; i<navbarIcon.length; i++){
                navbar.querySelector('ul').appendChild(navbarIcon[i]);
            }

            navbar.querySelector('ul').classList.remove('op1-vv');
        }
    });
    // 漢堡
    let navbarToggle = document.getElementById('navbar-toggle');
    navbarToggle.addEventListener('click', ()=>{
        navbar.querySelector('ul').classList.toggle('op1-vv');
    });
    // =======================================================end navbar
    
    // 呼叫 function
    // chatbotEvent();
    // commonTweenMax();
}
// =================================================================

