

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
                                <th>Дата закриття задачі</th>
                                <th>Час закриття задачі</th>
                            </tr>
                        </thead>
                        <tbody class="bd">
                            <?php foreach ($date['close_task'] as $sm_task){
                                ?>
                            <tr class="">
                                <td><? echo $sm_task['date_start']?></td>
                                <td><? echo $sm_task['date_end']?></td>
                                <td><? echo $date['worker'][$sm_task['worker_id']]['name']?></td>
                                <td><? echo $date['priority'][$sm_task['priority']]['priority']?></td>
                                <td><? echo $sm_task['time_to_do']?></td>
                                <td><? echo $sm_task['description']?></td>
                                <td><? echo $sm_task['date_close']?></td>
                                <td><? echo $sm_task['time_close']?></td>
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
            
            $.ajax({
                type : 'post',
                url : '/shop/endTask',
                data : {
                        'id': id
                },
                    response : 'text',
                    success : function() {
                        
                    }

            });
        });
    });
</script>