<?php

ini_set('display_errors', true);
error_reporting(E_ALL ^ E_NOTICE ^ E_USER_NOTICE);

include_once 'function/member.php';

$login = $_GET['login'];
$register = $_GET['register'];

// 判斷要走的流程
$action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';

if (empty($action)) {
    if (1 == $login) {
        // 取得登入畫面
        $action = 'login';
    } else if (1 == $register) {
        // 取得註冊畫面
        $action = 'register';
    } else {
        // 主程式
        $action = 'main';

        // 如果沒有登入要導到首頁
        if (!is_login()) {
            // TODO 這邊看之後未登入要導到哪一個頁面
        }
    }
}

// 先取得所有 POST 的內容
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$password_new = $_POST['password_new'];
$image = $_POST['image'];

// 建立資料庫連線
$db = db_connect();

switch ($action) {
    case 'login':       // 登入畫面
        require_once 'template/member_login.php';
        break;
    case 'register':    // 註冊畫面
        require_once 'template/member_register.php';
        break;
    case 'main':        // 會員主畫面
        // $order_status = [0=>'已出貨',1=>'未出貨',2=>'訂單已取消',3=>'已結案'];
        $sql = sprintf("select order_id, order_time, grand_total, order_stat from orders where mem_id = %s",login_user('id'));
        // $result = mysqli_query($db, $sql);
        // $order = [];
        // while($row=mysqli_fetch_assoc($result)){
        //     $order[]=[
        //         'order_id'=>$row['order_id'],
        //         'order_time'=>$row['order_time'],
        //         'grand_total'=>$row['grand_total'],
        //         'order_stat'=>$order_status[$row['order_stat']]
        //     ];
        // }
        // mysqli_free_result($result);
        if(is_login()){
            $order = process_data($sql);
        }
        

        $sql = sprintf('select cu_order_id, cu_order_time, total, cu_order_stat from cu_order where mem_id = %s',login_user('id'));
        // $result = mysqli_query($db, $sql);
        // $cu_order = [];
        // while($row=mysqli_fetch_assoc($result)){
        //     $cu_order[]=[
        //         'cu_order_id'=>$row['cu_order_id'],
        //         'cu_order_time'=>$row['cu_order_time'],
        //         'total'=>$row['total'],
        //         'cu_order_stat'=>$order_status[$row['cu_order_stat']]
        //     ];
        //     // $cu_order[]=$row;
        //     // print_r($row);
        // }
        // mysqli_free_result($result);
        if(is_login()){
        $cu_order= process_data($sql,'cu_order_id','cu_order_time','total','cu_order_stat');
        }
        
        $sql = sprintf('select distinct b.t_order_id, b.t_order_addtime, b.t_order_much, b.t_order_total_price
        from qrc_ticket a
        join ticket_order b on a.t_order_id = b.t_order_id
        where a.mem_id = %s',login_user('id'));
        // $result = mysqli_query($db, $sql);
        // $t_order=[];
        // while($row=mysqli_fetch_assoc($result)){
        //     $t_order[]=[
        //         't_order_id'=>$row['t_order_id'],
        //         't_order_addtime'=>$row['t_order_addtime'],
        //         't_order_much'=>$row['t_order_much'],
        //         't_order_total_price'=>$row['t_order_total_price']
        //     ];
        // }
        // mysqli_free_result($result);
        if(is_login()){
        $t_order=process_data($sql,'t_order_id','t_order_addtime','t_order_much','t_order_total_price');
    }

        require_once 'template/member_page.php';
        break;
    case 'do_login':      // 登入
        login();
        break;
    case 'do_register':   // 註冊
        register();
        break;
    case 'do_logout':   // 登出
        unset($_SESSION['member']);
        header('Location: member.php');
        break;
    case 'do_edit':   // 修改會員資料
        edit();
        break;
    case 'get_ticket':
        $id=$_GET['id'];
        $sql = sprintf('select qrc_id from qrc_ticket where t_order_id = \'%s\'',$id);
        $result = mysqli_query($db, $sql);
        $qr_code =[];
        while($row=mysqli_fetch_assoc($result)){
            $qr_code[]=$row['qrc_id'];
        }
        mysqli_free_result($result);
        require_once 'template/member_ticket.php';
        break;
    case 'get_order':
        $id=$_GET['id'];
        $sql = sprintf('select order_id, order_time, grand_total from orders where order_id = "%s"',$id);
        $result = mysqli_query($db, $sql);
        $myorder = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        // print_r($myorder);
        $sql = sprintf('select b.product_name, b.pruduct_image ,b.product_price ,a.quantity
        from orderdetail a
        join product b on a.product_id = b.product_id
        where a.order_id = "%s"',$id);
        $result = mysqli_query($db, $sql);
        $myorder_detail =[];
        while($row=mysqli_fetch_assoc($result)){
            $myorder_detail[]=$row;
        }
        print_r($myorder_detail);
        mysqli_free_result($result);
        require_once 'template/member_order.php';
    break;
}

/**
 * 實際註冊時的行為
 */
function register()
{
    // 將下面的變數轉換成全域變數，供函式直接使用
    global $db, $username, $email, $phone, $password, $password_confirm;

    // 先檢查有沒有帳號
    $sql = sprintf("select * from `%s` where `%s`='%s'"
        , MEMBER_TABLE
        , MEMBER_FIELD_EMAIL
        , $email);
    $result = mysqli_query($db, $sql);
    $record = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    if (!empty($record)) {
        echo json_encode(['status' => false, 'msg' => '帳號已存在!!']);
        return;
    }

    // 新增資料至資料庫
    $sql = sprintf("insert into `%s` (`%s`,`%s`,`%s`,`%s`,`%s`) values ('%s','%s','%s','%s','%s')"
        , MEMBER_TABLE
        , MEMBER_FIELD_USERNAME
        , MEMBER_FIELD_EMAIL
        , MEMBER_FIELD_PHONE
        , MEMBER_FIELD_IMAGE
        , MEMBER_FIELD_PASSWORD
        , $username         // 會員姓名
        , $email            // 會員 email
        , $phone            // 會員手機
        ,''
        , md5($password));  // 會員密碼，要用 md5 編碼
    $result = mysqli_query($db, $sql);
    if ($result !== true) {
        echo json_encode(['status' => false, 'msg' => '新增帳號失敗!!' . mysqli_error($db)]);
        return;
    }

    // 註冊後自動登入
    login_user([
        MEMBER_FIELD_USERNAME => $username,
        MEMBER_FIELD_EMAIL => $email,
        MEMBER_FIELD_PHONE => $phone
    ]);
    echo json_encode(['status' => true]);
}

/**
 * 實際登入時的行為
 */
function login()
{
    // 將下面的變數轉換成全域變數，供函式直接使用
    global $db, $email, $password;

    // 先檢查有沒有帳號
    $sql = sprintf("select * from `%s` where `%s`='%s'"
        , MEMBER_TABLE
        , MEMBER_FIELD_EMAIL
        , $email);
    $result = mysqli_query($db, $sql);
    $record = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    if (empty($record)) {
        echo json_encode(['status' => false, 'msg' => '帳號不存在!!']);
        return;
    }

    // 判斷密碼是否正確
    if (md5($password) != $record[MEMBER_FIELD_PASSWORD]) {
        echo json_encode(['status' => false, 'msg' => '帳號與密碼不符合!!']);
        return;
    }

    // 登入成功，要把資料記在 session 裡面
    login_user($record);

    echo json_encode(['status' => true]);
}

/**
 * 修改會員資料時的行為
 */


function edit()
{

    // 將下面的變數轉換成全域變數，供函式直接使用
    global $db, $image, $username, $email, $phone, $password, $password_confirm;

    // 更新資料至資料庫
    $sql = sprintf("update `%s` set `%s` = '%s', `%s` = '%s', `%s` = '%s', `%s` = '%s',`%s` = '%s'"
        , MEMBER_TABLE
        , MEMBER_FIELD_IMAGE
        , $image            // 會員照片
        , MEMBER_FIELD_USERNAME
        , $username         // 會員姓名
        , MEMBER_FIELD_EMAIL
        , $email            // 會員 email
        , MEMBER_FIELD_PHONE
        , $phone            // 會員手機
        , MEMBER_FIELD_PASSWORD
        , md5($password));  // 會員密碼，要用 md5 編碼
    $result = mysqli_query($db, $sql);
    if ($result !== true) {
        echo json_encode(['status' => false, 'msg' => '更新資料失敗!!' . mysqli_error($db)]);
        return;
    }
}


/**
 * 取得page1到page3的table裡的資料
 */
function process_data($sql,$order_id ='order_id',$order_time ='order_time',$grand_total='grand_total',$order_stat='order_stat'){
    global $db;
    $order_status = [0=>'已出貨',1=>'未出貨',2=>'訂單已取消',3=>'已結案'];
    // $sql = sprintf("select order_id, order_time, grand_total, order_stat from orders where mem_id = %s",login_user('id'));
    $result = mysqli_query($db, $sql);
    $order = [];
    while($row=mysqli_fetch_assoc($result)){
        $order[]=[
            $order_id=>$row[$order_id],
            $order_time=>$row[$order_time],
            $grand_total=>$row[$grand_total],
            $order_stat=>($order_stat=='t_order_total_price')? $row[$order_stat] : $order_status[$row[$order_stat]]
        ];
    }
    mysqli_free_result($result);
    return $order;
}

// 程式結束時，關閉連線
mysqli_close($db);