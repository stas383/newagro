<?php

foreach ($date['plan'] as $crop_plan){
    if($crop_plan['id']==$date['id_crop']){
        $edit_plan=$crop_plan;}}
?>
<div class="box-body">
<h2 class="sub-header"><?=$language['farmer-small']['3']?></h2>

<form action="/farmer-small/save-edit-plan" method="post">
    <input type="hidden" name="id_planu" value="<?php echo $date['id_crop']?>">
    <? //var_dump($edit_plan);?>
    <label for="select_crop"><?=$language['farmer-small']['24']?></label>
    <input type="text" class="form-control" disabled value="<?php foreach ($date['crop_head'] as $crop) {if($crop['id']== $date['id_plan']) if($_COOKIE['lang']=="ua"){echo $crop['name_crop_ua'];}elseif ($_COOKIE['']=="gb") {
        echo $crop['name_crop_en'];
    }}?>">
    <input type="hidden" name="crop_id" value="<?php echo $date['id_plan']?>" required>
    <input type="hidden" name="id_materials" value="<?php echo $crop_plan['id_materials']?>" required>
    <input type="hidden" name="id_action" value="<?php echo $crop_plan['id_action']?>" required>
    <input type="hidden" name="id_action_type" value="<?php echo $crop_plan['id_action_type']?>" required>
    <br>
    <?php if($date['id_crop']<>0){?>
    <div class="table-responsive">
        <table class="table table-striped well">
            <thead class="head-table-center">
            <tr>
                <th colspan="6"></th>
                <td colspan="2" class="text-center">
                    <label for="payment_for_all_area"><?=$language['farmer-small']['80']?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="action_id"><?=$language['farmer-small']['81']?></label><br><br>
                    <input name="name_ua1" list="id1" class="form-control" value="<?=$date['lib'][$crop_plan['id_action_type']]['name_ua']?>">
                    <datalist id="id1">
                        <option value="<?=$date['lib'][$crop_plan['id_action_type']]['name_ua']?>"></option>
                    </datalist>
                </td>
                <td>
                    <label for="action_id"><?=$language['farmer-small']['82']?></label><br><br>

                    <input name="name_ua2" list="id2" class="form-control" value="<?=$date['lib'][$crop_plan['id_action']]['name_ua']?>">
                    <datalist id="id2">
                            <option value="<?=$date['lib'][$crop_plan['id_action']]['name_ua']?>"></option>
                    </datalist>
                </td>
                <td>
                    <label for="strat_data"><?=$language['farmer-small']['83']?></label><br><br>
                    <input type="date" class="form-control" id="strat_data" name="start_date" value="<?=$crop_plan['start_date']?>" required>
                </td>
                <td>
                    <label for="end_data"><?=$language['farmer-small']['84']?></label><br><br>
                    <input type="date" class="form-control" id="end_data" name="end_date"  value="<?=$crop_plan['end_date']?>" required>
                </td>
                <td>
                <label for="unit"><?=$language['farmer-small']['85']?></label><br><br>
                    <input class="form-control" type="text" name="unit" value="<?=$date['lib'][$crop_plan['unit']]['name_ua']?>">
                </td>
                <td>
                    <label for="payment_for_all_area"><?=$language['farmer-small']['86']?></label><br><br>
                    <input type="text" class="form-control" id="payment_for_all_area" name="payment_for_all_area" required value="<?=$crop_plan['payment_for_all_area']?>">
                </td>
                <td class="text-center">
                    <label for="payment_for_all_area_own" ><?=$language['farmer-small']['87']?> </label><br><br>
                    <input type="text" class="form-control" id="payment_for_all_area_own" name="payment_for_all_area_own" value="<?=$crop_plan['payment_for_all_area_own']?>" required>
                </td>
                <td class="text-center">
                    <label for="payment_for_all_area_rent"><?=$language['farmer-small']['88']?></label><br><br>
                    <input type="text" class="form-control" id="payment_for_all_area_rent" name="payment_for_all_area_rent" value="<?=$crop_plan['payment_for_all_area_rent']?>" required>
                </td>
                <td>
                    <label for="payment_for_all_other"><?=$language['farmer-small']['89']?></label>
                    <input type="text" class="form-control" id="payment_for_all_area" name="payment_for_all_other" value="<?=$crop_plan['payment_for_all_other']?>" required>
                </td>
            </tr>
            <?
            $id_material = explode(',', $crop_plan['id_materials']);
              foreach ($id_material as $id_mat){
                  if($id_mat !=0){
                foreach ( $date[$id_mat] as $material){ $i=0; $i++; ?>
                <tr>
                    <td colspan="2">
                        <label for="material_select_<?php echo $i?>"> <?=$language['farmer-small']['90']?></label>
                        <input  class="form-control" type="text" list="12" name="material<?=$id_mat?>" value="<?=$material['name_material']?>">
                        <datalist id="12">
                            <?php foreach ($date['lib'] as $action_type)if($action_type['type'] == 4){?>
                                <option value="<?php echo $action_type['name_ua']?>" selected></option>
                            <?php }?>
                        </datalist>
                    </td>
                        <td colspan="2">
                            <label ><?=$language['farmer-small']['91']?></label>
                            <input type="text" class="form-control" id="material_name_" name="material_name<?=$id_mat?>" value="<?=$material['name']?>" >
                            <input type="hidden" value="<?=$id_mat?>">
                        </td>
                        <td colspan="4">
                            <label ><?=$language['farmer-small']['92']?></label>
                            <input type="text" class="form-control" id="material_name_" name="material_norm<?=$id_mat?>" value="<?=$material['norm']?>">
                        </td>
                        <td colspan="2">
                            <label><?=$language['farmer-small']['93']?></label>
                            <input type="text" class="form-control" id="material_name_" name="material_price<?=$id_mat?>" value="<?=$material['price']?>">
                        </td>
                    <input type="hidden" value="<? echo $id_mat;?>" id="id_mat" name="id_mat">
                </tr>
            <?php }?>
            <?php }?>
            <?php }?>
            <?php $x=0; while ($x < 6) { $x++; ?>
                <tr class="asd" id="add_material_<?php echo $x?>">
                    <td colspan="2">
                        <label for="material_select_<?php echo $x?>"><?=$language['farmer-small']['93']?></label>
                        <select class="form-control" name="material_<?php echo $x?>" id="material_<?php echo $x?>" >
                            <?php foreach ($date['lib'] as $action_type)if($action_type['type'] == 4){?>
                                <option value="<?php echo $action_type['id_action']?>" ><?php if($_COOKIE['lang']=='ua'){echo $action_type['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $action_type['name_en'];}?></option>
                            <?php }?>
                        </select>
                    </td>
                    <td colspan="2">
                        <label for="material_name"><?=$language['farmer-small']['94']?></label>
                        <input type="text" class="form-control" id="material_name" name="material_name_<?=$x?>" >
                    </td>
                    <td colspan="4">
                        <label for="material_name"><?=$language['farmer-small']['95']?></label>
                        <input type="text" class="form-control" id="material_name" name="material_norm_<?=$x?>" >
                    </td>
                    <td colspan="2">
                        <label for="material_name"<?=$language['farmer-small']['96']?></label>
                        <input type="text" class="form-control" id="material_name" name="material_price_<?=$x?>">
                    </td>
                </tr>
            <?php }?>
            <input type="hidden" value="" id="material_count" name="material_count">
            <tr>
                <td colspan="6">
                    <button type="button" class="btn btn-primary" id="show_material" data-show="1"><span class="glyphicon glyphicon-plus"></span> <?=$language['farmer-small']['97']?></button>
                    <button type="submit" class="btn btn-success"><?=$language['farmer-small']['52']?></button>
                </td>
            </tr>
            </thead>
        </table>
    </div>
</form>
<?php }?>
<div id="truy" class="alertInfo alert alert-success " style="display: none"></div>
</div>
<script>
    $(document).ready(function (){
        $(".asd").hide();
        //Добавление строки материалов
        $('#show_material').click(show_material);
        function show_material() {
            var material_show = $(this).attr('data-show');
            $('#add_material_'+material_show).show(200);
            $('#material_count').val(material_show);
            material_show++;
            $(this).attr({'data-show':material_show});
            if(material_show==7){
                $(this).hide(200);
            }
        }
    });
</script>