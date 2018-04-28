<?php
	require_once('../../inc/model.php');

	$id_account = $_GET['id'];

	echo resetAccount($id_account);