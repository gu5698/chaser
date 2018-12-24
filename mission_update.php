<?php
    try {
        require_once "connect.php";

        $sqlMissionUpdate = "UPDATE mission SET mission_code=:missionCode,content=:missionContent,img=:missionImg,atk=:missionAtk,def=:missionDef,dex=:missionDex,dur=:missionDur,hide=:missionHide,x_axis=:missionXaxis,y_axis=:missionYaxis WHERE mission_id=:mission_id;";

        $pdostmMissionUpdate = $pdo -> prepare($sqlMissionUpdate);
        $pdostmMissionUpdate -> bindValue(":mission_id", $_POST["mission_id"]);
        $pdostmMissionUpdate -> bindValue(":missionCode", $_POST["missionCode"]);
        $pdostmMissionUpdate -> bindValue(":missionContent", $_POST["missionContent"]);
        $pdostmMissionUpdate -> bindValue(":missionImg", $_POST["missionImg"]);
        $pdostmMissionUpdate -> bindValue(":missionAtk", $_POST["missionAtk"]);
        $pdostmMissionUpdate -> bindValue(":missionDef", $_POST["missionDef"]);
        $pdostmMissionUpdate -> bindValue(":missionDex", $_POST["missionDex"]);
        $pdostmMissionUpdate -> bindValue(":missionDur", $_POST["missionDur"]);
        $pdostmMissionUpdate -> bindValue(":missionHide", $_POST["missionHide"]);
        $pdostmMissionUpdate -> bindValue(":missionXaxis", $_POST["missionXaxis"]);
        $pdostmMissionUpdate -> bindValue(":missionYaxis", $_POST["missionYaxis"]);
        $pdostmMissionUpdate -> execute();

        echo "ok";
    } catch (PDOException $e) {
        // echo "錯誤原因:", $e->getMessage(), "<hr>";
        // echo "錯誤行號:", $e->getLine(), "<hr>";
        echo "error";
    }
?>

