<?php
session_start();
$_SESSION["rcvname"] = $_REQUEST["rcvname"];
$_SESSION["rcvtel"] = $_REQUEST["rcvtel"];
$_SESSION["rcvemail"] = $_REQUEST["rcvemail"];
$_SESSION["coupon"] = $_REQUEST["coupon"];
$_SESSION["locnum"] = $_REQUEST["locnum"];
header("Location:cart3.php");
?>