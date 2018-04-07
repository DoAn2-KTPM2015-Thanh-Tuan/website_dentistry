<?php 
	require_once('../../inc/model.php');

	/* tên webstie */
	$name_website = $_POST['name_website'];

	/* link facebook */
	$link_facebook = $_POST['link_facebook'];

	/* link_youtube */
	$link_youtube = $_POST['link_youtube'];

	/* email */
	$email = $_POST['email'];

	/* address */
	$address = $_POST['address'];

	/* phone_number */
	$phone_number = $_POST['phone_number'];


	// kiểm trả xem cho đúng là file hình hay không. Nếu đúng thì chuyển vào thư mục
	if ( isset($_FILES['logo']) ) {
		// chuyển file ảnh vào folder img
		$img = str_replace(" ","",$_FILES['logo']['name']);
	    $link_img = "assets/img/" . $img;
	    move_uploaded_file( $_FILES['logo']['tmp_name'], "../../../../client/src/assets/img/" . $img);
	} else { /* lấy đường dẫn file ảnh hiện tại trên client */
		$link_img = $_POST['logo'];
	}

	echo infoWebsite($name_website, $link_facebook, $link_youtube, $email, $address, $phone_number, $link_img);



   /* echo insertService($id_user, $title, $link_img, $excerpt_news, $describe_news, $status, $time);*/