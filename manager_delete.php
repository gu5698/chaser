<?php
$id = $_GET['id'];
try{
    require_once "connect.php";
    require_once "manager_check.php";
    $sqlMangerDelete= "update manager set man_admin='0' where man_id=:man_id";
    $sqlManDel = $pdo->prepare($sqlMangerDelete);
    $sqlManDel->bindValue(':man_id',$id);
    
    $msg = '';
    if($sqlManDel->execute()){
        $msg='此管理員已停權';
        // echo "<script> alert('此管理員已停權');</script>";
    }else{
        $msg='停權失敗';
        // echo "<script> alert('停權失敗');</script>";
    }
    echo "<script> alert('{$msg}');window.location='manager_backstage.php';</script>";
    exit;

}catch(PDOException $e){
    echo "錯誤原因:", $e->getMessage(), "<hr>";
    echo "錯誤行號:", $e->getLine(), "<hr>";
}
?>