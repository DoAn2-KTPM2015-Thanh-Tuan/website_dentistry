<?php 
// require_once('../../inc/myconnect.php');
require_once('../../inc/model.php');

// lấy loại các loại tin tức
$data = array();

// lấy ra tin tức thuộc từng loại
foreach (get_all("tb_news_category") as $row) {
    $children = array();
    $condition = "id_news_category"."=".$row['id_category']  . " AND status = '1'";
    foreach(get_data("tb_news", $condition) as $row_news){
        $children[] = $row_news;
    }
    $category = array(
        'id' => $row['id_category'],
        'name' => $row['name_category'],
        'children_first_news' => array_shift($children),
        'children_news' => $children
    );
    
    $data[] = $category;

}
echo json_encode($data);
