<?php 
	require_once('../../inc/model.php');


	$title = $_POST['title'];
	$excerpt_news = $_POST['excerpt_news'];
	$describe_news = $_POST['describe_news'];
	$status = $_POST['status'];


	$id_user =  $_POST['idUser'];;
	date_default_timezone_set("Asia/HO_CHI_MINH");
	$time = date("Y-m-d H:i:s");

	$file = $_FILES['file'];
	
	// chuyển file ảnh vào folder img
	$file = "";
	$img = str_replace(" ","",$_FILES['file']['name']);
    $link_img = "assets/img/" . $img;
    move_uploaded_file( $_FILES['file']['tmp_name'], "../../../../client/src/assets/img/" . $img);

    echo insertService($id_user, $title, $link_img, $excerpt_news, $describe_news, $status, $time);