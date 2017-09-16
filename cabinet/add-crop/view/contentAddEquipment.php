<?php
/*
 * Created by PhpStorm.
 * User: Ivan
 * Date: 29.03.2017
 * Time: 12:05
 */
?>
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
            <h3 class="page-header">Додати пару техніки</h3>
            <form action="/add-crop/crate-equipment" method="post" class="btn-center">
                <div class="form-group">
                    <label for="action_id">Операція</label>
                    <select class="form-control" name="action_id" id="action_id" required>
                        <?php
                        foreach ($date['action'] as $listAction){?>
                            <option value="<?php echo $listAction['id_action'];?>"><?php echo $listAction['name_action_ua'];?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="row ">
                    <div class="col-sm-6">
                        <div id="working" class="form-group has-warning" >
                            <label class="control-label" for="name_working">Марка трактора</label>
                            <input type="text" name="working_name" id="working_name" list="name_working_list" class="form-control" maxlength="50" autocomplete="off" placeholder="Введіть марку трактора">
                            <datalist id="name_working_list">
                                <?php foreach ($date['working'] as $listWorking){?>
                                    <option data-id="<?php echo $listWorking['id_working'];?>" value="<?php echo $listWorking['name_working_ua'];?>">
                                <?php }?>
                            </datalist>
                        </div>
                    </div>
                    <input type="hidden" id="working_eqt_id" name="working_eqt_id" value="add">
                    <div class="col-sm-6">
                        <div id="power" class="form-group has-warning">
                            <label class="control-label" for="power_name">Марка с/г машини</label>
                            <input type="text" name="power_name" id="power_name" list="name_power_list" class="form-control" maxlength="50" autocomplete="off" placeholder="Введіть марку с/г машини">
                            <datalist id="name_power_list">
                                <?php foreach ($date['power'] as $listPower){?>
                                    <option data-id="<?php echo $listPower['id_power'];?>" value="<?php echo $listPower['name_power_ua'];?>">
                                <?php }?>
                            </datalist>
                        </div>
                    </div>
                    <input type="hidden" id="power_eqt_id" name="power_eqt_id" value="add">
                </div>
                <div class="form-group">
                    <label for="fuel_type_id">Вид пального</label>
                    <select class="form-control" name="fuel_type_id" id="fuel_type_id" required>
                        <?php
                        foreach ($date['fuel'] as $listFuelKey){?>
                            <option value="<?php echo $listFuelKey['id_fuel'];?>"><?php echo $listFuelKey['name_fuel_ua'];?></option>
                        <?php }?>
                    </select>
                </div>
                <hr class="col-sm-12">
                <div class="row ">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="productivity_9">Продуктивність</label>
                            <input name="productivity_9" type="text" class="form-control" id="productivity_9" placeholder="Середня продуктивність" maxlength="5" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="fuel_cons_9">Витрати пального</label>
                            <input name="fuel_cons_9" type="text" class="form-control" id="fuel_cons_9" placeholder="Середні витрати пального" maxlength="5" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required>
                        </div>
                    </div>
                    <?php $x=0;
                    while ($x < 8) {
                        $x++;
                        ?>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input name="productivity_<?php echo $x;?>" type="text" class="form-control classEdit" id="productivity_<?php echo $x;?>" placeholder="Продуктивність на <?php echo $x;?> группу полей" maxlength="5" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input name="fuel_cons_<?php echo $x;?>" type="text" class="form-control classEdit" id="fuel_cons_<?php echo $x;?>" placeholder="Витрати пального на <?php echo $x;?> группу полей" maxlength="5" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}">
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <button type="submit" class="btn btn-primary">Додати</button>
            </form>
        </div>
    </div>
<script>
    $(document).ready(function() {

        for (i = 1; i < 9; i++) {
            $('#productivity_'+i+', #fuel_cons_'+i).change(edit);
        }
        function edit() {
            prod=0;
            fuel=0;
            for (var i=1; i<9; i++) {
                prod+=parseFloat($('#productivity_'+i).val());
                fuel+=parseFloat($('#fuel_cons_'+i).val());

            };
            prod=prod/8;
            fuel=fuel/8;
            if(isNaN(prod)){
                $('#productivity_9').val(prod);
            }
            if(isNaN(fuel)){
                $('#fuel_cons_9').val(fuel);
            }



        };
    });
</script>