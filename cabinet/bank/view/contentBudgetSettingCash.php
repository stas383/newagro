<?php
$user=0;
foreach ($date["proc"] as $test)if($test["id_user"]==1){
    $user=$_SESSION['bank_user_id'];
}
?>
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
                        and ($proc[$setting["name_php"]]["id_user"]==$user)){
                        $coll=12;
                        if($setting["name_php"]==1)$coll=1;
                        for($m=1; $m<=$coll; $m++){?>
                            <td><input id="pr<?php echo $x."-".$m ?>" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" class="form-control classEdit" type="text" name="<?php echo $setting["name_php"].$m?>" value="<?php echo $proc[$setting["name_php"]]["cf_".$m]?>"  disabled></td>
                        <?php }
                    }?>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    </div>
</section>
