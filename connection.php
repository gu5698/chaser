<?php
    $dsn = "mysql:host=localhost;port=3306;dbname=chaser;charset=utf8";
    $user = "root";
    $password = "amin0978";
    $options = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE => PDO::CASE_NATURAL);
    $pdo = new PDO($dsn, $user, $password, $options); 
?>