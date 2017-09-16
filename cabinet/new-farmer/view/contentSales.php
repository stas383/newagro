<?php
    $month_name_en = array(
    1=>'January',
    2=>'February',
    3=>'March',
    4=>'April',
    5=>'May',
    6=>'June',
    7=>'July',
    8=>'August',
    9=>'September',
    10=>'October',
    11=>'November',
    12=>'December',
    );
$id_material_type = array(
    1=>'Насіння',
    2=>'Добрива',
    3=>'ЗЗР',
    4=>'ПММ'
);
   /* echo "<pre>";
    var_dump($date['sales']);die;*/
?>
<div class="box">
    <div class="box-bodyn">
            <div class="non-semantic-protector">
            <h1 class="ribbon">
                <strong class="ribbon-content"><?=$language['new-farmer']['9']?></strong>
            </h1>
        </div>
    </div>
    <div class="box">
        <div class="box-body">
<!--            <div class="rown">
                <div class="table-responsive">
                <div class="col-lg-10">
                <div>
                    <h3 style="float: left;"><?/*=$language['new-farmer']['156']*/?></h3>
                </div>
                    <table class="table">
                        <thead>
                            <tr class="tabletop">
                                <th><?/*=$language['new-farmer']['111']*/?></th>
                                <th><?/*=$language['new-farmer']['80']*/?></th>
                                <th><?/*=$language['new-farmer']['142']*/?></th>
                                <th><?/*=$language['new-farmer']['132']*/?></th>
                                <th><?/*=$language['new-farmer']['133']*/?></th>
                                <th><?/*=$language['new-farmer']['114']*/?></th>
                            </tr>
                        </thead>
                        <tbody class="sales">
                            <?/* foreach($date['sales'] as $sales){
                                $date_elements  = explode("-",$sales['come_out_date']);
                                $month=$date_elements[1]+0;*/?>
                                <tr class="fact <?php /*echo 'material_st_'.$sales['storage_type_material'].' month_'.$month*/?>">
                                    <td><?/*=$sales['come_out_date']*/?></td>
                                    <td><?/* echo $id_material_type[$sales['storage_type_material']].': '.$sales['name_material'];*/?></td>
                                    <td><?/*=$sales['come_out_quantity']*/?></td>
                                    <td><?/*=$sales['come_out_sum_total']*/?></td>
                                    <td><?/*=$sales['come_out_price_unit']*/?></td>
                                    <td><?/*=$sales['sadsa']*/?></td>
                                </tr>
                            <?/*}*/?>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-2">
                    <div class="box">
                        <div class="box-bodyn">
                            <label for="material_id"><?/*=$language['new-farmer']['80']*/?></label>
                            <select name="material_id" id="material_id" class="form-control inphead">
                                <option value="0"><?/*=$language['new-farmer']['80']*/?></option>
                                <?php /*foreach ($id_material_type as  $key=> $crop){ */?>
                                    <option value="<?php /*echo $key*/?>"><?php /*{echo $crop;}*/?></option>
                                <?php /*}*/?>
                            </select>
                            <br>
                            <label for="month"><?/*=$language['new-farmer']['157']*/?></label>
                            <select name="month" id="month" class="form-control  inphead">
                                <option value="0"><?/*=$language['new-farmer']['157']*/?></option>
                                <?php /*for ($x=1;$x<=12;$x++){ */?>
                                    <option value="<?php /*echo $x*/?>"><?/*=$month_name_en[$x]*/?></option>
                                <?php /*}*/?>
                            </select>
                        </div>
                    </div>
                </div>
                </div>
            </div>-->

             <div class="rown">
                 <div class="table-responsive">
                <div class="col-lg-10">
                <div>
                    <h3 style="float: left;"><?=$language['new-farmer']['158']?></h3>
                    <a  style="float: right;" class="btn btn-primaryn" href="#Plan_sale" data-toggle="modal"><?=$language['new-farmer']['188']?></a>
                </div>
                    <table class="table">
                        <thead>
                            <tr class="tabletop">
                                <th><?=$language['new-farmer']['48']?></th>
                                <th><?=$language['new-farmer']['159']?></th>
                                <th><?=$language['new-farmer']['160']?></th>
                                <th><?=$language['new-farmer']['161']?></th>
                                <th><?=$language['new-farmer']['162']?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach($date['plane_sale'] as $plane_sale){?>
                                <tr>
                                    <td><?=$plane_sale['name_crop_ua']?></td>
                                    <td><?=$plane_sale['plane_sale_expected_yield']?></td>
                                    <td><?=$plane_sale['plane_sale_now']?></td>
                                    <td><?=$plane_sale['plane_sale_avr_price']?></td>
                                    <td><?=$plane_sale['plane_sale_revenue']?></td>
                                </tr>
                            <?}?>
                        </tbody>
                    </table>
                </div>
                </div>
             </div>

        </div>
    </div>
