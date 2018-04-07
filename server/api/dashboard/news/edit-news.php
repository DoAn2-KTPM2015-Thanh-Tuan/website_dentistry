<?php 
	require_once('../../inc/model.php');

	// id tin tức
	$id_news = $_POST['id_news'];

	// tiêu đề
	$title = $_POST['title'];

	// mô tả ngắn
	$excerpt_news = $_POST['excerpt_news'];

	// mô tả chi tiết
	$describe_news = $_POST['describe_news'];

	// id loại tin tức
	$category = $_POST['category'];

	// trạng thái tin tức 
	$status = $_POST['status'];

	// id người đăng bài
	$id_user =  $_POST['idUser'];

	// set thời gian ở việt nam
	date_default_timezone_set("Asia/HO_CHI_MINH");
	// lấy thời gian hiện tại
	$time = date("Y-m-d");

	// kiểm trả xem cho đúng là file hình hay không. Nếu đúng thì chuyển vào thư mục
	if ( isset($_FILES['file']) ) {
		// chuyển file ảnh vào folder img
		$img = str_replace(" ","",$_FILES['file']['name']);
	    $link_img = "assets/img/" . $img;
	    move_uploaded_file( $_FILES['file']['tmp_name'], "../../../../client/src/assets/img/" . $img);
	} else { /* lấy đường dẫn file ảnh hiện tại trên client */
		$link_img = $_POST['file'];
	}

		
	// hàm update (file: inc/model.php)
    echo updateNews($id_news, $category, $id_user, $title, $link_img, $excerpt_news, $describe_news, $status, $time);