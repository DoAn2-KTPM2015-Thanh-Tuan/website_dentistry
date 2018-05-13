<?php 
	require_once('../../inc/model.php');

	$tables = "tb_contact";
	$condition = "status = '0'";

	$data = get_data($tables, $condition);

	echo json_encode($data);

