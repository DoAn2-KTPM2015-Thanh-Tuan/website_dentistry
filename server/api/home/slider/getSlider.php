<?php 
include('../../inc/myconnect.php');
include('../../inc/model.php');

$data = array();

$data = get_all("tb_slider");

echo json_encode($data);
?>