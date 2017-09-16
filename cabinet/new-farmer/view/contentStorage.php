<?php

/* echo "<pre>";
  var_dump($date['field_management']);die;*/



$id_material_type = array(
    1=>'Насіння',
    2=>'Добрива',
    3=>'ЗЗР',
    4=>'ПММ'
);
$unit = array(
        1=>'кг',
        2=>'п.од',
        3=>'т',
        4=>'л',
);
?>
<div class="box">
    <div class="box-bodyn">
      <div class="non-semantic-protector">
                <h1 class="ribbon">
                    <strong class="ribbon-content"><?=$language['new-farmer']['8']?></strong>
                </h1>
          </div>
    </div>
    <div class="box-bodyn col-lg-12" style="max-height: 55px">
      <a class="btn btn-primaryn" href="#Add_new" data-toggle="modal">Надходження матеріалів</a>
        <a class="btn btn-primaryn Sale" href="#Sale" data-toggle="modal">Вибуття матеріалів</a>
    </div>
    <div class="rown">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">

        <div class="table-responsive">
            <h3 style="float: left;"><?=$language['new-farmer']['124']?></h3>
                <table class="table">
                    <thead>
                    <tr class="tabletop">
                        <th>Назва матеріалу</th>
                        <!-- <th><?=$language['new-farmer']['126']?></th> -->
                        <th>Залишок на початок</th>
                        <th>Надійшло</th>
                        <th>Вибуло</th>
                        <th>Залишок на кінець</th>
                        <th>Середня ціна</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <? foreach($date['storage']['storage_material_fact'] as $storage_material){
                                $open_material++;?>
                                <tr>
                                    <td>
                                        <? if($storage_material['storage_type_material']=='1'){
                                            echo '<b>'.$id_material_type[$storage_material['storage_type_material']].'</b>: '.$date['crop'][$storage_material['storage_subtype_material']]['name_crop_ua'].': '.$date['material_lib'][$storage_material['storage_material']]['name_material'];
                                        }elseif($storage_material['storage_type_material']=='2'){
                                            echo '<b>'.$id_material_type[$storage_material['storage_type_material']].'</b>: '.$date['fert']['ua'][$storage_material['storage_subtype_material']].': '.$date['material_lib'][$storage_material['storage_material']]['name_material'];
                                        }elseif($storage_material['storage_type_material']=='3'){
                                            echo '<b>'.$id_material_type[$storage_material['storage_type_material']].'</b>: '.$date['ppa']['ua'][$storage_material['storage_subtype_material']].': '.$date['material_lib'][$storage_material['storage_material']]['name_material'];
                                        }elseif($storage_material['storage_type_material']=='4'){
                                            echo '<b>'.$id_material_type[$storage_material['storage_type_material']].'</b>: '.$date['fuel']['ua'][$storage_material['storage_subtype_material']].': '.$date['material_lib'][$storage_material['storage_material']]['name_material'];
                                        }
                                        ?>
                                    </td>
                                    <!-- <td><?=$storage_1['storage_name']?></td> -->
                                    <td><?=$storage_material['storage_start'].' '.$unit[$storage_material['storage_unit']];?></td>
                                    <td><a class="btn come_storage_material" data-id="<?=$open_material?>" data-type="2"><?=$date['incoming_material']['come_material'][$storage_material['storage_material_id']]?></a></td>
                                    <td><a class="btn out_storage_material" data-id="<?=$open_material?>" 
                                          data-type="1">
                                          <?=$date['incoming_material']['out_material'][$storage_material['storage_material_id']]+$date['incoming_material']['come_fact'][$storage_material['storage_material_id']]?></a></td>
                                    <td>
                                        <?=$storage_material['storage_quantity']?>
                                    </td>
                                    <td>
                                        <?=$storage_material['storage_sum_total']?>
                                    </td>
                                    <td>
                                        <!--<a class="btn btn-success Add_incoming" href="#Add_incoming" data-toggle="modal" data-data='<?/*=json_encode($storage_material);*/?>' data-date="<?/*=$storage_material['storage_date']*/?>">Add incoming goods</a>-->
                                        </td>
                                </tr>
                                <? foreach($date['incoming_material'] as $incoming_material)if($incoming_material['come_out_material_id']==$storage_material['storage_material_id']){?>
                                    <tr class="open_material_<?=$open_material?>_<?=$incoming_material['come_out_type']?>" <? if($incoming_material['come_out_type']==1){ echo 'style="display: none; color:red;"';}elseif($incoming_material['come_out_type']=='2'){echo 'style="display: none; color:green;"';}elseif($incoming_material['come_out_type']=='3'){echo 'style="display: none; color:blue;"';}?> >
                                        <td style="padding-left: 35px"><? echo "Date: ".$incoming_material['come_out_date']?></td>
                                        <td><? echo "Quantity: ".$incoming_material['come_out_quantity']?></td>
                                        <td><? echo "Total sum: ".$incoming_material['come_out_sum_total']?></td>
                                        <td><? echo "Price per unit: ".number_format($incoming_material['come_out_sum_total']/$incoming_material['come_out_quantity'], 2, ',', ' ');?></td>
                                        <td></td>
                                    </tr>
                                <?}?>
                        <?}?>
                    </tbody>
                </table>
        </div>
        </div>
            <div class="col-lg-1"></div>
    </div>
    <br>
    <div class="rown">   
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
      <a class="btn btn-primaryn top" href="#Add_pdoducts" data-toggle="modal"><?=$language['new-farmer']['110']?></a><br><br>
              <div class="table-responsive">
                  <h3 style="float: left;"><?=$language['new-farmer']['128']?></h3>
                <table class="table">
                    <thead>
                    <tr class="tabletop">
                        <th><?=$language['new-farmer']['129']?></th>
                        <th>Кількість на початок, кг</th>
                        <th>Надійшло, кг</th>
                        <th>Вибуло, кг</th>
                        <th>Залишок на кінець, кг</th>
                        <th><?=$language['new-farmer']['114']?></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                      <? foreach($date['products']['products'] as $product){
                          $open_products++?>
                        <tr>
                          <td><?=$date['crop'][$product['product_type']]['name_crop_ua']?></td>
                          <td><?=$product['product_quantity']?></td>
                          <td></td>
                            <td><a class="btn out_sale_products" data-id="<?=$open_products?>"><?=$date['products']['actual_sales'][$product['product_type']]?></a></td>
                          <td><?=$product['product_now']?></td>
                          <td><?=$product['product_comments']?>
                          </td>
                          <td><a href="#sale_products" class="btn btn-primary sale_prod" data-toggle="modal" data-id="<?=$product['product_type']?>">Реалізація продукції</a></td>
                        </tr>
                      <?}?>
                    </tbody>
                </table>
        </div>
    </div>
    </div>
    <div class="box-body wt">
