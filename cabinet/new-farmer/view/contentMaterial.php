<style>
#sub_type_material, #label_sub_type_material,.filter_ppa{
    display: none;
}
</style>
<section class="content">
    <div class="box">
        <div class="box-bodyn">
            <div class="non-semantic-protector">
                <h1 class="ribbon">
                    <strong class="ribbon-content">Planning material</strong>
                </h1>
            </div>
        </div>
    </div>
    <div class="rown">
        <div class="col-sm-9">
            <table class="table">
                <thead>
                    <tr>
                        <th>type</th>
                        <th>name</th>
                        <th>price</th>
                        <th ></th>
                    </tr>
                </thead>
                <tbody>
                    <?foreach ($date['material'] as $material){?>
                        <tr class="materil_list type_material_<?=$material['id_type_material']; if($material['id_type_material']==3){?> subtype_<?=$material['key_material']; }?>">
                            <td><?=$date['type_material']['ua'][$material['id_type_material']]?><? if($material['id_type_material']==3) echo '/'.$date['ppa_material']['ua'][$material['key_material']]?></td>
                            <td><?=$material['name_material']?></td>
                            <td><?=$material['price_material']?></td>
                            <td style="width: 150px">
                                <button data-material='<?=json_encode($material)?>' class="btn btn-warning fa fa-pencil edit_material"></button>
                                <a href="/new-farmer/remove_material/<?=$material['id_material_price']?>" class="btn btn-danger fa fa-remove"></a>
                            </td>
                        </tr>
                    <?}?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-3">
            <br>
            <button id="add_new_material" class="btn btn-block">add new material</button>
            <hr>
            <h4 class="text-center">filter</h4>
            <select class="form-control filter_type">
                <option value="0">Всі матеріали</option>
                <?php foreach ($date['type_material']['ua'] as $key=>$value){?>
                   <option value="<?=$key?>"><?=$value?></option>
                <?} ?>
            </select>
            <br>
            <select class="form-control filter_ppa">
                <option value="0">Всі види</option>
                <?php foreach ($date['ppa_material']['ua'] as $key=>$value){?>
                    <option value="<?=$key?>"><?=$value?></option>
                <?} ?>
            </select>
        </div>
    </div>
</section>
<div id="material_modal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content wt">
            <div class="box-bodyn">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <span class="box-title">Material</span>
            </div>
            <div class="modal-body">
                <form id="form_material" method="post" action="/new-farmer/save_material_bd">
                    <input type="hidden" id="id_material_price" name="id_material_price">
                <div class="row">
                    <div class="col-lg-6">
                        <label><?=$language['new-farmer']['105']?></label>
                        <input list="lib_materials" class="form-control" name="name_material" id="name_material" >
                        <datalist id="lib_materials">
                            <?foreach ($date['material_lib'] as $material_lib){?>
                                <option><?=$material_lib['name_material']?></option>
                            <?}?>
                        </datalist>
                        <br>
                        <label>Type material</label>
                        <select id="type_materia" class="form-control" name="type_material">
                            <?php foreach ($date['type_material']['ua'] as $key=>$value){?>
                                <option value="<?=$key?>"><?=$value?></option>
                            <?} ?>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label><?=$language['new-farmer']['107']?></label>
                        <input type="text" name="price_material" id="price_material" class="form-control">
                        <br>
                        <label id="label_sub_type_material">Subtype material</label>
                        <select id="sub_type_material" class="form-control" name="sub_type_material">
                            <?php foreach ($date['ppa_material']['ua'] as $key=>$value){?>
                                <option value="<?=$key?>"><?=$value?></option>
                            <?} ?>
                        </select>
                    </div>
                </div>
                <br><br>
                <button type="submit" class="btn btn-success btn-block" id="add_material_bd">save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#type_materia').change(function () {
           var value=$(this).val();
           if(value==3){
               $('#sub_type_material, #label_sub_type_material').show();
           }else {
               $('#sub_type_material, #label_sub_type_material').hide();
           }
        });
        //filter
        $('.filter_type').change(filter_type);
        function filter_type() {
            var time=200;
            var type=$(this).val();
            if(type==0){
                $('.materil_list').show(time);
                $('.filter_ppa').hide(time);
            }else {
                if(type==3){
                    $('.filter_ppa').show(time);
                }else {
                    $('.filter_ppa').hide(time);
                }
                $('.materil_list').hide(time);
                $('.type_material_'+type).show(time);
            }
        }
        $('.filter_ppa').change(filter_ppa);
        function filter_ppa() {
            var time=200;
            var subtype=$(this).val();
            $('.materil_list').hide(time);
            if(subtype==0){
                $('.type_material_3').show(time);
            }else {
                $('.subtype_' + subtype).show(time);
            }
        }
        $('#add_new_material').click(function () {
            $('#form_material').attr('action','/new-farmer/save_material_bd');
            $('#id_material_price').val('');
            $('#name_material').val('');
            $('#price_material').val('');
            $('#type_materia').val('');
            $('#sub_type_material').val('');
            $('#material_modal').modal('show');
        });
        $('.edit_material').click(function () {
            $('#form_material').attr('action','/new-farmer/save_edit_material_bd');
            var material_json=$(this).attr('data-material');
            var material=JSON.parse(material_json);
            $('#id_material_price').val(material['id_material_price']);
            $('#name_material').val(material['name_material']);
            $('#price_material').val(material['price_material']);
            $('#type_materia').val(material['id_type_material']);
            $('#sub_type_material').val(material['key_material']);
            if(material['id_type_material']==3){
                $('#sub_type_material, #label_sub_type_material').show();
            }else {
                $('#sub_type_material, #label_sub_type_material').hide();
            }
            $('#material_modal').modal('show');
        })
    });
</script>