<!--<pre>-->
<?php //var_dump($date['dateSeed'][0]['id_crop']); ?>
<section class="content">
    <form class="form-horizontal" action="/distributor/save-ppa" method="post">
        <div class="row">
            <!-- left column -->
            <div class="col-md-9">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Редагування засобів захисту рослин</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">


                        <div class="form-group">
                            <label for="id_crop" class="col-sm-4 control-label">Культура*</label>

                            <div class="col-sm-5">
                                <select class="form-control select2" id="id_crop" name="id_crop" style="width: 100%;">
                                    <?php foreach ($date['crop'] as $key) {?>
                                        <option <?php if($key['id_crop'] == $date['dateSeed'][0]['id_crop']) echo 'selected';?> value="<?php echo $key['id_crop'];?>"><?php echo $key['name_crop_ua'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fabricator" class="col-sm-4 control-label">Виробник*</label>

                            <div class="col-sm-5">
                                <input class="form-control select2" name="fabricator" list="fabricator" value="<?php echo $date['dateSeed'][0]['name'];?>" required>
                                <datalist   id="fabricator">
                                    <?php foreach ($date['fabricator'] as $key) {?>
                                        <option <?php //if($key['id_crop'] == '9') echo 'selected';?> value="<?php echo $key['name'];?>"></option>
                                    <?php }?>
                                </datalist >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="material_name" class="col-sm-4 control-label">Назва*</label>

                            <div class="col-sm-5">
                                <input type="text" name="material_name" class="form-control" id="material_name" placeholder="Назва" value="<?php echo $date['dateSeed'][0]['material_name'];?>" required>
                                <input type="hidden" name="id_material" value="<?php echo $date['dateSeed'][0]['id_material'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="material_subtype" class="col-sm-4 control-label">Вид*</label>

                            <div class="col-sm-5">
                                <select class="form-control select2" id="material_subtype" name="material_subtype" style="width: 100%;">
                                    <?php foreach ($date['subtype'] as $key) {?>
                                        <option <?php if($key['id_subtype'] == $date['dateSeed'][0]['material_subtype']) echo 'selected';?> value="<?php echo $key['id_subtype'];?>"><?php echo $key['name_subtype_ua'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>

                        <span style="display: none;" class="vis1">

                    <div class="form-group">
                        <label for="material_qty" class="col-sm-4 control-label ">Рекомендована норма висіву кг,л/га*</label>

                        <div class="col-sm-5">
                            <input type="text" name="material_qty" class="form-control " id="material_qty" placeholder="Норма висіву" value="<?php echo $date['dateSeed'][0]['material_qty'];?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="material_price" class="col-sm-4 control-label ">Ціна з ПДВ, грн/кг,л</label>

                        <div class="col-sm-5">
                            <input type="text" name="material_price" class="form-control price math " id="material_price" placeholder="Ціна" value="<?php echo $date['dateSeed'][0]['material_price'];?>" required>
                        </div>
                    </div>
                     </span>

                        <div class="form-group">
                            <label for="company_name" class="col-sm-4 control-label">Мітки</label>

                            <div class="col-sm-5">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="new"" <?php if($date['dateSeed'][0]['new'] == 1) echo 'checked';?> > Новий товар (new)
                                    </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <label>
                                        <input type="checkbox" name="material_exclusive" <?php if($date['dateSeed'][0]['material_exclusive'] == 1) echo 'checked';?>> Ексклюзивно
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-12 text-center"><strong>Умови оплати (<span style="color: #00c0ef; cursor: pointer;" id="up">докладніше</span>)</strong><br><br></div>
                        <span style="display: none;" id="visUp">
                        <div class="form-group">
                            <label class="col-sm-4 control-label ">Грошові кошти</label>
                            <label id="price_cash" class="col-sm-5 control-label" style="text-align: left; ;"> </label>
                        </div>

                        <div class="form-group">
                            <label   class="col-sm-4 control-label ">Товарний кредит (<span style="color: #00c0ef; cursor: pointer;" id="bt">докладніше</span>)</label>
                            <div class="col-sm-5">

                            </div>
                        </div>

                        <span style="display: none;" id="visBt">
                            <div class="form-group">
                            <label for="discount" class="col-sm-4 control-label ">Знижка, %</label>
                            <div class="col-sm-5">
                                <input type="text" name="discount" class="form-control math" id="discount" placeholder="Знижка" value="<?php echo $date['dateSeed'][0]['discount'];?>">
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="time_term" class="col-sm-4 control-label ">Термін відстрочки, місяців</label>
                            <div class="col-sm-5">
                                <input type="text" name="time_term" class="form-control math" id="time_term" placeholder="Термін відстрочки" value="<?php echo $date['dateSeed'][0]['time_term'];?>">
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="price_two" class="col-sm-4 control-label ">Ціна (з урахуванням товарного кредиту)</label>
                            <div class="col-sm-5">
                                <input type="text" name="price_two" class="form-control math" id="price_two" placeholder="Ціна" value="<?php echo $date['dateSeed'][0]['price_two'];?>">
                            </div>
                        </div>
                        </span>
                        <div class="form-group">
                            <label   class="col-sm-4 control-label ">Аграрна розписка товарна (<span style="color: #00c0ef; cursor: pointer;" >докладніше</span>)</label>
                            <div class="col-sm-5">

                            </div>
                        </div>

                        <div class="form-group">
                            <label   class="col-sm-4 control-label ">Аграрна розписка фінансова (<span style="color: #00c0ef; cursor: pointer;">докладніше</span>)</label>
                            <div class="col-sm-5">

                            </div>
                        </div>

                        <div class="form-group">
                            <label   class="col-sm-4 control-label ">Вексель (<span style="color: #00c0ef; cursor: pointer;" >докладніше</span>)</label>
                            <div class="col-sm-5">

                            </div>
                        </div>
                    </span>
                        <div class="form-group">
                            <label for="description" class="col-sm-4 control-label ">Додаткові характеристики/ посилання на продукт</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="description" rows="4" name="description" placeholder="Введіть опис товару"><?php echo $date['dateSeed'][0]['description'];?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-6">
                                <button type="submit" class="btn btn-success">Зберегти</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</section>

<script>
    $(document).ready(function() {
        $(".vis1").show();

        $(".cg").click(open);
        function open(){
            var val=$(this).val();
            if(val == 11){
                $(".vis1").show();
                $(".vis2").hide();
            }
            if(val == 12){
                $(".vis2").show();
                $(".vis1").hide();
            }

        }

        $("#up").click(openUp);
        function openUp(){
            $("#visUp").toggle();
        }

        $("#bt").click(openBt);
        function openBt(){
            $("#visBt").toggle();
        }



        $(".math").keyup(math);

        function math() {
            var price_out, price_out2;
            var price =  $("input[name=material_price]").val();
            var discount =  $("input[name=discount]").val();
            var time_term =  $("input[name=time_term]").val();

            price_out = (parseFloat(discount)*12)/parseFloat(time_term);
            price_out2 = parseFloat(price)  + (parseFloat(price) *(parseFloat(price_out)/100));

            if(parseFloat(price_out2) == Infinity || isNaN(parseFloat(price_out2)))
            {
                $("#price_two").val("0");
            }else {
                $("#price_two").val(parseFloat(price_out2));
            }

        }

        $(".price").keyup(price);
        function price() {
            var price =  $("input[name=material_price]").val();
            $("#price_cash").text(price);
        }

        $(".po").keyup(mathPo);

        function mathPo() {
            var price_out, x ,norm;
            var save_rec_qty =  $("input[name=save_rec_qty]").val();
            var save_1po_seeds =  $("input[name=save_1po_seeds]").val();
            var save_m_1000 =  $("input[name=save_m_1000]").val();
            var save_price_pdv =  $("input[name=save_price_pdv]").val();

            x = (save_1po_seeds * save_m_1000)/1000000;
            norm = x * save_rec_qty*1000;
            price_out = (save_1po_seeds / x) / 1000;

            $("#material_price").val(price_out);
            $("#price_cash").text(price_out);
            $("#material_qty").val(norm);
        }
//        $("#price_cash").text('111');
    });
</script>



