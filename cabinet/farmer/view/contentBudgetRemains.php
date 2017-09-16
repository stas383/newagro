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
                    <th><?=$language['farmer']['220']?></th>
                    <th><?=$language['farmer']['28']?></th>
                    <th><?=$language['farmer']['247']?><?if($t==1) echo $m[1] ?>/га<?if($t==3) echo $m[3] ?></th>
                    <th><?=$language['farmer']['125']?></th>
                    <th><?=$language['farmer']['248']?><?if($t==1) echo $m[1] ?><?if($t==3) echo $m[4] ?></th>
                    <th><?=$language['farmer']['23']?><?if($t==1) echo $m[1] ?><?if($t==3) echo $m[4] ?></th>
                    <th><?=$language['farmer']['249']?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $name='';
                foreach ($date['date'] as $Remains){
                    $x=$x+$Remains["material_total_price"]; ?>
                        <tr>
                            <td><?php if($Remains["name_action"]!=$name) echo $Remains["name_action"]?></td>
                            <td><?php echo $Remains["material"]?></td>
                            <td><?php echo number_format($Remains["material_qty"], 2, ',', ' ') ?></td>
                            <td><?php echo number_format($Remains["area"], 2, ',', ' ')?></td>
                            <td><?php echo number_format($Remains["material_mass"], 2, ',', ' ')?></td>
                            <td><?php echo number_format($Remains["material_price"]/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                            <td><?php echo number_format($Remains["material_total_price"]/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                        </tr>
                <? $name=$Remains["name_action"];
                } ?>
                <tr>
                    <td colspan="6"><?if($_COOKIE['lang']=='ua'){echo "Всього";}elseif($_COOKIE['lang']=='gb'){echo "Total";}?></td>
                    <td><?php echo number_format($x/$_COOKIE['currency_val'], 2, ',', ' ')?></td>
                </tr>
                <tr>
                    <td><button id="btnExport" class="btn btn-primary" ><?=$language['farmer']['11']?></button></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
