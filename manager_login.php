<?php

if(!empty($_POST)){
    try {
        require_once "connect.php";

        $sqlManager = "SELECT * FROM manager where man_account=:man_account";
        $pdostmManager = $pdo->prepare($sqlManager);
        $pdostmManager->bindValue(":man_account", $_POST["man_account"]);
        $pdostmManager->execute();
        $responses = $pdostmManager->fetch();
        $msg="";
        $url="manager_login.php";
        if(empty($responses)){
            $msg="帳號不存在";
        }elseif($responses['man_password']!= md5($_POST['man_password'])){
            $msg="密碼錯誤";
        }elseif($responses['man_admin']==0){
            $msg="此管理員權限已停用";
        }else{
            $msg="登入成功";
            $url="manager_backstage.php";
            @session_start();
            $_SESSION['manager_isLogin']=$_POST["man_account"];
        }
        echo "<script>alert('{$msg}');window.location='{$url}';</script>";
        exit;
        // echo '<pre>';
        // print_r($_GET);
        // print_r($_POST);
        // print_r($responses);
        // $pdostmManager->debugDumpParams();
        // echo '</pro>';
        // exit;

    } catch (PDOException $e) {
        echo "錯誤原因:", $e->getMessage(), "<hr>";
        echo "錯誤行號:", $e->getLine(), "<hr>";
    }
}


?>

<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Chaser</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="images/common/favicon.ico" type="image/x-icon">
    <!-- Bootstarp4 CSS -->
    <link rel="stylesheet" href="css\bootstrap-scss\bootstrap.css" />
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- common -->
    <link rel="stylesheet" href="css/backstage/backstage_common.css">
    <style>
        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
        .form-control:focus{
            border-color:#fcbd52;
            box-shadow:0 0 0 0.2rem rgba(253, 203, 132, 0.25);
        }
        .form-signin label{
            margin:10px 0;
        }
    </style>
</head>

<body>
    <form class="form-signin" method="post">
        <h1 class="h3 mb-3 font-weight-normal">請登入</h1>
        <label for="inputEmail" >管理員帳號</label>
        <input type="text" id="inputEmail" name="man_account" class="form-control" placeholder="account" required autofocus>
        <label for="inputPassword" >管理員密碼</label>
        <input type="password" id="inputPassword" name="man_password" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> 記住我
            </label>
        </div>
        <button class="btn btn-lg btn-warning btn-block" type="submit">登入</button>
    </form>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- popper js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
</html>
