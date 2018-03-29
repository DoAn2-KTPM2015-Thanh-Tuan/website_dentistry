<?php 
    require_once('../../inc/model.php');
    $request = json_decode(file_get_contents("php://input"));
 
	if (checkCategoryNews(trim($request->nameCategory)) >= 1) {
		echo 0;
	} else {
		echo insertCategoryNews(trim($request->nameCategory));
	}