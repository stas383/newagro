
<head>
	<style type="text/css">
		.cont{
			display: none;
		}
	</style>
</head>
<div class="box">
    <div class="box-bodyn col-lg-12" >
       <div class="non-semantic-protector">
           <h1 class="ribbon">
               <strong class="ribbon-content"><?=$language['new-farmer']['6']?></strong>
           </h1>
       </div>
    </div>
    <div class="box-bodyn col-lg-12" style="max-height: 55px">
        <div class="col-sm-4">
            <a class="btnn btn-primaryn topn sh" href="/new-farmer/list_technology_card" style="display: none"><?=$language['new-farmer']['57']?></a></div>
        <div class="col-sm-4">

        </div>
    </div>
    <div class="box-body wt">
        <div class="rown">
			<table class="table table-bordered">
				<thead>
					<tr class="tabletop">
                        <th><?=$language['new-farmer']['44']?></th>
                        <th><?=$language['new-farmer']['45']?></th>
                        <th><?=$language['new-farmer']['46']?></th>
                        <th><?=$language['new-farmer']['48']?></th>
                        <th><?=$language['new-farmer']['49']?></th>
                        <th class="text-center" colspan="4"><?=$language['new-farmer']['147']?></th>
                    </tr>
				</thead>
				<tbody>
                    <? foreach($date['field_management'] as $field_management){?>
					<tr>
						<td><?=$field_management['field_number']?></td>
						<td><?=$field_management['field_name']?></td>
						<td><?=$field_management['field_size']?></td>
						<td><? if($_COOKIE['lang']=='ua'){echo $field_management['name_crop_ua'];}elseif($_COOKIE['lang']=='gb'){echo $field_management['name_crop_en'];}?></td>
                        <td><?=$field_management['field_yield']?></td>
						<!--<td><a class="btn btn-primary create_tech_cart" data-lang="<?/*=$_COOKIE['lang']*/?>" data-id="<?/*=$field_management['id_field']*/?>" data-id_crop="<?/*=$field_management['field_id_crop']*/?>"><?/*=$language['new-farmer']['148']*/?></a></td>-->
                        <td>
                            <button data-field="<?=$field_management['id_field']?>"  data-crop="<?=$field_management['field_id_crop']?>"  class="btn btn-primary select_tc"><?=$language['new-farmer']['149']?></button>
                        </td>
                        <td id="tech_name_field<?=$field_management['id_field']?>">
                            <?=$date['tech_cart']['tech'][$field_management['field_id_crop']][$field_management['field_id_culture']]['tech_name']?>
                        </td>
                        <td ><a id="tech_edit_field<?=$field_management['id_field']?>" class="btn btn-success" href="/new-farmer/edit_technology_card/<?=$field_management['field_id_culture']?>">Переглянути ТК</a></td>
					</tr>
                    <?}?>
				</tbody>
			</table>
        </div>
    </div>
</div>
<div id="Select_tc" class="modal fade">
    <div class="modal-dialog modal-lg">
        <form action="/new-farmer/incoming_products" method="post">
            <div class="modal-content wt">
                <div class="box-bodyn">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <span class="box-title"><?=$language['new-farmer']['151']?></span>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?=$language['new-farmer']['141']?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <thead id="tech_list">
                        </thead>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                    <button type="submit" class="btn btn-primaryn"><?=$language['new-farmer']['109']?></button>
                </div>
            </div>
        </form>
    </div>
</div>


<input type="hidden" id="field_id">
<script type="text/javascript">
	$(document).ready(function(){
        var json_tech='<?=json_encode($date['tech_cart'])?>';
        var tech_name=JSON.parse( json_tech );
	    $('.select_tc').click(function () {
            $('#tech_list').html('');
           $('#Select_tc').modal('show');
            var id_crop=$(this).attr('data-crop');
            var id_field=$(this).attr('data-field');
            $('#field_id').val(id_field);
            $.each(tech_name[id_crop], function(key, value) {
                $('#tech_list').append("<tr>" +
                    "<td>"+value['tech_name']+"</td>" +
                    "<td><button type='button' class='btn btn-primary copy_tc' data-id_tech='"+value['id_culture']+"'>Select</button></td>" +
                    /*"<td><button type='button' class='btn btn-primary selects_tc' data-name='"+value['tech_name']+"' data-id_tech='"+value['id_culture']+"'>Select</button></td>" +*/
                    "</tr>");
            });
        });
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
        $('#tech_list').on('click','.copy_tc', function () {

            alert('copy?');
            var id_field = $('#field_id').val();
            var id_tech_cart = $(this).attr('data-id_tech');
            $(location).attr('href','/new-farmer/copy_tech_field/'+id_tech_cart+'/'+id_field);
        });

        $('#tech_list').on('click','.selects_tc', save_tech_cart);
        function save_tech_cart(){
            var id_field = $('#field_id').val();
            var id_tech_cart = $(this).attr('data-id_tech');
            var text=$(this).attr('data-name');
            $.ajax({
                type : 'post',
                url : '/new-farmer/change_tech_cart',
                data : {
                    'id_field' : id_field,
                    'id_tech_cart' : id_tech_cart
                    }
            });
            $('#Select_tc').modal('hide');
            $('#tech_name_field'+id_field).text(text);
            $('#tech_edit_field'+id_field).attr('href','/new-farmer/edit_technology_card/'+id_tech_cart)
        }
        $('.create_tech_cart').click(function(){
            var id_field = $(this).attr('data-id');
            var id_crop = $(this).attr('data-id_crop');
            var lang = $(this).attr('data-lang');
            if(lang == 'ua'){
                var tech_name = prompt('Введіть назву технологічної карти');
            }
            else{
                var tech_name = prompt('Enter technology card name');
            }
            if(tech_name != null){
            $.ajax({
                type: 'post',
                url : '/new-farmer/create_new_tech_cart',
                data:{
                    'id_field' : id_field,
                    'id_crop' : id_crop,
                    'tech_name': tech_name 
                },
                 success : function(data) {
                    $(location).attr('href','/new-farmer/edit_technology_card/'+data);
                }
            });
        }
        });

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
	});
</script>