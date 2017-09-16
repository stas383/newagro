<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 17.08.2017
 * Time: 12:29
 */
?>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Поля</h3>
            <div class="box-tools">
                <a class="btn btn-success" href="#createField" data-toggle="modal">Додати поле</a>
            </div>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Номер</th>
                        <th>Площа (га)</th>
                        <th>Виробничий підрозділ</th>
                        <th>Природна зона</th>
                        <th>Тип угідь</th>
                        <th>Тип грунту</th>
                        <th>Відстань до МТП</th>
                        <th>Примітка</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($date['field'] as $field){?>
                    <tr>
                        <td><?=$field['field_number']?></td>
                        <td><?=$field['field_area']?></td>
                        <td><?=$field['field_subdivision']?></td>
                        <td><?=$date['zone'][$field['field_zone']]?></td>
                        <td><?=$date['type_land'][$field['field_type_land']]?></td>
                        <td><?=$date['type_soil'][$field['field_type_soil']]?></td>
                        <td><?=$field['field_distance']?></td>
                        <td><?=$field['field_note']?></td>
                        <td><a class="btn btn-warning fa fa-pencil edit_open" data-data='<?=json_encode($field)?>'></a></td>
                    </tr>
                <?}?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<div id="createField" class="modal fade">
    <div class="modal-dialog modal-md">
        <form action="/business-farmer/create_field" method="post">
            <div class="modal-content">
                <div class="box-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="box-title">Додати поле</h5>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Номер поля</label>
                            <input class="form-control" type="text" name="field_number">
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label>Площа (га)</label>
                            <input class="form-control" type="text" name="field_area">
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label>Виробничий підрозділ</label>
                            <input class="form-control" type="text" name="field_subdivision">
                            <br>
                        </div>
                        <div class="col-lg-6">

                            <label>Природна зона</label>
                            <select class="form-control" name="field_zone">
                                <?foreach ($date['zone'] as $zone_key=>$zone_value){?>
                                    <option value="<?=$zone_key?>"><?=$zone_value?></option>
                                <?}?>
                            </select>
                            <br>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <label>Тип угідь</label>
                            <select class="form-control" name="field_type_land">
                                <?php foreach ($date['type_land'] as $key=>$value){?>
                                    <option value="<?=$key?>"><?=$value?></option>
                                <?}?>
                            </select>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label>Тип грунту</label>
                            <select class="form-control" name="field_type_soil">
                                <?php foreach ($date['type_soil'] as $key=>$value){?>
                                    <option value="<?=$key?>"><?=$value?></option>
                                <?}?>
                            </select>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label>Примітка</label>
                            <textarea name="field_note" class="form-control"></textarea>
                        </div>
                        <div class="col-lg-6">
                            <label>Відстань до МТП</label>
                            <input class="form-control" type="text" name="field_distance">
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

<div id="editField" class="modal fade">
    <div class="modal-dialog modal-md">
        <form action="/business-farmer/create_field" method="post">
            <div class="modal-content">
                <div class="box-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="box-title">редагувати поле</h5>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Номер поля</label>
                            <input class="form-control" type="text" id="ed_field_number" name="field_number">
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label>Площа (га)</label>
                            <input class="form-control" type="text" id="ed_field_area" name="field_area">
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label>Виробничий підрозділ</label>
                            <input class="form-control" type="text" id="ed_field_subdivision" name="field_subdivision">
                            <br>
                        </div>
                        <div class="col-lg-6">

                            <label>Природна зона</label>
                            <select class="form-control" id="ed_field_zone" name="field_zone">
                                <?foreach ($date['zone'] as $zone_key=>$zone_value){?>
                                    <option value="<?=$zone_key?>"><?=$zone_value?></option>
                                <?}?>
                            </select>
                            <br>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-6">
                            <label>Тип угідь</label>
                            <select class="form-control" id="ed_field_type_land" name="field_type_land">
                                <?php foreach ($date['type_land'] as $key=>$value){?>
                                    <option value="<?=$key?>"><?=$value?></option>
                                <?}?>
                            </select>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label>Тип грунту</label>
                            <select class="form-control" id="ed_field_type_soil" name="field_type_soil">
                                <?php foreach ($date['type_soil'] as $key=>$value){?>
                                    <option value="<?=$key?>"><?=$value?></option>
                                <?}?>
                            </select>
                            <br>
                        </div>
                        <div class="col-lg-6">
                            <label>Примітка</label>
                            <textarea id="ed_field_note" name="field_note" class="form-control"></textarea>
                        </div>
                        <div class="col-lg-6">
                            <label>Відстань до МТП</label>
                            <input class="form-control" type="text" id="ed_field_distance" name="field_distance">
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
        $('.edit_open').click(edit_open);
        function edit_open() {
            $('#editField').modal('show');

            var field_json=$(this).attr('data-data');
            var field=JSON.parse( field_json );

            $('#ed_field_number').val(field['field_number']);
            $('#ed_field_subdivision').val(field['field_subdivision']);
            $('#ed_field_zone').val(field['field_zone']);
            $('#ed_field_area').val(field['field_area']);
            $('#ed_field_type_land').val(field['field_type_land']);
            $('#ed_field_type_soil').val(field['field_type_soil']);
            $('#ed_field_distance').val(field['field_distance']);
            $('#ed_field_note').val(field['field_note']);

            
        }
    })
</script>

