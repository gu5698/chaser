<?php
    try {
        require_once "connect.php";

        $sqlMission = "SELECT * FROM mission";

        $pdostmMission = $pdo -> query($sqlMission);
        
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
    <link rel="shortcut icon" href="images/common/favicon.ico" type="image/x-icon">
    <!-- Bootstarp4 CSS -->
    <link rel="stylesheet" href="css\bootstrap-scss\bootstrap.css" />
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- common -->
    <link rel="stylesheet" href="css/backstage/backstage_common.css">
    <style>
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
        .uploadImg{
            width: 100%;
            font-size: 12px;
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
                    <a href="#"><li class="list-group-item active">任務管理</li></a>
                </ul>
            </div>
            <!-- ================================== -->
            <div class="col-10">
                <table class="table table-striped table-light">
                    <thead id="thead">
                        <tr>
                            <th class="text-center" scope="col" width="80">編號</th>
                            <th class="text-center" scope="col" width="100">任務代號</th>
                            <th class="text-center" scope="col">任務內容</th>
                            <th class="text-center" scope="col" width="180">任務圖片</th>
                            <th class="text-center" scope="col" width="100">攻擊<br>(0-10)</th>
                            <th class="text-center" scope="col" width="100">防禦<br>(0-10)</th>
                            <th class="text-center" scope="col" width="100">敏捷<br>(0-10)</th>
                            <th class="text-center" scope="col" width="100">耐久<br>(0-10)</th>
                            <th class="text-center" scope="col" width="100">隱匿<br>(0-10)</th>
                            <th class="text-center" scope="col" width="100">X座標<br>(0-100)</th>
                            <th class="text-center" scope="col" width="100">Y座標<br>(0-100)</th>
                            <th class="text-center" scope="col" width="160">操作</th>
                        </tr>
                    </thead>
                    <!-- ================================== -->
                    <tbody id="tbody">
                    <?php
                    while ($missions = $pdostmMission -> fetchObject()) {
                    ?>
                        <tr>
                            <td class="number text-center align-middle"></td>
                            <td class="align-middle"><textarea disabled class="mission-code w-100"><?php echo $missions->mission_code; ?></textarea></td>
                            <td class="align-middle"><textarea disabled rows="5" class="mission-content w-100"><?php echo $missions->content; ?></textarea></td>
                            <td class="align-middle">
                                <textarea disabled class="mission-img w-100"><?php echo $missions->img; ?></textarea>
                                <input disabled class="uploadImg" type="file" accept="image/*">
                            </td>
                            <td class="align-middle"><input disabled type="number" min="0" max="10" class="text-center mission-atk" value="<?php echo $missions->atk; ?>"></td>
                            <td class="align-middle"><input disabled type="number" min="0" max="10" class="text-center mission-def" value="<?php echo $missions->def; ?>"></td>
                            <td class="align-middle"><input disabled type="number" min="0" max="10" class="text-center mission-dex" value="<?php echo $missions->dex; ?>"></td>
                            <td class="align-middle"><input disabled type="number" min="0" max="10" class="text-center mission-dur" value="<?php echo $missions->dur; ?>"></td>
                            <td class="align-middle"><input disabled type="number" min="0" max="10" class="text-center mission-hide" value="<?php echo $missions->hide; ?>"></td>
                            <td class="align-middle"><input disabled type="number" min="0" max="100" class="text-center mission-x-axis" value="<?php echo $missions->x_axis; ?>"></td>
                            <td class="align-middle"><input disabled type="number" min="0" max="100" class="text-center mission-y-axis" value="<?php echo $missions->y_axis; ?>"></td>
                            <td class="align-middle text-center">
                                <div data-no="<?php echo $missions->mission_id; ?>" class="btn btn-outline-warning btn-edit">編輯</div>
                                <div data-no="<?php echo $missions->mission_id; ?>" class="btn btn-outline-danger btn-delete">刪除</div>
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
        
        // ====================================================
        function colEnabled(...cols){
            // console.log(cols);

            let colsLen = cols.length;
            for(let i=0; i<colsLen; i++){
                cols[i].disabled = false;
            }
        }
        // colEnabled(missionCode,missionContent,missionImg,missionAtk,missionDef,missionDex,missionDur,missionHide,missionXaxis,missionYaxis);
        // ====================================================
        function colDisabled(...cols){
            // console.log(cols);
            
            let colsLen = cols.length;
            for(let i=0; i<colsLen; i++){
                cols[i].disabled = true;
            }
        }
        // colDisabled(missionCode,missionContent,missionImg,missionAtk,missionDef,missionDex,missionDur,missionHide,missionXaxis,missionYaxis);
        // ====================================================

        // input file
        let uploadImgs = document.querySelectorAll('.uploadImg');
        let uploadImgLen = uploadImgs.length;
        let formData = new FormData();
        
        for(let i=0; i<uploadImgLen; i++){
            uploadImgs[i].addEventListener('change', function(e){
                // console.log(e.target.files[0].name);
                // console.log(e.target.parentNode.querySelector('.mission-img'));

                e.target.parentNode.querySelector('.mission-img').value = e.target.files[0].name;
                
                formData.append("missionImgFile[]", e.target.files[0]);

                // console.log(...formData);           
            });
        }

        
        function btnEdit(e){
            let missionCode = e.target.parentNode.parentNode.querySelector('.mission-code');
            let missionContent = e.target.parentNode.parentNode.querySelector('.mission-content');
            let missionImg = e.target.parentNode.parentNode.querySelector('.mission-img');
            let missionAtk = e.target.parentNode.parentNode.querySelector('.mission-atk');
            let missionDef = e.target.parentNode.parentNode.querySelector('.mission-def');
            let missionDex = e.target.parentNode.parentNode.querySelector('.mission-dex');
            let missionDur = e.target.parentNode.parentNode.querySelector('.mission-dur');
            let missionHide = e.target.parentNode.parentNode.querySelector('.mission-hide');
            let missionXaxis = e.target.parentNode.parentNode.querySelector('.mission-x-axis');
            let missionYaxis = e.target.parentNode.parentNode.querySelector('.mission-y-axis');
            let uploadImg = e.target.parentNode.parentNode.querySelector('.uploadImg');
            
            if(e.target.innerText == '編輯'){ //開始編輯
                colEnabled(missionCode,missionContent,missionImg,missionAtk,missionDef,missionDex,missionDur,missionHide,missionXaxis,missionYaxis,uploadImg);
                e.target.classList.toggle('btn-outline-warning');
                e.target.classList.toggle('btn-warning');
                e.target.innerText = '完成'
                e.target.nextElementSibling.innerText = '取消';
            }else if(e.target.innerText == '完成'){ //編輯完成
                if(missionCode.value != '' && missionContent.value != '' && missionImg.value != '' && missionAtk.value != '' && missionDef.value != '' && missionDex.value != '' && missionDur.value != '' && missionHide.value != '' && missionXaxis.value != '' && missionYaxis.value != ''){
                    colDisabled(missionCode,missionContent,missionImg,missionAtk,missionDef,missionDex,missionDur,missionHide,missionXaxis,missionYaxis,uploadImg);
                    e.target.classList.toggle('btn-outline-warning');
                    e.target.classList.toggle('btn-warning');
                    e.target.innerText = '編輯'
                    e.target.nextElementSibling.innerText = '刪除';

                    let xhr = new XMLHttpRequest(); //ok

                    xhr.onload = ()=>{
                        console.log(xhr.responseText);
                        if(xhr.responseText.trim() == 'ok'){
                            alert('編輯成功!');
                        }else{
                            alert('系統錯誤');
                        }
                    }
                    
                    let url = 'mission_update.php';
                    xhr.open('post', url, true);

                    // xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");  
                    // let sending = `mission_id=${e.target.dataset.no}&missionCode=${missionCode.value}&missionContent=${missionContent.value}&missionImg=${missionImg.value}&missionAtk=${missionAtk.value}&missionDef=${missionDef.value}&missionDex=${missionDex.value}&missionDur=${missionDur.value}&missionHide=${missionHide.value}&missionXaxis=${missionXaxis.value}&missionYaxis=${missionYaxis.value}`;
                    // console.log(sending);

                    formData.append("mission_id", e.target.dataset.no);
                    formData.append("missionCode", missionCode.value);
                    formData.append("missionContent", missionContent.value);
                    formData.append("missionImg", missionImg.value);
                    formData.append("missionAtk", missionAtk.value);
                    formData.append("missionDef", missionDef.value);
                    formData.append("missionDex", missionDex.value);
                    formData.append("missionDur", missionDur.value);
                    formData.append("missionHide", missionHide.value);
                    formData.append("missionXaxis", missionXaxis.value);
                    formData.append("missionYaxis", missionYaxis.value);
                    // console.log(...formData);             

                    xhr.send(formData);

                }else{
                    alert('尚有空白欄位!');
                }
            }else if(e.target.innerText == '送出'){ //新增ok
                // console.log(e.target.nextElementSibling);
                
                if(missionCode.value != '' && missionContent.value != '' && missionImg.value != '' && missionAtk.value != '' && missionDef.value != '' && missionDex.value != '' && missionDur.value != '' && missionHide.value != '' && missionXaxis.value != '' && missionYaxis.value != ''){
                    let xhr = new XMLHttpRequest();

                    xhr.onload = ()=>{
                        console.log(xhr.responseText.trim().split(','));
                        if(xhr.responseText.trim().split(',')[0] == 'ok'){
                            alert('新增成功!');
                            // window.location.reload();
                            colDisabled(missionCode,missionContent,missionImg,missionAtk,missionDef,missionDex,missionDur,missionHide,missionXaxis,missionYaxis,uploadImg);
                            e.target.classList.remove('btn-success');
                            e.target.classList.add('btn-outline-warning');
                            e.target.innerText = '編輯'
                            e.target.setAttribute("data-no", xhr.responseText.trim().split(',')[1]);
                            e.target.nextElementSibling.setAttribute("data-no", xhr.responseText.trim().split(',')[1]);
                        }else{
                            alert('系統錯誤');
                        }
                    }
                    
                    let url = 'mission_insert.php';
                    xhr.open('post', url, true);
                    // xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");  
                    // let sending = `missionCode=${missionCode.value}&missionContent=${missionContent.value}&missionImg=${missionImg.value}&missionAtk=${missionAtk.value}&missionDef=${missionDef.value}&missionDex=${missionDex.value}&missionDur=${missionDur.value}&missionHide=${missionHide.value}&missionXaxis=${missionXaxis.value}&missionYaxis=${missionYaxis.value}`;
                    // console.log(sending);

                    formData.append("missionCode", missionCode.value);
                    formData.append("missionContent", missionContent.value);
                    formData.append("missionImg", missionImg.value);
                    formData.append("missionAtk", missionAtk.value);
                    formData.append("missionDef", missionDef.value);
                    formData.append("missionDex", missionDex.value);
                    formData.append("missionDur", missionDur.value);
                    formData.append("missionHide", missionHide.value);
                    formData.append("missionXaxis", missionXaxis.value);
                    formData.append("missionYaxis", missionYaxis.value);


                    xhr.send(formData);
                }else{
                    alert('尚有空白欄位!');
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
                    if(confirm('確定刪除?')){ //ok
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
                        
                        let url = 'mission_delete.php';
                        xhr.open('post', url, true);
                        xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");  

                        let sending = `mission_id=${e.target.dataset.no}`;
                        // console.log(sending);

                        xhr.send(sending);
                    };
                }else{ //ok
                    tbody.removeChild(e.target.parentNode.parentNode);
                }
            }else if(e.target.innerText == '取消'){ //ok
                let missionCode = e.target.parentNode.parentNode.querySelector('.mission-code');
                let missionContent = e.target.parentNode.parentNode.querySelector('.mission-content');
                let missionImg = e.target.parentNode.parentNode.querySelector('.mission-img');
                let missionAtk = e.target.parentNode.parentNode.querySelector('.mission-atk');
                let missionDef = e.target.parentNode.parentNode.querySelector('.mission-def');
                let missionDex = e.target.parentNode.parentNode.querySelector('.mission-dex');
                let missionDur = e.target.parentNode.parentNode.querySelector('.mission-dur');
                let missionHide = e.target.parentNode.parentNode.querySelector('.mission-hide');
                let missionXaxis = e.target.parentNode.parentNode.querySelector('.mission-x-axis');
                let missionYaxis = e.target.parentNode.parentNode.querySelector('.mission-y-axis');
                let uploadImg = e.target.parentNode.parentNode.querySelector('.uploadImg');
                colDisabled(missionCode,missionContent,missionImg,missionAtk,missionDef,missionDex,missionDur,missionHide,missionXaxis,missionYaxis,uploadImg);

               
                e.target.innerText = '刪除'
                e.target.previousElementSibling.classList.toggle('btn-outline-warning');
                e.target.previousElementSibling.classList.toggle('btn-warning');
                e.target.previousElementSibling.innerText = '編輯'
            }


            
        }
        // ===================================================end delete

        

        // ===================================================add
        let btnAdd = document.getElementById('btn-add');
        btnAdd.addEventListener('click', ()=>{ //ok
            tbody.innerHTML += `
                <tr>
                    <td class="number text-center align-middle"></td>
                    <td class="align-middle"><textarea class="mission-code w-100"></textarea></td>
                    <td class="align-middle"><textarea rows="5" class="mission-content w-100"></textarea></td>
                    <td class="align-middle">
                        <textarea class="mission-img w-100"></textarea>
                        <input class="uploadImg" type="file" accept="image/*">
                    </td>
                    <td class="align-middle"><input type="number" min="0" max="10" value="5" class="text-center mission-atk"></td>
                    <td class="align-middle"><input type="number" min="0" max="10" value="5" class="text-center mission-def"></td>
                    <td class="align-middle"><input type="number" min="0" max="10" value="5" class="text-center mission-dex"></td>
                    <td class="align-middle"><input type="number" min="0" max="10" value="5" class="text-center mission-dur"></td>
                    <td class="align-middle"><input type="number" min="0" max="10" value="5" class="text-center mission-hide"></td>
                    <td class="align-middle"><input type="number" min="0" max="100" value="50" class="text-center mission-x-axis"></td>
                    <td class="align-middle"><input type="number" min="0" max="100" value="50" class="text-center mission-y-axis"></td>
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


            let uploadImgs = document.querySelectorAll('.uploadImg');
            let uploadImgLen = uploadImgs.length;
            
            for(let i=0; i<uploadImgLen; i++){
                uploadImgs[i].addEventListener('change', function(e){

                    e.target.parentNode.querySelector('.mission-img').value = e.target.files[0].name;                    
                    formData.append("missionImgFile[]", e.target.files[0]);

                    console.log(...formData);
                    
                });
            }
        });

        
    </script>

</body>
</html>