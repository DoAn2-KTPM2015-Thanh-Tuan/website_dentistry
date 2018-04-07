<?php 
require_once('../../inc/model.php');

$condition = 'tb_service.id_account = tb_account.id_account';

$tables = 'tb_service, tb_account';

echo json_encode(get_data($tables, $condition));