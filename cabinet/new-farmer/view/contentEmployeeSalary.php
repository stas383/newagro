<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 24.08.2017
 * Time: 12:17
 */
?>

<div class="box-body">
    <div class="responsive">
        <h3 style="float: left;">
            Salary costs
        </h3>
        <a href="/new-farmer/budget" class="btn btn-success" style="float: right; margin-top: 7px; margin-right: 15px;"><i class="fa fa-fw fa-arrow-left"></i>Назад</a>
        <table class="table table-striped well">
            <thead>
            <tr>
                <th>Operation</th>
                <th>Name and Surname</th>
                <th>Position</th>
                <th>Salary per hectare, UAH</th>
                <th>Total costs, UAH</th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($date['budget']['remains'] as $salary){?>
                <tr>
                    <td><?=$salary['action']?></td>
                    <td><?=$date['employee'][$salary['name']]['employee_name'].' '.$date['employee'][$salary['surname']]['employee_surname'];?></td>
                    <td><?=$date['employee'][$salary['position']]['employee_position'];?></td>
                    <td><?=$salary['pay'];?></td>
                    <td><?=$salary['summ_pay'];?></td>
                </tr>
            <?}?>
            </tbody>
        </table>
    </div>
</div>

