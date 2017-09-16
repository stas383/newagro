<?
$user=0;
$id=$_SESSION['id_user'];
foreach ($date["proc"] as $test)if($test["id_user"]==1){
    $user=$id;
} ?>
<section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Налаштування</h3>

            </div>
            <div class="box-body no-padding">
               <table class="table">
                   <thead>
                   <tr>
                       <td></td>
                       <?php for($m=1; $m<=12; $m++){?>
                           <td><?php echo $m?></td>
                       <?php } ?>
                       <td></td>
                   </tr>
                   </thead>
                   <tbody>
                   <?php
                   $x=0;
                   foreach ($date["setting"] as $setting){
                       $x++;
                       ?>
                       <tr>
                           <td><?php echo $setting["name"]?></td>
                           <?php
                           foreach ($date["proc"] as $proc[$setting["name_php"]])if($proc[$setting["name_php"]]["name_cf"]==$setting["name_php"]
                               and ($proc[$setting["name_php"]]["id_user"]==$user)){?>
                               <?php for($m=1; $m<=12; $m++){?>
                                   <td><input id="pr<?php echo $x."-".$m ?>" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" class="form-control classEdit" type="text" name="<?php echo $setting["name_php"].$m?>" value="<?php echo $proc[$setting["name_php"]]["cf_".$m]?>"  disabled></td>
                               <?php } ?>
                           <?php }?>
                           <td><b id="ex<?php echo $x?>">100%</b></td>
                       </tr>
                   <?php } ?>
                   </tbody>
               </table>
            </div>
        </div>
</section>
<script>
    $(document).ready(function() {
        for (x = 1; x < 5; x++) {
            for (i = 1; i < 12; i++) {
                $('#pr'+x+'-'+i).change(edit);
            }
        }
        function edit() {
            for (x = 1; x < 5; x++) {
                proc.x=0;
                for (i = 1; i < 12; i++) {
                    proc.x+=parseFloat($('#pr'+x+'-'+i).val());
                }
                $("#ex"+x).text(proc.x);
            }
        };
    });
</script>