<div id="Add_new" class="modal fade">
    <div class="modal-dialog modal-lg">
    <form action="/new-farmer/create_storage" method="post">
    <div class="modal-content wt">
        <div class="box-bodyn">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <span class="box-title">Картка надходження матеріалів на склад</span>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-3">
          <label><?=$language['new-farmer']['117']?></label>
          <select class="form-control  inphead type_material" name="storage_type_material" required>
            <? foreach($id_material_type as $key=>$value){?>
              <option value="<?=$key?>"><?=$value?></option>
            <?}?>
          </select>
        </div>
        <div class="col-lg-3 for_seeds">
            <label>Культура</label>
            <select class="form-control inphead" name="storage_subtype_material" selected>
                <? foreach ($date['crop'] as $subtype){?>
                    <option value="<?=$subtype['id_crop']?>"><?=$subtype['name_crop_ua']?></option>
                <?}?>
            </select>
        </div>
        <div class="col-lg-3 for_fert" style="display: none">
            <label>Підтип матеріалу</label>
            <select class="form-control inphead" name="storage_subtype_fert">
                <option value="1">Мінеральні</option>
                <option value="2">Органічні</option>
            </select>
        </div>
        <div class="col-lg-3 for_ppa" style="display: none">
            <label>Підтип матеріалу</label>
            <select class="form-control inphead" name="storage_subtype_ppa">
                <option value="1">Протруйник</option>
                <option value="2">Гербіциди</option>
                <option value="3">Інсектициди</option>
                <option value="4">Фунгіциди</option>
                <option value="5">Регулятор росту рослин</option>
                <option value="6">Десиканти</option>
            </select>
        </div>
        <div class="col-lg-3 for_fuel" style="display: none">
            <label>Підтип матеріалу</label>
            <select class="form-control inphead" name="storage_subtype_fuel">
                <option value="1">Бензин</option>
                <option value="2">ДП</option>
            </select>
        </div>
        <div class="col-lg-3">
          <label><?=$language['new-farmer']['118']?></label>
            <input list="lib_materials" class="form-control inphead" name="name_material" id="name_material" >
            <datalist id="lib_materials">
                <?foreach ($date['material_lib'] as $material_lib)if($material_lib['id_type_material']=='1'){?>
                    <option><?=$material_lib['name_material']?></option>
                <?}?>
            </datalist>
        </div>
        <div class="col-lg-3 for_seeds">
            <label>Одиниці виміру</label>
                <select class="form-control inphead unit" name="storage_unit_seed">
                    <option value="1">кг</option>
                    <option value="2">п.од</option>
                </select>
        </div>
              <div class="col-lg-3 for_fert unit_seed" style="display: none">
                  <label>Одиниці виміру</label>
                  <select class="form-control inphead unit" name="storage_unit_fert">
                      <option value="1">кг</option>
                      <option value="3">т</option>
                      <option value="4">л</option>
                  </select>
              </div>
              <div class="col-lg-3 for_ppa unit" style="display: none">
                  <label>Одиниці виміру</label>
                  <select class="form-control inphead unit" name="storage_unit_ppa">
                      <option value="1">кг</option>
                      <option value="4">л</option>
                  </select>
              </div>
              <div class="col-lg-3 for_fuel" style="display: none">
                  <label>Одиниці виміру</label>
                  <select class="form-control inphead unit" name="storage_unit_fuel">
                      <option value="1">кг</option>
                      <option value="4">л</option>
                  </select>
              </div>
        <div class="col-lg-3">
          <label><?=$language['new-farmer']['119']?></label>
          <input class="form-control storage_quantity inphead" type="text" name="storage_quantity" required>
        </div>
        <div class="col-lg-3">
          <label><?=$language['new-farmer']['132']?></label>
          <input class="form-control storage_sum_total inphead" type="text" name="storage_sum_total" required>
        </div>
        <div class="col-lg-3">
          <label><?=$language['new-farmer']['133']?></label>
          <input class="form-control storage_sum_unit inphead" type="text" name="storage_sum_unit" required>
        </div>
        <div class="col-lg-3">
          <label><?=$language['new-farmer']['111']?></label>
          <input class="form-control inphead" type="date" name="storage_date" required>
        </div>
