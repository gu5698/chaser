<?php  
    // print_r($products);
    $productsLen = count($products);
    // echo "productsLen:", $productsLen;
    $productsJson = json_encode($products);

?>
<script>
    window.addEventListener('load', indexMall);

    function indexMall(){
        // =======================================================sec-market
        // img.src = 'images/mall/item6.png';
        let prevProduct = document.getElementById('prev-product');
        let nextProduct = document.getElementById('next-product');
        let productName = document.getElementById('product-name');
        let productPrice = document.getElementById('product-price');


        // let products = JSON.parse(`<?php echo $productsJson; ?>`);
        // console.log(productsJson);
        

        <?php $curImgNo=6; ?>
        let curImgNo = <?php echo $curImgNo; ?>; //第一張照片 from 0
        let totalImg = <?php echo $productsLen; ?>; //全部有幾張
        let imgSrc = `images/mall/item${curImgNo}.png`;
        // console.log(imgSrc);

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
        // 點擊換圖
        // 上一個
        prevProduct.addEventListener('click', ()=>{
            marketCanvas = document.getElementById('sec-market').querySelector('canvas');
            marketCanvas.classList.remove('op1');
            curImgNo--;
            if(curImgNo >= 1){
                // console.log(curImgNo);
                imgSrc = `images/mall/item${curImgNo}.png`;
                setTimeout(holographicProjection, 200, imgSrc);
            }else{
                curImgNo = totalImg;
                imgSrc = `images/mall/item${curImgNo}.png`;
                setTimeout(holographicProjection, 200, imgSrc);
            }
        });
        // 下一個
        nextProduct.addEventListener('click', ()=>{
            marketCanvas = document.getElementById('sec-market').querySelector('canvas');
            marketCanvas.classList.remove('op1');
            curImgNo++;
            if(curImgNo <= totalImg){
                // console.log(curImgNo);
                imgSrc = `images/mall/item${curImgNo}.png`;
                setTimeout(holographicProjection, 200, imgSrc);
            }else{
                curImgNo = 1;
                imgSrc = `images/mall/item${curImgNo}.png`;
                setTimeout(holographicProjection, 200, imgSrc);
            }
        });
        // =======================================================end sec-market
    }
</script>
