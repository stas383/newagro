
<div class="table-responsive">
<table class="table"> 
	<thead class="tabletop">
		<th><?=$language['new-farmer']['65']?></th>
		<th><?=$language['new-farmer']['66']?></th>
		<th><?=$language['new-farmer']['67']?></th>
		<th><?=$language['new-farmer']['68']?></th>
		<th><?=$language['new-farmer']['69']?></th>
		<th><?=$language['new-farmer']['70']?></th>
		<th><?=$language['new-farmer']['71']?></th>
	</thead>
	<tbody>
	<?foreach($date['action'] as $action){?>
		<tr>
		<?foreach($date['operation'] as $operation)if($action['action_action_type_id'] == $operation['action_id']){?>
			<td><? if($_COOKIE['lang']=='gb'){echo $operation['name_en'];}elseif($_COOKIE['lang']=='ua'){echo $operation['name_ua'];}?></td>
		<?}?>
		<?foreach($date['operation'] as $operation)if($action['action_action_id'] == $operation['action_id']){?>
			<td><? if($_COOKIE['lang']=='gb'){echo $operation['name_en'];}elseif($_COOKIE['lang']=='ua'){echo $operation['name_ua'];}?></td>
		<?}?>
			<td><?=$action['action_date_start']?></td>
			<td><?=$action['action_date_end']?></td>
		<?foreach($date['sum_pay'] as $key =>$sum_pay) if($action['action_id']==$key){?>
			<td><?=$sum_pay?></td>
			<?}?>
            <?if($date['sum_material'] != false){
                foreach($date['sum_material'] as $key=>$sum_material)if($action['action_id']==$key){?>
            <td><?=$sum_material?></td>
            <?}}
                else{?>
                <td><? echo '0';?></td>
            <?}?>

		<?foreach($date['sum_equipment'] as $key=>$sum_equipment)if($action['action_id']==$key){?>
			<td><?=$sum_equipment?></td>
		<?}?>
		</tr>
		<?}?>
	</tbody>
</table>
</div>