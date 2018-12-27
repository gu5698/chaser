function designItem01(evt) {
    var i, buttonlinks;
  
    buttonlinks = document.getElementsByClassName("item_content_row01");
    for (i = 0; i < buttonlinks.length; i++) {
      buttonlinks[i].className = buttonlinks[i].className.replace(" active", "");
    }
    
    evt.currentTarget.className += " active";
  }

  function designItem02(evt) {
    var i, buttonlinks;
  
    buttonlinks = document.getElementsByClassName("item_content_row02");
    for (i = 0; i < buttonlinks.length; i++) {
      buttonlinks[i].className = buttonlinks[i].className.replace(" active", "");
    }
    
    evt.currentTarget.className += " active";
  }

  function designItem03(evt) {
    var i, buttonlinks;
  
    buttonlinks = document.getElementsByClassName("item_content_row03");
    for (i = 0; i < buttonlinks.length; i++) {
      buttonlinks[i].className = buttonlinks[i].className.replace(" active", "");
    }
    
    evt.currentTarget.className += " active";
  }