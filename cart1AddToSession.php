<?php
include_once 'function/member.php';
if( is_login() ){  //己登入
	$psn = $_REQUEST["psn"];
    for ($i = 0 ; $i < count($psn) ; $i++) {
        $_SESSION["pname"][$psn[$i]] = $_REQUEST["pname"][$i];
        $_SESSION["price"][$psn[$i]] = $_REQUEST["price"][$i];
        $_SESSION["qty"][$psn[$i]] = $_REQUEST["qty"][$i];
    };
    $_SESSION["coupon"] = $_REQUEST["coupon"];
    $_SESSION["discount"] = $_REQUEST["discount"];
    header("Location:cart2.php");
}else header("Location:cart1.php");
?>