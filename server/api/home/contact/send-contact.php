<?php 
    require_once('../../inc/model.php');
    $postdata = file_get_contents("php://input");
    $formData = json_decode($postdata);

    
	date_default_timezone_set("Asia/HO_CHI_MINH");

    echo sendContact($formData->name,
                    $formData->email, 
                    $formData->phone,
                    $formData->address,
                    $formData->title,
                    $formData->content,
                	date("Y-m-d  H:i:s"));