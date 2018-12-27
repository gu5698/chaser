<?php
    try {
        require_once "connectchaser.php";

        $sqlChatbot = "SELECT * FROM chatbot";

        $pdostmChatbot = $pdo -> query($sqlChatbot);
        // $responses = $pdostmChatbot -> fetchAll(PDO::FETCH_ASSOC);
        // $responses = $pdostmChatbot -> fetchObject();
        
        // var_dump($responses);
        //======================================================
        
    } catch (PDOException $e) {
        echo "錯誤原因:", $e->getMessage(), "<hr>";
        echo "錯誤行號:", $e->getLine(), "<hr>";
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
    <link rel="stylesheet" href="css/backstage/backstage_common.css">    <style>
        textarea{
            resize: none;
        }
        textarea:disabled,
        input:disabled{
            background: #ddd;
        }
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
    <?php include_once 'backstage_navbar.php'; ?>
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
            <!-- ================================== -->
            <div class="col-2">
                <ul class="list-group text-center">
                    <a href="#"><li class="list-group-item active">客服問答管理</li></a>
                </ul>
            </div>
            <!-- ================================== -->
            <div class="col-10">
                <table class="table table-striped table-light">
                    <thead id="thead">
                        <tr>
                            <th class="text-center" scope="col" width="80">編號</th>
                            <th class="text-center" scope="col" width="200">關鍵字</th>
                            <th class="text-center" scope="col">應答</th>
                            <th class="text-center" scope="col" width="160">操作</th>
                        </tr>
                    </thead>
                    <!-- ================================== -->
                    <tbody id="tbody">
                    <?php
                    while ($responses = $pdostmChatbot -> fetchObject()) {
                    ?>
                        <tr>
                            <td class="number text-center align-middle"></td>
                            <td><textarea disabled rows="3" class="keyword w-100"><?php echo $responses->keyword; ?></textarea></td>
                            <td><textarea disabled rows="3" class="response w-100"><?php echo $responses->response; ?></textarea></td>
                            <td class="align-middle text-center">
                                <div data-no="<?php echo $responses->no; ?>" class="btn btn-outline-warning btn-edit">編輯</div>
                                <div data-no="<?php echo $responses->no; ?>" class="btn btn-outline-danger btn-delete">刪除</div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                    <!-- ================================== -->
                </table>
            </div>
            <!-- ================================== -->
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
        // ===================================================edit
        let btnEdits = document.querySelectorAll('.btn-edit');
        let btnEditsLen = btnEdits.length;
        // console.log(btnEdits, btnEditsLen);
        
        for(let i=0; i<btnEditsLen; i++){
            btnEdits[i].addEventListener('click', btnEdit); 
        }

        function btnEdit(e){
            // console.log(e.target);
            // console.log(e.target.parentNode.parentNode.querySelector('.keyword'));
            let keyword = e.target.parentNode.parentNode.querySelector('.keyword');
            let response = e.target.parentNode.parentNode.querySelector('.response');

            if(e.target.innerText == '編輯'){ //開始編輯
                keyword.disabled = false;
                response.disabled = false;
                e.target.classList.toggle('btn-outline-warning');
                e.target.classList.toggle('btn-warning');
                e.target.innerText = '完成'
                e.target.nextElementSibling.innerText = '取消';
            }else if(e.target.innerText == '完成'){ //編輯完成
                keyword.disabled = true;
                response.disabled = true;
                e.target.classList.toggle('btn-outline-warning');
                e.target.classList.toggle('btn-warning');
                e.target.innerText = '編輯'
                e.target.nextElementSibling.innerText = '刪除';


                let xhr = new XMLHttpRequest();

                xhr.onload = ()=>{
                    console.log(xhr.responseText);
                    if(xhr.responseText.trim() == 'ok'){
                        alert('編輯成功!');
                    }else{
                        alert('系統錯誤');
                    }
                }
                
                let url = 'chatbot_update.php';
                xhr.open('post', url, true);
                xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");  

                let sending = `no=${e.target.dataset.no}&keyword=${keyword.value}&response=${response.value}`;
                // console.log(sending);

                xhr.send(sending);
            }else if(e.target.innerText == '送出'){ //新增
                // console.log(e.target.nextElementSibling);
                
                if(keyword.value != ''){
                    let xhr = new XMLHttpRequest();

                    xhr.onload = ()=>{
                        console.log(xhr.responseText.trim().split(','));
                        if(xhr.responseText.trim().split(',')[0] == 'ok'){
                            alert('新增成功!');
                            // window.location.reload();
                            keyword.disabled = true;
                            response.disabled = true;
                            e.target.classList.remove('btn-success');
                            e.target.classList.add('btn-outline-warning');
                            e.target.innerText = '編輯'
                            e.target.setAttribute("data-no", xhr.responseText.trim().split(',')[1]);
                            e.target.nextElementSibling.setAttribute("data-no", xhr.responseText.trim().split(',')[1]);
                        }else{
                            alert('系統錯誤');
                        }
                    }
                    
                    let url = 'chatbot_insert.php';
                    xhr.open('post', url, true);
                    xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");  

                    let sending = `keyword=${keyword.value}&response=${response.value}`;
                    // console.log(sending);

                    xhr.send(sending);
                }else{
                    alert('請輸入關鍵字!')
                }
            }
        }
        // ===================================================end edit

        // ===================================================delete
        let btnDeletes = document.querySelectorAll('.btn-delete');
        let btnDeletesLen = btnDeletes.length;

        for(let i=0; i<btnDeletesLen; i++){
            btnDeletes[i].addEventListener('click', btnDelete);
        }
        
        function btnDelete(e){
            // console.log(e.target.parentNode.parentNode);
            let tbody = document.getElementById('tbody');

            if(e.target.innerText == '刪除'){
                if(e.target.dataset.no){
                    if(confirm('確定刪除?')){
                        let xhr = new XMLHttpRequest();

                        xhr.onload = ()=>{
                            console.log(xhr.responseText);
                            if(xhr.responseText.trim() == 'ok'){
                                alert('已刪除!');
                                // window.location.reload();
                                tbody.removeChild(e.target.parentNode.parentNode);
                            }else{
                                alert('系統錯誤');                                
                            }
                        }
                        
                        let url = 'chatbot_delete.php';
                        xhr.open('post', url, true);
                        xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");  

                        let sending = `no=${e.target.dataset.no}`;
                        // console.log(sending);

                        xhr.send(sending);
                    };
                }else{
                    tbody.removeChild(e.target.parentNode.parentNode);
                }
            }else if(e.target.innerText == '取消'){
                let keyword = e.target.parentNode.parentNode.querySelector('.keyword');
                let response = e.target.parentNode.parentNode.querySelector('.response');
                keyword.disabled = true;
                response.disabled = true;
               
                e.target.innerText = '刪除'
                e.target.previousElementSibling.classList.toggle('btn-outline-warning');
                e.target.previousElementSibling.classList.toggle('btn-warning');
                e.target.previousElementSibling.innerText = '編輯'
            }


            
        }
        // ===================================================end delete

        

        // ===================================================add
        let btnAdd = document.getElementById('btn-add');
        btnAdd.addEventListener('click', ()=>{
            tbody.innerHTML += `
                <tr>
                    <td class="number text-center align-middle"></td>
                    <td><textarea rows="3" class="keyword w-100"></textarea></td>
                    <td><textarea rows="3" class="response w-100"></textarea></td>
                    <td class="align-middle text-center">
                        <div class="btn btn-success btn-edit">送出</div>
                        <div class="btn btn-outline-danger btn-delete">刪除</div>
                    </td>
                </tr>
            `;
            
            let btnEdits = document.querySelectorAll('.btn-edit');
            let btnEditsLen = btnEdits.length;
            for(let i=0; i<btnEditsLen; i++){
                btnEdits[i].addEventListener('click', btnEdit); 
            }

            let btnDeletes = document.querySelectorAll('.btn-delete');
            let btnDeletesLen = btnDeletes.length;
            for(let i=0; i<btnDeletesLen; i++){
                btnDeletes[i].addEventListener('click', btnDelete);
            }
            // console.log(document.documentElement.scrollHeight);
            
            window.scrollTo(0, document.documentElement.scrollHeight);
        });

    </script>
</body>
</html>