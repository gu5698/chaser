<?php
try {
    require_once "connect.php";

    $sql = "select *
    from coupon
    where promotion != 'x';";
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

    <style>
        .table{
                counter-reset: num;
            }
        .number::before{
            counter-increment: num;
            content: counter(num);
        }
    </style>
</head>

<body>
   <?php include_once 'backstage_navbar.php';?>



    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-10">
                <div id="btn-add" class="btn btn-warning">新增</div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid pb-5">
        <div class="row">
            <div class="col-2">
                <ul class="list-group">
                    <a href="coupon-backstage.php" class="text-center"><li class="list-group-item">藝廊優惠卷</li></a>
                    <a href="coupon-backstage2.php" class="text-center"><li class="list-group-item active">機器人優惠卷</li></a>
                </ul>
            </div>
            <div class="col-10">
                <table class="table table-striped">
                    <thead id="thead">
                        <tr>
                            <th class="text-center" scope="col" width="100">編號</th>
                            <th class="text-center" scope="col">優惠卷序號</th>
                            <th class="text-center" scope="col">優惠卷折扣</th>
                            <th class="text-center" scope="col" width="100">操作</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php foreach ($result as $row): ?>
                            <tr>
                                <td class="text-center number"></td>
                                <td class="text-center promotion"><?php echo $row["promotion"];?></td>
                                <td class="text-center discount"><?php echo $row["discount"];?></td>
                                <td class="text-center"><div data-id="<?php echo $row["couponid"];?>" class="btn btn-outline-danger btn-delete">刪除</div></td>
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

        // ======================================================delete
        let btnDeletes = document.querySelectorAll('.btn-delete');
        let btnDeletesLen = btnDeletes.length;
        let tbody = document.getElementById('tbody');

        for(let i=0; i<btnDeletesLen; i++){
            btnDeletes[i].addEventListener('click', clickDelete);
        }

        function clickDelete(e){
            // console.log(e.target.parentNode.parentNode);
            if(e.target.innerText == '刪除'){
                if(confirm('確定刪除?')){
                    let xhr = new XMLHttpRequest();

                    xhr.onload = ()=>{
                        console.log(xhr.responseText.trim());
                        if(xhr.responseText.trim() == 'ok'){
                            tbody.removeChild(e.target.parentNode.parentNode);
                            alert('已刪除!');
                        }else{
                            alert('系統錯誤');
                        }
                        
                    }

                    let url = 'coupon_delete.php';
                    xhr.open('post', url, true);
                    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");  

                    // console.log(e.target.dataset.id);
                    let sending = `couponid=${e.target.dataset.id}`;
                    xhr.send(sending);
                }
            }else if(e.target.innerText == '完成'){
                let promotion = e.target.parentNode.parentNode.querySelector('.promotion input');
                let discount = e.target.parentNode.parentNode.querySelector('.discount input');
                // console.log(promotion, discount);
                if(promotion.value != '' && discount.value != ''){
                    let xhr = new XMLHttpRequest();

                    xhr.onload = ()=>{
                        console.log(xhr.responseText.trim());
                        if(xhr.responseText.trim().split(',')[0] == 'ok'){
                            promotion.parentElement.innerText = promotion.value;
                            discount.parentElement.innerText = discount.value;
                            e.target.classList.remove('btn-warning');
                            e.target.classList.add('btn-outline-danger');
                            e.target.innerText = '刪除';
                            e.target.dataset.id = xhr.responseText.trim().split(',')[1];
                            alert('新增成功!');
                        }else{
                            alert('系統錯誤');
                        }
                        
                    }

                    let url = 'coupon_insert.php';
                    xhr.open('post', url, true);
                    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");  

                    let sending = `promotion=${promotion.value}&discount=${discount.value}`;
                    xhr.send(sending);

                }else{
                    alert('尚有空白欄位!');
                }
            }
        }
        // ======================================================end delete




        // ======================================================insert
        let btnAdd = document.getElementById('btn-add');
        btnAdd.addEventListener('click', ()=>{
            tbody.innerHTML += `
            <tr>
                <td class="text-center number"></td>
                <td class="text-center promotion"><input type="text" class="w-100"></td>
                <td class="text-center discount"><input type="text" class="w-100"></td>
                <td class="text-center"><div class="btn btn-warning btn-delete">完成</div></td>
            </tr>`;

            document.documentElement.scrollTop = document.documentElement.scrollHeight;

            let btnDeletes = document.querySelectorAll('.btn-delete');
            let btnDeletesLen = btnDeletes.length;

            for(let i=0; i<btnDeletesLen; i++){
                btnDeletes[i].addEventListener('click', clickDelete);
            }
        });
        // ======================================================end insert
    </script>
</body>

</html>