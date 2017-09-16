<section class="content">
    <form action="/farmer/budget/save-setting-sales" method="post" >
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> <?=$language['farmer']['25']?></h3>
                <div class="box-tools">
                    <button type="button" class="btn btn-danger" id="trash" ><i class="fa fa-fw fa-trash-o"></i><?=$language['farmer']['14']?></button>
                    <button type="submit"  class="btn btn-success"><?=$language['farmer']['15']?></button>
                </div>
            </div>
            <div class="box-body">
                <div class="box-group" id="accordion">
                    <?php
                    $id=0;
                    foreach($date["My-crop"] as $crop){ $id++ ?>
                        <div class="panel box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#crop<?=$id?>" aria-expanded="false" class="collapsed"><?php if($_COOKIE['lang']=='ua'){echo $date['crop'][$crop['crop_id']][$crop["type"]]["name_ua"];}elseif($_COOKIE['lang']=='gb'){echo $date['crop'][$crop['crop_id']][$crop['type']]['name_en'];}?></a>
                                </h4>
                            </div>
                            <div id="crop<?=$id?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <div class="box-body">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td></td>
                                            <?php for ($x=1; $x<=12;$x++){?>
                                            <th class="text-center"><?php echo $x;?></th>
                                            <?php }?>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><?=$language['farmer']['209']?></td>
                                            <?php for ($x=1; $x<=12;$x++){?>
                                                <td><input class="form-control classEdit proc" type="text" name="r<?php echo $crop['crop_id'].'-'.$crop['type'].'-'.$x ?>" data-crop="<?php echo $crop['crop_id'].'-'.$crop['type']?>" id="r<?php echo $crop['crop_id'].'-'.$crop['type'].'-'.$x ?>" placeholder="<?php echo $x?>" value="<?php echo $date['sales']['r'.$crop['crop_id'].'-'.$crop['type']][$x]?>"></td>
                                            <?php }?>
                                            <td><b id="rez<?php echo $crop['crop_id'].'-'.$crop['type']?>">100%</b></td>
                                        </tr>
                                        <tr>
                                            <td><?=$language['farmer']['210']?></td>
                                            <?php for ($x=1; $x<=12;$x++){?>
                                                <td><input class="form-control classEdit" type="text" name="p<?php echo $crop['crop_id'].'-'.$crop['type'].'-'.$x ?>" id="p<?php echo $crop['crop_id'].'-'.$crop['type'].'-'.$x ?>" placeholder="<?php echo $x?>" value="<?php echo $date['sales']['p'.$crop['crop_id'].'-'.$crop['type']][$x]?>"></td>
                                            <?php }?>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </form>
</section>
<script>
    $(document).ready(function(){
        $(".proc").keyup(proc);
        function proc(){
                var x;
                var summ=0;
                var crop=$(this).attr('data-crop');
                for (x=1; x<=12; x++){
                    var y=parseFloat($("#r"+crop+"-"+x).val());
                    if(isNaN(y)) y=0;
                    summ=summ+y;
                }
                if(summ>100 || summ<0){
                    var value=$(this).val();
                    $(this).val('');
                    summ=summ-parseFloat(value);
                    alert('error');
                }
            $('#rez'+crop).text(summ+"%");
            }
        $("#trash").click(trash);
        function trash() {
            $('form input[type="text"]').val('');
        }
    });
</script>