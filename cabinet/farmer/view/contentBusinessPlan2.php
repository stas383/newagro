<?php

$tillage_type_ua[1]='традиційний';
$tillage_type_ua[2]='поверхневий';
$tillage_type_ua[3]='мінімальний';

$tillage_type_en[1]='Traditional type';
$tillage_type_en[2]='Surface type';
$tillage_type_en[3]='The minimum type';

?>
<style>
    .my-crops{
        display: none;
    }
</style>
<script>
    $(document).ready(function() {
        $('.my_crop_'+$('#crop_id').val()).show();

        $('#crop_id').change(my_crop);
        function my_crop() {
            var id=$(this).val();
            $('.my-crops').hide();
            $('.my_crop_'+id).show();
        }
    });
</script>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo $language['farmer']['3']?></h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label"><?php echo $language['farmer']['4']?></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="lease" placeholder="<?php echo $language['farmer']['5']?>" value="<?php echo $date['analytica_date'][0]['lease'];?>">
                </div>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Структура посівних площ</h3>
            <div class="box-tools">
                <a data-toggle="modal" data-target="#addCrop" class=" btn btn-success btn-sm">Додати поле</a>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th></th>
                    <th><?php echo $language['farmer']['124']?></th>
                    <th><?php echo $language['farmer']['125']?> 2017, га <b id="total_area_ow"><?php echo $language['farmer']['126']?>(<b id="total_area"></b>га)</b></th>
                    <th><?php echo $language['farmer']['127']?></th>
                    <th><?php echo $language['farmer']['128']?></th>
                </tr>
                <?php foreach ($date['My-crop-1'] as $MyCrop){ ?>
                    <tr>
                        <td><span class="designStatus"><img src="<?php SRC::getSrc(); ?>/cabinet/farmer/template/images/plan_off.svg" alt="" data-toggle="tooltip" data-placement="bottom" title="Використовується стандартна технологічна карта"></span></td>
                        <td> <?php foreach ($date['Crop-1'] as $NameCrop[$MyCrop['id']])if($MyCrop['crop_id']== $NameCrop[$MyCrop['id']]['id_crop']) echo $NameCrop[$MyCrop['id']]['name_crop_ua'] ?></td>
                        <td>
                            <input date-type="area" date-id="<?php echo $MyCrop['id']?>"  type="text" class="form-control classEdit area_plus" value="<?php echo $MyCrop['area']?>" placeholder="<?php echo $language['farmer']['125']?>" >
                        </td>
                        <td>
                            <input date-type="yaled" date-id="<?php echo $MyCrop['id']?>" type="text" class="form-control classEdit" value="<?php echo $MyCrop['yaled']?>" placeholder="<?php echo $language['farmer']['127']?>">
                        </td>
                        <td>
                            <select date-type="tillage" date-id="<?php echo $MyCrop['id']?>" class="form-control select2 classEdit" style="width: 100%;">
                                <?php for ($t = 1; $t <= 3; $t++) {?>
                                    <option value="<?php echo $t?>" <?php if($t==$MyCrop['tillage']) echo "selected"?> ><?php if($_COOKIE['lang']=='ua'){echo $tillage_type_ua[$t];}elseif($_COOKIE['lang']=='gb'){echo $tillage_type_en[$t];}?></option>
                                <?php }?>
                            </select>
                        </td>
                    </tr>
                <?php }?>
                <?php foreach ($date['My-crop-2'] as $MyCrop){ ?>
                    <tr>
                        <td><span class="designStatus"><img src="<?php SRC::getSrc(); ?>/cabinet/farmer/template/images/plan_off.svg" alt="" data-toggle="tooltip" data-placement="bottom" title="Використовується стандартна технологічна карта"></span></td>
                        <td> <?php foreach ($date['Crop-2'] as $NameCrop[$MyCrop['id']])if($MyCrop['crop_id']== $NameCrop[$MyCrop['id']]['id_crop']) echo $NameCrop[$MyCrop['id']]['name_crop_ua'] ?></td>
                        <td>
                            <input date-type="area" date-id="<?php echo $MyCrop['id']?>"  type="text" class="form-control classEdit area_plus" value="<?php echo $MyCrop['area']?>" placeholder="<?php echo $language['farmer']['125']?>" >
                        </td>
                        <td>
                            <input date-type="yaled" date-id="<?php echo $MyCrop['id']?>" type="text" class="form-control classEdit" value="<?php echo $MyCrop['yaled']?>" placeholder="<?php echo $language['farmer']['127']?>">
                        </td>
                        <td>
                            <select date-type="tillage" date-id="<?php echo $MyCrop['id']?>" class="form-control select2 classEdit" style="width: 100%;">
                                <?php for ($t = 1; $t <= 3; $t++) {?>
                                    <option value="<?php echo $t?>" <?php if($t==$MyCrop['tillage']) echo "selected"?> ><?php if($_COOKIE['lang']=='ua'){echo $tillage_type_ua[$t];}elseif($_COOKIE['lang']=='gb'){echo $tillage_type_en[$t];}?></option>
                                <?php }?>
                            </select>
                        </td>
                    </tr>
                <?php }?>
                <?php foreach ($date['My-crop-3'] as $MyCrop){ ?>
                    <tr>
                        <td><span class="designStatus"><img src="<?php SRC::getSrc(); ?>/cabinet/farmer/template/images/plan.svg" alt="" data-toggle="tooltip" data-placement="bottom" title="Використовується власна технологічна карта"></span></td>
                        <td> <?php echo  $date['agri_crop_head'][$MyCrop['crop_id']]['name'] ?></td>
                        <td>
                            <input date-type="area" date-id="<?php echo $MyCrop['id']?>"  type="text" class="form-control classEdit area_plus" value="<?php echo $MyCrop['area']?>" placeholder="<?php echo $language['farmer']['125']?>" >
                        </td>
                        <td>
                            <input date-type="yaled" date-id="<?php echo $MyCrop['id']?>" type="text" class="form-control classEdit" value="<?php echo $MyCrop['yaled']?>" placeholder="<?php echo $language['farmer']['127']?>">
                        </td>
                        <td class="text-center">
                            <?if($_COOKIE['lang']=='ua'){echo "власний";}
                            elseif($_COOKIE['lang']=="gb"){echo "own";}?>
                        </td>
                    </tr>
                <?php }?>
            </table>
        </div>
    </div>
