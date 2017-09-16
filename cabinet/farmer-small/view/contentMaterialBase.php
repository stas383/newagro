

        <div class="box-body">
            <div class="row">
                <div class="col-lg-2">
                    <div class="box">
                        <div class="box-head">
                        </div>
                        <div class="box-body">
                            <select class="form-control" id="crop_id">
                                <option value="0"><?=$language['farmer-small']['24']?></option>
                                <?php foreach ($date['crops'] as $value){ ?>
                                <option value="<?=$value['id']?>"><? if($_COOKIE['lang']=='ua'){echo $value['name_crop_ua'];} elseif($_COOKIE['lang']=='gb'){echo $value['name_crop_en'];}?></option>
                                <?php }?>
                            </select>
                            <br>
                            <select id="type_material" name="type_material" class="form-control">
                                <option value="0"><?=$language['farmer-small']['98']?></option>
                                <?php foreach ($date['materials'] as $value) if($value['id_action'] ==17 or $value['id_action'] ==18 or $value['id_action'] ==19 or $value['id_action'] ==20 or $value['id_action'] ==21 or $value['id_action'] ==22){ ?>
                                    <option value="<?=$value['id_action'] ?>"><?if($_COOKIE['lang']=='ua'){echo $value['name_ua'];} elseif($_COOKIE['lang']=='gb'){echo $value['name_en'];}?></option>
                                <?php }?>
                            </select>
                            <br>

                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?=$language['farmer-small']['65']?></th>
                                <th><?=$language['farmer-small']['98']?></th>
                                <th><?=$language['farmer-small']['67']?></th>
                                <th><?=$language['farmer-small']['91']?></th>
                                <th><?=$language['farmer-small']['96']?></th>
                            </tr>
                        </thead>
                        <tbody class="bd">
                        <?php foreach ($date['base'] as $materials ){

                            ?>
                            <tr id="m_<?php echo $materials['id_material']?>" class="material <?php echo 'crop_'.$materials['id'].' '.'type_'.$materials['id_material_type'].' '.'subtype_'.$materials['subtype_material'].' '?>    ">

                                <td class="data_crop"><?php if($_COOKIE['lang']=='ua'){echo $materials['name_crop_ua'];} elseif($_COOKIE['lang']=='gb'){echo $materials['name_crop_en'];}?></td>
                                <td class="data_type_name"><?php if($_COOKIE['lang']=='ua'){echo $materials['material_type_name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $materials['material_type_name_en'];}?></td>
                                <td class="data_name"><?php echo $materials['material_name']?></td>
                                <td class="data_qlt"><?php echo $materials['material_norm']?></td>
                                <td class="data_price"><?php echo $materials['material_price']?></td>
                                <td><a
                                        data-id="<?php echo $materials['id']?>"
                                        data-crop="<?php echo $materials['name_crop_ua']?>"
                                        data-type="<?php echo $materials['material_name']?>"
                                        data-name="<?php echo $materials['name_material']?>"
                                        data-qlt="<?php echo $materials['material_norm']?>"
                                        data-price="<?php echo $materials['material_price']?>"
                                        data-toggle="modal" data-target="#material" class="edit_material btn btn-warning btn-sm"><i class="fa fa-fw fa-pencil"></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade  bs-example-modal-lg" id="material" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?=$language['farmer-small']['93']?></h4>
            </div>
            <div class="modal-body">
                <form method="post" id="edit_material_form" action="javascript:void(null);">
                    <div class="row">
                        <div class="col-lg-12">
                            <input id="edit_id" name="edit_id" type="hidden">
                            <select class="form-control" id="edit_crop" name="edit_crop">
                                <?php foreach ($date['base'] as $value){ ?>
                                    <option value="<?=$key ?>"><?=$value['name_crop_ua']?></option>
                                <?php }?>
                            </select>
                            <div class="col-lg-12"><br></div>
                            <select id="edit_type_material" name="edit_type_material" class="form-control" required>
                                <?php foreach ($date['base'] as $key=>$value){ ?>
                                    <option value="<?=$key ?>"><?=$value['material_type_name_ua']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-lg-12"><br></div>
                        <div class="col-lg-12">
                            <label for="name_material"><?=$language['farmer-small']['94']?></label>
                            <input class="form-control" type="text" id="edit_name_material" name="edit_name_material" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="price_material"><?=$language['farmer-small']['96']?></label>
                            <input class="form-control" type="text" id="edit_price_material" name="edit_price_material" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="qlt_material"><?=$language['farmer-small']['95']?></label>
                            <input class="form-control" type="text" id="edit_qlt_material" name="edit_qlt_material" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><?=$language['farmer-small']['52']?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

        <script type="text/javascript">
            $(document).ready(function () {
        $('#crop_id, #type_material').change(filter);
        function filter() {
            var crop_id=$('#crop_id').val();
            var type_material=$('#type_material').val();
            $('.material').show();
            if(crop_id != 0){
                $('.bd tr:not(.crop_'+crop_id+')').hide();
            }
            if(type_material!= 0){
                $('.bd tr:not(.type_'+type_material+')').hide();
            }
        }
        $('.edit_material').click(edit_material);
        function edit_material() {
            var id_material=$(this).attr('data-id');
            var crop=$(this).attr('data-crop');
            var type_material=$(this).attr('data-type');
            var name=$(this).attr('data-name');
            var qlt=$(this).attr('data-qlt');
            var price =$(this).attr('data-price');

            alert(crop);
            alert(type_material);
            alert(name);
            alert(qlt);
            alert(price);
            $('#edit_id').val(id_material);
            $('#edit_crop').val(crop);
            $('#edit_type_material').val(type_material);
            $('#edit_material_subtype').val(subtype);
            $('#edit_name_material').val(name);
            $('#edit_qlt_material').val(qlt);
            $('#edit_price_material').val(price);
        }

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
    });
        </script>