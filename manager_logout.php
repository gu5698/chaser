<?php
@session_start();

unset($_SESSION['manager_isLogin']);
header('Location: manager_login.php');

?>