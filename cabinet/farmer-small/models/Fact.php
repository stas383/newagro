<?php
class Fact{
    public static function getFact($id_user){
        $db=Db::getConnection();

        $result = $db->query("SELECT *, aa.id as id_analityca, cc.id as id_culture FROM sm_crop_analityca as aa, sm_crop_head as ch, sm_crop_culture as cc WHERE $id_user = cc.id_user and $id_user = aa.id_user and cc.id_crop = ch.id_crop and aa.id_crop=cc.id ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['crop'] = $result->fetchAll();



        foreach ($date['crop'] as $crop){
            $date['name_crop_ua'][$crop['id_analityca']]=$crop['name_crop_ua'];
            $date['name_crop_en'][$crop['id_analityca']]=$crop['name_crop_en'];
        }

        $result = $db->query("SELECT * FROM sm_fact WHERE user_id = $id_user ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['sm_fact'] = $result->fetchAll();



        $date['stattie_name_ua']=array(
            '',
            'Насіння',
            'Мінеральні добрива',
            'Засоби захисту рослин',
            'Пмм',
            'Послуги',
            'Оплата праці',
            'Орендна плата',
            'Амортизація',
            'Інші витрати'
        );
        $date['stattie_name_en']=array(
            '',
            'Seeds',
            'Mineral fertilizers',
            'Means of plant protection',
            'Oil products',
            'Servants',
            'Labour payment',
            'Rent pay',
            'Amortization',
            'Other costs',
            );


        return $date;
    }
    public static function saveFact($id_user, $crop_id, $stattie_id, $data_fact, $name, $amount, $price_one, $price_total){

        $db=Db::getConnection();
        $db->query("INSERT INTO sm_fact (user_id, crop_id, stattie_id, data_fact, name, amount, price_one, price_total) VALUE ('$id_user','$crop_id','$stattie_id','$data_fact','$name','$amount','$price_one','$price_total')");
        return true;
    }

    public static function editFact($id, $id_user, $crop_id, $stattie_id, $data_fact, $name, $amount, $price_one, $price_total){
        $db = Db::getConnection();
        $db->query("UPDATE sm_fact SET crop_id = '$crop_id', stattie_id = '$stattie_id', data_fact = '$data_fact', name ='$name', amount = '$amount', price_one = '$price_one', price_total = '$price_total' WHERE id = $id ");
        return true;
    }

    public static function editFactRevenues($id, $crop_id, $date, $sales_channel, $amount, $price_total, $price_avr){

        $db = Db::getConnection();

        $db->query("UPDATE sm_fact_revenues SET crop_id = '$crop_id', data_fact = '$date', sales_channel = '$sales_channel', amount = '$amount', price_total = '$price_total', price_avr = '$price_avr' WHERE id = $id");

        return true;
    }


    public static function getFactRevenues($id_user){

        $db = Db::getConnection();

        $result = $db->query("SELECT *, aa.id as id_analityca, cc.id as id_culture FROM sm_crop_analityca as aa, sm_crop_head as ch, sm_crop_culture as cc WHERE $id_user = cc.id_user and $id_user = aa.id_user and cc.id_crop = ch.id_crop and aa.id_crop=cc.id ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['crop'] = $result->fetchAll();

        foreach ($date['crop'] as $crop){
            $date['name_crop_ua'][$crop['id_analityca']]=$crop['name_crop_ua'];
            $date['name_crop_en'][$crop['id_analityca']]=$crop['name_crop_en'];
        }

        $result = $db->query("SELECT * FROM sm_fact_revenues WHERE user_id = $id_user ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['sm_fact_revenues'] = $result->fetchAll();

        $date['sales_channel_ua'] = array(
            1=>'на ринку',
            2=>'посередникам - перекупникам',
            3=>'за іншими каналами'
            );
        $date['sales_channel_en'] = array(
            1=>'At market',
            2=>'Intermediaries and dealers',
            3=>'Other channels',
            );

        return $date;
    }

    public static function saveFactRevenues($id_user, $crop_id, $date, $sales_channel, $amount, $price_total, $price_avr){

        $db = Db::getConnection();
        $db->query("INSERT INTO sm_fact_revenues (user_id, crop_id, data_fact, sales_channel, amount, price_total, price_avr) VALUES('$id_user','$crop_id', '$date', '$sales_channel', '$amount', '$price_total', '$price_avr')");
        return true;
    }

    public static function getFactBudget($id_user){

        $db=Db::getConnection();
        $result = $db->query("SELECT * FROM sm_fact WHERE user_id = $id_user ");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['sm_fact'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM sm_fact_revenues WHERE user_id = $id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['sm_fact_revenues'] = $result->fetchAll();




        $stattie_name=array(
            1=>'seeds',
            2=>'mineral',
            3=>'zzr',
            4=>'pmm',
            5=>'servants',
            6=>'wedding',
            7=>'rent_pay',
            8=>'depreciation',
            9=>'other'
        );
        $ex_date=array();
                foreach ($date['sm_fact_revenues'] as $sm_fact_revenues) {
            $ex_date['revenue'][$sm_fact_revenues['crop_id']] += $sm_fact_revenues['price_total'];
             $ex_date['total']['revenue'] +=$sm_fact['price_total']; 
        }
        foreach ($date['sm_fact'] as $sm_fact){
            $date_elements  = explode("-",$sm_fact['data_fact']);
            $month=$date_elements[1]+0;
            $ex_date[$stattie_name[$sm_fact['stattie_id']]][$sm_fact['crop_id']]+=$sm_fact['price_total'];
            $ex_date['month'][$stattie_name[$sm_fact['stattie_id']]][$month]+=$sm_fact['price_total'];
            $ex_date['total'][$stattie_name[$sm_fact['stattie_id']]]+=$sm_fact['price_total'];
            $ex_date['production_costs'][$sm_fact['crop_id']]+=$sm_fact['price_total'];
            $ex_date['gross_profit'][$sm_fact['crop_id']] = $ex_date['revenue'][$sm_fact['crop_id']] - $ex_date['production_costs'][$sm_fact['crop_id']];
            $ex_date['total']['production_costs'] +=$sm_fact['price_total'];
        }


        return $ex_date;
    }
    public static function getRemains($id_user,$name,$crop_id){
        $db=Db::getConnection();

        $stattie_name=array(
            'seeds'=>'1',
            'mineral'=>'2',
            'zzr'=>'3',
            'pmm'=>'4',
            'servants'=>'5',
            'wedding'=>'6',
            'rent_pay'=>'7',
            'depreciation'=>'8',
            'other'=>'9',
        );
        $stattie_name_ua=array(
            '',
            'Насіння',
            'Мінеральні добрива',
            'Засоби захисту рослин',
            'Пмм',
            'Послуги',
            'Оплата праці',
            'Орендна плата',
            'Амортизація',
            'Інші витрати'
        );
        $stattie_name_en=array(
            '',
            'Seeds',
            'Mineral fertilizers',
            'Means of plant protection',
            'Oil products',
            'Servants',
            'Labour payment',
            'Rent pay',
            'Amortization',
            'Other costs',
            );


        $result = $db->query("SELECT * FROM sm_crop_head ch, sm_crop_culture cc WHERE $id_user = cc.id_user and cc.id_crop = ch.id_crop");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['crop'] = $result->fetchAll();
        foreach ($date['crop'] as $crop){
            $date['name_crops_ua'][$crop['id']]=$crop['name_crop_ua'];
            $date['name_crops_en'][$crop['id']]=$crop['name_crop_en'];
        }

        $stattie_id=$stattie_name[$name];
        $result = $db->query("SELECT * FROM sm_fact WHERE user_id = $id_user AND stattie_id=$stattie_id AND crop_id=$crop_id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['sm_fact'] = $result->fetchAll();

        $date['name_crop_ua']=$date['name_crops_ua'][$crop_id];
        $date['name_crop_en']=$date['name_crops_en'][$crop_id];
        $date['stattie_name_ua']=$stattie_name_ua[$stattie_id];
        $date['stattie_name_en']=$stattie_name_en[$stattie_id];

        return $date;
    }


}