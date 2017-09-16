<?
    $status_card = array(
        0=>'Не затверджено',
        1=>'Затверджено'
    );
?>

<head>
    <style type="text/css">
        .tech_cart{
    margin-top: 35px;
    padding-left: 10px;
    padding-right: 10px;
    text-align: center;
    }
    .tech_head>label{
        text-align: center;
        font-size: 20px!important;
    }
    </style>
    <script src="http://thecodeplayer.com/uploads/js/prefixfree-1.0.7.js" type="text/javascript"></script>
</head>

<? //var_dump($date['rent_pay']);die;?>
<div class="box-bodyn">
        <div class="non-semantic-protector">
            <h1 class="ribbon">
                <strong class="ribbon-content"><?=$language['new-farmer']['42']?></strong>
            </h1>
        </div>
<!--    <img src="/cabinet/new-farmer/template/img/le.svg" class="le" width="50px;"><div class=""></div> <img src="/cabinet/new-farmer/template/img/ri.svg" class="ri" width="50px;">-->
</div>
<!--<div class="box head-style">
    <div class="box-body wt">
        <div class="form-group fg">
            <div class="col-sm-2 control-label middle"><img src="/cabinet/new-farmer/template/img/1.png" class="img" width="90px;">
                <img src="/cabinet/new-farmer/template/img/3.svg" class="imgi" width="40px;"></div>
            <label for="inputName" class="col-sm-4 control-label"><?/*=$language['new-farmer']['43']*/?>:</label>
                <div class="col-sm-2 col-left">
                    <input type="text" class="form-control classEdits inphead rent_pay"  id="lease" placeholder="Price" data-type="1" value="<?/*=$date['rent_pay']['value']*/?>" style="margin-bottom: 15px;">
                </div>
        </div>
    </div>
</div>-->
<div class="box-body wt">
    <div class="rown" style="text-align: center">
        <div class="table-responsive">
            <table class="table" style="width: 100%;">
                <thead>
                    <tr class="tabletop">
                       <th style="width: 20px;"><?=$language['new-farmer']['44']?></th>
                       <th><?=$language['new-farmer']['45']?></th>
                       <th><?=$language['new-farmer']['46']?></th>
                       <th><?=$language['new-farmer']['48']?></th>
                       <th><?=$language['new-farmer']['49']?></th>
                       <th></th>
                       <th></th>
                       <th colspan="3" style="text-align: center;">Технологія вирощування</th>
                       <th>Статус ТК</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($date['field'] as $field){ ?>
                    <tr>
                        <td style="width: 5%;"><?=$field['field_number']?></td>
                        <td><?=$field['field_name']?></td>
                        <td style="width: 7%;"  class="edit_field area_plus">
                            <?=$field['field_size']?>
                            </td>
                        <td  style="width: 11%;"><? if($_COOKIE['lang']=='ua'){echo $field['name_crop_ua'];}elseif($_COOKIE['lang']=='gb'){echo $field['name_crop_en'];}?></td>
                       <th style="width: 13%;">
                           <input class="form-control edit_field inphead" value="<?=$field['field_yield']?>" name="field_yield" data-table="3" data-id_field="<?=$field['id_field']?>">
                       </th>
                        <th>
                           <a class="btn btn-warning fa fa-pencil edit_fields" data-data='<?=json_encode($field); ?>'></a>
                        </th>
                        <th>
                            <a href="/new-farmer/remove_field/<?=$field['id_field']?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
                        </th>
                        <th>
                            <button data-field_name="<?=$field['field_name']?>" data-name_culture="<?=$field['name_crop_ua']?>" data-field="<?=$field['id_field']?>" data-size="<?=$field['field_size']?>"  data-crop="<?=$field['field_id_crop']?>"  class="btn btn-primary select_tc">Вибрати технологію</button>
                        </th>
                        <th style="width: 13%;" id="tech_name_field<?=$field['id_field']?>">
                            <?=$date['tech_cart']['tech'][$field['field_id_crop']][$field['field_id_culture']]['tech_name']?>
                        </th>
                        <th ><a id="tech_edit_field<?=$field['id_field']?>" class="btn btn-success" href="/new-farmer/edit_technology_card/<? if($field['field_id_culture']==null){echo '0';}else{echo $field['field_id_culture'];}?>">Переглянути ТК</a></th>
                        <th>
                         <select class="form-control changes_status" data-id="<?=$field['id_field']?>">
                                <? foreach ($status_card as $key=>$value){?>
                                    <option value="<?=$key?>"<?if($field['field_technology_status']==$key){echo "selected";}?> ><?=$value?></option>
                                <?}?>
                            </select>
                        </th>
                    </tr>
                <?php }?>
                    <tr>
                        <th style="font-size: 20px"><?=$language['new-farmer']['50']?></th>
                        <th style="font-size: 20px;"><b id="total_area"></b>, <?=$language['new-farmer']['51']?></th>
                    </tr>
                </tbody>
            </table>
        </div>
    <div style="text-align: center">
        <button type="button" class="btn btn-warning btn-lg sh" data-toggle="modal" data-target="#modal-default" >
            <?=$language['new-farmer']['52']?>
        </button>
    </div>
    </div>
