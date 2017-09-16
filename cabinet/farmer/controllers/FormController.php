<?php

include_once ROOT. '/cabinet/farmer/models/Form.php';

class FormController{
    //Загрузка страницы формы 1
    public function actionGetForm1($table){
        if($table!=1 and $table!=2){
            SRC::redirect();
            exit();
        }
        $id_user = SRC::validator($_SESSION['id_user']);
        $date["title"] = Form::getForm1Title($table);
        $date["date"] = Form::getForm1Date($id_user, $table);
        $date["table"]= $table;
        SRC::template('farmer', 'panel', 'form'.$table, $date);
        return true;

    }
    public function actionGetForm1m($table){
        if($table!=1 and $table!=2){
            SRC::redirect();
            exit();
        }
        $id_user = SRC::validator($_SESSION['id_user']);
        $result['title'] = Form::getForm1mTitle($table);
        $result["date"] = Form::getForm1Date($id_user, $table);
        $result["table"] = $table;
        SRC::template('farmer', 'panel', 'form_m'.$table, $result);
        return true;
    }
    //сохранение формы 1
    public function actionSaveForm($table){
        if($table!=1 and $table!=2){
            SRC::redirect();
            exit();
        }
        $id_user = $_SESSION['id_user'];
        $title = Form::getForm1Title($table);
        $sql_save="";
        foreach ($title as $item){
            if($item["b"]!=false) {
                $date[$item["b"]]["s2014"] = SRC::validatorPrice($_POST["s2014-" . $item["b"]]);
                $date[$item["b"]]["e2014"] = SRC::validatorPrice($_POST["e2014-" . $item["b"]]);
                $date[$item["b"]]["e2015"] = SRC::validatorPrice($_POST["e2015-" . $item["b"]]);
                $date[$item["b"]]["e2016"] = SRC::validatorPrice($_POST["e2016-" . $item["b"]]);
                if ($date[$item["b"]]["s2014"] == false) $date[$item["b"]]["s2014"] = 0;
                if ($date[$item["b"]]["e2014"] == false) $date[$item["b"]]["e2014"] = 0;
                if ($date[$item["b"]]["e2015"] == false) $date[$item["b"]]["e2015"] = 0;
                if ($date[$item["b"]]["e2016"] == false) $date[$item["b"]]["e2016"] = 0;

                $sql_save = $sql_save . "($id_user, $table, " . $item["b"] . ", " . $date[$item["b"]]["s2014"] . ", " . $date[$item["b"]]["e2014"] . ", " . $date[$item["b"]]["e2015"] . ", " . $date[$item["b"]]["e2016"] . "), ";
            }
        }
        $sql_save=substr($sql_save, 0, -2);
        $result=Form::saveForm1($id_user, $sql_save, $table);
        SRC::addAlert($result, 1, 'Збережено!');
        SRC::redirect();
        return true;
    }

