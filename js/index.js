window.addEventListener('load', init);

function init(){
    // console.log('init');
        
    console.log(missionsJson);
    console.log(productsJson);
    // =======================================================missions

    let missionGroup = document.getElementById('mission-group');
    let missionsJsonLen = missionsJson.length;
    // console.log(missionsJsonLen);
    
    for(let i=0; i<missionsJsonLen; i++){
        // console.log(i);
        missionGroup.innerHTML += `
        <div class="mission mission-${missionsJson[i]['mission_id']} mission-hover" style="left:${missionsJson[i]['x_axis']}%;top:${missionsJson[i]['y_axis']}%;">
            <div class="wave"></div>
            <div class="stripes">
                <div class="stripes-running"></div>
            </div>
            <img src="images/index/${missionsJson[i]['img']}" alt="${missionsJson[i]['img']}">
            <div class="bg"></div>
            <div class="mission-code fz-6">
                MISSION CODE:<span class="d-block">${missionsJson[i]['mission_code']}</span>
                <div class="corner-decor-l"></div>
                <div class="corner-decor-r"></div>
            </div>
            <i class="fas fa-exclamation icon-exclamation"></i>
            <i class="fas fa-backspace mission-close"></i>
            <p class="mission-content fz-p">${missionsJson[i]['content']}</p>
            <div class="chart-wrapper">
                <canvas class="attr-chart" data-attr="${missionsJson[i]['atk']},${missionsJson[i]['def']},${missionsJson[i]['hide']},${missionsJson[i]['dur']},${missionsJson[i]['dex']}"></canvas>
            </div>
            <div class="link-group">
                <a href="#" class="btn btn-border">添購裝備</a>
                <a href="#" class="btn btn-solid">前往客製</a>
            </div>
            <div class="dashed-circle"></div>
        </div>`;
    } // end missions
    

    // =======================================================sec-market
    // img.src = 'images/mall/item6.png';
    let prevProduct = document.getElementById('prev-product');
    let nextProduct = document.getElementById('next-product');
    let productName = document.getElementById('product-name');
    let productPrice = document.getElementById('product-price');
    let btnAddCart = document.querySelector('.btn-add-cart');


    let productsJsonLen = productsJson.length;
    // console.log(productsJsonLen);

    let curImgNo = 5; //第一張照片
    let imgSrc = `images/mall/${productsJson[curImgNo]['product_image']}`;
    // console.log(imgSrc);
    prodChangeInfo();

    // addbtn 黯然銷魂筆|item1.png|1688|1
    btnAddCart.id = `P${curImgNo + 1}`;
    btnAddCart.dataset.id = `${productsJson[curImgNo]['product_name']}|item${curImgNo + 1}.png|${productsJson[curImgNo]['product_price']}|1`;


    function prodChangeInfo() {
        productName.innerText = `${productsJson[curImgNo]['product_name']}`;
        productPrice.innerText = `US$ ${productsJson[curImgNo]['product_price']}`;
    }
    

    // ====================
    // 起
    holographicProjection(imgSrc);

    
    let marketCanvas;

    let tmotNo;
    window.addEventListener('resize', ()=>{
        clearTimeout(tmotNo);
        tmotNo = setTimeout(holographicProjection, 200, imgSrc)
    });
    // ====================
    // 點擊換圖 1222改
    prevProduct.addEventListener('click', ()=>{
        marketCanvas = document.getElementById('sec-market').querySelector('canvas');
        marketCanvas.classList.remove('op1');
        curImgNo--;
        if(curImgNo >= 0){
            // console.log(curImgNo);
            imgSrc = `images/mall/${productsJson[curImgNo]['product_image']}`;
            setTimeout(()=>{
                holographicProjection(imgSrc);
                prodChangeInfo();
            }, 200);
            TweenMax.fromTo('.product-bg .flash', 0.5, {right: '-300%'}, {right: '100%'});
            // =====================addbtn
            btnAddCart.id = `P${curImgNo + 1}`;
            btnAddCart.dataset.id = `${productsJson[curImgNo]['product_name']}|item${curImgNo + 1}.png|${productsJson[curImgNo]['product_price']}|1`;
        }else{
            curImgNo = productsJsonLen - 1;
            imgSrc = `images/mall/${productsJson[curImgNo]['product_image']}`;
            setTimeout(()=>{
                holographicProjection(imgSrc);
                prodChangeInfo();
            }, 200);
            TweenMax.fromTo('.product-bg .flash', 0.5, {right: '-300%'}, {right: '100%'});
            // =====================addbtn
            btnAddCart.id = `P${curImgNo + 1}`;
            btnAddCart.dataset.id = `${productsJson[curImgNo]['product_name']}|item${curImgNo + 1}.png|${productsJson[curImgNo]['product_price']}|1`;
        }
    });
    nextProduct.addEventListener('click', ()=>{
        marketCanvas = document.getElementById('sec-market').querySelector('canvas');
        marketCanvas.classList.remove('op1');
        curImgNo++;
        if(curImgNo <= productsJsonLen - 1){
            // console.log(curImgNo);
            imgSrc = `images/mall/${productsJson[curImgNo]['product_image']}`;
            setTimeout(()=>{
                holographicProjection(imgSrc);
                prodChangeInfo();
            }, 200);
            TweenMax.fromTo('.product-bg .flash', 0.5, {right: '100%'}, {right: '-300%'});
            // =====================addbtn
            btnAddCart.id = `P${curImgNo + 1}`;
            btnAddCart.dataset.id = `${productsJson[curImgNo]['product_name']}|item${curImgNo + 1}.png|${productsJson[curImgNo]['product_price']}|1`;
        }else{
            curImgNo = 0;
            imgSrc = `images/mall/${productsJson[curImgNo]['product_image']}`;
            setTimeout(()=>{
                holographicProjection(imgSrc);
                prodChangeInfo();
            }, 200);
            TweenMax.fromTo('.product-bg .flash', 0.5, {right: '100%'}, {right: '-300%'});
            // =====================addbtn
            btnAddCart.id = `P${curImgNo + 1}`;
            btnAddCart.dataset.id = `${productsJson[curImgNo]['product_name']}|item${curImgNo + 1}.png|${productsJson[curImgNo]['product_price']}|1`;
        }
    });
    // =======================================================end sec-market


    // =======================================================sec-about
    let enterAbout = document.getElementById('enter-about');
    enterAbout.addEventListener('mouseenter', ()=>{
        enterAbout.querySelector('.access').innerText = 'ACCESS ALLOWED';
    });
    enterAbout.addEventListener('mouseleave', ()=>{
        enterAbout.querySelector('.access').innerText = 'ACCESS DENIED';
    });


    enterAbout.addEventListener('click', ()=>{
        setTimeout(() => {
            window.location.href = 'about.php';
        }, 300);
    });

    // ====================
    // getCoupon(); //拆出來
    // ====================
    missionEvent();
    // ====================
    customizeEvent()
    // ====================
    tweenMax();
} // end init


