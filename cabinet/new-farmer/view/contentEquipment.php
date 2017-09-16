<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 27.07.2017
 * Time: 11:40
 */
$unit = array(
    1=>'м³',
    2=>'t',
    3=>'l'
    );
/*$equipment_kind = array(
    1=>'Sprayer',
    2=>'Field cultivator',
    3=>'Cutters and Shredders',
    4=>'Planters',
    5=>'Plow',
    6=>'Baler',
    7=>'Reaper- binder',
    8=>'Harrow',
    9=>'Disc harrow',
    10=>'Grain cart',
    11=>'Drill',
    12=>'Spreader',
    13=>'Cultivator',
    14=>'Cultipacker',
    15=>'Destoner',
    16=>'Mower',
    17=>'Mixer- wagon',
    18=>'Hay rake',
    19=>'Potato planter',
    20=>'Stone picker',
    21=>'Subsoiler',
    22=>'Tedder',
    23=>'Trailer',
    24=>'Other',
    );*/
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
            <strong class="ribbon-content"><?=$language['new-farmer']['191']?></strong>
        </h1>
    </div>

</div>
<div class="box-bodyn col-lg-12" style="max-height: 55px">
    <div class="row">
        <div class="col-lg-4">
            <input class="searchs" id="search" type="text" placeholder="Поиск" style="float: left">
        </div>
        <div class="col-lg-4">
            <a class="btn btn-primaryn top sh" href="#newEquipment" data-toggle="modal"><?=$language['new-farmer']['16']?></a>
        </div>
    </div>



</div>
<div class="rown">
    <div class="table-responsive">
<table class="table">
    <thead>
        <tr class="tabletop">
            <th><?=$language['new-farmer']['18']?></th>
            <th><?=$language['new-farmer']['17']?></th>
            <th><?=$language['new-farmer']['24']?></th>
            <th><?=$language['new-farmer']['23']?></th>
            <!--<th><?/*=$language['new-farmer']['19']*/?></th>-->
            <th><?=$language['new-farmer']['20']?></th>
            <th></th><th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($date['equipment'] as $equipment){?>
        <tr>
            <td><?=$date['equipment_type']['ua'][$equipment['equipment_type']]?></td>
            <td><?=$equipment['equipment_name']?></td>
            <td><? if($equipment['equipment_width']!=0){echo $equipment['equipment_width'];}else{echo "";}?></td>
            <td><? if($equipment['equipment_capacity']!=0){echo $equipment['equipment_capacity'].' '.$unit[$equipment['equipment_unit']];}else{ echo "";}?></td>
           <!-- <td><?/*=$equipment_kind[$equipment['equipment_kind']]*/?></td>-->
            <td><?=$equipment['equipment_aquisition']?></td>
            <td><a class="btn btn-warning fa fa-pencil edit_open" data-data='<?=json_encode($equipment); ?>'></a></td>
            <td><a href="/new-farmer/remove_equipment/<?=$equipment['id_equipment']?>" class="btn btn-danger fa fa-remove"></a></td>
        </tr>
    <? }?>
    </tbody>
</table>
    </div>
</div>
<div id="newEquipment" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <form method="post" action="/new-farmer/create_equipment">
                <div class="box-bodyn">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <span class="box-title"><?=$language['new-farmer']['192']?></span>
                </div>

            <div class="modal-body">
                <label><?=$language['new-farmer']['18']?></label>
                <select name="equipment_type" class="form-control inphead">
                    <?php  foreach ($date['equipment_type']['ua'] as $id_type=>$name_type){?>
                        <option value="<?=$id_type?>"><?=$name_type?></option>
                    <? }?>
                </select>
                    <label><?=$language['new-farmer']['17']?></label>
                    <input type="text" name="equipment_name" class="form-control inphead" required>
                <label>Інвентарний номер</label>
                <input type="text" name="equipment_int_number" class="form-control inphead">
                    <!--<label><?/*=$language['new-farmer']['19']*/?></label>-->
