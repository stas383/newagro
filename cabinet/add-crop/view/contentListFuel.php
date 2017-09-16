<div class="row">

    <div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
        <h3 class="page-header">Список видів палива</h3>
        <?php
        foreach ($date as $listFuilKey){?>

            <div class="row ">
                <div class="col-sm-6 col-md-offset-2 col-md-5">
                    <div class="form-group">
<!--                        <input type="hidden" value="--><?php //echo $listFuilKey['id_fuel']?><!--">-->
                        <input date-type="name_fuel_ua" date-id="<?php echo $listFuilKey['id_fuel']?>" name="name_<?php echo $listFuilKey['id_fuel']?>" type="text" class="classEdit form-control" id="exampleInputEmail1" placeholder="Назва палива" maxlength="30" required value="<?php echo $listFuilKey['name_fuel_ua'];?>">
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input date-type="price_fuel"  date-id="<?php echo $listFuilKey['id_fuel']?>" name="price_<?php echo $listFuilKey['id_fuel']?>" type="text" class="classEdit form-control" placeholder="Вартість палива"  pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required value="<?php echo $listFuilKey['price_fuel'];?>">
                    </div>
                </div>
            </div>
            <br>
        <?php }?>


    </div>
</div>
<script>
    $(document).ready(function() {
        $('.classEdit').change(edit);
        function edit() {
            var id = $(this).attr('date-id');
            var type = $(this).attr('date-type');
            var value = $(this).val();
            $.ajax({
                type : 'post',
                url : '/add-crop/edit-save-crop-list',
                data : {
                    'id' :  id,
                    'type' : type,
                    'value' : value
                },
                response : 'text',
                success : function(html) {
                    $('#truy').hide(200);
                    $('#truy').html(html);
                    $('#truy').show(200);
                }
            });
        };
    });
</script>

<div id="truy" class="alertInfo alert alert-success " style="display: none"></div>