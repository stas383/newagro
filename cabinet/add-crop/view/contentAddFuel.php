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
        <h3 class="page-header">Додати паливо</h3>
        <form action="/add-crop/create-one-fuel" method="post" class="btn-center">
            <div class="form-group">
                <label for="exampleInputEmail1">Назва палива</label>
                <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Введіть назву палива" maxlength="30" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail2">Поточна ціна палива</label>
                <input name="price" type="text" class="form-control" id="exampleInputEmail2" placeholder="Введіть ціну на паливо (приклад 22.76)" pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required>
            </div>
            <button type="submit" class="btn btn-primary">Додати</button>
        </form>
    </div>
</div>
