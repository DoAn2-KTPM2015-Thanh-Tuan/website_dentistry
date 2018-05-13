<?php 
	require_once('../../inc/model.php');
    
    $id_contact = $_GET['id'];

    echo json_encode(getContact($id_contact));