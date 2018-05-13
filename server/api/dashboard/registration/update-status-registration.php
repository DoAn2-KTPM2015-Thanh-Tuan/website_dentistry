<?php 
	require_once('../../inc/model.php');

	$id_registration = $_GET['id'];

	echo updateStatusRegistration($id_registration);