<?php
    // ini_set('display_errors',true);
    // error_reporting(E_ALL);  把php錯誤顯示出來
    if(!empty($_POST)){
         // if upload image 
         $imageFile=$_FILES['mem_image'];
         $image='';
         if(!empty($imageFile) && 0==$imageFile['error']){
             $image=time().'_'.md5($imageFile['tmp_name']).'.'.end(explode('.',$imageFile['name']));
             // 定義上傳路徑
            $uploadPath = 'images/mem_images/';  
    
            copy($imageFile['tmp_name'],__DIR__.'/'.$uploadPath.$image);
         }
        
    try {
        require_once "connect.php";
        require_once "manager_check.php";

        $sqlMember = "INSERT INTO member(mem_name,mem_email,mem_phone,mem_password,mem_image,`status`) VALUES(:mem_name,:mem_email,:mem_phone,:mem_password,:mem_image,:status)";

        $pdostmMember = $pdo -> prepare($sqlMember);
        $pdostmMember->bindValue(":mem_name",$_POST['mem_name']);
        $pdostmMember->bindValue(":mem_email",$_POST['mem_email']);
        $pdostmMember->bindValue("mem_phone",$_POST['mem_phone']);
        $pdostmMember->bindValue("mem_password",md5($_POST['mem_password']));
        $pdostmMember->bindValue("mem_image",$image);
        $pdostmMember->bindValue("status",$_POST['status']);

        $msg='';
        $url='';
        if($pdostmMember->execute()){
            $msg='新增成功';
            $url='member_backstage.php';
        }else{
            $msg='此帳號已有人使用，新增失敗。';
            $url='member_insert.php';
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
            <a href="member_backstage.php" class="btn btn-warning">返回</a>
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
                            <td>會員姓名:</td>
                            <td><input type="text" name="mem_name" required/></td>
                        <tr>
                        </tr>
                            <td>會員email:</td>
                            <td><input type="text" name="mem_email" required/></td>
                        <tr>
                        </tr>
                            <td>會員電話:</td>
                            <td><input type="text" name="mem_phone"/></td>
                        <tr>
                        </tr>
                            <td>會員密碼:</td>
                            <td><input type="password" name="mem_password" required/></td>
                        <tr>
                        </tr>
                            <td>會員照片:</td>
                            <td><input type="file" name="mem_image"/></td>
                        <tr>
                        </tr>
                            <td>管理員狀態:</td>
                            <td>
                                <label><input type="radio" name="status" value="N"/> 停權</label>
                                <label><input type="radio" name="status" value="Y" checked/> 正常</label>
                                
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