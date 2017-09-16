<?php
$title_type[1]= $language['farmer']['16'];
$title_type[2]= $language['farmer']['17'];
$title_type[3]= $language['farmer']['18'];
$x=$date['type'];
$seting=$date['seting'];
$t=0;
?>
<section class="content">
    <form action="/farmer/budget/save-setting-material" method="post">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?=$language['farmer']['13'];?></h3>
            </div>
            <div class="box-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th><?php echo $language['farmer']['19']; ?></th>
                        <th><?php echo $language['farmer']['21']; if($x==1) echo ', п.од.'; if($x==3) echo ', л';?></th>
                        <?php if($seting==1){ ?> <th><?php echo $language['farmer']['22']; if($x==1) echo ', п.од.'; if($x==3) echo ', л';?></th><?php }?>
                        <th><?php echo $language['farmer']['23']; if($x==1) echo ', п.од.'; if($x==3) echo ', л';?></th>
                        <th><?php echo $language['farmer']['24'];?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($date[$x] as $material){
                        $t++;
                        $name_material[$t]= SRC::translit($material['name']);
                        ?>
                        <tr>
                            <td><?php echo $material['name'] ?></td>
                            <td id="mass<?php echo $t?>"><?php echo number_format($material['mass'], 0, '.', ' ') ?></td>
                            <?php if($seting==1){ ?>  <td id="ex_mass<?php echo $t?>"><?php echo number_format($material['mass']-$GLOBALS['my_materials'][$name_material[$t]], 0, '.', ' ') ?></td><?php }?>
                            <td id="price<?php echo $t?>"><?php echo number_format($material['price'], 0, '.', ' ') ?></td>
                            <td id="total<?php echo $t?>"><?php echo number_format(($material['mass'])*$material['price'], 0, '.', ' ') ?></td>
                        </tr>
                    <?php
                    if($seting==1) $coll=4;
                    if($seting!=1) $coll=3;
                    $summ=$summ+(($material['mass'])*$material['price']);
                    } ?>
                        <tr>
                            <td colspan="<?=$coll?>"></td>
                            <td><?php echo number_format($summ, 0, '.', ' ')?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</section>
<script>
    $(document).ready(function () {
        $('.classEdit').keyup(calculate);
        function calculate() {
            var id=$(this).attr('id');
            var mass=parseFloat($('#mass'+id).text());
            var price=parseFloat($('#price'+id).text());
            var value=parseFloat($(this).val());
            var ex_mass=mass-value;
            var total=ex_mass*price;
            $('#ex_mass'+id).text(ex_mass);
            $('#total'+id).text(total);
        }
        $("#trash").click(trash);
        function trash() {
            $('form input[type="text"]').val('');
        }
    });
</script>
