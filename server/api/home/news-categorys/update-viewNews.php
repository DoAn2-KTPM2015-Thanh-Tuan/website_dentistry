<?php 
require_once('../../inc/model.php');

$id_news = $_GET['id'];

// lấy tiêu đề loại tin tức

$condition = "id_news" . "=" . $id_news;

$data = get_data('tb_news', $condition)[0];


$current_view = $data['view_news'];

echo updateViewNews($id_news, $current_view);


/*echo json_encode($data);*/