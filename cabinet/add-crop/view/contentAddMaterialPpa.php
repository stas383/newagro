<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 29.03.2017
 * Time: 12:05
 */
?>
<div class="row">
    <div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
        <h3 class="page-header">Додати матеріл ЗЗР</h3>
        <form action="/add-crop/create-material-ppa" method="post" class="btn-center">
            <div class="form-group">
                <label for="subtype_id">Вид матеріалу ЗЗР</label>
                <select class="form-control" name="subtype_id" id="subtype_id" required>
                    <?php
                    foreach ($date as $listMaterialType){?>
                        <option value="<?php echo $listMaterialType['id_subtype'];?>"><?php echo $listMaterialType['name_subtype_ua'];?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label for="name_material_ua">Назва засобу захисту рослин</label>
                <input name="name_material_ua" type="text" class="form-control" id="name_material_ua" placeholder="Введіть назву ЗЗР" maxlength="50" required>
            </div>

            <hr class="col-sm-12">

            <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="unit">Одиниці виміру</label>
                    <select class="form-control" name="unit" id="unit" required>
                        <option value="5">кг(л)/га</option>
                        <option value="6">кг(л)/т</option>
                    </select>
                </div>
            </div>
            </div>
            <hr class="col-sm-12">

            <div class="row ">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="yield_level">Виробництво</label>
                        <select class="form-control" name="yield_level" id="yield_level" required>
                            <option value="1">Оригінал</option>
                            <option value="2">Генерик</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="material_qty">Норма внесення</label>
                        <input name="material_qty" type="text" class="form-control" id="material_qty" placeholder="Введіть норму" maxlength="6" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,3}" required>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="material_price">Вартість</label>
                        <input name="material_price" type="text" class="form-control" id="material_price" placeholder="Введіть вартість" maxlength="6" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required>
                    </div>
                </div>


            </div>
            <button type="submit" class="btn btn-primary">Додати</button>
        </form>
    </div>
</div>