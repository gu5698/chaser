<?php
try {
    require_once "connection.php";

    $sql = "select report.reportid, report.reason, message.msgcontent, report.reportaddtime, message.msgid, report.mem_id, report.complainid, member.`status`,message.msgupordown
            from report,member,message 
            where report.complainid = member.mem_id AND report.msgid =message.msgid  order by reportaddtime desc;";
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
  <?php include_once 'backstage_navbar.php'; ?>
    
    <div class="container-fluid main3 pb-5">
        <div class="row">
            <div class="col-2">
                <ul class="list-group">
                    <a href="gallery_backstage_1.php" class="" id="" name=""><li class="list-group-item">藝廊展品管理</li></a>
                    <a href="gallery_backstage_2.php" class="" id="" name=""><li class="list-group-item">留言板列表</li></a>
                    <a href="gallery_backstage_3.php" class="" id="" name=""><li class="list-group-item active">留言板檢舉管理</li></a>
                    <a href="gallery_backstage_4.php" class="" id="" name=""><li class="list-group-item">藝廊購票列表清單</li></a>
                </ul>
            </div>
            <div class="col-10">
                <table class="table table-striped">
                    <thead id="thead">
                        <tr>
                            <th scope="col" width="60" style="text-align:center">檢舉<br>ID</th>
                            <th scope="col" width="80" style="text-align:center">檢舉原因</th>
                            <th scope="col" style="text-align:center">被檢舉留言內容</th>
                            <th scope="col" width="100" style="text-align:center">檢舉時間</th>
                            <th scope="col" width="70" style="text-align:center">被檢舉留言ID</th>
                            <th scope="col" width="70" style="text-align:center">檢舉人會員ID</th>
                            <th scope="col" width="70" style="text-align:center">被檢舉會員ID</th>
                            <th scope="col" width="70" style="text-align:center">已被檢舉次數</th>
                            <th scope="col" width="110" style="text-align:center">留言目<br>前狀態</th>
                            <th scope="col" width="110" style="text-align:center">會員權<br>限狀態</th>
                            <!-- <th scope="col" width="100" style="text-align:center">刪除此<br>則留言</th> -->
                            <th scope="col" width="40" style="text-align:center">刪除此<br>則檢舉</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row): ?>
                            <tr id="tr_<?=$row["reportid"];?>">
                                <td><?=$row["reportid"];?></td>
                                <td><?=$row["reason"];?></td>
                                <td><?=$row["msgcontent"];?></td>
                                <td><?=$row["reportaddtime"];?></td>
                                <td><?=$row["msgid"];?></td>
                                <td><?=$row["mem_id"];?></td>
                                <td><?=$row["complainid"];?></td>
                                <td><?=$row["complainid"];?></td>
                                <td class="icon"><input class="btn btn1 <?php $ans1 = ($row["msgupordown"] == 1) ? "btn-green" : "btn-red";echo $ans1;?>" type="button" name="<?=$row["msgid"];?>" value="<?php $ans2 = ($row["msgupordown"] == 1) ? "公開" : "關閉";echo $ans2;?>"></td>
                                <td class="icon"><input class="btn btn2 <?php $ans3 = ($row["status"] == 'Y') ? "btn-green" : "btn-red";echo $ans3;?>" type="button" name="<?=$row["complainid"];?>" value="<?php $ans4 = ($row["status"] == 'Y') ? "正常會員" : "封鎖中";echo $ans4;?>"></td>
                                <!-- <td class="icon"><i name="<?=$row["msgid"];?>" id=""class="btn3 fas fa-trash-alt"></i></td> -->
                                <td class="icon"><i name="<?=$row["reportid"];?>" id=""class="btn4 fas fa-trash"></i></td>
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
    <script> 
        $('.btn1').click(function () {      
            var updown = $(this).val();
            let getid = $(this).attr("name")
            if(updown=='公開'){
                $(this).val('關閉').removeClass('btn-green').addClass('btn-red');
                msgresetbd(1,getid,0);
            }else{
                $(this).val('公開').removeClass('btn-red').addClass('btn-green');
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
			}
        });  
        $('.btn4').click(function () { 
            let getid = $(this).attr("name")
            if(confirm("確定要刪除此則檢舉嗎？")){
                msgresetbd(4,getid,null);
                var aa = `#tr_${getid}`
                $(aa).remove();
			}
        });
          
        function msgresetbd(dowhat,id,value) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        // console.log(xhr.responseText);
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