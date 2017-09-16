<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?=$language['farmer']['134']?></h3>
        </div>
        <div class="box-body">
            <form action="/farmer/create/create-crop" method="post">
                <input type="hidden" name="crop_st" value="<?php echo $date['crop'][0]['id_crop'].'-'.$date['crop_type']?>">
                <div class="row">
                    <div class="col-md-8 form-group">
                        <label for="name_crop_ua"><?=$language['farmer']['202']?></label>
                        <input type="text" class="form-control" id="name_crop_ua" placeholder="" name="name_crop_ua" value="<?php echo $date['crop'][0]['name_crop_ua']?>" required>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="area"><?=$language['farmer']['214']?></label>
                        <input type="text" class="form-control" id="area" placeholder="" name="area" required>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="yaled"><?=$language['farmer']['127']?></label>
                        <input type="text" class="form-control" id="yaled" placeholder="" name="yaled" required>
                    </div>
                    <hr class="col-md-12 ">
                    <div class="col-md-4 form-group">
                        <label for="cleaning_qty"><?=$language['farmer']['203']?></label>
                        <input type="text" class="form-control" id="cleaning_qty" placeholder="" name="cleaning_qty" value="<?php echo $date['crop'][0]['cleaning_qty']?>">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="cleaning_price"><?=$language['farmer']['204']?></label>
                        <input type="text" class="form-control" id="cleaning_price" placeholder="" name="cleaning_price" value="<?php echo $date['crop'][0]['cleaning_price'] ?>">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="storing_price"><?=$language['farmer']['205']?></label>
                        <input type="text" class="form-control" id="storing_price" placeholder="" name="storing_price" value="<?php echo $date['crop'][0]['storing_price'] ?>">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="drying_qty"><?=$language['farmer']['206']?></label>
                        <input type="text" class="form-control" id="drying_qty" placeholder="" name="drying_qty" value="<?php echo $date['crop'][0]['drying_qty'] ?>">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="drying_price"><?=$language['farmer']['207']?></label>
                        <input type="text" class="form-control" id="drying_price" placeholder="" name="drying_price" value="<?php echo $date['crop'][0]['drying_price'] ?>">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="other_operating"><?=$language['farmer']['208']?></label>
                        <input type="text" class="form-control" id="other_operating" placeholder="" name="other_operating" value="<?php echo $date['crop'][0]['other_operating_'.$_SESSION["zone"]] ?>">
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th class="text-center" colspan="12"><?=$language['farmer']['209']?></th>
                                </tr>
                                <tr>
                                    <?php for($x=1;$x<=12;$x++){ ?>
                                        <th class="text-center"><?php echo $x?></th>
                                    <?php }?>
                                </tr>
                                <tr>
                                    <?php for($x=1;$x<=12;$x++){ ?>
                                    <td><input class="form-control classEdit" type="text" name="r<?php echo $x ?>" id="" placeholder="<?php echo $x?>" value="<?php echo $date['revenue']['r'][$x]?>"></td>
                                    <?php }?>
                                </tr>
                                <tr>
                                    <th class="text-center" colspan="12"><?=$language['farmer']['210']?></th>
                                </tr>
                                <tr>
                                    <?php for($x=1;$x<=12;$x++){ ?>
                                        <th class="text-center"><?php echo $x?></th>
                                    <?php }?>
                                </tr>
                                <tr>
                                    <?php for($x=1;$x<=12;$x++){ ?>
                                    <td><input class="form-control classEdit" type="text" name="p<?php echo $x ?>" id="" placeholder="<?php echo $x?>" value="<?php echo $date['revenue']['p'][$x]?>"></td>
                                    <?php }?>
                                </tr>
                                <tr>
                                    <td colspan="11"></td>
                                    <td><button class="btn btn-block btn-success" type="submit"><?=$language['farmer']['215']?><i class="fa fa-fw fa-chevron-right"></i></button> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>





<!--модальное окно-->
    <div class="example-modal">
        <div class="modal fade  bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <form method="post" action="/farmer/create/add-crop">
                <div class="modal-dialog" role="document" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Вид діяльності</h4>
                        </div>
                        <div class="modal-body">
                            sss
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">додати</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </form>
        </div>
        <!-- /.modal -->
    </div>
</section>
<script>
    $(document).ready(function () {

    });
</script>