// function getCoupon(){
//     let getCoupon = document.getElementById('get-coupon');
//     let couponTimerSec = document.getElementById('coupon-timer-sec');
//     // 倒數時間
//     let nowSec = 5;
//     let nowSecFixed = nowSec.toFixed(2);
//     couponTimerSec.innerText = nowSecFixed;

//     // 密碼
//     let keys = [38,38,40,40,37,39,37,39,66,65];
//     let keysLeft;
    
//     window.addEventListener( 'keydown', keyCodeMatch );
//     // 重置密碼
//     reset();

//     function reset(){
//         keysLeft = keys.slice(0);
//         // console.log(keysLeft);
//     }
    
//     function keyCodeMatch( e ){
//         if( e.keyCode === keysLeft[0] ){
//             keysLeft.shift();

//             if( keysLeft.length > 0 ){
//                 return;
//             }
//             window.removeEventListener( 'keydown', keyCodeMatch );
//             getCoupon.style.visibility = 'visible';
//             getCoupon.style.opacity = 1;
//             TweenMax.to('#coupon-number .flash', .5, {right: '-200%', delay: .5});
//             setTimeout(countdown, 1300);
//         } else {            
//             // console.log('keysLeft', keysLeft);
//             if( keysLeft.length === keys.length ){
//                 return;
//             }
//             reset();            
//             // console.log('keysLeft', keysLeft);
//         }
//     }

//     function countdown(){
//         let countdownTimer = setInterval(() => {
//             nowSec -= 0.04;
//             nowSecFixed = nowSec.toFixed(2);
//             // console.log(nowSec, nowSecFixed);
            
//             couponTimerSec.innerText = nowSecFixed;

//             if(nowSec <= 0){
//                 clearInterval(countdownTimer);
//                 couponTimerSec.innerText = '0.00';
//                 getCoupon.querySelector('.coupon').style.background = 'rgba(200,0,0,.8) repeating-linear-gradient(to bottom, rgba(0,0,0,1), rgba(0,0,0,1) 1px, transparent 1px, transparent 3px)';
//                 setTimeout(()=>{
//                     getCoupon.style.visibility = 'hidden';
//                     getCoupon.style.opacity = 0;
//                 }, 500);
//             }
//         }, 40);
//     }
// } // end getCoupon



