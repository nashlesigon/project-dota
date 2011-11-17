<?php

/**
 * HeroAffiliation form base class.
 *
 * @method HeroAffiliation getObject() Returns the current form's model object
 *
 * @package    dota_resource
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseHeroAffiliationForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'   => new sfWidgetFormInputHidden(),
      'name' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name' => new sfValidatorString(array('max_length' => 50)),
    ));

    $this->widgetSchema->setNameFormat('hero_affiliation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'HeroAffiliation';
  }


}
