<?php
    try {
        require_once "connect.php";
        require_once "manager_check.php";

        $sqlManager = "SELECT * FROM manager";

        $pdostmManager = $pdo -> query($sqlManager);
        // $responses = $pdostmChatbot -> fetchAll(PDO::FETCH_ASSOC);
        // $responses = $pdostmChatbot -> fetchObject();
        
        // var_dump($responses);
        //======================================================
        
    } catch (PDOException $e) {
        echo "錯誤原因:", $e->getMessage(), "<hr>";
        echo "錯誤行號:", $e->getLine(), "<hr>";
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
    </style>
</head>

<body>
    <?php include_once 'backstage_navbar.php'; ?>
    <div class="container-fluid mb-3">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-10">
            <a href="manager_insert.php" class="btn btn-warning">新增</a>
            <a href="manager_logout.php" class="btn btn-warning">登出</a>
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
                <table class="table table-striped table-light">
                    <thead id="thead">
                        <tr>
                            <th class="text-center" scope="col" width="80" >管理員編號</th>
                            <th class="text-center" scope="col">管理員帳號</th>
                            <th class="text-center" scope="col" >管理員名稱</th>
                            <th class="text-center" scope="col" >管理員權限</th>
                            <th class="text-center" scope="col"  width="200">操作</th>
                        </tr>
                    </thead>
                    <!-- ================================== -->
                    <tbody id="tbody">
                    <?php
                    $admin=[0=>'停權',1=>'正常'];
                    while ($responses = $pdostmManager->fetch()) {
                    ?>
                        <tr>
                            <td class="number text-center align-middle"></td>
                            <td class="align-middle"><?php echo $responses['man_account'];?></td>
                            <td class="align-middle"><?php echo $responses['man_name'];?></td>
                            <td class="align-middle"><?php echo $admin[$responses['man_admin']];?></td>
                            <td class="align-middle text-center">
                                <a href="manager_update.php?id=<?php echo $responses['man_id']?>" class="btn btn-outline-warning btn-edit">編輯</a>
                                <?php if($responses['man_admin']=='1'){?>
                                <a href="manager_delete.php?id=<?php echo $responses['man_id'];?>" class="btn btn-outline-danger btn-delete">停權</a>
                                <?php }else{?>
                                <a href="manager_recovery.php?id=<?php echo $responses['man_id'];?>" class="btn btn-outline-danger">復權</a>
                                <?php }?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                    <!-- ================================== -->
                </table>
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