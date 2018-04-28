<?php 
    require_once('../../inc/model.php');


    /* kiểm tra có hình ảnh không */
    if ( isset($_FILES['file']) ) {
        // chuyển file ảnh vào folder img
        $img = str_replace(" ","",$_FILES['file']['name']);
        $link_img = "assets/img/" . $img;
        move_uploaded_file( $_FILES['file']['tmp_name'], "../../../../client/src/assets/img/" . $img);
    }
     else {
         $link_img = '';
    }



    /* kiểm tra vị trí*/
    if ( isset($_POST['position']) ) {
        $position = $_POST['position'];
    } else {
        $position = 0;
    }

    /* kiểm tra học vấn */
    if ( isset($_POST['education']) ) {
        $education = $_POST['education'];
    } else {
        $education = '';
    }

    /* kiểm tra hiển thị user ra ngoài trang chủ ( chỉ đối với bác sĩ ) */
    if ( isset($_POST['status_show']) ) {
        $status_show = $_POST['status_show'];
    } else {
        $status_show = 0;
    }

    echo insertUser($_POST['name'],
                $_POST['password'],
                $position,
                $_POST['account'],
                $_POST['phone'],
                $_POST['email'],
                $_POST['address'],
                $link_img,
                $education,
                $status_show,
                $_POST['type_account']);


    