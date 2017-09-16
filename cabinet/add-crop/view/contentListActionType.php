<div class="row">

    <div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
        <h3 class="page-header">Типи операцій</h3>
        <?php
        foreach ($date as $listActionType){?>

            <div class="row ">
                <div class="col-sm-6 col-md-offset-2 col-md-5">
                    <div class="form-group">
                        <input name="name" date-type="name_action_type_ua" date-id="<?php echo $listActionType['id_action_type']?>"  type="text" class="classEdit form-control" id="exampleInputEmail1" placeholder="Назва палива" maxlength="30" required value="<?php echo $listActionType['name_action_type_ua'];?>">
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <input date-type="unit" date-id="<?php echo $listActionType['id_action_type']?>"  type="text" class="classEdit form-control" placeholder="Вартість палива"  pattern="[+]?[0-9]{1,3}\.?,?[0-9]{0,2}" required value="<?php echo $listActionType['unit'];?>">
                    </div>
                </div>
            </div>
            <br>
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
                url : '/add-crop/edit-save-action-type',
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