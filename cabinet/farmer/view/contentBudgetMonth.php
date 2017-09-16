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
            <h3 class="box-title"><?php echo $language['farmer']['12']?></h3>
            <div class="box-tools">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="/farmer/budget/setting-sales"><?php echo $language['farmer']['25']?></a></li>
                    <li><a href="/farmer/budget/setting-month"><?php echo $language['farmer']['36']?></a></li>
                </ul>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding" id="table_wrapper">
            <div class="table-responsive">
            <table class="table">
                <thead >
                <tr>
                    <th><?= $language['farmer']['9']?></th>
                    <? for ($x=1; $x<=12; $x++){ ?>
                        <th><? echo $x?></th>
                    <? }?>
                    <th><?php echo $language['farmer']['10']?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($date["table"] as $Ex_name){ ?>
                    <tr>
                        <td class="<?php echo $Ex_name['class']?>" <?php if($Ex_name['name_php']== "revenue") echo 'id="revenue"'?>><?if($_COOKIE['lang']=='gb'){echo $Ex_name['name_en'];} else{echo $Ex_name['name_ua'];} ?></td>
                        <? for ($x=1; $x<=12; $x++){ ?>
                            <td class=""><? echo number_format($date['Mont'][$x][$Ex_name['name_php']]/$_COOKIE['currency_val'], 0, '.', ' ')?></td>
                        <? }?>
                        <?php
                        if($Ex_name['name_php']=='seeds') $href[$Ex_name['name_php']]='/farmer/budget/remains-total-material/1/0';
                        if($Ex_name['name_php']=='fertilizers') $href[$Ex_name['name_php']]='/farmer/budget/remains-total-material/2/0';
                        if($Ex_name['name_php']=='ppa') $href[$Ex_name['name_php']]='/farmer/budget/remains-total-material/3/0';
                        if($href[$Ex_name['name_php']]==false){
                            ?>
                            <td><? echo number_format($date['Mont']["total"][$Ex_name['name_php']]/$_COOKIE['currency_val'], 0, '.', ' ')?></td>
                        <? }else{?>
                            <td><a href="<?php echo $href[$Ex_name['name_php']]?>"><? echo number_format($date['Mont']["total"][$Ex_name['name_php']]/$_COOKIE['currency_val'], 0, '.', ' ')?></a></td>
                        <? } ?>
                    </tr>
                    <?php if($Ex_name['name_php']== "revenue"){ ?>
                        <?
                        for ($t=1; $t<=3; $t++){
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
                    <td><button id="btnExport" class="btn btn-primary" ><?php echo $language['farmer']['11']?></button></td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</section>
