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
            <h3 class="page-header">Додати тип операцій</h3>
            <form action="/add-crop/crate-action-type" method="post" class="btn-center">
                <div class="form-group">
                    <label for="exampleInputEmail1">Назва типу операції</label>
                    <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Введіть назву операції" maxlength="50" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail2">Одиниці виміру</label>
                    <input name="unit" type="text" class="form-control" id="exampleInputEmail2" placeholder="Введіть одиницю виміру операції" required>
                </div>
                <button type="submit" class="btn btn-primary">Додати</button>
            </form>
        </div>
    </div>