</div>
<div id="Select_tc" class="modal fade">
    <div class="modal-dialog modal-lg">
        <form action="/new-farmer/incoming_products" method="post">
            <div class="modal-content wt">
                <div class="box-bodyn">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <span class="box-title">Вибрати технологію вирощування  <b id="name_culture"></b></span>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Назва технології</th>
                            <th></th>
                        </tr>
                        </thead>
                        <thead id="tech_list">
                        </thead>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                   <!-- <button type="submit" class="btn btn-primaryn"><?/*=$language['new-farmer']['109']*/?></button>-->
                </div>
            </div>
        </form>
    </div>
</div>
<input type="hidden" id="field_id">
<div class="modal fade in" id="modal-default" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <div class="modal-header box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?=$language['new-farmer']['56']?></h4>
            </div>
            <form action="/new-farmer/create_new_field" method="post">
            <div class="modal-body">
                    <div class="row bo">
                        <div class="col-lg-3">
                            <label for="name_field"><?=$language['new-farmer']['44']?></label>
                            <input class="form-control inphead" type="text" name="field_number" required>
                        </div>
                        <div class="col-lg-3">
                            <label for="area_field"><?=$language['new-farmer']['45']?></label>
                            <input class="form-control inphead" type="text" name="field_name" required>
                        </div>
                        <div class="col-lg-3">
                            <label>Тип с/г угідь</label>
                            <select class="form-control inphead" name="field_usage">
                                <?if($_COOKIE['lang']=='ua'){?>
                                    <?php foreach ($date['usage']['ua'] as $usage_id=>$usage_val){?>
                                        <option value="<?=$usage_id?>"><?=$usage_val?></option>
                                    <?}}?>
                                <?if($_COOKIE['lang']=='gb'){?>
                                    <?php foreach ($date['usage']['gb'] as $usage_id=>$usage_val){?>
                                        <option value="<?=$usage_id?>"><?=$usage_val?></option>
                                    <?}}?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="area_field"><?=$language['new-farmer']['46']?></label>
                            <input class="form-control inphead" type="text" name="field_area" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label><?=$language['new-farmer']['55']?></label>
                            <select class="form-control inphead op" id="crop_type">
                                <? if($_COOKIE['lang']=='gb'){?>
                                    <option value="2">Crops</option>
                                <option value="1">Legumes</option>
                                <option value="3">Technical</option>
                                <option value="4">Fodder</option>
                                <option value="5">Vegetable and melons</option>
                                <option value="6">Fruit</option>
                                <option value="7">Вerries</option>
                                <?} elseif($_COOKIE['lang']=='ua'){?>
                                    <option value="2">Зернові</option>
                                    <option value="1">Зерно-бобові</option>
                                    <option value="3">Технічні</option>
                                    <option value="4">Кормові</option>
                                    <option value="5">Овочеві та баштанні</option>
                                    <option value="6">Плодові</option>
                                    <option value="7">Ягідні</option>
                                <?}?>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label><?=$language['new-farmer']['48']?></label>
                            <select class="form-control inphead" name='crop' id="crop_list_select" required>
                                <?foreach($date['crop_us'] as $crop){?>
                                    <option class="crop_list crop_type_<?=$crop['crop_type']?>" value="<?=$crop['id_crop']?>"><?if($_COOKIE['lang']=='ua'){echo $crop['name_crop_ua'];}elseif($_COOKIE['lang']=='gb'){echo $crop['name_crop_en'];}?></option>
                                <?}?>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="rent_field"><?=$language['new-farmer']['43']?></label>
                            <input class="form-control inphead" type="text" name="field_rent" required>
                        </div>
                    </div>
