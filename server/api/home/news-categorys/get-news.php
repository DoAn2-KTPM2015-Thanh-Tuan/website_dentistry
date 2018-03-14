<?php 
require_once('../../inc/model.php');

$id_news = $_GET['id'];

// lấy tiêu đề loại tin tức

$condition = "account.id_account = news.id_account AND news.id_news_category = category.id_category AND id_news" . "=" . $id_news;

$data = get_data('tb_news news, tb_account account, tb_news_category category', $condition)[0];
echo json_encode($data);