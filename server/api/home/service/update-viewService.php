<?php 
require_once('../../inc/model.php');

$id_service = $_GET['id'];

// lấy tiêu đề loại tin tức

$condition = "id_service" . "=" . $id_service;

$data = get_data('tb_service', $condition)[0];


$current_view = $data['view_service'];

echo updateViewService($id_service, $current_view);


/*echo json_encode($data);*/