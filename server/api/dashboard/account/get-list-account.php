<?php 
require_once('../../inc/model.php');

$condition = 'tb_account.id_position  = tb_position.id_position';

$tables = 'tb_position, tb_account';

echo json_encode(get_data($tables, $condition));