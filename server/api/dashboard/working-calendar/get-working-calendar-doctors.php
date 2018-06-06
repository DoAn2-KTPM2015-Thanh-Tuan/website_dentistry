<?php 

	require_once('../../inc/model.php');


	$table = 'tb_account, tb_timetable';
	$condition = 'tb_account.id_account = tb_timetable.id_account && tb_account.type_account = 3';
	echo json_encode(get_data($table, $condition));
