<style>
    .with-border{
        border-top: 2px solid #c0c0c0;
        margin-top: 20px;
    }
</style>
<div class="box">
    <div class="box-bodyn">
        <div class="non-semantic-protector">
            <h1 class="ribbon">
                <strong class="ribbon-content">Overhead</strong>
            </h1>
        </div>
    </div>
</div>
<br>
<div class="rown">
    <div class="col-lg-8 col-lg-offset-2">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Repair of machines and equipment</a></li>
            <li><a href="#tab_2" data-toggle="tab">Others costs</a></li>
            <li><a href="#tab_3" data-toggle="tab">Operating expenses</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_1" aria-expanded="false" class="collapsed">
                                        <h3 class="text-center">Plan: <b id="p_1"><?=$date['other_costs']['plan']['2']['costs_plan']?></b></h3>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse_1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <form action="/new-farmer/save_other_cost" method="post">
                                    <input type="hidden" name="costs_type" value="2">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>Планові витрати на ремонт</label>
                                            <input class="form-control inphead plan_costs_fix" type="text" name="costs_plan" value="<?=$date['other_costs']['plan']['2']['costs_plan']?>">
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Коментар</label>
                                            <textarea name="costs_comments" id="comments_fix" class="form-control inphead"><?=$date['other_costs']['plan']['2']['costs_comments']?></textarea>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn" value="save plan">
                                </form>
                            </div>

                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_2" aria-expanded="false" class="collapsed">
                                        <h3 class="text-center">Fact: <b id="f_1">20</b></h3>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse_2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <form action="/new-farmer/create_other_fact" method="post">
                                    <input type="hidden" name="cost_fact_type" value="2">
                                    <table class="table">
                                        <tr>
                                            <th>
                                                <label>price</label>
                                                <input class="form-control" type="text" name="cost_fact">
                                            </th>
                                            <th>
                                                <label>date</label>
                                                <input class="form-control" type="date" name="cost_fact_date">
                                            </th>
                                            <th>
                                                <label>note</label>
                                                <textarea class="form-control" type="text" name="cost_fact_note"></textarea>
                                            </th>
                                            <th>
                                                <br>
                                                <input class="btn" type="submit" value="add to fact">
                                            </th>
                                        </tr>
                                        <?if($date['other_costs']['fact']['2']!=false) foreach ($date['other_costs']['fact']['2'] as $fact_other){?>
                                            <tr>
                                                <th class="f_price_1"><?=$fact_other['cost_fact']?></th>
                                                <th><?=$fact_other['cost_fact_date']?></th>
                                                <th><?=$fact_other['cost_fact_note']?></th>
                                                <th></th>
                                            </tr>
                                        <?}?>
                                    </table>
                                </form>
                            </div>
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="" aria-expanded="false" class="collapsed">
                                        <h3 class="text-center">Difference: <b id="d_1">20</b></h3>
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_2">
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel box box-primary">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_1_1" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">Plan: <b id="p_2"><?=$date['other_costs']['plan']['3']['costs_plan']?></b></h3>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_1_1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <form action="/new-farmer/save_other_cost" method="post">
                                        <input type="hidden" name="costs_type" value="3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label>Планові інші витрати</label>
                                                <input class="form-control inphead plan_other_costs" type="text" name="costs_plan" value="<?=$date['other_costs']['plan']['3']['costs_plan']?>">
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Коментар</label>
                                                <textarea name="costs_comments" id="comments" class="form-control inphead"><?=$date['other_costs']['plan']['3']['costs_comments']?></textarea>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn" value="save plan">
                                    </form>
                                </div>
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_1_2" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">Fact: <b id="f_2">20</b></h3>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_1_2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <form action="/new-farmer/create_other_fact" method="post">
                                        <input type="hidden" name="cost_fact_type" value="3">
                                        <table class="table">
                                            <tr>
                                                <th>
                                                    <label>price</label>
                                                    <input class="form-control" type="text" name="cost_fact">
                                                </th>
                                                <th>
                                                    <label>date</label>
                                                    <input class="form-control" type="date" name="cost_fact_date">
                                                </th>
                                                <th>
                                                    <label>note</label>
                                                    <textarea class="form-control" type="text" name="cost_fact_note"></textarea>
                                                </th>
                                                <th>
                                                    <br>
                                                    <input class="btn" type="submit" value="add to fact">
                                                </th>
                                            </tr>
                                            <?if($date['other_costs']['fact']['3']!=false) foreach ($date['other_costs']['fact']['3'] as $fact_other){?>
                                                <tr>
                                                    <th class="f_price_2"><?=$fact_other['cost_fact']?></th>
                                                    <th><?=$fact_other['cost_fact_date']?></th>
                                                    <th><?=$fact_other['cost_fact_note']?></th>
                                                    <th></th>
                                                </tr>
                                            <?}?>
                                        </table>
                                    </form>
                                </div>
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">Difference: <b id="d_2">20</b></h3>
                                        </a>
                                    </h4>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_3">
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel box box-primary">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_2_1" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">Plan: <b id="p_3"><?=$date['other_costs']['plan']['1']['costs_plan']?></b></h3>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_2_1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <form action="/new-farmer/save_other_cost" method="post">
                                        <input type="hidden" name="costs_type" value="1">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label>Operating expenses %</label>
                                                <input class="form-control inphead plan_other_costs" type="text" name="costs_plan" value="<?=$date['other_costs']['plan']['1']['costs_plan']?>">
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Note</label>
                                                <textarea name="costs_comments" id="comments" class="form-control inphead"><?=$date['other_costs']['plan']['1']['costs_comments']?></textarea>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn" value="save plan">
                                    </form>
                                </div>
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_2_2" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">Fact: <b id="f_3">10</b></h3>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_2_2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <form action="/new-farmer/create_other_fact" method="post">
                                        <input type="hidden" name="cost_fact_type" value="1">
                                        <table class="table">
                                            <tr>
                                                <th>
                                                    <label>price</label>
                                                    <input class="form-control" type="text" name="cost_fact">
                                                </th>
                                                <th>
                                                    <label>date</label>
                                                    <input class="form-control" type="date" name="cost_fact_date">
                                                </th>
                                                <th>
                                                    <label>note</label>
                                                    <textarea class="form-control" type="text" name="cost_fact_note"></textarea>
                                                </th>
                                                <th>
                                                    <br>
                                                    <input class="btn" type="submit" value="add to fact">
                                                </th>
                                            </tr>
                                            <?if($date['other_costs']['fact']['1']!=false)foreach ($date['other_costs']['fact']['1'] as $fact_other){?>
                                                <tr>
                                                    <th class="f_price_3"><?=$fact_other['cost_fact']?></th>
                                                    <th><?=$fact_other['cost_fact_date']?></th>
                                                    <th><?=$fact_other['cost_fact_note']?></th>
                                                    <th></th>
                                                </tr>
                                            <?}?>
                                        </table>
                                    </form>
                                </div>
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="" aria-expanded="false" class="collapsed">
                                            <h3 class="text-center">Difference: <b id="d_3">20</b></h3>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        fact_price();
        function fact_price() {
            var f1=0, f2=0, f3=0;

            $('.f_price_1').each(function () {
                f1+=parseFloat($(this).text());
            });
            $('.f_price_2').each(function () {
                f2+=parseFloat($(this).text());
            });
            $('.f_price_3').each(function () {
                f3+=parseFloat($(this).text());
            });
            $('#f_1').text(f1);
            $('#f_2').text(f2);
            $('#f_3').text(f3);
            $('#d_1').text(parseFloat($('#p_1').text())-f1);
            $('#d_2').text(parseFloat($('#p_2').text())-f2);
            $('#d_3').text(parseFloat($('#p_3').text())-f3);
        }
    });
</script>

