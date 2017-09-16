<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    $(document).ready(function (){
        var gr_json= '<?= json_encode($date) ?>';
        var gr = JSON.parse ( gr_json );
        $("#graf").change(Graphs);
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(Graphs);
        var color=[,"#00a65a", "#f39c12", "#dd4b39"];
        var remains=[
            "",
           "Є тією частиною оборотних активів, яка фінансується за рахунок власних коштів. ",
           "Характеризує здатність підприємства погасити свої короткострокові зобов’язання за допомогою частини активів, які можуть бути найлегше реалізовані.",
           "Він показує скільки гривень ліквідних активів має підприємство, щоб покрити гривню короткострокових зобов'язань.",
           "Показує скільки гривень найбільш ліквідних активів припадає на гривню короткострокових зобов'язань. ",
           "Показує, яку суму операційного прибутку одержує підприємство з кожної гривні проданої продукції",
           "Показує, яка віддача (норма прибутку) на вкладений власний капітал.",
           "Характеризує ефективність використання власного капіталу. Показує, яка віддача (норма прибутку) на вкладений власний капітал."
        ];
        function Graphs() {
            var id=$("#graf").val();
            var title=$("#graf option:selected").text();
            $("#remains").text(remains[id]);
            var data = google.visualization.arrayToDataTable([
                ["Element", title, { role: "style" } ],
                ["2014", gr[id][14], color[gr['color'][id][14]]],
                ["2015", gr[id][15], color[gr['color'][id][15]]],
                ["2016", gr[id][16], color[gr['color'][id][16]]]
            ]);
            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);
            var options = {
                title: title,
                width: 600,
                height: 400,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.BarChart(document.getElementById("chart_div"));
            chart.draw(view, options);
        }
    });
</script>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Оцінка платоспроможності</h3>
            <div class="box-tools">
            <select class="form-control classEdit" id="graf">
                <option value="1" selected="selected">Робочий капітал</option>
                <option value="2">Коефіцієнт покриття (загальний коефіцієнт ліквідності)</option>
                <option value="3">Коефіцієнт швидкої ліквідності</option>
                <option value="4">Коефіцієнт абсолютної ліквідності</option>
                <option value="5">Рентабельність продажів</option>
                <option value="6">Рентабельність власного капіталу</option>
                <option value="7">Рентабельність активів</option>
            </select></div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="form-group col-sm-3"></div>
                <div class="form-group col-sm-6">
                    <h4 id="remains" class="text-center"></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div id="chart_div" style="width: 450px; min-height: 450px; margin: 0 auto;"></div>
                </div>
                <div class="col-sm-3">
                    <br>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td style="background:#00a65a; height: 20px"></td>
                                <td class="text">Хороший стан</td>
                            </tr>
                            <tr>
                                <td  style="background:#f39c12; padding: 8px"></td>
                                <td>Задовільний стан</td>
                            </tr>
                            <tr>
                                <td  style="background:#dd4b39; padding: 8px"></td>
                                <td>Негативний стан</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</section>
