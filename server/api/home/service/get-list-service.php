<?php 
require_once('../../inc/model.php');

$tables = 'tb_service, tb_account';
$conditions = "tb_service.id_account = tb_account.id_account AND status = '1'";
echo json_encode(get_data($tables, $conditions));