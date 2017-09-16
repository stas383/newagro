<style>
    .heade_form{
        font-size: 17px;
    }
</style>
<script>
    $(document).ready(function (){
        $("#trash").click(trash);
        function trash() {
            $('form input[type="text"]').val('');
        }
    });
</script>
<section class="content">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-body table-responsive no-padding">
            </div>
        </div>
    </div>
    <form action="/farmer/save-form_m/<?php echo $date["table"]?>" method="post">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?=$language['farmer']['95'];?></h3>
                <div class="box-tools">
                    <button type="button" class="btn btn-danger" id="trash" ><i class="fa fa-fw fa-trash-o"></i> <?=$language['farmer']['14'];?></button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-save"></i> <?=$language['farmer']['15'];?></button>
                </div>
            </div>
            <div class="box-body">
                <table class="table">
                    <tbody>
                    <tr>
                        <th class="text-center" colspan="5"><h3><?=$language['farmer']['90'];?></h3></th>
                    </tr>
                    <tr>
                        <th class="text-center"><?=$language['farmer']['83'];?></th>
                        <th class="text-center"><?=$language['farmer']['85'];?></th>
                        <th class="text-center">2014</th>
                        <th class="text-center">2015</th>
                        <th class="text-center">2016</th>
                    </tr>
                    <tr>
                        <th class="text-center">1</th>
                        <th class="text-center">2</th>

                        <th class="text-center"><?=$language['farmer']['91'];?></th>
                        <th class="text-center"><?=$language['farmer']['91'];?></th>
                        <th class="text-center"><?=$language['farmer']['91'];?></th>
                    </tr>
                    <?php foreach ($date["title"] as $title)if($title["type"]==3){?>
                        <tr>
                            <td <?php if($title["b"]==false){?>class="text-center"<? }?>><?php  if($_COOKIE['lang'] == 'gb'){echo $title["EN"];} else{echo $title['UA'];}?></td>
                            <td class="text-center"><b><?php echo $title["b"]?></b></td>
                            <?php if($title["b"]!=false){?>
                                <td class="text-center"><input name="e2014-<?php echo $title["b"]?>" type="text" class="form-control classEdit" pattern="[-+]?[0-9]*\.?,?[0-9]*" value="<?php echo $date["date"][$title["b"]]["e14"]?>"></td>
                                <td class="text-center"><input name="e2015-<?php echo $title["b"]?>" type="text" class="form-control classEdit" pattern="[-+]?[0-9]*\.?,?[0-9]*" value="<?php echo $date["date"][$title["b"]]["e15"]?>"></td>
                                <td class="text-center"><input name="e2016-<?php echo $title["b"]?>" type="text" class="form-control classEdit" pattern="[-+]?[0-9]*\.?,?[0-9]*" value="<?php echo $date["date"][$title["b"]]["e16"]?>"></td>
                            <? } ?>
                        </tr>
                    <?} ?>
                    <tr>
                        <th colspan="4"><br></th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</section>
