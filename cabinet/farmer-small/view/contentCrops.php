
<head>
    <style type="text/css">
    #modal_form, #modal_form_field {
    width: 600px; 
    max-height: 700px; 
    border-radius: 5px;
    border: 3px  solid;
    background: #fff;
    position: fixed;
    top: 45%; 
    left: 50%; 
    margin-top: -280px;
    margin-left: -180px;
    display: none; 
    opacity: 0; 
    z-index: 5;
    padding: 20px 10px;
}
/* Кнoпкa зaкрыть для тех ктo в тaнке) */
#modal_form #modal_form_field #modal_close {
    width: 21px;
    height: 21px;
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    display: block;
}

#overlay, #overlay_field{
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
    h1{
        font-size: inherit;
    }
    </style>
</head>
<section class="content">

<span style="text-align: center;"><h1><?=$language['farmer-small']['2'];?></h1></span>
    <div class="box">
    <div class="box-body">
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label"><?echo $language['farmer-small']['21']; 
            if($_COOKIE['currency']=='UAH'){echo $language['farmer-small']['123'];}elseif($_COOKIE['currency']=='USD'){echo $language['farmer-small']['124'];}elseif($_COOKIE['currency']=='EUR'){echo $language['farmer-small']['125'];}?></label>
                <div class="col-sm-2">
                    <input type="text" class="form-control classEdits" id="lease" placeholder="Вартість" value="<? echo $date['price_rent'][0]['price_rent']?>">
                </div>
        </div>
        <div class="box-header with-border">
            <div style="float: right;"><b id="truy_price"></b></div>
        </div>
    </div>
        <div class="box-header">
            <div class="box-tools">
                <a href="" class="btn btn-success add_Field"><?=$language['farmer-small']['76']?></a>
            </div>
        </div>
        <div class="box-body">
        <form  method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th><?=$language['farmer-small']['24']?></th>
                        <th><?=$language['farmer-small']['78']?></th>
                        <th><?=$language['farmer-small']['25']?></th>
                        <th><?=$language['farmer-small']['26']?></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($date['crop'] as $crop){?>
                    <tr>
                        <th><?php if($_COOKIE['lang']=='ua'){echo $crop['name_crop_ua'];}
                             elseif($_COOKIE['lang']=='gb'){echo $crop['name_crop_en'];}?></th>
                        
                         <th>
                            <select class="form-control classEdit">
                                <? foreach($date['field'] as $field){?>
                                    <option value="<?=$field['id']?>" class="field_area" data-area="<?=$field['area_field']?>"><?=$field['name_field']?></option>
                                <?}?>
                            </select>
                        </th>                   


                        <th>
                        <input class="form-control classEdit area_plus" name="area" id="area" data-id="<?=$crop['id']?>" date-type="area" value="<?php echo $crop['area']?>">
                      </th>

                        <th><input class="form-control classEdit" name="crop_capacity" id="crop_capacity" data-id="<?=$crop['id']?>"  date-type="crop_capacity" data-crop = "<?php echo $crop['crop_capacity']?>" value="<?php echo $crop['crop_capacity']?>"></th>

                        <th><a href="/farmer-small/edit-crop/<?php echo $crop['id']?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a></th>
                       <td><a href="/farmer-small/remove-crop/<? echo $crop['id']?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></a></td>
                        <th><a href="/farmer-small/list-plan/<?php echo $crop['id']?>"><?=$language['farmer-small']['27']?></a> </th>
                    </tr>
                <?php }?>
                    <tr>
                        <th style="font-size: 20px"><?=$language['farmer-small']['28']?></th>
                        <th style="font-size: 20px;"><b id="total_area"></b> га</th>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align:center;"><a class="btn btn-warning btn-lg" id="go"><span><?=$language['farmer-small']['29']?></span></a></td>
                    </tr>
                </tbody>
            </table>
        </form>
        <div class="box-header with-border">
            <div style="float: right;"><b id="truy1"></b></div>
        </div>
        </div>
        <div id="modal_form">
            <span style="float: right;" id="modal_close" class="modal_close"><i class="fa fa-close"></i></span> <br><br>
                 <form action="/farmer-small/add-something" method="post">
                 <div class="box-group" id="accordion">
                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <div class="row">
                    <div class="col-lg-6">
                    <div class="panel box">
                        <div class="box-header with-border">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="collapsed" id="collapsed1" aria-expanded="false">
                                 <?=$language['farmer-small']['30']?>
                                </a>
                            </h4>
                        </div>
                    <div id="collapse1" class="panel-collapse collapse layer" aria-expanded="false" style="height: 0px;">
                            <div class="box-body">
                                <?php foreach ($date['crop_us'] as $AddCrop1)if($AddCrop1['type']==1){ ?>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
    <input <?//php foreach ($date['crop'] as $myCropCheck)if($AddCrop1['id_crop']==$myCropCheck['id_crop']) echo "checked"?> type="checkbox" name="crop_<?php echo $AddCrop1['id_crop']; ?>" value= "<?php echo $AddCrop1['id_crop']; ?>"> <?php if($_COOKIE['lang']=='ua'){echo $AddCrop1['name_crop_ua'];} elseif ($_COOKIE['lang']=='gb') {
                                                    echo $AddCrop1['name_crop_en'];
                                                } ?>
                                            </label>
                                        </div>
                                    </div>
                                 <?php }?>
                            </div>
                    </div>
                </div>
                </div>
                <div class="col-lg-6">
                <div class="panel box">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed"  id="collapsed2" aria-expanded="false">
                                <?=$language['farmer-small']['31']?>
                            </a>
                         </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse layer" aria-expanded="false" style="height: 0px;">
                        <div class="box-body">
                            <?php foreach ($date['crop_us'] as $AddCrop2)if($AddCrop2['type'] == 2){ ?>
                                 <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="crop_<?php echo $AddCrop2['id_crop'];?>" value="<?php echo $AddCrop2['id_crop'] ?>">
                                            <?php if($_COOKIE['lang']=='ua'){echo $AddCrop2['name_crop_ua'];} elseif ($_COOKIE['lang']=='gb') {
                                                    echo $AddCrop2['name_crop_en'];
                                                } ?>
                                        </label>
                                     </div>
                                </div>
                            <?php }?>
                         </div>
                    </div>
                </div>
                </div>
                <div class="col-lg-6">
                <div class="panel box">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" id="collapsed3" class="collapsed" id="collapsed3" aria-expanded="false">
                             <?=$language['farmer-small']['32']?>
                            </a>
                        </h4>
                    </div>
                <div id="collapse3" class="panel-collapse collapse layer" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                        <?php foreach ($date['crop_us'] as $AddCrop3)if($AddCrop3['type']==3){ ?>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input  type="checkbox" name="crop_<?php echo $AddCrop3['id_crop']; ?>" value="<?php echo $AddCrop3['id_crop']; ?>"> <?php if($_COOKIE['lang']=='ua'){echo $AddCrop3['name_crop_ua'];} elseif ($_COOKIE['lang']=='gb') {
                                                    echo $AddCrop3['name_crop_en'];
                                                } ?>
                                        </label>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-lg-6">
                <div class="panel box AAA">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="collapsed" id="collapsed4" aria-expanded="false">
                             <?=$language['farmer-small']['33']?>
                            </a>
                        </h4>
                    </div>
                <div id="collapse4" class="panel-collapse collapse layer" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                        <?php foreach ($date['crop_us'] as $AddCrop4)if($AddCrop4['type']==4){ ?>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input  type="checkbox" name="crop_<?php echo $AddCrop4['id_crop']; ?>" value="<?php echo $AddCrop4['id_crop']; ?>"> <?php if($_COOKIE['lang']=='ua'){echo $AddCrop4['name_crop_ua'];} elseif ($_COOKIE['lang']=='gb') {
                                                    echo $AddCrop4['name_crop_en'];
                                                } ?>
                                        </label>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><?=$language['farmer-small']['34']?></button>
                            <button type="button" class="btn btn-default modal_close" data-dismiss="modal"><?=$language['farmer-small']['35']?></button>
                        </div>
            </form>
        </div>

        <div id="modal_form_field">
            <div class="modal-header">
            <span style="float: right;" id="modal_close_field" class="modal_close_field"><i class="fa fa-close"></i></span> <br>
            <span><h4><?=$language['farmer-small']['76']?></h4></span>
          
            </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="name_field"><?=$language['farmer-small']['77']?></label>
                            <input class="form-control" type="text" id="add_name_field" name="name_field">
                        </div>
                        <div class="col-lg-6">
                            <label for="area_field"><?=$language['farmer-small']['78']?></label>
                            <input class="form-control" type="text" id="add_area_field" name="area_field">
                        </div>
                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default save_Field" data-dismiss="modal">Зберегти</button>
            </div>
        </div>
        <div id="overlay_field"></div>
    </div>
</div>
<div id="overlay"></div>
    </div>
    <script>
    $(document).ready(function(){
       $('.classEdit').change(edit);
        function edit() {
            var id = $(this).attr('data-id');
            var type = $(this).attr('date-type');
            var field = $(this).val();
            var value = $(this).val();

            /*$.ajax({
                type : 'post',
                url : '/farmer-small/edit-crop-list',
                data : {
                    'id' :  id,
                    'type' : type,
                    'value' : value
                },
                response : 'text',
                success : function(html) {
                    $('#truy1').show(100);
                    $('#truy1').html(html);
                    setTimeout(function() {
                        $('#truy1').hide(200);
                    }, 4000);
                }
            });*/
        }

    $('.classEdits').change(edits);
        function edits() {
            var rent_price = $(this).val();
            $.ajax({
                type : 'post',
                url : '/farmer-small/save-rent-price',
                data : {
                    'rent_price' : rent_price
                },
                response : 'text',
                success : function(html) {
                    $('#truy_price').show(100);
                    $('#truy_price').html(html);
                    setTimeout(function() {
                        $('#truy_price').hide(200);
                    }, 4000);
                }
            });
        }

        $('a#go').click( function(event){ 
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
        $('.area_plus').keyup(total_area);
        $(document).ready(total_area);
        function total_area() {
           var total_area=0;
            $(".area_plus").each(function(){
                var area=parseFloat($(this).val());
                if(isNaN(area)) area=0;
                
                total_area += area;
            });
            $('#total_area').text(total_area);
        }

        $('#collapsed4').click(function(){
            $('#collapse3, #collapseThree, #collapse1').fadeOut();
        });
        $('#collapsed3').click(function(){
            $('#collapse4, #collapseThree, #collapse1').fadeOut();
        });
        $('#collapsed2').click(function(){
            $('#collapse4, #collapse3, #collapse1').fadeOut();
        });
        $('#collapsed1').click(function(){
            $('#collapse4, #collapse3, #collapseThree').fadeOut();
        });


        $('#collapsed1').click(function(){
            $('#collapse1').fadeIn();
        });
        $('#collapsed2').click(function(){
            $('#collapseThree').fadeIn();
        }); 
        $('#collapsed3').click(function(){
            $('#collapse3').fadeIn();
        });
        $('#collapsed4').click(function(){
            $('#collapse4').fadeIn();
        });

        $('.add_Field').click( function(event){ 
            event.preventDefault(); 
            $('#overlay_field').fadeIn(400, 
                function(){ 
                $('#modal_form_field') 
                    .css('display', 'block')
                    .animate({opacity: 1, top: '50%'}, 100); 
            });
        });
   
        $('.modal_close_field, #overlay_field, .save_Field').click( function(){
            $('#modal_form_field')
                .animate({opacity: 0, top: '45%'}, 100, 
                     function(){ 
                         $(this).css('display', 'none'); 
                         $('#overlay_field').fadeOut(400); 
                 }
                );
        });

        $('.save_Field').click(function(){
            var name = $('#add_name_field').val();
            var area = $('#add_area_field').val();
            $.ajax({
                type : 'post',
                url : '/farmer-small/save-field',
                data : {
                    'name_field': name,
                    'area_field' :  area,
                },
                response : 'text',
                success : function() {
                    $('#modal_form_field')
                .animate({opacity: 0, top: '45%'}, 100, 
                     function(){ 
                         $(this).css('display', 'none'); 
                         $('#overlay_field').fadeOut(400); 
                 }
                );
                }

            });
            
        });

});
</script>
</section>