</section>
<div class="example-modal">
    <div class="modal fade  bs-example-modal-lg" id="addCrop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Створити нове поле</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/farmer/add-crop-list">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="name_field">Назва поля</label>
                                <input class="form-control" type="text" id="name_field" name="name_field">
                            </div>
                            <div class="col-lg-6">
                                <label for="area_field">Площа поля</label>
                                <input class="form-control" type="text" id="area" name="area">
                            </div>
                            <div class="col-lg-12">
                                <label for="area_field">Культура</label>
                                <select class="form-control" id="crop_id" name="crop_id">
                                    <?php foreach ($date['Crop-1'] as $AddCrop1){?>
                                        <option value="<?=$AddCrop1['id_crop']?>-1"><?php echo $AddCrop1['name_crop_ua']; ?></option>
                                    <? } ?>
                                    <?php foreach ($date['Crop-2'] as $AddCrop2){?>
                                        <option value="<?=$AddCrop2['id_crop']?>-2"><?php echo $AddCrop2['name_crop_ua']; ?></option>
                                    <? } ?>
                                    <?php foreach ($date['agri_crop_head_sql'] as $AddCrop13){
                                        if($AddCrop13['crop_st']==0){?>
                                        <option value="0"><?php echo $AddCrop13['name_crop_ua']; ?></option>
                                    <? }} ?>
                                </select>
                                <hr>
                            </div>
                            <div>
                                <div class="col-lg-12">
                                    <h3 class="text-center">технологічна карта</h3>
                                </div>
                                <div class="col-lg-6">
                                    <h4 class="text-center">cтандартна</h4>
                                    <div class="form-group">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" value="s-1" checked="">
                                                традиційна
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" value="s-2">
                                                поверхнева
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" value="s-3">
                                                мінімальна
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h4 class="text-center">власна</h4>
                                    <?php
                                        foreach ($date['agri_crop_head_sql'] as $AddCrop13){
                                        $AgriCrop = preg_split("/[,-]+/", $AddCrop13['crop_st']);
                                            ?>
                                            <div class="radio my-crops my_crop_<?=$AddCrop13['crop_st']?>" >
                                                <label>
                                                    <input type="radio" name="optionsRadios" value="v-<?php echo $AddCrop13['id_crop']; ?>">
                                                    <?php echo $AddCrop13['name_crop_ua']; ?>
                                                </label>
                                            </div>
                                        <?php }?>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn">save</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.area_plus').keyup(total_area);
        $(document).ready(total_area);
        function total_area() {
            var total_area=0;
            $(".area_plus").each(function(){
                var area=parseFloat($(this).val());
                if(isNaN(area)) area=0;

                total_area += area;
            });
            $('#total_area').text(total_area);
        }
        $('.classEdit').change(edit);
        function edit() {
            var type = $(this).attr('date-type');
            var id = $(this).attr('date-id');
            var value = $(this).val();
            $.ajax({
                type : 'post',
                url : '/farmer/edit-save-crop-list',
                data : {
                    'id' :  id,
                    'type' : type,
                    'value' : value
                },
                response : 'text',
                success : function(html) {
                    $('#truy').html(html).show(200);
                    setTimeout(function() {
                        $('#truy').hide(200);
                    }, 4000);
                }
            });
        }
        $('#crop_shop').change(sell_crop);
        function sell_crop() {
            var crop= $(this).val();
            $('#hiden_on').css({
                'display': 'none'
            });
            $.ajax({
                type : 'post',
                url : '/farmer/store-plan',
                data : {
                    'crop' :  crop
                },
                response : 'text',
                success : function(html) {
                    $("#store_plan").html(html);
                }
            });
        }
        $('#store_plan').on('click', '.in-stope', in_store);
        function in_store() {
            $('#store_nt1').hide(500);
            $('#store_nt2').show(500);
            var crop = $(this).attr('data-crop');
            var plan = $(this).attr('data-plan');
            var nomer = $(this).attr('data-nomer');
            var type = $(this).attr('data-type');
            $.ajax({
                type : 'post',
                url : '/farmer/store-list',
                data : {
                    'plan' :  plan,
                    'nomer' : nomer,
                    'type' : type,
                    'crop' : crop
                },
                response : 'text',
                success : function(html) {
                    $("#store_list_material").html(html);
                }
            });
        }
        $('#store_btn_nt1').click(open_store_1);
        function open_store_1() {
            $('#store_nt1').show(500);
            $('#store_nt2').hide(500);
        }
        $('#lease').change(save_lease);
        function save_lease() {
            var value=$('#lease').val();
            $.ajax({
                type : 'post',
                url : '/farmer/edit-lease',
                data : {
                    'value' : value
                }
            });
        }
    });
</script>
