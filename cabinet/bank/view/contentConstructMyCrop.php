<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Мої технологічні карти</h3>
            <div class="box-tools">
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">додати технологічну карту<i class="fa fa-fw fa-plus"></i></button>
            </div>

        </div>
    </div>
    <div class="row">
        <?php for($x=1; $x<=6; $x++){ ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-list-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-number">
                        Пшениця озима
                    </span>
                    <br>
                    <a href="#" class="small-box-footer">відкрити <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
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
                            <select class="form-control" name="crop">
                                <option value="0">Нова культура</option>
                                <?php
                                for($x=1;$x<=2;$x++){
                                    foreach ($date['Crop-'.$x] as $crop){?>
                                        <option value="<?php echo $x.'-'.$crop['id_crop']?>"><?php echo $crop['name_crop_ua'];?></option>
                                    <?php }
                                }
                                ?>
                            </select>
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
