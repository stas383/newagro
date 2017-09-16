<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"></h3>
        </div>
        <div class="box-body">
            <form method="post" id="new_actions" action="javascript:void(null);">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="text-center">Редагувати операцію "<?php echo $date['action'][0]['name_action'];?>"</h4>
                        <hr>
                    </div>
                    <div class="col-lg-12">
                        <label for="name_action">Назва операції</label>
                        <input class="form-control" type="text" id="name_action" name="name_action" value="<?php echo $date['action'][0]['name_action'];?>" required>
                    </div>
                    <div class="col-lg-12">
                        <hr>
                    </div>
                    <div class="col-lg-6">
                        <label for="drivers">Кількість водіїв</label>
                        <input class="form-control" type="text" id="drivers" name="drivers" value="<?php echo $date['action'][0]['drivers'];?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="workers">Кількість робітників</label>
                        <input class="form-control" type="text" id="workers" name="workers" value="<?php echo $date['action'][0]['workers'];?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="driver_class">Клас водіїв</label>
                        <select class="form-control" id="driver_class" name="driver_class">
                            <?php for($x=0;$x<=6;$x++){  ?>
                                <option <?php if($date['action'][0]['driver_class']==$x) echo 'selected'?>><?=$x ?></option>
                            <?} ?>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="worker_class">Клас робітників</label>
                        <select class="form-control" id="worker_class" name="worker_class">
                            <?php for($x=0;$x<=6;$x++){  ?>
                                <option <?php if($date['action'][0]['worker_class']==$x) echo 'selected'?>><?=$x ?></option>
                            <?} ?>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="driver_bonus">Бонус водіям (%)</label>
                        <input class="form-control" type="text" id="driver_bonus" name="driver_bonus" value="<?php echo $date['action'][0]['dtiver_bonus'];?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="worker_bonus">Бонус робітникам (%)</label>
                        <input class="form-control" type="text" id="worker_bonus" name="worker_bonus" value="<?php echo $date['action'][0]['worker_bonus'];?>">
                    </div>
                    <div class="col-lg-12">
                        <br>
                        <h4 class="text-center">Техніка</h4>
                        <hr>

                    </div>
                    <div class="col-lg-6">
                        <label for="name_working">Марка трактора</label>
                        <input class="form-control" type="text" id="name_working" name="name_working" value="<?php echo $date['action'][0]['name_power'];?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="name_power">Марка с/г машини</label>
                        <input class="form-control" type="text" id="name_power" name="name_power" value="<?php echo $date['action'][0]['name_working'];?>">
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="fuel_type">Вид пального</label>
                            <select class="form-control" name="fuel_type" id="fuel_type">
                                <?php
                                $fuel=array(
                                    1=>'Дизельне паливо',
                                    2=>'Бензин',
                                    3=>'Бензин А-92',
                                    4=>'Електроенергія'
                                );
                                foreach ($fuel as $key=>$value){  ?>
                                    <option <?php if($date['action'][0]['fuel_type']==$key) echo 'selected'?>><?=$value ?></option>
                                <?} ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="productivity">Продуктивність, га, т</label>
                        <input class="form-control" type="text" id="productivity" name="productivity" value="<?php echo $date['action'][0]['productivity'];?>">
                    </div>
                    <div class="col-lg-6">
                        <label for="fuel_cons">Витрати пального л/га</label>
                        <input class="form-control" type="text" id="fuel_cons" name="fuel_cons" value="<?php echo $date['action'][0]['fuel_cons'];?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit"  class="btn btn-primary" id="sumbit" value="Додати">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
                </div>
            </form>
        </div>
    </div>
</section>