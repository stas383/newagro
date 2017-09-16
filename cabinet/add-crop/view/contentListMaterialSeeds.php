<h2 class="sub-header">Насіння <a class="btn btn-success" href="<?php SRC::getSrc();?>/add-crop/add-material-seeds">Додати насіння</a></h2>
<div class="table-responsive">
    <table class="table table-striped well">
        <thead class="head-table-center">
        <tr>
            <th>#</th>
            <th>Культура</th>
            <th>Назва</th>
            <th>Селекція</th>
            <th>Одиниці вим.</th>
            <th>Вартість</th>
            <th>Полісся</th>
            <th>Лісостеп</th>
            <th>Степ</th>
            <th></th>
        </tr>
        </thead>
        <tbody  class="body-table-center">
        <?php
        foreach ($date as $listMaterial){?>
            <tr>
                <td><?php echo $listMaterial['id_material'];?></td>
                <td><?php echo $listMaterial['name_crop_ua'];?></td>
                <td><?php echo $listMaterial['name_material_ua'];?></td>
                <td>
                    <?php if($listMaterial['selection'] == '1') { ?>Вітчизняна<?php }?>
                    <?php if($listMaterial['selection'] == '2') { ?>Іноземне<?php }?>

                </td>
                <td><?php echo $listMaterial['value'];?></td>

                <td><?php echo $listMaterial['material_price'];?></td>

                <td><?php echo $listMaterial['material_qty_z1'];?></td>
                <td><?php echo $listMaterial['material_qty_z2'];?></td>
                <td><?php echo $listMaterial['material_qty_z3'];?></td>
                <td>
                    <div class="btn-group">
                        <a href="/add-crop/edit-material-seeds/<?php echo $listMaterial['id_material']; ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></a>
                        <a href="/add-crop/remove-material/seeds/<?php echo $listMaterial['id_material']; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></a>
                    </div>
                </td>
            </tr>
        <?php }?>

        </tbody>
    </table>
</div>