<?php 
require_once('../../inc/model.php');

// lấy id tin tức
$id_service = $_GET['id_service'];
$condition = "tb_service.id_account = tb_account.id_account 
			AND id_service = '$id_service'";

$tables = 'tb_service, tb_account';

echo json_encode(get_data($tables, $condition));