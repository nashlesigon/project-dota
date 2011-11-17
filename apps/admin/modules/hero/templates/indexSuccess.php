<h1>Heros List</h1>

<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Legend</th>
      <th>Image filename</th>
      <th>Primary attribute</th>
      <th>Intro</th>
      <th>Background</th>
      <th>Type</th>
      <th>Affiliation</th>
      <th>Basic strength</th>
      <th>Basic agility</th>
      <th>Basic intelligence</th>
      <th>Add strength</th>
      <th>Add agility</th>
      <th>Add intelligence</th>
      <th>Hp</th>
      <th>Mana</th>
      <th>Min damage</th>
      <th>Max damage</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Heros as $Hero): ?>
    <tr>
      <td><a href="<?php echo url_for('hero/edit?id='.$Hero->getId()) ?>"><?php echo $Hero->getName() ?></a></td>
      <td><?php echo $Hero->getLegend() ?></td>
      <td><?php echo $Hero->getImageFilename() ?></td>
      <td><?php echo $Hero->getPrimaryAttributeId() ?></td>
      <td><?php echo $Hero->getIntro() ?></td>
      <td><?php echo $Hero->getBackground() ?></td>
      <td><?php echo $Hero->getTypeId() ?></td>
      <td><?php echo $Hero->getAffiliationId() ?></td>
      <td><?php echo $Hero->getBasicStrength() ?></td>
      <td><?php echo $Hero->getBasicAgility() ?></td>
      <td><?php echo $Hero->getBasicIntelligence() ?></td>
      <td><?php echo $Hero->getAddStrength() ?></td>
      <td><?php echo $Hero->getAddAgility() ?></td>
      <td><?php echo $Hero->getAddIntelligence() ?></td>
      <td><?php echo $Hero->getHp() ?></td>
      <td><?php echo $Hero->getMana() ?></td>
      <td><?php echo $Hero->getMinDamage() ?></td>
      <td><?php echo $Hero->getMaxDamage() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('hero/new') ?>">New</a>
