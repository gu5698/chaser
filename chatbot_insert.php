<?php
    try {
        require_once "connect.php";

        $sqlChatbotInsert = "INSERT INTO chatbot (keyword, response) VALUES (:keyword, :response);";

        $pdostmChatbotInsert = $pdo -> prepare($sqlChatbotInsert);
        $pdostmChatbotInsert -> bindValue(":keyword", $_POST["keyword"]);
        $pdostmChatbotInsert -> bindValue(":response", $_POST["response"]);
        $pdostmChatbotInsert -> execute();

        $lastId = $pdo->lastInsertId();
        echo "ok,".$lastId;
    } catch (PDOException $e) {
        // echo "錯誤原因:", $e->getMessage(), "<hr>";
        // echo "錯誤行號:", $e->getLine(), "<hr>";
        echo "error";
    }
?>