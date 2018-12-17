<?php
    session_start();
    require_once("connection.php");
    date_default_timezone_set('Asia/Taipei');
    $addtime = date("Y-m-d H:i:s");

    $much = $_POST["much"];
    $singlemoney = $_POST["singlemoney"];
    $totalmoney = $_POST["totalmoney"];
    $ordername = $_POST["name"];
    $ordertel = $_POST["tel"];
    $orderemail = $_POST["email"];
    $mem_id = $_POST["mem_id"];

    $sql = "insert into ticket_order values(null,'{$much}','{$singlemoney}','{$totalmoney}',?,?,?,'{$addtime}',{$mem_id})";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue("1", $ordername);
    $stmt->bindValue("2", $ordertel);
    $stmt->bindValue("3", $orderemail);
    $stmt->execute();

    $last_order_id = $pdo->lastInsertId();

    // /aphp

    for($i=0; $i < $much; $i++){
        $sql2 = "insert into qrc_ticket values(null,'{$last_order_id}','{$mem_id}','1',null)";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute();
    }
    header("Location:ticketok.php?order_id={$last_order_id}&name={$ordername}&time={$addtime}&much={$much}&single_money={$singlemoney}&total_money={$totalmoney}");
?>