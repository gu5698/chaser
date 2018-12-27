<?php
    try {
        require_once "connectchaser.php";

        $sqlChatbotUpdate = "UPDATE chatbot SET keyword=:keyword,response=:response WHERE no=:no";

        $pdostmChatbotUpdate = $pdo -> prepare($sqlChatbotUpdate);
        $pdostmChatbotUpdate -> bindValue(":no", $_POST["no"]);
        $pdostmChatbotUpdate -> bindValue(":keyword", $_POST["keyword"]);
        $pdostmChatbotUpdate -> bindValue(":response", $_POST["response"]);
        $pdostmChatbotUpdate -> execute();

        echo "ok";
    } catch (PDOException $e) {
        // echo "錯誤原因:", $e->getMessage(), "<hr>";
        // echo "錯誤行號:", $e->getLine(), "<hr>";
        echo "error";
    }
?>