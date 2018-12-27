<?php
$con = $_POST['control'];
$id = $_POST["id"];

for($i=0; $i < count($id) ; $i++){
	try{
	    require_once('connect.php');
		$sql = "update product set control = :control where product_id = :id";
		$products = $pdo->prepare($sql);
			$products->bindValue(":id",$id[$i]);
			$products->bindValue(":control",$con[$i]);
		    $products->execute();
	}catch(PDOExceotion $e){
	  echo "error reason : ",$e->getMessage(),"<br>";
	  echo "error line : ",$e->getLine(),"<br>";
	}
}
header("Location:mall_backstage.php"); 
?>