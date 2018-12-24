<?php
try{
  require_once("connectBooks.php");
  $sql = "select * from member where memId = :memId";
  $member = $pdo->prepare( $sql);
  $member->bindValue(":memId", $_REQUEST["memId"]);
  $member->execute();
  if( $member->rowCount() != 0){  //此帳號有人使用
    echo "帳號已存在";
  }else{
    echo "帳號可使用";
  }
}catch(PDOException $e){
  echo "error";
}
?>