<!--        <div class="col-lg-3">
          <label><?/*=$language['new-farmer']['112']*/?></label>
          <input class="form-control inphead" name="storage_location" list="material_storage_location" required>
                <datalist id="material_storage_location">
                    <?php
/*                    foreach ($date['storage']['storage'] as $storage){*/?>
                        <option ><?php /*echo $storage['storage_name'];*/?></option>
                    <?php /*}*/?>
                </datalist>
        </div>-->
                <div class="col-lg-3">
          <label><?=$language['new-farmer']['114']?></label>
          <textarea name="storage_comments" class="form-control inphead"></textarea>
        </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
            <button type="submit" class="btn btn-primaryn"><?=$language['new-farmer']['109']?></button>
        </div>
    </div>
    </form>
  </div>
</div>

<div id="Add_pdoducts" class="modal fade">
    <div class="modal-dialog modal-lg">
    <form action="/new-farmer/incoming_products" method="post">
    <div class="modal-content wt">
        <div class="box-bodyn">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <span class="box-title">Картка Готова продукція надходження</span>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-3">
              <label>Номер і назва поля</label>
              <select class="form-control inphead product_field" name="product_field" required>
                <? foreach ($date['field_management'] as $product){ 
                    {?>
                      <option value="<?=$product['id_field']?>"><?=$product['field_number']."_".$product['field_name']?></option>
                <?}?>
                <?}?>
              </select>
            </div>
            <div class="col-lg-3">
                <label>Назва продукції</label>
                <select class="form-control inphead" id="product_type" name="product_name">
                    <? foreach ($date['field_management'] as $product_name){?>
                        <option class="prod_<?=$product_name['id_field']?>" value="<?=$product_name['field_id_crop']?>"><?=$product_name['name_crop_ua']?></option>
                    <?}?>
                </select>
            </div>
              <div class="col-lg-3">
                  <label>Одиниці виміру</label>
                  <select class="form-control inphead unit" name="product_unit">
                      <option value="1">кг</option>
                      <option value="3">т</option>
                  </select>
              </div>
            <div class="col-lg-3">
              <label><?=$language['new-farmer']['113']?></label>
              <input type="text" name="product_quantity" class="inphead incoming_quantity">
            </div>
            <div class="col-lg-3">
              <label><?=$language['new-farmer']['114']?></label>
              <textarea name="product_comments" class="form-control inphead"></textarea>
            </div>
              <div class="col-lg-3">
                  <label><?=$language['new-farmer']['111']?></label>
                  <input class="form-control inphead" type="date" name="product_date">
              </div>
              <input type="hidden" name="type_come" value="2">
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
            <button type="submit" class="btn btn-primaryn"><?=$language['new-farmer']['109']?></button>
        </div>
    </div>
    </form>
  </div>
</div>

