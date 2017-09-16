<section class="content">
    <div class="box">

            <div class="box-header with-border">
			<h3 class="box-title"><?=$language['farmer-small']['71']?></h3>
            </div>

        <div class="box-body">
            <form action="/farmer-small/save-revenues-fact" method="post">
                <div class="row">
                    <div class="col-lg-2">
                        <label for="data_fact"><?=$language['farmer-small']['64']?></label>
                        <input class="form-control" type="date" id="data_fact_revenues" name="data_fact_revenues" required>
                    </div>
                    <div class="col-lg-2">
                        <label for="crop_id"><?=$language['farmer-small']['65']?></label>
                        <select name="crop_id" id="crop_id" class="form-control" required>
                            <?php foreach ($date["crop"] as  $crop){ ?>
                                <option value="<?php echo $crop['id_analityca']?>"><?php if($_COOKIE['lang']=='ua'){echo $crop['name_crop_ua'];}elseif($_COOKIE['lang']=='gb'){echo $crop['name_crop_en'];}?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label for="stattie_id"><?=$language['farmer-small']['72']?></label>
                        <select name="sales_channel" id="sales_channel" class="form-control" required>
                            <?php if($_COOKIE['lang']=='ua'){foreach ($date["sales_channel_ua"] as  $key=>$value)if($value!=false){ ?>
                                <option value="<?php echo $key?>"><?php echo $value?></option>
                            <?php }}
                                elseif ($_COOKIE['lang']=='gb') {
                                    foreach ($date["sales_channel_en"] as  $key=>$value)if($value!=false){ ?>
                                <option value="<?php echo $key?>"><?php echo $value?></option>
                                <?}}
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label for="name"><?=$language['farmer-small']['68']?></label>
                        <input class="form-control" type="text" id="amount" name="amount">
                    </div>
                    <div class="col-lg-2">
                        <label for="amount"><?=$language['farmer-small']['70']?></label>
                        <input class="form-control" type="text" id="price_total" name="price_total">
                    </div>
                    <div class="col-lg-1">
                        <label for="price_total"><?=$language['farmer-small']['73']?></label>
                        <input class="form-control" type="text" id="price_avr" name="price_avr" required>
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
                                <th><?=$language['farmer-small']['72']?></th>
                                <th><?=$language['farmer-small']['68']?></th>
                                <th><?=$language['farmer-small']['70']?></th>
                                <th><?=$language['farmer-small']['73']?></th>
                            </tr>
                        </thead>
                        <tbody class="bd">
                            <?php foreach ($date['sm_fact_revenues'] as $sm_fact){
                                $date_elements  = explode("-",$sm_fact['date']);
                                $month=$date_elements[1]+0;
                                ?>
                            <tr class="fact <?php echo 'crop_'.$sm_fact['crop_id'].' stattie_'.$sm_fact['sales_channel'].' month_'.$month?>">
                                <td><?php echo $sm_fact['data_fact'] ?></td>
                                <td><?php if($_COOKIE['lang']=='ua'){echo $date['name_crop_ua'][$sm_fact['crop_id']];}elseif($_COOKIE['lang']=='gb'){echo $date['name_crop_en'][$sm_fact['crop_id']];} ?></td>
                                <td><?php if($_COOKIE['lang']=='ua'){echo $date['sales_channel_ua'][$sm_fact['sales_channel']];}elseif ($_COOKIE['lang']=='gb') {
                                    echo $date['sales_channel_en'][$sm_fact['sales_channel']];
                                } ?></td>
                                <td><?php echo $sm_fact['amount'] ?></td>
                                <td><?php echo $sm_fact['price_total'] ?></td>
                                <td><?php echo $sm_fact['price_avr'] ?></td>
                                <td><a class="btn btn-warning btn-sm edit_fact_revenues" 
                                    data-id1 = "<? echo $sm_fact['id'];?>" 
                                    data-id = "<? echo $sm_fact['crop_id'];?>"
                                    data-date = "<?php echo $sm_fact['data_fact'] ?>"
                                    data-name = "<?php echo $date['name_crop'][$sm_fact['crop_id']] ?>"
                                    data-sales_channel = "<?php echo $sm_fact['sales_channel']?>"
                                    data-amount = "<?php echo $sm_fact['amount'] ?>"
                                    data-price_total = "<?php echo $sm_fact['price_total'] ?>"
                                    data-price_avr = "<?php echo $sm_fact['price_avr'] ?>"
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
                            <label for="s_stattie_id"><?=$language['farmer-small']['72']?></label>
                            <select name="s_stattie_id" id="s_stattie_id" class="form-control">
                                <?php if($_COOKIE['lang']=='ua'){foreach ($date["sales_channel_ua"] as  $key=>$value)if($value!=false){ ?>
                                <option value="<?php echo $key?>"><?php echo $value?></option>
                            <?php }}
                                elseif ($_COOKIE['lang']=='gb') {
                                    foreach ($date["sales_channel_en"] as  $key=>$value)if($value!=false){ ?>
                                <option value="<?php echo $key?>"><?php echo $value?></option>
                                <?}}
                            ?>
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
                <h4 class="modal-title"><?=$language['farmer-small']['74']?></h4>
            </div>
            <div class="modal-body">
                <form method="post" id="edit_fact_form" action="javascript:void(null);">
                    <div class="row">
                        <div class="col-lg-12">
                        <label for="data_fact"><?=$language['farmer-small']['64']?></label>
                        <input class="form-control classEditFact" type="date" id="edit_data_fact" name="data_fact" required>
                        <input type="hidden" name="id" id="edit_fact_id">
                        </div>
                    <div class="col-lg-12">
                        <label for="crop_id"><?=$language['farmer-small']['65']?></label>
                        <select name="crop_id" id="edit_crop_id" class="form-control classEditFact" required>
                            <?php foreach ($date["crop"] as  $crop){ ?>
                                <option value="<?php echo $crop['id']?>"><?php if($_COOKIE['lang']=='ua'){echo $crop['name_crop_ua'];}elseif($_COOKIE['lang']=='gb'){echo $crop['name_crop_en'];}?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-lg-12">
                        <label for="stattie_id"><?=$language['farmer-small']['72']?></label>
                        <select name="sales_channel" id="edit_sales_channel" class="form-control classEditFact" required>
                            <?php if($_COOKIE['lang']=='ua'){foreach ($date["sales_channel_ua"] as  $key=>$value)if($value!=false){ ?>
                                <option value="<?php echo $key?>"><?php echo $value?></option>
                            <?php }}
                                elseif ($_COOKIE['lang']=='gb') {
                                    foreach ($date["sales_channel_en"] as  $key=>$value)if($value!=false){ ?>
                                <option value="<?php echo $key?>"><?php echo $value?></option>
                                <?}}
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-12">
                        <label for="amount"><?=$language['farmer-small']['68']?></label>
                        <input class="form-control classEditFactRevenues" type="text" id="edit_amount" name="amount">
                    </div>
                    <div class="col-lg-12">
                        <label for="price_total"><?=$language['farmer-small']['70']?></label>
                        <input class="form-control classEditFactRevenues" type="text" id="edit_price_total" name="price_total" required>
                    </div>
                    <div class="col-lg-12">
                        <label for="price_one"><?=$language['farmer-small']['73']?></label>
                        <input class="form-control classEditFactRevenues" type="text" id="edit_price_avr" name="price_avr">
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary classFactRevenues"><?=$language['farmer-small']['52']?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>

<script type="text/javascript">
	$(document).ready(function(){
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

		$('#amount, #price_total').keyup(function(){
			var amount = $('#amount').val();
			var price_total = $('#price_total').val();
			var price_avr = price_total/amount;
			var price_avr_parse = price_avr.toFixed(2);
			$('#price_avr').val(price_avr_parse);
		});

		$('.edit_fact_revenues').click(edit_fact_revenues);
			function edit_fact_revenues(){
				var id = $(this).attr('data-id1');
            	var date=$(this).attr('data-date');
            	var crop_id=$(this).attr('data-id');
            	var sales_channel=$(this).attr('data-sales_channel');
            	var amount=$(this).attr('data-amount');
            	var price_total =$(this).attr('data-price_total');
            	var price_avr =$(this).attr('data-price_avr');
            	$('#edit_fact_id').val(id);
            	$('#edit_data_fact').val(date);
            	$('#edit_crop_id').val(crop_id);
            	$('#edit_sales_channel').val(sales_channel);
            	$('#edit_amount').val(amount);
            	$('#edit_price_avr').val(price_avr);
            	$('#edit_price_total').val(price_total);
			}

		$('.classFactRevenues').click(save_fact);
        	function save_fact(){
            	var id = $('#edit_fact_id').val();
           		var date =  $('#edit_data_fact').val();
           		var crop_id =  $('#edit_crop_id').val();
           		var sales_channel =  $('#edit_sales_channel').val();
           		var amount =  $('#edit_amount').val();
           		var price_avr =  $('#edit_price_avr').val();
           		var price_total =  $('#edit_price_total').val();
            		$.ajax({
                		type : 'post',
               	 		url : '/farmer-small/edit-fact-revenues',
                		data : {
                    		'id': id,
                    		'data_fact_revenues' :  date,
                    		'crop_id' : crop_id,
                    		'sales_channel' : sales_channel,
                    		'amount' : amount,
                    		'price_total' : price_total,
                    		'price_avr' : price_avr
                	},
                	response : 'text',
                	success : function() {
                    	$('#material').modal('hide');
                	}

            });
        }
	});
</script>