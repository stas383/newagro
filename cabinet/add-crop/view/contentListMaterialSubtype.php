<div class="row">

    <div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
        <h3 class="page-header">Список видів ЗЗР</h3>
        <?php
        foreach ($date as $listMaterialSubtype){?>

            <div class="row ">
                <div class="col-sm-3 col-sm-6 col-md-offset-3 col-md-6">
                    <div class="form-group">
                        <input name="name" type="text" date-type="name_subtype_ua" date-id="<?php echo $listMaterialSubtype['id_subtype']; ?>" class="classEdit form-control" id="exampleInputEmail1" placeholder="Назва палива" maxlength="30" required value="<?php echo $listMaterialSubtype['name_subtype_ua'];?>">
                    </div>
                </div>
            </div>
        <?php }?>


    </div>
</div>
<script>
    $(document).ready(function() {
        $('.classEdit').blur(edit);
        function edit() {
            var type = $(this).attr('date-type');
            var id = $(this).attr('date-id');
            var value = $(this).val();
            $.ajax({
                type : 'post',
                url : '/add-crop/edit-save-material-subtype',
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