<?php
include_once 'function/member.php';
$msg = $errMsg = "";
try {
    require_once("connect.php");
    if( isset($_REQUEST["psn"]) === true){  //只有送書號(第一次進入本網頁)
        $pdo->beginTransaction();
        $sql = "update orders set order_stat=:order_stat
                where order_id=:psn";
        $products = $pdo->prepare($sql);
        $psn = $_REQUEST["psn"];
        $stat = $_REQUEST["custom-select"];
        $psn_stat = array_combine($psn, $stat);
        foreach( $psn_stat as $psn => $sta){
            $products->bindValue(":psn", $psn);
            $products->bindValue(":order_stat", $sta);
            $products->execute();
        }
        $pdo->commit();
        echo $msg = "<script>window.alert('異動成功');</script>";
    }
    $sql = "select * from orders";
    $orders = $pdo -> query( $sql );
} catch (PDOException $e) {
    $pdo->rollBack();
	$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
	$errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- favicon -->
    <link rel="shortcut icon" href="images/common/favicon.ico" type="image/x-icon">
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
        th:nth-of-type(4),
        td:nth-of-type(4){
            width: 6%;
        }
        th:nth-of-type(5),
        td:nth-of-type(5),
        th:nth-of-type(6),
        td:nth-of-type(6),
        th:nth-last-of-type(2),
        td:nth-last-of-type(2){
            width: 9%;
        }
        td:last-of-type{
            font-size: 2rem;
            text-align: center;
        }
        .btn{
            margin-bottom: 3rem;
        }
    </style>

    <title>Chaser</title>
  </head>
  <body>
    <?php include_once 'backstage_navbar.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <ul class="list-group text-center">
                    <a href="#"><li class="list-group-item active">訂單管理</li></a>
                </ul>
            </div>
            <div class="col-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">訂單</li>
                    </ol>
                </nav>
                <form>
                    <table class="table table-striped table-light table-hover">
                        <thead>
                            <tr>
                            <th scope="col">訂單編號</th>
                            <th scope="col">商品小計</th>
                            <th scope="col">會員編號</th>
                            <th scope="col">收件人</th>
                            <th scope="col">收件電話</th>
                            <th scope="col">收件電郵</th>
                            <th scope="col">收件地址</th>
                            <th scope="col">優惠券編號</th>
                            <th scope="col">總計</th>
                            <th scope="col">訂單狀態</th>
                            <th scope="col">訂單時間</th>
                            <th scope="col">訂單細項</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if( $errMsg !=""){
                                echo "<td colspan='6' align='center'>$errMsg</td>";
                                }else{
                                    while($prodRow = $orders->fetchObject()){
                            ?>
                            <tr>
                                <input type="hidden" name="psn[]" value="<?php echo $prodRow->order_id;?>">
                                <td> <?php echo $prodRow->order_id;?> </td>
                                <td> <?php echo $prodRow->total;?> </td>
                                <td> <?php echo $prodRow->mem_id;?> </td>
                                <td> <?php echo $prodRow->rcv_name;?> </td>
                                <td> <?php echo "0".$prodRow->rcv_tel;?> </td>
                                <td> <?php echo $prodRow->rcv_email;?> </td>
                                <td> <?php echo $prodRow->loc_num;?> </td>
                                <td> <?php echo $prodRow->coupon_id;?> </td>
                                <td> <?php echo $prodRow->grand_total;?> </td>
                                <td>
                                    <select class="custom-select" id="inputGroupSelect02" name="custom-select[]" <?php if ($prodRow->order_stat == 1) {echo 'disabled';}?>>
                                        <?php
                                            if( $prodRow->order_stat == 0){
                                                echo '<option selected value="0">未出貨</option>';
                                            }else echo '<option value="0">未出貨</option>';
                                            if ($prodRow->order_stat == 1) {
                                                echo '<option selected value="1" disabled>取消訂單</option>';
                                            }else echo '<option value="1" disabled>取消訂單</option>';
                                            if ($prodRow->order_stat == 2) {
                                                echo '<option selected value="2">已出貨</option>';
                                            }else echo '<option value="2">已出貨</option>';
                                            if ($prodRow->order_stat == 3) {
                                                echo '<option selected value="3">已結案</option>';
                                            }else echo '<option value="3">已結案</option>';
                                        ?>
                                    </select>
                                </td>
                                <td> <?php echo $prodRow->order_time;?> </td>
                                <td>
                                    <a href="cart_orderdetail.php?order_id=<?php echo $prodRow->order_id;?>">
                                        <i class="fas fa-clipboard-list"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                    }//while
                                }//if...else
                            ?>
                        </tbody>
                    </table>
                    <input class="btn btn-primary offset-10" type="submit" value="訂單狀態更動">
                </form>
            </div>
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

    <script type="text/javascript">
        $('input[type="submit"]').click(function(){
            $("select").each(function() {
                $(this).removeAttr("disabled");
            });
            $("option").each(function() {
                $(this).removeAttr("disabled");
            });
        });
    </script>
  </body>
</html>