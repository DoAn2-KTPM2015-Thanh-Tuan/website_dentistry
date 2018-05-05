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
function insertUser($name, $password, $id_position, $account, $phone, $email, $address, $image_user, $education = '', $status_show, $type_account) {
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
                            education,
                            status_show,
                            type_account) VALUES(
                            :name_account,
                            :pass_account,
                            :id_position,
                            :name_user,
                            :phone_user,
                            :email_user,
                            :address_user,
                            :image_user,
                            :education,
                            :status_show,
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
    $stmt->bindParam(':image_user', $image_user, PDO::PARAM_STR);
    $stmt->bindParam(':education', $education, PDO::PARAM_STR);
    $stmt->bindParam(':status_show', $status_show, PDO::PARAM_INT);
    $stmt->bindParam(':type_account', $type_account, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
}   

// cập nhật thông tin người dùng ( khách hàng)
function update_user($id_account, $name, $phone, $email, $address){
    $db =  Database::db_close();
    $db = Database::connect();

    $query = "UPDATE tb_account
                SET name_user = '$name',
                    phone_user = '$phone',
                    email_user = '$email',
                    address_user = '$address'
                    WHERE id_account = '$id_account'";

                    echo $query;

    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
}

// kiểm tra mật khẩu khi đổi mật khẩu
function check_password_account($id, $password){

    $db =  Database::db_close();
    $db = Database::connect();
    $query = "SELECT id_account 
                FROM tb_account
                WHERE id_account = '$id' AND pass_account = '$password'";

    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;

}

// cập nhật mật khẩu của tài khoản
function update_password_account($id, $password){

    $db =  Database::db_close();
    $db = Database::connect();
    $query = "UPDATE tb_account 
              SET pass_account = '$password'
              WHERE id_account = '$id'";
    $stmt = $db->prepare($query);
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
    
    $query = "SELECT * FROM tb_account WHERE name_account = :name_account && pass_account = :pass_account";
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
// update dữ liệu tin tức
function updateNews($id_news ,$id_category, $id_user,$title, $img, $excerpt_news, $describe_news, $status, $time_news) {
    $db =  Database::db_close();
    $db = Database::connect();
    $query = "UPDATE tb_news 
                SET id_news_category    = '$id_category',
                    id_account          = '$id_user',
                    title_news          = '$title',
                    image_news          = '$img',
                    excerpt_news        = '$excerpt_news',
                    describe_news       = '$describe_news',
                    status              = '$status',
                    time_news           = '$time_news'
                    WHERE id_news = '$id_news'";

    $stmt = $db->prepare($query);
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
// insert dữ liệu dịch vụ
function insertService($id_user,$title, $img, $excerpt_news, $describe_news, $status, $time_news) {
    $db =  Database::db_close();
    $db = Database::connect();
   
    $query = "INSERT INTO tb_service(
                            id_account,
                            title_service,
                            image_service,
                            excerpt_service,
                            describe_service,
                            status,
                            time_service
                            ) VALUES(
                            :id_user,
                            :title,
                            :img,
                            :excerpt_news,
                            :describe_news,
                            :status,
                            :time_news)";
    $stmt = $db->prepare($query); 
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
// update dữ liệu dịch vụ
function updateService($id_service, $id_user,$title, $img, $excerpt_service, $describe_service, $status, $time_service) {
    $db =  Database::db_close();
    $db = Database::connect();
    $query = "UPDATE tb_service 
                SET id_account              = '$id_user',
                    title_service           = '$title',
                    image_service           = '$img',
                    excerpt_service         = '$excerpt_service',
                    describe_service        = '$describe_service',
                    status                  = '$status',
                    time_service               = '$time_service'
                    WHERE id_service = '$id_service'";

    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
} 
// xóa loại dịch vụ
function deleteService($id_service){
    $db =  Database::db_close();
    $db = Database::connect();
   
    $query = "DELETE FROM tb_service
                    WHERE id_service = :id_service";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id_service', $id_service, PDO::PARAM_STR);    
 
    $stmt->execute();
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
}
// update view dịch vụ
function updateViewService($id_service, $current_view){
    $db =  Database::db_close();
    $db = Database::connect();

    $view_service = $current_view + 1;
    $query = "UPDATE tb_service 
                SET view_service = :view_service
                WHERE id_service = :id_service";
    $stmt = $db->prepare($query); 
    $stmt->bindParam(':id_service',  $id_service, PDO::PARAM_INT);
    $stmt->bindParam(':view_service', $view_service, PDO::PARAM_INT); 
    $stmt->execute(); 
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;

}

// xóa loại tin tức
function deleteNews($id_news){
    $db =  Database::db_close();
    $db = Database::connect();
   
    $query = "DELETE FROM tb_news 
                    WHERE id_news = :id_news";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id_news', $id_news, PDO::PARAM_STR);    
 
    $stmt->execute();
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
}

// insert info-website
function infoWebsite($name_website, $link_facebook, $link_youtube, $email, $address, $phone_number, $link_img) {
    $db =  Database::db_close();
    $db = Database::connect();
   
    $query = "SELECT * FROM tb_info WHERE name='name_website'";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id_news', $id_news, PDO::PARAM_STR);
    $stmt->execute();
    $stmt->closeCursor();
    $count = $stmt->rowCount();
    if ( $count == 0 ) {

        // insert name_website
        insertRowInfoWebsite('name_website', $name_website);

        // insert link_facebook
        insertRowInfoWebsite('link_facebook', $link_facebook);

        // insert link_youtube
        insertRowInfoWebsite('link_youtube', $link_youtube);

        // insert email
        insertRowInfoWebsite('email', $email);

        // insert address
        insertRowInfoWebsite('address', $address);

        // insert phone_number
        insertRowInfoWebsite('phone_number', $phone_number);

        // insert link_img
        insertRowInfoWebsite('link_img', $link_img);

    } else {
        // update name_website
        updateRowInfoWebsite('name_website', $name_website);

        // update link_facebook
        updateRowInfoWebsite('link_facebook', $link_facebook);

        // update link_youtube
        updateRowInfoWebsite('link_youtube', $link_youtube);

        // update email
        updateRowInfoWebsite('email', $email);

        // update address
        updateRowInfoWebsite('address', $address);

        // update phone_number
        updateRowInfoWebsite('phone_number', $phone_number);

        // update link_img
        updateRowInfoWebsite('link_img', $link_img);
    }
    
    
}
function insertRowInfoWebsite($name, $value){
    $db =  Database::db_close();
    $db = Database::connect();

    $query = "INSERT INTO tb_info(
                            name,
                            value
                            ) VALUES(
                            :name,
                            :value)";
    $stmt = $db->prepare($query); 
    $stmt->bindParam(':name',  $name, PDO::PARAM_STR);
    $stmt->bindParam(':value', $value, PDO::PARAM_STR); 
    $stmt->execute(); 
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
}

function updateRowInfoWebsite($name, $value){
    $db =  Database::db_close();
    $db = Database::connect();

    $query = "UPDATE tb_info 
                SET value = :value
                WHERE name = :name";
    $stmt = $db->prepare($query); 
    $stmt->bindParam(':name',  $name, PDO::PARAM_STR);
    $stmt->bindParam(':value', $value, PDO::PARAM_STR); 
    $stmt->execute(); 
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;

}

// insert nội dung giới thiệu
function infoIntroduce($text_introduce){
        $db =  Database::db_close();
    $db = Database::connect();
   
    $query = "SELECT * FROM tb_info WHERE name='text_introduce'";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->closeCursor();
    $count = $stmt->rowCount();
    if ( $count == 0 ) {

        // insert text_introduce
        return insertRowInfoWebsite('text_introduce', $text_introduce);

    } else {
        // update text_introduce
        return updateRowInfoWebsite('text_introduce', $text_introduce);
    }

}

// Xóa slider
function deleteSlider(){
    $db =  Database::db_close();
    $db = Database::connect();
   
    $query = "DELETE FROM tb_slider";
    $stmt = $db->prepare($query); 
    $stmt->execute();
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
}

// insert slider
function insertSlider($order, $link_img){
    var_dump($order, $link_img);


    $db =  Database::db_close();
    $db = Database::connect();
   
    $query = "INSERT INTO tb_slider(
                            link_slider,
                            order_num
                            ) VALUES(
                            :link_slider,
                            :order)";
    $stmt = $db->prepare($query); 
    $stmt->bindParam(':link_slider',  $link_img, PDO::PARAM_STR);
    $stmt->bindParam(':order', $order, PDO::PARAM_INT); 
    $stmt->execute(); 
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;

}


// Xóa slider
function deleteAdvertisement(){
    $db =  Database::db_close();
    $db = Database::connect();
   
    $query = "DELETE FROM tb_advertisement";
    $stmt = $db->prepare($query); 
    $stmt->execute();
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
}

// insert hình ảnh quảng cáo
function insertAdvertisement($order, $link_img){

    $db =  Database::db_close();
    $db = Database::connect();
   
    $query = "INSERT INTO tb_advertisement(
                            link_img,
                            order_num
                            ) VALUES(
                            '$link_img',
                            '$order')";
    $stmt = $db->prepare($query); 
/*    $stmt->bindParam(':link_img',  $link_img, PDO::PARAM_STR);
    $stmt->bindParam(':order', $order, PDO::PARAM_INT); */
    $stmt->execute(); 
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;

}

