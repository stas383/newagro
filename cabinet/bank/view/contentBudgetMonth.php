<?php
$tillage_type[1]='традиційна';
$tillage_type[2]='поверхнева';
$tillage_type[3]='мінімальна';
$page=5;
?>
<style>
    .revenue_crop{
        display: none;
    }
    #revenue{
        cursor: pointer;
        color: #0d6aad;
    }

</style>

<script>
    $(document).ready(function (){
        $(".open_page").click(open_page);
        function open_page() {
            var page = $(this).attr("data-num");
            $(".open_page").removeClass("btn-success");
            $(this).addClass("btn-success");
            $(".crop_date").css({
                "display":"none"
            });
            $(".pr"+page).css({
                "display":"table-cell"
            })
        }
        $("#revenue").click(open_crop);
        function open_crop() {
            $(".revenue_crop").toggle();
        }
        $("#btnExport").click(function(e) {
            e.preventDefault();

            //getting data from our table
            var data_type = 'data:application/vnd.ms-excel';
            var table_div = document.getElementById('table_wrapper');
            var table_html = table_div.outerHTML.replace(/ /g, '%20');
            var meta ="<meta http-equiv='content-type' content='text/plain; charset=UTF-8'>";
            var a = document.createElement('a');
            a.href = data_type + ', ' + meta +  table_html;
            a.download = 'AgriAnalytica(BudgetMonth).xls';
            a.click();
        });
    });
</script>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Операційний бюджет помісячно</h3>
            <div class="box-tools">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="/bank/budget/setting-material">Налаштування залишків</a></li>
                    <li><a href="/bank/budget/setting-sales">Налаштування реалізації продукції</a></li>
                    <li><a href="/bank/budget/balance-products">Баланс продукції</a></li>
                    <li><a href="/bank/budget/setting-month">Налаштування помісячно</a></li>
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
                <?php foreach ($date["table"] as $Ex_name){ ?>
                    <tr>
                        <td class="<?php echo $Ex_name['class']?>" <?php if($Ex_name['name_php']== "revenue") echo 'id="revenue"'?>><?=$Ex_name['name_ua']?></td>
                        <? for ($x=1; $x<=12; $x++){ ?>
                            <td class=""><? echo number_format($date['Mont'][$x][$Ex_name['name_php']]/$_COOKIE['currency_val'], 0, '.', ' ')?></td>
                        <? }?>

                        <td><? echo number_format($date['Mont']["total"][$Ex_name['name_php']]/$_COOKIE['currency_val'], 0, '.', ' ')?></td>

                    </tr>
                    <?php if($Ex_name['name_php']== "revenue"){ ?>
                        <?
                        for ($t=1; $t<=2; $t++){
                            for ($x=1; $x<=$date['date-'.$t]["crop_coll"]; $x++){
                                ?>
                                <tr class="revenue_crop">
                                    <td class="level2"><? echo $date['date-'.$t]['name'][$x]?></td>
                                    <? for ($m=1; $m<=12; $m++){ ?>
                                        <td><? echo number_format($date['date-'.$t]['revenue_crop'][$x][$m]/$_COOKIE['currency_val'], 0, '.', ' ')?></td>
                                    <? }?>
                                    <td><? echo number_format($date['date-'.$t]['revenue'][$x]/$_COOKIE['currency_val'], 0, '.', ' ')?></td>
                                </tr>
                            <? }
                        }?>

                    <?php } ?>
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