    public function  actionSaveFormm($table){
        if($table!=1 and $table!=2){
            SRC::redirect();
            exit();
        }
        $id_user = $_SESSION['id_user'];
        $title = Form::getForm1Title($table);
        $sql_save="";
        foreach ($title as $item){
            if($item["b"]!=false) {
                $date[$item["b"]]["s2014"] = SRC::validatorPrice($_POST["s2014-" . $item["b"]]);
                $date[$item["b"]]["e2014"] = SRC::validatorPrice($_POST["e2014-" . $item["b"]]);
                $date[$item["b"]]["e2015"] = SRC::validatorPrice($_POST["e2015-" . $item["b"]]);
                $date[$item["b"]]["e2016"] = SRC::validatorPrice($_POST["e2016-" . $item["b"]]);
                if ($date[$item["b"]]["s2014"] == false) $date[$item["b"]]["s2014"] = 0;
                if ($date[$item["b"]]["e2014"] == false) $date[$item["b"]]["e2014"] = 0;
                if ($date[$item["b"]]["e2015"] == false) $date[$item["b"]]["e2015"] = 0;
                if ($date[$item["b"]]["e2016"] == false) $date[$item["b"]]["e2016"] = 0;

                $sql_save = $sql_save . "($id_user, $table, " . $item["b"] . ", " . $date[$item["b"]]["s2014"] . ", " . $date[$item["b"]]["e2014"] . ", " . $date[$item["b"]]["e2015"] . ", " . $date[$item["b"]]["e2016"] . "), ";
            }
        }
        $sql_save=substr($sql_save, 0, -2);
        $result=Form::saveForm1($id_user, $sql_save, $table);
        SRC::addAlert($result, 1, 'Збережено!');
        SRC::redirect();
        return true;
    }
    //Загрузка страницы формы 50
    public function actionGetForm50($year){
        if($year!=2014 and $year!=2015 and $year!=2016)  exit(SRC::redirect());

        $id = $_SESSION['id_user'];
        $date["crop"] = Form::getMyCrop($id);
        $date["form"] = Form::getForm50($id, $year);
        $date["year"]=$year;
        SRC::template('farmer', 'panel', 'form50', $date);

        return true;
    }
    //сохранение формы 50
    public function actionSaveForm50(){
        $year=$_POST["year"];
        $id = $_SESSION['id_user'];
        if($year!=2014 and $year!=2015 and $year!=2016) SRC::redirect();
        $date["crop"] = Form::getMyCrop($id);
        $date["crop"][1][] = array(
            "crop_id"=>0
        );
        for($r=1;$r<=2;$r++){
            foreach ($date["crop"][$r] as  $crop){
                $sql_crop[$crop['crop_id']]="";
                for ($x=1; $x<=7; $x++){
                    $form[$crop['crop_id']."-".$r][$x] = SRC::validatorPrice($_POST['f'.$crop['crop_id']."-".$r."-".$x]);
                    if($form[$crop['crop_id']."-".$r][$x]==false) $form[$crop['crop_id']."-".$r][$x]=0;
                    $sql_crop[$crop['crop_id']."-".$r]= $sql_crop[$crop['crop_id']."-".$r].$form[$crop['crop_id']."-".$r][$x].", ";
                }
                $sql_crop[$crop['crop_id']."-".$r] = substr($sql_crop[$crop['crop_id']."-".$r], 0, -2);
                $sql[$crop['crop_id']."-".$r]= "($id, $year, '".$crop['crop_id']."-".$r."', ".$sql_crop[$crop['crop_id']."-".$r].")";
                $date["sql"]=$date["sql"].$sql[$crop['crop_id']."-".$r].", ";
            }
        }

        $sql_save=substr($date["sql"], 0, -2);
        $result=Form::saveForm50($sql_save, $year);
        SRC::addAlert($result, 1, 'Збережено!');
        SRC::redirect();
        return true;
    }
    public function actionExportForm(){

        SRC::template('farmer', 'panel', 'exportForm');
        return true;
    }
    public function actionSaveExportForm(){
        $id_user=$_SESSION['id_user'];
        $myXMLData = $_FILES['xml']['tmp_name'];

        $xml=simplexml_load_file($myXMLData) or die("Error: Cannot create object");
        $xml_array = (array) $xml->DECLARBODY;

        $year=SRC::validatorPrice($xml->DECLARHEAD->PERIOD_YEAR);
        if($year==2014){$t1='s2014'; $t2='e2014';}
        if($year==2015){$t1='e2014'; $t2='e2015';}
        if($year==2016){$t1='e2015'; $t2='e2016';}



        $title1 = Form::getForm1Title(1);
        foreach ($title1 as $form1) {
            if ($form1['b'] == true) {
                $bd_save[$t1][$form1['b']]=SRC::validatorPrice($xml_array['A'.$form1['b'].'_3']);
                $bd_save[$t2][$form1['b']]=SRC::validatorPrice($xml_array['A'.$form1['b'].'_4']);
            }
        }
        $title2 = Form::getForm1Title(2);
        foreach ($title2 as $form2) {
            if ($form2['b'] == true) {
                $bd_save[$t1][$form2['b']]=SRC::validatorPrice($xml_array['B'.$form2['b'].'_3']);
                $bd_save[$t2][$form2['b']]=SRC::validatorPrice($xml_array['B'.$form2['b'].'_4']);
            }
        }
        $db = Db::getConnection();
        Form::testForm12($db,$id_user,$title1,$title2);





        foreach ($bd_save[$t1] as $key1=>$value1){
            Form::saveFormExport($db,$id_user,$t1, $value1, $key1);
        }
        foreach ($bd_save[$t2] as $key2=>$value2){
            Form::saveFormExport($db,$id_user,$t2, $value2, $key2);
        }
        SRC::redirect();
        return true;
    }
}

