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
?>
<h2 class="sub-header">Технологічна карта</h2>
<form action="/add-crop/create-plan" method="post">
    <label for="select_crop">Культура</label>
<select onchange="window.location.href=this.options[this.selectedIndex].value" class="form-control sub-header" id="select_crop" required>
    <?php if($date['id']==0){?><option selected value="0">Виберіть культуру</option><?php }?>
    <?php foreach ($date['crop_head'] as $crop){?>
        <option <?php if($crop['id_crop']==$date['id']) echo "selected"?> value="<?php SRC::getSrc();?>/add-crop/list-plan/<?php echo $crop['id_crop']?>" ><?php echo $crop['name_crop_ua']?></option>
    <?php }?>
</select>
   <input type="hidden" name="crop_id" value="<?php echo $date['id']?>" required>
<br>
<?php if($date['id']<>0){?>
<div class="table-responsive">
    <table class="table table-striped well">
        <thead class="head-table-center">
            <tr>
                <td>
                    <label for="tillage">Тип обробки</label>
                    <select class="form-control" name="tillage" id="tillage" required>
                        <option value="0">будь-яка</option>
                        <option value="1">традиційна</option>
                        <option value="2">поверхнева</option>
                        <option value="3">мінімальна</option>
                    </select>
                </td>
                <td>
                    <label for="id_action_type">Тип операції</label>
                    <select class="form-control" name="id_action_type" id="id_action_type" required>
                        <?php foreach ($date['action_type'] as $action_type){?>
                            <option value="<?php echo $action_type['id_action_type']?>"><?php echo $action_type['name_action_type_ua']?></option>
                        <?php }?>
                    </select>
                </td>
                <td>
                    <label for="action_id">Операція</label>
                    <select class="form-control" name="action_id" id="action_id" required>

                        <?php foreach ($date['action'] as $crop){?>
                            <option class="action_select action_select<?php echo $crop['action_type']?>" value="<?php echo $crop['id_action']?>"><?php echo $crop['name_action_ua']?></option>
                        <?php }?>
                    </select>
                </td>
                <td>
                    <label for="strat_data">Дата початку</label>
                    <input type="date" class="form-control" id="strat_data" name="strat_data" required>
                </td>
                <td>
                    <label for="end_data">Дата закінчення</label>
                    <input type="date" class="form-control" id="end_data" name="end_data" required>
                </td>
            </tr>
            <?php $x=0; while ($x < 3) { $x++; ?>
            <tr id="add_material_<?php echo $x?>">
                <td colspan="2">
                    <label for="material_select_<?php echo $x?>"><?php echo $x?>. Матеріал</label>
                    <select id="material_select_<?php echo $x?>" class="form-control" name="material_table_<?php echo $x?>" required>
                        <option value="0">Без матеріалу</option>
                        <option value="1">Насіння</option>
                        <option value="2">Добрива</option>
                        <option value="3">ЗЗР</option>
                    </select>
                </td>
                <?php $j=0; while ($j < 3) { $j++; ?>
                <td>
                    <label for="material_id_y<?php echo $j?>_<?php echo $x?>">Матеріал (<?php echo $j?>) рівень ур.</label>
                    <select class="form-control material_selectyl_<?php echo $x?>" name="material_id_y<?php echo $j?>_<?php echo $x?>" id="material_id_y<?php echo $j?>_<?php echo $x?>">
                            <option value="0">Без матеріалу</option>
                        <?php foreach ($date['material_seeds'] as $crop_seeds[$j]){?>
                            <option value="<?php echo $crop_seeds[$j]['id_material']?>" class="seeds_<?php echo $x?>"><?php echo $crop_seeds[$j]['name_material_ua']?></option>
                        <?php } foreach ($date['material_fertilizers'] as $crop_fertilizers[$j]) if($crop_fertilizers[$j]['yield_level']==$j){?>
                            <option value="<?php echo $crop_fertilizers[$j]['id_material']?>" class="fertilizers_<?php echo $x?>"><?php echo $crop_fertilizers[$j]['name_material_ua']?></option>
                        <?php }
                        if($j==1 or $j==2) $j_ppa=2; else $j_ppa=1;
                        foreach ($date['material_ppa'] as $crop_ppa[$j]) if($crop_ppa[$j]['yield_level']==$j_ppa){?>
                            <option value="<?php echo $crop_ppa[$j]['id_material']?>" class="ppa_<?php echo $x?>"><?php echo $crop_ppa[$j]['name_material_ua']?></option>
                        <?php }?>
                    </select>
                </td>
                <?php }?>
            </tr>
            <?php }?>
            <tr>
                <td colspan="6">
                    <button type="button" class="btn btn-primary" id="show_material" data-show="1"><span class="glyphicon glyphicon-plus"></span> Додати матеріал</button>
                    <button type="submit" class="btn btn-success">Додати</button>
                </td>
            </tr>
        </thead>
    </table>
</div>
</form>
<div class="table-responsive">
    <table class="table table-striped well">
        <thead class="head-table-center">
        </thead>
            <tr>
                <th>#</th>
                <th>#</th>
                <th>Тип обробки</th>
                <th>Операція</th>
                <th>Основна/допоміжна</th>
                <th>Матеріал</th>
                <th>Дата початку</th>
                <th>Дата закінчення</th>
                <th></th>
            </tr>
        <tbody>
        <?php
        foreach ($date['crop_plan'] as $crop_plan){?>
            <tr>
                <td><?php echo $crop_plan['id'];?></td>
                <td><input data-id="<?php echo $crop_plan['id'];?>" class="form-control NumberOrder" style="width: 50px;" type="text" value="<?php echo $crop_plan['number_order'];?>"></td>
                <td><?php echo $tillage_type[$crop_plan['tillage']];?></td>
                <td><?php echo $crop_plan['name_action_ua'];?></td>
                <td>
                     <select data-id="<?php echo $crop_plan['id'];?>" class="form-control ParentOper" style="max-width:200px; ">
                         <option value="0">Основна</option>
                         <?php foreach ($date['crop_plan'] as $crop_plan_parent){?>
                         <option value="<?php echo $crop_plan_parent['id'];?>" <?php if($crop_plan['parent_id']==$crop_plan_parent['id']) echo "selected"?> >#<?php echo $crop_plan_parent['id'];?>. <?php echo $crop_plan_parent['name_action_ua'];?></option>
                         <?php }?>
                     </select>
                </td>
                <td>
                     <?php
                     for ($p = 1; $p <= 3; $p++) {
                         foreach ($date['material_plan'] as $material_plan[$p]) if ($material_plan[$p]['id_material_plan'] == $crop_plan['material_id_'.$p]) {
                             if ($material_plan[$p]['table_id'] == 1) $material_table = "material_seeds";
                             if ($material_plan[$p]['table_id'] == 2) $material_table = "material_fertilizers";
                             if ($material_plan[$p]['table_id'] == 3) $material_table = "material_ppa";
                             for ($m = 1; $m <= 3; $m++) {
                                 foreach ($date[$material_table] as $material[$p]) if ($material_plan[$p]['material_id_y' . $m] == $material[$p]['id_material']) {
                                     echo $material[$p]['name_material_ua'];
                                     if($m != 3) echo ', ';
                                 }
                             }  echo '<br>';
                         }
                     }
                     ?>
                </td>
                <td><?php echo $crop_plan['strat_data'];?></td>
                <td><?php echo $crop_plan['end_data'];?></td>
                <td>
                     <div class="btn-group">
                         <a href="/add-crop/edit-plan/<?php echo $crop_plan['crop_id'].'/'.$crop_plan['id']?>" class="btn btn-warning btn-sm" ><span class="glyphicon glyphicon-pencil"></span></a>
                         <a href="/add-crop/remove-one-plan/<?php echo $crop_plan['id']?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
                     </div>
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>
<?php }?>
<script type="text/javascript" src="<?php SRC::getSrc();?>/cabinet/add-crop/template/js/CropPlan.js"></script>
<div id="truy" class="alertInfo alert alert-success " style="display: none"></div>