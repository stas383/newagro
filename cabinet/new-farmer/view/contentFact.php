<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 28.08.2017
 * Time: 12:14
 */
/*echo "<pre>";
var_dump($date['fact']);die;*/

$stattie_ua = array(
        17 => 'Насіння',
        18 =>'Добрива',
        19 =>'ЗЗР',
        20 => 'ПММ',
        1=>'Зарплата',
        2=>'Інші витрати',
        3=>'Витрати на ремонт',
        4=>'Послуги'
);
$stattie_en = array(
    17 => 'Seeds',
    18 =>'Fertilizers',
    19 =>'PPA',
    20 => 'Fuel costs',
    1=>'Salary',
    2=>'Other costs',
    3=>'Repair costs',
    4=>'Services'
);
?>

    <div class="boxn">
        <div class="box-headern">
            <div class="non-semantic-protector">
                <h1 class="ribbon">
                    <strong class="ribbon-content"><?=$language['new-farmer']['146']?></strong>
                </h1>
            </div>
        </div>
        <div class="box-bodyn">
            <form action="/new-farmer/create_fact" method="post">
                <div class="rown">
                    <div class="col-lg-1">
                        <label><?=$language['new-farmer']['137']?></label>
                        <input class="form-control inphead" type="date" id="data_fact" name="data_fact" required>
                    </div>
                    <div class="col-lg-2">
                        <label for="crop_id"><?=$language['new-farmer']['138']?></label>
                        <select name="field_id" id="field_id" class="form-control inphead" required>
                            <option value="0"><?=$language['new-farmer']['138']?></option>
                            <?php foreach ($date['field'] as $fact){ ?>
                                <option value="<?php echo $fact['id_field']?>" data-id_crop="<?=$fact['field_id_crop']?>"><?php echo $fact['field_name']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label for="crop_id"><?=$language['new-farmer']['139']?></label>
                        <select name="crop_id" id="crop_id" class="form-control inphead" required>ї
                            <option value="0"><?=$language['new-farmer']['139']?></option>
                            <?php foreach ($date['field'] as $fact){?>
                                <option value="<?php echo $fact['id_field']?>"><?php if($_COOKIE['lang']=='ua'){echo $date['crop'][$fact['field_id_crop']]['name_crop_ua'];}elseif($_COOKIE['lang']=='gb'){echo $date['crop'][$fact['field_id_crop']]['name_crop_en'];}?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label for="stattie_id"><?=$language['new-farmer']['140']?></label>
                        <select name="stattie_id" id="stattie_id" class="form-control inphead" required selected>
                            <option value="0"><?=$language['new-farmer']['140']?></option>
                            <? if($_COOKIE['lang']=='gb'){foreach ($stattie_en as $key=>$value){?>
                                <option value="<?=$key?>"><?=$value?></option>
                            <?}}elseif($_COOKIE['lang']=='ua'){foreach ($stattie_ua as $key=>$value){?>
                                <option value="<?=$key?>"><?=$value?></option>
                            <?}}?>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <label for="name"><?=$language['new-farmer']['141']?></label>
                        <div id="in">
                        <input class="form-control inphead" name="material">
                        </div>
                        <div id="seeds_material" style="display: none">
                        <select class="form-control inphead mat" name="material_seed">
                            <option value="0"><?=$language['new-farmer']['141']?></option>
                            <?php foreach ($date['storage_material'] as $storage_material)if($storage_material['storage_type_material'] == 17){?>
                                <option data-attr="<?=$storage_material['storage_sum_unit'];?>" value="<?=$storage_material['storage_material_id']?>"><?=$storage_material['storage_material']?></option>
                            <?}?>
                        </select>
                        </div>
                        <div id="fertilizers_material" style="display: none">
                            <select class="form-control inphead mat" name="material_fertilizers">
                                <option value="0"><?=$language['new-farmer']['141']?></option>
                                <?php foreach ($date['storage_material'] as $storage_material)if($storage_material['storage_type_material'] == 18){?>
                                    <option value="<?=$storage_material['storage_material_id']?>"><?=$storage_material['storage_material']?></option>
                                <?}?>
                            </select>
                        </div>
                        <div id="ppa_material" style="display: none">
                            <select class="form-control inphead mat" name="material_ppa">
                                <option value="0"><?=$language['new-farmer']['141']?></option>
                                <?php foreach ($date['storage_material'] as $storage_material)if($storage_material['storage_type_material'] == 19){?>
                                    <option data-attr="<?=$storage_material['storage_sum_unit'];?>" value="<?=$storage_material['storage_material_id']?>"><?=$storage_material['storage_material']?></option>
                                <?}?>
                            </select>
                        </div>
                        <div id="fuel_material" style="display: none">
                            <select class="form-control inphead mat" name="material_fuel">
                                <option value="0"><?=$language['new-farmer']['141']?></option>
                                <?php foreach ($date['storage_material'] as $storage_material)if($storage_material['storage_type_material'] == 20){?>
                                    <option value="<?=$storage_material['storage_material_id']?>"><?=$storage_material['storage_material']?></option>
                                <?}?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <label for="amount"><?=$language['new-farmer']['142']?></label>
                        <input class="form-control inphead" type="text" id="amount" name="amount">
                    </div>
                    <div class="col-lg-1">
                        <label for="price_one"><?=$language['new-farmer']['143']?></label>
                        <input class="form-control inphead" type="text" id="price_one" name="price_one">
                    </div>
                    <div class="col-lg-1">
                        <label for="price_total"><?=$language['new-farmer']['144']?></label>
                        <input class="form-control inphead" type="text" id="price_total" name="price_total" required>
                    </div>
                    <div class="col-lg-1">
                        <br>
                        <input type="submit" class="btn btn-block btn-success " id="sumbit" value="<?=$language['new-farmer']['109']?>">
                    </div>
                </div>
            </form>
        </div>
    </div>

<div class="box">
    <div class="box-body">
        <div class="rown">
            <div class="table-responsive">
                <div class="col-lg-10">
                    <div>
                        <h3 style="float: left;">Actual costs</h3>
                    </div>
                    <table class="table">
                        <thead>
                        <tr class="tabletop">
                            <th><?=$language['new-farmer']['137']?></th>
                            <th><?=$language['new-farmer']['138']?></th>
                            <th><?=$language['new-farmer']['139']?></th>
                            <th><?=$language['new-farmer']['140']?></th>
                            <th><?=$language['new-farmer']['141']?></th>
                            <th><?=$language['new-farmer']['142']?></th>
                            <th><?=$language['new-farmer']['143']?></th>
                            <th><?=$language['new-farmer']['144']?></th>
                        </tr>
                        </thead>
                        <tbody class="sales">
                        <?foreach ($date['fact']['material_field'] as $fact_costs){?>
                            <tr>
                                <td><?=$fact_costs['fact_data']?></td>
                                <td><?=$fact_costs['field_name']?></td>
                                <td><?=$date['crop'][$fact_costs['field_id_crop']]['name_crop_ua']?></td>
                                <td><? echo $stattie_en[$fact_costs['stattie_id']];?></td>
                                <td><?if($fact_costs['stattie_id'] == 17 or $fact_costs['stattie_id']==18 or $fact_costs['stattie_id'] == 19 or $fact_costs['stattie_id']==20){echo $date['fact']['material'][$fact_costs['material']]['storage_material'];}else{echo $fact_costs['material'];}?></td>
                                <td><?=$fact_costs['fact_amount']?></td>
                                <td><?=$fact_costs['fact_price_one']?></td>
                                <td><?=$fact_costs['price_total']?></td>
                            </tr>
                        <?}?>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-2">
                    <div class="box">
                        <div class="box-bodyn">
                            <label for="material_id">Material</label>
                            <select name="material_id" id="material_id" class="form-control inphead">
                                <option value="0">Material</option>
                                <?php foreach ($date["material"] as  $crop){ ?>
                                    <option value="<?php echo $crop['id_action']?>"><?php {echo $crop['name_ua'];}?></option>
                                <?php }?>
                            </select>
                            <br>
                            <label for="month"><?=$language['farmer-small']['47']?></label>
                            <select name="month" id="month" class="form-control  inphead">
                                <option value="0"><?=$language['farmer-small']['47']?></option>
                                <?php for ($x=1;$x<=12;$x++){ ?>
                                    <option value="<?php echo $x?>"><?=$month_name_en[$x]?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>
    $(document).ready(function () {
        $('#field_id').change(function () {
            var field_id_crop = $(this).val();
            $('#crop_id').val(field_id_crop);
        });

        $('#stattie_id').change(function () {
            var stattie_id = $(this).val();
            if (stattie_id == 17) {
                $('#seeds_material').css('display', 'block');
                $('#fertilizers_material').css('display', 'none');
                $('#ppa_material').css('display', 'none');
                $('#fuel_material').css('display', 'none');
                $('#in').css('display', 'none');
            }
            if (stattie_id == 18) {
                $('#fertilizers_material').css('display', 'block');
                $('#seeds_material').css('display', 'none');
                $('#ppa_material').css('display', 'none');
                $('#fuel_material').css('display', 'none');
                $('#in').css('display', 'none');
            }
            if (stattie_id == 19) {
                $('#ppa_material').css('display', 'block');
                $('#fertilizers_material').css('display', 'none');
                $('#seeds_material').css('display', 'none');
                $('#fuel_material').css('display', 'none');
                $('#in').css('display', 'none');
            }
            if (stattie_id == 20) {
                $('#fuel_material').css('display', 'block');
                $('#fertilizers_material').css('display', 'none');
                $('#seeds_material').css('display', 'none');
                $('#ppa_material').css('display', 'none');
                $('#in').css('display', 'none');
            }
            if (stattie_id == 0 || stattie_id == 1 || stattie_id == 2 || stattie_id == 3 || stattie_id == 4) {
                $('#in').css('display', 'block');
                $('#fertilizers_material').css('display', 'none');
                $('#seeds_material').css('display', 'none');
                $('#ppa_material').css('display', 'none');
                $('#fuel_material').css('display', 'none');
            }
        });

        $('.mat').change(function()
        {
            var price = $(':selected', this).data('attr');
            $('#price_one').val(price);
            $('#amount').change(function () {
                var amount = $('#amount').val();
                var total = price * amount;
                $('#price_total').val(total);
            });
        });


    });

</script>
