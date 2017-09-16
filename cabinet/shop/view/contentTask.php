
<section class="content">
    <div class="box">
        <div class="box-header">

        </div>
        <div class="box-body">
            <form action="/shop/form" method="post">
                <div class="row">
                    <div class="col-lg-2">
                        <label for="data_fact">Дата початку</label>
                        <input class="form-control" type="date" id="data_start" name="data_start" required>
                    </div>
                    <div class="col-lg-2">
                        <label for="crop_id">Дата закінчення</label>
                        <input type="date" name="data_end" class="form-control">
                    </div>
                    <div class="col-lg-3">
                        <label for="stattie_id">Виконавець</label>
                        <select name="worker" class="form-control">
                            <?foreach($date['worker'] as $value){?>
                            <option value="<?=$value['id']?>" selected><?=$value['name']?></option>
                            <?}?>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label for="price_total">Пріоритет</label>
                        <select name="priority" class="form-control">
                           <?foreach($date['priority'] as $value){?>
                            <option value="<?=$value['id']?>"><?=$value['priority']?></option>
                            <?}?>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label for="time_to_do">Час на виконання</label>
                        <input type="text" name="time_to_do" class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <label for="description">Описання задачі</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                    <div class="col-lg-2">
                        <br>
                        <input type="submit" class="btn btn-block btn-success" id="sumbit" value="<?=$language['farmer-small']['60']?>">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>