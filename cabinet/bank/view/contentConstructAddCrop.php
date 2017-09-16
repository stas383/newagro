<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Мої технологічні карти</h3>
        </div>
        <div class="box-body">
            <form action="/farmer/create/create-crop" method="post">
                <input type="hidden" name="crop_st" value="<?php echo $date['crop'][0]['id_crop']?>">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="name_crop_ua">Назва культури</label>
                        <input type="text" class="form-control" id="name_crop_ua" placeholder="" name="name_crop_ua" value="<?php echo $date['crop'][0]['name_crop_ua']?>" required>
                    </div>
                    <hr class="col-md-12 ">
                    <div class="col-md-4 form-group">
                        <label for="cleaning_qty">Норма чистки, %</label>
                        <input type="text" class="form-control" id="cleaning_qty" placeholder="" name="cleaning_qty" value="<?php echo $date['crop'][0]['cleaning_qty']?>" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="cleaning_price">Ціна чистки, грн</label>
                        <input type="text" class="form-control" id="cleaning_price" placeholder="" name="cleaning_price" value="<?php echo $date['crop'][0]['cleaning_price'] ?>" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="storing_price">Ціна зберігання, грн(1 т./1 міс.)</label>
                        <input type="text" class="form-control" id="storing_price" placeholder="" name="storing_price" value="<?php echo $date['crop'][0]['storing_price'] ?>" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="drying_qty">Норма сушки, %</label>
                        <input type="text" class="form-control" id="drying_qty" placeholder="" name="drying_qty" value="<?php echo $date['crop'][0]['drying_qty'] ?>" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="drying_price">Ціна сушки, грн</label>
                        <input type="text" class="form-control" id="drying_price" placeholder="" name="drying_price" value="<?php echo $date['crop'][0]['drying_price'] ?>" required>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="other_operating">Адміністративні витрати, %</label>
                        <input type="text" class="form-control" id="other_operating" placeholder="" name="other_operating" value="<?php echo $date['crop'][0]['other_operating_'.$_SESSION["zone"]] ?>" required>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th class="text-center" colspan="12">Реалізація продукції, %(помісячно)</th>
                                </tr>
                                <tr>
                                    <?php for($x=1;$x<=12;$x++){ ?>
                                    <td><input class="form-control classEdit" type="text" name="r<?php echo $x ?>" id="" placeholder="<?php echo $x?>" value="<?php echo $date['revenue']['r'][$x]?>"></td>
                                    <?php }?>
                                </tr>
                                <tr>
                                    <th class="text-center" colspan="12">Ціна реалізації, грн/т (помісячно)</th>
                                </tr>
                                <tr>
                                    <?php for($x=1;$x<=12;$x++){ ?>
                                    <td><input class="form-control classEdit" type="text" name="p<?php echo $x ?>" id="" placeholder="<?php echo $x?>" value="<?php echo $date['revenue']['p'][$x]?>"></td>
                                    <?php }?>
                                </tr>
                                <tr>
                                    <td colspan="11"></td>
                                    <td><button class="btn btn-block btn-success" type="submit">Далі<i class="fa fa-fw fa-chevron-right"></i></button> </td>
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