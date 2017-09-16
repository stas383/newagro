<?
/*echo "<pre>";
var_dump($date);die;*/

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        $(document).ready(function (){
        var graphs_1=[
            ['',''],
            <? foreach ($date['graphs_1'] as $value) {
            echo "['$value[0]', ".$value[1]."],";
        }?>
        ];

       var graphs_2=[
            ['',''],
            <? foreach ($date['graphs_2_budget_equipment'] as $value) {
           if($value[1]==null){
               echo "['$value[0]', 0],";
           }
           else {
               echo "['$value[0]', " . $value[1] . "],";
           }
        }?>
        ];
        var graphs_3=[
            ['',''],
            <? foreach ($date['graphs_3_budget_seeds'] as $value) {
            if($value[1]==null){
                echo "['$value[0]', 0],";
            }
            else {
                echo "['$value[0]', " . $value[1] . "],";
            }
        }?>
        ];
        var graphs_4=[
            ['',''],
            <? foreach ($date['graphs_4_budget_fertilizers'] as $value){
                if($value[1]==null){
                    echo "['$value[0]', 0],";
                }
                else {
                    echo "['$value[0]', " . $value[1] . "],";
                }
        }?>
        ];
        var graphs_5=[
            ['',''],
            <? foreach ($date['graphs_5_budget_ppa'] as $value) {
            if($value[1]==null){
                echo "['$value[0]', 0],";
            }
            else {
                echo "['$value[0]', " . $value[1] . "],";
            }
        }?>
        ];
        var graphs_6=[
                ['',''],
                <? foreach ($date['graphs_6_budget_pay'] as $value) {
                if($value[1]==null){
                    echo "['$value[0]', 0],";
                }
                else {
                    echo "['$value[0]', " . $value[1] . "],";
                }
            }?>
            ];
            var graphs_7=[
                ['',''],
                <? foreach ($date['graphs_7_plane_revenues'] as $value) {
                if($value[1]==null){
                    echo "['$value[0]', 0],";
                }
                else {
                    echo "['$value[0]', ". $value[1] ."],";
                }
            }?>
            ];
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(budget_equipment);
        google.charts.setOnLoadCallback(budget_seeds);
        google.charts.setOnLoadCallback(budget_fertilizers);
        google.charts.setOnLoadCallback(budget_ppa);
        google.charts.setOnLoadCallback(budget_pay);
        google.charts.setOnLoadCallback(plane_revenues);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(graphs_1);
            var options = {
                title: 'Структура посівних площ',
                is3D: true,
                height:500,
                weight:500
            };
            var chart = new google.visualization.PieChart(document.getElementById('g1'));
            chart.draw(data, options);
        }


        function budget_equipment() {
            var data = google.visualization.arrayToDataTable(graphs_2);
            var options = {
                title: 'Витрати на топливо, грн',
                is3D: true,
                height:500,
                weight:500
            };
            var chart = new google.visualization.PieChart(document.getElementById('g2'));
            chart.draw(data, options);
        }

        function budget_seeds() {
            var data = google.visualization.arrayToDataTable(graphs_3);
            var options = {
                title: 'Витрати на насіння, грн',
                is3D: true,
                height:500,
                weight:500
            };
            var chart = new google.visualization.PieChart(document.getElementById('g3'));
            chart.draw(data, options);
        }
        function budget_fertilizers() {
            var data = google.visualization.arrayToDataTable(graphs_4);
            var options = {
                title: 'Витрати на добрива, грн',
                is3D: true,
                height:500,
                weight:500
            };
            var chart = new google.visualization.PieChart(document.getElementById('g4'));
            chart.draw(data, options);
        }
        function budget_ppa() {
            var data = google.visualization.arrayToDataTable(graphs_5);
            var options = {
                title: 'Витрати на ЗЗР, грн',
                is3D: true,
                height:500,
                weight:500
            };
            var chart = new google.visualization.PieChart(document.getElementById('g5'));
            chart.draw(data, options);
        }
            function budget_pay() {
                var data = google.visualization.arrayToDataTable(graphs_6);
                var options = {
                    title: 'Витрати на зарплату, грн',
                    is3D: true,
                    height:500,
                    weight:500
                };
                var chart = new google.visualization.PieChart(document.getElementById('g6'));
                chart.draw(data, options);
            }
            function plane_revenues() {
                var data = google.visualization.arrayToDataTable(graphs_7);
                var options = {
                    title: 'Планові доходи від продажу продукції, грн',
                    height:500,
                    weight:500
                };
                var chart = new google.visualization.ColumnChart(document.getElementById('g7'));
                chart.draw(data, options);
            }
    });
    </script>
<section class="content">
    <div class="box">
        <div class="box-header">

        </div>
        <div class="box-body" >
        <div class="row">
            <div class="col-lg-12">
                <div class="graphs" id="g1"></div>
            </div>
            <div class="col-lg-6">
                <div class="graphs" id="g7"></div>
            </div>
            <div class="col-lg-6">
                <div class="graphs" id="g2"></div>
            </div>
            <div class="col-lg-6">
                <div class="graphs" id="g3"></div>
            </div>
            <div class="col-lg-6">
                <div class="graphs" id="g4"></div>
            </div>            
            <div class="col-lg-6">
                <div class="graphs" id="g5"></div>
            </div>
            <div class="col-lg-6">
                <div class="graphs" id="g6"></div>
            </div>
        </div>
            
        </div>
    </div>
</section>

