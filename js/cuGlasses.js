
    function whatpic() {
   
        var it01 = $('.item_content_option01');
        var it02 = $('.item_content_option02');
        var it03 = $('.item_content_option03');
        var it04 = $('.item_content_option04');
        var it05 = $('.item_content_option05');
        var it06 = $('.item_content_option06');
        var it07 = $('.item_content_option07');
        var product = $('#cuShow');
    
        // 111 112 121 122 131 132  211 212 221 222 231 232  
        //circle-sq  black-blue-ha scan-track
    
        //1-1-1
        if(it01.hasClass('active') && it03.hasClass('active') && it06.hasClass('active') ){
            product.attr('src',`images/customize/glasses/circle-black-scan.gif`);
            
        }
    
        //1-1-2
        if(it01.hasClass('active') && it03.hasClass('active') && it07.hasClass('active') ){
            product.attr('src',`images/customize/glasses/circle-black-track.gif`);
        }
    
        //1-2-1
        if(it01.hasClass('active') && it04.hasClass('active') && it06.hasClass('active') ){
            product.attr('src',`images/customize/glasses/circle-blue-scan.gif`);
        }
    
        //1-2-2
        if(it01.hasClass('active') && it04.hasClass('active') && it07.hasClass('active') ){
            product.attr('src',`images/customize/glasses/circle-blue-track.gif`);
        }
    
        //1-3-1
        if(it01.hasClass('active') && it05.hasClass('active') && it06.hasClass('active') ){
            product.attr('src',`images/customize/glasses/circle-ha-scan.gif`);
        }
    
        //1-3-2
        if(it01.hasClass('active') && it05.hasClass('active') && it07.hasClass('active') ){
            product.attr('src',`images/customize/glasses/circle-ha-track.gif`);
        }
    
        //2-1-1
        if(it02.hasClass('active') && it03.hasClass('active') && it06.hasClass('active') ){
            product.attr('src',`images/customize/glasses/sq-black-scan.gif`);
        }
    
        //2-1-2
        if(it02.hasClass('active') && it03.hasClass('active') && it07.hasClass('active') ){
            product.attr('src',`images/customize/glasses/sq-black-track.gif`);
        }
    
         //2-2-1
         if(it02.hasClass('active') && it04.hasClass('active') && it06.hasClass('active') ){
            product.attr('src',`images/customize/glasses/sq-blue-scan.gif`);
        }
    
        //2-2-2
        if(it02.hasClass('active') && it04.hasClass('active') && it07.hasClass('active') ){
            product.attr('src',`images/customize/glasses/sq-blue-track.gif`);
        }
    
        //2-3-1
        if(it02.hasClass('active') && it05.hasClass('active') && it06.hasClass('active') ){
            product.attr('src',`images/customize/glasses/sq-ha-scan.gif`);
        }
    
        //2-3-2
        if(it02.hasClass('active') && it05.hasClass('active') && it07.hasClass('active') ){
            product.attr('src',`images/customize/glasses/sq-ha-track.gif`);
        }
    
    }

    










// for(i=1;i<=2;i++){      //111/112/121/
    //     for(j=1;j<=3;j++){
    //         for(k=1;k<=2;k++){
    //             row01 = $(`.item_content_row01:nth-child(${i})`);    
    //             row02 = $(`.item_content_row02:nth-child(${j})`);
    //             row03 = $(`.item_content_row03:nth-child(${k})`);
    //             product = $('#cuShow');
    //             if(row01.hasClass('active') && row02.hasClass('active') && row03.hasClass('active')){ 
    //                    for(pic=1;pic<=12;pic++)               
    //                 $('#cuShow').attr('src',`images/customize/watch/watch12/png/${pic}.png`);
    //             }
    //         }
    //     }
    // }