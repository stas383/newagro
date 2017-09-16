<script>
    $(document).ready(function (){
        $(".btnExport").click(function(e) {
            e.preventDefault();
            var data_type = 'data:application/vnd.ms-excel';
            var table_div = document.getElementById('table_wrapper');
            var table_html = table_div.outerHTML.replace(/ /g, '%20');
            var meta ="<meta http-equiv='content-type' content='text/plain; charset=UTF-8'>";
            var a = document.createElement('a');
            a.href = data_type + ', ' + meta +  table_html;
            a.download = 'AgriAnalytica(RemainsPlan).xls';
            a.click();
        }
        );
        $('.table th, .table td').css({'border':'1px solid black','text-align':'center','vertical-align':'middle'});
    });
</script>
<style>
    .table th{
        border: 1px solid black;
    }
    .table thead tr:hover{
        background: none;
    }
    #table_wrapper{
        overflow: auto;
        max-height: 75vh;
    }
    .le{
        padding-left: 0px!important;
        min-height: 90px;
        border-bottom-left-radius: 0px;
        border-top-left-radius: 0px;
    }
    .left{
        margin: 10px;
    }
    .boxl{
        padding-bottom: 1px;
    }
</style>
<section class="content">
    <div class="box boxl">
        <div class="box-header">
            <h3 class="box-title"><?=$language['farmer']['134']?></h3>
        </div>

    <div class="left le">
        <span class="info-box-icon bg-green"><img src="../../../../cabinet/site/template/img/noun_18658_cc.png " style="margin-top: -10px; max-width: 70%"></span>
    <div class="col-sm-3 le">
        <select class="form-control le" onchange="window.location.href=this.options[this.selectedIndex].value">

       <?php if($date['open_crop']==false) {?> <option selected=""  value="/farmer/budget/remains-plan/0/0"><?=$language['farmer']['267']?></option><?php }?>
        <?php for($x=1;$x<=3;$x++) {foreach ($date['crop_name'][$x]  as $crop){?>
           <option <? if($date['open_crop']==$crop['crop_id'] and $date['open_type']==$x) echo 'selected' ?>  value="/farmer/budget/remains-plan/<? echo $crop['crop_id'].'/'.$x;?>"><? echo $crop['name_crop_ua'];?></option>
       <? }} ?>
    </select>
    </div>
    </div>
    </div>

   <? if($date['open_crop']==true){ ?>
   <div class="box" id="table_wrapper">
       <table class="table">
            <thead>
                <tr>
                    <?php if($date["open_type"]==3){?><td rowspan="7"></td><? } ?>
                    <th rowspan="4" style="height: 90px"><img src="http://www.agrianalytica.com/img/logo.gif" height="80"> </th>
                    <th rowspan="4" colspan="2"><?=$language['farmer']['268']?></th>
                    <th rowspan="4" colspan="16"><?php echo $date["remains"]['stat']['name'] ?></th>
                    <th colspan="3"><?=$language['farmer']['269']?></th>
                    <th colspan="2"><?php echo $date["remains"]['stat']['area'] ?></th>
                </tr>
                <tr>
                    <th colspan="3"><?=$language['farmer']['270']?></th>
                    <th colspan="2"><?php echo $date["remains"]['stat']['mass'] ?></th>
                </tr>
                <tr>
                    <th colspan="3"><?=$language['farmer']['271']?></th>
                    <th colspan="2"><?php echo $date["remains"]['stat']['yaled'] ?></th>
                </tr>
                <tr>
                    <th colspan="3"><?=$language['farmer']['272']?></th>
                    <th colspan="2"></th>
                </tr>
                <tr>
                    <th rowspan="3"><?=$language['farmer']['273']?></th>
                    <th rowspan="3"><?=$language['farmer']['274']?></th>
                    <th rowspan="3"><?=$language['farmer']['275']?></th>
                    <th colspan="2" rowspan="2"><?=$language['farmer']['276']?></th>
                    <th colspan="14"><?=$language['farmer']['277']?></th>
                    <th rowspan="3"><?=$language['farmer']['278']?></th>
                    <th colspan="3" rowspan="2"><?=$language['farmer']['279']?></th>
                    <th rowspan="3"><?=$language['farmer']['280']?></th>
                </tr>
                <tr>
                    <th colspan="7"><?=$language['farmer']['281']?></th>
                    <th colspan="7"><?=$language['farmer']['282']?></th>
                </tr>
                <tr>
                    <th><?=$language['farmer']['283']?></th>
                    <th><?=$language['farmer']['284']?></th>
                    <th><?=$language['farmer']['285']?></th>
                    <th><?=$language['farmer']['286']?></th>
                    <th><?=$language['farmer']['287']?></th>
                    <th><?=$language['farmer']['288']?></th>
                    <th><?=$language['farmer']['289']?></th>
                    <th><?=$language['farmer']['290']?></th>
                    <th><?=$language['farmer']['291']?></th>
                    <th><?=$language['farmer']['292']?></th>
                    <th><?=$language['farmer']['293']?></th>
                    <th><?=$language['farmer']['294']?></th>
                    <th><?=$language['farmer']['295']?></th>
                    <th><?=$language['farmer']['296']?></th>
                    <th><?=$language['farmer']['297']?></th>
                    <th><?=$language['farmer']['298']?></th>
                    <th><?=$language['farmer']['299']?></th>
                    <th><?=$language['farmer']['300']?></th>
                    <th><?=$language['farmer']['301']?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($date["remains"] as $Remains){?>
                        <tr>
                            <?php if($date["open_type"]==3){?><td><a href="/farmer/create/save-edit-plan/<?php echo $Remains["id_plan"] ?>/2" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-pencil"></i></a></td><? } ?>
                            <td><?php echo $Remains["name_action"] ?></td>
                            <td><?php echo $Remains["unit"] ?></td>
                            <td><?php echo number_format($Remains["total_work"], 2, ',', ' ') ?></td>
                            <td><?php echo $Remains["name_working_ua"] ?></td>
                            <td><?php echo $Remains["name_power_ua"]?></td>
                            <td><?php echo $Remains["drivers"]?></td>
                            <td><?php if ($Remains["drivers"]!=0) echo $Remains["driver_class"]?></td>
                            <td><?php if ($Remains["drivers"]!=0) echo number_format($Remains["productivity"], 2, ',', ' ')?></td>
                            <td><?php if ($Remains["drivers"]!=0) echo number_format($Remains["shifts"], 2, ',', ' ')?></td>
                            <td><?php if ($Remains["drivers"]!=0) echo number_format($Remains["drivers_pay_shifts"], 2, ',', ' ')?></td>
                            <td><?php if ($Remains["drivers"]!=0) echo number_format($Remains["drivers_pay"], 2, ',', ' ')?></td>
                            <td><?php if ($Remains["drivers"]!=0) echo number_format($Remains["drivers_tax"], 2, ',', ' ')?></td>
                            <td><?php echo $Remains["workers"]?></td>
                            <td><?php if ($Remains["workers"]!=0) echo $Remains["worker_class"]?></td>
                            <td><?php if ($Remains["workers"]!=0) echo number_format($Remains["productivity"], 2, ',', ' ')?></td>
                            <td><?php if ($Remains["workers"]!=0) echo number_format($Remains["shifts"], 2, ',', ' ')?></td>
                            <td><?php if ($Remains["workers"]!=0) echo number_format($Remains["workers_pay_shifts"], 2, ',', ' ')?></td>
                            <td><?php if ($Remains["workers"]!=0) echo number_format($Remains["workers_pay"], 2, ',', ' ')?></td>
                            <td><?php if ($Remains["workers"]!=0) echo number_format($Remains["workers_tax"], 2, ',', ' ')?></td>
                            <td><?php echo number_format($Remains["labor_total_cost_tax"], 2, ',', ' ')?></td>
                            <td><?php echo number_format($Remains["fuel"], 2, ',', ' ')?></td>
                            <td><?php echo number_format($Remains["total_fuel_amnt"], 2, ',', ' ')?></td>
                            <td><?php echo number_format($Remains["total_fuel_cost"], 2, ',', ' ')?></td>
                            <td><?php echo number_format($Remains["total_fuel_cost"]+$Remains["labor_total_cost_tax"], 2, ',', ' ')?></td>
                        </tr>
                <? } ?>
            </tbody>
        </table>
       <table class="table">
           <tbody>
           <?php
           $table_name=array(
               '1'=>$language['farmer']['302'],
               '2'=>$language['farmer']['303'],
               '3'=>$language['farmer']['304'],
               '4'=>$language['farmer']['305'],
               '5'=>$language['farmer']['306'],
               '6'=>$language['farmer']['307'],
               '7'=>$language['farmer']['308'],
               '8'=>$language['farmer']['309'],
               '9'=>$language['farmer']['310'],
               '10'=>$language['farmer']['311'],
               '11'=>$language['farmer']['312'],
               '12'=>$language['farmer']['313'],
               '13'=>$language['farmer']['314'],
           );
           foreach ($date["remains_table"] as $key_table=>$remains_table) {?>
                <tr>
                  <?php foreach ($remains_table as $key=>$value){ ?>
                    <th>
                        <?php
                        if($key==0 or $key_table==0) echo $table_name[$value];
                        else{
                            if($value==false) $value=0;
                            echo number_format($value, 2, ',', ' ');}
                        ?>
                    </th>
                  <?php }?>
                </tr>
               <?php if($key_table==2 or $key_table==3 or $key_table==4){
                   foreach ($date['remains_material'][$key_table-1] as $material){
                   ?>
                 <tr>
                     <td class="level3"><?php echo $material['material'] ?></td>
                     <td><?php echo number_format($material['material_qty'], 2, ',', ' ') ?></td>
                     <td><?php echo number_format($material['material_price'], 2, ',', ' ') ?></td>
                     <td><?php echo number_format($material['material_price_area'], 2, ',', ' ') ?></td>
                     <td><?php echo number_format($material['material_price_mass'], 2, ',', ' ') ?></td>
                 </tr>
               <?}
               }
           } ?>
           </tbody>
       </table>
    </div>
        <button class="btn btn-primary btnExport"><?=$language['farmer']['11']?></button><? }?>
</section>
