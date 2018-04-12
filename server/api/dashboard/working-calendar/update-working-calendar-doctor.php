<?php 
    require_once('../../inc/model.php');
    $postdata = file_get_contents("php://input");
    $formData = json_decode($postdata);

   	echo updateWorkingCalendarDoctor(isChangNumber($formData->sang_hai) , isChangNumber($formData->chieu_hai),
   								isChangNumber($formData->sang_ba) , isChangNumber($formData->chieu_ba),
   								isChangNumber($formData->sang_tu) , isChangNumber($formData->chieu_tu),
   								isChangNumber($formData->sang_nam) , isChangNumber($formData->chieu_nam),
							   	isChangNumber($formData->sang_sau) , isChangNumber($formData->chieu_sau),
							   	isChangNumber($formData->sang_bay) , isChangNumber($formData->chieu_bay));
							   	

