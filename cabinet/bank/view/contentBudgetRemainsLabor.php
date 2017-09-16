
<section class="content">
    <div class="box">
        <table class="table">
            <thead>
                <tr>
                    <th>Технологічна операція</th>
                    <th>Нормо-зміни</th>
                    <th>Кількість</th>
                    <th>Тарифний розряд за виконання робіт</th>
                    <th>Бонуси, %</th>
                    <th>Тарифна ставка, грн/зміну</th>
                    <th>Заробітна плата, грн</th>
                    <th>Сума нарахувань на ФОП, грн</th>
                    <th>Заробітна плата з нарахуваннями на ФОП, грн</th>
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
                        <td>Водії-механізатори</td>
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
                        <td>Робітники</td>
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
                        <th>Сума</th>
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
