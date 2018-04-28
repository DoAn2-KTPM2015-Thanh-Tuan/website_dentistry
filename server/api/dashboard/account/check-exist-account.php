<?php 
	require_once('../../inc/model.php');
	$name_account = $_GET['name'];
    echo check_exist_account($name_account);
?>