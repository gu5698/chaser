<?php
$id = $_REQUEST["product_id"];
$error = "";
try{
    require_once('connect.php');
    if(isset($_POST["pname"])===false){
    	$sql = "select * from product where product_id = :id";
    	$products = $pdo->prepare($sql);
    	$products->bindValue(":id",$id);
        $products->execute();
    }else{
         if($_FILES['image']['error'] == 0){
            if(file_exists('images/pageImg/'.$_FILES['image']['name'])){
                echo '圖片已存在,請勿上傳相同檔案';
            }else{            
                $from = $_FILES['image']['tmp_name'];
                move_uploaded_file($from,'./images/pageImg/'.$_FILES['image']['name']);
                }
            }
            $sql = "update product set product_name=:pname, product_price=:price, 
            product_image=:image,description=:text, atk=:atk, def=:def, dex=:dex, dur=:dur, hide=:hide where product_id=:id";
            $products = $pdo->prepare($sql);
            $products->bindValue(":id",$_POST["product_id"]);
            $products->bindValue(":pname",$_POST["pname"]);
            $products->bindValue(":price",$_POST["price"]);
            $products->bindValue(":image",$_FILES['image']['name']);
            $products->bindValue(":text",$_POST["text"]);
            $products->bindValue(":atk",$_POST["atk"]);
            $products->bindValue(":def",$_POST["def"]);
            $products->bindValue(":dex",$_POST["dex"]);
            $products->bindValue(":dur",$_POST["dur"]);
            $products->bindValue(":hide",$_POST["hide"]);
            $products->execute();
            $ok = '恭喜 更新完成';
    }
    
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
                    <a href="mall_additem.php"><li class="list-group-item">新增商品</li></a>
                    <a href="#"><li class="list-group-item active">商品細項管理</li></a>
                </ul>
            </div>
            <!-- ================================== -->
<?php
        if($error != ""){
            echo $error;
        }else{
        	if(isset($_POST["pname"])===false){
	        	if($products->rowCount() == 0){
	        		echo "查無此資料";
	        	}else{
	        		$prodrow = $products->fetchObject();

?>
            <div class="col-10">
            <form action="mall_item_backstage.php" method="post" enctype="multipart/form-data">
               <div class="mall_item" >
               		<input type="hidden" name="product_id" value="<?php echo $prodrow->product_id; ?>">
			        <div class="item">
                        <h5>原商品圖片 :</h5>
			            <img src="images/pageImg/<?php echo $prodrow->product_image; ?>">
			        </div>
			        <div class="context">
			        	<h5>編號 : 
			        	<?php echo $prodrow->product_id; ?>
			        	</h5>
			            <h5>商品名稱 : 
			            <input type="text" name="pname" value="<?php echo $prodrow->product_name; ?>">
			        	</h5>
                        <h5>
                            新商品圖片 :
                            <input type="file" name="image">
                        </h5>
			        	<div class="ability">
				            <h5>攻擊 :
							<input class="col-4" type="text" name="atk" value="<?php echo $prodrow->atk; ?>">
							</h5>
				            <h5>防禦 : 
							<input class="col-4" type="text" name="def" value="<?php echo $prodrow->def; ?>">
							</h5>
				            <h5>速度 : 
							<input class="col-4" type="text" name="dex" value="<?php echo $prodrow->dex; ?>">
							</h5>
						</div>
						<div class="ability">
				            <h5>耐久 :
							<input class="col-4" type="text" name="dur" value="<?php echo $prodrow->dur; ?>">
							</h5>
				            <h5>隱匿 : 
							<input class="col-4" type="text" name="hide" value="<?php echo $prodrow->hide; ?>">
							</h5>
							<h5></h5>
						</div>
			            <h5>商品價格 : 
						<input type="text" name="price" value="<?php echo $prodrow->product_price; ?>">
						</h5>
			            <h5>商品簡介 : 
						<input id="text" type="text" name="text" value="<?php echo $prodrow->description; ?>">
						</h5>
						<div class="btn" id="gogo">
							修改
						</div>
			        </div>
			   </div>
			  <div id="go">
            		<h3>確定要做更改嗎?</h3>
            		<input class="btn" type="submit" name="" value="確認">
            		<div class="btn" id="mall_close">關閉</div>
              </div>
			  </form>
<?php
	 	}
	 }else{
	 	echo $ok;
	 }
}
 ?>
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