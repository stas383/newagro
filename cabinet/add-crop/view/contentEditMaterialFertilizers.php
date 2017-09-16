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
        <h3 class="page-header">Редагування добрива "<?php echo $date['material_fertilizers'][0]['name_material_ua'];?>"</h3>
        <form action="/add-crop/edit-save-material-fertilizers" method="post" class="btn-center">

            <div class="row ">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="crop_id">Оберіть культуру</label>
                        <select class="form-control" name="crop_id" id="crop_id" required>
                            <?php
                            foreach ($date['crop_head'] as $listMaterialCrop){?>
                                <option <?php if($date['material_fertilizers'][0]['crop_id'] == $listMaterialCrop['id_crop']) echo 'selected';?> value="<?php echo $listMaterialCrop['id_crop'];?>"><?php echo $listMaterialCrop['name_crop_ua'];?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="form-group">
                        <label for="name_material_ua">Назва добрива</label>
                        <input type="hidden" name="last_crop" value="<?php echo $date['material_fertilizers'][0]['crop_id'];?>">
                        <input type="hidden" name="id" value="<?php echo $date['material_fertilizers'][0]['id_material'];?>">
                        <input type="hidden" name="last_name_material_ua" value="<?php echo $date['material_fertilizers'][0]['name_material_ua'];?>">
                        <input name="name_material_ua" type="text" class="form-control" id="name_material_ua" placeholder="Введіть назву добрива" maxlength="50" required value="<?php echo $date['material_fertilizers'][0]['name_material_ua'];?>">
                    </div>
                </div>
            </div>
            <hr class="col-sm-12">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="material_price">Вартість</label>
                        <input name="material_price" type="text" class="form-control" id="material_price" placeholder="Введіть вартість за 1 кг" maxlength="50" required value="<?php echo $date['material_fertilizers'][0]['material_price'];?>">
                    </div>
                </div>
            </div>
            <hr class="col-sm-12">
            <label for="material_qty">Введіть норми для <span style="color: red;"><?php echo $date['material_fertilizers'][0]['yield_level'];?></span> рівня врожайності в різних зонах</label>
            <hr class="col-sm-12">
            <div class="row ">
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="material_qty_z1">Зона полісся</label>
                            <input name="material_qty_z1" type="text" class="form-control" id="material_qty_z1" placeholder="Введіть норму кг/га" maxlength="6" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" value="<?php echo $date['material_fertilizers'][0]['material_qty_z1'];?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="material_qty_z2">Зона лісостеп</label>
                        <input name="material_qty_z2" type="text" class="form-control" id="material_qty_z2" placeholder="Введіть норму кг/га" maxlength="6" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" value="<?php echo $date['material_fertilizers'][0]['material_qty_z2'];?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="material_qty_z3">Зона степ</label>
                        <input name="material_qty_z3" type="text" class="form-control" id="material_qty_z3" placeholder="Введіть норму кг/га" maxlength="6" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" value="<?php echo $date['material_fertilizers'][0]['material_qty_z3'];?>">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>
    </div>
</div>