<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('hero/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('hero/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'hero/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['name']->renderLabel() ?></th>
        <td>
          <?php echo $form['name']->renderError() ?>
          <?php echo $form['name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['legend']->renderLabel() ?></th>
        <td>
          <?php echo $form['legend']->renderError() ?>
          <?php echo $form['legend'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['image_filename']->renderLabel() ?></th>
        <td>
          <?php echo $form['image_filename']->renderError() ?>
          <?php echo $form['image_filename'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['primary_attribute_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['primary_attribute_id']->renderError() ?>
          <?php echo $form['primary_attribute_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['intro']->renderLabel() ?></th>
        <td>
          <?php echo $form['intro']->renderError() ?>
          <?php echo $form['intro'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['background']->renderLabel() ?></th>
        <td>
          <?php echo $form['background']->renderError() ?>
          <?php echo $form['background'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['type_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['type_id']->renderError() ?>
          <?php echo $form['type_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['affiliation_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['affiliation_id']->renderError() ?>
          <?php echo $form['affiliation_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['basic_strength']->renderLabel() ?></th>
        <td>
          <?php echo $form['basic_strength']->renderError() ?>
          <?php echo $form['basic_strength'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['basic_agility']->renderLabel() ?></th>
        <td>
          <?php echo $form['basic_agility']->renderError() ?>
          <?php echo $form['basic_agility'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['basic_intelligence']->renderLabel() ?></th>
        <td>
          <?php echo $form['basic_intelligence']->renderError() ?>
          <?php echo $form['basic_intelligence'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['add_strength']->renderLabel() ?></th>
        <td>
          <?php echo $form['add_strength']->renderError() ?>
          <?php echo $form['add_strength'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['add_agility']->renderLabel() ?></th>
        <td>
          <?php echo $form['add_agility']->renderError() ?>
          <?php echo $form['add_agility'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['add_intelligence']->renderLabel() ?></th>
        <td>
          <?php echo $form['add_intelligence']->renderError() ?>
          <?php echo $form['add_intelligence'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['hp']->renderLabel() ?></th>
        <td>
          <?php echo $form['hp']->renderError() ?>
          <?php echo $form['hp'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mana']->renderLabel() ?></th>
        <td>
          <?php echo $form['mana']->renderError() ?>
          <?php echo $form['mana'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['min_damage']->renderLabel() ?></th>
        <td>
          <?php echo $form['min_damage']->renderError() ?>
          <?php echo $form['min_damage'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['max_damage']->renderLabel() ?></th>
        <td>
          <?php echo $form['max_damage']->renderError() ?>
          <?php echo $form['max_damage'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
