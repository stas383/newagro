<?php
$tillage_type[1]='традиційна';
$tillage_type[2]='поверхнева';
$tillage_type[3]='мінімальна';
?>
<style>
    .grgr tbody td, tbody th{
        border: 1px solid #000000 !important;
    }
</style>
<section class="content">
    <div class="row">
        <div class="col-md-3">
            <select onchange="window.location.href=this.options[this.selectedIndex].value" class="form-control ">
                <?php foreach ($date['crops'] as $crop_head) {?>
                    <option <?php if($date['crop_id']==$crop_head['id_crop']) echo "selected"?> value="<?php SRC::getSrc();?>/farmer/budget/<?php echo $crop_head['id_crop']?>/<?php echo $date['tillage']?>"><?php echo $crop_head['name_crop_ua']?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-md-3">
            <select onchange="window.location.href=this.options[this.selectedIndex].value" class="form-control col-sm-6">
                <?php for ($t = 1; $t <= 3; $t++) {?>
                    <option <?php if($date['tillage']==$t) echo "selected"?> value="<?php SRC::getSrc();?>/farmer/budget/<?php echo $date['crop_id']?>/<?php echo $t?>"  ><?php echo $tillage_type[$t]?></option>
                <?php }?>
            </select>
        </div>
    </div>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered grgr">
            <tbody>
                <tr>
                    <th>#</th>
                    <th>name_action</th>
                    <th>name_power</th>
                    <th>name_working</th>
                    <th>total_work</th>
                    <th>prod</th>
                    <th>shifts</th>
                    <th>material</th>
                    <th>labor_total</th>
                    <th>name_fuel</th>
                    <th>total_fuel_amnt</th>
                    <th>total_fuel_cost</th>
                </tr>
               <?php
               $n=1;
               foreach ($date[3] as $Plan1){?>
                <tr>
                    <td><?php echo $Plan1['id'] ?></td>
                    <td><?php echo $Plan1['name_action_ua']?></td>
                    <td><?php echo $Plan1['name_power_ua']?></td>
                    <td><?php echo $Plan1['name_working_ua']?></td>
                    <td><?php echo $Plan1['total_work']?></td>
                    <td><?php echo $Plan1['productivity']?></td>
                    <td><?php echo $Plan1['shifts']?></td>
                    <td>
                        <?php if (!empty($Plan1['material_1'])){ echo $Plan1['material_1']; echo '('.$Plan1['material_qty_1'].')'; echo $Plan1['material_price_1'];}?>
                        <br>
                        <?php if (!empty($Plan1['material_2'])){ echo $Plan1['material_2']; echo '('.$Plan1['material_qty_2'].')'; echo $Plan1['material_price_2'];} ?>
                        <br>
                        <?php if (!empty($Plan1['material_3'])){ echo $Plan1['material_3']; echo'('.$Plan1['material_qty_3'].')'; echo $Plan1['material_price_3']; }?>
                    </td>
                    <td><?php echo $Plan1['labor_total_cost_tax']?></td>
                    <td><?php echo $Plan1['name_fuel']?></td>
                    <td><?php echo $Plan1['total_fuel_amnt']?></td>
                    <td><?php echo $Plan1['total_fuel_cost']?></td>
                </tr>
           <?php } ?>
            </tbody>
        </table>
    </div>
</section>
