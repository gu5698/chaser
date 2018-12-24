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
        if(is_login()){
            try {
                // 一般訂單
                $sql = "select order_id, order_time, grand_total, order_stat from orders where mem_id = :mem_id";
                $member = $db->prepare( $sql); 
                $member->bindValue(":mem_id",login_user('id'));
                $member->execute();
                $order = process_data($member);

                // 客製化訂單
                $sql = "select cu_order_id, cu_order_time, total, cu_order_stat from cu_order where mem_id = :mem_id";
                $member = $db->prepare( $sql); 
                $member->bindValue(":mem_id",login_user('id'));
                $member->execute();
                $cu_order = process_data($member,'cu_order_id','cu_order_time','total','cu_order_stat');

                // 票券訂單
                $sql = "select distinct b.t_order_id, b.t_order_addtime, b.t_order_much, b.t_order_total_price
                        from qrc_ticket a
                        join ticket_order b on a.t_order_id = b.t_order_id
                        where a.mem_id = :mem_id";
                $member = $db->prepare( $sql); 
                $member->bindValue(":mem_id",login_user('id'));
                $member->execute();
                $t_order = process_data($member,'t_order_id','t_order_addtime','t_order_much','t_order_total_price');
            } catch (PDOException $e) {
                echo "錯誤原因 : ", $e->getMessage(), "<br>";
                echo "錯誤行號 : ", $e->getLine(), "<br>";
            }  
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
        $id = $_GET['id'];
        //======= mysqli 寫法開始
        // $sql = sprintf('select qrc_id from qrc_ticket where t_order_id = \'%s\'',$id);
        // $result = mysqli_query($db, $sql);
        // $qr_code =[];
        // while($row=mysqli_fetch_assoc($result)){
        //     $qr_code[]=$row['qrc_id'];
        // }
        // mysqli_free_result($result);
        //======= mysqli 寫法結束

        //pdo 寫法 開始
        try {
            $sql = "select qrc_id from qrc_ticket where t_order_id = :value";
            $member = $db->prepare( $sql); 
            $member->bindValue(":value", $id);
            $member->execute();
            $qr_code =[];
            while($row = $member->fetch()) {
                $qr_code[]=$row['qrc_id'];
            }
        } catch (PDOException $e) {
            echo "錯誤原因 : ", $e->getMessage(), "<br>";
            echo "錯誤行號 : ", $e->getLine(), "<br>";
        }  
        //pdo 寫法 結束

        require_once 'template/member_ticket.php';
        break;
    case 'get_order':
        $id = $_GET['id'];

        //======= mysqli 寫法開始
        // $sql = sprintf('select order_id, order_time, grand_total from orders where order_id = "%s"',$id);
        // $result = mysqli_query($db, $sql);
        // $myorder = mysqli_fetch_assoc($result);
        // mysqli_free_result($result);
        //======= mysqli 寫法結束

        //pdo 寫法 開始
        try {
            $sql = "select order_id, order_time, grand_total from orders where order_id = :value";
            $pdoOrder = $db->prepare( $sql); 
            $pdoOrder->bindValue(":value", $id);
            $pdoOrder->execute();
            $myorder = $pdoOrder->fetch();
        } catch (PDOException $e) {
            echo "錯誤原因 : ", $e->getMessage(), "<br>";
            echo "錯誤行號 : ", $e->getLine(), "<br>";
        }  
        //pdo 寫法 結束


        //======= 取得訂單明細 開始
        //======= mysqli 寫法開始
        // $sql = sprintf('select b.product_name, b.pruduct_image ,b.product_price ,a.quantity
        // from orderdetail a
        // join product b on a.product_id = b.product_id
        // where a.order_id = "%s"',$id);
        // $result = mysqli_query($db, $sql);
        // $myorder_detail =[];
        // while($row=mysqli_fetch_assoc($result)){
        //     $myorder_detail[]=$row;
        // }
        // mysqli_free_result($result);
        //======= mysqli 寫法結束

        //pdo 寫法 開始
        try {
            $sql = "select b.product_name, b.product_image ,b.product_price ,a.quantity
                from orderdetail a
                join product b on a.product_id = b.product_id
                where a.order_id = :value";
            $pdoOrder = $db->prepare( $sql); 
            $pdoOrder->bindValue(":value", $id);
            $pdoOrder->execute();
            $myorder_detail =[];
            while($row=$pdoOrder->fetch()){
                $myorder_detail[]=$row;
            }
        } catch (PDOException $e) {
            echo "錯誤原因 : ", $e->getMessage(), "<br>";
            echo "錯誤行號 : ", $e->getLine(), "<br>";
        }  
        //pdo 寫法 結束

        //======= 取得訂單明細 結束

        require_once 'template/member_order.php';
    break;

    case 'do_cancle_order':
        $id = $_POST['id'];
        if(empty($id)){
            echo json_encode(['status' => false, 'msg' => '無此訂單!!']);
            exit;
        }
        try {
            $sql = "update orders set order_stat=:order_stat where order_id=:order_id";
            $member = $db->prepare( $sql); 
            $member->bindValue(":order_stat", '2');
            $member->bindValue(":order_id", $id);
            $member->execute();
        } catch (PDOException $e) {
            echo "錯誤原因 : ", $e->getMessage(), "<br>";
            echo "錯誤行號 : ", $e->getLine(), "<br>";
        }
        echo json_encode(['status' => true, 'msg' => '訂單已取消!!']);
    
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
    //======= mysqli 寫法開始
    // $sql = sprintf("select * from `%s` where `%s`='%s'"
    //     , MEMBER_TABLE
    //     , MEMBER_FIELD_EMAIL
    //     , $email);
    // $result = mysqli_query($db, $sql);
    // $record = mysqli_fetch_assoc($result);
    // mysqli_free_result($result);

    //======= mysqli 寫法結束

    //pdo 寫法 開始
    try {
        $sql = "select * from ".MEMBER_TABLE." where ".MEMBER_FIELD_EMAIL." =:value";
        $member = $db->prepare( $sql); 
        $member->bindValue(":value", $email);
        $member->execute();
        $record = $member->fetch();
    } catch (PDOException $e) {
        echo "錯誤原因 : ", $e->getMessage(), "<br>";
        echo "錯誤行號 : ", $e->getLine(), "<br>";
    }  
    //pdo 寫法 結束


    if (!empty($record)) {
        echo json_encode(['status' => false, 'msg' => '帳號已存在!!']);
        return;
    }

    //======= mysqli 寫法開始
    // 新增資料至資料庫
    // $sql = sprintf("insert into `%s` (`%s`,`%s`,`%s`,`%s`,`%s`) values ('%s','%s','%s','%s','%s')"
    //     , MEMBER_TABLE
    //     , MEMBER_FIELD_USERNAME
    //     , MEMBER_FIELD_EMAIL
    //     , MEMBER_FIELD_PHONE
    //     , MEMBER_FIELD_IMAGE
    //     , MEMBER_FIELD_PASSWORD
    //     , $username         // 會員姓名
    //     , $email            // 會員 email
    //     , $phone            // 會員手機
    //     ,''
    //     , md5($password));  // 會員密碼，要用 md5 編碼
    // $result = mysqli_query($db, $sql);
    //======= mysqli 寫法結束

    //pdo 寫法 開始
    try {
        $sql = "insert into ".MEMBER_TABLE." ("
                .MEMBER_FIELD_USERNAME.","
                .MEMBER_FIELD_EMAIL.","
                .MEMBER_FIELD_PHONE.","
                .MEMBER_FIELD_IMAGE.","
                .MEMBER_FIELD_PASSWORD.") values (:usernameValue,:emailValue,:phoneValue,:imageValue,:passwordValue)";
        $member = $db->prepare( $sql); 
        $member->bindValue(":usernameValue", $username);
        $member->bindValue(":emailValue", $email);
        $member->bindValue(":phoneValue", $phone);
        $member->bindValue(":imageValue", '');
        $member->bindValue(":passwordValue", md5($password));
        $member->execute();
    } catch (PDOException $e) {
        // echo "錯誤原因 : ", $e->getMessage(), "<br>";
        // echo "錯誤行號 : ", $e->getLine(), "<br>";
        echo json_encode(['status' => false, 'msg' => '新增帳號失敗!!' . mysqli_error($db)]);
        return;
    }  
    //pdo 寫法 結束

    // if ($result !== true) {
    //     echo json_encode(['status' => false, 'msg' => '新增帳號失敗!!' . mysqli_error($db)]);
    //     return;
    // }

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
    //======= mysqli 寫法開始
    // $sql = sprintf("select * from `%s` where `%s`='%s'"
    //     , MEMBER_TABLE
    //     , MEMBER_FIELD_EMAIL
    //     , $email);
    // $result = mysqli_query($db, $sql);
    // $record = mysqli_fetch_assoc($result);
    // mysqli_free_result($result);

    //====== mysqli 寫法結束

    //pdo 寫法 開始
    try {
        $sql = "select * from ".MEMBER_TABLE." where ".MEMBER_FIELD_EMAIL." =:value";
        $member = $db->prepare( $sql); 
        $member->bindValue(":value", $email);
        $member->execute();
        $record = $member->fetch();
    } catch (PDOException $e) {
        echo json_encode(['status' => false, 'msg' => '帳號不存在!!']);
        // echo "錯誤原因 : ", $e->getMessage(), "<br>";
        // echo "錯誤行號 : ", $e->getLine(), "<br>";
        return;
    }  
    //pdo 寫法 結束
    
    // if (empty($record)) {
    //     echo json_encode(['status' => false, 'msg' => '帳號不存在!!']);
    //     return;
    // }

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
    //======= mysqli 寫法開始
    // $sql = sprintf("update `%s` set `%s` = '%s', `%s` = '%s', `%s` = '%s', `%s` = '%s',`%s` = '%s'"
    //     , MEMBER_TABLE
    //     , MEMBER_FIELD_IMAGE
    //     , $image            // 會員照片
    //     , MEMBER_FIELD_USERNAME
    //     , $username         // 會員姓名
    //     , MEMBER_FIELD_EMAIL
    //     , $email            // 會員 email
    //     , MEMBER_FIELD_PHONE
    //     , $phone            // 會員手機
    //     , MEMBER_FIELD_PASSWORD
    //     , md5($password));  // 會員密碼，要用 md5 編碼
    // $result = mysqli_query($db, $sql);
    // if ($result !== true) {
    //     echo json_encode(['status' => false, 'msg' => '更新資料失敗!!' . mysqli_error($db)]);
    //     return;
    // }
    //======= mysqli 寫法結束

    // 取得登入者的資料
    try {
        $sql = "select * from ".MEMBER_TABLE." where ".MEMBER_FIELD_ID." =:idValue";
        $member = $db->prepare( $sql); 
        $member->bindValue(":idValue", login_user('id'));
        $member->execute();
        $record = $member->fetch();
    } catch (PDOException $e) {
        echo "錯誤原因 : ", $e->getMessage(), "<br>";
        echo "錯誤行號 : ", $e->getLine(), "<br>";
    }
    // 判斷輸入密碼與資料庫密碼是否相同，若不相同則產生錯誤訊息
    if(md5($password)!=$record[MEMBER_FIELD_PASSWORD]){
        show_message('帳號與密碼不符合!!');
        return;
    }

    // 若未修改密碼afterPassword等於舊密碼，
    // 若password_new不等於空白，判斷password_new和$password_confirm是否相符，若不符就return，
    // 若相符新密碼就等於password_new
    $afterPassword = $record[MEMBER_FIELD_PASSWORD];
    if(!empty($password_new)) {
        if($password_new!=$password_confirm){
            show_message('2密碼不符合!!');
            return;
        }
        $afterPassword = md5($password_new);
    }
    
    // if upload image   
    $imageFile = $_FILES['file'];
    $image1 = '';
    // $image2 = '';
    if(!empty($imageFile) && 0==$imageFile['error']){   // 必須先判斷檔案是否是空的，再判斷是否有錯誤訊息
        // image1=要存入的檔案名稱，
        $image1 = time().
                    '_'.md5($imageFile['tmp_name']).    // 將檔案路徑以md5編碼
                    '.'.end(explode('.', $imageFile['name']));   // 將檔名以.分割字串，再取最後一個字串(即 副檔名)
        
        // 定義上傳路徑
        $uploadPath = 'images/mem_images/';  
        // 將原檔案複製到指定路徑(__DIR__+$uploadPath+$image1)
        // __DIR__ = 目前檔案的實際路徑 =(/Applications/MAMP/htdocs/Chaser_1214)
        copy($imageFile['tmp_name'], __DIR__.'/'.$uploadPath.$image1);

        // $image2 = $uploadPath.$image1;
    }

    //======= pdo 寫法開始

    try {
        $sql = "update " . MEMBER_TABLE . " set " .
                MEMBER_FIELD_IMAGE    . "=:imageValue," .
                // MEMBER_FIELD_IMAGE2   . "=:image2Value," .
                MEMBER_FIELD_USERNAME . "=:usernameValue," .
                MEMBER_FIELD_EMAIL    . "=:emailValue," .
                MEMBER_FIELD_PHONE    . "=:phoneValue," .
                MEMBER_FIELD_PASSWORD . "=:passwordValue" .
                " where ".MEMBER_FIELD_ID."=:memberId";
        $member = $db->prepare( $sql); 
        $member->bindValue(":imageValue", $image1);
        // $member->bindValue(":image2Value", $image2);
        $member->bindValue(":usernameValue", $username);
        $member->bindValue(":emailValue", $email);
        $member->bindValue(":phoneValue", $phone);
        $member->bindValue(":passwordValue", $afterPassword);
        $member->bindValue(":memberId", login_user('id'));
        $member->execute();
    } catch (PDOException $e) {
        echo "錯誤原因 : ", $e->getMessage(), "<br>";
        echo "錯誤行號 : ", $e->getLine(), "<br>";
    }  


    try {
        $sql = "select * from ".MEMBER_TABLE." where ".MEMBER_FIELD_EMAIL." =:value";
        $member = $db->prepare( $sql); 
        $member->bindValue(":value", $email);
        $member->execute();
        $record = $member->fetch();
    } catch (PDOException $e) {
        echo json_encode(['status' => false, 'msg' => '帳號不存在!!']);
        // echo "錯誤原因 : ", $e->getMessage(), "<br>";
        // echo "錯誤行號 : ", $e->getLine(), "<br>";
        return;
    }  

    // 修改成功，要把資料記在 session 裡面
    login_user($record);

    //======= pdo 寫法結束

    show_message('會員資料已更新', 'member.php');
    // echo json_encode(['status' => true]);
}


/**
 * 取得page1到page3的table裡的資料
 */
function process_data($member,$order_id ='order_id',$order_time ='order_time',$grand_total='grand_total',$order_stat='order_stat'){
    global $db;
    $order_status = [0=>'已出貨',1=>'未出貨',2=>'訂單已取消',3=>'已結案'];
    $order = [];
    while($row=$member->fetch()){
        $order[]=[
            $order_id=>$row[$order_id],
            $order_time=>$row[$order_time],
            $grand_total=>$row[$grand_total],
            $order_stat=>($order_stat=='t_order_total_price')? $row[$order_stat] : $order_status[$row[$order_stat]]
        ];
    }
    return $order;
}

