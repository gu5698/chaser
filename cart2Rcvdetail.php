<?php
include_once 'function/member.php';
if( is_login() ){  //己登入
	$_SESSION["rcv_name"] = $_REQUEST["rcvname"];
    $_SESSION["rcv_tel"] = $_REQUEST["rcvtel"];
    $_SESSION["rcv_email"] = $_REQUEST["rcvemail"];
    $_SESSION["loc_num"] = $_REQUEST["locnum"];
    header("Location:cart3.php");
}else header("Location:cart2.php");
?>