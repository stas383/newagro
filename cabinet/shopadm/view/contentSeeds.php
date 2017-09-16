<section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Перелік доданого насіння</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">

                        <table class="table table-condensed">

                            <tr>
                                <th>Культура</th>
                                <th>Виробник</th>
                                <th>Назва</th>
                                <th>Норма внесення, кг/га</th>
                                <th>Ціна з ПДВ грн/кг</th>
                                <th>Ціна з урахуванням товарного кредиту, грн/кг</th>
                                <th class="text-right">Дія</th>
                            </tr>
                            <?php foreach ($date as $key) { ?>
                            <tr>
                                <td><?php echo $key['name_crop_ua'];?></td>
                                <td><?php echo $key['fabricator'];?></td>
                                <td><?php echo $key['material_name'];?></td>
                                <td><?php echo $key['material_qty'];?></td>
                                <td><?php echo $key['material_price'];?></td>
                                <td><?php echo $key['price_two'];?></td>
                                <td class="text-right">
                                    <a href="/distributor/edit-seeds/<?php echo $key['id_material']; ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></a>
                                    <a href="/distributor/remove-material/seeds/<?php echo $key['id_material']; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></a>
                                </td>
                            </tr>
                            <?php }?>
                        </table>

                    </div>
                </div>
            </div>
        </div>
</section>





