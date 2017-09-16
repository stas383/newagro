<?php ?>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Поля</h3>
            <div class="box-tools">
                <a class="btn btn-success" href="#createField" data-toggle="modal">Створити посів</a>
            </div>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Номер поля</th>
                        <th>Площа (га)</th>
                        <th>Культура</th>
                        <th>Врожайність, т/га</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($date['sowing'] as $field){?>
                    <tr>
                        <td><?=$date['field_list'][$field['id_field']]['field_number']?></td>
                        <td><?=$date['field_list'][$field['id_field']]['field_area']?></td>
                        <td><?=$date['crop'][$field['id_crop']]?></td>
                        <td><?=$field['sowing_yield']?></td>
                        <td><a class="btn btn-warning fa fa-pencil edit_open" data-id="<?=$field['id_sowing']?>" data-yield="<?=$field['sowing_yield']?>" data-number="<?=$date['field_list'][$field['id_field']]['field_number']?>" data-crop='<?=$date['crop'][$field['id_crop']]?>' data-area="<?=$date['field_list'][$field['id_field']]['field_area']?>"></a></td>
                    </tr>
                <?}?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<div id="createField" class="modal fade">
    <div class="modal-dialog modal-md">
        <form action="/business-farmer/create_sowing" method="post">
            <div class="modal-content">
                <div class="box-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="box-title">Створити посів</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Номер поля</label>
                            <select class="form-control id_field" name="id_field" id="" required>
                                <?foreach ($date['field_list'] as $field_list)if (!in_array($field_list['id_field'], $date['field_sowing'])) {?>
                                    <option value="<?=$field_list['id_field']?>"><?=$field_list['field_number']?></option>
                                <?}?>
                            </select>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label>Площа (га)</label>
                            <input type="text" class="form-control field_area" id="" disabled>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label>Культура</label>
                            <input list="crop_list" class="form-control" name="id_crop">
                            <datalist  id="crop_list">
                                <?foreach ($date['crop'] as $crop_key=>$crop_value){?>
                                    <option><?=$crop_value?></option>
                                <?}?>
                            </datalist>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label>Врожайність, т/га</label>
                            <input class="form-control" type="text" name="sowing_yield">
                            <br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primaryn">Добавить</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="editSowing" class="modal fade">
    <div class="modal-dialog modal-md">
        <form action="/business-farmer/edit_sowing" method="post">
            <input type="hidden" name="id_sowing" id="ed_id_sowing">
            <div class="modal-content">
                <div class="box-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="box-title">Створити посів</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Культура</label>
                            <input list="crop_list" class="form-control" id="ed_id_crop" name="id_crop">
                            <datalist  id="crop_list">
                                <?foreach ($date['crop'] as $crop_key=>$crop_value){?>
                                    <option><?=$crop_value?></option>
                                <?}?>
                            </datalist>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label>Врожайність, т/га</label>
                            <input class="form-control" type="text" id="ed_sowing_yield" name="sowing_yield">
                            <br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primaryn">Добавить</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        var field_json='<?=json_encode($date['field_list'])?>';
        var field=JSON.parse(field_json);
        $('.id_field').change(area_field);
        function area_field() {
            var id_field=$('.id_field').val();
            $('.field_area').val(field[id_field]['field_area'])
        }
        $('.edit_open').click(edit_open);
        function edit_open() {
            $('#editSowing').modal('show');
            var ed_id_sowing=$(this).attr('data-id');
            var ed_id_crop=$(this).attr('data-crop');
            var ed_sowing_yield=$(this).attr('data-yield');
            $('#ed_id_sowing').val(ed_id_sowing);
            $('#ed_id_crop').val(ed_id_crop);
            $('#ed_sowing_yield').val(ed_sowing_yield);
        }
    });
</script>