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
        $(".OpenCF").click(open);
        function open() {
            var x=$(this).attr('id');
            $(".c"+x).toggle();
            if(x==1 || x==6 || x==7){
                if ( $(this).hasClass("INDEX") ) {
                    $(".CloseCF").hide();
                    $(this).removeClass("INDEX");
                }else {
                    $(this).addClass('INDEX');
                }
            }
        }
    });
</script>
<style>
    .CloseCF{
        display: none;
    }
    .OpenCF{
        cursor: pointer;
        color: #0d6aad;
    }
    .OpenCF:hover,{
        color: #192dcb;
    }
</style>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo $language['farmer']['41'];?></h3>
            <div class="box-tools">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="/farmer/budget/financial-bank"><?=$language['farmer']['219']?></a></li>
                    <li><a href="/farmer/budget/setting-material"><?php echo $language['farmer']['13']?></a></li>
                    <li><a href="/farmer/budget/balance-products"><?php echo $language['farmer']['26']?></a></li>
                    <li><a href="/farmer/budget/setting-cash"><?php echo $language['farmer']['116']?></a></li>
                </ul>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding" id="table_wrapper">
            <table class="table">
                <thead >
                <tr>
                    <th><?php echo $language['farmer']['9'];?></th>
                    <? for ($x=1; $x<=12; $x++){ ?>
                        <th><? echo $x?></th>
                    <? }?>
                    <th><?php echo $language['farmer']['10'];?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($date['table'] as $Ex_name){ ?>
                    <tr id="<?php echo $Ex_name['id']?>" class="<?php echo $Ex_name['class_tr']?> ">
                        <td class="<?php echo $Ex_name['class']?>"><?if($_COOKIE['lang']=='gb'){echo $Ex_name['name_en'];} else{echo $Ex_name['name_ua'];} ?></td>
                        <? for ($x=1; $x<=12; $x++){ ?>
                            <td class=""><?php if($Ex_name['name_php']!="false") echo number_format($date['date'][$x][$Ex_name['name_php']]/$_COOKIE['currency_val'], 0, '.', ' ')?></td>
                        <? }?>

                        <td><?php if($Ex_name['name_php']!="false") echo number_format($date["total"][$Ex_name['name_php']]/$_COOKIE['currency_val'], 0, '.', ' ')?></td>
                    </tr>
                <?php } ?>
                    <tr>
                        <td><button id="btnExport" class="btn btn-primary" ><?php echo $language['farmer']['11'];?></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</section>