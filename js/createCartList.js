var storage = sessionStorage;

function doFirst() {
    if (storage['addItemList'] == null) {
        storage['addItemList'] = '';
    }
    var itemString = storage.getItem('addItemList');
    var items = itemString.substr(0, itemString.length - 2).split(', ');
    for (var key in items) {
        var itemInfo = storage.getItem(items[key]);
        createCartList(items[key], itemInfo);
    }
    actions();
}

function createCartList(itemKey, itemInfo) {
    var itemTitle = itemInfo.split("|")[0];
    var itemImage = "images/pageImg/" + itemInfo.split("|")[1];
    var itemPrice = parseInt(itemInfo.split("|")[2]);
    var itemQty = parseInt(itemInfo.split("|")[3]);

    // 創建每個row
    var trItemList = '';

    // 賦予每個row的id
    trItemList += '<div class="container products" id="' + itemKey + '"><div class="row"><div class="col-5 col-md-3">';
    trItemList += '<input type = "hidden" name = "psn[]" value = "' + itemKey.substring(1, itemKey.length) + '" >';

    // 賦予每個row的img
    trItemList += '<img class = "img" src = "' + itemImage + '" alt = "" >';
    trItemList += '</div><div class="col-6 list_border col-md-8"><div class="row"><div class="col-9 col-md-3">';

    // 賦予每個row的商品名稱
    trItemList += '<h3>' + itemTitle + '</h3>';
    trItemList += '<input type="hidden" name="pname[]" value="' + itemTitle + '">';
    trItemList += '</div><div class="col-9 col-md-3">';

    // 賦予每個row的單價
    trItemList += '<p>' + itemPrice + '</p>';
    trItemList += '<input type="hidden" name="price[]" value="' + itemPrice + '">';
    trItemList += '</div><div class="col-9 col-md-3 quantity"><span class="g-c"><i class="fas fa-minus"></i></span>';

    // 賦予每個row的數量
    trItemList += '<div class="product_num">' + itemQty + '</div>';
    trItemList += '<input type="hidden" name="qty[]" value="' + itemQty + '">';
    trItemList += '<span class="g-c"><i class="fas fa-plus"></i></span></div><div class="col-md-2 dn">';

    // 賦予每個row的總價
    trItemList += '<p class="subTotal">' + itemPrice * itemQty + '</p>';

    trItemList += '</div><div class="col-1 col-md-1 drop"><span class="g-c"><i class="fas fa-trash-alt"></i></span></div></div></div></div></div>';

    // 當同id的row不存在時置入頁面
    if (document.getElementById(itemKey) == null) {
        $(".itemList").after(trItemList);
    };
}

window.addEventListener('load', doFirst);

function actions() {
    // 總加
    function total() {
        var totalAll = 0;
        $(".subTotal").each(function () {
            totalAll += parseInt($(this).html());
        });
        return totalAll;
    }
    // 每次點擊加號時input框中數值+1
    $(".fa-plus").click(function () {
        var num = parseInt($(this).parents(".quantity").children(".product_num").html()) + 1;
        var price = parseInt($(this).parents(".quantity").prev().children().html());
        $(this).parents(".quantity").children(".product_num").html(num);
        $(this).parents(".quantity").children(".product_num").next().val(num);
        $(this).parents(".quantity").next().children(".subTotal").html(num * price);
        $(".totalprice").html(total());
    });
    // 每次點擊減號時input框中數值-1
    $(".fa-minus").click(function () {
        var num = parseInt($(this).parents(".quantity").children(".product_num").html()) - 1;
        var price = parseInt($(this).parents(".quantity").prev().children().html());
        // input框數值不小於1
        if (num > 0) {
            $(this).parents(".quantity").children(".product_num").html(num);
            $(this).parents(".quantity").children(".product_num").next().val(num);
            $(this).parents(".quantity").next().children(".subTotal").html(num * price);
            $(".totalprice").html(total());
        }
    });
    //垃圾桶遭點擊時， 會刪除整筆product資訊
    $(".fa-trash-alt").click(function () {
        var id = $(this).parents(".products").attr('id');
        storage.removeItem(id);
        storage['addItemList'] = storage['addItemList'].replace(id + ', ', '');
        $(this).parents(".products").remove();
        $(".totalprice").html(total());
    });

    $(".totalprice").html(total());

    $(".next").click(function () {
        $("form").submit();
    });
};