<!--<div id="Add_incoming" class="modal fade">
    <div class="modal-dialog modal-lg">
    <form action="/new-farmer/incoming_storage" method="post">
    <div class="modal-content wt">
        <div class="box-bodyn">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <span class="box-title"><?/*=$language['new-farmer']['122']*/?></span>
        </div>
     
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-3">
              <label><?/*=$language['new-farmer']['111']*/?></label>
              <input class="form-control inphead" type="date" name="incoming_date" id="incoming_date">
                <input type="hidden" name="type_come" value="2">
            </div>
            <div class="col-lg-3">
              <label><?/*=$language['new-farmer']['117']*/?></label>
              <select class="form-control inphead" name="incoming_type_material" id="incoming_type_material" required>
                <?/* foreach ($date['storage']['storage_type_material'] as $storage){*/?>
                      <option value="<?/*=$storage['storage_type_material']*/?>"><?/*=$id_material_type[$storage['storage_type_material']]*/?></option>
                <?/*}*/?>
              </select>
            </div>
            <div class="col-lg-3">
              <label><?/*=$language['new-farmer']['115']*/?></label>
              <input type="hidden" name="">
                <select name="incoming_material" class="form-control inphead" id="incoming_material">
                    <?php
/*                    foreach ($date['storage']['storage_material_fact'] as $storage){*/?>
                        <option value="<?php /*echo $storage['storage_material_id'];*/?>"><?php /*echo $date['material_lib'][$storage['storage_material']]['name_material'];*/?></option>
                    <?php /*}*/?>
                </select>
            </div>
            <div class="col-lg-3">
              <label><?/*=$language['new-farmer']['113']*/?></label>
              <input type="text" name="incoming_quantity" id="incoming_quantity" class="inphead">
            </div>
            <div class="col-lg-3">
              <label><?/*=$language['new-farmer']['132']*/?></label>
              <input type="text" name="incoming_sum_total" id="incoming_sum_total" class="inphead">
            </div>
            <div class="col-lg-3">
              <label><?/*=$language['new-farmer']['133']*/?></label>
              <input type="text" name="incoming_price_unit" id="incoming_price_unit" class="inphead">
            </div>
            <div class="col-lg-3">
              <label><?/*=$language['new-farmer']['114']*/?></label>
              <textarea name="incoming_comments" class="form-control inphead"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?/*=$language['new-farmer']['26']*/?></button>
            <button type="submit" class="btn btn-primaryn"><?/*=$language['new-farmer']['109']*/?></button>
        </div>
    </div>
    </form>
  </div>
</div>-->

<div id="Sale" class="modal fade">
    <div class="modal-dialog modal-lg">
    <form action="/new-farmer/create_sales" method="post">
    <div class="modal-content wt">
        <div class="box-bodyn">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <span class="box-title">Картку вибуття матеріалу</span>
        </div>
     
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-3">
              <label><?=$language['new-farmer']['111']?></label>
              <input type="hidden" name="sale_id_material" id="sale_id_material">
              <input type="hidden" name="sale_stock" id="sale_stock">
                <input type="hidden" name="type_out" value="1">
              <input class="form-control inphead" type="date" name="sale_date">
            </div>
            <div class="col-lg-3">
              <label><?=$language['new-farmer']['113']?></label>
              <input type="text" name="sale_quantity" class="inphead sale_quantity">
            </div>
            <div class="col-lg-3">
              <label><?=$language['new-farmer']['132']?></label>
              <input type="text" name="sale_sum_total" class="inphead sale_sum_total">
            </div>
            <div class="col-lg-3">
              <label><?=$language['new-farmer']['133']?></label>
              <input type="text" name="sale_price_unit" class="inphead sale_price_unit">
            </div>
            <div class="col-lg-3">
              <label><?=$language['new-farmer']['114']?></label>
              <textarea name="sale_comments" class="form-control inphead"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
            <button type="submit" class="btn btn-primaryn"><?=$language['new-farmer']['109']?></button>
        </div>
    </div>
    </form>
  </div>
