<?php

/**
 * Item form base class.
 *
 * @method Item getObject() Returns the current form's model object
 *
 * @package    dota_resource
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseItemForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'name'            => new sfWidgetFormInputText(),
      'image_filename'  => new sfWidgetFormInputText(),
      'description'     => new sfWidgetFormTextarea(),
      'additional_info' => new sfWidgetFormTextarea(),
      'strength'        => new sfWidgetFormInputText(),
      'agility'         => new sfWidgetFormInputText(),
      'intelligence'    => new sfWidgetFormInputText(),
      'damage'          => new sfWidgetFormInputText(),
      'armor'           => new sfWidgetFormInputText(),
      'hp'              => new sfWidgetFormInputText(),
      'mana'            => new sfWidgetFormInputText(),
      'price'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'            => new sfValidatorString(array('max_length' => 100)),
      'image_filename'  => new sfValidatorString(array('max_length' => 200)),
      'description'     => new sfValidatorString(array('required' => false)),
      'additional_info' => new sfValidatorString(),
      'strength'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'agility'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'intelligence'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'damage'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'armor'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'hp'              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'mana'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'price'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->widgetSchema->setNameFormat('item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Item';
  }


}
