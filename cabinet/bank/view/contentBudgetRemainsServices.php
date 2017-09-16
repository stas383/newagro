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
            a.download = 'AgriAnalytica(RemainsServices).xls';
            a.click();
        });
    });
</script>
<section class="content">
    <div class="box" id="table_wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Валовий збір, т</th>
                    <th>Вага після очистки, т</th>
                    <th>Вага після сушки, т</th>
                    <th>Витрати на очистку, грн</th>
                    <th>Витрати на сушку, грн</th>
                    <th>Витрати на зберігання за місяць, грн</th>
                    <th>Загальні витрати, грн</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($date["remains"] as $Remains){?>
                    <tr>
                        <td></td>
                        <td><?php echo number_format($Remains["gross_weight"], 2, ',', ' ')?></td>
                        <td><?php echo number_format($Remains["weight_cleaning"], 2, ',', ' ')?></td>
                        <td><?php echo number_format($Remains["weight_drying"], 2, ',', ' ')?></td>
                        <td><?php echo number_format($Remains["cleaning_cost"]/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                        <td><?php echo number_format($Remains["drying_cost"]/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                        <td><?php echo number_format($Remains["storing_cost"]/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                        <td><?php echo number_format($Remains["total_handling"]/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                    </tr>
                <? } ?>
                <tr>
                    <td><button id="btnExport" class="btn btn-primary" >Експорт в XLS</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
