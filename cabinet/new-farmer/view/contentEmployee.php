<head>
    <style>
        .searchs{
            height: 35px;
            width: 300px;
            border-radius:3px;
        }
    </style>
</head>

<div class="box-bodyn col-lg-12">
        <div class="non-semantic-protector">
            <h1 class="ribbon">
                <strong class="ribbon-content"><?=$language['new-farmer']['4']?></strong>
            </h1>
        </div>
</div>
<div class="box-bodyn col-lg-12" style="max-height: 55px">
    <a class="btn btn-primaryn top sh" href="#myModal" data-toggle="modal"><?=$language['new-farmer']['36']?></a>
</div>

<div class="rown">
    <div class="table-responsive">
<table class="table">
	<thead >
		<tr class="tabletop">
			<th>П.І.Б</th>
            <th><?=$language['new-farmer']['40']?></th>
			<th><?=$language['new-farmer']['39']?></th>
            <th>Оплата праці, грн/міс.</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<? foreach ($date as $employee){ ?>
		<tr class="for_search">
			<td><? echo $employee['employee_surname']." ".$employee['employee_name']." ".$employee['employee_father_name'];?></td>
            <td><?=$employee['employee_position'];?></td>
			<td><?=$employee['employee_phone_number'];?></td>
			<td><? if($employee['employee_salary']!=0){echo $employee['employee_salary'];}else{echo '';}?></td>
			<td><a href="#editModal" class="btn btn-warning fa fa-pencil editEmploye" data-toggle="modal"]
                   data-data='<?=json_encode($employee); ?>'
                </a></td>
			<td><a href="/new-farmer/remove_employee/<?echo $employee['id_employee']?>" class="btn btn-danger fa fa-remove"></a></td>
		</tr>
		<?}?>
	</tbody>
</table>
    </div>
</div>

<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-lg">
    <form action="/new-farmer/create_employee" method="post">
    <div class="modal-content wt">
        <div class="box-bodyn">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <span class="box-title"><?=$language['new-farmer']['193']?></span>
        </div>
     
        <div class="modal-body">
         	<div class="row">
                <div class="col-lg-4">
                    <label><?=$language['new-farmer']['38']?></label>
                    <input class="form-control inphead" type="text" name="employee_surname">
                </div>
         		<div class="col-lg-4">
					<label><?=$language['new-farmer']['37']?></label>
					<input class="form-control inphead" type="text" name="employee_name">
				</div>
                <div class="col-lg-4">
                    <label>По-батькові</label>
                    <input class="form-control inphead" type="text" name="employee_father_name">
                </div>
                <div class="col-lg-4">
                    <label><?=$language['new-farmer']['40']?></label>
                    <input class="form-control inphead" type="text" name="employee_position">
                </div>
                <div class="col-lg-4">
                    <label>Оплата праці, грн/міс.</label>
                    <input class="form-control inphead" type="text" name="employee_salary">
                </div>
				<div class="col-lg-4">
					<label><?=$language['new-farmer']['39']?></label>
					<input class="form-control inphead" type="text" name="employee_phone_number">
				</div>
                <div class="col-lg-4">
                    <label>Дата прийому на роботу</label>
                    <input type="date" class="form-control inphead" name="date_start">
                </div>
                <div class="col-lg-4">
                    <label>Дата звільнення</label>
                    <input type="date" class="form-control inphead" name="date_end">
                </div>
                <div class="col-lg-4">
                    <label>Примітки</label>
                    <textarea class="form-control inphead" name="description"></textarea>
                </div>
			</div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
            <button type="submit" class="btn btn-primaryn"><?=$language['new-farmer']['27']?></button>
        </div>
    </div>
    </form>
  </div>
</div>

