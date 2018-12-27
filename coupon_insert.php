<?php
// var_dump($_POST);
try {
    require_once "connect.php";

    $sql = "INSERT INTO coupon(promotion, discount) 
    VALUES (:promotion, :discount);";

    $stmt = $pdo->prepare($sql);
    $stmt -> bindValue(":promotion", $_POST["promotion"]);
    $stmt -> bindValue(":discount", $_POST["discount"]);
    $stmt -> execute();

    echo "ok," . $pdo->lastInsertId();
} catch (PDOException $e) {
    echo "error";
}
?>