<tr>
	<th><?php echo "NAME"?></th>
	<th><?php echo "STR"?></th>
	<th><?php echo "AGI"?></th>
	<th><?php echo "INT"?></th>
	<th><?php echo "MIN DAMAGE"?></th>
	<th><?php echo "MAX DAMAGE"?></th>
	<th><?php echo "HP"?></th>
	<th> <?php echo "MANA"?></th>
</tr>

<?php foreach($data as $datum):?>
	<tr>
		<td><strong><?php echo $datum->get('name')?></strong></td>
		<td><?php echo $datum->get('str')?></td>
		<td><?php echo $datum->get('agi')?></td>
		<td><?php echo $datum->get('int')?></td>
		<td><?php echo $datum->get('minDamage')?></td>
		<td><?php echo $datum->get('maxDamage')?></td>
		<td><?php echo $datum->get('hp')?></td>
		<td><?php echo $datum->get('mana')?></td>
	</tr>
<? endforeach; ?>
