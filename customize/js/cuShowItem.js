function show_itemContent(){

         itemtitle = document.getElementsByClassName('item_title');
         icon = document.getElementsByClassName('fa-angle-down');
         content = document.getElementsByClassName('item_content');
        
        
        itemtitle[0].addEventListener('click',function(){
            content[0].classList.toggle('item_content_close');
        });
        itemtitle[1].addEventListener('click',function(){
            content[1].classList.toggle('item_content_close');
        });
        itemtitle[2].addEventListener('click',function(){
            content[2].classList.toggle('item_content_close');
        });
        itemtitle[3].addEventListener('click',function(){
            content[3].classList.toggle('item_content_close');
        });

    }

 window.addEventListener("load",show_itemContent);