<div id="editModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <form action="/new-farmer/edit_employee" method="post">
            <div class="modal-content wt">
                <div class="box-bodyn">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <span class="box-title"><?=$language['new-farmer']['193']?></span>
                </div>
     
      <div class="modal-body">
         	<div class="row">
                <div class="col-lg-4">
                    <label><?=$language['new-farmer']['38']?></label>
                    <input class="form-control inphead" type="text" name="edit_employee_surname" id="edit_employee_surname">
                </div>
         		<div class="col-lg-4">
					<label><?=$language['new-farmer']['37']?></label>
					<input type="hidden" name="edit_id_employee" id="edit_id_employee">
					<input class="form-control inphead" type="text" name="edit_employee_name" id="edit_employee_name">
				</div>
                <div class="col-lg-4">
                    <label>По-батькові</label>
                    <input class="form-control inphead" type="text" name="edit_employee_father_name" id="edit_employee_father_name">
                </div>
                <div class="col-lg-4">
                    <label><?=$language['new-farmer']['40']?></label>
                    <input class="form-control inphead" type="text" name="edit_employee_position" id="edit_employee_position">
                </div>
                <div class="col-lg-4">
                    <label>Оплата праці, грн/міс.</label>
                    <input class="form-control inphead" type="text" name="edit_employee_salary" id="edit_employee_salary">
                </div>
				<div class="col-lg-4">
					<label><?=$language['new-farmer']['39']?></label>
					<input class="form-control inphead" type="text" name="edit_employee_phone_number" id="edit_employee_phone_number">
				</div>
                <div class="col-lg-4">
                    <label>Дата прийому на роботу</label>
                    <input class="form-control inphead" type="date" name="edit_date_start" id="edit_date_start">
                </div>
                <div class="col-lg-4">
                    <label>Дата звільнення</label>
                    <input class="form-control inphead" type="date" name="edit_date_end" id="edit_date_end">
                </div>
                <div class="col-lg-4">
                    <label>Примітки</label>
                    <textarea class="form-control inphead" name="edit_description" id="edit_description"></textarea>
                </div>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
        <button type="submit" class="btn btn-primaryn editEmployee"><?=$language['new-farmer']['27']?></button>
      </div>
    </div>
    </form>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.editEmploye').click(edit);
		function edit(){
			var json_employee = $(this).attr('data-data');
			var employee = JSON.parse(json_employee);
			$('#edit_id_employee').val(employee['id_employee']);
			$('#edit_employee_name').val(employee['employee_name']);
			$('#edit_employee_surname').val(employee['employee_surname']);
			$('#edit_employee_father_name').val(employee['employee_father_name']);
			$('#edit_employee_phone_number').val(employee['employee_phone_number']);
			$('#edit_employee_position').val(employee['employee_position']);
			$('#edit_employee_salary').val(employee['employee_salary']);
			$('#edit_date_start').val(employee['employee_date_start']);
			$('#edit_date_end').val(employee['employee_date_end']);
			$('#edit_description').val(employee['employee_description']);
		}
        (function( $ ){
            $.fn.jSearch = function( options ) {

                var defaults = {
                    selector: null,
                    child: null,
                    minValLength: 3,
                    Found: function(elem, event){},
                    NotFound: function(elem, event){},
                    Before: function(t){},
                    After: function(t){},
                };

                var options = $.extend(defaults, options);
                var $this = $(this);

                if ( options.selector == null || options.child === null || typeof options.NotFound != "function" || typeof options.Found != "function" || typeof options.After != "function" || typeof options.Before != "function" )
                { console.error( 'One of the parameters is incorrect.' ); return false; }


                $this.on( 'keyup', function(event){

                    options.Before($this);

                    if ( $(this).val().length >= options.minValLength ) {
                        console.clear();

                        $( options.selector ).find( options.child ).each(function( event ){
                            if ( this.innerText.toLowerCase().indexOf( $this.val().toLowerCase() ) == -1 ) {
                                options.NotFound( this, event );
                            } else {
                                options.Found( this, event );
                            }

                        });

                    }
                    options.After($this);

                });

            };
        })( jQuery );

        $('#search').jSearch({
            selector  : 'table',
            child : 'tr > td',
            minValLength: 0,
            Before: function(){
                $('table tr').data('find','');
            },
            Found : function(elem){
                $(elem).parent().data('find','true');
                $(elem).parent().show();
            },
            NotFound : function(elem){
                if (!$(elem).parent().data('find'))
                    $(elem).parent().hide();
            },
            After : function(t){
                if (!t.val().length) $('table tr').show();
            }
        });

	});
</script>