</div>
<div id="sale_products" class="modal fade">
    <div class="modal-dialog modal-lg">
    <form action="/new-farmer/create_actual_sale" method="post">
    <div class="modal-content wt">
        <div class="box-bodyn">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <span class="box-title"><?=$language['new-farmer']['135']?></span>
        </div>
     
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-3">
              <label><?=$language['new-farmer']['111']?></label>
              <input class="form-control inphead" type="date" name="actual_sale_date">
            </div>
            <div class="col-lg-3">
              <label><?=$language['new-farmer']['113']?></label>
              <input type="text" name="actual_sale_quantity" class="inphead actual_sale_quantity">
            </div>
            <div class="col-lg-3">
              <label><?=$language['new-farmer']['132']?></label>
              <input type="text" name="actual_sale_sum" class="inphead actual_sale_sum">
            </div>
            <div class="col-lg-3">
              <label><?=$language['new-farmer']['133']?></label>
              <input type="text" name="actual_sale_per_unit" class="inphead actual_sale_per_unit">
            </div>
            <div class="col-lg-3">
              <label><?=$language['new-farmer']['114']?></label>
              <textarea name="actual_sale_comments" class="form-control inphead"></textarea>
              <input type="hidden" name="actual_sale_product" id="actual_sale_product">
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
            <button type="submit" class="btn btn-primaryn"><?=$language['new-farmer']['109']?></button>
        </div>
    </div>
    </form>
  </div>
</div>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {   
    $('.unit,.storage_quantity, .storage_sum_total').change(function(){
      var unit = $(this).val();
      if(unit == 3){

      }
      var storage_quantity = parseFloat($('.storage_quantity').val());
      var storage_sum_total = parseFloat($('.storage_sum_total').val());
      var storage_sum_unit = (storage_sum_total/storage_quantity).toFixed(2);
      $('.storage_sum_unit').val(storage_sum_unit);
    });

    $('#incoming_quantity,#incoming_sum_total').change(function(){
      var incoming_quantity = parseFloat($('#incoming_quantity').val());
      var incoming_sum_total = parseFloat($('#incoming_sum_total').val());
      var incoming_price_unit = (incoming_sum_total/incoming_quantity).toFixed(2);
      $('#incoming_price_unit').val(incoming_price_unit);
    });

    $('.sale_quantity, .sale_sum_total').change(function(){
      var stock = parseFloat($('#sale_stock').val());
      var sale_quantity = parseFloat($('.sale_quantity').val());
      if(sale_quantity > stock){
        alert("Not enough material in the storage");
      }
      var sale_sum_total = parseFloat($('.sale_sum_total').val());
      var sale_price_unit = (sale_sum_total/sale_quantity).toFixed(2);
      $('.sale_price_unit').val(sale_price_unit);

      
    });
    $('.Sale').click(function(){
      var id = $(this).attr('data-id');
      var stock = $(this).attr('data-stock');
      $('#sale_id_material').val(id);
      $('#sale_stock').val(stock);
    });
     $('.sale_prod').click(function(){
       var id = $(this).attr('data-id');
      $('#actual_sale_product').val(id);
     });

        $('.actual_sale_quantity, .actual_sale_sum').change(function(){
      var actual_sale_1 = parseFloat($('.actual_sale_quantity').val());
      var actual_sale = parseFloat($('.actual_sale_sum').val());
      var actual_sale_per = (actual_sale/actual_sale_1).toFixed(2);
      $('.actual_sale_per_unit').val(actual_sale_per);    
    });

        $('.Add_incoming').click(function () {
            var json_storage_material = $(this).attr('data-data');
            var storage_material = JSON.parse(json_storage_material);
            $('#incoming_type_material').val(storage_material['storage_type_material']);
           $('#incoming_material').val(storage_material['storage_material_id']);
        });

        $('.come_storage_material').click(function () {
            var id = $(this).attr('data-id');
            var type = $(this).attr('data-type');
            /*$('.close_material').css('display','none');*/
            $('.open_material_'+id+'_'+type).toggle();
        });
        $('.out_storage_material').click(function () {
            var id = $(this).attr('data-id');
            var type = $(this).attr('data-type');
            /*$('.close_material').css('display','none');*/
            $('.open_material_'+id+'_'+type).toggle();
        });

        $('.type_material').change(function () {
            var type = $(this).val();
            if(type == 1){
                $('.for_seeds').css('display','block');
                $('.for_fert').css('display','none');
                $('.for_ppa').css('display','none');
                $('.for_fuel').css('display','none');
            }
            if(type == 2){
                $('.for_fert').css('display','block');
                $('.for_seeds').css('display','none');
                $('.for_ppa').css('display','none');
                $('.for_fuel').css('display','none');
            }
            if(type == 3){
                $('.for_ppa').css('display','block');
                $('.for_seeds').css('display','none');
                $('.for_fert').css('display','none');
                $('.for_fuel').css('display','none');
            }
            if(type == 4){
                $('.for_fuel').css('display','block');
                $('.for_seeds').css('display','none');
                $('.for_ppa').css('display','none');
                $('.for_fert').css('display','none');
            }
        });

        $('.product_field').change(function () {
            var product_id_field = $(this).val();
            $('.prod_'+product_id_field).attr('selected','selected');
        });
  });
</script>
