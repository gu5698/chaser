<?php
    try {
        require_once "connection.php";
        $sql = "insert into coupon (discount) values ('0.9')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        echo $pdo->lastInsertId();
    } catch (PDOException $e) {
        exit('資料庫連結失敗，錯誤訊息為:' . $e->getMessage());
    }
?>