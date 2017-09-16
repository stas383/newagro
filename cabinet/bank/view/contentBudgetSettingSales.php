<section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Налаштування реалізації продукції</h3>

            </div>
            <div class="box-body">
                <div class="box-group" id="accordion">
                    <?php
                    $id=0;
                    foreach ($date["My-crop"] as $crop){ $id++ ?>
                        <div class="panel box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#crop<?=$id?>" aria-expanded="false" class="collapsed"><?php echo $date['crop'][$crop['crop_id']][$crop["type"]]["name"]?></a>
                                </h4>
                            </div>
                            <div id="crop<?=$id?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <div class="box-body">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>Реалізація продукції</td>
                                            <?php for ($x=1; $x<=12;$x++){?>
                                                <td><input disabled class="form-control classEdit" type="text" name="r<?php echo $crop['crop_id'].'-'.$crop['type'].'-'.$x ?>" id="r<?php echo $crop['crop_id'].'-'.$crop['type'].'-'.$x ?>" placeholder="<?php echo $x?>" value="<?php echo $date['sales']['r'.$crop['crop_id'].'-'.$crop['type']][$x]?>" ></td>
                                            <?php }?>
                                        </tr>
                                        <tr>
                                            <td>Ціна реалізації, грн/т</td>
                                            <?php for ($x=1; $x<=12;$x++){?>
                                                <td><input disabled class="form-control classEdit" type="text" name="p<?php echo $crop['crop_id'].'-'.$crop['type'].'-'.$x ?>" id="p<?php echo $crop['crop_id'].'-'.$crop['type'].'-'.$x ?>" placeholder="<?php echo $x?>" value="<?php echo $date['sales']['p'.$crop['crop_id'].'-'.$crop['type']][$x]?>" ></td>
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

</section>
<script>
    $(document).ready(function() {
        $(".classEdit").keyup(mass);
        function mass(){
            var id=$(this).attr("id").substr(1);
            var i1=parseFloat($("#1"+id).val());
            var i2=parseFloat($("#2"+id).val());
            var i3=parseFloat($("#3"+id).val());
            var i4=parseFloat($("#4"+id).val());
            var i5=parseFloat($("#5"+id).val());
            var mass=parseFloat($("#m"+id).text());
            if(isNaN(i1)) i1=0;
            if(isNaN(i2)) i2=0;
            if(isNaN(i3)) i3=0;
            if(isNaN(i4)) i4=0;
            if(isNaN(i5)) i5=0;
            if(isNaN(mass)) mass=0;
            var r=(i1+mass)-(i2+i3+i4+i5);
            if(r<0){
                $(this).val($(this).val().substr(1));
                alert("-");
            }
            if(r>0){
                $("#r"+id).text(r);
            }
        }
        $("#trash").click(trash);
        function trash() {
            $('form input[type="text"]').val('');
        }
    });
</script>
