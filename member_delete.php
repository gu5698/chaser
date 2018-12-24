<?php
$id = $_GET['id'];
try{
    require_once "connect.php";
    require_once "manager_check.php";
    $sqlMemberDelete= "update member set status='N' where mem_id=:mem_id";
    $sqlMemDel = $pdo->prepare($sqlMemberDelete);
    $sqlMemDel->bindValue(':mem_id',$id);
    
    $msg = '';
    if($sqlMemDel->execute()){
        $msg='該會員已停權';
    }else{
        $msg='停權失敗';
    }
    echo "<script> alert('{$msg}');window.location='member_backstage.php';</script>";
    exit;


}catch(PDOException $e){
    echo "錯誤原因:", $e->getMessage(), "<hr>";
    echo "錯誤行號:", $e->getLine(), "<hr>";
}
?>