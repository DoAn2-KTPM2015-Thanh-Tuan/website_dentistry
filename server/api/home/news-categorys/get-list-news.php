<?php 
require_once('../../inc/model.php');

$id_category = $_GET['id'];

// lấy tiêu đề loại tin tức
$condition = "id_category" . "=" . $id_category;
$title = get_data('tb_news_category', $condition)[0]['name_category'];

$children = array();
$condition = "tb_account.id_account = tb_news.id_account AND id_news_category" . "=" . $id_category . " AND status = 1";
foreach (get_data('tb_news, tb_account', $condition) as $row) {
	$children[] = $row;
}
$data = array(
	'id' => $id_category,
	'title' => $title,
	'children_news' => $children
);
echo json_encode($data);
