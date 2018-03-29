<?php 
    require_once('../../inc/model.php');
    $request = json_decode(file_get_contents("php://input"));

	echo deleteCategoryNews($request->id_category);