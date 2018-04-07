<?php 
require_once('../../inc/model.php');

// lấy id tin tức
$id_news = $_GET['id_news'];
$condition = "tb_news.id_account = tb_account.id_account 
			AND tb_news.id_news_category = tb_news_category.id_category 
			AND id_news = '$id_news'";

$tables = 'tb_news, tb_news_category, tb_account';

echo json_encode(get_data($tables, $condition));