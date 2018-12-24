var storage = sessionStorage;

function addtoCart() {

    if (storage['addItemList'] == null) {
        storage['addItemList'] = '';
    }
    //幫每個Add Cart建事件聆聽的功能
    var list = document.querySelectorAll(".addcart");
    for (var i = 0; i < list.length; i++) {
        list[i].addEventListener("click", function () {
            var itemValue = document.querySelector("#" + this.id + "+input").value;
            addItem(this.id, itemValue);
            submenuCreate();
        });
    }
}

function addItem(itemId, itemValue) {
    // 存入session_storage
    storage[itemId] = itemValue + "|" + document.getElementsByClassName("mall_amount")[parseInt(itemId.substring(1, 2)) - 1].value;
    if (storage["addItemList"].indexOf(itemId) == -1) {
        storage["addItemList"] += itemId + ", ";
    }
}

window.addEventListener("load", addtoCart);