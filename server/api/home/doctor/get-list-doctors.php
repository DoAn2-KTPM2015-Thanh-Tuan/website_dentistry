<?php
    require_once('../../inc/model.php');

    $table = "tb_account, tb_position";
    $condition = "tb_account.id_position = tb_position.id_position AND 
    			tb_account.type_account = '3' AND tb_account.status_show = '1'";
   
    echo json_encode(get_data($table, $condition));