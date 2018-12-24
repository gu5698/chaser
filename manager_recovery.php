<?php
$id = $_GET['id'];
try{
    require_once "connect.php";
    require_once "manager_check.php";
    $sqlManagerrecovery= "update manager set man_admin='1' where man_id=:man_id";
    $sqlManRecovery = $pdo->prepare($sqlManagerrecovery);
    $sqlManRecovery->bindValue(':man_id',$id);
    
    $msg = '';
    if($sqlManRecovery->execute()){
        $msg='此管理員已復權';
    }else{
        $msg='復權失敗';
    }
    echo "<script> alert('{$msg}');window.location='manager_backstage.php';</script>";
    exit;


}catch(PDOException $e){
    echo "錯誤原因:", $e->getMessage(), "<hr>";
    echo "錯誤行號:", $e->getLine(), "<hr>";
}
?>