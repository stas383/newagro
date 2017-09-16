<script>
    $(document).ready(function (){
        $("#btnExport").click(function(e) {
            e.preventDefault();
            var data_type = 'data:application/vnd.ms-excel';
            var table_div = document.getElementById('table_wrapper');
            var table_html = table_div.outerHTML.replace(/ /g, '%20');
            var meta ="<meta http-equiv='content-type' content='text/plain; charset=UTF-8'>";
            var a = document.createElement('a');
            a.href = data_type + ', ' + meta +  table_html;
            a.download = 'AgriAnalytica(RemainsMaterial).xls';
            a.click();
        });
    });
</script>
<?php
$m[1]=', п.од.';
$m[3]=', л/т';
$m[4]=', л';

$t=$date['table_type'];
?>
<section class="content">
    <div class="box" id="table_wrapper">
        <table class="table">
            <thead>
                <tr>
                    <th>Технологічна операція</th>
                    <th>Матеріали</th>
                    <th>Норма внесення, кг<?if($t==1) echo $m[1] ?>/га<?if($t==3) echo $m[3] ?></th>
                    <th>Площа, га</th>
                    <th>Загальна кількість, кг<?if($t==1) echo $m[1] ?><?if($t==3) echo $m[4] ?></th>
                    <th>Ціна, грн/кг<?if($t==1) echo $m[1] ?><?if($t==3) echo $m[4] ?></th>
                    <th>Витрати всього, грн</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($date['date'] as $Remains){
                    $x=$x+$Remains["material_total_price"];
                    ?>
                        <tr>
                            <td><?php echo $Remains["name_action"]?></td>
                            <td><?php echo $Remains["material"]?></td>
                            <td><?php echo number_format($Remains["material_qty"], 2, ',', ' ') ?></td>
                            <td><?php echo number_format($Remains["area"], 2, ',', ' ')?></td>
                            <td><?php echo number_format($Remains["material_mass"], 2, ',', ' ')?></td>
                            <td><?php echo number_format($Remains["material_price"]/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                            <td><?php echo number_format($Remains["material_total_price"]/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                        </tr>
                <? } ?>
                <tr>

                    <td colspan="6"></td>
                    <td><?php echo $x?></td>
                </tr>
                <tr>
                    <td><button id="btnExport" class="btn btn-primary" >Експорт в XLS</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
