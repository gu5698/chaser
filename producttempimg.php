<?php
// 將標案上傳到 productTempImages//
$upload_dir = "productTempImages//";
// 假如資料夾不存在 就由系統建立
if( ! file_exists($upload_dir ))
  mkdir($upload_dir);

//接收 hidden_data的值 
$img = $_POST['hidden_data'];
// str_replace() 函數以其他字符替換字符串中的一些字符
$img = str_replace('data:image/png;base64,', '', $img);
// base64_decode解密函式
$data = base64_decode($img);
// 檔案名稱為productdesign
$fileName = "productdesign";
$file = $upload_dir . $fileName . ".png";
// file_put_contents() 函數把一個字符串寫入文件中
// file 必需。規定要寫入數據的文件。如果文件不存在，則創建一個新文件。
// data 可選。規定要寫入文件的數據。可以是字符串、數組或數據流。
// mode 可選。規定如何打開/寫入文件。可能的值：
$success = file_put_contents($file, $data);
// 利用三元條件運算子 條件成立回應$success 失敗則回應'Unable to save the file.'
echo $success ? $file : 'Unable to save the file.';
?>