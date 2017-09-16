<div class="box-body">
    <div class="responsive">
        <h3 style="float: left;">
           <?=$language['farmer-small']['121']?>
        </h3>
         <a class="btn btn-success" href="<?php SRC::getSrc();?>/farmer-small/budget-crop" style="float: right;"><?=$language['farmer-small']['122']?></a>
        <table class="table table-striped well">
            <thead>
            <tr>
                <th > <?=$language['farmer-small']['82']?></th>
                <th colspan="2"> <?=$language['farmer-small']['120']?></th>
            </tr>
            <tr>
                <th></th>
                <th> <?=$language['farmer-small']['88']?></th>
                <th> <?=$language['farmer-small']['87']?></th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($date['plan']['remains'] as $wedding){?>
                <tr>
                    <td><?if($_COOKIE['lang']=='ua'){echo $wedding['name_ua'];}elseif($_COOKIE['lang']=='gb'){echo $wedding['name_en'];}?></td>
                    <td><?=$wedding['price_1']?></td>
                    <td><?=$wedding['price_2']?></td>
                </tr>
            <?}?>
            </tbody>
        </table>
    </div>
</div>