function missionEvent(){
    // console.log('missionEvent');
    // ===========================================================missions
    let missions = document.querySelectorAll('.mission');
    let missionsLen = missions.length;
    let missionCloseBtns = document.querySelectorAll('.mission-close');
    // console.log(missions, missionsLen);

    function missionOpen(e){
        // 先關其他開啟的
        for(let i=0; i<missionsLen; i++){            
            if(missions[i].classList.contains('active')){
                missions[i].classList.remove('active');
                missions[i].addEventListener('click', missionOpen);
            }
            // console.log(missions[i].classList.contains('active'));
        }

        this.classList.add('active');
        this.removeEventListener('click', missionOpen);
        // console.log(this, e.target, e.currentTarget);
    }

    function missionClose(){
        this.parentNode.classList.remove('active');
        setTimeout(() => {
            this.parentNode.addEventListener('click', missionOpen);
            // console.log('add missionOpen');
        }, 300);
        // console.log(this, this.parentNode);
    }
    for(let i=0; i<missionsLen; i++){
        // mission click open
        missions[i].addEventListener('click', missionOpen);

        // mission click close
        missionCloseBtns[i].addEventListener('click', missionClose);

        // index canvas
        let ctx = missions[i].querySelector('canvas');
        let arrDataAttr = ctx.dataset.attr.split(',');


        // console.log(arrDataAttr);

        Chart.defaults.global.defaultFontFamily = 'NotoSerifCJKtc';
        Chart.defaults.global.defaultFontColor = '#fff';
        Chart.defaults.global.defaultFontSize = 12;
        let myBarChart = new Chart(ctx, {
            type: 'horizontalBar',
            data: {
                labels: ["攻擊", "防禦", "隱匿", "耐久", "速度"],
                datasets: [{
                    data: arrDataAttr,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true, 
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                // tooltips: {
                //     enabled: false
                // },
                scales: {
                    xAxes: [{
                        ticks: {
                            // display: false,
                            min: 0,
                            max: 10
                        }
                    }]
                }
            }
        });
    } // end for
} //end missionEvent



function customizeEvent(){
    // =======================================================chart
    let attrWatch = [7, 4, 7, 5, 7];
    let attrSuit = [2, 9, 3, 7, 4];
    let attrGlasses = [7, 6, 6, 7, 8];
    let arrAttr = [attrWatch, attrSuit, attrGlasses];

    let ctx = document.getElementById('mall_mychart').getContext('2d');
    let customizeChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: ["攻擊", "防禦", "隱匿", "耐久", "速度"],
            datasets: [{
                data: arrAttr[0],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true, 
            maintainAspectRatio: false,
            legend: {
                display: false
            },
            // tooltips: {
            //     enabled: false
            // },
            scales: {
                xAxes: [{
                    ticks: {
                        // display: false,
                        min: 0,
                        max: 10
                    }
                }]
            }
        }
    });


    // =======================================================closetBlockCarousel
    let closetBlock1 = document.getElementById('closet-block-1');
    let closetBlock2 = document.getElementById('closet-block-2');
    let closetBlock3 = document.getElementById('closet-block-3');
    let degClosetBlock1 = 0;
    let degClosetBlock2 = 120;
    let degClosetBlock3 = 240;
    let nowNo = document.getElementById('now-no');
    let nowNoNum = 1;
    let widthTimer;

    let arrClosetBlock = [closetBlock1, closetBlock2, closetBlock3];
    let arrDegClosetBlock = [degClosetBlock1, degClosetBlock2, degClosetBlock3];
    let arrClosetBlockLen = arrClosetBlock.length;
    // console.log(arrClosetBlock, arrDegClosetBlock);
    
    function closetBlockCarousel(){
        for(let i=0; i<arrClosetBlockLen; i++){
            // rotateY
            arrClosetBlock[i].style.transform = `translateY(-50%) rotateY(${arrDegClosetBlock[i]}deg)`;

            // opacity
            if(arrDegClosetBlock[i] % 360 == 0){
                arrClosetBlock[i].style.opacity = 1;
                arrClosetBlock[i].style.zIndex = 1;
            }else{
                arrClosetBlock[i].style.opacity = 0.5;
                arrClosetBlock[i].style.zIndex = 'auto';
            }
        }
    }
    closetBlockCarousel();
    
    let prevCustomize = document.getElementById('btn-prev');
    let nextCustomize = document.getElementById('btn-next');
    let nowArrAttr = 0;
    let customizeName = document.getElementById('customize-name');
    let arrCustomizeName = ['射擊手錶', '防彈西裝', '科技眼鏡'];
    let nowArrCustomizeName = 0;
    customizeName.innerText = arrCustomizeName[nowArrCustomizeName];

    prevCustomize.addEventListener('click', ()=>{
        for(let i=0; i<arrClosetBlockLen; i++){
            arrDegClosetBlock[i] += 120;
        }
        closetBlockCarousel();
        nowNoNum--;
        changeNowNoNum();
        clearInterval(widthTimer);
        nextTimer();
        // 更新 chart
        nowArrAttr++;
        // console.log(Math.abs(nowArrAttr % 3));
        customizeChart.data.datasets[0].data = arrAttr[Math.abs(nowArrAttr % 3)];
        customizeChart.update();
        // 換名字
        nowArrCustomizeName ++;
        customizeName.innerText = arrCustomizeName[Math.abs(nowArrCustomizeName % 3)];
        TweenMax.fromTo('.now-no .flash', 0.5, {right: '-300%'}, {right: '100%'});
        TweenMax.fromTo('.customize-name .flash', 0.5, {right: '-300%'}, {right: '100%'});
    });
    nextCustomize.addEventListener('click', ()=>{
        for(let i=0; i<arrClosetBlockLen; i++){
            arrDegClosetBlock[i] -= 120;
        }
        closetBlockCarousel();
        nowNoNum++;
        changeNowNoNum();
        clearInterval(widthTimer);
        nextTimer();
        // 更新 chart
        nowArrAttr--;
        // console.log(Math.abs(nowArrAttr % 3));
        customizeChart.data.datasets[0].data = arrAttr[Math.abs(nowArrAttr % 3)];
        customizeChart.update();
        // 換名字
        nowArrCustomizeName --;
        customizeName.innerText = arrCustomizeName[Math.abs(nowArrCustomizeName % 3)];        
        TweenMax.fromTo('.now-no .flash', 0.5, {right: '100%'}, {right: '-300%'});
        TweenMax.fromTo('.customize-name .flash', 0.5, {right: '100%'}, {right: '-300%'});
    });



    let progressRunning = document.querySelector('#progress-running');
    // progressRunning.classList.add('w-100p');


    let smController = new ScrollMagic.Controller();

    let carouselReveal = new ScrollMagic.Scene({
        triggerElement: '#trigger-customize-2',
        offset: 600,
        reverse: false,
        // triggerHook: 0
    });

    carouselReveal.setTween(TweenMax.from('.closet-block', .5,
    {top: '+=20', opacity: 0})).on('enter', ()=>{
        nextTimer();
    })
    // .addIndicators({name: 'carousel'})
    .addTo(smController);

    // nextTimer
    function nextTimer(){
        // 寬度增加
        let nowWidth = 0;
        widthTimer = setInterval(() => {
            nowWidth ++;
            // console.log(nowWidth);
            
            // 滿了換下一個
            if(nowWidth == 100){
                clearInterval(widthTimer);
                // console.log('stop');
                for(let i=0; i<arrClosetBlockLen; i++){
                    arrDegClosetBlock[i] -= 120;
                }
                closetBlockCarousel();
                nowNoNum ++;
                changeNowNoNum();
                nextTimer();
            }
            
            progressRunning.style.width = `${nowWidth}%`;
        }, 50);
        // console.log(widthTimer);   
    } // end nextTimer
    

    function changeNowNoNum(){
        if(nowNoNum == 4){
            nowNoNum = 1;
        }else if(nowNoNum == 0){
            nowNoNum = 3;
        }
        nowNo.innerText = `no. ${nowNoNum}`;
    }



}








function holographicProjection(imgSrc){
    THREE.VolumetericLightShader = {
        uniforms: {
          tDiffuse: {value:null},
          lightPosition: {value: new THREE.Vector2(0.5, 0.5)},
          exposure: {value: 1},
          decay: {value: 1},
          density: {value: 6},
          weight: {value: 0.57},
          samples: {value: 30}
        },
      
        vertexShader: [
          "varying vec2 vUv;",
          "void main() {",
            "vUv = uv;",
            "gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);",
          "}"
        ].join("\n"),
      
        fragmentShader: [
          "varying vec2 vUv;",
          "uniform sampler2D tDiffuse;",
          "uniform vec2 lightPosition;",
          "uniform float exposure;",
          "uniform float decay;",
          "uniform float density;",
          "uniform float weight;",
          "uniform int samples;",
          "const int MAX_SAMPLES = 100;",
          "void main()",
          "{",
            "vec2 texCoord = vUv;",
            "vec2 deltaTextCoord = texCoord - lightPosition;",
            "deltaTextCoord *= 1.0 / float(samples) * density;",
            "vec4 color = texture2D(tDiffuse, texCoord);",
            "float illuminationDecay = 1.0;",
            "for(int i=0; i < MAX_SAMPLES; i++)",
            "{",
              "if(i == samples) {",
                "break;",
              "}",
              "texCoord += deltaTextCoord;",
              "vec4 sample = texture2D(tDiffuse, texCoord);",
              "sample *= illuminationDecay * weight;",
              "color += sample;",
              "illuminationDecay *= decay;",
            "}",
            "gl_FragColor = color * exposure;",
          "}"
        ].join("\n")
      };
      THREE.AdditiveBlendingShader = {
        uniforms: {
          tDiffuse: { value:null },
          tAdd: { value:null }
        },
      
        vertexShader: [
          "varying vec2 vUv;",
          "void main() {",
            "vUv = uv;",
            "gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);",
          "}"
        ].join("\n"),
      
        fragmentShader: [
          "uniform sampler2D tDiffuse;",
          "uniform sampler2D tAdd;",
          "varying vec2 vUv;",
          "void main() {",
            "vec4 color = texture2D(tDiffuse, vUv);",
            "vec4 add = texture2D(tAdd, vUv);",
            "gl_FragColor = color + add;",
          "}"
        ].join("\n")
      };
      THREE.PassThroughShader = {
        uniforms: {
          tDiffuse: { value: null }
        },
      
        vertexShader: [
          "varying vec2 vUv;",
          "void main() {",
            "vUv = uv;",
            "gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);",
          "}"
        ].join("\n"),
      
        fragmentShader: [
          "uniform sampler2D tDiffuse;",
          "varying vec2 vUv;",
          "void main() {",
            "gl_FragColor = texture2D(tDiffuse, vec2(vUv.x, vUv.y));",
          "}"
        ].join("\n")
      };
      
    //   ================================================================================
    // console.log('holographicProjection');
    

    let colProduct = document.getElementById('sec-market').querySelector('.col-product');
    
    let width = parseInt(window.getComputedStyle(colProduct).width) - 30; //扣掉padding30
    let height = parseInt(window.getComputedStyle(colProduct).height);
    // console.log(width, height);

    // window.addEventListener('resize',()=>{
    //     width = parseInt(window.getComputedStyle(colProduct).width) - 30; //扣掉padding30
    //     height = parseInt(window.getComputedStyle(colProduct).height);    
    //     // console.log(width, height);
    // });


    const getImageTexture = (image, density = 1) => {
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        // const { width, height } = image;
        
        // console.log(width, height);
        
        canvas.setAttribute('width', width * density);
        canvas.setAttribute('height', height * density);
        canvas.style.width = `${width}px`;
        canvas.style.height = `${height}px`;
        
        ctx.drawImage(image, 0, 0, width * density, height * density);    
        
        return canvas;
    };
    
      
    //   let width = 1280;
    //   let height = 720;
    const lightColor = 0x00FAFC;
    const DEFAULT_LAYER = 0;
    const OCCLUSION_LAYER = 1;
    const renderScale = .25;
    // ========================================================================gui
    // const gui = new dat.GUI();
    // ========================================================================gui
    const clock = new THREE.Clock();


    let composer, 
        filmPass, 
        badTVPass, 
        bloomPass,
        occlusionComposer, 
        itemMesh, 
        occMesh, 
        occRenderTarget, 
        lightSource,
        vlShaderUniforms;

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, width / height, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({
    antialias: false,
    alpha: true
    });
    renderer.setSize(width, height);
    // document.body.appendChild(renderer.domElement);
    let canvas = document.getElementById('sec-market').querySelector('canvas');
    if(document.getElementById('sec-market').querySelector('canvas')){
        // console.log('exist', canvas);
        document.getElementById('sec-market').querySelector('.col-product').replaceChild(renderer.domElement, canvas);
    }else{
        // console.log('not found');
        document.getElementById('sec-market').querySelector('.col-product').appendChild(renderer.domElement);
    }

    
    
    function setupScene() {
    lightSource = new THREE.Object3D();
    lightSource.position.x = 0;
    lightSource.position.y = -15;
    lightSource.position.z = -15;
    

    // const itemGeo = new THREE.PlaneGeometry(9, 2.1);
    const itemMaterial = new THREE.MeshBasicMaterial({transparent: true, opacity: 0.7});
    
    const img = new Image();
    // img.src = 'images/mall/item6.png';
    img.src = imgSrc;
    img.crossOrigin = 'Anonymous';

    let imgWidth, imgHeight, imgAspectRatio, itemGeo;
   

    img.onload = function() {
        imgWidth = img.width;
        imgHeight = img.height;
        imgAspectRatio = imgWidth / imgHeight;
        // console.log(imgWidth, imgHeight, imgAspectRatio);

        // itemGeo = new THREE.PlaneGeometry(imgWidth, imgHeight);
        itemGeo = new THREE.PlaneGeometry(1, 1 / imgAspectRatio);
        
        const itemTexture = new THREE.Texture(
            getImageTexture(img),
            null,
            THREE.ClampToEdgeWrapping,
            THREE.ClampToEdgeWrapping,
            null,
            THREE.LinearFilter
        );
    

        itemTexture.needsUpdate = true;
        itemMaterial.map = itemTexture;
    
        itemMesh = new THREE.Mesh(itemGeo, itemMaterial);    
        scene.add(itemMesh);
    
        const occItemMaterial = new THREE.MeshBasicMaterial({color: lightColor});
        occItemMaterial.map = itemTexture;
        occMesh = new THREE.Mesh(itemGeo, occItemMaterial);  
        occMesh.layers.set(OCCLUSION_LAYER);
        scene.add(occMesh);
    }
    
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    // camera.position.z = 2;
    
    if (window.matchMedia("(max-width: 768px)").matches) {
        camera.position.z = 1.4;
    } else {
        camera.position.z =  900 / width;
    }
    // console.log(900 / width);
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    }
    
    function setupPostprocessing() {    
    occRenderTarget = new THREE.WebGLRenderTarget(width * renderScale, height * renderScale);
    
    // Blur passes
    const hBlur = new THREE.ShaderPass(THREE.HorizontalBlurShader);
    const vBlur = new THREE.ShaderPass(THREE.VerticalBlurShader);
    const bluriness = 7;
    hBlur.uniforms.h.value = bluriness / width;
    vBlur.uniforms.v.value = bluriness / height;
    
    // Bad TV Pass
    badTVPass = new THREE.ShaderPass(THREE.BadTVShader);
    badTVPass.uniforms.distortion.value = 1.9;
    badTVPass.uniforms.distortion2.value = 1.2;
    badTVPass.uniforms.speed.value = 0.2;
    badTVPass.uniforms.rollSpeed.value = 0;
    
    // Volumetric Light Pass
    const vlPass = new THREE.ShaderPass(THREE.VolumetericLightShader);
    vlShaderUniforms = vlPass.uniforms;
    vlPass.needsSwap = false;
    
    // Occlusion Composer
    occlusionComposer = new THREE.EffectComposer(renderer, occRenderTarget);
    occlusionComposer.addPass(new THREE.RenderPass(scene, camera));
    occlusionComposer.addPass(hBlur);
    occlusionComposer.addPass(vBlur);
    occlusionComposer.addPass(hBlur);
    occlusionComposer.addPass(vBlur);
    occlusionComposer.addPass(hBlur);
    occlusionComposer.addPass(badTVPass);
    occlusionComposer.addPass(vlPass);
    
    // Bloom pass
    // bloomPass = new THREE.UnrealBloomPass(width / height, 0.5, .8, .3);
    bloomPass = new THREE.UnrealBloomPass(width / height, 0, 0, 0);
    
    // Film pass
    filmPass = new THREE.ShaderPass(THREE.FilmShader);
    filmPass.uniforms.sCount.value = 1200;
    filmPass.uniforms.grayscale.value = false;
    filmPass.uniforms.sIntensity.value = 1.5;
    filmPass.uniforms.nIntensity.value = 0.2;
    
    // Blend occRenderTarget into main render target 
    const blendPass = new THREE.ShaderPass(THREE.AdditiveBlendingShader);
    blendPass.uniforms.tAdd.value = occRenderTarget.texture;
    blendPass.renderToScreen = true;
    
    // Main Composer
    composer = new THREE.EffectComposer(renderer);
    composer.addPass(new THREE.RenderPass(scene, camera));
    composer.addPass(bloomPass);
    composer.addPass(badTVPass);
    composer.addPass(filmPass);
    composer.addPass(blendPass);
    }
    
    function onFrame() {
        requestAnimationFrame(onFrame);
        update();
        render();
    }
    
    function update() {
    const timeDelta = clock.getDelta();
    const elapsed = clock.getElapsedTime();
    
    filmPass.uniforms.time.value += timeDelta;
    badTVPass.uniforms.time.value += 0.01;
    
    if (itemMesh) {
        itemMesh.rotation.y = Math.sin(elapsed / 2) / 15;
        itemMesh.rotation.z = Math.cos(elapsed / 2) / 50;
        occMesh.rotation.copy(itemMesh.rotation);
    }
    }
    
    function render() {
    camera.layers.set(OCCLUSION_LAYER);
    //renderer.setClearColor(0x000000);
    occlusionComposer.render();
    
    camera.layers.set(DEFAULT_LAYER);
    //renderer.setClearColor(0x000000);
    composer.render();
    }
    
    function setupGUI() {
    let folder,
        min,
        max,
        step,
        updateShaderLight = function() {
            const p = lightSource.position.clone(),
                vector = p.project(camera),
                x = (vector.x + 1) / 2,
                y = (vector.y + 1) / 2;
            vlShaderUniforms.lightPosition.value.set(x, y);
        };
    
    updateShaderLight();
    
    // ========================================================================gui
    // Bloom Controls
    // folder = gui.addFolder('Bloom');
    // folder.add(bloomPass, 'radius')
    //     .min(0)
    //     .max(10)
    //     .name('Radius');
    // folder.add(bloomPass, 'threshold')
    //     .min(0)
    //     .max(1)
    //     .name('Threshold');
    // folder.add(bloomPass, 'strength')
    //     .min(0)
    //     .max(10)
    //     .name('Strength');
    // folder.open();
    
    //     // Bad TV Controls
    // folder = gui.addFolder('TV');
    // folder.add(badTVPass.uniforms.distortion, 'value')
    //     .min(0)
    //     .max(10)
    //     .name('Distortion 1');
    // folder.add(badTVPass.uniforms.distortion2, 'value')
    //     .min(0)
    //     .max(10)
    //     .name('Distortion 2');
    // folder.add(badTVPass.uniforms.speed, 'value')
    //     .min(0)
    //     .max(1)
    //     .name('Speed');
    // folder.add(badTVPass.uniforms.rollSpeed, 'value')
    //     .min(0)
    //     .max(10)
    //     .name('Roll Speed');
    // folder.open();
    
    // // Light Controls
    // folder = gui.addFolder('Light Position');
    // folder.add(lightSource.position, 'x')
    //     .min(-50)
    //     .max(50)
    //     .onChange(updateShaderLight);
    // folder.add(lightSource.position, 'y')
    //     .min(-50)
    //     .max(50)
    //     .onChange(updateShaderLight);
    // folder.add(lightSource.position, 'z')
    //     .min(-50)
    //     .max(50)
    //     .onChange(updateShaderLight);
    // folder.open();
    
    // // Volumetric Light Controls
    // folder = gui.addFolder('Volumeteric Light Shader');
    // folder.add(vlShaderUniforms.exposure, 'value')
    //     .min(0)
    //     .max(1)
    //     .name('Exposure');
    // folder.add(vlShaderUniforms.decay, 'value')
    //     .min(0)
    //     .max(1)
    //     .name('Decay');
    // folder.add(vlShaderUniforms.density, 'value')
    //     .min(0)
    //     .max(10)
    //     .name('Density');
    // folder.add(vlShaderUniforms.weight, 'value')
    //     .min(0)
    //     .max(1)
    //     .name('Weight');
    // folder.add(vlShaderUniforms.samples, 'value')
    //     .min(1)
    //     .max(100)
    //     .name('Samples');
    
    // folder.open();
    // ========================================================================gui
    }
    


    // ========================================================================gui
    // function addRenderTargetImage() {           
    // const material = new THREE.ShaderMaterial(THREE.PassThroughShader);
    // material.uniforms.tDiffuse.value = occRenderTarget.texture;
    
    // const mesh = new THREE.Mesh(new THREE.PlaneBufferGeometry(2, 2), material);
    // composer.passes[1].scene.add(mesh);
    // mesh.visible = false;
    
    // const folder = gui.addFolder('Light Pass Render Image');
    // folder.add(mesh, 'visible');
    // folder.open();
    // }
    // ========================================================================gui
    
    setupScene();
    setupPostprocessing();
    onFrame();
    setupGUI();
    // ========================================================================gui
    // addRenderTargetImage();
    // ========================================================================gui
    // custom
    // let dg = document.querySelector('.dg');
    // console.log(dg);
    let marketCanvas = document.getElementById('sec-market').querySelector('canvas');
    setTimeout(()=>{
        marketCanvas.classList.add('op1');
    }, 100);
}
// ========================================================================end holographicProjection

function tweenMax(){
    // console.log('tweenMax');
    // Controller
    let smController = new ScrollMagic.Controller();

    // mission
    // Scene
    let missionReveal = new ScrollMagic.Scene({
        triggerElement: '#trigger-customize',
        triggerHook: 0
    });


    // radar scanner
    let tlScanner = new TimelineMax({repeat:-1});
    tlScanner.to('#scanner', 2.5, {
        rotation: 90,    //to
        ease: Linear.easeNone,
        opacity: .6
    })
    .fromTo('#scanner', 2.5, {
        opacity: .9      //from
    }, {
        rotation: 180,   //to
        ease: Linear.easeNone,
        opacity: .6
    })
    .fromTo('#scanner', 2.5, {
        opacity: .9      //from
    }, {
        rotation: 270,   //to
        ease: Linear.easeNone,
        opacity: .6
    })
    .fromTo('#scanner', 2.5, {
        opacity: .9      //from
    }, {
        rotation: 360,   //to
        ease: Linear.easeNone,
        opacity: .6
    });

    // radar mission
    let twnWave = TweenMax.to('.wave', 1, {
        scale: 3,
        opacity: 0,
        repeat: -1
    });
    let twnStripes = TweenMax.to('.stripes-running', 20,{
        left: '0%',
        repeat: -1,
        ease: Linear.easeNone,
    });
    // 虛線
    let twnDashedCircle = TweenMax.to('.dashed-circle', 20,{
        rotation: 360,
        repeat: -1,
        ease: Linear.easeNone,
    });

    // marquee
    let marquee = document.getElementById('marquee');
    let marqueeWidth = parseInt(window.getComputedStyle(marquee).width);
    let welcomeMessage = document.getElementById('welcome-message');
    let welcomeWidth = parseInt(window.getComputedStyle(welcomeMessage).width);
    let mDistance = marqueeWidth + welcomeWidth;
    // console.log(marqueeWidth);
    
    let marqueeDelay = mDistance / 120;
    let marqueeDur = mDistance / 80;

    let twnMarquee = TweenMax.to('#marquee', marqueeDur, {repeat: -1, x: -1 * mDistance, ease: Linear.easeNone, repeatDelay: marqueeDelay - (marqueeDur - marqueeDelay)});
    let twnMarquee2 = TweenMax.to('#marquee-2', marqueeDur, {repeat: -1, x: -1 * mDistance, ease: Linear.easeNone, repeatDelay: marqueeDelay - (marqueeDur - marqueeDelay), delay: marqueeDelay});


    missionReveal.on('enter', ()=>{
        tlScanner.pause();
        twnWave.pause();
        twnStripes.pause();
        twnDashedCircle.pause();
        twnMarquee.pause();
        twnMarquee2.pause();
    }).on('leave', ()=>{
        tlScanner.play();
        twnWave.play();
        twnStripes.play();
        twnDashedCircle.play();
        twnMarquee.play();
        twnMarquee2.play();
    })
    // .addIndicators({name: 'mission-2', colorStart: '#fff'})
    .addTo(smController);


    // customizeReveal

    let tlCustomize = new TimelineMax();
    tlCustomize.to('.reveal-l', 1, {right: '100%'})
            .to('.reveal-r', 1, {left: '100%'}, '-=1')
            .to('.scroll-buffer-customize', .1, {}); //緩衝

    let customizeReveal = new ScrollMagic.Scene({
        triggerElement: '#trigger-customize',
        duration: '200%',
        triggerHook: 0
    });
    customizeReveal.setTween(tlCustomize).setPin('.sec-customize')
    // .addIndicators({name: 'customize'})
    .addTo(smController);


    // market
    // Scene
    let marketReveal = new ScrollMagic.Scene({
        triggerElement: '#trigger-market',
        // duration: '20%',
        triggerHook: 0
    });
    let marketReveal2 = new ScrollMagic.Scene({
        triggerElement: '#trigger-market',
        triggerHook: 1
    });


    // Tween
    let twnGear1 = TweenMax.to('.gear-1', 10, {repeat: -1, rotation: 360, ease: Linear.easeNone});
    let twnGear2 = TweenMax.to('.gear-2', 8, { repeat: -1, rotation: -360, ease: Linear.easeNone});
    let twnGear3 = TweenMax.to('.gear-3', 5, {repeat: -1 ,rotation: 360 , ease: Linear.easeNone});
    let twnGear4 = TweenMax.to('.gear-4', 3, {repeat: -1, rotation: -360, ease: Linear.easeNone});
    twnGear1.pause();
    twnGear2.pause();
    twnGear3.pause();
    twnGear4.pause();

    marketReveal.setPin('.sec-market')
    // .addIndicators({name: 'market'})
    .addTo(smController); //fixed


    marketReveal2.on('enter', ()=>{
        twnGear1.play();
        twnGear2.play();
        twnGear3.play();
        twnGear4.play();
    }).on('leave', ()=>{
        twnGear1.pause();
        twnGear2.pause();
        twnGear3.pause();
        twnGear4.pause();
    })
    // .addIndicators({name: 'market-2'})
    .addTo(smController);





    // sec-gallery
    // Scene
    let galleryReveal = new ScrollMagic.Scene({
        triggerElement: '#trigger-gallery',
        duration: '20%',
        triggerHook: 1
    });
    let galleryReveal2 = new ScrollMagic.Scene({
        triggerElement: '#trigger-gallery-2',
        triggerHook: 1
    });
    galleryReveal.setTween(TweenMax.to('.scroll-buffer-market', 1, {})).setPin('.sec-gallery')
    // .addIndicators({name: 'gallery'})
    .addTo(smController);


    // Tween
    let twnSpiral = TweenMax.to('.spiral', 60, {
        repeat: -1,
        rotation: '+=360',
        ease: Linear.easeNone
    });
    twnSpiral.pause();


    galleryReveal2.on('enter', ()=>{
        twnSpiral.play();
    }).on('leave', ()=>{
        twnSpiral.pause();
    })
    // .addIndicators({name: 'gallery-2'})
    .addTo(smController);


    
    

    // about
    let aboutVideo = document.getElementById('about-video');
    // Scene
    let aboutReveal = new ScrollMagic.Scene({
        triggerElement: '#trigger-about',
        triggerHook: 1
    });

    // Tween
    let twnSvgShield = TweenMax.to('#svgShield', 120, {
        repeat: -1,
        ease: Linear.easeNone,
        strokeDashoffset: 1000
    });
    twnSvgShield.pause();


    aboutReveal.on('enter', ()=>{
        aboutVideo.play();
        twnSvgShield.play();
    }).on('leave', ()=>{
        aboutVideo.pause();
        twnSvgShield.pause();
    })
    // .addIndicators({name: 'about'})
    .addTo(smController);

    

} //end function tweenMax


