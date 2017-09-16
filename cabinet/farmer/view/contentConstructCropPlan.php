<style>
    .material_fertilizers, .material_ppa, #material_subtype{
        display: none;
    }
</style>
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title"><?=$language['farmer']['132']?> "<?php echo $date['agri_crop_head'][0]['name_crop_ua'] ?>"  <a href="/farmer/create/edit-crop/<?php echo $date['agri_crop_head'][0]['id_crop']?>" class="btn btn-warning btn-xs"><i class="fa fa-fw fa-pencil"></i></a></h3>
        </div>
        <div class="box-body">
            <br>
            <div class="row">
                <div class="col-lg-3">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <p class="text-center" id="plan_action_name"><?=$language['farmer']['158']?></p>
                        </div>
                        <div class="icon">

                        </div>
                        <a data-toggle="modal" data-target="#operating" href="" class="small-box-footer">
                            <?=$language['farmer']['160']?> <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <p class="text-center"><?=$language['farmer']['159']?></p>
                        </div>
                        <div class="icon">
                        </div>
                        <a data-toggle="modal" data-target="#material" href="" class="small-box-footer">
                            <?=$language['farmer']['160']?> <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <form method="post" action="/farmer/create/create-plan">
                    <input type="hidden" name="crop_id" value="<?php echo $date['crop_id']?>">
                    <input type="hidden" name="plan_id_action" id="plan_id_action">
                    <input type="hidden" name="plan_id_material" id="plan_id_material">
                    <div class="col-lg-2">
                        <label for="strat_date"><?=$language['farmer']['161']?></label>
                        <input class="form-control" type="date" id="start_date" name="start_date">
                    </div>
                    <div class="col-lg-2">
                        <label for="end_date"><?=$language['farmer']['162']?></label>
                        <input class="form-control" type="date" id="end_date" name="end_date">
                    </div>
                    <div class="col-lg-1">
                        <br>
                        <input type="submit"  class="btn btn-block btn-success" id="sumbit" value="<?=$language['farmer']['163']?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <th>№</th>
                    <th><?=$language['farmer']['158']?></th>
                    <th><?=$language['farmer']['167']?></th>
                    <th><?=$language['farmer']['159']?></th>
                    <th><?=$language['farmer']['161']?></th>
                    <th><?=$language['farmer']['162']?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($date['agri_crop_plan'] as $agri_crop_plan){
                    $materials[$agri_crop_plan['id_plan']]=explode(',',$agri_crop_plan['id_materials']);
                    ?>
                    <tr id="plan_<?php echo $agri_crop_plan['id_plan']?>">
                        <th>#<?php echo $agri_crop_plan['id_plan']?></th>
                        <th><?php echo $date['plan_action'][$agri_crop_plan['id_action']]['name']?></th>
                        <th><select data-plan="<?php echo $agri_crop_plan['id_plan']?>" class="form-control select_plan" style="max-width:200px; ">
                                <option value="0"><?=$language['farmer']['198']?></option>
                                <?php foreach ($date['agri_crop_plan'] as $plan_select){?>
                                    <option <?php if($agri_crop_plan['id_parent']==$plan_select['id_plan']) echo 'selected';?> value="<?php echo $plan_select['id_plan']?>">№<?php echo $plan_select['id_plan'].". ".$date['plan_action'][$plan_select['id_action']]['name'] ?></option>
                                <? }?>
                            </select>
                        </th>
                        <th>
                            <?php foreach ($materials[$agri_crop_plan['id_plan']] as $material)if($material!=0){?>
                            <?php echo $date['plan_material'][$material]['name'];?>
                            <br>
                            <?php } ?>
                        </th>
                        <th><?php echo $agri_crop_plan['start_date']?></th>
                        <th><?php echo $agri_crop_plan['end_date']?></th>
                        <th><a href="/farmer/create/save-edit-plan/<?php echo $agri_crop_plan['id_plan']?>/1" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-pencil"></i></a></th>
                        <th><button id="<?php echo $agri_crop_plan['id_plan']?>" class="btn btn-danger btn-sm remove_plan"><span class="glyphicon glyphicon-remove"></span></button></th>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--модальное окно-->
    <div class="example-modal">
        <div class="modal fade  bs-example-modal-lg" id="operating" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><?=$language['farmer']['158']?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="in"><a href="#tab_1" data-toggle="tab"><?=$language['farmer']['164']?></a></li>
                                    <li class="in active"><a href="#tab_3" data-toggle="tab"><?=$language['farmer']['165']?></a></li>
                                    <li class="in" id="in_new_action"><a href="#tab_2" data-toggle="tab"><?=$language['farmer']['166']?></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane" id="tab_1">

                                       <table class="table">
                                           <? foreach ($date['action'] as $action){?>
                                           <tr>
                                               <td><?php echo $action['name_action_ua'] ?></td>
                                               <td><a data-name_action="<?php echo $action['name_action_ua'] ?>"
                                                      data-drivers="<?php echo $action['drivers']?>"
                                                      data-driver_class="<?php echo $action['driver_class']?>"
                                                      data-driver_bonus="<?php echo $action['driver_bonus']?>"
                                                      data-workers="<?php echo $action['workers']?>"
                                                      data-worker_class="<?php echo $action['worker_class']?>"
                                                      data-worker_bonus="<?php echo $action['worker_bonus']?>"
                                                      data-name_power="<?php echo $action['name_power_ua']?>"
                                                      data-name_working="<?php echo $action['name_working_ua']?>"
                                                      data-fuel_cons="<?php echo  $action['fuel_cons_9']?>"
                                                      data-productivity="<?php echo  $action['productivity_9']?>"
                                                      data-fuel_type="<?php echo  $action['fuel_type_id']?>"
                                                       href="#tab_2" data-toggle="tab" class="open_action btn btn-success btn-sm"><i class="fa fa-fw fa-arrow-right"></i>
                                                   </a>
                                               </td>
                                           </tr>
                                           <? }?>
                                       </table>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane " id="tab_2">
                                        <form method="post" id="new_actions" action="javascript:void(null);">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h4 class="text-center"><?=$language['farmer']['158']?></h4>
                                                <hr>

                                            </div>
                                            <div class="col-lg-12">
                                                <label for="name_action"><?=$language['farmer']['168']?></label>
                                                <input class="form-control" type="text" id="name_action" name="name_action">
                                            </div>
                                            <div class="col-lg-12">
                                                <hr>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="drivers"><?=$language['farmer']['169']?></label>
                                                <input class="form-control" type="text" id="drivers" name="drivers">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="workers"><?=$language['farmer']['170']?></label>
                                                <input class="form-control" type="text" id="workers" name="workers">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="driver_class"><?=$language['farmer']['171']?></label>
                                                <select class="form-control" id="driver_class" name="driver_class">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="worker_class"><?=$language['farmer']['172']?></label>
                                                <select class="form-control" id="worker_class" name="worker_class">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="driver_bonus"><?=$language['farmer']['173']?></label>
                                                <input class="form-control" type="text" id="driver_bonus" name="driver_bonus">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="worker_bonus"><?=$language['farmer']['174']?></label>
                                                <input class="form-control" type="text" id="worker_bonus" name="worker_bonus">
                                            </div>
                                            <div class="col-lg-12">
                                                <br>
                                                <h4 class="text-center"><?=$language['farmer']['175']?></h4>
                                                <hr>

                                            </div>
                                            <div class="col-lg-6">
                                                <label for="name_working"><?=$language['farmer']['176']?></label>
                                                <input class="form-control" type="text" id="name_working" name="name_working">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="name_power"><?=$language['farmer']['177']?></label>
                                                <input class="form-control" type="text" id="name_power" name="name_power">
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="fuel_type"><?=$language['farmer']['178']?></label>
                                                    <select class="form-control" name="fuel_type" id="fuel_type">
                                                        <option value="1"><?=$language['farmer']['181']?></option>
                                                        <option value="2"><?=$language['farmer']['182']?></option>
                                                        <option value="3"><?=$language['farmer']['183']?></option>
                                                        <option value="4"><?=$language['farmer']['184']?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="productivity"><?=$language['farmer']['179']?></label>
                                                <input class="form-control" type="text" id="productivity" name="productivity">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="fuel_cons"><?=$language['farmer']['180']?></label>
                                                <input class="form-control" type="text" id="fuel_cons" name="fuel_cons">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit"  class="btn btn-primary" id="sumbit" value="<?=$language['farmer']['163']?>">
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['farmer']['157']?></button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane active" id="tab_3">
                                        <table class="table">
                                            <tbody>
                                            <?php foreach ($date['my-action'] as $action){?>
                                                <tr>
                                                    <td id="my_action_name_<?php echo $action['id']?>"><?php echo $action['name_action']?></td>
                                                    <td><a data-data='<?=json_encode($action); ?>' class="btn btn-warning btn-sm open_edit_action"><i class="fa fa-fw fa-pencil"></i></a></td>
                                                    <td><a data-name_action="<?php echo $action['name_action']?>" data-id_action="<?php echo $action['id']?>" class="open_my_action btn btn-success btn-sm"><i class="fa fa-fw fa-arrow-right"></i></a></td>
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                     </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                        </div>
                       </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="modal fade  bs-example-modal-lg" id="material" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><?=$language['farmer']['159']?></h4>
                        </div>
                        <div class="modal-body">
                            <table class="table" >
                                <tbody id="list_material">

                                </tbody>
                            </table>
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="in"><a href="#standart_material" data-toggle="tab"><?=$language['farmer']['185']?></a></li>
                                    <li class="in active"><a href="#my_material" data-toggle="tab"><?=$language['farmer']['186']?></a></li>
                                    <li class="in" id="in_new_material"><a href="#new_material" data-toggle="tab"><?=$language['farmer']['187']?></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane " id="standart_material">
                                        <select id="material_select_standart" class="form-control">
                                            <option value="1"><?=$language['farmer']['16']?></option>
                                            <option value="2"><?=$language['farmer']['17']?></option>
                                            <option value="3"><?=$language['farmer']['18']?></option>
                                        </select>
                                        <table class="table">
                                            <tbody>
                                                <?php
                                                $table_name[1]='material_seeds';
                                                $table_name[2]='material_fertilizers';
                                                $table_name[3]='material_ppa';
                                                for($x=1;$x<=3;$x++){
                                                    foreach ($date[$table_name[$x]] as $material){?>
                                                        <tr class="<?php echo $table_name[$x]?>">
                                                            <td><?php echo $material['name_material_ua']?></td>
                                                            <td><?php echo $material['material_qty']?></td>
                                                            <td><?php echo $material['material_price']?></td>
                                                            <td>
                                                                <a
                                                                        data-name="<?php echo $material['name_material_ua']?>"
                                                                        data-qlt="<?php echo $material['material_qty']?>"
                                                                        data-price="<?php echo $material['material_price']?>"
                                                                        data-type="<?php echo $x?>"
                                                                        data-subtype="<?php echo $material['subtype_id']?>"
                                                                        href="#new_material" data-toggle="tab" class="open_material btn btn-success btn-sm"><i class="fa fa-fw fa-arrow-right"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?}
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane active" id="my_material">
                                        <select id="material_select_my" class="form-control" >
                                           <option value="1"><?=$language['farmer']['16']?></option>
                                            <option value="2"><?=$language['farmer']['17']?></option>
                                            <option value="3"><?=$language['farmer']['18']?></option>
                                        </select>

                                        <table class="table">
                                            <tbody>
                                        <?php foreach ($date['agri_material'] as $material){?>
                                            <tr id="m_<?php echo $material['id_material']?>" class="<?php echo $table_name[$material['type_material']]?>">
                                                <td class="data_name"><?php echo $material['name_material']?></td>
                                                <td class="data_qlt"><?php echo $material['qlt_material']?></td>
                                                <td class="data_price"><?php echo $material['price_material']?></td>

                                                <td><a
                                                            data-id="<?php echo $material['id_material']?>"
                                                            data-crop="<?php echo $material['id_crop']?>"
                                                            data-type="<?php echo $material['type_material']?>"
                                                            data-subtype="<?php echo $material['subtype_material']?>"
                                                            data-name="<?php echo $material['name_material']?>"
                                                            data-qlt="<?php echo $material['qlt_material']?>"
                                                            data-price="<?php echo $material['price_material']?>"
                                                             class="edit_material btn btn-warning btn-sm"><i class="fa fa-fw fa-pencil"></i></a>
                                                </td>

                                                <td>
                                                    <a
                                                            data-id="<?php echo $material['id_material']?>"
                                                            data-name="<?php echo $material['name_material']?>"
                                                            data-type="<?php echo $material['type_material']?>"
                                                            class="open_my_material btn btn-success btn-sm"><i class="fa fa-fw fa-arrow-right"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane " id="new_material">
                                        <form method="post" id="new_material_form" action="javascript:void(null);">
                                            <div class="row">
                                                 <div class="col-lg-12">
                                                     <select id="type_material" name="type_material" class="form-control" required>
                                                         <option value="1"><?=$language['farmer']['16']?></option>
                                            <option value="2"><?=$language['farmer']['17']?></option>
                                            <option value="3"><?=$language['farmer']['18']?></option>
                                                     </select>
                                                     <div class="col-lg-12"><br></div>
                                                     <select class="form-control" name="material_subtype" id="material_subtype">
                                                         <option value="1"><?=$language['farmer']['188']?></option>
                                                         <option value="2"><?=$language['farmer']['189']?></option>
                                                         <option value="3"><?=$language['farmer']['190']?></option>
                                                         <option value="4"><?=$language['farmer']['191']?></option>
                                                         <option value="5"><?=$language['farmer']['192']?></option>
                                                         <option value="6"><?=$language['farmer']['193']?></option>
                                                         <option value="7"><?=$language['farmer']['194']?></option>
                                                     </select>
                                                 </div>
                                                <div class="col-lg-12"><br></div>

                                                 <div class="col-lg-12">
                                                     <label for="name_material"><?=$language['farmer']['195']?></label>
                                                     <input class="form-control" type="text" id="name_material" name="name_material" required>
                                                 </div>
                                                <div class="col-lg-6">
                                                    <label for="price_material"><?=$language['farmer']['196']?></label>
                                                    <input class="form-control" type="text" id="price_material" name="price_material" required>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="qlt_material"><?=$language['farmer']['197']?></label>
                                                    <input class="form-control" type="text" id="qlt_material" name="qlt_material" required>
                                                </div>
                                            </div>
                                            <input type="hidden" name="crop_id" value="<?php echo $date['crop_id']?>">
                                            <div class="modal-footer">
                                                <input type="submit"  class="btn btn-primary" value="<?=$language['farmer']['163']?>">
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
        </div>
    </div>
</section>
<div class="modal fade  bs-example-modal-lg" id="edit_action" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?=$language['farmer']['187']?></h4>
            </div>
            <div class="modal-body">
                <form method="post" id="form_edit_actions" action="javascript:void(null);">
                    <input type="hidden" name="edit_action_id" id="edit_action_id">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="text-center"><?=$language['farmer']['158']?></h4>
                            <hr>

                        </div>
                        <div class="col-lg-12">
                            <label for="edit_name_action"><?=$language['farmer']['168']?></label>
                            <input class="form-control" type="text" id="edit_name_action" name="edit_name_action">
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <label for="edit_drivers"><?=$language['farmer']['169']?></label>
                            <input class="form-control" type="text" id="edit_drivers" name="edit_drivers">
                        </div>
                        <div class="col-lg-6">
                            <label for="edit_workers"><?=$language['farmer']['170']?></label>
                            <input class="form-control" type="text" id="edit_workers" name="edit_workers">
                        </div>
                        <div class="col-lg-6">
                            <label for="edit_driver_class"><?=$language['farmer']['171']?></label>
                            <select class="form-control" id="edit_driver_class" name="edit_driver_class">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="edit_worker_class"><?=$language['farmer']['172']?></label>
                            <select class="form-control" id="edit_worker_class" name="edit_worker_class">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="edit_driver_bonus"><?=$language['farmer']['173']?></label>
                            <input class="form-control" type="text" id="edit_driver_bonus" name="edit_driver_bonus">
                        </div>
                        <div class="col-lg-6">
                            <label for="edit_worker_bonus"><?=$language['farmer']['174']?></label>
                            <input class="form-control" type="text" id="edit_worker_bonus" name="edit_worker_bonus">
                        </div>
                        <div class="col-lg-12">
                            <br>
                            <h4 class="text-center"><?=$language['farmer']['175']?></h4>
                            <hr>

                        </div>
                        <div class="col-lg-6">
                            <label for="edit_name_working"><?=$language['farmer']['176']?></label>
                            <input class="form-control" type="text" id="edit_name_working" name="edit_name_working">
                        </div>
                        <div class="col-lg-6">
                            <label for="edit_name_power"><?=$language['farmer']['177']?></label>
                            <input class="form-control" type="text" id="edit_name_power" name="edit_name_power">
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="edit_fuel_type"><?=$language['farmer']['178']?></label>
                                <select class="form-control" name="edit_fuel_type" id="edit_fuel_type">
                                    <option value="1"><?=$language['farmer']['181']?></option>
                                    <option value="2"><?=$language['farmer']['182']?></option>
                                    <option value="3"><?=$language['farmer']['183']?></option>
                                    <option value="4"><?=$language['farmer']['184']?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="edit_productivity"><?=$language['farmer']['179']?></label>
                            <input class="form-control" type="text" id="edit_productivity" name="edit_productivity">
                        </div>
                        <div class="col-lg-6">
                            <label for="edit_fuel_cons"><?=$language['farmer']['180']?></label>
                            <input class="form-control" type="text" id="edit_fuel_cons" name="edit_fuel_cons">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit"  class="btn btn-primary" value="<?=$language['farmer']['15']?>">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['farmer']['157']?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade  bs-example-modal-lg" id="edit_material" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?=$language['farmer']['159']?></h4>
            </div>
            <div class="modal-body">
                <form method="post" id="edit_material_form" action="javascript:void(null);">
                    <div class="row">
                        <div class="col-lg-12">
                            <input id="edit_id" name="edit_id" type="hidden">
                            <input id="edit_crop" name="edit_crop" type="hidden">
                            <div class="col-lg-12"><br></div>
                            <select id="edit_type_material" name="edit_type_material" class="form-control" required>
                                <option value="1"><?=$language['farmer']['16']?></option>
                                <option value="2"><?=$language['farmer']['17']?></option>
                                <option value="3"><?=$language['farmer']['18']?></option>
                            </select>
                            <div class="col-lg-12"><br></div>
                            <select class="form-control" name="edit_material_subtype" id="edit_material_subtype">
                                <option value="1"><?=$language['farmer']['188']?></option>
                                <option value="2"><?=$language['farmer']['189']?></option>
                                <option value="3"><?=$language['farmer']['190']?></option>
                                <option value="4"><?=$language['farmer']['191']?></option>
                                <option value="5"><?=$language['farmer']['191']?></option>
                                <option value="6"><?=$language['farmer']['193']?></option>
                                <option value="7"><?=$language['farmer']['194']?></option>
                            </select>
                        </div>
                        <div class="col-lg-12"><br></div>
                        <div class="col-lg-12">
                            <label for="name_material"><?=$language['farmer']['195']?></label>
                            <input class="form-control" type="text" id="edit_name_material" name="edit_name_material" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="price_material"><?=$language['farmer']['196']?></label>
                            <input class="form-control" type="text" id="edit_price_material" name="edit_price_material" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="qlt_material"><?=$language['farmer']['197']?></label>
                            <input class="form-control" type="text" id="edit_qlt_material" name="edit_qlt_material" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><?=$language['farmer']['15']?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(".select_plan").change(select_plan);
        function select_plan() {
            var id_plan=$(this).attr('data-plan');
            var id_parent=$(this).val();
            $.ajax({
                type: 'POST',
                url: '/farmer/create/parent-plan',
                data: {
                    'id_plan':id_plan,
                    'id_parent':id_parent
                }
            });
        }
        $(".remove_plan").click(remove_plan);
        function remove_plan() {
            var id=$(this).attr('id');
            $.ajax({
                type: 'POST',
                url: '/farmer/create/remove-plan',
                data: {'id':id},
                success: function() {
                    $('#plan_'+id).remove();
                }
            });
        }
        $('#type_material').change(material_subtype);
        function material_subtype() {
            var id= $(this).val();
            if(id>2) $('#material_subtype').show();
            if(id<3) $('#material_subtype').hide();
        }
        var materials=[];
        $('#material_select_standart, #material_select_my').change(type_material);
        function type_material() {

            var id=$(this).val();
            $('#material_select_standart, #material_select_my').val(id);
            if(id==1){
                $('.material_seeds').show();
                $('.material_fertilizers').hide();
                $('.material_ppa').hide();
            }
            if(id==2){
                $('.material_seeds').hide();
                $('.material_fertilizers').show();
                $('.material_ppa').hide();
            }
            if(id==3){
                $('.material_seeds').hide();
                $('.material_fertilizers').hide();
                $('.material_ppa').show();
            }
        }
        $('.open_my_material').click(open_my_material);
        function open_my_material() {
            var title_type_js='{"1":"Насіння","2":"Добрива","3":"ЗЗР"}';
            var title_type =JSON.parse(title_type_js);
            var type_material = $(this).attr('data-type');
            var name_material = $(this).attr('data-name');
            var id = $(this).attr('data-id');
            $("#list_material").append("<tr id='my_plan_material_"+id+"'><th>"+title_type[type_material]+"</th><th>" + name_material + "</th>" +
                "<th><button class='btn btn-danger btn-sm remove_material' id='"+id+"' ><i class='fa fa-fw fa-close'></i></button></th></tr>");
            materials.push( id );
            $("#plan_id_material").val(materials);
        }
        $('.open_material').click(open_material);
        function open_material() {
            $('.in').removeClass('active');
            $('#in_new_material').addClass('active');
            var type_material = $(this).attr('data-type');
            var material_subtype= $(this).attr('data-subtype');
            var name_material = $(this).attr('data-name');
            var qlt_material = $(this).attr('data-qlt');
            var price_material = $(this).attr('data-price');

            if(type_material>2) $('#material_subtype').show();
            if(type_material<3) $('#material_subtype').hide().val(material_subtype);
            $('#name_material').val(name_material);
            $('#type_material').val(type_material);
            $('#qlt_material').val(qlt_material);
            $('#price_material').val(price_material);
        }
        $("#new_material_form").submit(save_material);
        function save_material() {
            var title_type_js='{"1":"Насіння","2":"Добрива","3":"ЗЗР"}';
            var title_type =JSON.parse(title_type_js);
            var type_material=$('#type_material').val();
            var form   = $('#new_material_form').serialize();
            $.ajax({
                type: 'POST',
                url: '/farmer/create/create-material',
                data: form,
                success: function(id) {
                    $("#list_material").append("<tr id='my_plan_material_"+id+"'><th>"+title_type[type_material]+"</th><th>" + $('#name_material').val() + "</th>" +
                        "<th><button class='btn btn-danger btn-sm remove_material' id='"+id+"' ><i class='fa fa-fw fa-close'></i></button></th></tr>");
                    materials.push( id );
                    $("#plan_id_material").val(materials);
                }
            });
        }
        $('#list_material').on('click', '.remove_material', remove_material);
        function remove_material() {
            var id=$(this).attr('id');
            materials = "["+materials+"]";
            materials = JSON.parse(materials);
            for (var key in materials) {
                if(materials[key]==id) materials[key]=0;
            }
            $('#my_plan_material_'+id).remove();
            $("#plan_id_material").val(materials);
        }
        $('.open_action').click(open_action);
        function open_action() {
            $('.in').removeClass('active');
            $('#in_new_action').addClass('active');
            var name_action=$(this).attr('data-name_action');
            var drivers=$(this).attr('data-drivers');
            var driver_class=$(this).attr('data-driver_class');
            var driver_bonus=$(this).attr('data-driver_bonus');
            var workers=$(this).attr('data-workers');
            var worker_class=$(this).attr('data-worker_class');
            var worker_bonus=$(this).attr('data-worker_bonus');
            var name_power=$(this).attr('data-name_power');
            var name_working=$(this).attr('data-name_working');
            var fuel_type=$(this).attr('data-fuel_type');
            var productivity=$(this).attr('data-productivity');
            var fuel_cons=$(this).attr('data-fuel_cons');
            $('#name_action').val(name_action);
            $('#drivers').val(drivers);
            $('#driver_bonus').val(driver_bonus);
            $('#workers').val(workers);
            $('#worker_bonus').val(worker_bonus);
            $('#driver_class').val(driver_class);
            $('#worker_class').val(worker_class);
            $('#name_power').val(name_power);
            $('#name_working').val(name_working);
            $('#fuel_type').val(fuel_type);
            $('#productivity').val(productivity);
            $('#fuel_cons').val(fuel_cons);
        }
        $("#new_actions").submit(save_action);
        function save_action() {
            var form   = $('#new_actions').serialize();
            $.ajax({
                type: 'POST',
                url: '/farmer/create/create-action',
                data: form,
                success: function(id) {
                    $("#plan_id_action").val(id);
                    var name_action=$('#name_action').val();
                    $('#plan_action_name').text(name_action);
                    $('#operating').modal('hide');
                }
            });
        }
        $(".open_my_action").click(open_my_action);
        function open_my_action() {
            var id=$(this).attr("data-id_action");
            var name_action=$(this).attr('data-name_action');
            $('#operating').modal('hide');
            $('#plan_action_name').text(name_action);
            $("#plan_id_action").val(id);
        }
        $('.open_edit_action').click(open_edit_action);
        function open_edit_action() {
            var json_action=$(this).attr('data-data');
            var action=JSON.parse( json_action );
            $('#edit_action').modal('show');
            $('#edit_action_id').val(action['id']);
            $('#edit_name_action').val(action['name_action']);
            $('#edit_drivers').val(action['drivers']);
            $('#edit_driver_bonus').val(action['driver_bonus']);
            $('#edit_workers').val(action['workers']);
            $('#edit_worker_bonus').val(action['worker_bonus']);
            $('#edit_driver_class').val(action['driver_class']);
            $('#edit_worker_class').val(action['worker_class']);
            $('#edit_name_power').val(action['name_power']);
            $('#edit_name_working').val(action['name_working']);
            $('#edit_fuel_type').val(action['fuel_type']);
            $('#edit_productivity').val(action['productivity']);
            $('#edit_fuel_cons').val(action['fuel_cons']);
        }
        $("#form_edit_actions").submit(save_edit_action);
        function save_edit_action() {
            var form   = $('#form_edit_actions').serialize();
            $.ajax({
                type: 'POST',
                url: '/farmer/create/save-edit-action',
                data: form,
                success: function(name) {
                    var id_action=$('#edit_action_id').val();
                    $("#my_action_name_"+id_action).text(name);
                    $("#form_edit_actions input").val('')
                   $('#edit_action').modal('hide');
                }
            });
        }
        $('.edit_material').click(edit_material);
        function edit_material() {
            $('#edit_material').modal('show');
            var id_mayerial=$(this).attr('data-id');
            var crop=$(this).attr('data-crop');
            var type_material=$(this).attr('data-type');
            var subtype=$(this).attr('data-subtype');
            var name=$(this).attr('data-name');
            var qlt=$(this).attr('data-qlt');
            var price =$(this).attr('data-price');
            if(type_material>2) $('#edit_material_subtype').show();
            if(type_material<3) $('#edit_material_subtype').hide();
            $('#edit_id').val(id_mayerial);
            $('#edit_crop').val(crop);
            $('#edit_type_material').val(type_material);
            $('#edit_material_subtype').val(subtype);
            $('#edit_name_material').val(name);
            $('#edit_qlt_material').val(qlt);
            $('#edit_price_material').val(price);
        }
        $('#edit_type_material').change(function () {
            var type_material=$(this).val();
            if(type_material>2) $('#edit_material_subtype').show();
            if(type_material<3) $('#edit_material_subtype').hide();
        });
        $("#edit_material_form").submit(save_edit_material);
        function save_edit_material() {
            var form = $('#edit_material_form').serialize();
            var edit_id =$('#edit_id').val();
            var edit_crop =$('#edit_crop option:selected').text();
            var edit_type_material =$('#edit_type_material option:selected').text();
            var edit_material_subtype =$('#edit_material_subtype').val();
            var edit_name_material =$('#edit_name_material').val();
            var edit_qlt_material =$('#edit_qlt_material').val();
            var edit_price_material =$('#edit_price_material').val();
            $.ajax({
                type: 'POST',
                url: '/farmer/create/save-edit-material',
                data: form,
                success: function() {
                    $('#edit_material_form input').val('');
                    $('#edit_material').modal('hide');
                    $('#m_'+edit_id+' .data_type').text(edit_type_material);
                    $('#m_'+edit_id+' .data_crop').text(edit_crop);
                    $('#m_'+edit_id+' .data_name').text(edit_name_material);
                    $('#m_'+edit_id+' .data_qlt').text(edit_qlt_material);
                    $('#m_'+edit_id+' .data_price').text(edit_price_material);
                }
            });
        }
    });
</script>