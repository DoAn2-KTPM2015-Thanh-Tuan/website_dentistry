<?php 
require_once('../../inc/model.php');

$condition = 'tb_news.id_account = tb_account.id_account 
			AND tb_news.id_news_category = tb_news_category.id_category';

$tables = 'tb_news, tb_news_category, tb_account';

echo json_encode(get_data($tables, $condition));