
<div class="box">
    <div class="box-bodyn">
        <div class="non-semantic-protector">
            <h1 class="ribbon">
                <strong class="ribbon-content"><?=$language['new-farmer']['164']?></strong>
            </h1>
        </div>
    </div>
</div>
<div class="box-bodyn col-lg-12">
    <select onchange="window.location.href=this.options[this.selectedIndex].value" style="width:300px; margin: 0 auto" class="form-control  inphead" id="select_crop" required>
        <?php if($date['id']==0){?><option selected value="0"><?=$language['new-farmer']['163']?></option><?php }?>
        <?php foreach ($date['field'] as $field){?>
            <option <?php if($field['id_field']==$date['id']) echo "selected"?> value="<?php SRC::getSrc();?>/new-farmer/fact_tech_card/<?php echo $field['id_field']?>" ><?=$field['field_number']."_".$field['field_name'];?></option>
        <?php }?>
    </select>
</div>
<? if($date['id']<>0){?>
<div class="box-bodyn col-lg-12" id="scroll_for_op">
    <table class="table">
        <thead>
        <tr>
            <th><?=$language['new-farmer']['61']?></th>
            <th><?=$language['new-farmer']['45']?></th>
            <th><?=$language['new-farmer']['63']?></th>
            <th><?=$language['new-farmer']['46']?></th>
        </tr>
        </thead>
        <tbody>
        <?foreach ($date['field'] as $field_tab)if($date['id']==$field_tab['id_field']){?>
            <tr>
                <td><? if ($_COOKIE['lang']=='ua'){ echo $field_tab['name_crop_ua'];}elseif($_COOKIE['lang']=='gb'){echo $field_tab['name_crop_en'];}?></td>
                <td><?=$field_tab['field_name']?></td>
                <td><?=$field_tab['tech_name']?></td>
                <td id="field_size"><?=$field_tab['field_size']?></td>
            </tr>
        <?}?>
        </tbody>
    </table>
</div>
    <div class="rown">
        <br><br>
        <div class="col-lg-6">

            <div class="rown">
                <div class="box-body wt">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr class="tabletop">
                                <th colspan="5"><h4 class="text-center"><?=$language['new-farmer']['168']?></h4></th>
                            </tr>
                            <tr class="tabletop">
                                <th><?=$language['new-farmer']['65']?></th>
                                <th><?=$language['new-farmer']['66']?></th>
                                <th><?=$language['new-farmer']['67']?></th>
                                <th><?=$language['new-farmer']['68']?></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <? foreach ($date['action']['action'] as $action){?>
                                <tr>
                                    <td style="width: 29%"><? if($_COOKIE['lang']=='gb'){echo $date['action']['action_type'][$action['action_action_type_id']]['name_en'];}elseif($_COOKIE['lang']=='ua'){echo $date['action']['action_type'][$action['action_action_type_id']]['name_ua'];}?></td>
                                    <td style="width: 29%"><? if($_COOKIE['lang']=='gb'){echo $date['action']['action_type'][$action['action_action_id']]['name_en'];}elseif($_COOKIE['lang']=='ua'){echo $date['action']['action_type'][$action['action_action_id']]['name_ua'];}?>
                                    <td><?=$action['action_date_start']?></td>
                                    <td><?=$action['action_date_end']?></td>
                                    <td style="width: 10%"><a data-action_id="<?=$action['action_id']?>"
                                                data-start_date="<?=$action['action_date_start']?>"
                                                data-end_date="<?=$action['action_date_end']?>"
                                                data-action_type_id="<?=$action['action_action_type_id']?>"
                                                data-action_action_id="<?=$action['action_action_id']?>"
                                                data-material='<?=json_encode(unserialize($action['action_materials']));?>'
                                                data-employee='<?=json_encode(unserialize($action['action_employee']));?>'
                                                data-machines='<?=json_encode(unserialize($action['action_machines']));?>'
                                                data-services='<?=json_encode(unserialize($action['action_services']));?>'
                                                data-fact='<?=json_encode($date['action']['fact'][$action['action_id']])?>'
                                                class="btn btn-primary btn-sm edit_action" href="#scroll_for_op"><?=$language['new-farmer']['169']?></a>
                                    </td>
                                </tr>
                            <?}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="fact_tech_card" style="display: none">
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 15px;">
                        <table class="table">
                            <thead>
                            <tr class="tabletop">
                                <th colspan="5"><h4 class="text-center"><?=$language['new-farmer']['169']?></h4></th>
                            </tr>
                            <tr class="tabletop" id="info_operation_fact">

                            </tr>
                            </thead>
                        </table>
                    </div>
                    </div>
                    <div class="col-lg-12" style="margin-top: 31px;">
                        <div class="row" style="margin-top: 15px;">
                            <div class="col-lg-3">
                            <button class="btn btn-success  new_open_material">Матеріали</button>
                        </div>
                        <div class="col-lg-3">
                            <button class="btn btn-success new_open_employee">Працівники</button>
                        </div>
                        <div class="col-lg-3">
                            <button class="btn btn-success new_open_ppa">ПММ</button>
                        </div>
                        <div class="col-lg-3">
                            <button class="btn btn-success new_open_services">Послуги</button>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-12" id="style_open_material" style="display: none; margin-top: 10px;">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="tabletop">
                                        <th>Назва матеріалу</th>
                                        <th>Загальна кількість матеріалу, кг</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th colspan="3" class="text-center">План</th>
                                    </tr>
                                </tbody>
                                <tbody id="material">

                                </tbody>
                                <tbody>
                                    <tr>
                                        <th colspan="3" class="text-center">Факт</th>
                                    </tr>
                                </tbody>
                                <tbody id="in_fact_material">

                                </tbody>
                            </table>
                                <button class='btn btn-success' href='#mat_fact' data-toggle='modal'>Факт<b id="coll_material_fact"></b></button>
                        </div>
                    </div>
                    <div class="col-lg-12" id="style_open_employee" style="display: none; margin-top: 10px;">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="tabletop">
                                        <th>П.І.П працівника</th>
                                        <th>Зарплата, грн</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th colspan="2" class="text-center">План</th>
                                    </tr>
                                </tbody>
                                <tbody id="employee">

                                </tbody>
                                <tbody>
                                    <tr>
                                        <th colspan="2" class="text-center">Факт</th>
                                    </tr>
                                </tbody>
                                <tbody id="in_fact_employee">

                                </tbody>
                            </table>
                            <button class='btn btn-success' href='#fact_employee' data-toggle='modal'>Факт<b id="coll_employee_fact"></b></button>
                        </div>
                    </div>
                    <div class="col-lg-12" id="style_open_ppa" style="display: none; margin-top: 10px;">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr class="tabletop">
                                    <th>С/г техніка</th>
                                    <th>С/г машини</th>
                                    <th>Кількість пального, л</th>
                                </tr>
                                </thead>
                                <tr>
                                    <th colspan="3" class="text-center">План</th>
                                </tr>
                                <tbody id="equipment">

                                </tbody>
                                <tbody>
                                <tr>
                                    <th colspan="3" class="text-center">Факт</th>
                                </tr>
                                </tbody>
                                <tbody id="in_fact_equipment">

                                </tbody>
                            </table>
                            <button class='btn btn-success' href='#fact_machines' data-toggle='modal'>Факт<b id="coll_fuel_fact"></b></button>
                        </div>
                    </div>
                    <div class="col-lg-12" id="style_open_services" style="display: none; margin-top: 10px;">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr class="tabletop">
                                    <th>Назва послуги</th>
                                    <th>Загальна сума, грн</th>
                                </tr>
                                </thead>
                                <tr>
                                    <th colspan="2" class="text-center">План</th>
                                </tr>
                                <tbody id="services">

                                </tbody>
                                <tbody>
                                <tr>
                                    <th colspan="2" class="text-center">Факт</th>
                                </tr>
                                </tbody>
                                <tbody id="in_fact_services">

                                </tbody>
                            </table>
                            <button class='btn btn-success' href='#fact_services' data-toggle='modal'>Факт<b id="coll_services"></b></button>
                        </div>
                    </div>


                <div class="col-lg-12">
                    <form action="/new-farmer/save_fact" method="post">
                        <input name="save_fact_id_action" id="save_fact_id_action" type="hidden">
                        <input name="save_fuel_fact" id="save_fuel_fact" type="hidden">
                        <input name="save_material_fact" id="save_material_fact" type="hidden">
                        <input name="save_services_fact" id="save_services_fact" type="hidden">
                        <input name="save_employee_fact" id="save_employee_fact" type="hidden">
                        <button class="btn btn-primary save_change"  style="float: left; margin-top: 45px;" type="submit"><?=$language['new-farmer']['184']?></button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
<?}?>
<!--Material Fact-->
<div id="mat_fact" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <div class="box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <span class="box-title">Картка списання матеріалу</span>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-lg-5">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="bd_materials">
                                <select class="form-control"  id="type_material_list_bd">
                                    <option value="1"><?=$language['new-farmer']['90']?></option>
                                    <option value="2"><?=$language['new-farmer']['91']?></option>
                                    <option value="3"><?=$language['new-farmer']['92']?></option>
                                </select>
                                <br>
                                <table class="table">
                                    <thead>
                                    <tr class="tabletop">
                                        <th><?=$language['new-farmer']['93']?></th>
                                        <!-- <th><?=$language['new-farmer']['95']?></th> -->
                                        <th>Кількість на складі, кг/л</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($date['action']['storage_material'] as $storage_material)if($storage_material['storage_type_material']!=4){?>
                                        <tr class="list_materials type_material_<?=$storage_material['storage_type_material']?>" >
                                            <td><?=$date['material_lib'][$storage_material['storage_material']]['name_material']?></td>
                                            <!-- <td><?=$storage_material['storage_sum_unit']?></td> -->
                                            <td id="material_st_<?=$storage_material['storage_material_id']?>" data-mass="<?=$storage_material['storage_quantity']?>"><?=$storage_material['storage_quantity']?></td>
                                            <td><a data-id="<?=$storage_material['storage_material_id']?>" data-name='<?=$date['material_lib'][$storage_material['storage_material']]['name_material']?>' class="btn btn-success btn-sm fact_add_material"><i class="fa fa-fw fa-arrow-right"></i>
                                                </a></td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <table class="table">
                            <thead class="tabletop">
                            <tr>
                                <th><?=$language['new-farmer']['93']?></th>
                                <th>Кількість, кг/л</th>
                                <th>Дата</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody  id="fact_action_material">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
               <!-- <button id="save_material" type="submit" class="btn btn-primary"><?/*=$language['new-farmer']['27']*/?></button>-->
            </div>
        </div>
    </div>
</div>
<!--fact_employee-->
<div id="fact_employee" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <div class="box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <span class="box-title"><?=$language['new-farmer']['73']?></span>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <table class="table">
                            <thead>
                            <tr class="tabletop">
                                <th><?=$language['new-farmer']['37']?></th>
                                <th><?=$language['new-farmer']['38']?></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <? foreach ($date['action']['employee'] as $employe){?>
                                <tr>
                                    <td><?=$employe['employee_name'] ?></td>
                                    <td><?=$employe['employee_surname'] ?></td>
                                    <td>
                                        <a data-id='<?=$employe['id_employee'] ?>' class="btn btn-success btn-sm add_employee"><i class="fa fa-fw fa-arrow-right"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?}?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <table class="table">
                            <thead>
                            <tr class="tabletop">
                                <th><?=$language['new-farmer']['38']?></th>
                                <th>Зарплата, грн</th>
                                <th>Дата</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="fact_employe_action">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                <!--<button id="save_employe" type="submit" class="btn btn-primary"><?/*=$language['new-farmer']['27']*/?></button>-->
            </div>
        </div>
    </div>
</div>

<!--fact_services-->
<div id="fact_services" class="modal fade">
    <div class="modal-dialog modal-md">
        <div class="modal-content wt">
            <div class="box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <span class="box-title"><?=$language['new-farmer']['73']?></span>
            </div>

            <div class="modal-header">
                <button id="fact_add_services" class="btn btn-success">add</button>
            </div>
            <div class="modal-body">
                <table class="table" >
                    <thead>
                    <tr>
                        <th>Назва</th>
                        <th>Загальна ціна, грн</th>
                        <th>Дата</th>
                    </tr>
                    </thead>
                    <tbody id="fact_action_services">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
               <!-- <button id="save_employe" type="submit" class="btn btn-primary"><?/*=$language['new-farmer']['27']*/?></button>-->
            </div>
        </div>
    </div>
</div>

<!--fact_machines Fact-->
<div id="fact_machines" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <div class="box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <span class="box-title"><?=$language['new-farmer']['87']?></span>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-lg-6">
                        <table class="table">
                            <thead>
                            <tr class="tabletop">
                                <th><?=$language['new-farmer']['93']?></th>
                                <th><?=$language['new-farmer']['95']?></th>
                                <th>Кількість на складі, л</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($date['action']['storage_material'] as $storage_material)if($storage_material['storage_type_material']==4){?>
                                <tr class="list_fuel type_fuel_<?=$storage_material['storage_type_material']?>" >
                                    <td><?=$date['material_lib'][$storage_material['storage_material']]['name_material']?></td>
                                    <td><?=$storage_material['storage_sum_unit']?></td>
                                    <td id="fuel_st_<?=$storage_material['storage_material_id']?>" data-mass="<?=$storage_material['storage_quantity']?>"><?=$storage_material['storage_quantity']?></td>
                                    <td><a data-id="<?=$storage_material['storage_material_id']?>" data-name='<?=$date['material_lib'][$storage_material['storage_material']]['name_material']?>' class="btn btn-success btn-sm fact_add_fuel"><i class="fa fa-fw fa-arrow-right"></i>
                                        </a></td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <table class="table">
                            <thead class="tabletop">
                            <tr>
                                <th><?=$language['new-farmer']['93']?></th>
                                <th>Кількість</th>
                                <th>Дата</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody  id="fact_action_fuel">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                <!--<button id="save_material" type="submit" class="btn btn-primary"><?/*=$language['new-farmer']['27']*/?></button>-->
            </div>
        </div>
    </div>
</div>




<script>
    $(document).ready(function () {

        var json_plan_material='<?=json_encode($date['action']['material_lib']);?>';
        var json_vehicles ='<?=json_encode($date['action']['vehicles'])?>';
        var json_equipment_lib ='<?=json_encode($date['action']['equipment'])?>';
        var json_plan_employee ='<?=json_encode($date['action']['employee']);?>';
        var json_storage ='<?=json_encode($date['action']['storage_material']);?>';
        var json_action_type='<?=json_encode($date['action']['action_type'])?>';
        var action_type_name=JSON.parse(json_action_type);

        var plan_material = JSON.parse(json_plan_material);
        var vehicles = JSON.parse(json_vehicles);
        var equipment_lib = JSON.parse(json_equipment_lib);
        var plan_employee = JSON.parse(json_plan_employee);
        var storage = JSON.parse(json_storage);
        var id_g_employee=0;
        ///////////////////////////MATERIAL/////////////////////////////////////
        var id_material=0;
        $('.fact_add_material').click(add_material);
        function add_material() {
            id_material++;
            var name=$(this).attr('data-name');
            var id_materials=$(this).attr('data-id');

            $("#fact_action_material").append("<tr class='material_json' id='f_action_material_"+id_material+"'>" +
                "<td>" + name + "</td>" +
                "<td><input data-id='"+id_materials+"' type='text' class='form-control norm_material material_st_"+id_materials+"' ></td>" +
                "<td><input class='date_material form-control' type='date'></td>" +
                "<td><button class='btn btn-danger btn-sm remove_material' data-id='"+id_material+"'><i class='fa fa-fw fa-close'></i></button></td>" +
                "</tr>");
            save_material();
        }
        $('#fact_action_material').on('change', '.date_material, .norm_material', save_material);


        $('#fact_action_material').on('keyup', '.norm_material', norm_material);
        function norm_material() {
            var id=$(this).attr('data-id');
            var mass=0;
            $('.material_st_'+id).each(function () {
                var mass_mat=parseFloat($(this).val());
                if(isNaN(mass_mat)) mass_mat=0;
                mass+=mass_mat;
            });
            var ex_mass=$('#material_st_'+id).attr('data-mass')-mass;
            if(ex_mass<0){
                $(this).val($(this).val().substr(1));
                alert("-");
                var mass=0;
                $('.material_st_'+id).each(function () {
                    var mass_mat=parseFloat($(this).val());
                    if(isNaN(mass_mat)) mass_mat=0;
                    mass+=mass_mat;
                });
                ex_mass=$('#material_st_'+id).attr('data-mass')-mass;
            }
            $('#material_st_'+id).text(ex_mass);
            save_material();
        }
        $('#fact_action_material').on('click', '.remove_material', remove_material);
        function remove_material() {
            var id=$(this).attr('data-id');
            $('#f_action_material_'+id).remove();
            save_material();
        }
        $('#save_material').click(save_material);
        function save_material() {
            jsonObj = [];
            var coll=0;
            $(".material_json").each(function() {
                coll++;
                item = {};
                item ["id"] = $(this).find('.norm_material').attr('data-id');
                item ["norm"] = $(this).find('.norm_material').val();
                item ["date"] = $(this).find('.date_material').val();
                jsonObj.push(item);
            });
            $('#save_material_fact').val(JSON.stringify(jsonObj));
            $('#coll_material_fact').text("("+coll+")");
        }

        ///////////////////////////FUEL/////////////////////////////////////
        var id_fuel=0;
        $('.fact_add_fuel').click(add_fuel);
        function add_fuel() {
            id_fuel++;
            var name=$(this).attr('data-name');
            var id_fuels=$(this).attr('data-id');

            $("#fact_action_fuel").append("<tr class='fuel_json' id='action_fuel_" + id_fuel + "'>" +
                "<td>" + name + "</td>" +
                "<td><input data-id='"+id_fuels+"' type='text' class='form-control norm_fuel fuel_st_"+id_fuel+"' ></td>" +
                "<td><input class='date_fuel form-control' type='date'></td>" +
                "<td><button class='btn btn-danger btn-sm remove_fuel' data-id='" + id_fuel + "' ><i class='fa fa-fw fa-close'></i></button></td>" +
                "</tr>");
            save_fuel();

        }$('#fact_action_fuel').on('change', '.date_fuel', save_fuel);
        $('#fact_action_fuel').on('keyup', '.norm_fuel', norm_fuel);
        function norm_fuel() {
            var id=$(this).attr('data-id');
            var mass=0;
            $('.fuel_st_'+id).each(function () {
                var mass_mat=parseFloat($(this).val());
                if(isNaN(mass_mat)) mass_mat=0;
                mass+=mass_mat;
            });
            var ex_mass=$('#fuel_st_'+id).attr('data-mass')-mass;
            if(ex_mass<0){
                $(this).val($(this).val().substr(1));
                alert("-");
                var mass=0;
                $('.fuel_st_'+id).each(function () {
                    var mass_mat=parseFloat($(this).val());
                    if(isNaN(mass_mat)) mass_mat=0;
                    mass+=mass_mat;
                });
                ex_mass=$('#fuel_st_'+id).attr('data-mass')-mass;
            }
            $('#fuel_st_'+id).text(ex_mass);
            save_fuel();
        }
        $('#fact_action_fuel').on('click', '.remove_fuel', remove_fuel);
        function remove_fuel() {
            var id=$(this).attr('data-id');
            $('#action_fuel_'+id).remove();
            save_fuel();
        }
        $('#save_fuel').click(save_fuel);
        function save_fuel() {
            jsonObj = [];
            var coll=0;
            $(".fuel_json").each(function() {
                coll++;
                item = {};
                item ["id"] = $(this).find('.norm_fuel').attr('data-id');
                item ["norm"] = $(this).find('.norm_fuel').val();
                item ["date"] = $(this).find('.date_fuel').val();
                jsonObj.push(item);
            });
            $('#save_fuel_fact').val(JSON.stringify(jsonObj));
            $('#coll_fuel_fact').text("("+coll+")");
        }
        /////////////////////employe//////////////////////////////////////////////////////////
        $('.add_employee').click(function () {
            id_g_employee++;
            var id_employe = $(this).attr('data-id');
            $('#fact_employe_action').append(
                "<tr class='ex_fact_employe' id='g_employee_"+id_g_employee+"'>" +
                "<td>"+plan_employee[id_employe]['employee_surname']+"</td>" +
                "<td><input data-id='"+id_employe+"' type='text' class='form-control em_fact'></td>" +
                "<td><input class='form-control em_date' type='date'></td>" +
                "<td><button class='btn btn-danger btn-sm remove_employe' data-id='" + id_g_employee + "' ><i class='fa fa-fw fa-close'></i></button></td>" +
                "<td></td>" +
                "</tr>");
            save_employee();
        });

        $('#fact_employe_action').on('click', '.remove_employe', remove_employe);
        function remove_employe() {
            var id=$(this).attr('data-id');
            $('#g_employee_'+id).remove();
            save_employe();
        }
        $('#save_employe').click(save_employee);

        $('#fact_employe_action').on('change', '.em_date, .em_fact', save_employee);
        function save_employee() {
            jsonObj = [];
            var coll=0;
            $(".ex_fact_employe").each(function() {
                coll++;
                item = {};
                item ["id"] = $(this).find('.em_fact').attr('data-id');
                item ["pay"] = $(this).find('.em_fact').val();
                item ["date"] = $(this).find('.em_date').val();
                jsonObj.push(item);
            });
            $('#save_employee_fact').val(JSON.stringify(jsonObj));
            $('#coll_employee_fact').text("("+coll+")");
            //$('#fact_employee').modal("hide");
        }
        ///////////////////////services///////////////////////////////////////
        var id_services=0;
        $('#fact_add_services').click(add_services);
        function add_services() {
            id_services++;
            $('#fact_action_services').append("<tr class='fact_action_services' id='f_services_"+id_services+"'>" +
                "<td><input  class='name form-control se_name' type='text'></td>" +
                "<td><input  class='name form-control se_price' type='text'></td>" +
                "<td><input  class='name form-control se_date' type='date'></td>" +
                "<td><button class='btn btn-danger btn-sm remove_service' data-id='" + id_services + "' ><i class='fa fa-fw fa-close'></i></button></td>" +
                "</tr>");
        }

        $('#fact_action_services').on('click', '.remove_service', remove_service);
        function remove_service() {
            var id=$(this).attr('data-id');
            $('#f_services_'+id).remove();
            save_services();
        }
        $('#fact_add_services').click(save_services);
        $('#fact_action_services').on('change', '.se_name, .se_price, .se_date', save_services);
        function save_services() {
            jsonObj = [];
            var coll=0;
            $(".fact_action_services").each(function() {
                coll++;
                item = {};
                item ["name"] = $(this).find('.se_name').val();
                item ["price"] = $(this).find('.se_price').val();
                item ["date"] = $(this).find('.se_date').val();
                jsonObj.push(item);
            });
            $('#save_services_fact').val(JSON.stringify(jsonObj));
            $('#coll_services').text("("+coll+")");
        }




        //////////////////////////////////////////////////////////////
        var def_material = 'Матеріали відсутні';
        var def_employee = 'Працівники відсутні';
        var def_equipment = 'Техніка відсутня';
        var def_services = 'Послуги відсутні';
        var def_plan='План';

        $('.edit_action').click(function () {
            $('.fact_tech_card').css('display','block');
            $("#material,#employee, #services,#equipment,#serv,#emplo,#mat,#equp," +
                "#in_fact_material,#in_fact_employee,#in_fact_equipment,#in_fact_services, #info_operation_fact").html('');

            var elementClick = $(this).attr("href");
            var destination = $(elementClick).offset().top;
                $('html').animate({ scrollTop: destination }, 35);


            var action_id = $(this).attr('data-action_id');
            var json_equipment = $(this).attr('data-machines');
            var json_services = $(this).attr('data-services');
            var json_material =$(this).attr('data-material');
            var json_employee = $(this).attr('data-employee');
            var json_fact = $(this).attr('data-fact');
            var action_action_id = $(this).attr('data-action_action_id');
            var action_type_id = $(this).attr('data-action_type_id');
            var start_date = $(this).attr('data-start_date');
            var end_date = $(this).attr('data-end_date');
            var field_size=parseFloat($('#field_size').text());
            var material = JSON.parse(json_material);
            var employee = JSON.parse(json_employee);
            var equipment = JSON.parse(json_equipment);
            var services = JSON.parse(json_services);
            var fact=JSON.parse(json_fact);
            if(!isNaN(fact)) fact={};

            $('#save_fact_id_action').val(action_id);


            $('#info_operation_fact').append(
                "<th>"+ action_type_name[action_type_id]['name_ua'] +"</th>"+
                "<th>"+ action_type_name[action_action_id]['name_ua'] +"</th>"+
                "<th>"+ start_date +"</th>"+
                "<th>"+ end_date +"</th>"
            );
            ///////Загрузка Плана
            if(material == false){
                $("#material").append(
                    "<tr>" +
                    "<td colspan='3' class='text-center'>" + def_material + "</td>" +
                    "</tr>");
            }else {
                $.each(material, function (key, value) {
                    $("#material").append(
                        "<tr>" +
                        "<td>" + plan_material[value['id']]['name_material'] + "</td>" +
                        "<td>" + value['norm']*field_size + "</td>"+
                        "</tr>"
                    );
                });
            }
            if(employee == false){
                $("#employee").append("<tr id='action_employee_" + action_id + "'>" +
                    "<td colspan='2' class='text-center'>" + def_employee + "</td>" +
                    "</tr>");
            }
            else{
                $.each(employee, function (key, employee) {
                    $("#employee").append(
                        "<tr>" +
                        "<td>" + plan_employee[employee['id']]['employee_name'] +' '+ plan_employee[employee['id']]['employee_surname']+"</td>" +
                        "<td>" + employee['pay']*field_size + "</td>" +
                        "</tr>"
                    );
                });
            }
            if(equipment == false){
                $("#equipment").append("<tr>" +
                    "<td colspan='3' class='text-center'>" + def_equipment + "</td>" +
                    "</tr>");
            }
            else{
                var id_machine=0;
                $.each(equipment, function (key, machines) {
                    id_machine++;
                    $("#equipment").append("<tr>"+
                        "<td>"+vehicles[machines['id_veh']]['vehicles_name']+"</td>"+
                        "<td id='equipment_"+id_machine+"'></td>"+
                        "<td>"+machines['fuel']*field_size+"</td>"+
                        "</tr>"
                    );
                   if(machines['id_equ'] == true){
                        var id_equ = machines['id_equ'].split(',');
                        $.each(id_equ, function (key, id_equipment) {
                            $("#equipment_"+id_machine).append(equipment_lib[id_equipment]['equipment_name']+"<br>");
                        });
                   }
                });
            }
            if(services == false){
                $('#services').append(
                    "<tr>" +
                    "<td colspan='3' class='text-center'>" + def_services + "</td>" +
                    "</tr>"
                );
            }else{
                $.each(services, function (key, service) {
                    $("#services").append("<tr>" +
                        "<td>" + service['name']+"</td>" +
                        "<td>" + service['price']*service['amount']+ "</td>" +
                        "</tr>"
                    );
                });
            }
            ////////////Загрузка Факта
            $('#fact_employe_action, #fact_action_fuel, #fact_action_services, #fact_action_material').html('');
            ////fact_materials
            console.log(fact['fact_materials']);
            if(fact['fact_materials'] == undefined){
                $("#in_fact_material").append(
                    "<tr>" +
                    "<td colspan='3' class='text-center'>" + def_material + "</td>" +
                    "</tr>");
            }else {
                $.each(fact['fact_materials'], function (key, value) {
                    $("#in_fact_material").append(
                        "<tr>" +
                        "<td>" + storage[value['id']]['name_material'] + "</td>" +
                        "<td>" + value['norm'] + "</td>"+
                        "</tr>"
                    );
                    id_material++;
                    $("#fact_action_material").append("<tr class='material_json' id='f_action_material_" + id_material + "'>" +
                        "<td>" + storage[value['id']]['name_material'] + "</td>" +
                        "<td><input data-id='"+value['id']+"' type='text' class='form-control norm_material material_st_"+value['id']+"' value='"+value['norm']+"' ></td>" +
                        "<td><input  value='"+value['date']+"' class='date_material form-control' type='date'></td>" +
                        "<td><button class='btn btn-danger btn-sm remove_material' data-id='" + id_material + "' ><i class='fa fa-fw fa-close'></i></button></td>" +
                        "</tr>");
                });

            }
            //////////fact_employee
            if(fact['fact_employee'] == undefined){
                $("#in_fact_employee").append("<tr'>" +
                    "<td colspan='2' class='text-center'>" + def_employee + "</td>" +
                    "</tr>");
            }else{
                $.each(fact['fact_employee'], function (key, employee) {
                    $("#in_fact_employee").append(
                        "<tr>" +
                        "<td>" + plan_employee[employee['id']]['employee_name'] +' '+ plan_employee[employee['id']]['employee_surname']+"</td>" +
                        "<td>" + employee['pay'] + "</td>" +
                        "</tr>"
                    );
                    id_g_employee++;
                    $('#fact_employe_action').append(
                        "<tr class='ex_fact_employe' id='g_employee_"+id_g_employee+"'>" +
                        "<td>"+plan_employee[employee['id']]['employee_surname']+"</td>" +
                        "<td><input value='"+employee['pay']+"' data-id='"+employee['id']+"' type='text' class='form-control em_fact'></td>" +
                        "<td><input value='"+employee['date']+"' class='form-control em_date' type='date'></td>" +
                        "<td><button class='btn btn-danger btn-sm remove_employe' data-id='" + id_g_employee + "' ><i class='fa fa-fw fa-close'></i></button></td>" +
                        "<td></td>" +
                        "</tr>");

                });
            }
            ////////fact_machines
            if(fact['fact_machines'] == undefined){
                $("#in_fact_equipment").append("<tr>" +
                    "<td colspan='3' class='text-center'>" + def_equipment + "</td>" +
                    "</tr>");
            }else{
                var id_machine=0;
                $.each(fact['fact_machines'], function (key, machines) {
                    id_machine++;
                    $("#in_fact_equipment").append("<tr>"+
                        "<td>"+machines['date']+"</td>"+
                        "<td ></td>"+
                        "<td>"+machines['norm']+"</td>"+
                        "</tr>"
                    );
                    id_fuel++;
                    $("#fact_action_fuel").append("<tr class='fuel_json' id='action_fuel_" + id_fuel + "'>" +
                        "<td>" + storage[machines['id_mat']]['name_material'] + "</td>" +
                        "<td><input value='"+machines['norm']+"' data-id='"+machines['id_mat']+"' type='text' class='form-control norm_fuel fuel_st_"+machines['id_mat']+"' ></td>" +
                        "<td><input value='"+machines['date']+"' class='date_fuel form-control' type='date'></td>" +
                        "<td><button class='btn btn-danger btn-sm remove_fuel' data-id='" + id_fuel + "' ><i class='fa fa-fw fa-close'></i></button></td>" +
                        "</tr>");
                });
            }
            ////////fact_services
            if(fact['fact_services'] == undefined){
                $('#in_fact_services').append(
                    "<tr>" +
                    "<td colspan='3' class='text-center'>" + def_services + "</td>" +
                    "</tr>"
                );

            }else{
                $.each(fact['fact_services'], function (key, service) {
                    $("#in_fact_services").append("<tr>" +
                        "<td>" + service['name']+"</td>" +
                        "<td>" + service['price']+ "</td>" +
                        "</tr>"
                    );
                    id_services++;
                    $('#fact_action_services').append("<tr class='fact_action_services' id='f_services_"+id_services+"'>" +
                        "<td><input value='" + service['name']+"'  class='name form-control se_name' type='text'></td>" +
                        "<td><input value='" + service['price']+"'  class='name form-control se_price' type='text'></td>" +
                        "<td><input value='" + service['date']+"'  class='name form-control se_date' type='date'></td>" +
                        "<td><button class='btn btn-danger btn-sm remove_service' data-id='" + id_services + "' ><i class='fa fa-fw fa-close'></i></button></td>" +
                        "</tr>");
                });
            }
            save_employee();
            save_services();
            save_material();
            save_fuel();
        });

        $('.save_change').click(function () {
            location.reload();
        });


        $('.new_open_material').click(function(){
            $('#style_open_material').toggle();
            $('#style_open_employee').hide();
            $('#style_open_ppa').hide();
            $('#style_open_services').hide();
        });

        $('.new_open_employee').click(function(){
            $('#style_open_employee').toggle();
            $('#style_open_ppa').hide();
            $('#style_open_material').hide();
            $('#style_open_services').hide();
        });
        $('.new_open_ppa').click(function(){
            $('#style_open_ppa').toggle();
            $('#style_open_material').hide();
            $('#style_open_employee').hide();
            $('#style_open_services').hide();
        });
        $('.new_open_services').click(function(){
            $('#style_open_services').toggle();
            $('#style_open_material').hide();
            $('#style_open_ppa').hide();
            $('#style_open_employee').hide();
        });
    });
</script>