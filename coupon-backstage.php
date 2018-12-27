<?php
try {
    require_once "connect.php";

    $sql = "select *
    from coupon
    where promotion = 'x'
    order by promotion='Happy' DESC , caniuse=1 DESC;";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    exit('資料庫連結失敗，錯誤訊息為:' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Chaser</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="images/common/favicon.ico" type="image/x-icon">
    <!-- Bootstarp4 CSS -->
    <link rel="stylesheet" href="css\bootstrap-scss\bootstrap.css" />
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- common -->
    <link rel="stylesheet" href="css/backstage/backstage_common.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/backstage/gallery-backstage.min.css" />

</head>

<body>
   <?php include_once 'backstage_navbar.php';?>

    
    <div class="container-fluid main3 pb-5">
        <div class="row">
            <div class="col-2">
                <ul class="list-group">
                    <a href="coupon-backstage.php" class="text-center" id="" name=""><li class="list-group-item active">藝廊優惠卷</li></a>
                    <a href="coupon-backstage2.php" class="text-center" id="" name=""><li class="list-group-item">機器人優惠卷</li></a>
                </ul>
            </div>
            <div class="col-10">
                <table class="table table-striped">
                    <thead id="thead">
                        <tr>
                            <th class="text-center" scope="col">編號</th>
                            <th class="text-center" scope="col">優惠卷序號</th>
                            <th class="text-center" scope="col">優惠卷折扣</th>
                            <th class="text-center" scope="col">優惠卷狀態</th>
                            <th class="text-center" scope="col">優惠卷使用日期</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row): ?>
                            <tr id="tr_<?=$row["couponid"];?>">
                                <td class="text-center"><?=$row["couponid"];?></td>
                                <td class="text-center"><?php $ans = ($row["couponid"] == '1') ? $row["promotion"] : "gallery".$row["couponid"];echo $ans;?></td>
                                <td class="text-center"><?=$row["discount"];?></td>
                                <td class="text-center"><?php if($row["caniuse"] == '1'){
                                    echo "優惠卷尚未使用";
                                } else if($row["caniuse"] == '2'){
                                    echo "優惠卷已使用";
                                }else{
                                    echo "可使用";
                                }
                                     ?>
                                </td>
                                <td class="text-center"><?=$row["couponusedate"];?></td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- start footer -->
    <footer class="footer">© 2018 Chaser. All Rights Reserved.</footer>
    <!-- end footer -->

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- popper js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   
</body>

</html>