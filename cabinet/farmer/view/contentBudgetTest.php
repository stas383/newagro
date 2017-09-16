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
            <h3 class="box-title"><?php echo $language['farmer']['8']?></h3>
            <div class="box-tools">
                <div class="btn-group">
                    <? for ($x=1; $x<=(ceil (($date['date-1']["crop_coll"]+$date['date-2']["crop_coll"]+$date['date-2']["crop_coll"])/$page)); $x++){ ?>
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
                    <th><?php echo $language['farmer']['9']?></th>
                    <?
                    $class=0;
                    for ($t=1; $t<=3; $t++){
                    for ($x=1; $x<=$date['date-'.$t]["crop_coll"]; $x++){
                        $class++;?>
                        <th colspan="2"  class="text-center crop_date pr<?php echo ceil ($class/$page); ?>">
                            <?php if($t==1 or $t==2){ ?>
                                <sup><img src="<?php SRC::getSrc()?>/cabinet/farmer/template/images/plan_off.svg" height="20" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Використовується стандартна технологічна карта"></sup>
                            <?php } if($t==3){ ?>
                            <sup><img src="<?php SRC::getSrc()?>/cabinet/farmer/template/images/plan.svg" height="20" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Використовується власна технологічна карта"></sup>
                            <?php }?>

                            <? echo $date['date-'.$t]['name'][$x]?>
                        </th>
                    <? }
                    }?>
                    <th><?php echo $language['farmer']['10']?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($date["table"] as $Ex_name){ ?>
                    <tr>
                        <td class="<?php echo $Ex_name['class']?>">
                            <?php if($_COOKIE['lang']=='gb'){echo $Ex_name['name_en'];} else{echo $Ex_name['name_ua'];}
                            ?>
                        </td>
                        <?
                        $class=0;
                        for ($t=1; $t<=3; $t++){
                            for ($x=1; $x<=$date['date-'.$t]["crop_coll"]; $x++){
                                $class++;
                                if($Ex_name['href']<>""){
                                    ?><td class="text-center crop_date pr<?php echo ceil ($class/$page);?>"><a href="<?php echo $Ex_name['href'].'/'.$date['date-'.$t]['crop'][$x].'/'.$t?>"><? echo number_format($date['date-'.$t][$Ex_name['name_php']][$x]/$_COOKIE['currency_val'], 0, '.', ' ')?></a></td><?
                                }else{
                                    ?><td class="text-center crop_date pr<?php echo ceil ($class/$page);?>"><? echo number_format($date['date-'.$t][$Ex_name['name_php']][$x]/$_COOKIE['currency_val'], 0, '.', ' ')?></td><?
                                }
                                ?>
                                <td class=" crop_date pr<?php echo ceil ($class/$page);?>"><? if ($date['date-'.$t][$Ex_name['proc']][$x]!=false) echo number_format($date['date-'.$t][$Ex_name['name_php']][$x]*100/$date['date-'.$t][$Ex_name['proc']][$x], 0, '.', ' ')?>%</td>
                            <? }
                        }?>
                        <?php
                            if($Ex_name['name_php']=='seeds') $href[$Ex_name['name_php']]='/farmer/budget/remains-total-material/1/0';
                            if($Ex_name['name_php']=='fertilizers') $href[$Ex_name['name_php']]='/farmer/budget/remains-total-material/2/0';
                            if($Ex_name['name_php']=='ppa') $href[$Ex_name['name_php']]='/farmer/budget/remains-total-material/3/0';
                            if($href[$Ex_name['name_php']]==false){
                        ?>
                                <td><? echo number_format($date["total"][$Ex_name['name_php']]/$_COOKIE['currency_val'], 2, '.', ' ')?></td>
                        <? }else{?>
                                <td><a href="<?php echo $href[$Ex_name['name_php']]?>"><? echo number_format($date["total"][$Ex_name['name_php']]/$_COOKIE['currency_val'], 2, '.', ' ')?></a></td>
                        <? } ?>
                    </tr>
                <?php } ?>
                <tr>
                    <td><button id="btnExport" class="btn btn-primary" ><?php echo $language['farmer']['11']?></button></td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</section>
