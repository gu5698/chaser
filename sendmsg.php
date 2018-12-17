<?php
    session_start();
    try{
        require_once "connection.php";

        date_default_timezone_set('Asia/Taipei');
        $addtime = date("Y-m-d H:i:s");

        $sql = "insert into message values (null, ?, '{$addtime}', '1', ?, ?)";
        $insert = $pdo->prepare( $sql);
        $insert->bindValue("1", $_POST['msgcontent']);
        $insert->bindValue("2", $_POST['picid']);
        $insert->bindValue("3", $_POST['id']);

        $insert->execute();
        $dd = $pdo->lastInsertId();
        
        if( $insert->rowCount() !=0){
            echo $dd;
        }else{
            echo "失敗";
        } 
    }catch(PDOException $e){
        echo "error";
    }
?>