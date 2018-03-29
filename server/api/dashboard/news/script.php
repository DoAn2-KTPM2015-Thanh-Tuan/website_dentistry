<?php 

	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: X-Requested-With');
	header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
	
	var_dump($_POST);
	var_dump($_FILES);