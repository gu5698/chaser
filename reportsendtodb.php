<?php
    session_start();

    try{
        require_once "connection.php";

        $sql = "insert into report values (null, ?, ?, ?, ?, ?, ?)";
        $report = $pdo->prepare($sql); 

        $report->bindValue("1", $_GET["reason"]);
        $report->bindValue("2", $_GET["reportaddtime"]);
        $report->bindValue("3", $_GET["complainid"]);
        $report->bindValue("4", $_GET["picid"]);
        $report->bindValue("5", $_GET["msgid"]);
        $report->bindValue("6", $_GET["id"]);

        $report->execute();
        
        if($report->rowCount()!=0){
            echo "檢舉成功，謝謝你的幫忙!!!";
        }else{
        
        }
        
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>