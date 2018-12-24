<?php include_once 'function/member.php'; ?>
<?php
$msg = $errMsg = "";
// $orderMemNo = 1;
// $email = "Sara168@gmail.com";  //如果有$_SESSION["pname"]
if( isset($_SESSION["memName"]) === false){  //尚未登入
	$_SESSION["where"] = $_SERVER["PHP_SELF"];
	//$msg = "尚未登入, 請<a href='login.html'>登入</a>";
	$msg = "<script>window.alert('尚未登入,請登入');location.href='cart1.html';</script>";
}else{ //己登入
	if( isset($_SESSION["pname"]) === false || count($_SESSION["pname"]) === 0){ //無購物資料
		$msg = "無購物資料";
	}else{ //寫入購物資料
		try {
			require_once("connectBooks.php");
			//啟動交易管理
			$pdo->beginTransaction();

			$total = 0;
			foreach($_SESSION["pname"] as $psn => $pname) {
				$subTotal = $_SESSION["price"][$psn] * $_SESSION["qty"][$psn];
				$total += $subTotal;
			}
			//寫入訂單主檔
			// INSERT INTO `orders` (`order_id`, `total`, `grand_total`, `mem_id`, `rcv_name`, `rcv_tel`, `rcv_email`, `loc_num`, `coupon_id`, `order_stat`, `order_time`)
			$sql = "insert into orders values( null, $total, $total, :mem_id, :rcv_name, :rcv_tel, :rcv_email, :loc_num, :coupon_id, '0', now() )";
			$bookorder = $pdo->prepare($sql);
		    $bookorder->bindValue(":mem_id", $_SESSION["memNo"]);
		    $bookorder->bindValue(":rcv_name", $_SESSION["rcvname"]);
		    $bookorder->bindValue(":rcv_tel", $_SESSION["rcvtel"]);
		    $bookorder->bindValue(":rcv_email", $_SESSION["rcvemail"]);
		    $bookorder->bindValue(":coupon_id", $_SESSION["coupon"]);
		    $bookorder->bindValue(":loc_num", $_SESSION["locnum"]);
		    $bookorder->execute();
		    //取得訂單編號
			$orderNo = $pdo->lastInsertId();

			//寫入訂單明細
			// INSERT INTO `orderdetail` (`order_detail_id`, `order_id`, `product_id`, `quantity`)
			$sql = "insert into orderdetail values( null, $orderNo, :productNo, :quantity )";
			$orderitems = $pdo->prepare( $sql );
			foreach( $_SESSION["qty"] as $psn => $qty){
				$orderitems->bindValue(":productNo", $psn);
				$orderitems->bindValue(":quantity", $qty);
				$orderitems->execute();
			}
			$pdo->commit();
			unset($_SESSION["pname"]);
			unset($_SESSION["price"]);
			unset($_SESSION["qty"]);;
			$msg = "訂購成功, 您的訂單編號為 {$orderNo} ";
		} catch (PDOException $e) {
			$pdo->rollBack();
			$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
			$errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
		} //try...catch
	  }//有購物資料嗎
}//有登入
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chaser</title>

    <?php require_once 'template/common_css.php';?>

    <!-- custom -->
    <link rel="stylesheet" href="css/cart.css">
</head>

<body>
    <?php require_once 'template/common_navbar.php';?>

    <div id="header"></div>

    <div class="background">
        <img src="images/cart/background.png" alt="">
    </div>

    <div class="step_wrap">
        <div class="step">
            <div class="circle circle_1">
                <img class="circle_1" src="images/customize/circle_1.png" alt="circle1">
                <img class="shot" src="images/customize/000.png" alt="shot">
                <span class="statement_01 fz-5">購物明細</span>
                <span class="number fz-4">1</span>
            </div>
            <div class="line"></div>

            <div class="circle circle_2">
                <img src="images/customize/circle_2.png" alt="circle2">
                <span class="statement_02 fz-5">填寫資料</span>
                <span class="number fz-4">2</span>
            </div>
            <div class="line"></div>

            <div class="circle circle_3">
                <img src="images/customize/circle_2.png" alt="circle2">
                <span class="statement_03 fz-5">確認訂單</span>
                <span class="number fz-4">3</span>
            </div>
        </div>
    </div>

    <form method="GET" action="cartAddToSession.php" id="form">

    <div class="container" style="padding-bottom: 3rem;">
        <div class="row whitebg">
			<center><?php echo $msg; ?></center>
			<center><?php echo $errMsg; ?></center>

            <!-- <div class="container title dn c3 itemList">
                <div class="row">
                    <div class="col-8 offset-3 list_border">
                        <div class="row">
                            <div class="col-md-3">
                                <p>商品資料</p>
                            </div>
                            <div class="col-md-3">
                                <p>單件價格</p>
                            </div>
                            <div class="col-md-3">
                                <p>數量</p>
                            </div>
                            <div class="col-md-2">
                                <p>小計</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container total c3">
                <div class="row">
                    <div class="col-5 offset-1 col-md-2 offset-md-8">
                        <p>總計</p>
                    </div>
                    <div class="col-6 col-md-2">
                        <p class="totalprice"><?php //echo number_format($total); ?></p>
                    </div>
                </div>
            </div> -->


            <div class="container finbtn">
                <div class="row">
                    <div class="col-8 offset-4 col-md-4 offset-md-7">
                        <a href="mall.php" class="cart1-btn">繼續購物</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </form>

    <?php include_once 'chatbot.php'; ?>

    <!-- start footer -->
    <footer class="footer">
        <div class="fz-small">© 2018 Chaser. All Rights Reserved.</div>
    </footer>
    <!-- end footer -->

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
    <!-- jquery -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="js/common.js"></script>
    <!-- custom -->

    <script src="js/submenu.js"></script>
    <script src="js/createCartList.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/chatbot.js"></script>
    <?php require_once 'template/common_js.php';?>

</body>