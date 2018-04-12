<?php 
require_once('../../inc/model.php');

$id_service = $_GET['id'];

// lấy tiêu đề loại tin tức

$condition = "account.id_account = service.id_account AND id_service" . "=" . $id_service;

$data = get_data('tb_service service, tb_account account', $condition)[0];
echo json_encode($data);