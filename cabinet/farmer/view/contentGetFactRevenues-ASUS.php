<style>
    .row {
        margin-left: 0px;
        margin-right: -15px;
    }
</style>
<section>


        <div class="box-body">
            <section class="content">

                <div class="box" id="table_wrapper">

                    <table class="table">

                    <form action="/farmer/save-revenues-fact" method="post">
                    <div class="row">
                        <h3 class="box-title">Додавання фактичних данних по надходженнях</h3> <br>

                        <div class="col-lg-1">
                            <label for="data_fact">Дата</label>
                        </div>
                        <div class="col-lg-1">
                            <label for="crop_id">Культура</label>
                        </div>
                        <div class="col-lg-1">
                            <label for="gross_weight">Вироблено продукції, т</label>
                        </div>
                        <div class="col-lg-1">
                            <label for="weight_cleaning">Продукція після очистки, т</label>
                        </div>
                        <div class="col-lg-1">
                            <label for="weight_drying">Продукція після сушки, т</label>
                        </div>
                        <div class="col-lg-1">
                            <label for="mass">Продукція на реалізацію, т</label>
                        </div>
                        <div class="col-lg-1">
                            <label for="price">Ціна реалізації, грн/т</label>
                        </div>
                        <div class="col-lg-1">
                            <label for="revenue">Виручка від реалізації продукції, грн</label>
                        </div>
                       </div>
                        <div class="row">
                        <div class="col-lg-1">
                            <input class="form-control" type="date" id="data_fact_revenues" name="data_fact_revenues" required>
                        </div>
                        <div class="col-lg-1">
                            <select name="crop_id" id="crop_id" class="form-control" required="">
                                <option value="2">Морква
                                </option>
                            </select>
                        </div>
                        <div class="col-lg-1">
                            <input class="form-control" id="gross_weight" name="gross_weight" required>
                        </div>
                        <div class="col-lg-1">
                            <input class="form-control" id="weight_cleaning" name="weight_cleaning" required>
                        </div>
                        <div class="col-lg-1">
                        <input class="form-control" id="weight_drying" name="weight_drying" required>
                    </div>
                     <div class="col-lg-1">

                        <input class="form-control" id="mass" name="mass" required>
                    </div>
                     <div class="col-lg-1">

                        <input class="form-control" id="price" name="price" required>
                    </div>
                     <div class="col-lg-1">

                        <input class="form-control" id="revenue" name="revenue" required>
                    </div>



                        <div class="col-lg-1">
                            <br>
                            <input type="submit" class="btn btn-block btn-success" id="addFact" value="<?=$language['farmer']['15']?>">
                        </div>

                    </form>
                    </table>
                    </div>

                    <br>

                </div>

            </section>


        </div>
    </div>
</section>