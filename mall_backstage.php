<?php
$error = "";
try{
    require_once('connect.php');
    $sql = 'select * from product';
    $products = $pdo->query($sql);
}catch(PDOExceotion $e){
    echo "error reason : ",$e->getMessage(),"<br>";
    echo "error line : ",$e->getLine(),"<br>";
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
    <link rel="stylesheet" type="text/css" href="css/mall_back.css">    
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
    </style>
</head>

<body>
    <?php include_once 'backstage_navbar.php'; ?>
    <div class="container-fluid mb-3">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-10">
            <a href="mall_additem.php"><div id="btn-add" class="btn btn-warning">新增</div></a>
            <input class="btn btn-warning" id="mall_control" type="submit" name="" value ="確認上下架" onclick="control()">
        </div>
    </div>

    </div>
    
    <div class="container-fluid pb-5">
        <div class="row">
            <!-- ================================== -->
            <div class="col-2">
                <ul class="list-group text-center">
                    <a href="#"><li class="list-group-item active">商品列表</li></a>
                    <a href="mall_additem.php"><li class="list-group-item">新增商品</li></a>
                     <a href="#"><li class="list-group-item">商品細項管理</li></a>
                </ul>
            </div>
            <!-- ================================== -->
            <div class="col-10">
                <table class="table table-striped table-light">
                    <thead id="thead">
                        <tr>
                            <th class="text-center" scope="col" width="80">編號</th>
                            <th class="text-center" scope="col" width="200">商品名稱</th>
                            <th class="text-center" scope="col">商品價格</th>
                            <th class="text-center" scope="col">商品圖片</th>
                            <th class="text-center" scope="col">商品狀態</th>
                            <th class="text-center" scope="col" width="160">操作</th>
                        </tr>
                    </thead>
                    <!-- ================================== -->
                    <form  action="mall_control.php" method="post" class="controlform">
                    <tbody id="tbody">
                    <?php
                        if($error != ""){
                            echo $error;
                        }else{
                            while($prodrow = $products->fetchObject()){
                    ?>
                            <tr>
                                <td><?php echo $prodrow->product_id; ?></td>
                                <td><?php echo $prodrow->product_name; ?></td>
                                <td><?php echo $prodrow->product_price; ?></td>
                                <td>
                                    <img src="images/pageImg/<?php echo $prodrow->product_image; ?>">
                                </td>
                                <td>
                                    <select name="control[]">
                                <?php
                                    if($prodrow->control==1){
                                        echo'<option selected value="1">上架</option>';
                                    }else
                                        echo'<option value="1">上架</option>';
                                    if($prodrow->control==0){
                                        echo'<option selected value="0">下架</option>';
                                    }else
                                        echo'<option value="0">下架</option>';
                                ?>
                                    </select>
                                </td>
                    <input type="hidden" name="id[]" value = "<?php echo $prodrow->product_id; ?>">
                                <td>
                                    <a class="mall_change" href="mall_item_backstage.php?product_id=<?php echo $prodrow->product_id ?>">修改
                                    </a>
                                </td>
                            </tr>
                    <?php
                            }
                        }
                    ?>
                    </tbody>
                    </form>
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
    <script src="js/mall_backstage.js"></script>
</body>
</html>