function insertTimeTableDoctor(     $id_doctor,
                                    $st2, $ct2, $tt2,
                                    $st3, $ct3, $tt3,
                                    $st4, $ct4, $tt4,
                                    $st5, $ct5, $tt5,
                                    $st6, $ct6, $tt6,
                                    $st7, $ct7, $tt7) {
    $db =  Database::db_close();
    $db = Database::connect();


     $query = "INSERT INTO tb_timetable(
                            id_account,
                            st2, ct2, tt2,
                            st3, ct3, tt3,
                            st4, ct4, tt4,
                            st5, ct5, tt5,
                            st6, ct6, tt6,
                            st7, ct7, tt7
                            ) VALUES(   
                                    $id_doctor,
                                    $st2, $ct2, $tt2,
                                    $st3, $ct3, $tt3,
                                    $st4, $ct4, $tt4,
                                    $st5, $ct5, $tt5,
                                    $st6, $ct6, $tt6,
                                    $st7, $ct7, $tt7)";
    $stmt = $db->prepare($query); 
    $stmt->execute(); 
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
}

function isChangNumber($bool){
    if ($bool) {
       return 1;
    }
    return 0;
}


// xóa tài khoản
function deleteAccount($id_account){
    $db =  Database::db_close();
    $db = Database::connect();
   
    $query = "DELETE FROM tb_account 
                    WHERE id_account = :id_account";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id_account', $id_account, PDO::PARAM_STR);    
 
    $stmt->execute();
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
}

