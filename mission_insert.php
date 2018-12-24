<?php
    try {
        require_once "connect.php";

        $sqlMissionInsert = "INSERT INTO mission(mission_code, content, img, atk, def, dex, dur, hide, x_axis, y_axis) VALUES (:missionCode,:missionContent,:missionImg,:missionAtk,:missionDef,:missionDex,:missionDur,:missionHide,:missionXaxis,:missionYaxis);";

        $pdostmMissionInsert = $pdo -> prepare($sqlMissionInsert);
        $pdostmMissionInsert -> bindValue(":missionCode", $_POST["missionCode"]);
        $pdostmMissionInsert -> bindValue(":missionContent", $_POST["missionContent"]);
        $pdostmMissionInsert -> bindValue(":missionImg", $_POST["missionImg"]);
        $pdostmMissionInsert -> bindValue(":missionAtk", $_POST["missionAtk"]);
        $pdostmMissionInsert -> bindValue(":missionDef", $_POST["missionDef"]);
        $pdostmMissionInsert -> bindValue(":missionDex", $_POST["missionDex"]);
        $pdostmMissionInsert -> bindValue(":missionDur", $_POST["missionDur"]);
        $pdostmMissionInsert -> bindValue(":missionHide", $_POST["missionHide"]);
        $pdostmMissionInsert -> bindValue(":missionXaxis", $_POST["missionXaxis"]);
        $pdostmMissionInsert -> bindValue(":missionYaxis", $_POST["missionYaxis"]);
        $pdostmMissionInsert -> execute();

        $lastId = $pdo->lastInsertId();
        echo "ok,".$lastId;
    } catch (PDOException $e) {
        // echo "錯誤原因:", $e->getMessage(), "<hr>";
        // echo "錯誤行號:", $e->getLine(), "<hr>";
        echo "error";
    }
?>