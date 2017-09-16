<section class="content ">
    <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <div class="nav-tabs-custom box">
                <div class="box-header">
                    <h3 class="box-title">Форма №50-сг (<?php echo $date["year"]?>)</h3>
                </div>
                <div class="tab-content">
                    <!-- /.tab-pane -->
                    <div class="active tab-pane">
                        <table class="table table-bordered text-center">
                            <tbody>
                            <caption class="text-center"><h4>Основні економічні показники роботи сг підприємств</h4></caption>
                            <tr>
                                <th>Культура</th>
                                <th>Код</th>
                                <th colspan="3">Виробництво продукції</th>
                                <th colspan="4">Реалізація продукції (робіт, послуг)</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>зібрана площа / площа насаджень у плодоносному віці, га</th>
                                <th>вироблено продукції, ц</th>
                                <th>виробнича собівартість, тис. грн.</th>
                                <th>у фізичній масі, ц</th>
                                <th>виробнича собівартість, тис. грн.</th>
                                <th>повна собівартість, тис. грн.</th>
                                <th>чистий дохід (виручка) від реалізації, тис. грн.</th>
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
                                    <th>Всього</th>
                                    <th>0010</th>
                                    <?php for ($x=1; $x<=7; $x++) { ?>
                                        <th><input disabled class="form-control classEdit" type="text" pattern="[-+]?[0-9]*\.?,?[0-9]*"  name="f0<?php echo $x?>"
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
                                                <th><input disabled class="form-control classEdit" type="text"
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
</section>
