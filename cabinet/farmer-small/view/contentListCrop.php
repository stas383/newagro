
<head>
    <style>
        table,tr, th, td{
            font-family: 'Open Sans', sans-serif;
            font-weight: 600;
        }
        input, select {
            border-radius: 2px;
            border: 1px solid #999;
            font-style: italic;
            color: #aa1111;
        }
        .inpt{
            height:23px;
            border:1px solid #999;
            background:#fff;
            width: 100%;
        }
    </style>
</head>
<div class="box-body">
<h2 class="sub-header">Технологічна карта</h2>
<form action="/farmer-small/save-action" method="post">
    <label for="select_crop">Культура</label>
    <select onchange="window.location.href = this.options[this.selectedIndex].value" class="form-control sub-header" id="select_crop" required>
        <?php if($date['id']==0){?><option selected value="0">Виберіть культуру</option><?php }?>
        <?php foreach ($date['crop']['crop'] as $crop){?>
            <option <?php if($crop['id']==$date['id']) echo "selected"?> value="<?php SRC::getSrc();?>/farmer-small/list-plan/<?php echo $crop['id']?>" ><?php echo $crop['name_crop_ua']?></option>
        <?php }?>
    </select>
    <input type="hidden" name="crop_id" value="<?php echo $date['id']?>" required>
    <br>
    <?php if($date['id']<>0){?>
    <div class="table-responsive">
        <table class="table table-striped well">
            <thead class="head-table-center">
            <tr>
                <th colspan="6"></th>
                <td colspan="2" class="text-center">
                    <label for="payment_for_all_area">Оплата праці, грн/га</label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="id_action_type">Тип операції</label><br><br>
                    <select class="form-control" name="id_action_type" id="id_action_type" required>
                        <?php foreach ($date['action']['lib'] as $action_type)if($action_type['type']==1){?>
                            <option value="<?php echo $action_type['id_action']?>" selected><?php echo $action_type['name']?></option>
                        <?php }?>
                    </select>
                </td>
                <td>
                    <label for="action_id">Операція</label><br><br>
                    <select class="form-control" name="action_id" id="action_id" required>
                        <?php foreach ($date['action']['lib'] as $crop)if($crop['type']==2){?>
                            <option class="action_select action_select<?php echo $crop['action_type']?>" value="<?php echo $crop['id_action']?>"><?php echo $crop['name']?></option>
                        <?php }?>
                    </select>
                </td>
                <td>
                    <label for="strat_data">Дата початку</label><br><br>
                    <input type="date" class="form-control" id="strat_data" name="strat_data" required>
                </td>
                <td>
                    <label for="end_data">Дата закінчення</label><br><br>
                    <input type="date" class="form-control" id="end_data" name="end_data" required>
                </td>
                <td>
                <label for="unit">Одиниці виміру га/т</label>
                <select class="form-control" name="id_action_unit" id="id_action_unit" required>
                    <?php foreach ($date['action']['lib']as $action_type)if($action_type['type'] == 3){?>
                        <option value="<?php echo $action_type['id_action']?>"><?php echo $action_type['name']?></option>
                    <?php }?>
                </select>
                </td>
                <td>
                    <label for="payment_for_all_area">Оплату послуг, грн/га</label>
                    <input type="text" class="form-control" id="payment_for_all_area" name="payment_for_all_area" required>
                </td>
                <td class="text-center">
                    <label for="payment_for_all_area_own" >власна </label><br><br>
                    <input type="text" class="form-control" id="payment_for_all_area_own" name="payment_for_all_area_own" required>
                </td>
                <td class="text-center">
                    <label for="payment_for_all_area_rent">наймана</label><br><br>
                    <input type="text" class="form-control" id="payment_for_all_area_rent" name="payment_for_all_area_rent" required>
                </td>
                <td>
                    <label for="payment_for_all_other">Інші виробничі витрати, грн/га</label>
                    <input type="text" class="form-control" id="payment_for_all_area" name="payment_for_all_other" required>
                </td>
            </tr>
            <?php $x=0; while ($x < 6) { $x++; ?>
                <tr class="asd" id="add_material_<?php echo $x?>">
                    <td colspan="2">
                        <label for="material_select_<?php echo $x?>"><?php echo $x?>. Матеріал</label>
                        <select class="form-control" name="material_<?php echo $x?>" id="material_<?php echo $x?>" >
                            <?php foreach ($date['action']['lib'] as $action_type)if($action_type['type'] == 4){?>
                                <option value="<?php echo $action_type['id_action']?>" selected><?php echo $action_type['name']?></option>
                            <?php }?>
                        </select>
                    </td>
                        <td colspan="2">
                            <label for="material_name">Назва матеріалу</label>
                            <input type="text" class="form-control" id="material_name" name="material_name_<?=$x?>" >
                        </td>
                        <td colspan="4">
                            <label for="material_name">Норма, кг,л/га,кг</label>
                            <input type="text" class="form-control" id="material_name" name="material_norm_<?=$x?>" >
                        </td>
                        <td colspan="2">
                            <label for="material_name">Ціна, грн/кг,л</label>
                            <input type="text" class="form-control" id="material_name" name="material_price_<?=$x?>">
                        </td>
                </tr>
            <?php }?>
            <input type="hidden" value="" id="material_count" name="material_count">
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
            <th>Тип операції</th>
            <th>Операція</th>
            <th>Дата початку</th>
            <th>Дата закінчення</th>
            <th>Матеріал</th>
            <th>Оплату послуг, грн/га</th>
            <th>Оплата праці, грн/га</th>
            <th>Інші виробничі витрати, грн/га</th>
        </tr>
        <tbody>
        <?php foreach ($date['crop_plan']['action'] as $action){?>
        <tr>
            <td><?=$action['id'];?></td>
            <td><?=$date['crop_plan']['lib'][$action['id_action_type']]['name_ua'];?></td>
            <td><?=$date['crop_plan']['lib'][$action['id_action']]['name_ua'];?></td>
            <td><?=$action['start_date'];?></td>
            <td><?=$action['end_date'];?></td>
            <td>
                <?php
                    $id_material[$action['id']] = explode(',',$action['id_materials']);
                    foreach ($id_material[$action['id']] as $key)
                    {
                        echo $date['material'][$key]['material_name'].', '.$date['material'][$key]['material_norm'].', '.$date['material'][$key]['material_price'].'<br>';
                    }
                ?>
            </td>
            <td><?=$action['payment_for_all_area'];?></td>
            <td><?=$action['payment_for_all_area_own'];?></td>
            <td><?=$action['payment_for_all_other'];?></td>
        </tr>
        <?php }?>
        </tbody>
    </table>
</div>
<?php }?>
    <div style="float: right">
        <a href="<?php SRC::getSrc();?>/farmer-small/add-equipment" class="btn btn-success btn-lg">Далі</a>
    </div>
</div>

<div id="truy" class="alertInfo alert alert-success " style="display: none"></div>
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