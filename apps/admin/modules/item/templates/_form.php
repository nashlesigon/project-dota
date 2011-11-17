<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php use_javascript('jquery.ajax_upload.js');?>
<?php use_javascript('jquery.file_uploader.js');?>

<form action="<?php echo url_for('item/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('item/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'item/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
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
        <th><?php echo $form['image_filename']->renderLabel('Image <span>*</span>') ?></th>
<!--          <th><label for="image">Image*</label></th>-->
        <td>            
          <?php echo $form['image_filename']->renderError() ?>
          <?php echo $form['image_filename']->render() ?>
<!--          <input id="image" type="file" name="image" multiple="multiple">-->
        </td>
      </tr>
      <tr>
        <th><?php echo $form['description']->renderLabel() ?></th>
        <td>
          <?php echo $form['description']->renderError() ?>
          <?php echo $form['description'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['additional_info']->renderLabel() ?></th>
        <td>
          <?php echo $form['additional_info']->renderError() ?>
          <?php echo $form['additional_info'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['strength']->renderLabel() ?></th>
        <td>
          <?php echo $form['strength']->renderError() ?>
          <?php echo $form['strength'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['agility']->renderLabel() ?></th>
        <td>
          <?php echo $form['agility']->renderError() ?>
          <?php echo $form['agility'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['intelligence']->renderLabel() ?></th>
        <td>
          <?php echo $form['intelligence']->renderError() ?>
          <?php echo $form['intelligence'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['damage']->renderLabel() ?></th>
        <td>
          <?php echo $form['damage']->renderError() ?>
          <?php echo $form['damage'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['armor']->renderLabel() ?></th>
        <td>
          <?php echo $form['armor']->renderError() ?>
          <?php echo $form['armor'] ?>
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
        <th><?php echo $form['price']->renderLabel() ?></th>
        <td>
          <?php echo $form['price']->renderError() ?>
          <?php echo $form['price'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['store_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['store_id']->renderError() ?>
          <?php echo $form['store_id'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
