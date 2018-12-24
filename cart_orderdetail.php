<?php
// $psn ;
$order_id = $_GET['order_id'];
$errMsg = "";
//連線資料庫
try{
  require_once("connect.php");
  // $sql = "select * from products where psn = :psn";
  $sql = "select * from orderdetail NATURAL JOIN product where orderdetail.order_id = :order_id";
  $products = $pdo->prepare($sql);
  $products->bindValue(":order_id", $order_id);
  $products->execute();
}catch(PDOException $e){
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
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="cart_orders.php">訂單<?php echo $order_id; ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">訂單細項</li>
                    </ol>
                </nav>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">商品編號</th>
                        <th scope="col">商品名稱</th>
                        <th scope="col">商品價格</th>
                        <th scope="col">商品數量</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    if( $errMsg != ""){ //例外
                        echo $errMsg;
                    }else{
                        if( $products->rowCount() == 0){
                            echo "查無此訂單資料";
                        }else{
                            while($prodRow = $products->fetchObject()){
                ?>
                        <tr>
                            <td> <?php echo $prodRow->product_id;?> </td>
                            <td> <?php echo $prodRow->product_name;?> </td>
                            <td> <?php echo $prodRow->product_price;?> </td>
                            <td> <?php echo $prodRow->quantity;?> </td>
                        </tr>
                <?php
                            }
                        }//while
                    }//if...else
                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>