
<section class="content ">
    <form action="/farmer/save-form50" method="post">
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <div class="nav-tabs-custom box">
                <div class="box-header">
                    <h3 class="box-title"><?=$language['farmer']['68']?>(<?php echo $date["year"]?>)</h3>
                    <div class="box-tools">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><button type="submit" class="btn btn-success"><?=$language['farmer']['15']?></button></li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <!-- /.tab-pane -->
                    <div class="active tab-pane">
                        <table class="table table-bordered text-center">
                            <tbody>
                            <caption class="text-center"><h4><?=$language['farmer']['69']?></h4></caption>
                            <tr>
                                <th><?=$language['farmer']['70']?></th>
                                <th><?=$language['farmer']['71']?></th>
                                <th colspan="3"><?=$language['farmer']['72']?></th>
                                <th colspan="4"><?=$language['farmer']['73']?></th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th><?=$language['farmer']['74']?></th>
                                <th><?=$language['farmer']['75']?></th>
                                <th><?=$language['farmer']['76']?></th>
                                <th><?=$language['farmer']['78']?></th>
                                <th><?=$language['farmer']['79']?></th>
                                <th><?=$language['farmer']['80']?></th>
                                <th><?=$language['farmer']['81']?></th>
                            </tr>
                            <tr>
                                <th>А</th>
                                <th>Б</th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                                <th>6</th>
                                <th>7</th>
                            </tr>

                                <input type="hidden" name="year" value="<?php echo $date["year"]?>">
                                <tr>
                                    <th><?=$language['farmer']['10']?></th>
                                    <th>0010</th>
                                    <?php for ($x=1; $x<=7; $x++) { ?>
                                        <th><input class="form-control classEdit" type="text" pattern="[-+]?[0-9]*\.?,?[0-9]*"  name="f0<?php echo $x?>"
                                                   value="<?php foreach ($date["form"] as $form)if($form["crop"]==0) echo $form["f".$x];?>"></th>
                                        <?php
                                    }
                                    ?>
                                </tr>
                                <?php
                                for($r=1;$r<=2;$r++) {
                                    foreach ($date["crop"][$r] as $crop) {
                                        ?>
                                        <tr>
                                            <th><?php echo $crop["name_crop_ua"] ?></th>
                                            <th><?php echo $crop["crop_id"] ?>-<?php echo $r ?></th>
                                            <?php
                                            for ($x = 1; $x <= 7; $x++) { ?>
                                                <th><input class="form-control classEdit" type="text"
                                                           pattern="[-+]?[0-9]*\.?,?[0-9]*"
                                                           name="f<?php echo $crop["crop_id"]."-".$r."-".$x ?>"
                                                           value="<?php foreach ($date["form"] as $form) if ($form["crop"] == $crop["crop_id"]."-".$r) echo $form["f" . $x]; ?>">
                                                </th>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                    <?php }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.tab-pane -->

                    <div class=" tab-pane" id="2015">
                        2015
                    </div>
                    <div class=" tab-pane" id="2016">
                        2016
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
    </div>
    </form>
</section>
