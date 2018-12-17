<?php
    require_once "connection.php";
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
    
    <div class="container-fluid main4">
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
                    <h3>替換展品</h3>
                    <form action="gallery-action.php?action=add" method="post" enctype="multipart/form-data">
                        <table width="300" border="0" class="table">
                                <input type="hidden" name="picid" value="<?=$_GET["picid"];?>"/>
                                   <input type="hidden" name="positionno" value="<?=$_GET["positionno"];?>"/>
                            <tr>
                                <td align="right">展品名稱:</td>
                                <td><input type="text" name="pictitle"/></td>
                            </tr>
                            <tr>
                                <td align="right">展品使用人:</td>
                                <td><input type="text" name="picuser"/></td>
                            </tr>
                            <tr>
                                <td align="right" valign="top">展品介紹:</td>
                                <td><textarea cols="100" rows="20" name="piccontent"></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2" align="left">
                                    <input type="file" name="upImg" >
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" class="btn" value="添加"/>&nbsp;&nbsp;
                                    <input type="reset" class="btn" value="重置"/>
                                </td>
                            </tr>
                        </table>
                    </form>
		        </center>
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