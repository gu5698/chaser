<?php
    require_once("connection.php");
    date_default_timezone_set('Asia/Taipei');
    $addtime = date("Y-m-d H:i:s");
    $qrcode_num= $_GET["qrcode_num"];
    
    $sql = "update qrc_ticket set qrc_caniuse='0',qrc_usetime='{$addtime}' where qrc_id={$qrcode_num} AND qrc_caniuse=1";
    $stmt = $pdo->query($sql);
    $msg="";

    if( $stmt->rowCount() == 1){
        $msg="此票可以使用，購票序號正確!! 可以看展喔!!!";
    }else{
        $msg="發生序號錯誤!! 此票已經使用，不能進入看展喔!!!";
    }
?>

<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chaser</title>
</head>
<body>
    <br><br>
    <center><h1><?=$msg?></h1></center>
</body>
</html>