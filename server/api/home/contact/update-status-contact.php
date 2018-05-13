<?php 
	require_once('../../inc/model.php');

	$id_contact = $_GET['id'];

	echo updateStatusContact($id_contact);