<?

/**
* 
*/
class Fact
{
	public static function getCropList(){
		$db = Db::getConnection();
        $id = $_SESSION['id_user'];

        if($_COOKIE['lang']=='ua')$lang='ua';
        if($_COOKIE['lang']=='gb')$lang='en';

        $result = $db->query("SELECT * FROM analytica_date WHERE id_user=$id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['analytica_date'] = $result->fetchAll();

        $result = $db->query("SELECT *, name_crop_$lang as name_crop_ua FROM crop_head WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['Crop-1'] = $result->fetchAll();

        $result = $db->query("SELECT *, name_crop_$lang as name_crop_ua FROM crop_head_veg WHERE NOT status_delete = 1");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['Crop-2'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM crop_analytica WHERE id_user=$id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['crop'] = $result->fetchAll();

        $result = $db->query("SELECT * FROM agri_crop_head WHERE id_user=$id");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['agri_crop_head_sql'] = $result->fetchAll();

        foreach ($date['agri_crop_head_sql'] as $agri_crop_head){
            $date['agri_crop_head'][$agri_crop_head['id_crop']]=array('name'=>$agri_crop_head['name_crop_ua']);
        }

        $result = $db->query("SELECT * FROM field_bd WHERE user_id = '$id'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $date['field'] = $result->fetchAll();
        return $date;
	}
	public static function  saveField($user_id, $name_field,$area_field){
		$db = Db::getConnection();
		$db->query("INSERT INTO field_bd(user_id, name_field, area_field) VALUES ('$user_id','$name_field', '$area_field')");
		return true;
	}
}