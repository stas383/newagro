

<section class="content">
    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Дата початку</th>
                                <th>Дата закінчення</th>
                                <th>Виконавець</th>
                                <th>Пріорітет</th>
                                <th>Час виконання</th>
                                <th>Описання задачі</th>
                            </tr>
                        </thead>
                        <tbody class="bd">
                            <?php foreach ($date['task'] as $sm_task){
                                ?>
                            <tr class="">
                                <td><? echo $sm_task['date_start']?></td>
                                <td><? echo $sm_task['date_end']?></td>
                                <td><? echo $date['worker'][$sm_task['worker_id']]['name']?></td>
                                <td><? echo $date['priority'][$sm_task['priority']]['priority']?></td>
                                <td><? echo $sm_task['time_to_do']?></td>
                                <td><? echo $sm_task['description']?></td>
                                <td><a class="btn btn-success closeTask" data-id="<?=$sm_task['id']?>" data-date=<?echo date('Y.m.d')?> data-time="<?echo date('H:i:s')?>">Закрити задачу</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
</section>

<script type="text/javascript">
    $(document).ready(function(){
        $('.closeTask').click(function(){
            var id = $(this).attr('data-id');
            var date_close = $(this).attr('data-date');
            var time_close = $(this).attr('data-time');
            $.ajax({
                type : 'post',
                url : '/shop/endTask',
                data : {
                        'id': id,
                        'date_close': date_close,
                        'time_close': time_close
                },
                    response : 'text',
                    success : function() {
                        location.reload();
                    }

            });
        });
    });
</script>