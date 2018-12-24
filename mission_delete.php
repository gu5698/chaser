<?php
    try {
        require_once "connect.php";

        $sqlMissionUpdate = "DELETE FROM mission WHERE mission_id=:mission_id";

        $pdostmMissionUpdate = $pdo -> prepare($sqlMissionUpdate);
        $pdostmMissionUpdate -> bindValue(":mission_id", $_POST["mission_id"]);
        $pdostmMissionUpdate -> execute();

        echo "ok";
    } catch (PDOException $e) {
        // echo "錯誤原因:", $e->getMessage(), "<hr>";
        // echo "錯誤行號:", $e->getLine(), "<hr>";
        echo "error";
    }
?>