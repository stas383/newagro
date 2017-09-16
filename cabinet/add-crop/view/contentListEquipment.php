<h2 class="sub-header">Техніка</h2>
<div class="table-responsive">
    <table class="table table-striped well">
        <thead class="head-table-center">
            <tr>
                <th>Операця</th>
                <th>Марка трактора</th>
                <th>Марка с/г машини</th>
                <th>Вид палива</th>
                <th>Середні витрати пального</th>
                <th>Середня продуктивність</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($date as $listEquipmentKey){?>
        <tr>
            <td>(<?php echo $listEquipmentKey['id_action'];?>)<?php echo $listEquipmentKey['name_action_ua'];?></td>
            <td><?php echo $listEquipmentKey['name_working_ua'];?></td>
            <td><?php echo $listEquipmentKey['name_power_ua'];?></td>
            <td><?php echo $listEquipmentKey['name_fuel_ua'];?></td>
            <td><?php echo $listEquipmentKey['fuel_cons_9'];?></td>
            <td><?php echo $listEquipmentKey['productivity_9'];?></td>
            <td>
                <div class="btn-group">
                    <a href="/add-crop/edit-equipment/<?php echo $listEquipmentKey['id_equipment'];?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="/add-crop/remove-equipment/<?php echo $listEquipmentKey['id_equipment'];?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
            </td>
        </tr>
        <?php }?>

        </tbody>
    </table>
</div>
