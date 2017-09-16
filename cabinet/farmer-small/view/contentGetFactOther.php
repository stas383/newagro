
<section class="content">
    <div class="box">
        <div class="box-header">

        </div>
        <div class="box-body">
            <form action="/farmer-small/save-other-fact" method="post">
                <div class="row">
                    <div class="col-lg-2">
                        <label for="data_fact"><?=$language['farmer-small']['64']?></label>
                        <input class="form-control" type="date" id="data_fact" name="data_fact" required>
                    </div>
                    <div class="col-lg-2">
                        <label for="crop_id"><?=$language['farmer-small']['65']?></label>
                        <select name="crop_id" id="crop_id" class="form-control" required>
                            <?php foreach ($date["crop"] as  $crop){ ?>
                                <option value="<?php echo $crop['id']?>"><?php if($_COOKIE['lang']=='ua'){echo $crop['name_crop_ua'];} elseif($_COOKIE['lang']=='gb'){echo $crop['name_crop_en'];}?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label for="stattie_id"><?=$language['farmer-small']['66']?></label>
                        <select name="stattie_id" id="stattie_id" class="form-control" required>
                            <?php if($_COOKIE['lang']=='ua'){foreach ($date["stattie_name_ua"] as  $key=>$value)if($value!=false){ ?>
                                <option value="<?php echo $key?>"><?php echo $value?></option>
                            <?php }}?>
                            <?php if($_COOKIE['lang']=='gb'){foreach ($date["stattie_name_en"] as  $key=>$value)if($value!=false){ ?>
                                <option value="<?php echo $key?>"><?php echo $value?></option>
                            <?php }}?>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label for="price_total"><?=$language['farmer-small']['70']?></label>
                        <input class="form-control" type="text" id="price_total" name="price_total" required>
                    </div>
                    <div class="col-lg-2">
                        <br>
                        <input type="submit" class="btn btn-block btn-success" id="sumbit" value="<?=$language['farmer-small']['60']?>">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-lg-10">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?=$language['farmer-small']['64']?></th>
                                <th><?=$language['farmer-small']['65']?></th>
                                <th><?=$language['farmer-small']['66']?></th>
                                <th><?=$language['farmer-small']['70']?></th>
                            </tr>
                        </thead>
                        <tbody class="bd">
                            <?php foreach ($date['sm_fact'] as $sm_fact){
                                $date_elements  = explode("-",$sm_fact['data_fact']);
                                $month=$date_elements[1]+0;
                                ?>
                            <tr class="fact <?php echo 'crop_'.$sm_fact['crop_id'].' stattie_'.$sm_fact['stattie_id'].' month_'.$month?>">
                                <td><?php echo $sm_fact['data_fact'] ?></td>
                                <td><?php echo $date['name_crop'][$sm_fact['crop_id']] ?></td>
                                <td><?php echo $date['stattie_name'][$sm_fact['stattie_id']] ?></td>
                                <td><?php echo $sm_fact['name'] ?></td>
                                <td><?php echo $sm_fact['amount'] ?></td>
                                <td><?php echo $sm_fact['price_one'] ?></td>
                                <td><?php echo $sm_fact['price_total'] ?></td>
                                <td><a class="btn btn-warning btn-sm edit_fact" 
                                    data-id1 = "<? echo $sm_fact['id'];?>" 
                                    data-id = "<? echo $sm_fact['crop_id'];?>"
                                    data-date = "<?php echo $sm_fact['data_fact'] ?>"
                                    data-name = "<?php echo $date['name_crop'][$sm_fact['crop_id']] ?>"
                                    data-stattia = "<?php echo $sm_fact['stattie_id']?>"
                                    data-name_mat = "<?php echo $sm_fact['name'] ?>"
                                    data-amount = "<?php echo $sm_fact['amount'] ?>"
                                    data-price1 = "<?php echo $sm_fact['price_one'] ?>"
                                    data-price = "<?php echo $sm_fact['price_total'] ?>"
                                    data-toggle="modal" data-target="#material">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-2">
                    <div class="box">
                        <div class="box-body">
                            <label for="s_crop_id"><?=$language['farmer-small']['65']?></label>
                            <select name="s_crop_id" id="s_crop_id" class="form-control">
                                <option value="0"><?=$language['farmer-small']['65']?></option>
                                <?php foreach ($date["crop"] as  $crop){ ?>

                                    <option value="<?php echo $crop['id']?>"><?php echo $crop['name_crop_ua']?></option>
                                <?php }?>
                            </select>
                            <br>
                            <label for="s_stattie_id"><?=$language['farmer-small']['66']?></label>
                            <select name="s_stattie_id" id="s_stattie_id" class="form-control">
                                <option value="0"><?=$language['farmer-small']['66']?></option>
                                <?php foreach ($date["stattie_name"] as  $key=>$value)if($value!=false){ ?>

                                    <option value="<?php echo $key?>"><?php echo $value?></option>
                                <?php }?>
                            </select>
                            <br>
                            <label for="month"><?=$language['farmer-small']['47']?></label>
                            <select name="month" id="month" class="form-control">
                                <option value="0"><?=$language['farmer-small']['47']?></option>
                                <?php for ($x=1;$x<=12;$x++){ ?>
                                    <option ><?php echo $x?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

   <div class="modal fade  bs-example-modal-lg" id="material" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?=$language['farmer-small']['114']?></h4>
            </div>
            <div class="modal-body">
                <form method="post" id="edit_fact_form" action="javascript:void(null);">
                    <div class="row">
                        <div class="col-lg-5">
                        <label for="data_fact"><?=$language['farmer-small']['64']?></label>
                        <input class="form-control classEditFact" type="date" id="edit_data_fact" name="data_fact" required>
                        <input type="hidden" name="id" id="edit_fact_id">
                        </div>
                    <div class="col-lg-5">
                        <label for="crop_id"><?=$language['farmer-small']['65']?></label>
                        <select name="crop_id" id="edit_crop_id" class="form-control classEditFact" required>
                            <?php foreach ($date["crop"] as  $crop){ ?>
                                <option value="<?php echo $crop['id']?>"><?php echo $crop['name_crop_ua']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-lg-5">
                        <label for="stattie_id"><?=$language['farmer-small']['66']?></label>
                        <select name="stattie_id" id="edit_stattie_id" class="form-control classEditFact" required>
                            <?php foreach ($date["stattie_name"] as  $key=>$value)if($value!=false){ ?>
                                <option value="<?php echo $key?>"><?php echo $value?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-lg-5">
                        <label for="name"><?=$language['farmer-small']['67']?></label>
                        <input class="form-control classEditFact" type="text" id="edit_name_material" name="name">
                    </div>
                    <div class="col-lg-3">
                        <label for="amount"><?=$language['farmer-small']['68']?></label>
                        <input class="form-control classEditFact" type="text" id="edit_amount_material" name="amount">
                    </div>
                    <div class="col-lg-3">
                        <label for="price_one"><?=$language['farmer-small']['69']?></label>
                        <input class="form-control classEditFact" type="text" id="edit_price_one" name="price_one">
                    </div>
                    <div class="col-lg-3">
                        <label for="price_total"><?=$language['farmer-small']['70']?></label>
                        <input class="form-control classEditFact" type="text" id="edit_price_total" name="price_total" required>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary classFact"><?=$language['farmer-small']['52']?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>