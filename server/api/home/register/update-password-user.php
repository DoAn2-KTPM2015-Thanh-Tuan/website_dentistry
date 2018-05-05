<?php 
    require_once('../../inc/model.php');
    $postdata = file_get_contents("php://input");
    $formData = json_decode($postdata);

    echo update_password_account($formData->id, $formData->password);