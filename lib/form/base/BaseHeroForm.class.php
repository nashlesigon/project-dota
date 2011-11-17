<?php

/**
 * Hero form base class.
 *
 * @method Hero getObject() Returns the current form's model object
 *
 * @package    dota_resource
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseHeroForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'name'                 => new sfWidgetFormInputText(),
      'legend'               => new sfWidgetFormInputText(),
      'image_filename'       => new sfWidgetFormInputText(),
      'primary_attribute_id' => new sfWidgetFormPropelChoice(array('model' => 'PrimaryAttribute', 'add_empty' => false)),
      'intro'                => new sfWidgetFormTextarea(),
      'background'           => new sfWidgetFormTextarea(),
      'type_id'              => new sfWidgetFormPropelChoice(array('model' => 'HeroType', 'add_empty' => false)),
      'affiliation_id'       => new sfWidgetFormPropelChoice(array('model' => 'HeroAffiliation', 'add_empty' => false)),
      'basic_strength'       => new sfWidgetFormInputText(),
      'basic_agility'        => new sfWidgetFormInputText(),
      'basic_intelligence'   => new sfWidgetFormInputText(),
      'add_strength'         => new sfWidgetFormInputText(),
      'add_agility'          => new sfWidgetFormInputText(),
      'add_intelligence'     => new sfWidgetFormInputText(),
      'hp'                   => new sfWidgetFormInputText(),
      'mana'                 => new sfWidgetFormInputText(),
      'min_damage'           => new sfWidgetFormInputText(),
      'max_damage'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name'                 => new sfValidatorString(array('max_length' => 100)),
      'legend'               => new sfValidatorString(array('max_length' => 100)),
      'image_filename'       => new sfValidatorString(array('max_length' => 200)),
      'primary_attribute_id' => new sfValidatorPropelChoice(array('model' => 'PrimaryAttribute', 'column' => 'id')),
      'intro'                => new sfValidatorString(array('required' => false)),
      'background'           => new sfValidatorString(array('required' => false)),
      'type_id'              => new sfValidatorPropelChoice(array('model' => 'HeroType', 'column' => 'id')),
      'affiliation_id'       => new sfValidatorPropelChoice(array('model' => 'HeroAffiliation', 'column' => 'id')),
      'basic_strength'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'basic_agility'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'basic_intelligence'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'add_strength'         => new sfValidatorNumber(),
      'add_agility'          => new sfValidatorNumber(),
      'add_intelligence'     => new sfValidatorNumber(),
      'hp'                   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'mana'                 => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'min_damage'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'max_damage'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->widgetSchema->setNameFormat('hero[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Hero';
  }


}
