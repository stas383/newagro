<script>
    $(document).ready(function (){
        $("#btnExport").click(function(e) {
            e.preventDefault();
            //getting data from our table
            var data_type = 'data:application/vnd.ms-excel';
            var table_div = document.getElementById('table_wrapper');
            var table_html = table_div.outerHTML.replace(/ /g, '%20');
            var meta ="<meta http-equiv='content-type' content='text/plain; charset=UTF-8'>";
            var a = document.createElement('a');
            a.href = data_type + ', ' + meta +  table_html;
            a.download = 'AgriAnalytica(CashFlow).xls';
            a.click();
        });
    });
</script>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Рух грошових коштів помісячно (Cash Flow)</h3>
            <div class="box-tools">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="/bank/budget/setting-cash">Налаштування по заборгованості</a></li>
                </ul>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding" id="table_wrapper">
            <table class="table">
                <thead >
                <tr>
                    <th>Стаття</th>
                    <? for ($x=1; $x<=12; $x++){ ?>
                        <th><? echo $x?></th>
                    <? }?>
                    <th>Всього</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($date['table'] as $Ex_name){ ?>
                    <tr>
                        <td class="<?php echo $Ex_name['class']?>"><?=$Ex_name['name_ua']?></td>
                        <? for ($x=1; $x<=12; $x++){ ?>
                            <td class=""><?php if($Ex_name['name_php']!="false") echo number_format($date['date'][$x][$Ex_name['name_php']]/$_COOKIE['currency_val'], 0, '.', ' ')?></td>
                        <? }?>

                        <td><?php if($Ex_name['name_php']!="false") echo number_format($date["total"][$Ex_name['name_php']]/$_COOKIE['currency_val'], 0, '.', ' ')?></td>
                    </tr>
                <?php } ?>
                    <tr>
                        <td><button id="btnExport" class="btn btn-primary" >Експорт в XLS</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</section>
