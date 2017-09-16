<?php
class Analysis{
    //загрузка данных формы 1,2
    public static function getForm(){
        $db = Db::getConnection();
        $id_user=$_SESSION['bank_user_id'];
        $result = $db->query("SELECT *  FROM form1_date WHERE id_user=$id_user");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date = $result->fetchAll();
        foreach ($date as $ex){
            $ex_date[$ex["b"]]["s14"]=$ex["s2014"];
            $ex_date[$ex["b"]]["e14"]=$ex["e2014"];
            $ex_date[$ex["b"]]["e15"]=$ex["e2015"];
            $ex_date[$ex["b"]]["e16"]=$ex["e2016"];
            if ($ex["s2014"]==0) $ex_date[$ex["b"]]["s14"]=false;
            if ($ex["e2014"]==0) $ex_date[$ex["b"]]["e14"]=false;
            if ($ex["e2015"]==0) $ex_date[$ex["b"]]["e15"]=false;
            if ($ex["e2016"]==0) $ex_date[$ex["b"]]["e16"]=false;
        }
        return $ex_date;
    }
}