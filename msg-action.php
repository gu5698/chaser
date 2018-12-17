<?php
require_once("connection.php");
date_default_timezone_set('Asia/Taipei');

switch($_GET["dowhat"]){
	case "1": 
        $id = $_GET['id'];
        $value = $_GET['value'];

		$sql1 = "update message set msgupordown='{$value}' where msgid={$id}";
        $stmt1 = $pdo->query($sql1);    
	break;
		
    case "2": 
        $id = $_GET['id'];
        $value = $_GET['value'];

		$sql2 = "update member set status='{$value}' where mem_id={$id}";
		$stmt2 = $pdo->exec($sql2);
	break;
			
    case "3":
        $id = $_GET['id'];
        $value = $_GET['value'];

		$sql3 = "delete from message where msgid={$id}";
        $stmt3 = $pdo->exec($sql3);
    break;
        
    case "4":
        $id = $_GET['id'];
        $value = $_GET['value'];

		$sql4 = "delete from report where reportid={$id}";
        $stmt4 = $pdo->exec($sql4);
	break;
}

