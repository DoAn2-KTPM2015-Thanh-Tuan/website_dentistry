<?php 
    require_once('../../inc/model.php');
    
    $data = get_all('tb_contact');

    echo json_encode($data);