<?php
/*
 * Created by PhpStorm.
 * User: Ivan
 * Date: 06.04.2017
 * Time: 10:14
 */

$editEquipment=$date['one']['OneEquipment']['0'];
?>
<div class="row">
    <div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
        <h3 class="page-header">Редагувати пару техніки</h3>
        <form action="/add-crop/edit-save-equipment" method="post" class="btn-center">
            <input type="hidden" name="id_equipment" value="<?php echo $editEquipment['id_equipment'] ?>">
            <div class="form-group">
                <label for="action_id">Операція</label>
                <select class="form-control" name="action_id" id="action_id" required>
                    <?php
                    foreach ($date['list']['action'] as $listAction){?>
                        <option <?php if($editEquipment['action_id']==$listAction['id_action']) echo "selected"?>  value="<?php echo $listAction['id_action'];?>"><?php echo $listAction['name_action_ua'];?></option>
                    <?php }?>
                </select>
            </div>
            <div class="row ">
                <div class="col-sm-6">
                    <div id="working" class="form-group has-warning" >
                        <label class="control-label" for="name_working">Марка трактора</label>
                        <?php
                        foreach ($date['list']['working'] as $oneWorking) if($oneWorking['id_working']==$editEquipment['working_eqt_id']) $WorkingName = $oneWorking['name_working_ua'];
                        foreach ($date['list']['power'] as $onePower) if($onePower['id_power']==$editEquipment['power_eqt_id']) $PowerName = $onePower['name_power_ua'];
                        ?>
                        <input value="<?php echo $WorkingName?>." type="text" name="working_name" id="working_name" list="name_working_list" class="form-control" maxlength="50" autocomplete="off" placeholder="Введіть марку трактора">
                        <datalist id="name_working_list">
                            <?php foreach ($date['list']['working'] as $listWorking){?>
                            <option data-id="<?php echo $listWorking['id_working'];?>" value="<?php echo $listWorking['name_working_ua'];?>">
                                <?php }?>
                        </datalist>
                    </div>
                </div>
                <input type="hidden" id="working_eqt_id" name="working_eqt_id" value="<?php echo $editEquipment['working_eqt_id']?>">
                <div class="col-sm-6">
                    <div id="power" class="form-group has-warning">
                        <label class="control-label" for="power_name">Марка с/г машини</label>
                        <input value="<?php echo $PowerName?>." type="text" name="power_name" id="power_name" list="name_power_list" class="form-control" maxlength="50" autocomplete="off" placeholder="Введіть марку с/г машини">
                        <datalist id="name_power_list">
                            <?php foreach ($date['list']['power'] as $listPower){?>
                            <option data-id="<?php echo $listPower['id_power'];?>" value="<?php echo $listPower['name_power_ua'];?>">
                                <?php }?>
                        </datalist>
                    </div>
                </div>
                <input type="hidden" id="power_eqt_id" name="power_eqt_id" value="<?php echo $editEquipment['power_eqt_id']?>">
            </div>
            <div class="form-group">
                <label for="fuel_type_id">Вид пального</label>
                <select class="form-control" name="fuel_type_id" id="fuel_type_id" required>
                    <?php
                    foreach ($date['list']['fuel'] as $listFuelKey){?>
                        <option <?php if($editEquipment['fuel_type_id']==$listFuelKey['id_fuel']) echo "selected"?> value="<?php echo $listFuelKey['id_fuel'];?>"><?php echo $listFuelKey['name_fuel_ua'];?></option>
                    <?php }?>
                </select>
            </div>
            <hr class="col-sm-12">
            <div class="row ">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="productivity_9">Продуктивність</label>
                        <input value="<?php echo $editEquipment['productivity_9'] ?>" name="productivity_9" type="text" class="form-control" id="productivity_9" placeholder="Середня продуктивність" maxlength="5" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="fuel_cons_9">Витрати пального</label>
                        <input value="<?php echo $editEquipment['fuel_cons_9'] ?>" name="fuel_cons_9" type="text" class="form-control" id="fuel_cons_9" placeholder="Середні витрати пального" maxlength="5" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required>
                    </div>
                </div>
                <?php $x=0;
                while ($x < 8) {
                    $x++;
                    ?>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input value="<?php echo $editEquipment['productivity_'.$x] ?>" name="productivity_<?php echo $x;?>" type="text" class="form-control" id="productivity_9" placeholder="Продуктивність на <?php echo $x;?> группу полей" maxlength="5" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input value="<?php echo $editEquipment['fuel_cons_'.$x] ?>" name="fuel_cons_<?php echo $x;?>" type="text" class="form-control" id="fuel_cons_9" placeholder="Витрати пального на <?php echo $x;?> группу полей" maxlength="5" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}">
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>
    </div>
</div>