
<section class="content">
    <div class="box">
        <table class="table">
            <thead>
                <tr>
                <?=$language['farmer']['']?>
                    <th><?=$language['farmer']['220']?></th>
                    <th><?=$language['farmer']['233']?></th>
                    <th><?=$language['farmer']['250']?></th>
                    <th><?=$language['farmer']['251']?></th>
                    <th><?=$language['farmer']['252']?></th>
                    <th><?=$language['farmer']['253']?></th>
                    <th><?=$language['farmer']['254']?></th>
                    <th><?=$language['farmer']['255']?></th>
                    <th><?=$language['farmer']['256']?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $x=0;
                foreach ($date["remains"] as $Remains){
                    $x++?>
                    <tr>
                        <td colspan="9"><h4><?php echo $x.".".$Remains["name_action"] ?></h4></td>
                    </tr>
                    <?php if($Remains["drivers"]>0){ ?>
                    <tr>
                        <td><?=$language['farmer']['257']?></td>
                        <td><?php echo  number_format($Remains["shifts"], 2, '.', ' ') ?></td>
                        <td><?php echo  number_format($Remains["drivers"], 2, '.', ' ') ?></td>
                        <td><?php echo  number_format($Remains["driver_class"], 2, '.', ' ') ?></td>
                        <td><?php echo  number_format($Remains["driver_bonus"], 2, '.', ' ') ?></td>
                        <td><?php echo  number_format($Remains["drivers_pay_shifts"]/$_COOKIE['currency_val'], 2, '.', ' ') ?></td>
                        <td><?php echo  number_format($Remains["drivers_pay"]/$_COOKIE['currency_val'], 2, '.', ' ') ?></td>
                        <td><?php echo  number_format($Remains["drivers_tax"]/$_COOKIE['currency_val'], 2, '.', ' ') ?></td>
                        <td><?php echo  number_format($Remains["labor_drivers_cost_tax"]/$_COOKIE['currency_val'], 2, '.', ' ') ?></td>
                    </tr>
                        <?php } if($Remains["workers"]>0){?>
                    <tr>
                        <td><?=$language['farmer']['258']?></td>
                        <td><?php echo  number_format($Remains["shifts"], 2, '.', ' ') ?></td>
                        <td><?php echo  number_format($Remains["workers"], 2, '.', ' ') ?></td>
                        <td><?php echo  number_format($Remains["worker_class"], 2, '.', ' ') ?></td>
                        <td><?php echo  number_format($Remains["worker_bonus"], 2, '.', ' ') ?></td>
                        <td><?php echo  number_format($Remains["workers_pay_shifts"]/$_COOKIE['currency_val'], 2, '.', ' ') ?></td>
                        <td><?php echo  number_format($Remains["workers_pay"]/$_COOKIE['currency_val'], 2, '.', ' ') ?></td>
                        <td><?php echo  number_format($Remains["workers_tax"]/$_COOKIE['currency_val'], 2, '.', ' ') ?></td>
                        <td><?php echo  number_format($Remains["labor_workers_cost_tax"]/$_COOKIE['currency_val'], 2, '.', ' ') ?></td>
                    </tr>
                        <?php }?>
                    <tr>
                        <th><?=$language['farmer']['259']?></th>
                        <td colspan="4"></td>
                        <td><?php echo  number_format($Remains["pay_shifts"]/$_COOKIE['currency_val'], 2, '.', ' ') ?></td>
                        <td><?php echo  number_format($Remains["labor_total_cost"]/$_COOKIE['currency_val'], 2, '.', ' ') ?></td>
                        <td><?php echo  number_format($Remains["labor_total_tax"]/$_COOKIE['currency_val'], 2, '.', ' ') ?></td>
                        <td><?php echo  number_format($Remains["labor_total_cost_tax"]/$_COOKIE['currency_val'], 2, '.', ' ') ?></td>
                    </tr>
                    <tr>
                        <td colspan="9"><br></td>
                    </tr>
                <? } ?>
                <tr>
                    <td colspan="8"></td>
                    <td><? echo number_format($date["total"]['direct_labor']/$_COOKIE['currency_val'], 2, '.', ' ')?></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
