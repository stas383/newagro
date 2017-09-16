<?php

?>
<div class="row">
    <div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
        <h3 class="page-header">Редагувати операцію "<?php echo $date['action'][0]['name_action_ua'];?>"</h3>
        <form action="/add-crop/edit-save-action" method="post" class="btn-center">
            <div class="form-group">
                <label for="name_action_ua">Назва операції</label>
                <input name="name_action_ua" type="text" class="form-control" id="name_action_ua" placeholder="Введіть назву операції" maxlength="50" required value="<?php echo $date['action'][0]['name_action_ua']; ?> ">
                <input name="id_action" type="hidden" value="<?php echo $date['action'][0]['id_action']; ?> ">
            </div>
            <div class="form-group">
                <label for="action_type">Тип операції</label>
                <select class="form-control" name="action_type" id="action_type" required>
                    <?php
                    foreach ($date['action_type'] as $listActionTypeKey){
                        if($date['action'][0]['action_type'] == $listActionTypeKey['id_action_type']){
                    ?>
                        <option selected value="<?php echo $listActionTypeKey['id_action_type'];?>"><?php echo $listActionTypeKey['name_action_type_ua'];?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $listActionTypeKey['id_action_type'];?>"><?php echo $listActionTypeKey['name_action_type_ua'];?></option>

                    <?php }}?>
                </select>
            </div>
            <hr class="col-sm-12">
            <div class="row ">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="drivers">Кількість водіїв</label>
                        <input name="drivers" type="text" class="form-control" id="drivers" placeholder="Введіть кількість водіїв" maxlength="5" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" value="<?php echo $date['action'][0]['drivers']; ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="driver_class">Клас водіїв</label>
                        <select class="form-control" name="driver_class" id="driver_class" required>
                            <?php for($i=1; $i<=6;$i++){ ?>
                                    <option <?php if($i == $date['action'][0]['driver_class']) echo 'selected'; ?>><?php echo $i;?></option>
                                <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="driver_bonus">Бонус водіям (%)</label>
                        <input name="driver_bonus" type="text" class="form-control" id="driver_bonus" placeholder="Введіть бонус водіям" maxlength="5" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" value="<?php echo $date['action'][0]['driver_bonus']; ?>">
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="workers">Кількість робітників</label>
                        <input name="workers" type="text" class="form-control" id="workers" placeholder="Введіть кількість робітників" maxlength="5" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" value="<?php echo $date['action'][0]['workers']; ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="worker_class">Клас робітників</label>

                        <select class="form-control" name="worker_class" id="worker_class" required>
                            <?php for($i=1; $i<=6;$i++){ ?>
                                <option <?php if($i == $date['action'][0]['worker_class']) echo 'selected'; ?>><?php echo $i;?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="worker_bonus">Бонус робітникам (%)</label>
                        <input name="worker_bonus" type="text" class="form-control" id="worker_bonus" placeholder="Введіть бонус робітникам" maxlength="5" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}"  value="<?php echo $date['action'][0]['worker_bonus']; ?>">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>
    </div>
</div>