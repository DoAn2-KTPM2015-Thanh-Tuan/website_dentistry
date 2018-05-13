<?php 
	require_once('../../inc/model.php');


	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$content = $_POST['content'];
	$id_doctor = $_POST['id_doctor'];
	$status = $_POST['status'];
	date_default_timezone_set("Asia/HO_CHI_MINH");
	
	echo sendRegistration($name, $email, $phone, $address, $date, $time, $content, $id_doctor, $status, date("Y-m-d  H:i:s"));