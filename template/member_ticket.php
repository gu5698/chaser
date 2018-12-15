<h3 class="form-title ">電子票券</h3>

<div class="ticketbox">
<button  class="close" onclick="$.closePopup();"><i class="fas fa-times"></i></button>

<div class="showticket">
<?php foreach($qr_code as $qr_code_item):?>
<img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=<?php echo $qr_code_item;?>&chld=L|1&choe=UTF-8" alt="">
<?php endforeach;?>
</div>
</div>