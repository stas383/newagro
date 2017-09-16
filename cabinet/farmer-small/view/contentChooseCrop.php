<head xmlns="http://www.w3.org/1999/html">
<style type="text/css">
#modal_form, #modal_form_field {
    width: 800px; 
    max-height: 700px; 
    border-radius: 5px;
    border: 3px  solid;
    background: #fff;
    position: fixed;
    top: 45%; 
    left: 50%; 
    margin-top: -400px;
    margin-left: -320px;
    display: none; 
    opacity: 0; 
    z-index: 5;
    padding: 20px 10px;
}
/* Кнoпкa зaкрыть для тех ктo в тaнке) */
 #modal_form_field #modal_close {
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
    overflow: auto; 
    width: 250px; 
    max-height: 180px; 
    padding: 5px; 
}
.tech_cart{
    margin-top: 35px;
    padding-left: 10px;
    padding-right: 10px;
}
.tech_head{
    text-align: center;
    font-size: 20px;
}
.tech_label{
    font-size: 17px;
    margin-bottom: 10px;
}
.check_crop{
    font-size: 15px;
}
.create_tech{
    margin-top: 37px;
}
</style>
</head>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?=$language['farmer-small']['2'];?></h3>
        </div>
    <div class="box-body">
        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label"><?echo $language['farmer-small']['21']; 
            if($_COOKIE['currency']=='UAH'){echo $language['farmer-small']['123'];}elseif($_COOKIE['currency']=='USD'){echo $language['farmer-small']['124'];}elseif($_COOKIE['currency']=='EUR'){echo $language['farmer-small']['125'];}?></label>
                <div class="col-sm-2">
                    <input type="text" class="form-control classEdits" id="lease" placeholder="Вартість" value="<? echo $date['price_rent'][0]['price_rent']?>">
                </div>
        </div> <br>
        <div class="box-header with-border">

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
                <?php foreach($date['my_crop'] as $crop){?>
                    <tr>
                        <th><?php if($_COOKIE['lang']=='ua'){echo $crop['name_crop_ua'];}
                             elseif($_COOKIE['lang']=='gb'){echo $crop['name_crop_en'];}?>
                        </th>
                        <th><input class="form-control" value="<?=$crop['field_name']?>"></th>
                        <th><input class="form-control classArea area_plus" name="area" id="area" data-id="<?=$crop['id']?>" date-type="area" value="<?php echo $crop['area']?>"></th>
                        <th><input class="form-control classYaled" name="yaled" id="yaled" data-id="<?=$crop['id']?>"  date-type="crop_capacity"  value="<?php echo $crop['yaled']?>"></th>
                        <th><a href="/farmer-small/edit-crop/<?php echo $crop['id']?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a></th><td><a href="/farmer-small/remove-crop/<? echo $crop['id_crop']?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></a></td>
                        <th><a href="/farmer-small/list-plan/<?php echo $crop['id_crop']?>"><?=$language['farmer-small']['27']?></a> </th>
                    </tr>
                <?php }?>
                    <tr>
                        <th style="font-size: 20px"><?=$language['farmer-small']['28']?></th>
                        <th style="font-size: 20px;"><b id="total_area"></b> га</th>
                    </tr>

                </tbody>

            </table>
            <div style="text-align:center;">
                <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#modal-default">
                    <?=$language['farmer-small']['29']?>
                </button>
            </div>
        </form>

        </div>
