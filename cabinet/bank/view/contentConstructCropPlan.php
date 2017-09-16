<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Технологічна карта</h3>
        </div>
        <div class="box-body">
            <br>
            <div class="row">
                <div class="col-lg-3">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <p>Операція: </p>

                        </div>
                        <div class="icon">

                        </div>
                        <a data-toggle="modal" data-target="#operating" href="" class="small-box-footer">
                            обрати <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <p>Матеріали</p>
                        </div>
                        <div class="icon">

                        </div>
                        <a href="#" class="small-box-footer">
                            обрати <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <label for="strat_data">Дата початку</label>
                    <input class="form-control" type="date" id="strat_data">
                </div>
                <div class="col-lg-3">
                    <label for="end_data">Дата закінчення</label>
                    <input class="form-control" type="date" id="end_data">
                </div>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Операція</th>
                    <th>Матеріал</th>
                    <th>Дата початку</th>
                    <th>Дата закінчення</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
<!--модальное окно-->
    <div class="example-modal">
        <div class="modal fade  bs-example-modal-lg" id="operating" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <form method="post" action="/farmer/create/add-crop">
                <div class="modal-dialog" role="document" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Операція</h4>
                        </div>
                        <div class="modal-body">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Cправочник операций</a></li>
                                    <li><a href="#tab_3" data-toggle="tab">Мої операції</a></li>
                                    <li><a href="#tab_2" data-toggle="tab">Нова операція</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                       sss
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane " id="tab_2">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h4 class="text-center">Операція</h4>
                                                <hr>

                                            </div>
                                            <div class="col-lg-12">
                                                <label for="name_action_ua">Назва операції</label>
                                                <input class="form-control" type="text">
                                            </div>
                                            <div class="col-lg-12">
                                                <hr>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="name_action_ua">Кількість водіїв</label>
                                                <input class="form-control" type="text">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="name_action_ua">Кількість робітників</label>
                                                <input class="form-control" type="text">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="name_action_ua">Клас водіїв</label>
                                                <select class="form-control">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="name_action_ua">Клас робітників</label>
                                                <select class="form-control">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="name_action_ua">Бонус водіям (%)</label>
                                                <input class="form-control" type="text">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="name_action_ua">Бонус робітникам (%)</label>
                                                <input class="form-control" type="text">
                                            </div>
                                            <div class="col-lg-12">
                                                <br>
                                                <h4 class="text-center">Техніка</h4>
                                                <hr>

                                            </div>
                                            <div class="col-lg-6">
                                                <label for="name_action_ua">Марка трактора</label>
                                                <input class="form-control" type="text">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="name_action_ua">Марка с/г машини</label>
                                                <input class="form-control" type="text">
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="fuel_type_id">Вид пального</label>
                                                    <select class="form-control" name="fuel_type_id" id="fuel_type_id" required="">
                                                        <option value="1">Дизельне паливо</option>
                                                        <option value="2">Бензин</option>
                                                        <option value="3">Бензин А-92</option>
                                                        <option value="4">Електроенергія</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="name_action_ua">Продуктивність</label>
                                                <input class="form-control" type="text">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="name_action_ua">Витрати пального</label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane " id="tab_3">

                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>







                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">додати</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </form>
        </div>
        <!-- /.modal -->
    </div>
</section>
<script>
    $(document).ready(function () {

    });
</script>