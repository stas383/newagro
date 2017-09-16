<section class="content">
    <form class="form-horizontal" action="/distributor/save-profile" method="post" enctype="multipart/form-data">
        <div class="row">
            <!-- left column -->
            <div class="col-md-9">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ваш профіль</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <?php foreach ($date as $key){?>
                        <div class="form-group">
                            <label for="company_name" class="col-sm-4 control-label">Назва компанії</label>

                            <div class="col-sm-6">
                                <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Назва" value="<?php echo $date[0]['company_name'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="distributor_type" class="col-sm-4 control-label">Виробник або дистриб'ютор</label>

                            <div class="col-sm-6">
                                <select class="form-control select2" id="distributor_type" name="distributor_type" style="width: 100%;">
                                    <option <?php if($key['distributor_type'] == '9') echo 'selected';?> value="9">Виробник</option>
                                    <option <?php if($key['distributor_type'] == '10') echo 'selected';?> value="10">Дистриб'ютор</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-sm-4 control-label">Адреса головного офісу в Україні</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="address" id="address" placeholder="Адреса" value="<?php echo $date[0]['address'];?>">
                            </div>
                        </div>
                            <div class="form-group">
                                <label for="icon" class="col-sm-4 control-label">Выберите файл для загрузки:</label>
                                <div class="col-sm-6">
                                    <input type="file" name="userfile">
                                </div>
                            </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">Ім'я</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Ім'я" value="<?php echo $date[0]['name'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="last_name" class="col-sm-4 control-label">Прізвище</label>
                            <div class="col-sm-6">
                                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Прізвище" value="<?php echo $date[0]['last_name'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="position" class="col-sm-4 control-label">Посада</label>
                            <div class="col-sm-6">
                                <input type="text" name="position" class="form-control" id="position" placeholder="Посада" value="<?php echo $date[0]['position'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-4 control-label">Контактний телефон</label>
                            <div class="col-sm-6">
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Телефон" value="<?php echo $date[0]['phone'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-6">
                                <button type="submit" class="btn btn-success">Зберегти</button>
                            </div>
                        </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>





