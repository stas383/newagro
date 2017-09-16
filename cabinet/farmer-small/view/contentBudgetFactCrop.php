
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
    .border_ridht{
        border-right: 1px solid #080606;
    }
    </style>
</head>


    <script>
        $(document).ready(function (){
            /*$(".open_page").click(open_page);
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
            }*/
            $("#btnExport").click(function(e) {
                e.preventDefault();

                //getting data from our table
                var data_type = 'data:application/vnd.ms-excel';
                var table_div = document.getElementById('table_wrapper');
                var table_html = table_div.outerHTML.replace(/ /g, '%20');
                var meta ="<meta http-equiv='content-type' content='text/plain; charset=UTF-8'>";
                var a = document.createElement('a');
                a.href = data_type + ', ' + meta +  table_html;
                a.download = 'AgriAnalytica(BudgetFactCrop).xls';
                a.click();
            });
        });
    </script>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h2 class="box-title"><?=$language['farmer-small']['61']?></h2>
            </div>

            <!-- /.box-header -->
            <div class="box-body no-padding table-responsive" id="table_wrapper">
                <table class="table">
                    <thead>

                    <? foreach ($date['plan']['table'] as $key=>$table){?>
                    <tr>
                    
                        <th class="<?php echo $table['class']?>"> <? if($_COOKIE['lang']=='ua'){echo $table['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $table['name_en'];}?> </th>
                        
                        <? foreach ($date['plan']['result'][$table['php']] as $item=>$value){?>

                        <th <?php if($table['php'] == 'crop_name') echo 'colspan="3" style="text-align: center; border-right: 1px solid #080606; "';?>><?
                            if($table['php'] == 'crop_name') {echo $value;?>
                            <br>
                                план - факт - +/-
                           <? }
                            else if($table['href']==false) echo number_format($value, 0, '.', ' ');
                            else echo "<a href='".['hre$tablef'].$item."'>".number_format($value, 0, '.', ' ')."</a>"

                            ?>
                        </th>
                       <?php if($table['php'] !== 'crop_name'){?>
                                <?php if($table['php'] !='production_costs' and $table['php']!='gross_profit' and $table['php']!='profitability' ){ ?>
                                <th>
                                    <a href="/farmer-small/remains-fact/<? echo $table['php'].'/'.$item?>"><?php echo number_format($date['fact'][$table['php']][$item], 0, '.', ' ') ?></a>
                                </th>
                        <?}else{?>
                            <th>
                                <?php echo number_format($date['fact'][$table['php']][$item], 0, '.', ' ') ?>
                            </th>
                            <?}}?>

                        <?php if($table['php'] !== 'crop_name'){?>
                                <th class="border_ridht">
                                    <?php echo number_format($value - $date['fact'][$table['php']][$item], 0, '.', ' ') ?>
                                </th>
                        <?}?>
                        <?}?>
                            <th <?php if($table['php']== 'crop_name') echo 'colspan="3" style="text-align: center;"';?>>
                                <?
                                if($table['php'] == 'crop_name') {echo 'Всього';?>
                                    <br>
                                    план - факт - +/-
                                <?}
                                else if($table['php'] != 'profitability') echo number_format($date['plan']['result']['total'][$table['php']], 0, '.', ' ')
                                ?>
                            </th>
                        <?php if($table['php'] !== 'crop_name'){?>
                            <th>
                                <?php echo number_format($date['fact']['total'][$table['php']], 0, '.', ' ') ?>
                            </th>
                            <th>
                                <? echo number_format($date['plan']['result']['total'][$table['php']] - $date['fact']['total'][$table['php']], 0, '.', ' ') ?>
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