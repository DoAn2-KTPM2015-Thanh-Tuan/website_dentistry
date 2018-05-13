<?php 
	include('../../inc/model.php');

	$tables = "tb_registration, tb_account";
	$condition = "tb_account.id_account = tb_registration.doctor AND tb_registration.status = '0'";

	$data = get_data($tables, $condition);

	echo json_encode($data);
