<?php
    try {
        // var_dump($_POST);
        // var_dump($_FILES);
        
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

        if($_FILES){
            // echo count($_FILES["missionImgFile"]["name"]);

            for($i=0; $i<count($_FILES["missionImgFile"]["name"]); $i++){
                if($_FILES["missionImgFile"]["error"][$i] == 0){

                    $from = $_FILES["missionImgFile"]["tmp_name"][$i];
                    $to = "images/index/{$_FILES["missionImgFile"]["name"][$i]}";
                    //$path_parts = pathinfo( $to );
                    // echo "dirname : ", $path_parts['dirname'], "<br>";
                    // echo "basename : ", $path_parts['basename'], "<br>";
                    // echo "extension : ", $path_parts['extension'], "<br>";
                    // echo "filename : ", $path_parts['filename'], "<br>";
                    //exit( $to );
                    //$to = "images/" . time(). "." . $path_parts['extension'] ;  //8

                    copy($from, $to);	
                    // echo "上傳成功";
                }
            }
        }

        echo "ok";
    } catch (PDOException $e) {
        // echo "錯誤原因:", $e->getMessage(), "<hr>";
        // echo "錯誤行號:", $e->getLine(), "<hr>";
        echo "error";
    }
?>

