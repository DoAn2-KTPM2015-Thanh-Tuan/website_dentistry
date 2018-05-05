<?php 

	require_once('../../inc/model.php');

	// lấy id_doctor
	$id_doctor = $_GET['id'];

	// kiểm tra xem lịch của bác sĩ nãy đã có chưa
	
	$isExist = checkExistWordkingCalendar($id_doctor);

	// nếu bằng 0 thì insert dữ liệu
	if ( $isExist == '0' ) {
		

		insertTimeTableDoctor($id_doctor, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
	}

	$table = 'tb_timetable';
	$condition = "id_account = '$id_doctor'";

	echo json_encode(get_data($table, $condition)[0]);
