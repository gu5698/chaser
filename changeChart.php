<?php 
    try{
        require_once("connect.php");
        $sql = "select * from product where product_id = :id";
        $products = $pdo->prepare($sql);
        $products->bindValue(":id",$_POST['index']);
        $products->execute();

        $prodrow = $products->fetchObject();


        echo $prodrow->atk.",".$prodrow->def.",".$prodrow->dex.",".$prodrow->dur.",".$prodrow->hide;

    }catch(PDOException $e){
        echo "error reason : ",$e->getMessage(),"<br>";
        echo "error line : ",$e->getLine(),"<br>";
    }
?>