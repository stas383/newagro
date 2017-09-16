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
        <h3 class="page-header">Додати добрива</h3>
        <form action="/add-crop/create-material-fertilizers" method="post" class="btn-center">

            <div class="row ">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label for="crop_id">Оберіть культуру</label>
                        <select class="form-control" name="crop_id" id="crop_id" required>
                            <?php
                            foreach ($date as $listMaterialCrop){?>
                                <option value="<?php echo $listMaterialCrop['id_crop'];?>"><?php echo $listMaterialCrop['name_crop_ua'];?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="form-group">
                        <label for="name_material_ua">Назва добрива</label>
                        <input name="name_material_ua" type="text" class="form-control" id="name_material_ua" placeholder="Введіть назву добрива" maxlength="50" required>
                    </div>
                </div>
            </div>

            <hr class="col-sm-12">

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="material_price">Вартість</label>
                        <input name="material_price" type="text" class="form-control" id="material_price" placeholder="Введіть вартість за 1 кг" maxlength="50" required>
                    </div>
                </div>
            </div>

            <hr class="col-sm-12">
            <label for="material_qty">Введіть норми для 1 рівня врожайності в різних зонах</label>
            <hr class="col-sm-12">
            <div class="row ">
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="material_qty_z11">Зона полісся</label>
                            <input name="material_qty_z11" type="text" class="form-control" id="material_qty_z11" placeholder="Введіть норму кг/га" maxlength="6" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" >
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="material_qty_z12">Зона лісостеп</label>
                        <input name="material_qty_z12" type="text" class="form-control" id="material_qty_z12" placeholder="Введіть норму кг/га" maxlength="6" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" >
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="material_qty_z13">Зона степ</label>
                        <input name="material_qty_z13" type="text" class="form-control" id="material_qty_z13" placeholder="Введіть норму кг/га" maxlength="6" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" >
                    </div>
                </div>
            </div>

            <hr class="col-sm-12">
            <label for="material_qty">Введіть норми для 2 рівня врожайності в різних зонах</label>
            <hr class="col-sm-12">
            <div class="row ">
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="material_qty_z21">Зона полісся</label>
                            <input name="material_qty_z21" type="text" class="form-control" id="material_qty_z21" placeholder="Введіть норму кг/га" maxlength="6" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" >
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="material_qty_z22">Зона лісостеп</label>
                        <input name="material_qty_z22" type="text" class="form-control" id="material_qty_z22" placeholder="Введіть норму кг/га" maxlength="6" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" >
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="material_qty_z23">Зона степ</label>
                        <input name="material_qty_z23" type="text" class="form-control" id="material_qty_z23" placeholder="Введіть норму кг/га" maxlength="6" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" >
                    </div>
                </div>
            </div>

            <hr class="col-sm-12">
            <label for="material_qty">Введіть норми для 3 рівня врожайності в різних зонах</label>
            <hr class="col-sm-12">
            <div class="row ">
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="material_qty_z31">Зона полісся</label>
                            <input name="material_qty_z31" type="text" class="form-control" id="material_qty_z31" placeholder="Введіть норму кг/га" maxlength="6" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" >
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="material_qty_z32">Зона лісостеп</label>
                        <input name="material_qty_z32" type="text" class="form-control" id="material_qty_z32" placeholder="Введіть норму кг/га" maxlength="6" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" >
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="material_qty_z33">Зона степ</label>
                        <input name="material_qty_z33" type="text" class="form-control" id="material_qty_z33" placeholder="Введіть норму кг/га" maxlength="6" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" >
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Додати</button>
        </form>
    </div>
</div>