<?php
// if( isset($_POST['image']) === true){



//     var_dump($_POST);
//     var_dump($_FILES);

//     $error = "";
//     $pname = $_POST['pname'];
//     $price = $_POST['price'];
//     $name  = $_FILES['image']['name'];
//     $text = $_POST['test'];
//     $atk = $_POST['atk'];
//     $def = $_POST['def'];
//     $dur = $_POST['dur'];
//     $dex = $_POST['dex'];
//     $hide = $_POST['hide'];
//     $from = $_FILES['image']['tmp_name'];
//     $con = $_POST['con'];
//     try{
//         require_once('connect.php');
//         if($_FILES['my_file']['error'] == 0){
//             if(file_exist('images/pageImg/'.$name)){
//                 echo '圖片已存在,請勿上傳相同檔案';
//             }else{
//                 move_uploaded_file($from,'./images/pageImg/'.$name);
//             }
//         }else{
//             echo "有 error : {$_FILES['image']['error']}<br>";
//         }
//         $sql = "insert into product values(null,'{$pname}','{$price}','{$name}','{$text}','{$atk}','{$def}','{$dex}','{$dur}','{$hide}','{$con}')";
//         $pdo->query($sql);
//         $ok = '恭喜 新增完成';
//     }catch(PDOExceotion $e){
//         echo "error reason : ",$e->getMessage(),"<br>";
//         echo "error line : ",$e->getLine(),"<br>";
//     }    
// }
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
            <a href="mall_additem.php" style="visibility: hidden;"><div id="btn-add" class="btn btn-warning">新增</div></a>
        </div>
    </div>

    </div>
    
    <div class="container-fluid pb-5">
        <div class="row">
            <!-- ================================== -->
            <div class="col-2">
                <ul class="list-group text-center">
                    <a href="mall_backstage.php"><li class="list-group-item">商品列表</li></a>
                    <a href="#"><li class="list-group-item active">新增商品</li></a>
                    <a href="#"><li class="list-group-item">商品細項管理</li></a>
                </ul>
            </div>
            <!-- ================================== -->

            <div class="col-10">
            <form id="myForm" action="additemFile.php" method="post" enctype="multipart/form-data">
               <div class="mall_item" >
                    <div class="context">
                        <h5>商品圖片 :
                        <input id="image" type="file" name="image">
                        </h5>
                        <h5>商品名稱 : 
                        <input type="text" name="pname">
                        </h5>
                        <div class="ability">
                            <h5>攻擊 :
                            <input class="col-4" type="text" name="atk">
                            </h5>
                            <h5>防禦 : 
                            <input class="col-4" type="text" name="def">
                            </h5>
                            <h5>速度 : 
                            <input class="col-4" type="text" name="dex">
                            </h5>
                        </div>
                        <div class="ability">
                            <h5>耐久 :
                            <input class="col-4" type="text" name="dur">
                            </h5>
                            <h5>隱匿 : 
                            <input class="col-4" type="text" name="hide">
                            </h5>
                            <h5></h5>
                        </div>
                        <h5>商品價格 : 
                        <input type="text" name="price">
                        </h5>
                        <h5>商品簡介 : 
                        <input id="text" type="text" name="text">
                        </h5>
                        </h5>
                        <h5>上/下架 : 
                            <select name="con">
                                <option value="1">上架</option>
                                <option value="0">下架</option>
                            </select>
                        </h5>
                        <div class="btn" id="gogo">
                            新增
                        </div>
                    </div>
               </div>
              <div id="go">
                    <h3>確定要新增嗎?</h3>
                    <input class="btn" type="submit" name="" value="確認">
                    <div class="btn" id="mall_close">關閉</div>
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
    <script src="js/mall_backstage.js"></script>
</body>
</html>