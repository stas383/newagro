<style>
    td{
        text-align: center;
    }
</style>
<div class="box-body">
    <div class="table-responsive">
        <table class="table table-striped well">
            <tr>
                <td>
                    <label for="id_action_type"><?=$language['farmer-small']['24']?></label><br><br>
                    <select onchange="window.location.href=this.options[this.selectedIndex].value" class="form-control sub-header" id="select_crop" required>
                        <?php if($date['id']==0){?><option selected value="0"><?=$language['farmer-small']['37']?></option><?php }?>
                        <?php foreach ($date['crop']['my_crop'] as $crop){?>
                            <option <?php if($crop['id']==$date['id']) echo "selected"?> value="<?php SRC::getSrc();?>/farmer-small/list-forecast/<?php echo $crop['id']?>" ><?php if($_COOKIE['lang']=='ua'){echo $crop['name_crop_ua'];} elseif($_COOKIE['lang']=='gb'){echo $crop['name_crop_en'];}?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
        </table>
    </div>
            <?php if($date['id']<>0){?>
    <div class="box-body">
        <div class="tabel-responsive">
             <table class="table table-striped well">
              <?php foreach ($date['data'] as $value){?>
                  <?php foreach ($value as $key)if($key['id']==$date['id']){?>
             <tr>
                 <td>
                        <label for="area"><?=$language['farmer-small']['25']?></label><br><br>
                            <input class="form-control" name="area" value="<?php echo $key['area'];?>">
                 </td>
                 <td>
                        <label for="croppage"><?=$language['farmer-small']['102']?></label><br><br>
                        <input class="form-control" name="croppage" value="<?php echo $key['yaled']*$key['area'];?>">
                 </td>
                 <td>
                        <label for="crop_capacity"><?=$language['farmer-small']['26']?></label><br><br>
                        <input class="form-control" name="yaled" value="<?php echo $key['yaled'];?>">
                    </td>
                </tr>
                <?}?>
                <?}?>
            </table>
        </div>
    </div>
    <input type="hidden" name="crop_id" value="<?php echo $date['id']?>" required>


    <div class="table-responsive">
        <table class="table table-striped well">
            <thead class="head-table-center">
                <tr style="text-align: center">
                    <td rowspan="2"><?=$language['farmer-small']['103']?></td>
                    <td rowspan="2"><?=$language['farmer-small']['103']?></td>
                    <td rowspan="2"><?=$language['farmer-small']['103']?></td>
                    <td rowspan="2"><?=$language['farmer-small']['104']?></td>
                    <td rowspan="2"><?=$language['farmer-small']['83']?></td>
                    <td rowspan="2"><?=$language['farmer-small']['84']?></td>
                    <td colspan="8"><?=$language['farmer-small']['105']?></td>
                    <td rowspan="2"><?=$language['farmer-small']['51']?></td>
                </tr>
                <tr>
                    <td><?=$language['farmer-small']['106']?></td>
                    <td><?=$language['farmer-small']['107']?></td>
                    <td><?=$language['farmer-small']['108']?></td>
                    <td><?=$language['farmer-small']['109']?></td>
                    <td><?=$language['farmer-small']['110']?></td>
                    <td><?=$language['farmer-small']['111']?></td>
                    <td><?=$language['farmer-small']['112']?></td>
                    <td><?=$language['farmer-small']['113']?></td>
                </tr>
            </thead>
            <tbody>
            
            <?php foreach ($date['crop_plan']['lib'] as $type)if($type['type']== 1 and count($date['action'][$type['id_action']])>0){?>
            <pre>
            <? //var_dump($date['action']);die;?>
                <tr>
                    <td><b><? if($_COOKIE['lang']=='ua'){echo $type['name_ua'];} elseif($_COOKIE['lang']=='ua'){echo $type['name_en'];}?></b></td>
                <? foreach ($date['action'][$type['id_action']] as $action){?>
                    <td><? echo $action['name'];?></td>
                    <td><? echo $action['unit'];?></td>
                    <td>
                        <?php

                        $id_mat = explode(',',$action['id_materials']);
                        $summ = 0;
                            if($action['unit'] == 'га'){
                                echo $key['area'];
                            }
                            else{
                                foreach ($id_mat as $id) {
                                    $summ += $date['material'][$id]['material_norm'] * $key['area'];
                                }
                                echo $summ;
                            }
                        ?>
                    </td>
                    <td><?echo $action['start_date'];?></td>
                    <td><?echo $action['end_date'];?></td>
                    <td>
                        <? $id_material[$action['id']] = explode(',',$action['id_materials']);
                            foreach ($id_material[$action['id']] as $item)
                                {
                                    if($date['material'][$item]['material_id'] == '17') {
                                        $var[1][$action['id']] += $date['material'][$item]['material_norm'] * $date['material'][$item]['material_price']*$key['area'];
                                        }
                                }
                                echo number_format($var[1][$action['id']]);
                            ?>
                    </td>
                    <td>
                        <? foreach ($id_material[$action['id']] as $item)
                            {
                                    if($date['material'][$item]['material_id'] == '18') {
                                            $var[2][$action['id']] += $date['material'][$item]['material_norm'] * $date['material'][$item]['material_price']*$key['area'];
                                    }
                            }
                            echo number_format($var[2][$action['id']]);
                            ?>
                    </td>
                    <td id="zzr">
                        <?
                            foreach ($id_material[$action['id']] as $item)
                                {
                                    if($date['material'][$item]['material_id'] == '19') {
                                        $var[3][$action['id']] += $date['material'][$item]['material_norm'] * $date['material'][$item]['material_price'] * $key['area'];
                                    }
                                }
                        echo number_format($var[3][$action['id']]);
                        ?>
                    </td>
                    <td id="pmm">
                        <?
                        foreach ($id_material[$action['id']] as $item){
                            if($date['material'][$item]['material_id'] == 20) {
                             $var[4][$action['id']] += $date['material'][$item]['material_norm'] * $date['material'][$item]['material_price'] * $key['area'];
                            }

                            }
                        echo number_format($var[4][$action['id']]);
                        ?>
                    </td>
                        <td id="payment_for_all_area">
                            <?=$action['payment_for_all_area'];?>
                        </td>
                    <td id="payment">
                        <? echo $action['payment_for_all_area_own']+$action['payment_for_all_area_rent'];?>
                    </td>
                    <td></td>
                    <td id="payment_for_all_other"> <?=$action['payment_for_all_other'];?></td>
                    <td id="all"><?echo   $var[1][$action['id']]+$var[2][$action['id']]+$var[3][$action['id']]+$var[4][$action['id']]+$action['payment_for_all_area']+$action['payment_for_all_area_own']+$action['payment_for_all_area_rent']+$action['payment_for_all_other'];?></td>
                    <td><a href="/farmer-small/edit-plan/<?php echo $date['id'].'/'.$action['id']?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a></td>
                </tr>
                <? }
            } ?>
                   

            </tbody>
        </table>
    </div><br><br>
     <?php }?>
</div>