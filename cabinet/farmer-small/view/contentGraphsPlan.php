
<?
    /*echo '<pre>';
    var_dump($date['graphs_8']);
    die;*/
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- <script>
    $(document).ready(function (){

        

        
        //var graphs_1 = JSON.parse (graphs_1_json);


        
    });
</script> -->
<script type="text/javascript">
     $(document).ready(function (){
        var graphs_1=[
            ['',''],
            <? foreach ($date['graphs_1'] as $value) {
            echo "['$value[0]', ".$value[1]."],";
        }?>
        ];
        var graphs_2= [
            ['',''],
            ['Насіння',<?if($date['graphs_2'][0][0]==null) echo 0; else echo $date['graphs_2'][0][0];?>],
            ['ЗЗР',<?if($date['graphs_2'][0][1]==null) echo 0; else echo $date['graphs_2'][0][1];?>],
            ['ПММ', <?if($date['graphs_2'][0][2]==null) echo 0; else echo $date['graphs_2'][0][2];?>],
            ['Витрати на зарплату', <?if($date['graphs_2'][0][3]==null) echo 0; else echo $date['graphs_2'][0][3];?>],
            ['Мінеральні добрива', <?if($date['graphs_2'][0][4]==null) echo 0; else echo $date['graphs_2'][0][4];?>],
            ['Послуги', <?if($date['graphs_2'][0][5]==null) echo 0; else echo $date['graphs_2'][0][5];?>],
        ];
        var graphs_2_1=[
            ['',''],
            ['Насіння',<?if($date['graphs_2'][1][0]==null) echo 0; else echo $date['graphs_2'][1][0];?>],
            ['ЗЗР',<?if($date['graphs_2'][1][1]==null) echo 0; else echo $date['graphs_2'][1][1];?>],
            ['ПММ', <?if($date['graphs_2'][1][2]==null) echo 0; else echo $date['graphs_2'][1][2];?>],
            ['Витрати на зарплату', <?if($date['graphs_2'][1][3]==null) echo 0; else echo $date['graphs_2'][1][3];?>],
            ['Мінеральні добрива', <?if($date['graphs_2'][1][4]==null) echo 0; else echo $date['graphs_2'][1][4];?>],
            ['Послуги', <?if($date['graphs_2'][1][5]==null) echo 0; else echo $date['graphs_2'][1][5];?>],

        ];

        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChartRevenue);
        google.charts.setOnLoadCallback(drawChartProduction_costs);
        google.charts.setOnLoadCallback(drawChartProfitability);
        google.charts.setOnLoadCallback(drawChartGross_profit);
        google.charts.setOnLoadCallback(drawChartMarginal_profit);
        
        function drawChart() {
            var data = google.visualization.arrayToDataTable(graphs_1);
            var options = {
                title: 'Структура посівних площ',
                is3D: true,
                height:400,
                weight:400,
            };
            var chart = new google.visualization.PieChart(document.getElementById('g1'));
            chart.draw(data, options);
        }

        function drawChartRevenue() {
             var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: 'style' } ],
                    <?     foreach ($date['graphs_3'] as $value) {
                    echo "['$value[0]', ".$value[1].", 'green'],";
                    }
                    ?>
                ]);

                var view = new google.visualization.DataView(data);
                view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

                var options = {
                    title: "Дохід від реалізації грн/га",
                    width: 900,
                    height: 400,
                    bar: {groupWidth: "95%"},
                    legend: { position: "none" },
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("g3"));
                chart.draw(view, options)
        }

        function drawChartGross_profit() {
             var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: 'style' } ],
                    <?     foreach ($date['graphs_5'] as $value) {
                    echo "['$value[0]', ".$value[1].", 'purple'],";
                    }
                    ?>
                ]);

                var view = new google.visualization.DataView(data);
                view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

                var options = {
                    title: "Валовий прибуток, грн/га",
                    is3D: true,
                    width: 900,
                    height: 400,
                    bar: {groupWidth: "95%"},
                    legend: { position: "none" },
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("g5"));
                chart.draw(view, options)
        }

        function drawChartProduction_costs() {
             var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: 'style' } ],
                    <?     foreach ($date['graphs_4'] as $value) {
                    echo "['$value[0]', ".$value[1].", 'red'],";
                    }
                    ?>
                ]);

                var view = new google.visualization.DataView(data);
                view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

                var options = {
                    title: "Виробничі витрати, грн/га",
                    height: 500,
                    bar: {groupWidth: "95%"},
                    legend: { position: "none" },
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("g4_1"));
                chart.draw(view, options)
        }

        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChartProduction_costs1);
         function drawChartProduction_costs1() {
             var data = google.visualization.arrayToDataTable([
                    ["Культура", "План", "Факт" ],
                    <?     foreach ($date['graphs_8'] as $value) {
                        if($value[2] == null) { $value[2] = 0;}
                    echo "['$value[0]', ".$value[1].", ".$value[2]."],";
                    }
                    ?>
                ]);

                var options = {
          chart: {
            title: 'Виробничі витрати (План-Факт)',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('g4_2'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
        }

        function drawChartProfitability() {
             var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: 'style' } ],
                    <?     foreach ($date['graphs_6'] as $value) {
                    echo "['$value[0]', ".$value[1].", 'blue'],";
                    }
                    ?>
                ]);

                var view = new google.visualization.DataView(data);
                view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

                var options = {
                    title: "Рентабельність виробництва, %",
                    width: 900,
                    height: 400,
                    bar: {groupWidth: "95%"},
                    legend: { position: "none" },
                };
                var chart = new google.visualization.BarChart(document.getElementById("g6"));
                chart.draw(view, options)
        }
        function drawChartMarginal_profit() {
             var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: 'style' } ],
                    <?     foreach ($date['graphs_7'] as $value) {
                    echo "['$value[0]', ".$value[1].", 'yellow'],";
                    }
                    ?>
                ]);

                var view = new google.visualization.DataView(data);
                view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

                var options = {
                    title: "Рентабельність виробництва, %",
                    width: 900,
                    height: 400,
                    bar: {groupWidth: "95%"},
                    legend: { position: "none" },
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("g7"));
                chart.draw(view, options)
        }

        $('#val').change(function(){
            var value = $(this).val()
            if (value == 1) {
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable(graphs_2);
                    var options = {
                    title: 'Структура виробничих витрат, %',
                    is3D: true,
                    height:400,
                    weight:400,
            };
                var chart = new google.visualization.PieChart(document.getElementById('g2'));
                chart.draw(data, options);
                }
            }else if(value == 2){
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable(graphs_2_1);
                    var options = {
                        title: 'Структура виробничих витрат, %',
                        is3D: true,
                        height:400,
                        weight:400,
                    };  
                var chart = new google.visualization.PieChart(document.getElementById('g2'));
                chart.draw(data, options);
                        }
                    }
        });
 });
</script>
<section class="content">
    <div class="box">
        <div class="box-header">

        </div>
        <div class="box-body" >
            <div class="graphs" id="g1"></div>
            <!-- <select class="form-control" id="val">
                <option value="1" selected>asdf</option>
                <option value="2">sdafd</option>
            </select>
            <div class="graphs" id="g2"></div> -->
            <div class="graphs" id="g3"></div>
            <div class="row">
            <div class="col-lg-6">
                <div id="g4_1"></div>
            </div>
            <div class="col-lg-6">
                <div class="col-md-6" id="g4_2" style="width:100%; height: 500px;"></div>
             </div>
            </div>
            <div class="graphs" id="g5"></div>
            <div class="graphs" id="g6"></div>
            <div class="graphs" id="g7"></div>
        </div>
    </div>
</section>