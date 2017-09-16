<h2 class="sub-header">Операції <a class="btn btn-success" href="<?php SRC::getSrc();?>/add-crop/add-action">Додати операцію</a></h2>
<div class="table-responsive">
    <table class="table table-striped well">
        <thead class="head-table-center">
            <tr>
                <th rowspan="2">#</th>
                <th rowspan="2">Назва</th>
                <th rowspan="2">Тип</th>
                <th colspan="3">Водії</th>
                <th colspan="3">Робітники</th>
                <th rowspan="2"></th>
            </tr>
            <tr>

                <th>Кількість</th>
                <th>Клас</th>
                <th>Бонус</th>

                <th>Кількість</th>
                <th>Клас</th>
                <th>Бонус</th>

            </tr>
        </thead>
        <tbody  class="body-table-center">

        <?php
        foreach ($date as $listAction){?>
        <tr>
            <td><?php echo $listAction['id_action'];?></td>
            <td><?php echo $listAction['name_action_ua'];?></td>
            <td><?php echo $listAction['name_action_type_ua'];?></td>
            <td><?php echo $listAction['drivers'];?></td>
            <td><?php echo $listAction['driver_class'];?></td>
            <td><?php echo $listAction['driver_bonus'];?></td>
            <td><?php echo $listAction['workers'];?></td>
            <td><?php echo $listAction['worker_class'];?></td>
            <td><?php echo $listAction['worker_bonus'];?></td>
            <td>
                <div class="btn-group">
                    <a href="/add-crop/edit-action/<?php echo $listAction['id_action'];?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="/add-crop/remove-action/<?php echo $listAction['id_action'];?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
            </td>
        </tr>
        <?php }?>

        </tbody>
    </table>
</div>