<!--                    <div class="tech_cart">-->
<!--                        <div class="tech_head">-->
<!--                            <label>Технологічна карта</label>-->
<!--                        </div>-->
<!--                        <div class="row">-->
<!--                            <div class="col-lg-6 ">-->
<!--                                    <label class="tech_label">-->
<!--                                        <input type="radio" name="optionsRadios" value="new">-->
<!--                                        Створити нову технологічну карту-->
<!--                                    </label>-->
<!--                                <div id="new_tech_cart">-->
<!--                                    <label >Назва технологічної карти</label>-->
<!--                                    <input class="form-control inp" type="text" name="name_tech_cart" id="name_tech_cart">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-lg-6 ">-->
<!--                                <label class="tech_label"> Використати готову технологічну карту</label>-->
<!--                                <div class="form-group">-->
<!--                                    --><?// foreach($date['crop_culture'] as $cart){?>
<!--                                        <div class="rad tech_cart_crop_--><?//=$cart['id_crop']?><!--" class="radio">-->
<!--                                            <label>-->
<!--                                                <input  type="radio" name="optionsRadios" value="--><?//=$cart['id_culture']?><!--" required>-->
<!--                                                --><?//if($_COOKIE['lang']=='ua'){echo $cart['name_crop_ua'].'_'.$cart['tech_name'];}elseif($_COOKIE['lang']=='gb'){echo $cart['name_crop_en'].'_'.$cart['tech_name'];}?>
<!--                                            </label>-->
<!--                                        </div>-->
<!--                                    --><?//}?>
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                    <button type="submit" class="btn btn-primary save_Field" ><?=$language['new-farmer']['27']?></button>
                </div>
            </form>
        </div>
        <!-- /.modal-content wt -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div id="editField" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <form method="post" action="/new-farmer/edit_all_field">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" style="text-align: center;"><?=$language['new-farmer']['56']?></h4>
                </div>
                <div class="modal-body">
                 <div class="modal-body">
                    <div class="row bo">
                        <div class="col-lg-3">
                            <label for="name_field"><?=$language['new-farmer']['44']?></label>
                            <input class="form-control inphead" type="text" id="ed_field_number" name="ed_field_number" required>
                            <input  type="hidden" id="ed_field_id" name="ed_field_id">
                        </div>
                        <div class="col-lg-3">
                            <label for="area_field"><?=$language['new-farmer']['45']?></label>
                            <input class="form-control inphead" type="text" id="ed_field_name" name="ed_field_name" required>
                        </div>
                        <div class="col-lg-3">
                        <label>Тип с/г угідь</label>
                            <select class="form-control inphead" name="field_usage" id="edit_field_usage">
                                <?if($_COOKIE['lang']=='ua'){?>
                                <?php foreach ($date['usage']['ua'] as $usage_id=>$usage_val){?>
                                <option value="<?=$usage_id?>"><?=$usage_val?></option>
                                <?}}?>
                                <?if($_COOKIE['lang']=='gb'){?>
                                    <?php foreach ($date['usage']['gb'] as $usage_id=>$usage_val){?>
                                        <option value="<?=$usage_id?>"><?=$usage_val?></option>
                                <?}}?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="area_field"><?=$language['new-farmer']['46']?></label>
                            <input class="form-control inphead" type="text" id="ed_field_area" name="ed_field_area" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label><?=$language['new-farmer']['55']?></label>
                            <select class="form-control inphead op" id="edit_crop_type">
                                <? if($_COOKIE['lang']=='gb'){?>
                                <option value="1">Legumes</option>
                                <option value="2">Crops</option>
                                <option value="3">Technical</option>
                                <option value="4">Fodder</option>
                                <option value="5">Vegetable and melons</option>
                                <option value="6">Fruit</option>
                                <option value="7">Вerries</option>
                                <?} elseif($_COOKIE['lang']=='ua'){?>
                                    <option value="1">Зерно-бобові</option>
                                    <option value="2">Зернові</option>
                                    <option value="3">Технічні</option>
                                    <option value="4">Кормові</option>
                                    <option value="5">Овочеві та баштанні</option>
                                    <option value="6">Плодові</option>
                                    <option value="7">Ягідні</option>
                                <?}?>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label><?=$language['new-farmer']['48']?></label>
                            <select class="form-control inphead" name='crop' id="ed_crop_list_select" required>
                                <?foreach($date['crop_us'] as $crop){?>
                                    <option class="edit_crop_list edit_crop_type_<?=$crop['crop_type']?>" value="<?=$crop['id_crop']?>"><?if($_COOKIE['lang']=='ua'){echo $crop['name_crop_ua'];}elseif($_COOKIE['lang']=='gb'){echo $crop['name_crop_en'];}?></option>
                                <?}?>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="rent_field"><?=$language['new-farmer']['43']?></label>
                            <input class="form-control inphead" type="text" id="field_rent" name="field_rent" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                    <button type="submit" class="btn btn-primaryn"><?=$language['new-farmer']['27']?></button>
                </div>
            </form>
        </div>
    </div>
