<?php
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
        // print_r($psn);
        // print_r($stat);
        // print_r($psn_stat);
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Chaser</title>
  </head>
  <body>
    <?php include_once 'backstage_navbar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- <div class="tab-content" id="v-pills-tabContent"> -->
                    <!-- <div class="tab-pane fade show active" id="v-pills-order" role="tabpanel" aria-labelledby="v-pills-order-tab"> -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">訂單</li>
                            </ol>
                        </nav>
                    <form>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">訂單編號</th>
                                <th scope="col">商品小計</th>
                                <th scope="col">會員編號</th>
                                <th scope="col">優惠券編號</th>
                                <th scope="col">總計</th>
                                <th scope="col">訂單狀態</th>
                                <th scope="col">訂單時間</th>
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
                                    <td> <a href="cart_orderdetail.php?order_id=<?php echo $prodRow->order_id;?>"> <?php echo $prodRow->order_id;?> </a> </td>
                                    <td> <?php echo $prodRow->total;?> </td>
                                    <td> <?php echo $prodRow->mem_id;?> </td>
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
                                </tr>
                                <?php
                                        }//while
                                    }//if...else
                                ?>
                            </tbody>
                        </table>
                        <input class="btn btn-primary offset-10" type="submit" value="訂單狀態更動">
                    </form>
                    <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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