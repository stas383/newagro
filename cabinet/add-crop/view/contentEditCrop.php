<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 30.03.2017
 * Time: 10:43
 */ //var_dump($date);
?>
<div class="row">
    <div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
        <h3 class="page-header">Редагування культури "<?php echo $date[0]['name_crop_ua'];?>"</h3>
        <form action="/add-crop/edit-save-crop" method="post" class="btn-center">
            <div class="form-group">
                <label for="name_crop_ua">Назва культури</label>
                <input name="name_crop_ua" type="text" class="form-control" id="name_crop_ua" placeholder="Введіть назву культури" maxlength="30" required value="<?php echo $date[0]['name_crop_ua'];?>">
            </div>
            <div class="row ">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="yield_min">Мінімальна урожайність</label>
                        <input name="yield_min" type="text" class="form-control" id="yield_min" placeholder="Введіть мінімальну урожайність" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required value="<?php echo $date[0]['yield_min'];?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="yield_max">Максимальна урожайність</label>
                        <input name="yield_max" type="text" class="form-control" id="yield_max" placeholder="Введіть максимальну урожайність" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required value="<?php echo $date[0]['yield_max'];?>">
                    </div>
                </div>
                <hr class="col-md-12">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="cleaning_qty">Норма чистки</label>
                        <input name="cleaning_qty" type="text" class="form-control" id="cleaning_qty" placeholder="Введіть норму чистки" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required value="<?php echo $date[0]['cleaning_qty'];?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="cleaning_price">Ціна чистки</label>
                        <input name="cleaning_price" type="text" class="form-control" id="cleaning_price" placeholder="Введіть ціну чистки" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required value="<?php echo $date[0]['cleaning_price'];?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="drying_qty">Норма сушки</label>
                        <input name="drying_qty" type="text" class="form-control" id="drying_qty" placeholder="Введіть норму сушки" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required value="<?php echo $date[0]['drying_qty'];?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="drying_price">Ціна сушки</label>
                        <input name="drying_price" type="text" class="form-control" id="drying_price" placeholder="Введіть ціну сушки" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required value="<?php echo $date[0]['drying_price'];?>">
                    </div>
                </div>
                <hr class="col-md-12">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="storing_price">Ціна зберігання</label>
                        <input name="storing_price" type="text" class="form-control" id="storing_price" placeholder="Введіть ціну зберігання" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required value="<?php echo $date[0]['storing_price'];?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="selling_price">Ціна реалізації</label>
                        <input name="selling_price" type="text" class="form-control" id="selling_price" placeholder="Введіть ціна реалізації" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required value="<?php echo $date[0]['selling_price'];?>">
                    </div>
                </div>
                <hr class="col-md-12">
                <label for="material_qty">Адміністративні витрати та витрати на збут, інші операційні та фінансові</label>
                <hr class="col-md-12">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="other_operating_1">Зона полісся %</label>
                        <input name="other_operating_1" type="text" class="form-control" id="other_operating_1" placeholder="полісся" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" value="<?php echo $date[0]['other_operating_1'];?>" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="other_operating_2">Зона лісостеп %</label>
                        <input name="other_operating_2" type="text" class="form-control" id="other_operating_2" placeholder="лісостеп" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" value="<?php echo $date[0]['other_operating_2'];?>" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="other_operating_3">Зона степ %</label>
                        <input name="other_operating_3" type="text" class="form-control" id="other_operating_3" placeholder="степ" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" value="<?php echo $date[0]['other_operating_3'];?>" required>
                    </div>
                </div>
            </div>
            <input name="id" type="hidden" value="<?php echo $date[0]['id_crop'];?>">
            <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>
    </div>
</div>


