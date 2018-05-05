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


	
	echo sendRegistration($name, $email, $phone, $address, $date, $time, $content, $id_doctor);