<?php 
	require_once('../../inc/model.php');


	$request = json_decode(file_get_contents("php://input"));
	/* textIntroduce */
	$text_introduce = $request->textIntroduce;


	echo infoIntroduce($text_introduce);
