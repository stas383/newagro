<?php
class DataBase{
    //TEMPLATE///
    public static function getTemplateBD(){
        $date=array(
            'ua'=>array(
                1=>'',
                2=>'',
                3=>'',
            ),
            'gb'=>array(
                1=>'',
                2=>'',
                3=>'',
            ),
        );
        return $date[SRC::validator($_COOKIE['lang'])];
    }
    ///END//

    public static function getUnits(){
        return array(
            'ua'=>array(
                '1'=>'га',
                '2'=>'т',
            ),
            'gb'=>array(
                '1'=>'ha',
                '2'=>'tonns',
            )
        );
    }
    public static function getPosition(){
        return array(
            'ua'=>array(
                '1'=>'фермер',
                '2'=>'власник',
                '3'=>'директор',
                '4'=>'агроном',
                '5'=>'інженер',
                '6'=>'економіст',
                '7'=>'бухгалтер',
                '8'=>'комірник',
                '9'=>'обліковець',

            ),
            'gb'=>array(
                '1'=>'farmer',
                '2'=>'owner',
                '3'=>'director',
                '4'=>'agronomist',
                '5'=>'engineer',
                '6'=>'economist',
                '7'=>'accountant',
                '8'=>'storekeeper',
                '9'=>'checker',
            )
        );
    }
    public static function getAccess(){
        return array(
            'ua'=>array(
                '1'=>'1a',
                '2'=>'2a',
            ),
            'gb'=>array(
                '1'=>'1a',
                '2'=>'2a',
            )
        );
    }
    public static function getZone(){
        $date=array(
            'ua'=>array(
                1=>'Лісостеп',
                2=>'Полісся',
                3=>'Степ',
            ),
        );

        return $date[SRC::validator($_COOKIE['lang'])];
    }
    public static function getTypeLand(){
        $date=array(
            'ua'=>array(
                1=>'Багаторічні насадження',
                2=>'Пасовища',
                3=>'Перелогові землі',
                4=>'Рілля',
                5=>'Сінокіс'
            ),
        );

        return $date[SRC::validator($_COOKIE['lang'])];
    }
    public static function getTypeSoil(){
        $date=array(
            'ua'=>array(
                1=>'Світло-сірий опідзолений',
                2=>'Сірий опідзолений',
                3=>'Темно-сірий опідзолений',
                4=>'Чорнозем реградований',
                5=>'Чорнозем типовий',
                6=>'Чорноземи опідзолені'
            ),
        );
        return $date[SRC::validator($_COOKIE['lang'])];
    }

    public static function getCropType(){
        $date=array(
            'ua'=>array(
                1=>'Зерно-бобові ',
                2=>'Зернові ',
                3=>'Технічні',
                4=>'Кормові',
                5=>'Овочеві та баштанні',
                6=>'Плодові',
                7=>'Ягодні'
            ),
            'gb'=>array(
                1=>'Зерно-бобові ',
                2=>'Зернові ',
                3=>'Технічні',
                4=>'Кормові',
                5=>'Овочеві та баштанні',
                6=>'Плодові',
                7=>'Ягодні'
            ),
        );
        return $date[SRC::validator($_COOKIE['lang'])];
    }
    public static function getCrop(){
        $db=Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $result=$db->query("SELECT * FROM b_lib_crop WHERE id_user=0 OR id_user=$id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $arr_crop=$result->fetchAll();
        foreach ($arr_crop as $crop){
            $date[$crop['id_crop']]=$crop['name_crop_ua'];
        }
        return $date;
    }


    ///MATERIAL///
    public static function getTypeMaterial(){
        $date=array(
            'ua'=>array(
                1=>'Насіння',
                2=>'Добрива',
                3=>'ЗЗР',
            ),
            'gb'=>array(
                1=>'Seeds',
                2=>'Mineral fertilizers',
                3=>'PPA',
            ),
        );
        return $date[SRC::validator($_COOKIE['lang'])];
    }
    public static function getFertKey(){
        $date=array(
            'ua'=>array(
                1=>'Мінеральні',
                2=>'Органічні',
            ),
            'gb'=>array(
                1=>'Мінеральні',
                2=>'Органічні',
            ),
        );
        return $date[SRC::validator($_COOKIE['lang'])];
    }
    public static function getPpaKey(){
        $date=array(
            'ua'=>array(
                1=>'Протруйник',
                2=>'Гербіциди',
                3=>'Інсектициди',
                4=>'Фунгіциди',
                5=>'Регулятор росту рослин',
                6=>'Десиканти'
            ),
            'gb'=>array(
                1=>'Протруйник',
                2=>'Гербіциди',
                3=>'Інсектициди',
                4=>'Фунгіциди',
                5=>'Регулятор росту рослин',
                6=>'Десиканти'
            ),
        );
        return $date[SRC::validator($_COOKIE['lang'])];
    }
    public static function getMaterial(){
        $db=Db::getConnection();
        $id_user=$_SESSION['id_user'];
        $result=$db->query("SELECT * FROM b_lib_material WHERE id_user=0 OR id_user=$id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $arr=$result->fetchAll();
        foreach ($arr as $value){
            $date[$value['id_material']]=$value;
        }
        return $date;
    }
    ///END-MATERIAL///
}
