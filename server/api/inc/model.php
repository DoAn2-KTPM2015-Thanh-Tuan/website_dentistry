<?php 
require_once('myconnect.php');

// lấy tất cả dự liệu
function get_all($table) {
	$db =  Database::db_close();
    $db = Database::connect();

    $query = "SELECT * FROM $table";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $result;
}
// lấy dữ liệu với điều kiện
function get_data($table, $condition) {
	$db =  Database::db_close();
    $db = Database::connect();
    
    $query = "SELECT * FROM $table WHERE $condition";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $result;
}

// insert dữ liệu
function insertUser($name, $password, $id_position, $account, $phone, $email, $address, $image_user, $type_account) {
	$db =  Database::db_close();
    $db = Database::connect();
    // kiểm tra tài khoản có tồn tại hay không
    if(check_exist_account($account) >= 1) {
        return 'existed account';
    }
    $query = "INSERT INTO tb_account(name_account,
                            pass_account,
                            id_position,
                            name_user,
                            phone_user,
                            email_user,
                            address_user,
                            image_user,
                            type_account) VALUES(
                            :name_account,
                            :pass_account,
                            :id_position,
                            :name_user,
                            :phone_user,
                            :email_user,
                            :address_user,
                            :image_user,
                            :type_account
                            )";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':name_account', $account, PDO::PARAM_STR);    
    $stmt->bindParam(':pass_account', $password, PDO::PARAM_STR);
    $stmt->bindParam(':id_position', $id_position, PDO::PARAM_INT);
    $stmt->bindParam(':name_user', $name, PDO::PARAM_STR);
    $stmt->bindParam(':phone_user', $phone, PDO::PARAM_INT);
    $stmt->bindParam(':email_user', $email, PDO::PARAM_STR);
    $stmt->bindParam(':address_user', $address, PDO::PARAM_STR);
    $stmt->bindParam(':image_user',  $image_user, PDO::PARAM_STR);
    $stmt->bindParam(':type_account', $type_account, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
}   
// echo insertUser('tuankg1028', '123123123', null, 'tuan', '0127', 'asdas', '1028ntt', null, 0);
function check_exist_account($name_account){
    $db =  Database::db_close();
    $db = Database::connect();
    
$query = "SELECT * FROM tb_account WHERE name_account = :name_account";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':name_account', $name_account, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
}
?>