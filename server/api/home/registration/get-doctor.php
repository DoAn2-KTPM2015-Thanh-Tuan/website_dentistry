<?php 
	include('../../inc/model.php');

	$condition = $_GET['condition'];

	// lấy id bác sĩ khám
	$id_doctor = getDoctorRegistration($condition) == false ? '0' : getDoctorRegistration($condition)['id_account'];
	echo json_encode($id_doctor);
?>	