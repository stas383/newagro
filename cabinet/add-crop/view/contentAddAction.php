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
            <h3 class="page-header">Додати операцію</h3>
            <form action="/add-crop/create-action" method="post" class="btn-center">
                <div class="form-group">
                    <label for="name_action_ua">Назва операції</label>
                    <input name="name_action_ua" type="text" class="form-control" id="name_action_ua" placeholder="Введіть назву операції" maxlength="50" required>
                </div>
                <div class="form-group">
                    <label for="action_type">Тип операції</label>
                    <select class="form-control" name="action_type" id="action_type" required>
                        <?php
                        foreach ($date as $listActionTypeKey){?>
                            <option value="<?php echo $listActionTypeKey['id_action_type'];?>"><?php echo $listActionTypeKey['name_action_type_ua'];?></option>
                        <?php }?>
                    </select>
                </div>
                <hr class="col-sm-12">
                <div class="row ">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="drivers">Кількість водіїв</label>
                            <input name="drivers" type="text" class="form-control" id="drivers" placeholder="Введіть кількість водіїв" maxlength="5" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="driver_class">Клас водіїв</label>
                            <select class="form-control" name="driver_class" id="driver_class" required>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="driver_bonus">Бонус водіям (%)</label>
                            <input name="driver_bonus" type="text" class="form-control" id="driver_bonus" placeholder="Введіть бонус водіям" maxlength="5" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="workers">Кількість робітників</label>
                            <input name="workers" type="text" class="form-control" id="workers" placeholder="Введіть кількість робітників" maxlength="5" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="worker_class">Клас робітників</label>
                            <select class="form-control" name="worker_class" id="worker_class" required>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="worker_bonus">Бонус робітникам (%)</label>
                            <input name="worker_bonus" type="text" class="form-control" id="worker_bonus" placeholder="Введіть бонус робітникам" maxlength="5" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Додати</button>
            </form>
        </div>
    </div>