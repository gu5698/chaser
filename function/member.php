<?php

/**
 * 資料庫相關設定
 */
define('MY_DB_HOST', 'localhost');   // 填入資料庫IP
define('MY_DB_USER', 'root');   // 填入資料庫使用者
define('MY_DB_PASS', 'amin0978');   // 填入資料庫密碼
define('MY_DB_NAME', 'Chaser');   // 填入資料庫名稱

/**
 * 會員相關設定
 */
define('MEMBER_TABLE', 'member');
define('MEMBER_FIELD_ID', 'mem_id');
define('MEMBER_FIELD_USERNAME', 'mem_name');
define('MEMBER_FIELD_PASSWORD', 'mem_password');
define('MEMBER_FIELD_IMAGE', 'mem_image');
define('MEMBER_FIELD_IMAGE2', 'mem_image2');
define('MEMBER_FIELD_EMAIL', 'mem_email');
define('MEMBER_FIELD_PHONE', 'mem_phone');
define('MEMBER_FIELD_STATUS', 'status');

@session_start();

if (!function_exists('db_connect')) {
    /**
     * 建立資料庫連結
     *
     * @return pdo
     */
    function db_connect()
    {
        //=========== mysqli 初始化語法 開始
        // $connection = mysqli_init();
        // if (!$connection) {
        //     die('mysqli_init failed');
        // }

        // if (!mysqli_real_connect($connection, MY_DB_HOST, MY_DB_USER, MY_DB_PASS, MY_DB_NAME)) {
        //     die("Connect Error: " . mysqli_connect_error());
        // }

        // return $connection;

        // ========   mysqli 初始化語法 結束

         //=========== pdo 初始化語法 開始       
        $dsn = "mysql:host=".MY_DB_HOST.";port=3306;dbname=".MY_DB_NAME.";charset=utf8";
        // $user = "root";
        // $password = "root";
        $options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
        $pdo = new PDO( $dsn, MY_DB_USER, MY_DB_PASS, $options);
        return $pdo;

         //=========== pdo 初始化語法 結束 

    }
}

if (!function_exists('is_login')) {
    /**
     * 判斷會員是否有登入
     *
     * @return bool
     */
    function is_login()
    {
        return (empty($_SESSION['member'])) ? false : true;
    }
}

if (!function_exists('login_user')) {

    /**
     * 取得登入的會員資料
     *
     * @param mixed $data
     * @return mixed
     */
    function login_user($data = [])
    {
        if (!empty($data)) {
            if (is_array($data)) {  // 記錄會員登入資料
                $user_data = [
                    'id' => $data[MEMBER_FIELD_ID],
                    'username' => $data[MEMBER_FIELD_USERNAME],
                    'email' => $data[MEMBER_FIELD_EMAIL],
                    'phone' => $data[MEMBER_FIELD_PHONE],
                    'status' => $data[MEMBER_FIELD_STATUS],
                    'image' => $data[MEMBER_FIELD_IMAGE],
                    'image2' => $data[MEMBER_FIELD_IMAGE2]
                ];
                $_SESSION['member'] = $user_data;
            } else {    // 取得會員的某個資料
                return $_SESSION['member'][$data];
            }
        }

        /**
         * 回傳會員登入資料
         */
        return $_SESSION['member'];
    }

}

// ========判斷show_message是否被註冊
if (!function_exists('show_message')) {
    function show_message($text, $ref = '') {
        if(empty($ref)){
            $ref = $_SERVER['HTTP_REFERER'];
        }
        echo "<script>
                alert('{$text}');
                window.location = '{$ref}';
            </script>";
    }
}