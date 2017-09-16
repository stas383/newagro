<section class="content">
    <form action="/farmer/budget/save-cash-flow" method="post">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo $language['farmer']['116']?></h3>
                <div class="box-tools">
                    <button type="submit" class="btn btn-success"><?php echo $language['farmer']['15']?></button>
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
                </tr>
                </thead>
                <tbody>
                <?php
                $x=0;
                foreach ($date["setting"] as $setting){ $x++; ?>
                    <tr>
                        <td class="<?php echo $setting["class"]?>"><?php if($_COOKIE['lang']=='ua'){echo $setting["name_ua"];}elseif($_COOKIE['lang']=='gb'){echo $setting['name_en'];}?></td>
                        <?php
                            $coll=12;
                            if($setting["name_php"]==1)$coll=1;
                            if ($setting["name_php"]!='false') for($m=1; $m<=$coll; $m++){?>
                                <td><input id="pr<?php echo $x."-".$m ?>" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" class="form-control classEdit" type="text" name="<?php echo $setting["name_php"].$m?>" value="<?php echo $date['proc'][$setting["name_php"]][$m]?>" ></td>
                            <?php }
                         ?>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
    </form>
</section>
