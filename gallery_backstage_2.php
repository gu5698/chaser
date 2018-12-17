<?php
try {
    require_once "connection.php";

    $sql = "select *, member.mem_name 
            from message,member 
            where message.mem_id = member.mem_id order by msgdatetime desc;";
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

</head>

<body>
  <?php include_once 'backstage_navbar.php'; ?>

    <div class="container-fluid main2">
        <div class="row">
            <div class="col-2">
                 <ul class="list-group">
                    <a href="gallery_backstage_1.php" class="" id="" name=""><li class="list-group-item">藝廊展品管理</li></a>
                    <a href="gallery_backstage_2.php" class="" id="" name=""><li class="list-group-item active">留言板列表</li></a>
                    <a href="gallery_backstage_3.php" class="" id="" name=""><li class="list-group-item">留言板檢舉管理</li></a>
                    <a href="gallery_backstage_4.php" class="" id="" name=""><li class="list-group-item">藝廊購票列表清單</li></a>
                </ul>
            </div>
            
            <div class="col-10">
                <table class="table table-striped">
                    <thead class="th thead-dark">
                        <tr>
                            <th scope="col" width="80" style="text-align:center">留言ID</th>
                            <th scope="col" width="80" style="text-align:center">留言展品</th>
                            <th scope="col" width="80" style="text-align:center">留言者ID</th>
                            <th scope="col" width="100" style="text-align:center">留言者姓名</th>
                            <th scope="col" style="text-align:center">留言內容</th>
                            <th scope="col" width="100" style="text-align:center">留言時間</th>
                            <th scope="col" style="text-align:center">留言目前狀態</th>
                            <th scope="col" style="text-align:center">會員權限狀態</th>
                            <th scope="col" width="80" style="text-align:center">刪除此則留言</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row): ?>
                            <tr id="tr_<?=$row["msgid"];?>">
                                <td><?=$row["msgid"];?></td>
                                <td><?=$row["picid"];?></td>
                                <td><?=$row["mem_id"];?></td>
                                <td><?=$row["mem_name"];?></td>
                                <td><?=$row["msgcontent"];?></td>
                                <td><?=$row["msgdatetime"];?></td>
                                <td style="min-width: 110px" class="icon"><input class="btn btn1 <?php $ans1 = ($row["msgupordown"] == 1) ? "btn-green" : "btn-red";echo $ans1;?>" type="button" name="<?=$row["msgid"];?>" value="<?php $ans2 = ($row["msgupordown"] == 1) ? "公開" : "關閉";echo $ans2;?>"></td>
                                <td class="icon" style="min-width: 110px"><input class="btn btn2 <?php $ans3 = ($row["status"] == 'Y') ? "btn-green" : "btn-red";echo $ans3;?>" type="button" name="<?=$row["mem_id"];?>" value="<?php $ans4 = ($row["status"] == 'Y') ? "正常會員" : "封鎖中";echo $ans4;?>"></td>
                                <td style="min-width: 110px" class="icon"><i name="<?=$row["msgid"];?>" id=""class="btn3 fas fa-trash-alt"></i></td>
                            </tr>
                        <?php endforeach?>
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
    <script>
        $('.btn1').click(function () {      
            var updown = $(this).val();
            let getid = $(this).attr("name")
            if(updown=='公開'){
                $(this).removeClass('btn-green').addClass('btn-red').val('關閉');
                msgresetbd(1,getid,0);
            }else{
                $(this).removeClass('btn-red').addClass('btn-green').val('公開');
                msgresetbd(1,getid,1);
            }
        });
        $('.btn2').click(function () { 
            var memidbtnval = $(this).val();
            let getid = $(this).attr("name")
            if(memidbtnval=='正常會員'){
                $("input[name$="+ getid +"][value$='正常會員']").removeClass('btn-green').addClass('btn-red').val('封鎖中');
                msgresetbd(2,getid,'N');
            }else{
                $("input[name$="+ getid +"][value$='封鎖中']").removeClass('btn-red').addClass('btn-green').val('正常會員');
                msgresetbd(2,getid,'Y');
            }
        });
        $('.btn3').click(function () { 
            let getid = $(this).attr("name")
            if(confirm("確定要刪除此則留言嗎？")){
                msgresetbd(3,getid,null);
                var aa = `#tr_${getid}`
                $(aa).remove();
			}
        });

        function msgresetbd(dowhat,id,value) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        console.log(xhr.responseText);
                    }
                }
            }
            var goajax = `msg-action.php?dowhat=${dowhat}&id=${id}&value=${value}`;
            let url = goajax;
            xhr.open("GET", url, true);
            xhr.send(null);
        }
    </script>
</body>

</html>