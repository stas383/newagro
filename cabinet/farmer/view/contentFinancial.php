<?php
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
            });
        }
    });
</script>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?php echo $language['farmer']['43'];?></h3>
            <div class="box-tools">
                <div class="btn-group">
                    <? for ($x=1; $x<=(ceil (($date['date-1']["crop_coll"]+$date['date-2']["crop_coll"])/$page)); $x++){ ?>
                        <button type="button" data-num="<?php echo $x?>" class="open_page btn btn-default"><?php echo $x?></button>
                    <?php }?>
                </div>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table">
                <thead >
                <tr>
                    <th><?php echo $language['farmer']['9'];?></th>
                    <?php
                    $class=0;
                    for ($t=1; $t<=3; $t++){
                    for ($x=1; $x<=$date['date-'.$t]["crop_coll"]; $x++){
                        $class++;?>
                        <th class="crop_date pr<?php echo ceil ($class/$page); ?>"><? echo $date['date-'.$t]['name'][$x]?></th>
                    <? }} ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($date["table2"] as $Ex_name){ ?>
                    <tr>
                        <td><?if($_COOKIE['lang']=='gb'){echo $Ex_name['name_en'];} else{echo $Ex_name['name_ua'];} ?></td>
                        <?php
                        $class=0;
                        for ($t=1; $t<=3; $t++){
                        for ($x=1; $x<=$date['date-'.$t]["crop_coll"]; $x++){
                            $class++;?>
                            <td class="crop_date pr<?php echo ceil ($class/$page); ?>"><? echo number_format($date['date-'.$t]['remains'][$date['date-'.$t]['crop'][$x]."-".$t][$Ex_name['name_php']], 0, '.', ' ')?></td>
                        <? }} ?>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</section>
