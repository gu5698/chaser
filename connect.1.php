<?php
try{
	$dsn = "mysql:host=localhost;port=3306;dbname=chaser;charset=utf8";
	$user = "root";
	$password = "amin0978";
	$pdo = new PDO($dsn,$user,$password);
}catch(PDOException $e){
	echo "error reason : ",$e->getMessage(),"<br>";
	echo "error line : ",$e->getLine(),"<br>";
}
?>