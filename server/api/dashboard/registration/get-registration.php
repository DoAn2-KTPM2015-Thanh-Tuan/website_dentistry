<?php 
require_once('../../inc/model.php');

$id_registration = $_GET['id'];

$condition = "id_registration = '$id_registration'";

$tables = 'tb_registration';

echo json_encode(get_data($tables, $condition)[0]);