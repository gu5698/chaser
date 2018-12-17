<h3 class="form-title ">訂單明細</h3>
<button  class="close" onclick="$.closePopup();"><i class="fas fa-times"></i></button>
<div class="member_order_table_list">
    <p>訂單編號:<?php echo $myorder['order_id'];?></p>
    <p>訂單日期:<?php echo $myorder['order_time'];?></p>
    <p>總金額:<?php echo $myorder['grand_total'];?></p>
</div>
<table class="member_order_table">
    <thead>
        <tr>
            <th>商品名稱</th>
            <th>商品照片</th>
            <th>商品價格</th>
            <th>訂購數量</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($myorder_detail as $row):?>
        <tr>
            <th><?php echo $row['product_name']?></th>
            <th><?php echo $row['pruduct_image']?></th>
            <th><?php echo $row['product_name']?></th>
            <th><?php echo $row['quantity']?></th>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