</div>



<script type="text/javascript">
    $(document).ready(function(){

        var json_tech='<?=json_encode($date['tech_cart'])?>';
        var tech_name=JSON.parse( json_tech );
        $('.select_tc').click(function () {
            $('#tech_list').html('');
            $('#Select_tc').modal('show');
            var id_crop=$(this).attr('data-crop');
            var id_field=$(this).attr('data-field');
            var field_size = $(this).attr('data-size');
            var field_name=$(this).attr('data-field_name');
            var name_culture = $(this).attr('data-name_culture');
            $('#name_culture').text(name_culture);
            $('#field_id').val(id_field);
            $.each(tech_name[id_crop], function(key, value) {
                $('#tech_list').append("<tr>" +
                    "<td>"+value['tech_name']+"</td>" +
                    "<td><button type='button' class='btn btn-primary copy_tc' data-name='"+field_name+"' data-work='"+field_size+"' data-id_tech='"+value['id_culture']+"'>Select</button></td>" +
                        /*"<td><button type='button' class='btn btn-primary selects_tc' data-name='"+value['tech_name']+"' data-id_tech='"+value['id_culture']+"'>Select</button></td>" +*/
                    "</tr>");
            });
        });


        $('#tech_list').on('click','.copy_tc', function () {

            alert('copy?');
            var id_field = $('#field_id').val();
            var id_tech_cart = $(this).attr('data-id_tech');
            var field_work = $(this).attr('data-work');
            $(location).attr('href','/new-farmer/copy_tech_field/'+id_tech_cart+'/'+id_field+'/'+field_work);
        });

        $('#tech_list').on('click','.selects_tc', save_tech_cart);
        function save_tech_cart(){
            var id_field = $('#field_id').val();
            var id_tech_cart = $(this).attr('data-id_tech');
            var text=$(this).attr('data-name');
            $.ajax({
                type : 'post',
                url : '/new-farmer/change_tech_cart',
                data : {
                    'id_field' : id_field,
                    'id_tech_cart' : id_tech_cart
                }
            });
            $('#Select_tc').modal('hide');
            $('#tech_name_field'+id_field).text(text);
            $('#tech_edit_field'+id_field).attr('href','/new-farmer/edit_technology_card/'+id_tech_cart)
        }


        $('.edit_field').change(field_edit);
        function field_edit() {
            var id=$(this).attr('data-id_field');
            var value=$(this).val();
            var table=$(this).attr('data-table');
            $.ajax({
                type : 'post',
                url : '/new-farmer/edit_field',
                data : {
                    'id' : id,
                    'table' : table,
                    'value' : value
                }
            });
        }
        var crop_id_st=$('#crop_list_select').val();
        $('.rad').hide();
        $('.tech_cart_crop_'+crop_id_st).show();
        $('#crop_type').click(crop_list_type);
        function crop_list_type() {
            var id_type=$(this).val();
            $('.crop_list').hide();
            $('.crop_type_'+id_type).show();
            $('#crop_list_select').val(' ');
            $('.rad').hide();
            $('input[name="optionsRadios"]').attr('checked', false);
            $("#new_tech_cart").hide();
        }

        $('#edit_crop_type').click(edit_crop_list_type);
        function edit_crop_list_type() {
            var id_type=$(this).val();
            $('.edit_crop_list').hide();
            $('.edit_crop_type_'+id_type).show();
            $('#ed_crop_list_select').val(' ');
        }
/*        
        $("input[name='optionsRadios']").change(radio_select);
        $("#new_tech_cart").hide();
        function radio_select() {
            var value= $("input[name='optionsRadios']:checked").val();
            if(value == 'new'){
                $("#name_tech_cart").prop('required',true);
                $("#new_tech_cart").show();
            }
            else{
                $("#name_tech_cart").prop('required',false);
                $("#new_tech_cart").hide();
            }
        }*/
/*        $('#crop_list_select').change(tech_cart_crop);
        function tech_cart_crop() {
            var crop_id=$(this).val();
            $('.rad').hide();
            $('.tech_cart_crop_'+crop_id).show();
            $("#new_tech_cart").hide();
            $('input[name="optionsRadios"]').attr('checked', false);
        }*/

        $('.area_plus').keyup(total_area);
        $(document).ready(total_area);
        function total_area() {
           var total_area=0;
            $(".area_plus").each(function(){
                var area=parseFloat($(this).text());
                if(isNaN(area)) area=0;
                
                total_area += area;
            });
            $('#total_area').text(total_area);
        }

         $('.edit_fields').click(edit_field);
        function edit_field() {
            var json_field=$(this).attr('data-data');
            var field=JSON.parse( json_field );
            $('#editField').modal('show');
            $('#ed_field_number').val(field['field_number']);
            $('#ed_field_id').val(field['id_field']);
            $('#ed_field_name').val(field['field_name']);
            $('#ed_field_area').val(field['field_size']);
            $('#field_rent').val(field['field_rent']);
            $('#edit_field_usage').val(field['field_usage']);
            $('#edit_crop_type').val(field['crop_type']);
            $('#ed_crop_list_select').val(field['field_id_crop']);
        }
        $('.rent_pay').change(function(){
            var rent_pay = $(this).val();
            var costs_type = $(this).attr('data-type');
                $.ajax({
                type : 'post',
                url : '/new-farmer/save_rent',
                data : {
                    'value' : rent_pay,
                    'costs_type' : costs_type
                }
            });
        });


        $('.changes_status').change(function () {
            var id_field = $(this).attr('data-id');
            var status = $(this).val();
            $.ajax({
                type : 'post',
                url : '/new-farmer/change_status',
                data : {
                    'id_field' : id_field,
                    'status' : status
                }
            });
        });
    });
</script>