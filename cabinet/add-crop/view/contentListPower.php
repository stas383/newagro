<div class="row">

    <div class="col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
        <h3 class="page-header">Марка с/г машини</h3>
        <?php
        foreach ($date as $listKey){?>

            <div class="row ">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <input date-id="<?php echo $listKey['id_power']?>" name="name_<?php echo $listKey['id_power']?>" type="text" class="classEdit form-control" id="exampleInputEmail1" placeholder="Назва палива" maxlength="30" required value="<?php echo $listKey['name_power_ua'];?>">
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
            var type = "power";
            var id = $(this).attr('date-id');
            var value = $(this).val();
            $.ajax({
                type : 'post',
                url : '/add-crop/save-edit-equipment-name',
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