</div>
<div id="Plan_sale" class="modal fade">
    <div class="modal-dialog modal-lg">
    <form action="" method="post">
    <div class="modal-content wt">
        <div class="box-bodyn">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <span class="box-title"><?=$language['new-farmer']['188']?></span>
        </div>
        <div class="modal-body">
            <table class="table">
                        <thead>
                            <tr>
                                <th><?=$language['new-farmer']['5']?></th>
                                <th><?=$language['new-farmer']['48']?></th>
                                <th><?=$language['new-farmer']['159']?></th>
                                <th><?=$language['new-farmer']['186']?></th>
                                <th><?=$language['new-farmer']['187']?></th>
                                <th><?=$language['new-farmer']['161']?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="sales">
                            <? foreach($date['plane_sales'] as $plane_sales){
                               ?>
                            <tr>
                                <td><?=$plane_sales['field_name'];?></td>
                                <td><?=$plane_sales['name_crop_ua'];?></td>
                                <td><?=$plane_sales['field_yield']*$plane_sales['field_size']*100;?></td>
                                <?if($crop_show[$plane_sales['id_crop']] == false){?>
                                <td rowspan="<?=$date['sum_crop'][$plane_sales['id_crop']]?>"><?=$date['sum_yield'][$plane_sales['id_crop']]?></td>
                                <td rowspan="<?=$date['sum_crop'][$plane_sales['id_crop']]?>"><input type="text" class="form-control" id="plane_sale_now_<?=$plane_sales['id_crop'];?>" name="plane_sale_now"></td>
                                <td rowspan="<?=$date['sum_crop'][$plane_sales['id_crop']]?>"><input type="text" name="avr_price" class="form-control <?php echo 'avr_price_'.$plane_sales['id_crop']?>"></td>
                                <td rowspan="<?=$date['sum_crop'][$plane_sales['id_crop']]?>"><a class="btn btn-primary btn-sm add_sale"
                                data-crop="<?=$plane_sales['id_crop']?>"
                                data-expected = "<?=$date['sum_yield'][$plane_sales['id_crop']]?>"
                                ><?=$language['new-farmer']['189']?>
                                </a></td>
                                <?}?>
                                <input type="hidden" data-id="<?=$plane_sales['id_field'];?>">
                            </tr>
                            <? $crop_show[$plane_sales['id_crop']]=true;}?>

                        </tbody>
                    </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            <button type="button" class="btn btn-primaryn save_sale">Сохранить</button>
        </div>
    </div>
    </form>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#material_id,#month').change(filter);
        function filter() {
            var month=$('#month').val();
            var material=$('#material_id').val();
            $('.fact').show();
            if(month != 0){
                $('.sales tr:not(.month_'+month+')').hide();
            }
            if(material!=0){
                $('.sales tr:not(.material_st_'+material+')').hide();
            }
        }
        $('.add_sale').click(function(){
            var crop = $(this).attr('data-crop');
            var avr_price = $('.avr_price_'+crop).val();
            var expected_yield = $(this).attr('data-expected');
            var plane_to_sale = $('#plane_sale_now_'+crop).val();
            var revenue = avr_price*plane_to_sale;

            $.ajax({
                type : 'post',
                url : '/new-farmer/plane_sale',
                data : {
                    'culture': crop, 
                    'avr_price' : avr_price,
                    'expected_yield' : expected_yield,
                    'plane_to_sale' : plane_to_sale,
                    'revenue': revenue
                }
            });
        });
        $('.save_sale').click(function(){
           location.reload();
        });
	});
</script>