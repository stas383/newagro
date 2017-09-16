
<div class="box-body">
    <div class="responsive">
        <div>
        <h3 style="float: left;">
            <? if($_COOKIE['lang']=='ua'){echo $date['table_name_ua'];} elseif($_COOKIE['lang']=='gb'){ echo $date['table_name_en'];}?>
        </h3>
        <a class="btn btn-success" href="<?php SRC::getSrc();?>/farmer-small/budget-crop" style="float: right;"><?=$language['farmer-small']['122']?></a>
        </div>
        <table class="table table-striped well">
            <thead>
                <tr>
                    <?if($_COOKIE['lang']=='ua'){foreach ($date['table_head_ua'] as $head){?>
                        <th><?=$head;?></th>
                    <?}}
                    elseif($_COOKIE['lang']=='gb'){foreach ($date['table_head_en'] as $head){?>
                        <th><?=$head;?></th>
                    <?}}?>
                </tr>
            </thead>
            <tbody>
                    <? foreach ($date['plan']['remains'][$date['type_material']] as $plan){?>
                        <tr>
                            <td><?=$plan['name']?></td>
                            <td><?=number_format($plan['area'], 0,'.',' ')?></td>
                            <td><?=number_format($plan['norm'], 0,'.',' ')?></td>
                            <td><?=number_format($plan['price'], 0,'.',' ')?></td>
                            <td><?=number_format($plan['total'], 0,'.',' ')?></td>
                        </tr>
                    <?}?>
            </tbody>
        </table>
    </div>
</div>