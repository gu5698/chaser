<?php
    try {
        require_once "connection.php";

        $sql = "select * from gallery order by upordown DESC, positionno";
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
    <!-- Bootstarp4 CSS -->
    <link rel="stylesheet" href="css/backstage/bootstrap.min.css" />
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" />
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/backstage/gallery-backstage.min.css" />

    <script type="text/javascript">
		function dodel(id){
			if(confirm("確定要刪除嗎？")){
				window.location="gallery-action.php?action=del&picid="+id;
			}
		}
	</script>
</head>

<body>
    <?php include_once 'backstage_navbar.php'; ?>
    
    <div class="container-fluid main1">
        <div class="row">
            <div class="col-2">
                <ul class="list-group">
                    <a href="gallery_backstage_1.php" class="" id="" name=""><li class="list-group-item active">藝廊展品管理</li></a>
                    <a href="gallery_backstage_2.php" class="" id="" name=""><li class="list-group-item">留言板列表</li></a>
                    <a href="gallery_backstage_3.php" class="" id="" name=""><li class="list-group-item">留言板檢舉管理</li></a>
                    <a href="gallery_backstage_4.php" class="" id="" name=""><li class="list-group-item">藝廊購票列表清單</li></a>
                </ul>
            </div>
            <div class="col-10">
                <table class="table table-striped">
                    <thead class="th thead-dark">
                        <tr>
                            <th scope="col" width="80" style="text-align:center">展品ID</th>
                            <th scope="col" width="160" style="text-align:center">展品照片</th>
                            <th scope="col" width="110" style="text-align:center">展品名稱</th>
                            <th scope="col" width="110" style="text-align:center">展品使用者</th>
                            <th scope="col" width="500" style="text-align:center">展品內容介紹</th>
                            <th scope="col" width="90" style="text-align:center">展品位置</th>
                            <th scope="col" width="150" style="text-align:center">展覽中 / 下架中</th>
                            <th scope="col" width="100" style="text-align:center">發佈時間</th>
                            <th scope="col" width="120" style="text-align:center">替換(新增)展品</th>
                            <th scope="col" width="80" style="text-align:center">修改內容</th>
                            <th scope="col" width="80" style="text-align:center">刪除展品</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row): ?>
                            <tr>
                                <td><?=$row["picid"];?></td>
                                <td><img src='images/gallery-img/gallery-uploadpic-file/<?=$row["imgname"];?>' width="150" alt=""></td>
                                <td><?=$row["pictitle"];?></td>
                                <td><?=$row["picuser"];?></td>
                                <td><?=$row["piccontent"];?></td>
                                <td>位置<?=$row["positionno"];?></td>
                                <td><?php $ans = ($row["upordown"] == 1) ? "展覽中" : "下架中";echo $ans;?></td>
                                <td><?=$row["addtime"];?></td>
                                <td class="icon"><a href='gallery-add.php?picid=<?=$row["picid"];?>&positionno=<?=$row["positionno"];?>'><i class="fas fa-sync"></i></a></td>
                                <td class="icon"><a href='gallery-edit.php?picid=<?=$row["picid"];?>'><i class="fas fa-edit"></i></a></td>
                                <td class="icon"><a href='javascript:dodel(<?=$row["picid"];?>)'><i class="fas fa-trash-alt"></i></a></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstarp4 CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/js/bootstrap.min.js"></script>
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>

</html>