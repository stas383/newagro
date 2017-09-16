<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 29.06.2017
 * Time: 15:39
 */
$type_material_ua[1]='Насіння';
$type_material_ua[2]='Добрива';
$type_material_ua[3]='ЗЗР';
$type_material_en[1]='Seed';
$type_material_en[2]='Fertilizers';
$type_material_en[3]='PPA';
$materials=explode(',',$date['agri_crop_plan'][0]['id_materials']);

?>
<section class="content">
    <form method="post" action="/farmer/create/save-edit-plan">
        <input name="id_plan" value="<?=$date['id_action']?>" type="hidden">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=$language['farmer']['132']?> / <?=$language['farmer']['199']?></h3>
            <div class="box-tools">
                <button type="submit" class="btn btn-success"><?=$language['farmer']['15']?></button>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                    <input name="plan_id_material" id="plan_id_material" value="<?=$date['agri_crop_plan'][0]['id_materials'] ?>" type="hidden" >
                <div class="col-lg-3">
                    <label for="id_action"><?=$language['farmer']['158']?></label>
                    <select class="form-control" name="id_action" id="id_action">
                        <?php foreach ($date['my_action'] as $my_action){ ?>
                        <option <?php if($date['agri_crop_plan'][0]['id_action'] == $my_action['id']) echo 'selected'?>  value="<?php echo $my_action['id']?>"><?php echo $my_action['name_action']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-2">
                    <label for="strat_date"><?=$language['farmer']['161']?></label>
                    <input class="form-control" type="date" id="start_date" name="start_date" value="<?php echo $date['agri_crop_plan'][0]['start_date']?>">
                </div>
                <div class="col-lg-2">
                    <label for="end_date"><?=$language['farmer']['162']?></label>
                    <input class="form-control" type="date" id="end_date" name="end_date" value="<?php echo $date['agri_crop_plan'][0]['end_date']?>">
                </div>
                <div class="col-lg-5">
                    <h4 class="text-center"><?=$language['farmer']['159']?> </h4>

                    <table class="table">
                        <thead>
                            <tr>
                                <th><?=$language['farmer']['200']?></th>
                                <th><?=$language['farmer']['195']?></th>
                                <th><?=$language['farmer']['197']?></th>
                                <th><?=$language['farmer']['196']?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="list_material">
                        <?php foreach ($materials as $material)if($material!=false){ ?>
                            <tr class="my_plan_material_<?=$material?> m_<?php echo $material?>" >
                                <td><?php if($_COOKIE['lang']=='ua'){echo $type_material_ua[$date['plan_material'][$material]['type_material']];}elseif($_COOKIE['lang']=='gb'){echo $type_material_en[$date['plan_material'][$material]['type_material']];}?></td>
                                <td class="data_name"><?php echo $date['plan_material'][$material]['name_material'] ?></td>
                                <td class="data_qlt"><?php echo $date['plan_material'][$material]['qlt_material'] ?></td>
                                <td class="data_price"><?php echo $date['plan_material'][$material]['price_material'] ?></td>
                                <td><a
                                            data-id="<?php echo  $date['plan_material'][$material]['id_material']?>"
                                            data-crop="<?php echo  $date['plan_material'][$material]['id_crop']?>"
                                            data-type="<?php echo  $date['plan_material'][$material]['type_material']?>"
                                            data-subtype="<?php echo  $date['plan_material'][$material]['subtype_material']?>"
                                            data-name="<?php echo  $date['plan_material'][$material]['name_material']?>"
                                            data-qlt="<?php echo  $date['plan_material'][$material]['qlt_material']?>"
                                            data-price="<?php echo  $date['plan_material'][$material]['price_material']?>"
                                            class="edit_material btn btn-warning btn-sm"><i class="fa fa-fw fa-pencil"></i>
                                    </a>
                                </td>
                                <th><button type="button" class="btn btn-danger btn-sm remove_material" id="<?=$material?>"><i class="fa fa-fw fa-close"></i></button></th>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
                </form>
                <div class="col-lg-5 col-lg-offset-7">
                    <hr>
                    <br>
                    <h4 class="text-center"><?=$language['farmer']['201']?></h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th><?=$language['farmer']['200']?></th>
                            <th><?=$language['farmer']['195']?></th>
                            <th><?=$language['farmer']['197']?></th>
                            <th><?=$language['farmer']['196']?></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($date['plan_material'] as $key=>$value){ ?>
                            <tr class="m_<?php echo $value['id_material']?>">
                                <td><?php if($_COOKIE['lang']=='ua'){echo $type_material_ua[$value['type_material']];}elseif($_COOKIE['lang']=='gb'){echo $type_material_en[$value['type_material']];}?></td>
                                <td class="data_name"><?php echo $value['name_material'] ?></td>
                                <td class="data_qlt"><?php echo $value['qlt_material'] ?></td>
                                <td class="data_price"><?php echo $value['price_material'] ?></td>
                                <td><a
                                            data-id="<?php echo $value['id_material']?>"
                                            data-crop="<?php echo $value['id_crop']?>"
                                            data-type="<?php echo $value['type_material']?>"
                                            data-subtype="<?php echo $value['subtype_material']?>"
                                            data-name="<?php echo $value['name_material']?>"
                                            data-qlt="<?php echo $value['qlt_material']?>"
                                            data-price="<?php echo $value['price_material']?>"
                                            class="edit_material btn btn-warning btn-sm"><i class="fa fa-fw fa-pencil"></i>
                                    </a>
                                </td>
                                <td>
                                    <a data-id="<?php echo $key?>"
                                       data-name="<?php echo $value['name_material']?>"
                                       data-qlt="<?php echo $value['qlt_material']?>"
                                       data-price="<?php echo $value['price_material']?>"
                                       data-type="<?php echo $type_material[$value['type_material']]?>" class="open_my_material btn btn-success btn-sm"><i class="fa fa-fw fa-arrow-right"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
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
                                <option value="5"><?=$language['farmer']['192']?></option>
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
        var materials=[$('#plan_id_material').val()];
        $('.open_my_material').click(open_my_material);
        function open_my_material() {
            var type_material = $(this).attr('data-type');
            var name_material = $(this).attr('data-name');
            var price=$(this).attr('data-price');
            var qlt=$(this).attr('data-qlt');
            var id = $(this).attr('data-id');
            $("#list_material").append("<tr class='my_plan_material_"+id+"'><td>"+type_material+"</td><td>" + name_material + "</td><td>" + qlt +"</td><td>"+ price + "</td>" +
                "<td><button class='btn btn-danger btn-sm remove_material' id='"+id+"' ><i class='fa fa-fw fa-close'></i></button></td></tr>");
            materials.push( id );
            $("#plan_id_material").val(materials);
        }
        $('#list_material').on('click', '.remove_material', remove_material);
        function remove_material() {
            var id=$(this).attr('id');
            materials = "["+materials+"]";
            materials = JSON.parse(materials);
            for (var key in materials) {
                if(materials[key]==id) materials[key]=0;
            }
            $('.my_plan_material_'+id).remove();
            $("#plan_id_material").val(materials);
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
                    $('.m_'+edit_id+' .data_type').text(edit_type_material);
                    $('.m_'+edit_id+' .data_crop').text(edit_crop);
                    $('.m_'+edit_id+' .data_name').text(edit_name_material);
                    $('.m_'+edit_id+' .data_qlt').text(edit_qlt_material);
                    $('.m_'+edit_id+' .data_price').text(edit_price_material);
                }
            });
        }


    });
</script>