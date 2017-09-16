<section class="content">
<div class="box">
    <div class="box-header">
        <h3 class="box-title">
         <?if($_COOKIE['lang']=='ua'){echo 'Факт/'.$date['stattie_name_ua'].'/ '.$date['name_crop_ua'];} elseif($_COOKIE['lang']=='gb'){echo 'Actual data/'.$date['stattie_name_en'].'/ '.$date['name_crop_en'];}?>
        </h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-lg-12   ">
                <table class="table">
                    <thead>
                        <tr>
                            <th><?=$language['farmer-small']['64']?></th>
                            <th><?=$language['farmer-small']['67']?></th>
                            <th><?=$language['farmer-small']['68']?></th>
                            <th><?=$language['farmer-small']['69']?></th>
                            <th><?=$language['farmer-small']['70']?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($date['sm_fact'] as $sm_fact){?>
                        <tr>
                            <td><?php echo $sm_fact['data_fact'] ?></td>
                            <td><?php echo $sm_fact['name'] ?></td>
                            <td><?php echo $sm_fact['amount'] ?></td>
                            <td><?php echo $sm_fact['price_one'] ?></td>
                            <td><?php echo $sm_fact['price_total'] ?></td>
                        </tr>
                    <?php $summ+=$sm_fact['price_total'];} ?>
                        <tr>
                            <td colspan="4"></td>
                            <td><?php echo $summ ?></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</section>