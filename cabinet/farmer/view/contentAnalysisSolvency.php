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
           "<?php echo $language['farmer']['62'];?> ",
           "<?php echo $language['farmer']['97'];?> ",
           "<?php echo $language['farmer']['98'];?> ",
           "<?php echo $language['farmer']['99'];?> ",
           "<?php echo $language['farmer']['100'];?> ",
           "<?php echo $language['farmer']['101'];?> ",
           "<?php echo $language['farmer']['102'];?> "
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
            <h3 class="box-title"><?=$language['farmer']['61'];?></h3>
            <div class="box-tools">
            <select class="form-control classEdit" id="graf">
                <?php foreach ($language['farmer']['graf'] as $key => $item){?>
                    <option value="<?=$key;?>" selected="selected"><?=$item;?></option>
                <?}?>
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
                                <td class="text"><?=$language['farmer']['64'];?></td>
                            </tr>
                            <tr>
                                <td  style="background:#f39c12; padding: 8px"></td>
                                <td><?=$language['farmer']['65'];?></td>
                            </tr>
                            <tr>
                                <td  style="background:#dd4b39; padding: 8px"></td>
                                <td><?=$language['farmer']['66'];?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</section>