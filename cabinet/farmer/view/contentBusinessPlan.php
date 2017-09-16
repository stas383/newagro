<?php
$tillage_type_ua[1]='традиційний';
$tillage_type_ua[2]='поверхневий';
$tillage_type_ua[3]='мінімальний';

$tillage_type_en[1]='Traditional type';
$tillage_type_en[2]='Surface type';
$tillage_type_en[3]='The minimum type';
?>
<style>
	#total_area_ow{
		float: right;
	}
    .collapsed{
        color: #008d4c;
    }
    .collapsed:hover{
        color: #006E37;
    }
    .collapsed:active,.collapsed:focus{
        color: #004f27;
    }
</style>
<section class="content">
    <div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <!--<li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>-->
                <li class="active"><a href="#activities" data-toggle="tab"><?php echo $language['farmer']['2']?></a></li>
                <li><a href="#store" data-toggle="tab">Магазин</a></li>
            </ul>
            <div class="tab-content">
                <!--/.tab-pane -->
                <div class="tab-pane" id="store">
                    <div class="box box-success" id="store_nt1">
                        <div class="box-body text-center">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <h4>Оберіть культуру</h4>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-sm-12 btn-center">
                                    <select id="crop_shop" class="form-control">
                                        <option id="hiden_on">Оберіть вид&nbsp;&nbsp;діяльності</option>
                                        <?php foreach ($date['My-crop-1'] as $MyCrop){ ?>
                                        <option value="<?php echo $MyCrop['id']?>"><?php foreach ($date['Crop-1'] as $NameCrop[$MyCrop['id']])if($MyCrop['crop_id']== $NameCrop[$MyCrop['id']]['id_crop']) echo $NameCrop[$MyCrop['id']]['name_crop_ua'] ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="store_plan"></div>
                    </div>
                    <div class="box box-success" id="store_nt2">
                        <div>
                            <div class="box-header ui-sortable-handle">
                                <button id="store_btn_nt1" class="btn btn-link">
                                    <i class="fa fa-fw fa-arrow-left"></i><h3 class="box-title">вид діяльності</h3>
                                </button>

                                <button id="store_btn_nt2" class="btn btn-link" style="display: none">
                                    <i class="fa fa-fw fa-arrow-left"></i><h3 class="box-title"></h3>
                                </button>
                            </div>
                        </div>
                        <div id="store_list_material">

                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="active tab-pane" id="activities">
                    <form class="form-horizontal">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo $language['farmer']['3']?></h3>
                        </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label"><?php echo $language['farmer']['4']?></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="lease" placeholder="<?php echo $language['farmer']['5']?>" value="<?php echo $date['analytica_date'][0]['lease'];?>">
                                    </div>
                                </div>
                            </div>
                                        <?php if($date['My-crop-1']!=false or $date['My-crop-2']!=false or $date['My-crop-3']!=false) {?>
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title" ><?php echo $language['farmer']['2']?></h3>

                                                    <div class="box-tools">
                                                        <ul class="pagination pagination-sm no-margin pull-right">
                                                            <li id="truy"></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="box-body">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th></th>
                                                            <th><?php echo $language['farmer']['124']?></th>
                                                            <th><?php echo $language['farmer']['125']?> 2017, га <b id="total_area_ow"><?php echo $language['farmer']['126']?>(<b id="total_area"></b>га)</b></th>
                                                            <th><?php echo $language['farmer']['127']?></th>
                                                            <th><?php echo $language['farmer']['128']?></th>
                                                        </tr>
                                                        <?php foreach ($date['My-crop-1'] as $MyCrop){ ?>
                                                            <tr>
                                                                <td><span class="designStatus"><img src="<?php SRC::getSrc(); ?>/cabinet/farmer/template/images/plan_off.svg" alt="" data-toggle="tooltip" data-placement="bottom" title="Використовується стандартна технологічна карта"></span></td>
                                                                <td> <?php foreach ($date['Crop-1'] as $NameCrop[$MyCrop['id']])if($MyCrop['crop_id']== $NameCrop[$MyCrop['id']]['id_crop']) echo $NameCrop[$MyCrop['id']]['name_crop_ua'] ?></td>
                                                                <td>
                                                                    <input date-type="area" date-id="<?php echo $MyCrop['id']?>"  type="text" class="form-control classEdit area_plus" value="<?php echo $MyCrop['area']?>" placeholder="<?php echo $language['farmer']['125']?>" >
                                                                </td>
                                                                <td>
                                                                    <input date-type="yaled" date-id="<?php echo $MyCrop['id']?>" type="text" class="form-control classEdit" value="<?php echo $MyCrop['yaled']?>" placeholder="<?php echo $language['farmer']['127']?>">
                                                                </td>
                                                                <td>
                                                                    <select date-type="tillage" date-id="<?php echo $MyCrop['id']?>" class="form-control select2 classEdit" style="width: 100%;">
                                                                        <?php for ($t = 1; $t <= 3; $t++) {?>
                                                                            <option value="<?php echo $t?>" <?php if($t==$MyCrop['tillage']) echo "selected"?> ><?php if($_COOKIE['lang']=='ua'){echo $tillage_type_ua[$t];}elseif($_COOKIE['lang']=='gb'){echo $tillage_type_en[$t];}?></option>
                                                                        <?php }?>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        <?php }?>
                                                        <?php foreach ($date['My-crop-2'] as $MyCrop){ ?>
                                                            <tr>
                                                                <td><span class="designStatus"><img src="<?php SRC::getSrc(); ?>/cabinet/farmer/template/images/plan_off.svg" alt="" data-toggle="tooltip" data-placement="bottom" title="Використовується стандартна технологічна карта"></span></td>
                                                                <td> <?php foreach ($date['Crop-2'] as $NameCrop[$MyCrop['id']])if($MyCrop['crop_id']== $NameCrop[$MyCrop['id']]['id_crop']) echo $NameCrop[$MyCrop['id']]['name_crop_ua'] ?></td>
                                                                <td>
                                                                    <input date-type="area" date-id="<?php echo $MyCrop['id']?>"  type="text" class="form-control classEdit area_plus" value="<?php echo $MyCrop['area']?>" placeholder="<?php echo $language['farmer']['125']?>" >
                                                                </td>
                                                                <td>
                                                                    <input date-type="yaled" date-id="<?php echo $MyCrop['id']?>" type="text" class="form-control classEdit" value="<?php echo $MyCrop['yaled']?>" placeholder="<?php echo $language['farmer']['127']?>">
                                                                </td>
                                                                <td>
                                                                    <select date-type="tillage" date-id="<?php echo $MyCrop['id']?>" class="form-control select2 classEdit" style="width: 100%;">
                                                                        <?php for ($t = 1; $t <= 3; $t++) {?>
                                                                            <option value="<?php echo $t?>" <?php if($t==$MyCrop['tillage']) echo "selected"?> ><?php if($_COOKIE['lang']=='ua'){echo $tillage_type_ua[$t];}elseif($_COOKIE['lang']=='gb'){echo $tillage_type_en[$t];}?></option>
                                                                        <?php }?>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        <?php }?>
                                                        <?php foreach ($date['My-crop-3'] as $MyCrop){ ?>
                                                            <tr>
                                                                <td><span class="designStatus"><img src="<?php SRC::getSrc(); ?>/cabinet/farmer/template/images/plan.svg" alt="" data-toggle="tooltip" data-placement="bottom" title="Використовується власна технологічна карта"></span></td>
                                                                <td> <?php echo  $date['agri_crop_head'][$MyCrop['crop_id']]['name'] ?></td>
                                                                <td>
                                                                    <input date-type="area" date-id="<?php echo $MyCrop['id']?>"  type="text" class="form-control classEdit area_plus" value="<?php echo $MyCrop['area']?>" placeholder="<?php echo $language['farmer']['125']?>" >
                                                                </td>
                                                                <td>
                                                                    <input date-type="yaled" date-id="<?php echo $MyCrop['id']?>" type="text" class="form-control classEdit" value="<?php echo $MyCrop['yaled']?>" placeholder="<?php echo $language['farmer']['127']?>">
                                                                </td>
                                                                <td class="text-center">
                                                                   <?if($_COOKIE['lang']=='ua'){echo "власний";}
                                                                   elseif($_COOKIE['lang']=="gb"){echo "own";}?>
                                                                </td>
                                                            </tr>
                                                        <?php }?>

                                                    </table>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-5 col-sm-5">
                                                            <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#myModal"><?=$language['farmer']['129']?></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        if($date['My-crop-1']==false and $date['My-crop-2']==false and $date['My-crop-3']==false){
                                            ?>
                                            <div class="box box-success">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title"><?php echo $language['farmer']['2']?></h3>
                                                </div>
                                                <div class="box-body text-center">
                                                    <div class="form-group">
                                                        <div class="col-sm-12"><?php echo $language['farmer']['6']?></div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <div class="col-sm-12 btn-center">
                                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><?php echo $language['farmer']['7']?></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }?>
                            </form>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    </div>
    <div class="example-modal">
        <div class="modal fade  bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <form method="post" action="/farmer/add-list-crop">
                <div class="modal-dialog" role="document" >
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><?=$language['farmer']['132']?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 ">
                                    <h4 class="text-center"><?=$language['farmer']['155']?></h4>
                                    <div class="box-group" id="accordion">
                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                        <div class="panel box">
                                            <div class="box-header with-border">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="collapsed" aria-expanded="false">
                                                        <?=$language['farmer']['152']?>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                <div class="box-body">
                                                    <?php foreach ($date['Crop-1'] as $AddCrop1){ ?>
                                                        <div class="form-group">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input <?php foreach ($date['My-crop-1'] as $myCropCheck)if($AddCrop1['id_crop']==$myCropCheck['crop_id']) echo "checked"?> type="checkbox" name="crop-1-<?php echo $AddCrop1['id_crop']; ?>"> <?php echo $AddCrop1['name_crop_ua']; ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel box">
                                            <div class="box-header with-border">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false">
                                                        <?=$language['farmer']['153']?>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                <div class="box-body">
                                                    <?php foreach ($date['Crop-2'] as $AddCrop1){ ?>
                                                        <div class="form-group">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input <?php foreach ($date['My-crop-2'] as $myCropCheck)if($AddCrop1['id_crop']==$myCropCheck['crop_id']) echo "checked"?> type="checkbox" name="crop-2-<?php echo $AddCrop1['id_crop']; ?>"> <?php echo $AddCrop1['name_crop_ua']; ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h4 class="text-center"><?=$language['farmer']['154']?></h4>
                                    <div class="panel box">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#my_tech" href="#collapse3" class="collapsed" aria-expanded="false">
                                                    <?=$language['farmer']['152']?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse3" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="box-body">
                                                <?php foreach ($date['agri_crop_head_sql'] as $AddCrop13){
                                                    $AgriCrop = preg_split("/[,-]+/", $AddCrop13['crop_st']);
                                                    if($AgriCrop[1]==1){
                                                    ?>
                                                    <div class="form-group">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input <?php foreach ($date['My-crop-3'] as $myCropCheck)if($AddCrop13['id_crop']==$myCropCheck['crop_id']) echo "checked"?> type="checkbox" name="crop-3-<?php echo $AddCrop13['id_crop']; ?>"> <?php echo $AddCrop13['name_crop_ua']; ?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                <?php }}?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel box">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#my_tech" href="#collapse4" class="collapsed" aria-expanded="false">
                                                    <?=$language['farmer']['153']?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse4" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="box-body">
                                                <?php foreach ($date['agri_crop_head_sql'] as $AddCrop13){
                                                    $AgriCrop = preg_split("/[,-]+/", $AddCrop13['crop_st']);
                                                    if($AgriCrop[1]==2){
                                                        ?>
                                                        <div class="form-group">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input <?php foreach ($date['My-crop-3'] as $myCropCheck)if($AddCrop13['id_crop']==$myCropCheck['crop_id']) echo "checked"?> type="checkbox" name="crop-3-<?php echo $AddCrop13['id_crop']; ?>"> <?php echo $AddCrop13['name_crop_ua']; ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    <?php }}?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel box">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#my_tech" href="#collapse5" class="collapsed" aria-expanded="false">
                                                    <?=$language['farmer']['156']?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse5" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="box-body">
                                                <?php foreach ($date['agri_crop_head_sql'] as $AddCrop13){

                                                    if($AddCrop13['crop_st']==0){
                                                        ?>
                                                        <div class="form-group">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input <?php foreach ($date['My-crop-3'] as $myCropCheck)if($AddCrop13['id_crop']==$myCropCheck['crop_id']) echo "checked"?> type="checkbox" name="crop-3-<?php echo $AddCrop13['id_crop']; ?>"> <?php echo $AddCrop13['name_crop_ua']; ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    <?php }}?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!--                            <table class="table table-bordered">-->
<!--                                <tr>-->
<!--                                    <th>Рослиництво</th>-->
<!--                                    <th>Овочівництво</th>-->
<!--                                    <th>Мої технологічні карти</th>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <td>-->
<!--                                        <ul class="list-unstyled">-->
<!--                                            --><?php //foreach ($date['Crop-1'] as $AddCrop1){ ?>
<!--                                                <div class="form-group">-->
<!--                                                    <div class="checkbox">-->
<!--                                                        <label>-->
<!--                                                            <input --><?php //foreach ($date['My-crop-1'] as $myCropCheck)if($AddCrop1['id_crop']==$myCropCheck['crop_id']) echo "checked"?><!-- type="checkbox" name="crop-1---><?php //echo $AddCrop1['id_crop']; ?><!--"> --><?php //echo $AddCrop1['name_crop_ua']; ?>
<!--                                                        </label>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            --><?php //}?>
<!--                                        </ul>-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <ul class="list-unstyled">-->
<!--                                            --><?php //foreach ($date['Crop-2'] as $AddCrop12){ ?>
<!--                                                <div class="form-group">-->
<!--                                                    <div class="checkbox">-->
<!--                                                        <label>-->
<!--                                                            <input --><?php //foreach ($date['My-crop-2'] as $myCropCheck)if($AddCrop12['id_crop']==$myCropCheck['crop_id']) echo "checked"?><!-- type="checkbox" name="crop-2---><?php //echo $AddCrop12['id_crop']; ?><!--"> --><?php //echo $AddCrop12['name_crop_ua']; ?>
<!--                                                        </label>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            --><?php //}?>
<!--                                        </ul>-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <ul class="list-unstyled">-->
<!--                                            --><?php //foreach ($date['agri_crop_head_sql'] as $AddCrop13){ ?>
<!--                                                <div class="form-group">-->
<!--                                                    <div class="checkbox">-->
<!--                                                        <label>-->
<!--                                                            <input --><?php //foreach ($date['My-crop-3'] as $myCropCheck)if($AddCrop13['id_crop']==$myCropCheck['crop_id']) echo "checked"?><!-- type="checkbox" name="crop-3---><?php //echo $AddCrop13['id_crop']; ?><!--"> --><?php //echo $AddCrop13['name_crop_ua']; ?>
<!--                                                        </label>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            --><?php //}?>
<!--                                        </ul>-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                            </table>-->
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><?=$language['farmer']['129']?></button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['farmer']['157']?></button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </form>
        </div>
        <!-- /.modal -->
    </div>
</section>
<script>
    $(document).ready(function() {
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
        $('.classEdit').change(edit);
        function edit() {
            var type = $(this).attr('date-type');
            var id = $(this).attr('date-id');
            var value = $(this).val();
            $.ajax({
                type : 'post',
                url : '/farmer/edit-save-crop-list',
                data : {
                    'id' :  id,
                    'type' : type,
                    'value' : value
                },
                response : 'text',
                success : function(html) {
                    $('#truy').html(html).show(200);
                    setTimeout(function() {
                        $('#truy').hide(200);
                    }, 4000);
                }
            });
        }
        $('#crop_shop').change(sell_crop);
        function sell_crop() {
            var crop= $(this).val();
            $('#hiden_on').css({
                'display': 'none'
            });
            $.ajax({
                type : 'post',
                url : '/farmer/store-plan',
                data : {
                    'crop' :  crop
                },
                response : 'text',
                success : function(html) {
                    $("#store_plan").html(html);
                }
            });
        }
        $('#store_plan').on('click', '.in-stope', in_store);
        function in_store() {
            $('#store_nt1').hide(500);
            $('#store_nt2').show(500);
            var crop = $(this).attr('data-crop');
            var plan = $(this).attr('data-plan');
            var nomer = $(this).attr('data-nomer');
            var type = $(this).attr('data-type');
            $.ajax({
                type : 'post',
                url : '/farmer/store-list',
                data : {
                    'plan' :  plan,
                    'nomer' : nomer,
                    'type' : type,
                    'crop' : crop
                },
                response : 'text',
                success : function(html) {
                    $("#store_list_material").html(html);
                }
            });
        }
        $('#store_btn_nt1').click(open_store_1);
        function open_store_1() {
            $('#store_nt1').show(500);
            $('#store_nt2').hide(500);
        }
        $('#lease').change(save_lease);
        function save_lease() {
            var value=$('#lease').val();
            $.ajax({
                type : 'post',
                url : '/farmer/edit-lease',
                data : {
                    'value' : value
                }
            });
        }
    });
</script>