<?
$name[1]='market';
$name[2]='intermediaries_resellers';
$name[3]='other_channels';
$name2[1]='на ринку';
$name2[2]='посередникам-перекупникам';
$name2[3]='за іншими каналами';


?>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h4><?=$language['farmer-small']['115']?></h4>
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                <tr>
                    <th><?=$language['farmer-small']['116']?></th>
                    <th><?=$language['farmer-small']['117']?></th>
                    <th><?=$language['farmer-small']['50']?></th>
                    <th><?=$language['farmer-small']['118']?></th>
                </tr>
                </thead>
                <tbody>
                    <?php for($x=1;$x<=3;$x++){ ?>
                        <tr>
                            <th><?php if($_COOKIE['lang']=='ua'){echo $name2[$x];}elseif($_COOKIE['lang']=='gb'){echo $name[$x];}?></th>
                           <? foreach($date['plan']['remains'][$name[$x]] as $key=>$item){?>
                                <th><?php echo number_format($item, 0, '.', ' ') ?></th>
                            <?php } ?>
                        </tr>
                    <?}?>
                </tbody>
            </table>

        </div>
    </div>
</section>