</section>
<div class="modal fade in" id="modal-default" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><?=$language['farmer-small']['22']?></h4>
            </div>
            <form action="/farmer-small/save_new_field" method="post">
            <div class="modal-body">

                    <div class="row">
                        <div class="col-lg-6">
                            <label for="name_field"><?=$language['farmer-small']['78']?></label>
                            <input class="form-control" type="text" id="add_name_field" name="name_field" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="area_field"><?=$language['farmer-small']['79']?></label>
                            <input class="form-control" type="text" id="add_area_field" name="area_field" required>
                        </div>
                        <div class="col-lg-6">
                            <label>Вид</label>
                            <select class="form-control" id="crop_type">
                                <option value="1" selected><?=$language['farmer-small']['30']?></option>
                                <option value="2"><?=$language['farmer-small']['31']?></option>
                                <option value="3"><?=$language['farmer-small']['32']?></option>
                                <option value="4"><?=$language['farmer-small']['33']?></option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label><?=$language['farmer-small']['29']?></label>
                            <select class="form-control" name='crop' id="crop_list_select" required>
                                <?foreach($date['crop_us'] as $crop){?>
                                    <option class="crop_list crop_type_<?=$crop['type']?>" value="<?=$crop['id_crop']?>"><?if($_COOKIE['lang']=='ua'){echo $crop['name_crop_ua'];}elseif($_COOKIE['lang']=='gb'){echo $crop['name_crop_en'];}?></option>
                                <?}?>
                            </select>
                        </div>
                    </div>

                    <div class="tech_cart">
                        <div class="tech_head">
                            <label><?=$language['farmer-small']['27']?></label>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 ">

                                    <label class="tech_label">
                                        <input type="radio" name="optionsRadios" value="new">
                                        <?=$language['farmer-small']['126']?>
                                    </label>

                                <div id="new_tech_cart">
                                    <label ><?=$language['farmer-small']['127']?></label>
                                    <input class="form-control" type="text" name="name_tech_cart" id="name_tech_cart">
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="tech_label"> <?=$language['farmer-small']['128']?></label>
                                <div class="form-group">
                                    <? foreach($date['tech_cart'] as $cart){?>
                                        <div class="rad tech_cart_crop_<?=$cart['id_crop']?>" class="radio">
                                            <label>
                                                <input  type="radio" name="optionsRadios" value="<?=$cart['id']?>" required>
                                                <?if($_COOKIE['lang']=='ua'){echo $cart['name_crop_ua'].'_'.$cart['tech_name'];}elseif($_COOKIE['lang']=='gb'){echo $cart['name_crop_en'].'_'.$cart['tech_name'];}?>
                                            </label>
                                        </div>
                                    <?}?>
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default save_Field" ><?=$language['farmer-small']['52']?></button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<script>
    $(document).ready(function(){
        var crop_id_st=$('#crop_list_select').val();
        $('.rad').hide();
        $('.tech_cart_crop_'+crop_id_st).show();
        $('#crop_type').click(crop_list_type);
        function crop_list_type() {
            var id_type=$(this).val();
            $('.crop_list').hide();
            $('.crop_type_'+id_type).show();
            $('#crop_list_select').val(' ');
            $('.rad').hide();
            $('input[name="optionsRadios"]').attr('checked', false);
            $("#new_tech_cart").hide();
        }
        $("input[name='optionsRadios']").change(radio_select);
        $("#new_tech_cart").hide();
        function radio_select() {
            var value= $("input[name='optionsRadios']:checked").val();

            if(value == 'new'){
                $("#name_tech_cart").prop('required',true);
                $("#new_tech_cart").show();
            }
            else{
                $("#name_tech_cart").prop('required',false);
                $("#new_tech_cart").hide();
            }
        }
        $('#crop_list_select').change(tech_cart_crop);
        function tech_cart_crop() {
            var crop_id=$(this).val();
            $('.rad').hide();
            $('.tech_cart_crop_'+crop_id).show();
            $("#new_tech_cart").hide();
            $('input[name="optionsRadios"]').attr('checked', false);
        }






        $('a#go').click( function(event){ 
            event.preventDefault(); 
            $('#overlay').fadeIn(400, 
                function(){ 
                $('#modal_form_field') 
                    .css('display', 'block')
                    .animate({opacity: 1, top: '50%'}, 100); 
            });
        });
   
        $('.modal_close_field, #overlay').click( function(){
            $('#modal_form_field')
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

         $('.classArea').change(edit);
        function edit() {
            var id = $(this).attr('data-id');
            var area = $(this).val();
            alert(id);
            alert(area);
            $.ajax({
                type : 'post',
                url : '/farmer-small/edit-crop-area',
                data : {
                    'id' :  id,
                    'area' : area,
                },
                response : 'text',
                success : function(html) {
                    $('#truy1').show(100);
                    $('#truy1').html(html);
                    setTimeout(function() {
                        $('#truy1').hide(200);
                    }, 4000);
                }
            });
        }
       $('.classYaled').change(editYaled);
        function editYaled() {
            var id = $(this).attr('data-id');
            var yaled = $(this).val();
            $.ajax({
                type : 'post',
                url : '/farmer-small/edit-crop-yaled',
                data : {
                    'id' :  id,
                    'yaled' : yaled,
                },
                response : 'text',
                success : function(html) {
                    $('#truy1').show(100);
                    $('#truy1').html(html);
                    setTimeout(function() {
                        $('#truy1').hide(200);
                    }, 4000);
                }
            });
        }
});
</script>