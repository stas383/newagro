
<head>
<style type="text/css">
    #modal_form {
    width: 600px; 
    max-height: 700px; 
    border-radius: 5px;
    border: 3px  solid;
    background: #fff;
    position: fixed;
    top: 45%; 
    left: 50%; 
    margin-top: -280px;
    margin-left: -300px;
    display: none; 
    opacity: 0; 
    z-index: 5;
    padding: 20px 10px;
}
/* Кнoпкa зaкрыть для тех ктo в тaнке) */
#modal_form #modal_close {
    width: 21px;
    height: 21px;
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    display: block;
}

#overlay {
    z-index:3; 
    position:fixed; 
    background-color:#000; 
    opacity:0.8; 
    -moz-opacity:0.8; 
    filter:alpha(opacity=80);
    width:100%; 
    height:100%; 
    top:0; 
    left:0;
    cursor:pointer;
    display:none; 
}
.layer {
    overflow: scroll; 
    width: 250px; 
    max-height: 450px; 
    padding: 5px; 
   } 
    </style>
</head>
<section class="content">
    <div class="box">
        <div class="box-header">
			<div class="col-lg-1">
                        <br>
                        <a class="add_Field btn btn-primary" id="sumbit"><?=$language['farmer']['144']?></a>
                    </div>
        </div>
        <div class="box-body">
            <form action="/farmer-small/save-fact" method="post">
                <div class="row">
                    <div class="col-lg-1">
                        <label for="data_fact"><?=$language['farmer']['135']?></label>
                        <input class="form-control" type="date" id="data_fact" name="data_fact" required>
                    </div>
                    <div class="col-lg-2">
                        <label for="crop_id"><?=$language['farmer']['136']?></label>
                        <select name="crop_id" id="crop_id" class="form-control" required>
                            <?php foreach ($date["crop"] as  $MyCrop){ ?>
                                <option value="<?php echo $MyCrop['crop_id']?>"><?php 
                                if($MyCrop['type'] == '1'){	
                                foreach ($date['Crop-1'] as $NameCrop[$MyCrop['id']])if($MyCrop['crop_id']== $NameCrop[$MyCrop['id']]['id_crop']){ echo $NameCrop[$MyCrop['id']]['name_crop_ua'];}}
                                elseif($MyCrop['type'] == '2'){
                                	foreach ($date['Crop-2'] as $NameCrop[$MyCrop['id']])if($MyCrop['crop_id']== $NameCrop[$MyCrop['id']]['id_crop']){ echo $NameCrop[$MyCrop['id']]['name_crop_ua'];}
                                }
                                ?>
                                
                                </option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-lg-1">
                    	<label for="crop_id"><?=$language['farmer']['137']?></label>
                        <select name="field_id" id="field_id" class="form-control" required>
                                <? foreach($date['field'] as $field){?>
                                <option value="<?=$field['id']?>"><? echo $field['name_field']?></option>
                                <?}?>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label for="stattie_id"><?=$language['farmer']['138']?></label>
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
                        <div class="col-lg-1">
                        <label for="price_one"><?=$language['farmer']['139']?></label>
                        <input class="form-control" type="text" id="amount_grn" name="price_one">
                    </div>
                    <div class="col-lg-1">
                        <label for="price_one"><?=$language['farmer']['140']?></label>
                        <input class="form-control" type="text" id="amount_kg" name="price_one">
                    </div>
                    <div class="col-lg-2">
                        <label for="name"><?=$language['farmer']['141']?></label>
                        <input class="form-control" type="text" id="costs_grn" name="name">
                    </div>
                    <div class="col-lg-1">
                        <label for="amount"><?=$language['farmer']['142']?></label>
                        <input class="form-control" type="text" id="costs_kg" name="amount">
                    </div>
                    <div class="col-lg-1">
                        <br>
                        <input type="submit" class="btn btn-block btn-success" id="addFact" value="<?=$language['farmer']['15']?>">
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
                                <th><?=$language['farmer']['135']?></th>
                                <th><?=$language['farmer']['136']?></th>
                                <th><?=$language['farmer']['137']?></th>
                                <th><?=$language['farmer']['138']?></th>
                                <th><?=$language['farmer']['139']?></th>
                                <th><?=$language['farmer']['140']?></th>
                                <th><?=$language['farmer']['141']?></th>
                                <th><?=$language['farmer']['142']?></th>
                            </tr>
                        </thead>
                        <tbody class="bd">
                            <?php foreach ($date['crop'] as $sm_fact){
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
                            <label for="s_crop_id"><?=$language['farmer']['136']?></label>
                            
                                <select name="crop_id" id="crop_id" class="form-control" required>
                                <option value="0"><?=$language['farmer']['136']?></option>
                            <?php foreach ($date["crop"] as  $MyCrop){ ?>
                                <option value="<?php echo $MyCrop['crop_id']?>"><?php 
                                if($MyCrop['type'] == '1'){	
                                foreach ($date['Crop-1'] as $NameCrop[$MyCrop['id']])if($MyCrop['crop_id']== $NameCrop[$MyCrop['id']]['id_crop']){ echo $NameCrop[$MyCrop['id']]['name_crop_ua'];}}
                                elseif($MyCrop['type'] == '2'){
                                	foreach ($date['Crop-2'] as $NameCrop[$MyCrop['id']])if($MyCrop['crop_id']== $NameCrop[$MyCrop['id']]['id_crop']){ echo $NameCrop[$MyCrop['id']]['name_crop_ua'];}
                                }
                                ?>
                                
                                </option>
                            <?php }?>
                        </select>
                            <br>
                            <label for="s_stattie_id"><?=$language['farmer']['138']?></label>
                            <select name="s_stattie_id" id="s_stattie_id" class="form-control">
                                <option value="0"><?=$language['farmer']['138']?></option>
                                <?php foreach ($date["stattie_name_ua"] as  $key=>$value)if($value!=false){ ?>

                                    <option value="<?php echo $key?>"><?php echo $value?></option>
                                <?php }?>
                            </select>
                            <br>
                            <label for="month"><?=$language['farmer']['143']?></label>
                            <select name="month" id="month" class="form-control">
                                <option value="0"><?=$language['farmer']['143']?></option>
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
                <h4 class="modal-title"><?=$language['farmer']['']?></h4>
            </div>
            <div class="modal-body">
                <form method="post" id="edit_fact_form" action="javascript:void(null);">
                    <div class="row">
                        <div class="col-lg-5">
                        <label for="data_fact"><?=$language['farmer']['135']?></label>
                        <input class="form-control classEditFact" type="date" id="edit_data_fact" name="data_fact" required>
                        <input type="hidden" name="id" id="edit_fact_id">
                        </div>
                    <div class="col-lg-5">
                        <label for="crop_id"><?=$language['farmer']['136']?></label>
                        <select name="crop_id" id="edit_crop_id" class="form-control classEditFact" required>
                            <?php foreach ($date["crop"] as  $crop){ ?>
                                <option value="<?php echo $crop['id']?>"><?php echo $crop['name_crop_ua']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-lg-5">
                        <label for="stattie_id"><?=$language['farmer']['138']?></label>
                        <select name="stattie_id" id="edit_stattie_id" class="form-control classEditFact" required>
                            <?php foreach ($date["stattie_name"] as  $key=>$value)if($value!=false){ ?>
                                <option value="<?php echo $key?>"><?php echo $value?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-lg-5">
                        <label for="name"><?=$language['farmer']['139']?></label>
                        <input class="form-control classEditFact" type="text" id="edit_name_material" name="name">
                    </div>
                    <div class="col-lg-4">
                        <label for="amount"><?=$language['farmer']['140']?></label>
                        <input class="form-control classEditFact" type="text" id="edit_amount_material" name="amount">
                    </div>
                    <div class="col-lg-4">
                        <label for="price_one"><?=$language['farmer']['141']?></label>
                        <input class="form-control classEditFact" type="text" id="edit_price_one" name="price_one">
                    </div>
                    <div class="col-lg-4">
                        <label for="price_total"><?=$language['farmer']['142']?></label>
                        <input class="form-control classEditFact" type="text" id="edit_price_total" name="price_total" required>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <div class="">
                        <button type="submit" class="btn btn-primary classFact col-sm-offset-5 col-sm-5">зберегти</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

        <div id="modal_form">
        	<div class="modal-header">
        	<span><h4><?=$language['farmer']['149']?></h4></span>
            <span id="modal_close" class="modal_close"><i class="fa fa-close"></i></span> <br>
            </div>
                    <div class="row">
                    	<div class="col-lg-6">
                    		<label for="name_field"><?=$language['farmer']['150']?></label>
                    		<input class="form-control" type="text" id="name_field" name="name_field">
                    	</div>
                    	<div class="col-lg-6">
                    		<label for="area_field"><?=$language['farmer']['151']?></label>
                    		<input class="form-control" type="text" id="area_field" name="area_field">
                    	</div>
            		</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default save_Field" data-dismiss="modal">Зберегти</button>
            </div>
        </div>
    </div>
</div>
<div id="overlay"></div>
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
        $('#amount_grn, #amount_kg').keyup(total);
        function total() {
            var amount_grn=parseFloat($('#amount_kg').val());
            var amount_kg=parseFloat($('#amount_kg').val());
            var area = $(this).attr('data-area');
            alert(area);
            //var area = $(this).attr('data-area');
            if(isNaN(amount_kg)) amount=0;
            if(isNaN(amount_kg)) price_one=0;
            var costs_grn=amount_grn*price_one;
            var costs_kg=amount_kg*price_one;
            //$('#price_total').val(toatl);
        }

        $('#addFact').click(save_fact);
        function save_fact(){
           var crop_id = $('#crop_id').val();
           var field_id = $('#field_id').val();
           var stattie_id = $('#stattie_id').val();
           var amount_grn = $('#amount_grn').val();
           var amount_kg = $('#amount_kg').val();
           var costs_grn = $('#costs_grn').val();
           var costs_kg = $('#costs_kg').val();
           alert(crop_id);
           alert(field_id);
           
/*            $.ajax({
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

            });*/
        }

            $('.add_Field').click( function(event){ 
            event.preventDefault(); 
            $('#overlay').fadeIn(400, 
                function(){ 
                $('#modal_form') 
                    .css('display', 'block')
                    .animate({opacity: 1, top: '50%'}, 100); 
            });
        });
   
        $('.modal_close, #overlay').click( function(){
            $('#modal_form')
                .animate({opacity: 0, top: '45%'}, 100, 
                     function(){ 
                         $(this).css('display', 'none'); 
                         $('#overlay').fadeOut(400); 
                 }
                );
        });

        $('.save_Field').click(function(){
        	var name = $('#name_field').val();
        	var area = $('#area_field').val();

        	$.ajax({
        		type : 'post',
                url : '/farmer/save-field',
                data : {
                    'name_field': name,
                    'area_field' :  area,
                },
                response : 'text',
                success : function() {
                    $('#modal_form')
                .animate({opacity: 0, top: '45%'}, 100, 
                     function(){ 
                         $(this).css('display', 'none'); 
                         $('#overlay').fadeOut(400); 
                 }
                );
                }

        	});
        	
        });
    });
</script>