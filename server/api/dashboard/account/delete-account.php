<?php 
    require_once('../../inc/model.php');
    
    $id = $_GET['id'];

	echo deleteAccount($id);