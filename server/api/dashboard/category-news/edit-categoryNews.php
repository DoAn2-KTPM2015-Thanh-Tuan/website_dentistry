<?php 
    require_once('../../inc/model.php');
    $request = json_decode(file_get_contents("php://input"));

	echo updateCategoryNews($request->id_category, trim($request->name_category));