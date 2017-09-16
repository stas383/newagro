<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 03.04.2017
 * Time: 12:53
 */
$tillage_type[0]='будь-яка';
$tillage_type[1]='традиційна';
$tillage_type[2]='поверхнева';
$tillage_type[3]='мінімальна';

$material_table[0]='Без матеріалу';
$material_table[1]='Насіння';
$material_table[2]='Добриво';
$material_table[3]='ЗЗР';
foreach ($date['crop_plan'] as $crop_plan)if($crop_plan['id']==$date['id_plan']) $edit_plan=$crop_plan;
?>

<h2 class="sub-header">Технологічна карта</h2>
<form action="/add-crop/save-edit-plan" method="post">
    <input type="hidden" name="id" value="<?php echo $edit_plan['id']?>">
    <label for="select_crop">Культура</label>
    <input type="text" class="form-control" disabled value="<?php foreach ($date['crop_head'] as $crop) {if($crop['id_crop']==$date['id_crop']) echo $crop['name_crop_ua'];}?>">
   <input type="hidden" name="crop_id" value="<?php echo $date['id']?>" required>
<br>
<?php if($date['id_crop']<>0){?>
<div class="table-responsive">
    <table class="table table-striped well">
        <thead class="head-table-center">
            <tr>
                <td>
                    <label for="tillage">Тип обробки</label>
                    <select class="form-control" name="tillage" id="tillage" required>
                        <?php for ($t = 0; $t <= 3; $t++) {?>
                        <option value="<?php echo $t?>" <?php if($t==$edit_plan['tillage']) echo "selected"?> ><?php echo $tillage_type[$t]?></option>
                        <?php }?>
                    </select>
                </td>
                <td>
                    <label for="id_action_type">Тип операції</label>
                    <select class="form-control" name="id_action_type" id="id_action_type" required>
                        <?php foreach ($date['action_type'] as $action_type){?>
                            <option <?php if($action_type['id_action_type']==$edit_plan['action_type']) echo "selected"?>  value="<?php echo $action_type['id_action_type']?>"><?php echo $action_type['name_action_type_ua']?></option>
                        <?php }?>
                    </select>
                </td>
                <td>
                    <label for="action_id">Операція</label>
                    <select class="form-control" name="action_id" id="action_id" required>

                        <?php foreach ($date['action'] as $crop){?>
                            <option <?php if($crop['id_action']==$edit_plan['action_id']) echo "selected"?> class="action_select action_select<?php echo $crop['action_type']?>" value="<?php echo $crop['id_action']?>"><?php echo $crop['name_action_ua']?></option>
                        <?php }?>
                    </select>
                </td>
                <td>
                    <label for="strat_data">Дата початку</label>
                    <input type="date" class="form-control" id="strat_data" name="strat_data" value="<?php echo $edit_plan['strat_data']?>" required>
                </td>
                <td>
                    <label for="end_data">Дата закінчення</label>
                    <input type="date" class="form-control" id="end_data" name="end_data" value="<?php echo $edit_plan['end_data']?>" required>
                </td>
            </tr>
            <?php $x=0; while ($x < 3) { $x++;
                $plan_material[$x]=0;
                foreach ($date['material_plan'] as $material_plan[$x]) if ($material_plan[$x]['id_material_plan'] == $edit_plan['material_id_'.$x]) $plan_material[$x]=$material_plan[$x];
            ?>
            <tr>
                <td colspan="2">
                    <label for="material_select_<?php echo $x?>"><?php echo $x?>. Матеріал</label>
                    <select id="material_select_<?php echo $x?>" class="form-control" name="material_table_<?php echo $x?>" required>
                        <?php for ($m = 0; $m <= 3; $m++) {?>
                            <option value="<?php echo $m?>" <?php if($m==$plan_material[$x]['table_id']) echo "selected"?> ><?php echo $material_table[$m]?></option>
                        <?php }?>
                    </select>
                </td>
                <?php
                $j=0; while ($j < 3) { $j++;
                ?>
                <td>
                    <label for="material_id_y<?php echo $j?>_<?php echo $x?>">Матеріал (<?php echo $j?>) рівень ур.</label>
                    <select class="form-control material_selectyl_<?php echo $x?>" name="material_id_y<?php echo $j?>_<?php echo $x?>" id="material_id_y<?php echo $j?>_<?php echo $x?>">
                            <option value="0">Без матеріалу</option>
                            <!-- выбор семян-->
                        <?php foreach ($date['material_seeds'] as $crop__seeds[$j]){?>
                            <option <?php if($plan_material[$x]['table_id']==1 AND $plan_material[$x]['material_id_y'.$j]==$crop__seeds[$j]['id_material']) echo"selected" ?>   value="<?php echo $crop__seeds[$j]['id_material']?>" class="seeds_<?php echo $x?>"><?php echo $crop__seeds[$j]['name_material_ua']?></option>
                        <?php }?>
                             <!-- выбор удобрений-->
                        <?php foreach ($date['material_fertilizers'] as $crop__fertilizers[$j]) if($crop__fertilizers[$j]['yield_level']==$j){?>
                            <option <?php if($plan_material[$x]['table_id']==2 AND $plan_material[$x]['material_id_y'.$j]==$crop__fertilizers[$j]['id_material']) echo"selected" ?> value="<?php echo $crop__fertilizers[$j]['id_material']?>" class="fertilizers_<?php echo $x?>"><?php echo $crop__fertilizers[$j]['name_material_ua']?></option>
                        <?php }?>
                            <!-- выбор ззр-->
                        <?php
                        if($j==1 or $j==2) $j_ppa=2; else $j_ppa=1;
                        foreach ($date['material_ppa'] as $crop_ppa[$j]) if($crop_ppa[$j]['yield_level']==$j_ppa){?>
                            <option <?php if($plan_material[$x]['table_id']==3 AND $plan_material[$x]['material_id_y'.$j]==$crop_ppa[$j]['id_material']) echo"selected" ?> value="<?php echo $crop_ppa[$j]['id_material']?>" class="ppa_<?php echo $x?>"><?php echo $crop_ppa[$j]['name_material_ua']?></option>
                        <?php }?>
                    </select>
                </td>
                <?php }?>
            </tr>
            <?php }?>
            <tr>
                <td colspan="6">
                    <button type="submit" class="btn btn-primary">Зберегти</button>
                </td>
            </tr>
        </thead>
    </table>
</div>
</form>
<?php }?>
<script type="text/javascript" src="<?php SRC::getSrc();?>/cabinet/add-crop/template/js/CropPlan.js"></script>
<div id="truy" class="alertInfo alert alert-success " style="display: none"></div>