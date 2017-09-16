<script>
    $(document).ready(function (){
        $("#btnExport").click(function(e) {
            e.preventDefault();
            var data_type = 'data:application/vnd.ms-excel';
            var table_div = document.getElementById('table_wrapper');
            var table_html = table_div.outerHTML.replace(/ /g, '%20');
            var meta ="<meta http-equiv='content-type' content='text/plain; charset=UTF-8'>";
            var a = document.createElement('a');
            a.href = data_type + ', ' + meta +  table_html;
            a.download = 'AgriAnalytica(RemainsDirect).xls';
            a.click();
        });
    });
</script>
<style>
    #btnExport{
        display: none;
    }
</style>
<section class="content">
    <div class="box" id="table_wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th><?=$language['farmer']['220']?></th>
                    <th><?=$language['farmer']['221']?></th>
                    <th><?=$language['farmer']['222']?></th>
                    <th><?=$language['farmer']['223']?></th>
                    <th><?=$language['farmer']['224']?></th>
                    <th><?=$language['farmer']['225']?></th>
                    <th><?=$language['farmer']['226']?></th>
                    <th><?=$language['farmer']['227']?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($date["remains"] as $Remains){?>

                    <tr>
                        <td></td>
                        <td><?php echo $Remains["name_action"] ?></td>
                        <td><?php echo $Remains["strat_data"] ?></td>
                        <td><?php echo $Remains["time"] ?></td>
                        <td><?php echo number_format($Remains["seeds"]/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                        <td><?php echo number_format($Remains["fertilizers"]/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                        <td><?php echo number_format($Remains["ppa"]/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                        <td><?php echo number_format($Remains["fuel_lubes_cost"]/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                        <td><?php echo number_format($Remains["total"]/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                    </tr>

                <? } ?>
                <tr>
                    <td colspan="4"></td>
                    <td><? echo number_format($date["total"]['seeds']/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                    <td><? echo number_format($date["total"]['fertilizers']/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                    <td><? echo number_format($date["total"]['ppa']/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                    <td><? echo number_format($date["total"]['fuel']/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                    <td><? echo number_format($date["total"]['total']/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                </tr>
                <tr>
                    <td><button id="btnExport" class="btn btn-primary" >Експорт в XLS</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
