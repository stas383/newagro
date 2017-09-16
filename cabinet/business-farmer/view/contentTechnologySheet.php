<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Технологічні карти</h3>
            <div class="box-tools">
                <button class="btn btn-success" href="#createTechnology" data-toggle="modal">Додати</button>
            </div>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>№</th>
                        <th>назва</th>
                        <th>культура</th>
                        <th>поле</th>
                        <th>примітка</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($date['tc'] as $tc){?>
                    <tr>
                        <td><?=$tc['id_technology']?></td>
                        <td><?=$tc['technology_name']?></td>
                        <td><?=$date['crop'][$tc['id_crop']]?></td>
                        <td><?=$date['field_list']['tc_field'][$tc['id_technology']]?></td>
                        <td><?=$tc['technology_note']?></td>
                        <td>
                            <a class="btn"><i class="fa fa-fw fa-pencil"></i></a>
                            <a href="/business-farmer/copy_technology/<?=$tc['id_technology']?>" class="btn"><i class="fa fa-fw fa-copy"></i></a>
                            <a href="/business-farmer/edit_technology/<?=$tc['id_technology']?>" class="btn"><i class="fa fa-fw fa-folder-open-o"></i></a>
                        </td>
                    </tr>
                <?}?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<div id="createTechnology" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <form method="post" action="/business-farmer/create_technology">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Додати технологічну карту</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Назва</label>
                            <input class="form-control" type="text" name="technology_name">
                        </div>
                        <div class="col-lg-6">
                            <label>Культура</label>
                            <input list="crop_list" class="form-control" id="id_crop" name="id_crop">
                            <datalist  id="crop_list">
                                <?foreach ($date['crop'] as $crop_key=>$crop_value){?>
                                    <option id="crop_<?=str_replace(" ","",$crop_value);?>" data-id="<?=$crop_key?>"><?=$crop_value?></option>
                                <?}?>
                            </datalist>
                        </div>
                        <div class="col-lg-6">
                            <label>Примітка</label>
                            <textarea class="form-control" name="technology_note"></textarea>
                        </div>
                        <div class="col-lg-6">
                            <label>Поле</label>
                            <select class="form-control" name="id_field" id="select_field">
                                <option value="0">-</option>
                                <?foreach ($date['field_list']['fields'] as $field_list){?>
                                    <option class="fields field_crop_<?=$field_list['id_crop']?>" value="<?=$field_list['id_field']?>"><?=$field_list['field_name']?></option>
                                <?}?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primaryn">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#id_crop').change(filed_filter);
        function filed_filter() {
            var value=$(this).val().replace(/\s/g,"");
            var id=$("#crop_"+value).attr('data-id');
            $('.fields').hide();
            $('.field_crop_'+id).show();
            $('#select_field').val(0)
        }
    });
</script>