<?php 
    require_once('../../inc/model.php');
    $postdata = file_get_contents("php://input");
    $formData = json_decode($postdata);

    echo update_user($formData->id,
                $formData->formData->name, 
                $formData->formData->phone,
                $formData->formData->email,
                $formData->formData->address);