
<style>
.cursor{
    cursor: pointer;
}
</style>
<?php
$title_type[1]="Насіння";
$title_type[2]="Добрива";
$title_type[3]="ЗЗР";
?>
<div class="box-body">
    <div class="box-group" id="accordion">
    <?php for($x=1; $x<=3; $x++){ ?>
        <div class="panel box box-primary">
            <div class="box-header with-border">
                <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $x?>" aria-expanded="false" class="collapsed">
                        <?php echo $title_type[$x]?>
                    </a>
                </h4>
            </div>
            <div id="collapse<?php echo $x?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                <div class="box-body">
                    <div class="row">

                        <div class="col-md-6"><h4>стандартні матеріали:</h4></div>
                        <div class="col-md-6"><h4>обрані матеріали:</h4></div>

                        <?php foreach ($date[$x] as $my_material){?>

                                <div class="col-md-5">
                                    <label><?php echo $my_material['action']?></label>
                                        <input disabled type="text" class="form-control" value="<?php echo $my_material['name_material_ua']?>">

                                </div>
                                <div class="col-md-2">
                                    <br>
                                    <button type="button" class="btn btn-info in-stope" data-crop="<?php echo $my_material['crop'] ?>" data-type="<?php echo $x?>" data-plan="<?php echo $my_material['crop_plan']?>" data-nomer="<?php echo $my_material['nomer']?>"><i class="fa fa-fw fa-exchange"></i>обрати</button>
                                </div>
                                <div class="col-md-5">
                                        <label><?php echo $my_material['action']?></label>
                                        <input disabled type="text" class="form-control" id="new_material_<?php echo $my_material['crop_plan']?>_<?php echo $my_material['nomer']?>" value="<?php echo $my_material['name_material_distributor']?>">
                                </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
    </div>
</div>