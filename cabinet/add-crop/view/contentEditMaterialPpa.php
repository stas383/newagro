<div class="row">
    <div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
        <h3 class="page-header">Редагування матеріалу ЗЗР "<?php echo $date['material_ppa'][0]['name_material_ua'];?>"</h3>
        <form action="/add-crop/edit-save-material-ppa" method="post" class="btn-center">
            <div class="form-group">
                <label for="subtype_id">Вид матеріалу ЗЗР</label>
                <select class="form-control" name="subtype_id" id="subtype_id" required>
                    <?php
                    foreach ($date['material_subtype'] as $listMaterialType){?>
                        <option <?php if($date['material_ppa'][0]['subtype_id'] == $listMaterialType['id_subtype']) echo 'selected';?> value="<?php echo $listMaterialType['id_subtype'];?>"><?php echo $listMaterialType['name_subtype_ua'];?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label for="name_material_ua">Назва засобу захисту рослин</label>
                <input type="hidden" name="id" value="<?php echo $date['material_ppa'][0]['id_material'];?>">
                <input name="name_material_ua" type="text" class="form-control" id="name_material_ua" placeholder="Введіть назву ЗЗР" maxlength="50" required value="<?php echo $date['material_ppa'][0]['name_material_ua'];?>">
            </div>

            <hr class="col-sm-12">

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="unit">Одиниці виміру</label>
                        <select class="form-control" name="unit" id="unit" required>
                            <option <?php if($date['material_ppa'][0]['unit'] == 5) echo 'selected';?> value="5">кг(л)/га</option>
                            <option <?php if($date['material_ppa'][0]['unit'] == 6) echo 'selected';?> value="6">кг(л)/т</option>
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
                            <option <?php if($date['material_ppa'][0]['yield_level'] == 1) echo 'selected';?>  value="1">Оригінал</option>
                            <option <?php if($date['material_ppa'][0]['yield_level'] == 2) echo 'selected';?>  value="2">Генерик</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="material_qty">Норма внесення</label>
                        <input name="material_qty" type="text" class="form-control" id="material_qty" placeholder="Введіть норму" maxlength="6" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required value="<?php echo $date['material_ppa'][0]['material_qty'];?>">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="material_price">Вартість</label>
                        <input name="material_price" type="text" class="form-control" id="material_price" placeholder="Введіть вартість" maxlength="6" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required value="<?php echo $date['material_ppa'][0]['material_price'];?>">
                    </div>
                </div>


            </div>
            <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>
    </div>
</div>