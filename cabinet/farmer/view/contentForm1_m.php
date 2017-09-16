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
    <form action="/farmer/save-form/<?php echo $result['0']?>" method="post">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Ф.1-м Баланс</h3>
                <div class="box-tools">
                    <button type="button" class="btn btn-danger" id="trash" ><i class="fa fa-fw fa-trash-o"></i> Очистити</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-save"></i> Зберегти</button>
                </div>
            </div>
            <div class="box-body">
                <table class="table">
                    <tbody>
                    <tr>
                        <th class="text-center">Актив</th>
                        <th class="text-center">Код рядка</th>
                        <th class="text-center" colspan="2">2014</th>
                        <th class="text-center">2015</th>
                        <th class="text-center">2016</th>
                    </tr>
                    <tr>
                        <th class="text-center">1</th>
                        <th class="text-center">2</th>
                        <th class="text-center">На початок звітного періоду</th>
                        <th class="text-center">На кінець звітного періоду</th>
                        <th class="text-center">На кінець звітного періоду</th>
                        <th class="text-center">На кінець звітного періоду</th>
                    </tr>
                    <?php foreach ($date['title'] as $title){?>
                        <tr>
                            <td class="text-center"><?php echo $title?></td>
                        </tr>
                    <?} ?>

                    <tr>
                        <th colspan="4"><br></th>

                    </tr>

                    <tr>
                        <th class="text-center">Пасив</th>
                        <th class="text-center">Код рядка</th>
                        <th class="text-center" colspan="2">2014</th>
                        <th class="text-center">2015</th>
                        <th class="text-center">2016</th>
                    </tr>
                    <tr>
                        <th class="text-center">1</th>
                        <th class="text-center">2</th>
                        <th class="text-center">На початок звітного періоду</th>
                        <th class="text-center">На кінець звітного періоду</th>
                        <th class="text-center">На кінець звітного періоду</th>
                        <th class="text-center">На кінець звітного періоду</th>
                    </tr>
                    </tbody>
                </table>




            </div>
        </div>
    </form>
</section>