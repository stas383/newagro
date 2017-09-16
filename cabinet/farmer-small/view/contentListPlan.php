
<?
   // var_dump($date['base']['base']);die;
?>


<head>
    <style>
        table,tr, th, td{
            font-family: 'Open Sans', sans-serif;
            font-weight: 600;
        }
        input, select {
            border-radius: 2px;
            border: 1px solid #999;
            font-style: italic;
            color: #aa1111;
        }
        .inpt{
            height:23px;
            border:1px solid #999;
            background:#fff;
            width: 100%;
        }
        #modal_base {
            min-width: 300px;
            min-height: 300px;
            max-width: 800px;
            max-height: 600px; /
            border-radius: 10px;
            background: #fff;
            position: fixed;
            left: 50%;
            margin-top: -300px;
            margin-left: -250px;
            display: none;
            opacity: 0;
            z-index: 5;
            padding: 20px 10px;
        }
        /* Кнoпкa зaкрыть для тех ктo в тaнке) */
        #modal_base #modal_base_close {
            width: 21px;
            height: 21px;
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            display: block;
        }
        #overlay_base {
            z-index:3; 
            position:fixed; 
            background-color:#000; 
            opacity:0.8; 
            -moz-opacity:0.8; 
            filter:alpha(opacity=80);
            width:100%; 
            height:100%; 
            top:0; 
            left:0;
            cursor:pointer;
            display:none; 
        }
        .layer_base {
            overflow: scroll; 
             
            max-height: 500px; 
            padding: 5px; 
        }
        .modal_header_name{
            font-weight: 18;
        } 
    </style>
