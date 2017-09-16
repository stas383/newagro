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
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Звіт про фінансові результати</h3>
            </div>
            <div class="box-body">
                <table class="table">
                    <tbody>
                    <tr>
                        <th class="text-center" colspan="5"><h3>І. Фінансові результати</h3></th>
                    </tr>
                    <tr>
                        <th class="text-center">Актив</th>
                        <th class="text-center">Код рядка</th>
                        <th class="text-center">2014</th>
                        <th class="text-center">2015</th>
                        <th class="text-center">2016</th>
                    </tr>
                    <tr>
                        <th class="text-center">1</th>
                        <th class="text-center">2</th>

                        <th class="text-center">За звітний період</th>
                        <th class="text-center">За звітний період</th>
                        <th class="text-center">За звітний період</th>
                    </tr>
                    <?php foreach ($date["title"] as $title)if($title["type"]==3){?>
                        <tr>
                            <td <?php if($title["b"]==false){?>class="text-center"<? }?>><?php echo $title["UA"]?></td>
                            <td class="text-center"><b><?php echo $title["b"]?></b></td>
                            <?php if($title["b"]!=false){?>
                                <td class="text-center"><input disabled name="e2014-<?php echo $title["b"]?>" type="text" class="form-control classEdit" pattern="[-+]?[0-9]*\.?,?[0-9]*" value="<?php echo $date["date"][$title["b"]]["e14"]?>"></td>
                                <td class="text-center"><input disabled name="e2015-<?php echo $title["b"]?>" type="text" class="form-control classEdit" pattern="[-+]?[0-9]*\.?,?[0-9]*" value="<?php echo $date["date"][$title["b"]]["e15"]?>"></td>
                                <td class="text-center"><input disabled name="e2016-<?php echo $title["b"]?>" type="text" class="form-control classEdit" pattern="[-+]?[0-9]*\.?,?[0-9]*" value="<?php echo $date["date"][$title["b"]]["e16"]?>"></td>
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
</section>
