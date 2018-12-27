<?php
try {
    require_once "connection.php";

    $sql = "select *
from qrc_ticket, ticket_order
where qrc_ticket.t_order_id=ticket_order.t_order_id
order by qrc_caniuse=1 DESC, qrc_id;";
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
                    <a href="gallery_backstage_1.php" class="" id="" name=""><li class="list-group-item">藝廊展品管理</li></a>
                    <a href="gallery_backstage_2.php" class="" id="" name=""><li class="list-group-item">留言板列表</li></a>
                    <a href="gallery_backstage_3.php" class="" id="" name=""><li class="list-group-item">留言板檢舉管理</li></a>
                    <a href="gallery_backstage_4.php" class="" id="" name=""><li class="list-group-item active">藝廊購票列表清單</li></a>
                </ul>
            </div>
            <div class="col-10">
                <table class="table table-striped">
                    <thead id="thead">
                        <tr>
                            <th scope="col" style="text-align:center">訂票編號</th>
                            <th scope="col" style="text-align:center">購買張數</th>
                            <th scope="col" style="text-align:center">購買單價</th>
                            <th scope="col" style="text-align:center">購買總金額</th>
                            <th scope="col" style="text-align:center">購買會員帳號</th>
                            <th scope="col" style="text-align:center">訂購人姓名</th>
                            <th scope="col" style="text-align:center">訂購人電話</th>
                            <th scope="col" style="text-align:center">訂購人信箱</th>
                            <th scope="col" style="text-align:center">訂購日期時間</th>
                            <th scope="col" style="text-align:center">QRCode編號</th>
                            <th scope="col" style="text-align:center">QRCode是否已使用</th>
                            <th scope="col" style="text-align:center">入場使用日期時間</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row): ?>
                            <tr id="tr_<?=$row["t_order_id"];?>">
                                <td><?=$row["t_order_id"];?></td>
                                <td><?=$row["t_order_much"];?></td>
                                <td><?=$row["t_order_single_price"];?></td>
                                <td><?=$row["t_order_total_price"];?></td>
                                <td><?=$row["mem_id"];?></td>
                                <td><?=$row["t_order_name"];?></td>
                                <td><?=$row["t_order_tel"];?></td>
                                <td><?=$row["t_order_email"];?></td>
                                <td><?=$row["t_order_addtime"];?></td>
                                <td>ticket<?=$row["qrc_id"];?></td>
                                <td><?php $ans = ($row["qrc_caniuse"] == 1) ? "尚未入場 可使用" : "已入場 不可使用";echo $ans;?></td>
                                <td><?=$row["qrc_usetime"];?></td>
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