// insert dữ liệu
function updateAccount($id_account, $name, $id_position, $phone, $email, $address, $image_user, $education = '', $status_show, $type_account) {

    $db =  Database::db_close();
    $db = Database::connect();

    $query = "UPDATE tb_account 
            SET name_user = '$name',
                id_position = '$id_position',
                phone_user = '$phone',
                email_user = '$email',
                address_user = '$address',
                image_user = '$image_user',
                education = '$education',
                status_show = '$status_show',
                type_account =  '$type_account'
            WHERE id_account = '$id_account'";
    $stmt = $db->prepare($query);

    $stmt->execute();

    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
}  

// reset password ( mật khẩu mật định là 11111111 )
function resetAccount($id) {
    $db =  Database::db_close();
    $db = Database::connect();

    $query = "UPDATE tb_account
            SET pass_account = '11111111'
            WHERE id_account = '$id'";

    $stmt = $db->prepare($query);

    $stmt->execute();

    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
} 

// kiểm tra lịch có tồn tại chưa
function checkExistWordkingCalendar($id){
    $db =  Database::db_close();
    $db = Database::connect();

    $query = "SELECT * 
                FROM tb_timetable
                WHERE id_account = '$id'";
    $stmt = $db->prepare($query);

    $stmt->execute();

    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
}
// 
function updateWorkingCalendarDoctor($id_doctor,
                                    $st2, $ct2, $tt2,
                                    $st3, $ct3, $tt3,
                                    $st4, $ct4, $tt4,
                                    $st5, $ct5, $tt5,
                                    $st6, $ct6, $tt6,
                                    $st7, $ct7, $tt7){
    $db =  Database::db_close();
    $db = Database::connect();


     $query = "UPDATE tb_timetable
                SET st2 = '$st2', ct2 = '$ct2', tt2 = '$tt2',
                st3 = '$st3', ct3 = '$ct3', tt3 = '$tt3',
                st4 = '$st4', ct4 = '$ct4', tt4 = '$tt4',
                st5 = '$st5', ct5 = '$ct5', tt5 = '$tt5',
                st6 = '$st6', ct6 = '$ct6', tt6 = '$tt6',
                st7 = '$st7', ct7 = '$ct7', tt7 = '$tt7'
                WHERE id_account = '$id_doctor'";
    $stmt = $db->prepare($query); 
    $stmt->execute(); 
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;

}
function getDoctorRegistration($condition){

    $db =  Database::db_close();
    $db = Database::connect();


     $query = "SELECT id_account
                FROM tb_timetable
                WHERE $condition = '1'";

    $stmt = $db->prepare($query); 
    $stmt->execute(); 
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $result;
   
}

// gửi đăng kí khám
function sendRegistration($name, $email, $phone, $address, $date, $time, $content, $id_doctor){

    $db =  Database::db_close();
    $db = Database::connect();


     $query = "INSERT INTO tb_registration(
                            name_customer,
                            phone_customer,
                            email_customer,
                            address_customer,
                            date_customer,
                            time_customer,
                            content,
                            doctor
                            ) VALUES(   
                            '$name',
                            '$phone',
                            '$email',
                            '$address',
                            '$date',
                            '$time',
                            '$content',
                            $id_doctor)";
                            echo $query;
    $stmt = $db->prepare($query); 
    $stmt->execute(); 
    $result = $stmt->rowCount();
    $stmt->closeCursor();
    return $result;
}
?>