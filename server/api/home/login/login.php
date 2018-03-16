<?php
    require_once('../../inc/model.php');
    $request = json_decode(file_get_contents("php://input"));

    $account = $request->account;
    $passwd = $request->passwd;
    
    // hàm trả về dự liệu nhiều dòng chọn phần tử "0" phần tử đầu tiên
    echo json_encode(check_login($account, $passwd));