<?php

include_once ROOT. '/cabinet/farmer/models/Business.php';

class BusinessController{
    //
    public function actionEditLease(){
        $value=SRC::validatorPrice($_POST['value']);
        Business::editLease($value);


        return true;
    }
    //Бизнесс план, загрузка культур
    public function actionAddPlan(){
        $date = Business::getMyCropList();
        SRC::template('farmer', 'panel', 'businessPlan2', $date);
        return true;
    }

    //
    public function actionAddCropList(){

        $optionsRadios = SRC::validator($_POST['optionsRadios']);
        $optionsRadios = preg_split("/[,-]+/", $optionsRadios);
        if($optionsRadios[0]=='v'){
            $crop_id=$optionsRadios[1];
            $type=3;
            $tillage=1;
        }
        if($optionsRadios[0]=='s'){
            $crop=preg_split("/[,-]+/", SRC::validator($_POST['crop_id']));
            $crop_id=$crop[0];
            $type=$crop[1];
            $tillage=$optionsRadios[1];
        }
        $area=SRC::validator($_POST['area']);
        Business::addListCrop($crop_id,$area,$tillage,$type);
        SRC::redirect();

        return true;
    }
    //Изменение пользовательского списка культур
    public function actionAddMyListCrop(){
        $crop_list = Business::getMyCropList();
        $user_id= $_SESSION['id_user'];
        $sql='';
        $sqlRemove='';
        foreach ($crop_list['Crop-1'] as $Crop1) {
            foreach ($crop_list['My-crop-1'] as $myCrop) if ($Crop1['id_crop'] == $myCrop['crop_id']) {
                if (empty($_POST['crop-1-' . $Crop1['id_crop']])) $sqlRemove = $sqlRemove . ' or crop_id=' . $Crop1['id_crop'];
                $trueCrop[$Crop1['id_crop']]=true;
            }
            if (isset($_POST['crop-1-' . $Crop1['id_crop']]) and empty($trueCrop[$Crop1['id_crop']])) $sql = $sql . '(' . $user_id . ',' . $Crop1['id_crop'] . ', 1), ';
        }
        $sql = substr($sql, 0, -2);
        $sqlRemove = substr($sqlRemove, 4);
        $sql2='';
        $sqlRemove2='';
        foreach ($crop_list['Crop-2'] as $Crop12) {
            foreach ($crop_list['My-crop-2'] as $myCrop2) if ($Crop12['id_crop'] == $myCrop2['crop_id']) {
                if (empty($_POST['crop-2-' . $Crop12['id_crop']])) $sqlRemove2 = $sqlRemove2 . ' or crop_id=' . $Crop12['id_crop'];
                $trueCrop2[$Crop12['id_crop']]=true;
            }
            if (isset($_POST['crop-2-' . $Crop12['id_crop']]) and empty($trueCrop2[$Crop12['id_crop']])) $sql2 = $sql2 . '(' . $user_id . ',' . $Crop12['id_crop'] . ', 2), ';
        }
        $sql2 = substr($sql2, 0, -2);
        $sqlRemove2 = substr($sqlRemove2, 4);

        $sql3='';
        $sqlRemove3='';
        foreach ($crop_list['agri_crop_head_sql'] as $Crop13) {
            foreach ($crop_list['My-crop-3'] as $myCrop3) if ($Crop13['id_crop'] == $myCrop3['crop_id']) {
                if (empty($_POST['crop-3-' . $Crop13['id_crop']])) $sqlRemove3 = $sqlRemove3 . ' or crop_id=' . $Crop13['id_crop'];
                $trueCrop3[$Crop13['id_crop']]=true;
            }
            if (isset($_POST['crop-3-' . $Crop13['id_crop']]) and empty($trueCrop3[$Crop13['id_crop']])) $sql3 = $sql3 . '(' . $user_id . ',' . $Crop13['id_crop'] . ', 3), ';
        }
        $sql3 = substr($sql3, 0, -2);
        $sqlRemove3 = substr($sqlRemove3, 4);

        $result = Business:: addMyCropList($sql, $sqlRemove, $sql2, $sqlRemove2, $sql3, $sqlRemove3);
        SRC::addAlert($result, 1, 'Успішно додано!');
        SRC::redirect();
        return true;
    }
    //Изменение параметров культур
    public function actionSaveCropList(){
        $user_id= $_SESSION['id_user'];
        $id = SRC::validator($_POST['id']);
        $type = SRC::validator($_POST['type']);
        $value = SRC::validatorPrice($_POST['value']);
        Business:: saveCropList($id, $type, $value, $user_id);
        echo 'Збережено!';
        return true;
    }
}

