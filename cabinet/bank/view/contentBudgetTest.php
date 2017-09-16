<?php
$tillage_type[1]='традиційна';
$tillage_type[2]='поверхнева';
$tillage_type[3]='мінімальна';
$page=5;
?>
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

        $("#btnExport").click(function(e) {
            e.preventDefault();

            //getting data from our table
            var data_type = 'data:application/vnd.ms-excel';
            var table_div = document.getElementById('table_wrapper');
            var table_html = table_div.outerHTML.replace(/ /g, '%20');
            var meta ="<meta http-equiv='content-type' content='text/plain; charset=UTF-8'>";
            var a = document.createElement('a');
            a.href = data_type + ', ' + meta +  table_html;
            a.download = 'AgriAnalytica(BudgetCrop).xls';
            a.click();
        });

});
</script>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Операційний бюджет по культурах</h3>
            <div class="box-tools">
                <div class="btn-group">
                    <? for ($x=1; $x<=(ceil (($date['date-1']["crop_coll"]+$date['date-2']["crop_coll"])/$page)); $x++){ ?>
                        <button type="button" data-num="<?php echo $x?>" class="open_page btn btn-default"><?php echo $x?></button>
                    <?php }?>
                </div>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding" id="table_wrapper">
            <table class="table">
                <thead >
                <tr>
                    <th>Стаття</th>
                    <?
                    $class=0;
                    for ($t=1; $t<=2; $t++){
                    for ($x=1; $x<=$date['date-'.$t]["crop_coll"]; $x++){
                        $class++;?>
                        <th colspan="2"  class="text-center crop_date pr<?php echo ceil ($class/$page); ?>"><? echo $date['date-'.$t]['name'][$x]?></th>
                    <? }
                    }?>
                    <th>Всього</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($date["table"] as $Ex_name){ ?>
                    <tr>
                        <td class="<?php echo $Ex_name['class']?>"><?=$Ex_name['name_ua']?></td>
                        <?
                        $class=0;
                        for ($t=1; $t<=2; $t++){
                            for ($x=1; $x<=$date['date-'.$t]["crop_coll"]; $x++){
                                $class++;
                                if($Ex_name['href']<>""){
                                    ?><td class="text-center crop_date pr<?php echo ceil ($class/$page);?>"><a href="<?php echo $Ex_name['href'].'/'.$date['date-'.$t]['crop'][$x].'/'.$t?>"><? echo number_format($date['date-'.$t][$Ex_name['name_php']][$x]/$_COOKIE['currency_val'], 0, '.', ' ')?></a></td><?
                                }else{
                                    ?><td class="text-center crop_date pr<?php echo ceil ($class/$page);?>"><? echo number_format($date['date-'.$t][$Ex_name['name_php']][$x]/$_COOKIE['currency_val'], 0, '.', ' ')?></td><?
                                }
                                ?>
                                <td class=" crop_date pr<?php echo ceil ($class/$page);?>"><? echo number_format($date['date-'.$t][$Ex_name['name_php']][$x]*100/$date['date-'.$t][$Ex_name['proc']][$x], 0, '.', ' ')?>%</td>
                            <? }
                        }?>
                        <td><? echo number_format($date["total"][$Ex_name['name_php']]/$_COOKIE['currency_val'], 2, '.', ' ')?></td>

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
