<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Ціна реалізації, грн/т</h3>
        </div>
        <div class="box-body">
            <table class="table">
                <tbody>
                    <tr>
                        <?php for($x=1;$x<=12;$x++){?>
                        <th class="text-center"><?php echo $x?></th>
                        <?php }?>
                    </tr>
                    <?php
                    $id=0;
                    foreach ($date["My-crop"] as $crop){ $id++ ?>
                        <tr>
                            <th colspan="12" class="text-center"><?php echo $date['crop'][$crop['crop_id']][$crop["type"]]["name"]?> </th>
                        </tr>
                        <tr>
                            <?php for ($x=1; $x<=12;$x++){?>
                                <td class="text-center"><?php echo $date['sales']['p'.$crop['crop_id'].'-'.$crop['type']][$x]?></td>
                            <?php }?>
                        </tr>
                    <?}?>
                </tbody>
            </table>
        </div>
    </div>
</section>