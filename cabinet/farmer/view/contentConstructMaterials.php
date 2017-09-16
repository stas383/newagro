<style>
    #material_subtype, #new_material_subtype{
        display: none;
    }
</style>
<section class="content">
    <div class="box box-success ">
        <div class="box-header">
            <h3 class="box-title"><?=$language['farmer']['145']?></h3>
            <div class="box-tools">
                <a data-toggle="modal" data-target="#new_material" class=" btn btn-success btn-sm"><?=$language['farmer']['216']?></a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-2">
                    <div class="box">
                        <div class="box-head">
                        </div>
                        <div class="box-body">
                            <select class="form-control" id="crop_id">
                                <option value=""><?=$language['farmer']['70']?></option>
                                <?php foreach ($date['crop_head'] as $key=>$value){ ?>
                                <option value="<?=$key ?>"><?=$value?></option>
                                <?php }?>
                            </select>
                            <br>
                            <select id="type_material" name="type_material" class="form-control">
                                <option value="0"><?=$language['farmer']['200']?></option>
                                <?php 
                                if($_COOKIE['lang']=='ua'){
                                    foreach ($date['type_material_ua'] as $key=>$value){ ?>
                                    <option value="<?=$key ?>"><?=$value?></option>
                                <?php }}
                                elseif ($_COOKIE['lang']=='gb') {
                                   foreach ($date['type_material_en'] as $key=>$value){ ?>
                                    <option value="<?=$key ?>"><?=$value?></option>
                                <?}}?>
                            </select>
                            <br>
                            <select class="form-control" name="material_subtype" id="material_subtype">
                                <option value="0"><?=$language['farmer']['217']?></option>
                                <?php 
                                if($_COOKIE['lang']=='ua'){
                                    foreach ($date['material_subtype_ua'] as $key=>$value){ ?>
                                    <option value="<?=$key ?>"><?=$value?></option>
                                <?php }}
                                elseif ($_COOKIE['lang']=='gb') {
                                   foreach ($date['material_subtype_en'] as $key=>$value){ ?>
                                    <option value="<?=$key ?>"><?=$value?></option>
                                <?}}?>
                            </select>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?=$language['farmer']['70']?></th>
                                <th><?=$language['farmer']['200']?></th>
                                <th><?=$language['farmer']['218']?></th>
                                <th><?=$language['farmer']['197']?></th>
                                <th><?=$language['farmer']['196']?></th>
                            </tr>
                        </thead>
                        <tbody class="bd">
                        <?php foreach ($date['agri_material'] as $materials ){

                            ?>
                            <tr id="m_<?php echo $materials['id_material']?>" class="material <?php echo 'crop_'.$materials['id_crop'].' '.'type_'.$materials['type_material'].' '.'subtype_'.$materials['subtype_material'].' '?>    ">

                                <td class="data_crop"><?php echo $date['crop_head'][$materials['id_crop']]?></td>
                                <td class="data_type">
                                    <?php

                                    if($_COOKIE['lang']=='ua'){echo $date['type_material_ua'][$materials['type_material']];
                                    if($materials['type_material']==3) echo ' / '.$date['material_subtype_ua'][$materials['subtype_material']];}elseif ($_COOKIE['lang']=='gb') {
                                        echo $date['type_material_en'][$materials['type_material']];
                                        if($materials['type_material']==3) echo ' / '.$date['material_subtype_en'][$materials['subtype_material']];
                                    }
                                    ?>
                                </td>
                                <td class="data_name"><?php echo $materials['name_material']?></td>
                                <td class="data_qlt"><?php echo $materials['qlt_material']?></td>
                                <td class="data_price"><?php echo $materials['price_material']?></td>
                                <td><a
                                        data-id="<?php echo $materials['id_material']?>"
                                        data-crop="<?php echo $materials['id_crop']?>"
                                        data-type="<?php echo $materials['type_material']?>"
                                        data-subtype="<?php echo $materials['subtype_material']?>"
                                        data-name="<?php echo $materials['name_material']?>"
                                        data-qlt="<?php echo $materials['qlt_material']?>"
                                        data-price="<?php echo $materials['price_material']?>"
                                        data-toggle="modal" data-target="#material" class="edit_material btn btn-warning btn-sm"><i class="fa fa-fw fa-pencil"></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade  bs-example-modal-lg" id="material" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?=$language['farmer']['28']?></h4>
            </div>
            <div class="modal-body">
                <form method="post" id="edit_material_form" action="javascript:void(null);">
                    <div class="row">
                        <div class="col-lg-12">
                            <input id="edit_id" name="edit_id" type="hidden">
                            <select class="form-control"id="edit_crop" name="edit_crop">
                                <?php foreach ($date['crop_head'] as $key=>$value){ ?>
                                    <option value="<?=$key ?>"><?=$value?></option>
                                <?php }?>
                            </select>
                            <div class="col-lg-12"><br></div>
                            <select id="edit_type_material" name="edit_type_material" class="form-control" required>
                                <?php 
                                if($_COOKIE['lang']=='ua'){
                                    foreach ($date['type_material_ua'] as $key=>$value){ ?>
                                    <option value="<?=$key ?>"><?=$value?></option>
                                <?php }}
                                elseif ($_COOKIE['lang']=='gb') {
                                   foreach ($date['type_material_en'] as $key=>$value){ ?>
                                    <option value="<?=$key ?>"><?=$value?></option>
                                <?}}?>
                            </select>
                            <div class="col-lg-12"><br></div>
                            <select class="form-control" name="edit_material_subtype" id="edit_material_subtype">
                                <?php 
                                if($_COOKIE['lang']=='ua'){
                                    foreach ($date['material_subtype_ua'] as $key=>$value){ ?>
                                    <option value="<?=$key ?>"><?=$value?></option>
                                <?php }}
                                elseif ($_COOKIE['lang']=='gb') {
                                   foreach ($date['material_subtype_en'] as $key=>$value){ ?>
                                    <option value="<?=$key ?>"><?=$value?></option>
                                <?}}?>
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
<div class="modal fade  bs-example-modal-lg" id="new_material" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?=$language['farmer']['187']?></h4>
            </div>
            <div class="modal-body">
                <form method="post" id="new_material_form" action="javascript:void(null);">
                    <div class="row">
                        <div class="col-lg-12">
                            <select class="form-control" id="crop_id" name="crop_id">
                                <?php foreach ($date['crop_head'] as $key=>$value){ ?>
                                    <option value="<?=$key ?>"><?=$value?></option>
                                <?php }?>
                            </select>
                            <div class="col-lg-12"><br></div>
                            <select id="new_type_material" name="type_material" class="form-control" required>
                                <?php 
                                if($_COOKIE['lang']=='ua'){
                                    foreach ($date['type_material_ua'] as $key=>$value){ ?>
                                    <option value="<?=$key ?>"><?=$value?></option>
                                <?php }}
                                elseif ($_COOKIE['lang']=='gb') {
                                   foreach ($date['type_material_en'] as $key=>$value){ ?>
                                    <option value="<?=$key ?>"><?=$value?></option>
                                <?}}?>
                            </select>
                            <div class="col-lg-12"><br></div>
                            <select class="form-control" name="material_subtype" id="new_material_subtype">
                                <?php 
                                if($_COOKIE['lang']=='ua'){
                                    foreach ($date['material_subtype_ua'] as $key=>$value){ ?>
                                    <option value="<?=$key ?>"><?=$value?></option>
                                <?php }}
                                elseif ($_COOKIE['lang']=='gb') {
                                   foreach ($date['material_subtype_en'] as $key=>$value){ ?>
                                    <option value="<?=$key ?>"><?=$value?></option>
                                <?}}?>
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
                    <div class="modal-footer">
                        <input type="submit"  class="btn btn-primary" value="<?=$language['farmer']['163']?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#crop_id, #type_material, #material_subtype').change(filter);
        function filter() {
            var crop_id=$('#crop_id').val();
            var type_material=$('#type_material').val();
            var material_subtype=$('#material_subtype').val();
            $('.material').show();
            if(crop_id!= 0){
                $('.bd tr:not(.crop_'+crop_id+')').hide();
            }
            if(type_material!= 0){
                $('.bd tr:not(.type_'+type_material+')').hide();
            }
            if(material_subtype!= 0 && type_material==3){
                $('.bd tr:not(.subtype_'+material_subtype+')').hide();
            }
            if(type_material>2) $('#material_subtype').show();
            if(type_material<3) $('#material_subtype').hide();
        }
        $('.edit_material').click(edit_material);
        function edit_material() {
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
                    $('#material').modal('hide');
                    $('#m_'+edit_id+' .data_type').text(edit_type_material);
                    $('#m_'+edit_id+' .data_crop').text(edit_crop);
                    $('#m_'+edit_id+' .data_name').text(edit_name_material);
                    $('#m_'+edit_id+' .data_qlt').text(edit_qlt_material);
                    $('#m_'+edit_id+' .data_price').text(edit_price_material);
                }
            });
        }
        $('#new_type_material').change(material_subtype);
        function material_subtype() {
            var id = $(this).val();
            if(id>2) $('#new_material_subtype').show();
            if(id<3) $('#new_material_subtype').hide();
        }
        $("#new_material_form").submit(save_new_material);
        function save_new_material() {
            var form   = $('#new_material_form').serialize();
            $.ajax({
                type: 'POST',
                url: '/farmer/create/create-material',
                data: form,
                success: function() {
                    $('#new_material_form input').val('');
                    $('#new_material').modal('hide');
                }
            });
        }
    });
</script>