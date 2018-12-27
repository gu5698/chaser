<?php
include_once 'function/member.php';
try{
  require_once("connect.php");
  $coupon = $_REQUEST["coupon"];
  $sql = "SELECT `discount` FROM coupon WHERE `promotion` NOT IN ('x') && `promotion` = :couponid";
  $couponCheck = $pdo->prepare( $sql);
  $couponCheck->bindValue(":couponid", $coupon);
  $couponCheck->execute();

  if( $couponCheck->rowCount() != 0){  //有這張字串優惠券
    $sql = "SELECT * FROM coupon_used WHERE `mem_id` = :memId && coupon_id = :couponid";
    $member = $pdo->prepare( $sql);
    $member->bindValue(":couponid", $coupon);
    $member->bindValue(":memId", login_user('id'));
    $member->execute();

    if( $member->rowCount() != 0){  //此序號已使用
      echo "不能使用";

    }else{
      $row = $couponCheck->fetch();
      echo $row[0];
    };

  }else{  //沒有這張字串優惠券
    $sql = "SELECT `discount` FROM coupon WHERE `promotion` = 'x' && `couponid` = :couponid";
    $couponCheck = $pdo->prepare( $sql);
    $couponCheck->bindValue(":couponid", $coupon);
    $couponCheck->execute();

    if( $couponCheck->rowCount() != 0){  //有這張數字優惠券
      $sql = "SELECT * FROM coupon_used WHERE `mem_id` = :memId && coupon_id = :couponid";
      $member = $pdo->prepare( $sql);
      $member->bindValue(":couponid", $coupon);
      $member->bindValue(":memId", login_user('id'));
      $member->execute();

      if( $member->rowCount() != 0){  //此序號已使用
        echo "不能使用";

      }else{
        $row = $couponCheck->fetch();
      echo $row[0];
        // print_r($row);
      };

    }else{
      echo "不能使用";
    };
  };
}catch(PDOException $e){
  echo "error";
}
?>