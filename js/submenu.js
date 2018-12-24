var storage = sessionStorage;

function submenuCreate() {
    if (storage['addItemList'] == null) {
        storage['addItemList'] = ''; //storage.setItem('addItemList','');
    }
    var itemString = storage.getItem("addItemList");
    var items = itemString.substr(0, itemString.length - 2).split(", ");

    removeAllChild();

    //每購買一個品項，就呼叫函數(createSubmenuList)新增li
    for (var key in items) {
        var itemInfo = storage.getItem(items[key]);
        if (itemInfo == null) {
            //建立每個品項的清單區域--li
            var trItemList = document.createElement('li');
            trItemList.className = 'shoplist';
            //建立商品名稱和--第一個div
            var tdPrice = document.createElement('div');
            tdPrice.style.width = '100%';
            var pTitle = document.createElement('center');
            pTitle.innerText = "購物車現在是空的唷！快去商城看看吧！";
            tdPrice.appendChild(pTitle);
            trItemList.appendChild(tdPrice);
            document.getElementsByClassName('sub-menu')[0].insertBefore(trItemList, document.getElementsByClassName("cart-btn")[0]);
            //計算購買數量和小計
            document.getElementsByClassName('list-counter')[0].innerText = 0;
        } else {
            createSubmenuList(items[key], itemInfo);
        };
    }
}

function removeAllChild() {
    var f = document.getElementsByClassName("sub-menu")[0];
    var childs = f.childNodes;
    for (var i = childs.length - 3; i >= 0; i--) {
        f.removeChild(childs[i]);
    }
}

function createSubmenuList(itemKey, itemInfo) {
    var itemTitle = itemInfo.split('|')[0];
    var itemImage = 'images/pageImg/' + itemInfo.split('|')[1];
    var itemPrice = parseInt(itemInfo.split('|')[2]);

    //建立每個品項的清單區域--tr
    var trItemList = document.createElement('li');
    trItemList.className = 'shoplist';
    trItemList.id = "n" + itemKey;

    //建立商品圖片--第一個td
    var image = document.createElement('img');
    image.className = 'product-img';
    image.src = itemImage;
    image.alt = 'shoplist';
    trItemList.appendChild(image);

    //建立商品名稱和刪除按鈕--第二個td
    var pTitle = document.createElement('div');
    pTitle.className = 'product-name';
    pTitle.innerText = itemTitle;
    trItemList.appendChild(pTitle);

    var tdPrice = document.createElement('div');
    tdPrice.className = 'product-price';
    tdPrice.innerText = itemPrice;
    trItemList.appendChild(tdPrice);

    //建立商品數量--第四個td
    var delButton = document.createElement('i');
    delButton.className = 'far fa-trash-alt icon-delete';
    delButton.addEventListener('click', deleteItem);
    trItemList.appendChild(delButton);

    // 右上角hover購物車欄位增加
    if (document.getElementById("n" + itemKey) == null) {
        if (document.getElementsByClassName("shoplist")[0] == null) {
            document.getElementsByClassName("sub-menu")[0].insertBefore(trItemList, document.getElementsByClassName("cart-btn")[0]);
        } else {
            document.getElementsByClassName("sub-menu")[0].insertBefore(trItemList, document.getElementsByClassName("shoplist")[0]);
        };
    };

    //計算購買數量和小計
    var itemString = storage.getItem('addItemList');
    var items = itemString.substr(0, itemString.length - 2).split(', ');
    document.getElementsByClassName('list-counter')[0].innerText = items.length;

}

function deleteItem() {
    var itemId = this.parentNode.getAttribute('id');
    itemId = itemId.substring(1, 3);

    //刪除該筆資料
    //1.清除storage的資料
    storage.removeItem(itemId);
    storage['addItemList'] = storage['addItemList'].replace(itemId + ', ', '');

    //2.再將該筆tr刪除
    this.parentNode.parentNode.removeChild(this.parentNode);

    //3.計算購買數量和小計
    var itemString = storage.getItem('addItemList');
    var items = itemString.substr(0, itemString.length - 2).split(', ');
    if (itemString == "") {
        document.getElementsByClassName('list-counter')[0].innerText = 0;
        submenuCreate();
    } else {
        document.getElementsByClassName('list-counter')[0].innerText = items.length;
    };

}

window.addEventListener("load", submenuCreate);