<?php
$title_type[1]="Насіння";
$title_type[2]="Добрива";
$title_type[3]="ЗЗР";
?>
<section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Налаштування залишків</h3>

            </div>
            <div class="box-body">
                <div class="box-group" id="accordion">
                    <?php
                    $t=0;
                    for($x=1; $x<=3; $x++){ ?>
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
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Матеріал</th>
                                            <th>Залишок, кг</th>
                                            <th>Потреба, кг</th>
                                            <th>Потреба з урахуванням залишків, кг</th>
                                            <th>Ціна, грн/кг</th>
                                            <th>Витрати, грн</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($date[$x] as $material){
                                            $t++;
                                            $name_material[$t]= SRC::translit($material['name']);
                                            ?>
                                            <tr>
                                                <td><?php echo $material['name'] ?></td>
                                                <td><input id="<?php echo $t?>" type="text" name="<?php echo $name_material[$t] ?>" value="<?php echo $GLOBALS['my_materials'][$name_material[$t]] ?>" class="form-control classEdit"  disabled></td>
                                                <td id="mass<?php echo $t?>"><?php echo $material['mass'] ?></td>
                                                <td id="ex_mass<?php echo $t?>"><?php echo $material['mass']-$GLOBALS['my_materials'][$name_material[$t]] ?></td>
                                                <td id="price<?php echo $t?>"><?php echo $material['price'] ?></td>
                                                <td id="total<?php echo $t?>"><?php echo ($material['mass']-$GLOBALS['my_materials'][$name_material[$t]])*$material['price'] ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php }?>
            </div>
        </div>

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
    })
</script>
