<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 13.09.2017
 * Time: 15:25
 */
class OtherCosts{
    public static function getCosts($id_user){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM new_other_costs WHERE id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        foreach ($date as $date_arr){
            $ex['plan'][$date_arr['costs_type']]=$date_arr;
        }

        $result = $db->query("SELECT * FROM new_other_costs_fact WHERE id_user = '$id_user'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        foreach ($date as $date_arr){
            $ex['fact'][$date_arr['cost_fact_type']][]=$date_arr;
        }

        return $ex;
    }
    public static function savePlanOther($id_user,$costs_plan,$costs_type,$costs_comments){
        $db = Db::getConnection();
        $db->query("DELETE FROM new_other_costs WHERE id_user='$id_user' AND costs_type='$costs_type'");
        $db->query("INSERT INTO new_other_costs (id_user, costs_plan,costs_type,costs_comments) VALUES ('$id_user','$costs_plan','$costs_type','$costs_comments')");
        return true;
    }

    public static function createOtherFact($id_user,$cost_fact_type,$cost_fact,$cost_fact_note,$cost_fact_date){
        $db = Db::getConnection();

        $db->query("INSERT INTO new_other_costs_fact (id_user,cost_fact_type,cost_fact,cost_fact_note,cost_fact_date) VALUES ('$id_user','$cost_fact_type','$cost_fact','$cost_fact_note','$cost_fact_date')");
        return true;
    }

}