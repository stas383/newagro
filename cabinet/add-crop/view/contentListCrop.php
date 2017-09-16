<h2 class="sub-header">Культури</h2>
<div class="table-responsive">
    <table class="table table-striped well">
        <thead class="head-table-center">
            <tr>
                <th rowspan="2">#</th>
                <th rowspan="2">Найменування</th>
                <th colspan="2">Урожайність</th>
                <th colspan="2">Норми</th>
                <th colspan="4">Ціни</th>
                <th></th>
            </tr>
            <tr>

                <th>Мінімальна</th>
                <th>Максимальна</th>
                <th>Чистка</th>
                <th>Сушка</th>
                <th>Чистка</th>
                <th>Сушка</th>
                <th>Зберігання</th>
                <th>Реалізація</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        <?php
        foreach ($date as $listCropKey){?>
        <tr>
            <td><?php echo $listCropKey['id_crop'];?></td>
            <td><?php echo $listCropKey['name_crop_ua'];?></td>
            <td><?php echo $listCropKey['yield_min'];?></td>
            <td><?php echo $listCropKey['yield_max'];?></td>
            <td><?php echo $listCropKey['cleaning_qty'];?></td>
            <td><?php echo $listCropKey['drying_qty'];?></td>
            <td><?php echo $listCropKey['cleaning_price'];?></td>
            <td><?php echo $listCropKey['drying_price'];?></td>
            <td><?php echo $listCropKey['storing_price'];?></td>
            <td><?php echo $listCropKey['selling_price'];?></td>
            <td>
                <div class="btn-group">

                    <a href="/add-crop/edit-crop/<?php echo $listCropKey['id_crop'];?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="/add-crop/remove-crop/<?php echo $listCropKey['id_crop'];?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></a>
                </div>
            </td>
        </tr>
        <?php }?>

        </tbody>
    </table>
</div>