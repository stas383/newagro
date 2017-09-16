<head>
    <style>
        table,tr, th, td{
        font-family: 'Open Sans', sans-serif;
                font-weight: 600;
        }
        input, select {
             border-radius: 2px;
            border: 1px solid #999;
            font-style: italic;
            color: #aa1111;
        }
        .inpt{
            height:23px;
            border:1px solid #999;
            background:#fff;
            width: 100%;
        }
        .hide_month{
            display: none;
        }
        .m1{
            display: table-cell;
            text-align: center;
        }
        .border_ridht{
            border-right: 1px solid #004f27;
        }
    </style>
</head>
<?php

$month_name_ua=array(
    1=>'Січень',
    2=>'Лютий',
    3=>'Березень',
    4=>'Квітень',
    5=>'Травень',
    6=>'Червень',
    7=>'Липень',
    8=>'Серпень',
    9=>'Вересень',
    10=>'Жовтень',
    11=>'Листопад',
    12=>'Грудень'
);
$month_name_en = array(
    1=>'January',
    2=>'February',
    3=>'March',
    4=>'April',
    5=>'May',
    6=>'June',
    7=>'July',
    8=>'August',
    9=>'September',
    10=>'October',
    11=>'November',
    12=>'December',
    );
?>

    <script>
        $(document).ready(function (){
            $(".open_page").click(open_page);
            function open_page() {
                var page = $(this).attr("data-num");
                $(".open_page").removeClass("btn-success");
                $(this).addClass("btn-success");
                $(".hide_month").css({
                    "display":"none"
                });
                $(".m"+page).css({
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
                <h2 class="box-title"><?=$language['farmer-small']['63']?></h2>
            </div>
            <div class="box-header">
                <div class="box-tools">
                    <div class="btn-group">
                        <button type="button" data-num="1" class="open_page btn btn-default">1</button>
                        <button type="button" data-num="2" class="open_page btn btn-default">2</button>
                        <button type="button" data-num="3" class="open_page btn btn-default">3</button>
                        <button type="button" data-num="4" class="open_page btn btn-default">4</button>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding responsive" id="table_wrapper">
                <table class="table table-responsive">
                    <thead>
                    <? foreach ($date['plan']['table'] as $table){?>
                    <tr>
                        <th class="<?php echo $table['class']?>"> <? if($_COOKIE['lang']=='ua'){echo $table['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $table['name_en'];}?> </th>
                        <? for($x=1;$x<=12;$x++){
                            $page= ceil ($x/3);
                            ?>
                            <th class="hide_month <? echo 'm'.$page?>" <?php if($table['php']== 'crop_name') echo 'colspan="2" style="text-align: center;  border-right: 1px solid #004f27;"';?>><?
                                    if($table['php'] == 'crop_name') {

                                        if($_COOKIE['lang']=='ua'){echo '('.$x.')'.$month_name_ua[$x];}
                                        elseif($_COOKIE['lang']=='gb'){echo '('.$x.')'.$month_name_en[$x];}?>
                                        <br>
                                        план-факт
                                    <?}
                                    else echo number_format($date['month'][$table['php']][$x], 0, '.', ' ');
                                ?>
                            </th>
                            <?php if($table['php'] !== 'crop_name'){?>
                                <th class="border_ridht hide_month <? echo 'm'.$page?>">
                                    <?php echo number_format($date['fact']['month'][$table['php']][$x], 0, '.', ' ') ?>
                                </th>
                            <?php }?>
                        <?}?>
                        <th <?php if($table['php']== 'crop_name') echo 'colspan="2" style="text-align: center;"';?>>
                            <?php
                                if($table['php'] == 'crop_name') {echo $language['farmer-small']['51'];?>
                                    <br>
                                    план-факт
                                <?}
                                else if($table['php'] != 'profitability') echo number_format($date['plan']['result']['total'][$table['php']], 2, '.', ' ')
                            ?>
                        </th>
                        <?php if($table['php'] !== 'crop_name'){?>
                            <th>
                                <?php echo number_format($date['fact']['total'][$table['php']], 0, '.', ' ') ?>
                            </th>
                        <?php }?>
                    </tr>
                    <? } ?>
                    </thead>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </section>