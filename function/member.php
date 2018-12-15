<?php

/**
 * 資料庫相關設定
 */
define('MY_DB_HOST', 'localhost');   // 填入資料庫IP
define('MY_DB_USER', 'root');   // 填入資料庫使用者
define('MY_DB_PASS', 'root');   // 填入資料庫密碼
define('MY_DB_NAME', 'Chaser');   // 填入資料庫名稱

/**
 * 會員相關設定
 */
define('MEMBER_TABLE', 'member');
define('MEMBER_FIELD_ID', 'mem_id');
define('MEMBER_FIELD_USERNAME', 'mem_name');
define('MEMBER_FIELD_PASSWORD', 'mem_password');
define('MEMBER_FIELD_IMAGE', 'mem_image');
define('MEMBER_FIELD_EMAIL', 'mem_email');
define('MEMBER_FIELD_PHONE', 'mem_phone');
define('MEMBER_FIELD_STATUS', 'status');

session_start();

if (!function_exists('db_connect')) {
    /**
     * 建立資料庫連結
     *
     * @return mysqli
     */
    function db_connect()
    {
        $connection = mysqli_init();
        if (!$connection) {
            die('mysqli_init failed');
        }

        if (!mysqli_real_connect($connection, MY_DB_HOST, MY_DB_USER, MY_DB_PASS, MY_DB_NAME)) {
            die("Connect Error: " . mysqli_connect_error());
        }

        return $connection;
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
     * @return array
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
                    'image' => $data[MEMBER_FIELD_IMAGE]
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