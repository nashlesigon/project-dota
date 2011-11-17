<?php

/**
 * ItemRecipe form base class.
 *
 * @method ItemRecipe getObject() Returns the current form's model object
 *
 * @package    dota_resource
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseItemRecipeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'item_id'   => new sfWidgetFormPropelChoice(array('model' => 'Item', 'add_empty' => false)),
      'parent_id' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'item_id'   => new sfValidatorPropelChoice(array('model' => 'Item', 'column' => 'id')),
      'parent_id' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->widgetSchema->setNameFormat('item_recipe[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ItemRecipe';
  }


}
