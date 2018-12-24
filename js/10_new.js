var storage = sessionStorage;

function doFirst() {
	if (storage['addItemList'] == null) {
		storage['addItemList'] = ''; //storage.setItem('addItemList','');
	}

	//幫每個Add Cart建事件聆聽的功能
	var list = document.querySelectorAll('.addCart'); //list是陣列
	for (var i = 0; i < list.length; i++) {
		list[i].addEventListener('click', function () {
			// var teddyInfo = document.querySelector('#' + this.id + ' input').value;
			var itemInfo = document.querySelector('#' + this.id + ' input').value;
			// console.log(this.id, teddyInfo);
			// addItem(this.id, teddyInfo);
			// console.log(createCartList(this.id, itemInfo));
			createCartList(this.id, itemInfo);
			// submenu = document.getElementById('submenu');
			// submenu.appendChild(trItemList);

			// document.getElementsByClassName('sub-menu').appendChild(newSection);
		});
	}
}

// function addItem(itemId, itemValue) {
// 	// alert(itemId+' : '+itemValue);
// 	var image = document.createElement('img');
// 	image.src = 'images/' + itemValue.split('|')[1];

// 	var title = document.createElement('span');
// 	title.innerText = itemValue.split('|')[0];

// 	var price = document.createElement('span');
// 	price.innerText = itemValue.split('|')[2];

// 	var newItem = document.getElementById('newItem');

// 	//先判斷此處是否已有物件，如果有要先刪除
// 	// if (newItem.hasChildNodes()) {
// 	// 	while (newItem.childNodes.length >= 1) {
// 	// 		newItem.removeChild(newItem.firstChild);
// 	// 	}
// 	// }

// 	//再顯示新物件
// 	// newItem.appendChild(image);
// 	// newItem.appendChild(title);
// 	// newItem.appendChild(price);

// 	//存入storage
// 	if (storage[itemId]) {
// 		alert('You have checked.');
// 	} else {
// 		storage[itemId] = itemValue;
// 		storage['addItemList'] += itemId + ', ';
// 	}

// 	//計算購買數量和小計
// 	var itemString = storage.getItem('addItemList');
// 	var items = itemString.substr(0, itemString.length - 2).split(', ');
// 	//console.log(items);		// ["A1001", "A1005", "A1006", "A1002"]

// 	subtotal = 0;
// 	for (var key in items) { //use items[key]
// 		var itemInfo = storage.getItem(items[key]);
// 		subtotal += parseInt(itemInfo.split('|')[2]);
// 	}

// 	document.getElementById('itemCount').innerText = items.length;
// 	document.getElementById('subtotal').innerText = subtotal;
// }

function createCartList(itemKey, itemInfo) {
	// alert(itemKey+' : '+itemInfo);
	var itemTitle = itemInfo.split('|')[0];
	var itemImage = 'images/pageImg/' + itemInfo.split('|')[1];
	var itemPrice = parseInt(itemInfo.split('|')[2]);

	//建立每個品項的清單區域--tr
	var trItemList = document.createElement('li');
	trItemList.className = 'shoplist'; //trItemList.setAttribute('class','item');
	trItemList.id = "n" + itemKey;
	// submenu.appendChild(trItemList);


	//建立商品圖片--第一個td
	// var tdImage = document.createElement('td');
	// tdImage.style.width = '200px';

	var image = document.createElement('img');
	image.className = 'product-img';
	image.src = itemImage;
	image.alt = 'shoplist';

	// tdImage.appendChild(image);
	trItemList.appendChild(image);

	//建立商品名稱和刪除按鈕--第二個td
	// var tdTitle = document.createElement('td');
	// tdTitle.style.width = '170px';
	// tdTitle.id = itemKey;

	var pTitle = document.createElement('div');
	pTitle.className = 'product-name';
	pTitle.innerText = itemTitle;

	// var delButton = document.createElement('button');
	// delButton.innerText = 'Delete';
	// delButton.addEventListener('click', deleteItem);

	// tdTitle.appendChild(pTitle);
	// tdTitle.appendChild(delButton);

	trItemList.appendChild(pTitle);

	//建立商品價格--第三個td
	var tdPrice = document.createElement('div');
	// tdPrice.style.width = '170px';
	tdPrice.className = 'product-price';
	tdPrice.innerText = itemPrice;

	trItemList.appendChild(tdPrice);

	//建立商品數量--第四個td
	// var tdItemCount = document.createElement('td');
	// tdItemCount.style.width = '60px';

	// var itemCount = document.createElement('input');
	// itemCount.type = 'number';
	// itemCount.value = 1;
	// itemCount.min = 0;
	// itemCount.addEventListener('input', changeItemCount);

	var delButton = document.createElement('i');
	delButton.className = 'far fa-trash-alt icon-delete';
	delButton.addEventListener('click', deleteItem);

	// tdItemCount.appendChild(itemCount);
	trItemList.appendChild(delButton);
	// console.log(document.getElementById(itemKey));
	// var a = "'" + itemKey + "'";
	// var b = document.getElementById(itemKey);
	// console.log(b);

	// 右上角hover購物車欄位增加
	if (document.getElementById("n" + itemKey) == null) {
		document.getElementsByClassName('sub-menu')[0].insertBefore(trItemList, document.getElementsByClassName("shoplist")[0]);
	};

	// if (storage[itemKey]) {
	// alert('You have checked.');
	// } else {

	// 存入session_storage
	storage[itemKey] = itemInfo + "|" + document.getElementsByClassName('mall_amount')[parseInt(itemKey.substring(1, 2)) - 1].value;
	if (storage['addItemList'].indexOf(itemKey) == -1) {
		storage['addItemList'] += itemKey + ', ';
	}

	// }
	// if (newItem.hasChildNodes()) {
	// 	while (newItem.childNodes.length >= 1) {
	// 		newItem.removeChild(newItem.firstChild);
	// 	}
	// }

	//計算購買數量和小計
	var itemString = storage.getItem('addItemList');
	var items = itemString.substr(0, itemString.length - 2).split(', ');
	document.getElementsByClassName('list-counter')[0].innerText = items.length;
	//console.log(items);		// ["A1001", "A1005", "A1006", "A1002"]
}

function deleteItem() {
	var itemId = this.parentNode.getAttribute('id'); //alert(itemId);
	itemId = itemId.substring(1, 3);
	//刪除該筆資料
	//1.先將金額扣除
	// var itemValue = storage.getItem(itemId);
	// total -= parseInt(itemValue.split('|')[2]);

	// document.getElementById('total').innerText = total;

	//2.清除storage的資料
	storage.removeItem(itemId);
	storage['addItemList'] = storage['addItemList'].replace(itemId + ', ', '');

	//3.再將該筆tr刪除
	this.parentNode.parentNode.removeChild(this.parentNode);
}

window.addEventListener('load', doFirst);