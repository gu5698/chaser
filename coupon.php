<?php
try {
    require_once "connection.php";

    $sql = "select *
    from coupon
    where promotion != 'x';";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $resultLen = count($result);

    // var_dump($result);
    // echo $resultLen;
    $randNum = rand(0, $resultLen - 1);
    // echo $randNum;

} catch (PDOException $e) {
    exit('資料庫連結失敗，錯誤訊息為:' . $e->getMessage());
}
?>




<!-- start coupon -->
<div id="get-coupon" class="get-coupon">
    <div class="coupon">
        <div class="corner-decor-l"></div>
        <div class="corner-decor-r"></div>
        <div class="title fz-4">優惠券序號</div>
        <div id="coupon-number" class="coupon-number fz-5">
            <div><?php echo $result[$randNum]["promotion"];?></div>
            <div>=== 優惠 <?php echo $result[$randNum]["discount"] * 10;?> 折 ===</div>
            <div class="flash"></div>
        </div>
        <div class="coupon-timer fz-6">此訊息將在<span id="coupon-timer-sec" class="coupon-timer-sec fz-4"></span>秒後銷毀</div>
    </div>
</div>
<!-- end coupon -->