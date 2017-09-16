<?
$user=0;
$id=$_SESSION['id_user'];
foreach ($date["proc"] as $test)if($test["id_user"]==1){
    $user=$id;
}
?>
<section class="content">
    <form action="/farmer/budget/save-setting-month" method="post">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo $language['farmer']['36']?></h3>
                <div class="box-tools">
                    <button type="submit" class="btn btn-success"><?php echo $language['farmer']['15'];?></button>
                </div>
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
                           <td><?php if($_COOKIE['lang']=='ua'){echo $setting["name_ua"];}elseif($_COOKIE['lang']=='gb'){echo $setting['name_en'];}?></td>
                           <?php
                           foreach ($date["proc"] as $proc[$setting["name_php"]])if($proc[$setting["name_php"]]["name_cf"]==$setting["name_php"]
                               and ($proc[$setting["name_php"]]["id_user"]==$user)){?>
                               <?php for($m=1; $m<=12; $m++){?>
                                   <td><input data-name="<?php echo $x?>" id="pr<?php echo $x."-".$m ?>" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" class="form-control classEdit proc" type="text" name="<?php echo $setting["name_php"].$m?>" value="<?php echo $proc[$setting["name_php"]]["cf_".$m]?>" ></td>
                               <?php } ?>
                           <?php }?>
                           <td><b id="ex<?php echo $x?>">100%</b></td>
                       </tr>
                   <?php } ?>
                   </tbody>
               </table>
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
            var id=$(this).attr('data-name');
            for (x=1; x<=12; x++){
                var y=parseFloat($("#pr"+id+"-"+x).val());
                if(isNaN(y)) y=0;
                summ=summ+y;
            }
            if(summ>100 || summ<0){
                var value=$(this).val();
                $(this).val('');
                summ=summ-parseFloat(value);
                alert('error');
            }
            $('#ex'+id).text(summ+"%");
        }
    });
</script>
