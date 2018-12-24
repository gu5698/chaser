<?php
    require_once "connection.php";

    $sql = "select * from gallery where picid={$_GET['picid']}";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result > 0) {
        $gallery = $result;
    } else {
        die("沒有找到要修改的展品！");
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

    <script type="text/javascript">
		function dodel(id){
			if(confirm("確定要刪除嗎？")){
				window.location="gallery-action.php?action=del&picid="+id;
			}
		}
	</script>
</head>

<body>
     <?php include_once 'backstage_navbar.php';?>
    
    <div class="container-fluid main5">
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
            <center>
                <h3>修改展品內容與狀態</h3>
                <form action="gallery-action.php?action=update" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="picid" value="<?=$gallery['picid'];?>"/>
                    <table width="300" border="0" class="table">
                        <tr>
                            <td align="right">展品名稱:</td>
                            <td><input type="text" name="pictitle" value="<?=$gallery['pictitle'];?>"/></td>
                        </tr>
                        <tr>
                            <td align="right" valign="top">展品使用人:</td>
                            <td><input type="text" name="picuser" value="<?=$gallery['picuser'];?>"/></td>
                        </tr>
                        <tr>
                            <td align="right" valign="top">展品介紹:</td>
                            <td><textarea cols="100" rows="10" name="piccontent"><?=$gallery['piccontent'];?></textarea></td>
                        </tr>
                        <tr>
                            <td align="right">展品擺放位置:</td>
                            <td>
                                <select name="positionno">
                                    <option value="1" <?php if ($gallery['positionno'] == 1) {echo 'selected';}?>>位置1</option>
                                    <option value="2" <?php if ($gallery['positionno'] == 2) {echo 'selected';}?>>位置2</option>
                                    <option value="3" <?php if ($gallery['positionno'] == 3) {echo 'selected';}?>>位置3</option>
                                    <option value="4" <?php if ($gallery['positionno'] == 4) {echo 'selected';}?>>位置4</option>
                                    <option value="5" <?php if ($gallery['positionno'] == 5) {echo 'selected';}?>>位置5</option>
                                    <option value="6" <?php if ($gallery['positionno'] == 6) {echo 'selected';}?>>位置6</option>
                                    <option value="7" <?php if ($gallery['positionno'] == 7) {echo 'selected';}?>>位置7</option>
                                    <option value="8" <?php if ($gallery['positionno'] == 8) {echo 'selected';}?>>位置8</option>
                                    <option value="9" <?php if ($gallery['positionno'] == 9) {echo 'selected';}?>>位置9</option>
                                    <option value="10" <?php if ($gallery['positionno'] == 10) {echo 'selected';}?>>位置10</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" valign="top">是否展示中:</td>
                            <td>
                                <select name="upordown">
                                    <option value="1" <?php if ($gallery['upordown'] == 1) {echo 'selected';}?>>上架中</option>
                                    <option value="0" <?php if ($gallery['upordown'] == 0) {echo 'selected';}?>>已下架</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">展品照片:</td>
                            <td><img src="images/gallery-img/gallery-uploadpic-file/<?=$gallery['imgname'];?>" width="150" alt=""></td>
                        </tr>
                        <tr>
                            <td><input type="hidden" name="imgname" value="<?=$gallery['imgname'];?>"/></td>
                            <td colspan="2" align="left">
                                <input type="file" name="upImg">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" class="btn" value="確認修改"/>&nbsp;&nbsp;
                                <input type="reset" class="btn" value="重新修改"/>
                            </td>
                        </tr>
                    </table>
                </form>
		    </center>
        </div>
    </div>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- popper js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>