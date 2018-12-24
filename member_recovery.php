<?php
$id = $_GET['id'];
try{
    require_once "connect.php";
    require_once "manager_check.php";
    $sqlMemberRecovery= "update member set status='Y' where mem_id=:mem_id";
    $sqlMemRecovery = $pdo->prepare($sqlMemberRecovery);
    $sqlMemRecovery->bindValue(':mem_id',$id);

    $msg = '';
    if($sqlMemRecovery->execute()){
        $msg='此管理員已復權';
    }else{
        $msg='復權失敗';
    }
    echo "<script> alert('{$msg}');window.location='member_backstage.php';</script>";
    exit;


}catch(PDOException $e){
    echo "錯誤原因:", $e->getMessage(), "<hr>";
    echo "錯誤行號:", $e->getLine(), "<hr>";
}
?>