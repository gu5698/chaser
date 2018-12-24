<?php
    try {
        require_once "connect.php";

        $sqlChatbotUpdate = "DELETE FROM chatbot WHERE no=:no";

        $pdostmChatbotUpdate = $pdo -> prepare($sqlChatbotUpdate);
        $pdostmChatbotUpdate -> bindValue(":no", $_POST["no"]);
        $pdostmChatbotUpdate -> execute();

        echo "ok";
    } catch (PDOException $e) {
        // echo "錯誤原因:", $e->getMessage(), "<hr>";
        // echo "錯誤行號:", $e->getLine(), "<hr>";
        echo "error";
    }
?>