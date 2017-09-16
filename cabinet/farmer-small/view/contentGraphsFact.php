
<?
    /*echo '<pre>';
    var_dump($date['fact']);
    die;*/
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
     $(document).ready(function (){
        

        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChartRevenue);
        google.charts.setOnLoadCallback(drawChartGross_profit);
        
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: 'style' } ],
                    <?     foreach ($date['graphs_1'] as $value) {
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
                    title: "<? if($_COOKIE['lang']=='ua'){ echo 'Виробничі витрати, грн/га';} elseif($_COOKIE['lang']=='gb'){ echo 'Виробничі  грн/га';}?>",
                    width: 1200,
                    height: 400,
                    bar: {groupWidth: "95%"},
                    legend: { position: "none" },
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("g1"));
                chart.draw(view, options);
        }

        function drawChartRevenue() {
            var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: 'style' } ],
                    <?     foreach ($date['graphs_2'] as $value) {
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
                    title: "Доходи від реалізації, грн/га",
                    width: 1200,
                    height: 400,
                    bar: {groupWidth: "95%"},
                    legend: { position: "none" },
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("g2"));
                chart.draw(view, options);
        }
        function drawChartGross_profit() {
             var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", { role: 'style' } ],
                    <?     foreach ($date['graphs_3'] as $value) {
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
                    title: "<? if($_COOKIE['lang']=='ua'){ echo 'Валовий прибуток, грн/га';} elseif($_COOKIE['lang']=='gb'){ echo 'Виробничі  грн/га';}?>",
                    width: 1200,
                    height: 400,
                    bar: {groupWidth: "95%"},
                    legend: { position: "none" },
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("g3"));
                chart.draw(view, options)
        }

        
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
        </div>
    </div>
</section>