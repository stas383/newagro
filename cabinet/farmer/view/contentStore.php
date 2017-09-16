
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
                    <table class="table table-bordered">
                        <tbody>
                        <?php foreach ($date[$x] as $my_material){?>
                            <tr>
                                <th><?php echo $my_material['name_material_ua']?></th>
                            </tr>

                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php }?>
    </div>
</div>