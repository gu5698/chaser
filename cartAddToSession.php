<?php
include_once 'function/member.php';
// session_start();
if( is_login() ){  //己登入
	$psn = $_REQUEST["psn"];
    for ($i = 0 ; $i < count($psn) ; $i++) {
        $_SESSION["pname"][$psn[$i]] = $_REQUEST["pname"][$i];
        $_SESSION["price"][$psn[$i]] = $_REQUEST["price"][$i];
        $_SESSION["qty"][$psn[$i]] = $_REQUEST["qty"][$i];
    };
    header("Location:cart2.php");
}else{ //尚未登入
    $_SESSION["where"] = $_SERVER["PHP_SELF"];
	//$msg = "尚未登入, 請<a href='login.html'>登入</a>";
    // $msg = "<script>window.alert('尚未登入,請登入');location.href='cart1.html';</script>";
    header("Location:cart1.php");

};
?>
<!-- <script src="js/member.js"></script> -->