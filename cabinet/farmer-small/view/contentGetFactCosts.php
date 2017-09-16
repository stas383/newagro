<section class="content">
    <div class="box">
        <div class="box-header">

        </div>
        <div class="box-body">
            <form action="/farmer-small/save-fact" method="post">
                <div class="row">
                    <div class="col-lg-2">
                        <label for="data_fact"><?=$language['farmer-small']['64']?></label>
                        <input class="form-control" type="date" id="data_fact" name="data_fact" required>
                    </div>
                    <div class="col-lg-2">
                        <label for="crop_id"><?=$language['farmer-small']['65']?></label>
                        <select name="crop_id" id="crop_id" class="form-control" required>
                            <?php foreach ($date["crop"] as  $crop){ ?>
                                <option value="<?php echo $crop['id_analityca']?>"><?php echo $crop['name_crop_ua']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label for="stattie_id"><?=$language['farmer-small']['66']?></label>
                        <select name="stattie_id" id="stattie_id" class="form-control" required>
                            <?php if($_COOKIE['lang']=='ua'){ foreach ($date["stattie_name_ua"] as  $key=>$value)if($value!=false){ ?>
                                <option value="<?php echo $key?>"><?php echo $value?></option>
                            <?php }}
                            elseif ($_COOKIE['lang']=='gb') {
                                foreach ($date["stattie_name_en"] as  $key=>$value)if($value!=false){ ?>
                                <option value="<?php echo $key?>"><?php echo $value?></option>
                            <?}}?>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label for="name"><?=$language['farmer-small']['67']?></label>
                        <input class="form-control" type="text" id="name" name="name">
                    </div>
                    <div class="col-lg-1">
                        <label for="amount"><?=$language['farmer-small']['68']?></label>
                        <input class="form-control" type="text" id="amount" name="amount">
                    </div>
                    <div class="col-lg-1">
                        <label for="price_one"><?=$language['farmer-small']['69']?></label>
                        <input class="form-control" type="text" id="price_one" name="price_one">
                    </div>
                    <div class="col-lg-1">
                        <label for="price_total"><?=$language['farmer-small']['70']?></label>
                        <input class="form-control" type="text" id="price_total" name="price_total" required>
                    </div>
                    <div class="col-lg-1">
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
                                <th><?=$language['farmer-small']['67']?></th>
                                <th><?=$language['farmer-small']['68']?></th>
                                <th><?=$language['farmer-small']['69']?></th>
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
                                <td><?php if($_COOKIE['lang']=='ua'){echo $date['name_crop_ua'][$sm_fact['crop_id']];}elseif ($_COOKIE['lang']=='gb') {
                                    echo $date['name_crop_en'][$sm_fact['crop_id']];
                                } ?></td>
                                <td><?php if($_COOKIE['lang']=='ua'){ echo $date['stattie_name_ua'][$sm_fact['stattie_id']];} elseif($_COOKIE['lang']=='gb'){echo $date['stattie_name_en'][$sm_fact['stattie_id']];}?></td>
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

                                    <option value="<?php echo $crop['id_analityca']?>"><?php if($_COOKIE['lang']=='ua'){echo $crop['name_crop_ua'];}elseif($_COOKIE['lang']=='gb'){echo $crop['name_crop_en'];}?></option>
                                <?php }?>
                            </select>
                            <br>
                            <label for="s_stattie_id"><?=$language['farmer-small']['66']?></label>
                            <select name="s_stattie_id" id="s_stattie_id" class="form-control">
                                <option value="0"><?=$language['farmer-small']['66']?></option>
                                <?php if($_COOKIE['lang']=='ua'){ foreach ($date["stattie_name_ua"] as  $key=>$value)if($value!=false){ ?>
                                <option value="<?php echo $key?>"><?php echo $value?></option>
                            <?php }}
                            elseif ($_COOKIE['lang']=='gb') {
                                foreach ($date["stattie_name_en"] as  $key=>$value)if($value!=false){ ?>
                                <option value="<?php echo $key?>"><?php echo $value?></option>
                            <?}}?>
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
<script>
    $(document).ready(function () {
        $('#s_crop_id, #s_stattie_id, #month').change(filter);
        function filter() {
            var crop_id=$('#s_crop_id').val();
            var s_stattie_id=$('#s_stattie_id').val();
            var month=$('#month').val();

            $('.fact').show();
            if(crop_id!= 0){
                $('.bd tr:not(.crop_'+crop_id+')').hide();
            }
            if(s_stattie_id!= 0){
                $('.bd tr:not(.stattie_'+s_stattie_id+')').hide();
            }
            if(month!= 0){
                $('.bd tr:not(.month_'+month+')').hide();
            }
        }
        $('#amount, #price_one').keyup(total);
        function total() {
            var amount=parseFloat($('#amount').val());
            var price_one=parseFloat($('#price_one').val());
            if(isNaN(amount)) amount=0;
            if(isNaN(price_one)) price_one=0;
            var toatl=amount*price_one;
            $('#price_total').val(toatl);
        }

        $('.edit_fact').click(edit_fact);
        function edit_fact() {
            var id = $(this).attr('data-id1');
            var date=$(this).attr('data-date');
            var crop_id=$(this).attr('data-id');
            var stattie_id=$(this).attr('data-stattia');
            var name=$(this).attr('data-name_mat');
            var amount_material=$(this).attr('data-amount');
            var price1 =$(this).attr('data-price1');
            var price =$(this).attr('data-price');
            $('#edit_fact_id').val(id);
            $('#edit_data_fact').val(date);
            $('#edit_crop_id').val(crop_id);
            $('#edit_stattie_id').val(stattie_id);
            $('#edit_name_material').val(name);
            $('#edit_amount_material').val(amount_material);
            $('#edit_price_one').val(price1);
            $('#edit_price_total').val(price);
        }

        $('.classFact').click(save_fact);
        function save_fact(){
            var id = $('#edit_fact_id').val();
           var date_fact =  $('#edit_data_fact').val();
           var crop_id =  $('#edit_crop_id').val();
           var stattie_id =  $('#edit_stattie_id').val();
           var name =  $('#edit_name_material').val();
           var amount =  $('#edit_amount_material').val();
           var price_once =  $('#edit_price_one').val();
           var price =  $('#edit_price_total').val();
            $.ajax({
                type : 'post',
                url : '/farmer-small/edit-fact-list',
                data : {
                    'id': id,
                    'date_fact' :  date_fact,
                    'crop_id' : crop_id,
                    'stattie_id' : stattie_id,
                    'name' : name,
                    'amount' : amount,
                    'price_once' : price_once,
                    'price' : price
                },
                response : 'text',
                success : function() {
                    $('#material').modal('hide');
                }

            });
        }
    });
</script>