<h1>Items List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Image filename</th>
      <th>Description</th>
      <th>Additional info</th>
      <th>Strength</th>
      <th>Agility</th>
      <th>Intelligence</th>
      <th>Damage</th>
      <th>Armor</th>
      <th>Hp</th>
      <th>Mana</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Items as $Item): ?>
    <tr>
      <td><a href="<?php echo url_for('item/edit?id='.$Item->getId()) ?>"><?php echo $Item->getId() ?></a></td>
      <td><?php echo $Item->getName() ?></td>
      <td><?php echo $Item->getImageFilename() ?></td>
      <td><?php echo $Item->getDescription() ?></td>
      <td><?php echo $Item->getAdditionalInfo() ?></td>
      <td><?php echo $Item->getStrength() ?></td>
      <td><?php echo $Item->getAgility() ?></td>
      <td><?php echo $Item->getIntelligence() ?></td>
      <td><?php echo $Item->getDamage() ?></td>
      <td><?php echo $Item->getArmor() ?></td>
      <td><?php echo $Item->getHp() ?></td>
      <td><?php echo $Item->getMana() ?></td>
      <td><?php echo $Item->getPrice() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('item/new') ?>">New</a>
