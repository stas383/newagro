
<? //var_dump($date);die;?>

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
    </style>
</head>
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
                <h3 class="box-title"><?=$language['farmer-small']['61']?></h3>
                <div class="box-tools">
                    <a class="btn btn-success" href="<?php SRC::getSrc();?>/farmer-small/budget-crop"><?=$language['farmer-small']['122']?></a>
                </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body no-padding" id="table_wrapper">
                <table class="table">
                    <thead>
                    <? foreach ($date['plan']['table'] as $table){?>
                    <tr>
                        <th class="<?php echo $table['class']?>"> <?if($_COOKIE['lang']=='ua'){echo $table['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $table['name_en'];}?> </th>
                        <? foreach ($date['plan']['result'][$table['php']] as $item=>$value){?>
                        <th><?
                            if($table['php'] == 'crop_name')echo $value;
                            else if($table['href']==false) echo number_format($value, 0, '.', ' ');
                            else echo "<a href='".$table['href'].$item."'>".number_format($value, 0, '.', ' ')."</a>"
                            ?>
                        </th>

                        <?}?>
                            <th>
                                <?
                                if($table['php'] == 'crop_name') echo $language['farmer-small']['51'];
                                else if($table['php'] != 'profitability') echo number_format($date['plan']['result']['total'][$table['php']], 2, '.', ' ')
                                ?>
                            </th>
                    </tr>
                    <? } ?>
                    </thead>
                    <td>
                        <button class="btn btn-primary" id="btnExport" type="submit"> <?=$language['farmer-small']['62']?></button>
                    </td>
                </table>

            </div>

            <!-- /.box-body -->
        </div>

    </section>