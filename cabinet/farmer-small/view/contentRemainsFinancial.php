<?
//var_dump($date['plan']['remains']);die;
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
                var table_div = document.getElementById('table');
                var table_html = table_div.outerHTML.replace(/ /g, '%20');
                var meta ="<meta http-equiv='content-type' content='text/plain; charset=UTF-8'>";
                var a = document.createElement('a');
                a.href = data_type + ', ' + meta +  table_html;
                a.download = 'AgriAnalytica(BudgetFinancial).xls';
                a.click();
            });

    });
</script>
<section class="content">
    <div class="box">
        <div class="box-body">
            <table class="table" id="table">
                <tbody>
                <?if($_COOKIE['lang']=='ua'){?>
                <?php foreach($date['table'] as $key=>$value){?>
                    <tr>
                        <th><?php echo $value?></th>
                        <? foreach ($date['plan']['remains'] as $remains){  ?>
                            <th>
                                <?
                                if($key=='crop_name') echo $remains[$key];
                                if($key!='crop_name') echo number_format($remains[$key],2,',',' ');
                                ?>

                            </th>
                        <?php   } ?>
                    </tr>
                <?php }?>
                <?php }?>
            <?php if($_COOKIE['lang']=='gb'){?>
                <?php foreach($date['table_en'] as $key=>$value){?>
                    <tr>
                        <th><?php echo $value?></th>
                        <? foreach ($date['plan']['remains'] as $remains){  ?>
                            <th>
                                <?
                                if($key=='crop_name') echo $remains[$key];
                                if($key!='crop_name') echo number_format($remains[$key],2,',',' ');
                                ?>

                            </th>
                        <?php   } ?>
                    </tr>
                <?php }?>
                <?php }?>

                </tbody>


            </table>
            <div style="text-align:center;">
                <button class="btn btn-primary" id="btnExport" type="submit">
                    Експорт в Exel
                </button>
            </div>
        </div>
    </div>

</section>