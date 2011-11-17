<?php

/**
 * HeroSkill form base class.
 *
 * @method HeroSkill getObject() Returns the current form's model object
 *
 * @package    dota_resource
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseHeroSkillForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'hero_id'     => new sfWidgetFormPropelChoice(array('model' => 'Hero', 'add_empty' => false)),
      'name'        => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'order'       => new sfWidgetFormInputText(),
      'skill_type'  => new sfWidgetFormInputText(),
      'hotkey'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'hero_id'     => new sfValidatorPropelChoice(array('model' => 'Hero', 'column' => 'id')),
      'name'        => new sfValidatorString(array('max_length' => 100)),
      'description' => new sfValidatorString(),
      'order'       => new sfValidatorInteger(array('min' => -128, 'max' => 127)),
      'skill_type'  => new sfValidatorString(array('max_length' => 45)),
      'hotkey'      => new sfValidatorString(array('max_length' => 1)),
    ));

    $this->widgetSchema->setNameFormat('hero_skill[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'HeroSkill';
  }


}
