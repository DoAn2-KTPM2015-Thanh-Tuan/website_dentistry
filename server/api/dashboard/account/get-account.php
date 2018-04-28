<?php 
require_once('../../inc/model.php');

$id_account = $_GET['id'];
$tables = 'tb_position, tb_account';

$condition = "tb_account.id_position  = tb_position.id_position && tb_account.id_account = '$id_account'";

echo json_encode(get_data($tables, $condition));