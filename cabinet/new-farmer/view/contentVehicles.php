<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 27.07.2017
 * Time: 11:40
 */
?>
<head>
    <style>
        .searchs{
            height: 35px;
            width: 300px;
            border-radius:3px;
        }
    </style>
</head>
    <div class="box-bodyn">
            <div class="non-semantic-protector">
                <h1 class="ribbon">
                    <strong class="ribbon-content">С/г техніка</strong>
                </h1>
            </div>
</div>
<div class="box-bodyn col-lg-12" style="max-height: 55px">
    <div class="row">
        <div class="col-lg-4">
            <input class="searchs" id="search" type="text" placeholder="Поиск" style="float: left">
        </div>
        <div class="col-lg-4">
            <a class="btn btn-primaryn top sh" href="#newVehicles" data-toggle="modal"><?=$language['new-farmer']['29']?></a>
        </div>
    </div>
</div>
<div class="rown">
    <div class="table-responsive">
<table class="table">
    <thead>
        <tr class="tabletop">
            <th>Тип</th>
            <th><?=$language['new-farmer']['17']?></th>
            <th><?=$language['new-farmer']['31']?></th>
            <th><?=$language['new-farmer']['20']?></th>
            <th><?=$language['new-farmer']['34']?></th>
            <th>Вантажопідйомність, т</th>
            <th></th><th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($date['vehicles'] as $vehicles){?>
        <tr>
            <td><?=$date['kind_vehicles']['ua'][$vehicles['vehicles_kind']]?></td>
            <td><?=$vehicles['vehicles_name']?></td>
            <td><?=$vehicles['vehicles_license']?></td>
            <td><?=$vehicles['vehicles_acquisition']?></td>
            <td><? echo $vehicles['vehicles_power']?></td>
            <td><?if ($vehicles['vehicles_load_capacity']!=0){echo $vehicles['vehicles_load_capacity'];}else{echo "";}?></td>
            <td><a class="btn btn-warning fa fa-pencil edit_open" data-data='<?=json_encode($vehicles); ?>'></a></td>
            <td><a href="/new-farmer/remove_vehicles/<?=$vehicles['id_vehicles']?>" class="btn btn-danger fa fa-remove"></a></td>
        </tr>
    <? }?>
    </tbody>
</table>
    </div>
</div>
<div id="newVehicles" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <form method="post" action="/new-farmer/create_vehicles">
                <div class="box-bodyn">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <span class="box-title"><?=$language['new-farmer']['190']?></span>
                </div>
            <div class="modal-body">
                    <label>Тип с/г техніки</label>
                    <select class="form-control inphead vehicle_kind" name="vehicle_kind" required>
                        <?if($_COOKIE['lang']=='ua'){?>
                            <?php foreach ($date['kind_vehicles']['ua'] as $kind_vehicles_id=>$kind_vehicles){?>
                                <option  value="<?=$kind_vehicles_id?>"><?=$kind_vehicles?></option>
                            <?}}?>
                            <?if($_COOKIE['lang']=='gb'){?>
                                <?php foreach ($date['kind_vehicles']['gb'] as $kind_vehicles_id=>$kind_vehicles){?>
                                    <option value="<?=$kind_vehicles_id?>"><?=$kind_vehicles?></option>
                            <?}}?>
                    </select>
                    <div class="vehicle_info" style="display:none "> 
                    <label><?=$language['new-farmer']['17']?></label>
                    <input type="text" name="vehicles_name" class="form-control inphead">
                    <label><?=$language['new-farmer']['31']?></label>
                    <input type="text" name="vehicles_license" class="form-control inphead" >
                    <label>Інвентарний номер</label>
                    <input type="text" name="vehicle_int_number" class="form-control inphead">
                        <label><?=$language['new-farmer']['34']?></label>
                        <input type="text" name="vehicles_power" class="form-control inphead" >
                        <div class="load_capacity" style="display: none">
                            <label>Вантажопідйомність, т</label>
                            <input type="text" name="load_capacity" class="form-control inphead">
                        </div>
                    <label><?=$language['new-farmer']['32']?></label>
                    <select name="vehicles_fuel" class="form-control inphead">
                        <?php  foreach ($date['fuel_type']['ua'] as $id_type=>$name_type){?>
                        <option value="<?=$id_type?>"><?=$name_type?></option>
                        <? }?>
                    </select>
                    <label><?=$language['new-farmer']['20']?></label>
                    <select class="form-control inphead" name="vehicles_acquisition" required>
                        <?php for($x=2017;$x>=1930;$x--){?>
                            <option><?=$x?></option>
                        <?}?>
                    </select>
                        <label>Вартість, тис. грн</label>
                        <input type="text" name="purchase_price" class="form-control inphead">
                    <label><?=$language['new-farmer']['22']?></label>
                    <input type="text" name="usage_year" class="form-control inphead">
                    <input type="hidden" name="current_year" value="<?php echo date('Y')?>">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                <button type="submit" class="btn btn-primaryn"><?=$language['new-farmer']['27']?></button>
            </div>
            </form>
        </div>
    </div>
