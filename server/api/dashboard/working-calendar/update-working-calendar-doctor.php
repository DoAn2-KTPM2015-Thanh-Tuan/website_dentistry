<?php 
    require_once('../../inc/model.php');
    $postdata = file_get_contents("php://input");
    $formData = json_decode($postdata);
    
    $id_doctor = $formData->id;
    print_r($formData);
    $st2 = isChangNumber($formData->formData->sang_hai);
    $ct2 = isChangNumber($formData->formData->chieu_hai);
    $tt2 = isChangNumber($formData->formData->toi_hai);

    $st3 = isChangNumber($formData->formData->sang_ba);
    $ct3 = isChangNumber($formData->formData->chieu_ba);
    $tt3 = isChangNumber($formData->formData->toi_ba);


    $st4 = isChangNumber($formData->formData->sang_tu);
    $ct4 = isChangNumber($formData->formData->chieu_tu);
    $tt4 = isChangNumber($formData->formData->toi_tu);

    $st5 = isChangNumber($formData->formData->sang_nam);
    $ct5 = isChangNumber($formData->formData->chieu_nam);
    $tt5 = isChangNumber($formData->formData->toi_nam);

    $st6 = isChangNumber($formData->formData->sang_sau);
    $ct6 = isChangNumber($formData->formData->chieu_sau);
    $tt6 = isChangNumber($formData->formData->toi_sau);

    $st7 = isChangNumber($formData->formData->sang_bay);
    $ct7 = isChangNumber($formData->formData->chieu_bay);
    $tt7 = isChangNumber($formData->formData->toi_bay);

   	echo updateWorkingCalendarDoctor($id_doctor,
                                    $st2, $ct2, $tt2,
                                    $st3, $ct3, $tt3,
                                    $st4, $ct4, $tt4,
                                    $st5, $ct5, $tt5,
                                    $st6, $ct6, $tt6,
                                    $st7, $ct7, $tt7);
							   	

