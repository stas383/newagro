<h2 class="sub-header">Матеріали ЗЗР <a class="btn btn-success" href="<?php SRC::getSrc();?>/add-crop/add-material-ppa">Додати матеріал ЗЗР</a></h2>
<div class="table-responsive">
    <table class="table table-striped well">
        <thead class="head-table-center">
        <tr>
            <th>#</th>
            <th>Назва</th>
            <th>Вид</th>
            <th>Виробництво</th>
            <th>Норма внесення</th>
            <th>Од. виміру</th>
            <th>Вартість</th>
            <th></th>
        </tr>
        </thead>
        <tbody  class="body-table-center">
        <pre>
        <?php
        foreach ($date['date_all'] as $listMaterial){?>
            <tr>
                <td><?php echo $listMaterial['id_material'];?></td>
                <td><?php echo $listMaterial['name_material_ua'];?></td>
                <td><?php echo $listMaterial['name_subtype_ua'];?></td>
                <td><?php echo $listMaterial['value'];?></td>
                <td><?php echo $listMaterial['material_qty'];?></td>
                <td><?php echo $date['unit'][$listMaterial['unit']-1]['value'];?></td>
                <td><?php echo $listMaterial['material_price'];?></td>
                <td>
                    <div class="btn-group">
                        <a href="/add-crop/edit-material-ppa/<?php echo $listMaterial['id_material'];?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></a>
                        <a href="/add-crop/remove-material/ppa/<?php echo $listMaterial['id_material'];?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></a>
                    </div>
                </td>
            </tr>
        <?php }?>

        </tbody>
    </table>
</div>