<?php
    require_once("connection.php");
    date_default_timezone_set('Asia/Taipei');
	
	switch($_GET["action"]){
        
        case "add": 

            $picid = $_POST["picid"];            
            $sql2 = "update gallery set upordown='{$upordown}' where picid={$picid}";
            $stmt2 = $pdo->query($sql2);

            $fileName = $_FILES['upImg']['name'];
            $tmpDate = explode('.', $fileName);
            $newFileName = date('YmdHis') . '-' . $tmpDate[0] . '.' . $tmpDate[1];
            $path = __DIR__ . "/images/gallery-img/gallery-uploadpic-file/" . $newFileName;
            $showPath = './images/gallery-img/gallery-uploadpic-file/' . $newFileName;
            $state = move_uploaded_file($_FILES['upImg']['tmp_name'], $path);

            $positionno = $_POST["positionno"];
            $pictitle = $_POST["pictitle"];
            $picuser= $_POST["picuser"];
            $piccontent = $_POST["piccontent"];
			$addtime = date("Y-m-d H:i");

			$sql = "insert into gallery values(null,'{$positionno}','{$pictitle}','{$picuser}','{$piccontent}','{$newFileName}','1','{$addtime}')";
            $stmt = $pdo->query($sql);
            
            header("Location:gallery_backstage_1.php");

        break;
        
		
        case "del":
        
			$picid=$_GET['picid'];
			$sql = "delete from gallery where picid={$picid}";
			$stmt = $pdo->exec($sql);
				
            header("Location:gallery_backstage_1.php");
            
        break;
        
			
		case "update": 
            $imgname = $_POST["imgname"];
            $fileName = $_FILES['upImg']['name'];
            
            if($fileName == ""){
                $newFileName=$imgname;
            }else{
                $tmpDate = explode('.', $fileName);
                $newFileName = date('YmdHis') . '-' . $tmpDate[0] . '.' . $tmpDate[1];
                $path = __DIR__ . "/images/gallery-img/gallery-uploadpic-file/" . $newFileName;
                $showPath = './images/gallery-img/gallery-uploadpic-file/' . $newFileName;
                $state = move_uploaded_file($_FILES['upImg']['tmp_name'], $path);
            }

            $positionno = $_POST['positionno'];
            $picid = $_POST['picid'];
            $pictitle = $_POST["pictitle"];
            $picuser = $_POST['picuser'];
            $piccontent = $_POST["piccontent"];
            $upordown = $_POST["upordown"];
	
			$sql = "update gallery set positionno='{$positionno}',pictitle='{$pictitle}',piccontent='{$piccontent}',picuser='{$picuser}',upordown='{$upordown}',imgname='{$newFileName}' where picid={$picid}";
			$stmt = $pdo->exec($sql);

			header("Location:gallery_backstage_1.php");
				
		break;
	}
	
