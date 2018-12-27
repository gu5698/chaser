<?php
    try {
        $dbhost = '127.0.0.1';
        $dbport = 3306;
        $dbname = 'chaser';
        // $dsn = "mysql:host= {$dbhost}; port = {$dbport}; dbname = {$dbname}; charset = utf8"; //!!!!!
        $dsn="mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset=utf8";
        $dbuser = 'root';
        $dbpasswd = 'qwerfdsa';
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); //!!!!!

        $pdo = new PDO($dsn, $dbuser, $dbpasswd, $options); 

        // echo "登入成功", "<hr>";
    } catch (PDOException $e) {
        echo "錯誤原因:", $e->getMessage(), "<hr>";
        echo "錯誤行號:", $e->getLine(), "<hr>";
    }
?>