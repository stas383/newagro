<div style="float: right;"><b id="truy"></b>  </div>
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>Name_crop_ua</th>
				<th>Name_crop_en</th>
			</tr>
		</thead>
		<tbody>
		<? foreach($date as $date_name){?>
			<tr>
				<th>
					<input type="text" class="form-control" name="name_crop_ua" value="<?=$date_name['name_crop_ua']?>">
				</th>
				<th>
					<input type="text" class="form-control name_crop_en" id="" name="name_crop_en" value="<?=$date_name['name_crop_en']?>" data-id="<?=$date_name['id_crop']?>">
				</th>
			</tr>
			<?}?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.name_crop_en').change(function(){
			var id_crop = $(this).attr('data-id');
			var name = $(this).val();
			    $.ajax({
                type : 'post',
                url : '/farmer-small/save-translate',
                data : {
                    'id_crop' :  id_crop,                    
                    'name' : name
                },
                response : 'text',
                success : function(html) {
                    $('#truy').show(100);
                    $('#truy').html(html);
                    setTimeout(function() {
                        $('#truy').hide(200);
                    }, 4000);
                }
            });
		});
	});
</script>
<?//var_dump($date);?>