</head>
<div class="box-body">
<h2 class="sub-header"><?=$language['farmer-small']['27']?></h2>
<form action="/farmer-small/save-action" method="post">
    <label for="select_crop"><?=$language['farmer-small']['24']?></label>
    <select class="form-control sub-header" id="select_crop" required disabled>
        <?php if($date['id']==0){?><option selected value="0">Виберіть культуру</option><?php }?>
        <?php foreach ($date['crop']['my_crop'] as $crop){?>
            <option <?php if($crop['id']==$date['id']) echo "selected"?> value="<?php SRC::getSrc();?>/farmer-small/list-plan/<?php echo $crop['id']?>" ><?php if($_COOKIE['lang']=='ua'){echo $crop['name_crop_ua'];}elseif($_COOKIE['lang']=='gb'){echo $crop['name_crop_en'];}?></option>
        <?php }?>
    </select>
    <input type="hidden" name="crop_id" value="<?php echo $date['id']?>" required>
    <br>
    <?php if($date['id']<>0){?>
    <div class="table-responsive">
        <table class="table table-striped well">
            <thead class="head-table-center">
            <tr>
                <th colspan="6"></th>
                <td colspan="2" class="text-center">
                    <label for="payment_for_all_area"><?=$language['farmer-small']['80']?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="id_action_type"><?=$language['farmer-small']['81']?></label><br><br>
                    <input name="id_action_type" list="list_action_type" class="form-control" required>
                    <datalist id="list_action_type">
                        <?php foreach ($date['action']['lib'] as $action_type)if($action_type['type']==1){?>
                            <option><?php if($_COOKIE['lang']=='ua'){echo $action_type['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $action_type['name_en'];}?></option>
                        <?php }?>
                    </datalist>
                </td>
                <td>
                    <label for="action_id"><?=$language['farmer-small']['82']?></label><br><br>
                    <input name="action_id" list="list_action" class="form-control" required>
                    <datalist id="list_action">
                        <?php foreach ($date['action']['lib'] as $crop)if($crop['type']==2){?>
                            <option class="action_select action_select<?php echo $crop['action_type']?>" ><?php if($_COOKIE['lang']=='ua'){echo $crop['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $crop['name_en'];}?></option>
                        <?php }?>
                    </datalist>
                </td>
                <td>
                    <label for="strat_data"><?=$language['farmer-small']['83']?></label><br><br>
                    <input type="date" class="form-control" id="strat_data" name="strat_data" required>
                </td>
                <td>
                    <label for="end_data"><?=$language['farmer-small']['84']?></label><br><br>
                    <input type="date" class="form-control" id="end_data" name="end_data" required>
                </td>
                <td>
                <label for="unit"><?=$language['farmer-small']['85']?></label>
                <select class="form-control" name="id_action_unit" id="id_action_unit" required>
                    <?php foreach ($date['action']['lib']as $action_type)if($action_type['type'] == 3){?>
                        <option value="<?php echo $action_type['id_action']?>"><?php if($_COOKIE['lang']=='ua'){echo $action_type['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $action_type['name_en'];}?></option>
                    <?php }?>
                </select>
                </td>
                <td>
                    <label for="payment_for_all_area"><?=$language['farmer-small']['86']?></label><br><br>
                    <input type="text" class="form-control" id="payment_for_all_area" name="payment_for_all_area" required>
                </td>
                <td class="text-center">
                    <label for="payment_for_all_area_own" ><?=$language['farmer-small']['87']?> </label><br><br>
                    <input type="text" class="form-control" id="payment_for_all_area_own" name="payment_for_all_area_own" required>
                </td>
                <td class="text-center">
                    <label for="payment_for_all_area_rent"><?=$language['farmer-small']['88']?></label><br><br>
                    <input type="text" class="form-control" id="payment_for_all_area_rent" name="payment_for_all_area_rent" required>
                </td>
                <td>
                    <label for="payment_for_all_other"><?=$language['farmer-small']['89']?></label>
                    <input type="text" class="form-control" id="payment_for_all_area" name="payment_for_all_other" required>
                </td>
            </tr>
            <?php $x=0; while ($x < 6) { $x++; ?>
                <tr class="asd" id="add_material_<?php echo $x?>">
                    <td colspan="2">
                        <label for="material_select_<?php echo $x?>"><?php echo $x?>. <?=$language['farmer-small']['93']?></label>
                        <select class="form-control" name="material_<?php echo $x?>" id="material_<?php echo $x?>" >
                            <?php foreach ($date['action']['lib'] as $action_type)if($action_type['type'] == 4){?>
                                <option id="material_type1" value="<?php echo $action_type['id_action']?>"><?php echo $action_type['name_ua']?></option>
                            <?php }?>
                        </select>
                    </td>
                    <td id="material_type_<? echo $x?>" style="display: none">
                        <label for="material_type"><?=$language['farmer-small']['98']?></label>
                        <select class="form-control" name="material_type_<? echo $x;?>" id="materials_type_<? echo $x?>">
                        <?php foreach ($date['action']['lib'] as $action_type)if($action_type['type'] == 6){?>
                            <option  value="<?php echo $action_type['id_action']?>"><?php echo $action_type['name']?>
                            </option>
                        <?}?>
                        </select>
                    </td> 
                        <td colspan="2" id="mat_name">
                            <label for="material_name"><?=$language['farmer-small']['94']?></label>
                            <input type="text" class="form-control" id="material_name_<? echo $x?>" name="material_name_<?=$x?>" >
                        </td>
                        <td colspan="4" class="mat_norm">
                            <label for="material_name"><?=$language['farmer-small']['95']?></label>
                            <input type="text" class="form-control" id="material_norm_<? echo $x?>" name="material_norm_<?=$x?>" >
                        </td>
                        <td colspan="2">
                            <label for="material_name"><?=$language['farmer-small']['96']?></label>
                            <input type="text" class="form-control" id="material_price_<? echo $x?>" name="material_price_<?=$x?>">
                        </td>
                </tr>
            <?php }?>
            <input type="hidden" value="" id="material_count" name="material_count">
            <tr>
                <td colspan="6">
                    <button type="button" class="btn btn-primary" id="show_material" data-show="1"><span class="glyphicon glyphicon-plus"></span> <?=$language['farmer-small']['97']?></button>
                    <button type="submit" class="btn btn-success"><?=$language['farmer-small']['99']?></button>
                    <a class="btn btn-success classAddMaterial"><?=$language['farmer-small']['100']?></a>
                </td>
            </tr>
            </thead>
        </table>
    </div>
</form>
    <div class="table-responsive">
    <table class="table table-striped well">
        <thead class="head-table-center">
        </thead>
        <tr>
            <th>#</th>
            <th><?=$language['farmer-small']['81']?></th>
            <th><?=$language['farmer-small']['82']?></th>
            <th><?=$language['farmer-small']['83']?></th>
            <th><?=$language['farmer-small']['84']?></th>
            <th><?=$language['farmer-small']['93']?></th>
            <th><?=$language['farmer-small']['86']?></th>
            <th><?=$language['farmer-small']['80']?></th>
            <th><?=$language['farmer-small']['89']?></th>
        </tr>
        <tbody>
        <?php foreach ($date['crop_plan']['action'] as $action){?>
        <tr>
            <td><?=$action['id'];?></td>
            <td><?if($_COOKIE['lang']=='ua'){ echo $date['crop_plan']['lib'][$action['id_action_type']]['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $date['crop_plan']['lib'][$action['id_action_type']]['name_en'];}?></td>
            <td><?if($_COOKIE['lang']=='ua'){ echo $date['crop_plan']['lib'][$action['id_action']]['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $date['crop_plan']['lib'][$action['id_action']]['name_en'];}?></td>
            <td><?=$action['start_date'];?></td>
            <td><?=$action['end_date'];?></td>
            <td>
                <?php
                    $id_material[$action['id']] = explode(',',$action['id_materials']);
                    foreach ($id_material[$action['id']] as $key) {
                        echo $date['material'][$key]['material_name'].', '.$date['material'][$key]['material_norm'].', '.$date['material'][$key]['material_price'].'<br>';
                    }
                ?>
            </td>
            <td><?=$action['payment_for_all_area'];?></td>
            <td><?=$action['payment_for_all_area_own'];?></td>
            <td><?=$action['payment_for_all_other'];?></td>
            <td><a href="/farmer-small/edit-plan/<?php echo $date['id'].'/'.$action['id']?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a></td>
        </tr>
        <?php }?>
        </tbody>
    </table>
</div>
<?php }?>
    <div style="float: right">
        <a href="<?php SRC::getSrc();?>/farmer-small/list-forecast/<?=$date['id']?>" class="btn btn-success btn-lg"><?=$language['farmer-small']['101']?></a>
    </div>
</div>

<div id="truy" class="alertInfo alert alert-success " style="display: none"></div>

<div id="modal_base">
    <div>
    <span id="modal_close" class="modal_base_close" style="float: right;"><i class="fa fa-close"></i></span> 
    <span style="float: left;"><h4 class="modal_header_name">База моїх матеріалів</h4></span>
    </div> 
    <br><br>
        <div class="layer_base">
        <table class="table">
            <thead>
                <tr>
                    <th><?=$language['farmer-small']['65']?></th>
                    <th><?=$language['farmer-small']['98']?></th>
                    <th><?=$language['farmer-small']['67']?></th>
                    <th><?=$language['farmer-small']['95']?></th>
                    <th><?=$language['farmer-small']['96']?></th>
                </tr>
                </thead>
                <tbody class="bd">
                    <?php foreach ($date['base']['base'] as $materials )if($materials['id'] == $date['id']){

                            ?>
                            <tr id="m_<?php echo $materials['id_material']?>" class="material <?php echo 'crop_'.$materials['id_crop'].' '.'type_'.$materials['type_material'].' '.'subtype_'.$materials['subtype_material'].' '?>    ">

                                <td class="data_crop"><?php if($_COOKIE['lang']=='ua'){echo $materials['name_crop_ua'];}elseif($_COOKIE['lang']='gb'){echo $materials['name_crop_en'];}?></td>
                                <td class="data_type_name"><?php if($_COOKIE['lang']=='ua'){echo $materials['material_type_name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $materials['material_type_name_en'];}?></td>
                                <td class="data_name"><?php echo $materials['material_name']?></td>
                                <td class="data_qlt"><?php echo $materials['material_norm']?></td>
                                <td class="data_price"><?php echo $materials['material_price']?></td>
                                <td><a
                                        data-id="<?php echo $materials['id_material']?>"
                                        data-crop="<?php echo $materials['name_crop']?>"
                                        data-mat_id="<?php echo $materials['id_material_type'];?>",
                                        data-type="<?php echo $materials['material_name']?>"
                                        data-name="<?php echo $materials['name_material']?>"
                                        data-qlt="<?php echo $materials['material_norm']?>"
                                        data-price="<?php echo $materials['material_price']?>"
                                        data-toggle="modal" data-target="#material" class="add_new_material btn btn-success btn-sm close"><i class="fa fa-fw fa-arrow-right"></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
</div>
<div id="overlay_base"></div>
    <script>
        $(document).ready(function (){
            $('.add_new_material').click(function(){
                var id_material_type = $(this).attr('data-mat_id');
                var material_name = $(this).attr('data-type');
                var material_norm = $(this).attr('data-qlt');
                var material_price = $(this).attr('data-price');
                $('#material_1').val(id_material_type);
                $('#material_name_1').val(material_name);
                $('#material_norm_1').val(material_norm);
                $('#material_price_1').val(material_price);
                    /*alert(id_material_type);*/
                });
            $('.add_new_material').click(function(){
                var id_material_type = $(this).attr('data-mat_id');
                var material_name = $(this).attr('data-type');
                var material_norm = $(this).attr('data-qlt');
                var material_price = $(this).attr('data-price');
                $('#material_2').val(id_material_type);
                $('#material_name_2').val(material_name);
                $('#material_norm_2').val(material_norm);
                $('#material_price_2').val(material_price);
                    /*alert(id_material_type);*/
                });
            $('.add_new_material').click(function(){
                var id_material_type = $(this).attr('data-mat_id');
                var material_name = $(this).attr('data-type');
                var material_norm = $(this).attr('data-qlt');
                var material_price = $(this).attr('data-price');
                $('#material_3').val(id_material_type);
                $('#material_name_3').val(material_name);
                $('#material_norm_3').val(material_norm);
                $('#material_price_3').val(material_price);
                    /*alert(id_material_type);*/
                });

                
                $("#material_1").change(function(){

                    var material_type = $(this).val();
                    var value = 0;

                    if(material_type == 19){
                        $('#material_type_1').css('display','block');
                        $(".mat_norm").attr('colspan','3');
                    }else{
                        $('#material_type_1').css('display','none');
                        $(".mat_norm").attr('colspan','4');
                        $('#materials_type_1').val(0);
                    }
                });

                $("#material_2").change(function(){

                    var material_type = $(this).val();

                    if(material_type == 19){
                        $('#material_type_2').css('display','block');
                        $(".mat_norm").attr('colspan','3');
                    }else{
                        $('#material_type_2').css('display','none');
                        $(".mat_norm").attr('colspan','4');
                         $('#materials_type_2').val(0);
                    }
                });
                   $("#material_3").change(function(){

                    var material_type = $(this).val();


                    if(material_type == 19){
                        $('#material_type_3').css('display','block');
                        $(".mat_norm").attr('colspan','3');
                    }else{
                        $('#material_type_3').css('display','none');
                        $(".mat_norm").attr('colspan','4');
                         $('#materials_type_2').val(0);
                    }
                });
                $("#material_4").change(function(){

                    var material_type = $(this).val();


                    if(material_type == 19){
                        $('#material_type_4').css('display','block');
                        $(".mat_norm").attr('colspan','3');
                    }else{
                        $('$material_type_4').css('display','none');
                        $(".mat_norm").attr('colspan','4');
                         $('#materials_type_2').val(0);
                    }
                });

                $("#material_5").change(function(){

                    var material_type = $(this).val();


                    if(material_type == 19){
                        $('#material_type_5').css('display','block');
                        $(".mat_norm").attr('colspan','3');
                    }else{
                        $('$material_type_5').css('display','none');
                        $(".mat_norm").attr('colspan','4');
                        $('#materials_type_2').val(0);
                    }
                });
                $("#material_6").change(function(){

                    var material_type = $(this).val();


                    if(material_type == 19){
                        $('#material_type_6').css('display','block');
                        $(".mat_norm").attr('colspan','3');
                    }else{
                        $('$material_type_6').css('display','none');
                        $(".mat_norm").attr('colspan','4');
                        $('#materials_type_2').val(0);
                    }
                });

                $(".asd").hide();
                //Добавление строки материалов
                $('#show_material').click(show_material);
                function show_material() {
                    var material_show = $(this).attr('data-show');
                    $('#add_material_'+ material_show).show(200);
                    $('#material_count').val(material_show);
                    material_show++;
                    $(this).attr({'data-show':material_show});

                    if(material_show==7){
                        $(this).hide(200);
                    }
                }

                $('.classAddMaterial').click(function (event){
                    event.preventDefault(); 
                    $('#overlay_base').fadeIn(400, 
                        function(){ 
                        $('#modal_base') 
                            .css('display', 'block')
                            .animate({opacity: 1, top: '50%'}, 100); 
                    });
                });

                $('.modal_base_close, .close, #overlay_base').click( function(){
                    $('#modal_base')
                        .animate({opacity: 0, top: '45%'}, 100, 
                         function(){ 
                         $(this).css('display', 'none'); 
                         $('#overlay_base').fadeOut(400); 
                 }
                );
        });
        });
    </script>
  <!--   <script async>
      $().ready(function(){
  
      });
  </script> -->