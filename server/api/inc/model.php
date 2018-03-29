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
function get_data($tables, $condition) {
    $db =  Database::db_close();
    $db = Database::connect();
    
    $query = "SELECT * FROM $tables WHERE $condition";
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

// kiểm tra tài khoản có tồn tại không (khi tạo tài khoản)
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

// kiểm tra đăng nhập
function check_login($name_account, $password){
    $db =  Database::db_close();
    $db = Database::connect();
    
    $query = "SELECT * FROM tb_account WHERE name_account = :name_account && pass_account = :pass_account ";
    $stmt = $db->prepare($query);
    
    $stmt->bindParam(':name_account', $name_account, PDO::PARAM_STR);
    $stmt->bindParam(':pass_account', $password, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $result;
}


// insert dữ liệu tin tức
function insertNews($category, $id_user,$title, $img, $excerpt_news, $describe_news, $status, $time_news) {
    $db =  Database::db_close();
    $db = Database::connect();
   
    $query = "INSERT INTO tb_news(id_news_category,
                            id_account,
                            title_news,
                            image_news,
                            excerpt_news,
                            describe_news,
                            status,
                            time_news
                            ) VALUES(
                            :id_category,
                            :id_user,
                            :title,
                            :img,
                            :excerpt_news,
                            :describe_news,
                            :status,
                            :time_news)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id_category', $category, PDO::PARAM_INT);    
    $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':img', $img, PDO::PARAM_STR);
    $stmt->bindParam(':excerpt_news', $excerpt_news, PDO::PARAM_STR);
    $stmt->bindParam(':describe_news', $describe_news, PDO::PARAM_STR);
    $stmt->bindParam(':status', $status, PDO::PARAM_INT);
    $stmt->bindParam(':time_news',  $time_news);
    $stmt->execute();
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
    } 
    // kiểm tra loại tin tức
    function checkCategoryNews($name_category){
        $db =  Database::db_close();
        $db = Database::connect();
        
        $query = "SELECT * FROM tb_news_category WHERE name_category = :name_category";
        $stmt = $db->prepare($query);
        
        $stmt->bindParam(':name_category', $name_category, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $result;
    } 
    // insert loại tin tức
    function insertCategoryNews($name_category){
        $db =  Database::db_close();
        $db = Database::connect();
       
        $query = "INSERT INTO tb_news_category(
                                name_category
                                ) VALUES(
                                :name_category)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':name_category', $name_category, PDO::PARAM_STR);    
     
        $stmt->execute();
        $result = $stmt->rowCount();
        $stmt->closeCursor();
        return $result;
    }
    // xóa loại tin tức
    function deleteCategoryNews($id_category){
        $db =  Database::db_close();
        $db = Database::connect();
       
        $query = "DELETE FROM tb_news_category 
                        WHERE id_category = :id_category";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id_category', $id_category, PDO::PARAM_STR);    
     
        $stmt->execute();
        $result = $stmt->rowCount();
        $stmt->closeCursor();
        return $result;
    }

    // chỉnh sửa loại tin tức
    function updateCategoryNews($id_category, $name_category){
        $db = Database::db_close();
        $db = Database::connect();
       
        $query = "UPDATE tb_news_category SET name_category = :name_category
                        WHERE id_category = :id_category";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id_category', $id_category, PDO::PARAM_INT);   
        $stmt->bindParam(':name_category', $name_category, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->rowCount();
        $stmt->closeCursor();
        return $result;
    }
?>