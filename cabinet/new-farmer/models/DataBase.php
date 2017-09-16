<?php
class DataBase{
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
    public static function getTypeEquipment(){
        return array(
            'ua'=>array(
                '1'=>'Борони',
                '9'=>'Бочки',
                '2'=>'Котки',
                '3'=>'Культиватори',
                '4'=>'Обприскувачі',
                '5'=>'Плуги',
                '6'=>'Причіпи',
                '7'=>'Розкидачі добрив',
                '8'=>'Сівалки',
            ),
            'gb'=>array(
                '1'=>'soil cultivation',
                '2'=>'sowing',
                '3'=>'plant protection',
                '4'=>'fertilization',
                '5'=>'harvest',
                '6'=>'transport',
                '7'=>'others',
                '8'=>'others',
                '9'=>'others'
            )
        );
    }
    public static function getEquipmentKind(){
        return array(
                1=>'Sprayer',
                2=>'Field cultivator',
                3=>'Cutters and Shredders',
                4=>'Planters',
                5=>'Plow',
                6=>'Baler',
                7=>'Reaper- binder',
                8=>'Harrow',
                9=>'Disc harrow',
                10=>'Grain cart',
                11=>'Drill',
                12=>'Spreader',
                13=>'Cultivator',
                14=>'Cultipacker',
                15=>'Destoner',
                16=>'Mower',
                17=>'Mixer- wagon',
                18=>'Hay rake',
                19=>'Potato planter',
                20=>'Stone picker',
                21=>'Subsoiler',
                22=>'Tedder',
                23=>'Trailer',
                24=>'Other',
                );
    }

    public static function getTypeFuel(){
        return array(
            'ua'=>array(
                '1'=>'Дизель',
                '2'=>'Бензин',
            ),
            'gb'=>array(
                '1'=>'Diesel',
                '2'=>'Gasoline',
            )
        );
    }

    public static function getKindVeh(){
        return array(
            'ua'=>array(
                '3'=>'Вантажний автомобіль',
                '4'=>'Інша самохідна техніка',
                '2'=>'Комбайн',
                '1'=>'Трактор',
                ),
            'gb'=>array(
                '3'=>'Truck',
                '4'=>'Other self-propelled machinery',
                '2'=>'Combine harvester',
                '1'=>'Tractor',
                ),
            );
    }
    public static function getTypeMaterial(){
        return array(
            'ua'=>array(
                '1'=>'Насіння',
                '2'=>'Добрива',
                '3'=>'ЗЗР',
            ),
            'gb'=>array(
                '1'=>'Seeds',
                '2'=>'Fertilizers',
                '3'=>'PPA',
            )
        );
    }
    public static function getTypePPA(){
        return array(
            'ua'=>array(
                '1'=>'Протруювач',
                '2'=>'Гербіциди',
                '3'=>'Інсектициди',
                '4'=>'Фунгіциди',
                '5'=>'Регулятор росту рослин',
                '6'=>'Десиканти',
            ),
            'gb'=>array(
                '1'=>'Протруювач',
                '2'=>'Гербіциди',
                '3'=>'Інсектициди',
                '4'=>'Фунгіциди',
                '5'=>'Регулятор росту рослин',
                '6'=>'Десиканти',
            )
        );
    }
    public static function getTypeFert(){
        return array(
            'ua'=>array(
                '1'=>'Мінеральні',
                '2'=>'Органічні',
            ),
            'gb'=>array(
                '1'=>'Мінеральні',
                '2'=>'Органічні',
            )
        );
    }
    public static function getFieldUsage(){
        return array(
            'ua'=>array(
                '1'=>'рілля',
                '2'=>'багаторічні насадження',
                '3'=>'сіножаті',
                '4'=>'пасовище',
                '5'=>'ліси',
                '6'=>'ставки та водойми',
            ),
            'gb'=>array(
                '1'=>'рілля',
                '2'=>'багаторічні насадження',
                '3'=>'сіножаті',
                '4'=>'пасовище',
                '5'=>'ліси',
                '6'=>'ставки та водойми',
            )
        );
    }
    public static function getUnit(){
        return array(
                1=>'м³',
                2=>'t',
                3=>'l'
        );
    }

    public static function getCropHead($id_user){
        $db=Db::getConnection();
        $result = $db->query("SELECT * FROM new_lib_crop WHERE id_user = '$id_user' or id_user = 0 ORDER BY name_crop_ua COLLATE  utf8_unicode_ci ASC");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $data = $result->fetchAll();
        return $data;
    }

    public static function getActionLib($id_user){
        $db=Db::getConnection();
        $result = $db->query("SELECT * FROM new_action_lib");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $data = $result->fetchAll();
        return $data;
    }



    public static function saveLib($id_user, $name_ua, $type){
        $db=Db::getConnection();
        $res = $db->query("SELECT action_id FROM new_action_lib WHERE (name_ua = '$name_ua' or name_en='$name_ua') AND type='$type'  AND (id_user='$id_user' or id_user=0)");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res_1 = $res->fetchAll();
        if($res_1[0]['action_id'] == false) {
            $db->query("INSERT INTO new_action_lib (name_ua, name_en, type, id_user) VALUE ('$name_ua','$name_ua','$type','$id_user')");
            $id = $db->lastInsertId();
        }else{
            $id=$res_1[0]['action_id'];
        }
        return $id;
    }

