<?php
@session_start();

if(empty($_SESSION['manager_isLogin'])){
    header('Location: manager_login.php');
    exit;
}

?>