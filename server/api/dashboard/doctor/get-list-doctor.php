<?php 
require_once('../../inc/model.php');

$condition = "type_account = '3'";

$tables = 'tb_account';

echo json_encode(get_data($tables, $condition));