<div class="box-body">
    <div class="responsive">
        <h3 style="float: left;">
           <?=$language['farmer-small']['119']?>
        </h3>
        <a class="btn btn-success" href="<?php SRC::getSrc();?>/farmer-small/budget-crop" style="float: right;"><?=$language['farmer-small']['122']?></a>
        <table class="table table-striped well">
            <thead>
                <tr>
                   <th><?=$language['farmer-small']['82']?></th>
                   <th><?=$language['farmer-small']['120']?></th>
                </tr>
            </thead>
            <tbody>
                <? foreach ($date['plan']['remains'] as $services){?>
                    <tr>
                        <td><?if($_COOKIE['lang']=='ua'){echo $services['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $services['name_en'];}?></td>
                        <td><?=$services['price']?></td>
                    </tr>
                <?}?>
            </tbody>
        </table>
    </div>
</div>