    public static function getCropName($id_user){
        $db=Db::getConnection();
        $result = $db->query("SELECT * FROM new_lib_crop WHERE id_user = '$id_user' or id_user = 0 ORDER BY name_crop_ua ASC");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();

        foreach ($res as  $value) {
           $date[$value['id_crop']] = $value;
        }
        return $date;
    }

    public static function getMaterial($id_user){
        $db=Db::getConnection();
        $result = $db->query("SELECT * FROM new_lib_material WHERE id_user = '$id_user' or id_user = 0");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();

        foreach ($res as  $value) {
            $date[$value['id_material']] = $value;
        }
        return $date;
    }
    public static function saveLibMaterial($id_user,$name_material,$type_material,$key_material=false){
        $db=Db::getConnection();
        $res = $db->query("SELECT * FROM new_lib_material WHERE name_material = '$name_material' AND id_type_material=$type_material  AND (id_user=$id_user or id_user=0)");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res_1 = $res->fetchAll();

        if($res_1[0]['id_material'] == false) {
            $db->query("INSERT INTO new_lib_material (name_material, id_type_material, key_material, id_user) VALUE ('$name_material','$type_material','$key_material','$id_user')");
            $id = $db->lastInsertId();
        }else{
            $id=$res_1[0]['id_material'];
        }
        return $id;
    }
    public static function getCropType(){
        $date=array(
            'ua'=>array(
                2=>'Зернові',
                1=>'Зерно-бобові ',
                3=>'Технічні',
                4=>'Кормові',
                5=>'Овочеві та баштанні',
                6=>'Плодові',
                7=>'Ягодні'
            ),
            'gb'=>array(
                2=>'Зернові ',
                1=>'Зерно-бобові ',
                3=>'Технічні',
                4=>'Кормові',
                5=>'Овочеві та баштанні',
                6=>'Плодові',
                7=>'Ягодні'
            ),
        );
        return $date[SRC::validator($_COOKIE['lang'])];
    }

    public static function getEmployee($id_user){
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM new_employee WHERE id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $employee = $result->fetchAll();

        foreach ($employee as $value){
            $date[$value['id_employee']] = $value;
        }
        return $date;
    }
    public static function getRegion(){
        $date=array(
            'ua'=>array(
                '1'=>'Вінницька область',
                '2'=>'Волинська область',
                '3'=>'Дніпропетровська область',
                '4'=>'Донецька область',
                '5'=>'Житомирська область',
                '6'=>'Закарпатська область',
                '7'=>'Запорізька область',
                '8'=>'Івано-Франківська область',
                '9'=>'Київська область',
                '10'=>'Кіровоградська область',
                '11'=>'Луганська область',
                '12'=>'Львівська область',
                '13'=>'Миколаївська область',
                '14'=>'Одеська область',
                '15'=>'Полтавська область',
                '16'=>'Рівненська область',
                '17'=>'Сумська область',
                '18'=>'Тернопільська область',
                '19'=>'Харківська область',
                '20'=>'Херсонська область',
                '21'=>'Хмельницька область',
                '22'=>'Черкаська область',
                '23'=>'Чернівецька область',
                '24'=>'Чернігівська область',
            ),
            'gb'=>array(
                '1'=>'Вінницька область',
                '2'=>'Волинська область',
                '3'=>'Дніпропетровська область',
                '4'=>'Донецька область',
                '5'=>'Житомирська область',
                '6'=>'Закарпатська область',
                '7'=>'Запорізька область',
                '8'=>'Івано-Франківська область',
                '9'=>'Київська область',
                '10'=>'Кіровоградська область',
                '11'=>'Луганська область',
                '12'=>'Львівська область',
                '13'=>'Миколаївська область',
                '14'=>'Одеська область',
                '15'=>'Полтавська область',
                '16'=>'Рівненська область',
                '17'=>'Сумська область',
                '18'=>'Тернопільська область',
                '19'=>'Харківська область',
                '20'=>'Херсонська область',
                '21'=>'Хмельницька область',
                '22'=>'Черкаська область',
                '23'=>'Чернівецька область',
                '24'=>'Чернігівська область',
            ),
        );
        return $date[SRC::validator($_COOKIE['lang'])];
    }
    public static function getGarphicsName(){
        $date=array(
            'ua'=>array(
                1=>'Зібрана плоша, га',
                2=>'Урожайність з 1 га, ц',
                3=>'Валовий збір, т',
                4=>'Виробнича собівартість, тис. грн',
                5=>'Кількість реалізованої продукції, ц',
                6=>'Повна собівартість продукції, тис.грн.',
                7=>'Чистий дохід (виручка), тис.грн.',
                8=>'Прибуток (збиток), тис.грн.',
            ),
            'gb'=>array(
                1=>'Зібрана плоша, га',
                2=>'Урожайність з 1 га, ц',
                3=>'Валовий збір, т',
                4=>'Виробнича собівартість, тис. грн',
                5=>'Кількість реалізованої продукції, ц',
                6=>'Повна собівартість продукції, тис.грн.',
                7=>'Чистий дохід (виручка), тис.грн.',
                8=>'Прибуток (збиток), тис.грн.',
            ),
        );
        return $date[SRC::validator($_COOKIE['lang'])];
    }

}