</div>
<div id="editVehicles" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <form method="post" action="/new-farmer/edit_vehicles">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" style="text-align: center;"><?=$language['new-farmer']['190']?></h4>
                </div>
                <div class="modal-body">
                    <input id="id_vehicles" type="hidden" name="id_vehicles">
                    <label>Тип с/г техніки</label>
                    <select class="form-control inphead" id="edit_vehicles_kind" name="vehicle_kind"> 
                        <?if($_COOKIE['lang']=='ua'){?>
                            <?php foreach ($date['kind_vehicles']['ua'] as $kind_vehicles_id=>$kind_vehicles){?>
                                <option  value="<?=$kind_vehicles_id?>"><?=$kind_vehicles?></option>
                            <?}}?>
                            <?if($_COOKIE['lang']=='gb'){?>
                                <?php foreach ($date['kind_vehicles']['gb'] as $kind_vehicles_id=>$kind_vehicles){?>
                                    <option value="<?=$kind_vehicles_id?>"><?=$kind_vehicles?></option>
                            <?}}?>
                    </select>
                    <label><?=$language['new-farmer']['17']?></label>
                    <input type="text" name="vehicles_name" id="vehicles_name" class="form-control inphead" >
                    <label><?=$language['new-farmer']['31']?></label>
                    <input type="text" name="vehicles_license" id="vehicles_license" class="form-control inphead" >
                    <label>Інвентарний номер</label>
                    <input type="text" name="vehicle_int_number" id="vehicle_int_number" class="form-control inphead">
                    <label><?=$language['new-farmer']['34']?></label>
                    <input type="text" name="vehicles_power" id="vehicles_power" class="form-control inphead" required>
                    <div class="edit_load_capacity" style="display: none">
                        <label>Вантажопідйомність, т</label>
                        <input type="text" name="load_capacity" id="load_capacity" class="form-control inphead">
                    </div>
                    <label><?=$language['new-farmer']['32']?></label>
                    <select name="vehicles_fuel" id="vehicles_fuel" class="form-control inphead">
                        <?php  foreach ($date['fuel_type']['ua'] as $id_type=>$name_type){?>
                            <option value="<?=$id_type?>"><?=$name_type?></option>
                        <? }?>
                    </select>
                    <label><?=$language['new-farmer']['20']?></label>
                    <select class="form-control inphead" name="vehicles_acquisition" id="vehicles_acquisition" required>
                        <?php for($x=2017;$x>=1930;$x--){?>
                            <option><?=$x?></option>
                        <?}?>
                    </select>
                    <label><?=$language['new-farmer']['33']?></label>
                    <input type="text" name="purchase_price" id="vehicles_purchase_price" class="form-control inphead">
                    <label><?=$language['new-farmer']['22']?></label>
                    <input type="text" name="usage_year" id="vehicles_usage_year" class="form-control inphead">
                    <input type="hidden" name="current_year" value="<?php echo date('Y')?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primaryn">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.edit_open').click(edit_open);
        function edit_open() {
            var json_vehicles=$(this).attr('data-data');
            var vehicles=JSON.parse( json_vehicles );
            $('#editVehicles').modal('show');
            $('#id_vehicles').val(vehicles['id_vehicles']);
            $('#edit_vehicles_kind').val(vehicles['vehicles_kind']);
            $('#vehicles_name').val(vehicles['vehicles_name']);
            $('#vehicles_license').val(vehicles['vehicles_license']);
            $('#vehicle_int_number').val(vehicles['vehicles_inventory_number']);
            $('#vehicles_fuel').val(vehicles['vehicles_fuel']);
            $('#vehicles_acquisition').val(vehicles['vehicles_acquisition']);
            $('#vehicles_power').val(vehicles['vehicles_power']);
            $('#vehicles_usage_year').val(vehicles['vehicles_usage_year']);
            $('#vehicles_purchase_price').val(vehicles['vehicles_purchase_price']);
            if(vehicles['vehicles_kind']==3){
                $('.edit_load_capacity').css('display','block');
                $('#load_capacity').val(vehicles['vehicles_load_capacity']);
            }
        }
        $('.vehicle_kind').change(function (){
            var kind = $(this).val();
            if(kind == 3){
                $('.vehicle_info').css('display','block');
                $('.load_capacity').css('display','block');
            }else{
                $('.vehicle_info').css('display','block');
                $('.load_capacity').css('display','none');
            }
        });
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
