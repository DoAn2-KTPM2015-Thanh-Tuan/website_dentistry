<?php 
    require_once('../../inc/model.php');
    $postdata = file_get_contents("php://input");
    $formData = json_decode($postdata);

    // gán position nếu rỗng
    if(!isset($formData->id_position)){
        $formData->id_position = null;
    }

    // gán type_acount nếu rỗng (4 : người dùng thấp nhất)
    if(!isset($formData->type_acount)){
        $formData->type_account = 4;
    }
    // gán image_user nếu rỗng
    if(!isset($formData->image_user)){
        $formData->image_user = null;
    }

    echo insertUser($formData->name, 
                $formData->password, 
                $formData->id_position,
                $formData->account,
                $formData->phone,
                $formData->email,
                $formData->address,
                $formData->image_user,
                '',
                0,
                $formData->type_account);