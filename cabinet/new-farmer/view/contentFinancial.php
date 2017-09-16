
<table class="table">
    <tbody>
        <?foreach ($date['fin_table_ua'] as $key=>$value){?>
            <tr>
                <th><?=$value?></th>
                <?foreach ($date['budget']['remains']['fin'] as $item){?>
                    <td><?if($key=='crop_name') echo $item[$key]; else echo number_format($item[$key]);?></td>
                <?}?>
            </tr>
        <?}?>
    </tbody>
</table>