<!--                    <select name="equipment_kind" class="form-control inphead">
                        <?/*foreach($equipment_kind as $key => $value){*/?>
                            <option value="<?/*=$key*/?>"><?/*=$value*/?></option>
                        <?/*}*/?>
                    </select>-->
                    <label><?=$language['new-farmer']['24']?></label>
                    <input type="text" name="equipment_width" class="form-control inphead" >
                <div class="row">
                    <div class="col-lg-6">
                        <label><?=$language['new-farmer']['23']?></label>
                        <input type="text" name="equipment_capacity" class="form-control inphead" >
                    </div>
                    <div class="col-lg-6">
                        <label><?=$language['new-farmer']['25']?></label>
                        <select class="form-control inphead" name="equipment_unit">
                            <option value="1">м³</option>
                            <option value="2">t</option>
                            <option value="3">l</option>
                        </select>
                    </div>
                </div>

                <label><?=$language['new-farmer']['20']?></label>
                <input type="text" name="equipment_aquisition" class="form-control inphead" >
                <label><?=$language['new-farmer']['33']?></label>
                <input type="text" name="equipment_Price" class="form-control inphead" >
                <label><?=$language['new-farmer']['22']?></label>
                <input type="text" name="equipment_usage" class="form-control inphead" >
                   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                <button type="submit" class="btn btn-primaryn"><?=$language['new-farmer']['27']?></button>
            </div>
            </form>
        </div>
    </div>
</div>
<div id="editEquipment" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <form method="post" action="/new-farmer/edit_equipment">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" style="text-align: center;"><?=$language['new-farmer']['192']?></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="ed_id_equipment" name="ed_id_equipment">
                    <label><?=$language['new-farmer']['18']?></label>
                    <select id="ed_equipment_type" name="ed_equipment_type" class="form-control inphead">
                        <?php  foreach ($date['equipment_type']['ua'] as $id_type=>$name_type){?>
                            <option value="<?=$id_type?>"><?=$name_type?></option>
                        <? }?>
                    </select>
                    <label><?=$language['new-farmer']['17']?></label>
                    <input type="text" id="ed_equipment_name" name="ed_equipment_name" class="form-control inphead" required>
                    <label>Інвентарний номер</label>
                    <input type="text" name="ed_equipment_int_number" id="ed_int_number" class="form-control inphead">
                    <!--<label><?/*=$language['new-farmer']['19']*/?></label>
                    <select name="ed_equipment_kind" id="ed_equipment_kind" class="form-control inphead">
                        <?/*foreach($equipment_kind as $key => $value){*/?>
                            <option value="<?/*=$key*/?>"><?/*=$value*/?></option>
                        <?/*}*/?>
                    </select>-->
                    <label><?=$language['new-farmer']['24']?></label>
                    <input type="text" id="ed_equipment_width" name="ed_equipment_width" class="form-control inphead" >
                    <div class="row">
                        <div class="col-lg-6">
                            <label><?=$language['new-farmer']['23']?></label>
                            <input type="text" id="ed_equipment_capacity" name="ed_equipment_capacity" class="form-control inphead" >
                        </div>
                        <div class="col-lg-6">
                            <label><?=$language['new-farmer']['25']?></label>
                            <select class="form-control inphead" name="ed_equipment_unit" id="ed_equipment_unit">
                                <option value="1">м³</option>
                                <option value="2">t</option>
                            </select>
                        </div>
                    </div>
                    <label><?=$language['new-farmer']['20']?></label>
                    <input type="text" id="ed_equipment_acquisition" name="ed_equipment_acquisition" class="form-control inphead" >
                    <label><?=$language['new-farmer']['33']?></label>
                    <input type="text"  id="ed_equipment_price" name="ed_equipment_price" class="form-control inphead" >
                    <label><?=$language['new-farmer']['22']?></label>
                    <input type="text" id="ed_equipment_usage" name="ed_equipment_usage" class="form-control inphead" >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?=$language['new-farmer']['26']?></button>
                    <button type="submit" class="btn btn-primaryn"><?=$language['new-farmer']['27']?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.edit_open').click(edit_open);
        function edit_open() {
            var json_equipment=$(this).attr('data-data');
            var equipment=JSON.parse( json_equipment );
            $('#editEquipment').modal('show');
            $('#ed_id_equipment').val(equipment['id_equipment']);
            $('#ed_equipment_name').val(equipment['equipment_name']);
            $('#ed_int_number').val(equipment['equipment_inventory_number']);
            $('#ed_equipment_type').val(equipment['equipment_type']);
            $('#ed_equipment_capacity').val(equipment['equipment_capacity']);
            $('#ed_equipment_width').val(equipment['equipment_width']);
            $('#ed_equipment_acquisition').val(equipment['equipment_aquisition']);
            $('#ed_equipment_price').val(equipment['equipment_price']);
            $('#ed_equipment_unit').val(equipment['equipment_unit']);
            $('#ed_equipment_usage').val(equipment['equipment_usage']);
            $('#ed_equipment_kind').val(equipment['equipment_kind']);
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
