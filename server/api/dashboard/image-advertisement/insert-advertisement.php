<?php 
require_once('../../inc/model.php');

deleteAdvertisement();

foreach ($_POST as $key => $value) {
	echo insertAdvertisement($key, $value);
}

foreach ($_FILES as $key => $value) {
	
	$file = $value;
	
	// chuyển file ảnh vào folder img
	$img = str_replace(" ","",$file['name']);
    $link_img = "assets/img/" . $img;
    move_uploaded_file($file['tmp_name'], "../../../../client/src/assets/img/" . $img);

    echo insertAdvertisement($key, $link_img);
}
