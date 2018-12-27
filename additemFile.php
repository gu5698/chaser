<?php
    $error = "";
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $text = $_POST['text'];
    $atk = $_POST['atk'];
    $def = $_POST['def'];
    $dur = $_POST['dur'];
    $dex = $_POST['dex'];
    $hide = $_POST['hide'];
    $con = $_POST['con'];
    $name  = $_FILES['image']['name'];
    $from = $_FILES['image']['tmp_name'];
    try{
        require_once('connect.php');
        if($_FILES['image']['error'] == 0){
            if(file_exists('images/pageImg/'.$name)){
                echo '圖片已存在,請勿上傳相同檔案';
            }else{
                move_uploaded_file($from,'./images/pageImg/'.$name);
            }
        }else{
            echo "有 error : {$_FILES['image']['error']}<br>";
        }
        $sql = "insert into product values(null,'{$pname}','{$price}','{$name}','{$text}','{$atk}','{$def}','{$dex}','{$dur}','{$hide}','{$con}')";
        $pdo->query($sql);
        header("Location:mall_backstage.php");
    }catch(PDOExceotion $e){
        echo "error reason : ",$e->getMessage(),"<br>";
        echo "error line : ",$e->getLine(),"<br>";
    }    

?>