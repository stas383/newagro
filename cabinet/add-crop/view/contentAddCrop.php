<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 30.03.2017
 * Time: 10:43
 */
?>
<div class="row">
    <div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
        <h3 class="page-header">Нова культура</h3>
        <form action="/add-crop/create-crop" method="post" class="btn-center">
            <div class="form-group">
                <label for="name_crop_ua">Назва культури</label>
                <input name="name_crop_ua" type="text" class="form-control" id="name_crop_ua" placeholder="Введіть назву культури" maxlength="30" required>
            </div>
            <div class="row ">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="yield_min">Мінімальна урожайність</label>
                        <input name="yield_min" type="text" class="form-control" id="yield_min" placeholder="Введіть мінімальну урожайність" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="yield_max">Максимальна урожайність</label>
                        <input name="yield_max" type="text" class="form-control" id="yield_max" placeholder="Введіть максимальну урожайність" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required>
                    </div>
                </div>
                <hr class="col-md-12">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="cleaning_qty">Норма чистки</label>
                        <input name="cleaning_qty" type="text" class="form-control" id="cleaning_qty" placeholder="Введіть норму чистки" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="cleaning_price">Ціна чистки</label>
                        <input name="cleaning_price" type="text" class="form-control" id="cleaning_price" placeholder="Введіть ціну чистки" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="drying_qty">Норма сушки</label>
                        <input name="drying_qty" type="text" class="form-control" id="drying_qty" placeholder="Введіть норму сушки" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="drying_price">Ціна сушки</label>
                        <input name="drying_price" type="text" class="form-control" id="drying_price" placeholder="Введіть ціну сушки" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required>
                    </div>
                </div>
                <hr class="col-md-12">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="storing_price">Ціна зберігання</label>
                        <input name="storing_price" type="text" class="form-control" id="storing_price" placeholder="Введіть ціну зберігання" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="selling_price">Ціна реалізації</label>
                        <input name="selling_price" type="text" class="form-control" id="selling_price" placeholder="Введіть ціна реалізації" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required>
                    </div>
                </div>
                <hr class="col-md-12">
                <label for="material_qty">Адміністративні витрати та витрати на збут, інші операційні та фінансові</label>
                <hr class="col-md-12">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="other_operating_1">Зона полісся %</label>
                        <input name="other_operating_1" type="text" class="form-control" id="other_operating_1" placeholder="полісся" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="other_operating_2">Зона лісостеп %</label>
                        <input name="other_operating_2" type="text" class="form-control" id="other_operating_2" placeholder="лісостеп" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="other_operating_3">Зона степ %</label>
                        <input name="other_operating_3" type="text" class="form-control" id="other_operating_3" placeholder="степ" maxlength="22" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Додати</button>
        </form>
    </div>
</div>
