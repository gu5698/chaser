<?php
    if(!empty($_POST)){
    try {
        require_once "connect.php";
        require_once "manager_check.php";

        $sqlManager = "INSERT INTO manager(man_account,man_password,man_name,man_admin) VALUES(:man_account,:man_password,:man_name,:man_admin)";

        $pdostmManager = $pdo -> prepare($sqlManager);
        $pdostmManager->bindValue(":man_account",$_POST['man_account']);
        $pdostmManager->bindValue(":man_password",md5($_POST['man_password']));
        $pdostmManager->bindValue("man_name",$_POST['man_name']);
        $pdostmManager->bindValue("man_admin",$_POST['man_admin']);

        $msg='';
        $url='';
        if($pdostmManager->execute()){
            $msg='新增成功';
            $url='manager_backstage.php';
        }else{
            $msg='此帳號已有人使用，新增失敗。';
            $url='manager_insert.php';
        }

        echo "<script>alert('{$msg}');window.location='{$url}';</script>";
        exit;
        //======================================================
        
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
    <!-- Bootstarp4 CSS -->
    <link rel="stylesheet" href="css\bootstrap-scss\bootstrap.css" />
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- common -->
    <link rel="stylesheet" href="css/backstage/backstage_common.css">    
    <style>
        textarea{
            resize: none;
        }
        textarea:disabled,
        input:disabled{
            background: #ddd;
        }
        .table{
            counter-reset: num;
        }
        .number::before{
            counter-increment: num;
            content: counter(num);
        }
        table img{
            width:100px;
            height:100px;
            object-fit:cover;
        }
        h3, .form-btn{
            text-align: center;
            display: block;
        }
        table tr td:first-child{
            text-align: right;
            width:150px;
        }
    </style>
</head>

<body>
    <?php include_once 'backstage_navbar.php'; ?>
    <div class="container-fluid mb-3">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-10">
            <a href="manager_backstage.php" class="btn btn-warning">返回</a>
        </div>
    </div>

    </div>
    
    <div class="container-fluid pb-5">
        <div class="row">
            <!-- ================側欄================== -->
            <div class="col-2">
                <ul class="list-group text-center">
                    <a href="#"><li class="list-group-item active">後台管理</li></a>
                </ul>
            </div>
            <!-- ================================== -->
            <div class="col-10">
            <h3>新增管理員資料</h3>
                <form method="post" enctype="multipart/form-data">
                    <table width="300" class="table">
                        <tr>
                            <td>管理員帳號:</td>
                            <td><input type="text" name="man_account" required/></td>
                        <tr>
                        </tr>
                            <td>管理員密碼:</td>
                            <td><input type="password" name="man_password" required/></td>
                        <tr>
                        </tr>
                            <td>管理員名稱:</td>
                            <td><input type="text" name="man_name" required/></td>
                        <tr>
                        </tr>
                            <td>管理員權限:</td>
                            <td>
                                <label><input type="radio" name="man_admin" value="0"/> 停權</label>
                                <label><input type="radio" name="man_admin" value="1" checked/> 啟用</label>
                                
                            </td>
                        </tr>
                    </table>
                    <div class="form-btn">
                    <button type="submit">新增</button>
                    <button type="reset">清除資料</button>
                    </div>
                </form>
            </div>
            <!-- ================================== -->
        </div>
    </div>
    <!-- start footer -->
    <footer class="footer">© 2018 Chaser. All Rights Reserved.</footer>
    <!-- end footer -->

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- popper js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script>
        $( document ).ready(function() {
            $('table .btn-delete').on('click',function(){
                if(!confirm("確定停權?")){
                    return false;
                }
            });
        });
    </script>
    
</body>
</html>