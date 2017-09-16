<div class="row">
    <div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
        <h3 class="page-header">Редагувати насіння "<?php echo $date['material_seeds'][0]['name_material_ua'];?>"</h3>
        <form action="/add-crop/edit-save-material-seeds" method="post" class="btn-center">

            <div class="row ">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="crop_id">Оберіть культуру</label>
                        <select class="form-control" name="crop_id" id="crop_id" required>
                            <?php
                            foreach ($date['crop_head'] as $listMaterialCrop){?>
                                <option <?php if($date['material_seeds'][0]['crop_id'] == $listMaterialCrop['id_crop']) echo 'selected';?> value="<?php echo $listMaterialCrop['id_crop'];?>"><?php echo $listMaterialCrop['name_crop_ua'];?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="form-group">
                        <label for="name_material_ua">Назва насіння</label>
                        <input type="hidden" name="id" value="<?php echo $date['material_seeds'][0]['id_material'];?>">
                        <input name="name_material_ua" type="text" class="form-control" id="name_material_ua" placeholder="Введіть назву насіння" maxlength="50" required value="<?php echo $date['material_seeds'][0]['name_material_ua'];?>">
                    </div>
                </div>
            </div>
            <hr class="col-sm-12">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="selection">Селекція</label>
                        <select class="form-control" name="selection" id="selection">
                            <option value="1" <?php if($date['material_seeds'][0]['selection'] == 1) echo 'selected'; ?>>Вітчизняна</option>
                            <option value="2" <?php if($date['material_seeds'][0]['selection'] == 2) echo 'selected'; ?>>Іноземне</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr class="col-sm-12">

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="unit">Одиниці виміру</label>
                        <select class="form-control" name="unit" id="unit" required>
                            <option <?php if($date['material_seeds'][0]['unit'] == 3) echo 'selected'; ?> value="3">кг</option>
                            <option <?php if($date['material_seeds'][0]['unit'] == 4) echo 'selected'; ?> value="4">п.од</option>
                            <option <?php if($date['material_seeds'][0]['unit'] == 7) echo 'selected'; ?> value="7">тис.шт</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="material_price">Вартість</label>
                        <input name="material_price" type="text" class="form-control" id="material_price" placeholder="Введіть варість" maxlength="50" required value="<?php echo $date['material_seeds'][0]['material_price'];?>">
                    </div>
                </div>
            </div>

            <hr class="col-sm-12">
            <label for="material_qty">Введіть норми для різних зон</label>
            <hr class="col-sm-12">
            <div class="row ">
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="material_qty_z1">Зона полісся</label>
                            <input name="material_qty_z1" type="text" class="form-control" id="material_qty_z1" placeholder="Введіть норму" maxlength="6" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required value="<?php echo $date['material_seeds'][0]['material_qty_z1'];?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="material_qty_z2">Зона лісостеп</label>
                        <input name="material_qty_z2" type="text" class="form-control" id="material_qty_z2" placeholder="Введіть норму" maxlength="6" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required value="<?php echo $date['material_seeds'][0]['material_qty_z2'];?>">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="material_qty_z3">Зона степ</label>
                        <input name="material_qty_z3" type="text" class="form-control" id="material_qty_z3" placeholder="Введіть норму" maxlength="6" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required value="<?php echo $date['material_seeds'][0]['material_qty_z3'];?>">
                    </div>
                </div>


            </div>
            <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>
    </div>
</div>