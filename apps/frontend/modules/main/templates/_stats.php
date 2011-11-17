<tr>
   <td>
    <?php echo "NAME"?>
  </td>
  <td>
    <?php echo "STR"?>
  </td>
  <td>
    <?php echo "AGI"?>
  </td>
  <td>
    <?php echo "INT"?>
  </td>
  <td>
    <?php echo "MIN DAMAGE"?>
  </td>
  <td>
    <?php echo "MAX DAMAGE"?>
  </td>
  <td>
    <?php echo "HP"?>
  </td>
  <td>
    <?php echo "MANA"?>
  </td>
</tr>
<?php foreach($data as $datum):?>
<tr>
  <td>
    <?php echo $datum->get('name')?>
  </td>
  <td>
    <?php echo $datum->get('str')?>
  </td>
  <td>
    <?php echo $datum->get('agi')?>
  </td>
  <td>
    <?php echo $datum->get('int')?>
  </td>
  <td>
    <?php echo $datum->get('minDamage')?>
  </td>
  <td>
    <?php echo $datum->get('maxDamage')?>
  </td>
  <td>
    <?php echo $datum->get('hp')?>
  </td>
  <td>
    <?php echo $datum->get('mana')?>
  </td>
</tr>
<? endforeach; ?>
