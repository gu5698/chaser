<?php
    try {
        require_once "connectchaser.php";

        $sqlChatbot = "SELECT * FROM chatbot WHERE keyword LIKE :sendUserMsg"; //OK
        // $sqlChatbot = "SELECT * FROM chatbot WHERE keyword LIKE %:sendUserMsg%"; //NO
        // $sqlChatbot = "SELECT * FROM chatbot WHERE keyword LIKE '%':sendUserMsg'%'"; //NO
        // $sqlChatbot = 'SELECT * FROM chatbot WHERE keyword LIKE %:sendUserMsg%'; //NO
        // $sqlChatbot = 'SELECT * FROM chatbot WHERE keyword LIKE "%":sendUserMsg"%"'; //OK
        // $sqlChatbot = "SELECT * FROM chatbot WHERE keyword LIKE %" . ":sendUserMsg" . "%"; //NO

        $pdostmChatbot = $pdo -> prepare($sqlChatbot);
        $pdostmChatbot -> bindValue(":sendUserMsg", '%'.$_POST["sendUserMsg"]."%");
        // $pdostmChatbot -> bindValue(":sendUserMsg", $_POST["sendUserMsg"]);
        $pdostmChatbot -> execute();



        if( $pdostmChatbot -> rowCount() == 0){ //無此keyword
            echo "not found";
        }else{
          //自資料庫中取回資料
            $response = $pdostmChatbot -> fetchObject();
            //寫入session
            // $_SESSION["memNo"] = $memRow->no;
            // $_SESSION["memId"] = $memRow->memId;
            // $_SESSION["memName"] = $memRow->memName;
            // $_SESSION["email"] = $memRow->email;
        
          //送出回覆
        //   var_dump($response);
          echo $response -> response;
        }


    } catch (PDOException $e) {
        // echo "錯誤原因:", $e->getMessage(), "<hr>";
        // echo "錯誤行號:", $e->getLine(), "<hr>";
        echo "error";
    }
?>
