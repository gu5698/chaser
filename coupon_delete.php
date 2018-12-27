<?php
// var_dump($_POST);
try {
    require_once "connect.php";

    $sql = "DELETE FROM coupon WHERE couponid={$_POST['couponid']};";
    $pdo->exec($sql);

    echo "ok";
} catch (PDOException $e) {
    echo "error";
}
?>