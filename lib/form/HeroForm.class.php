<?php

/**
 * Hero form.
 *
 * @package    dota_resource
 * @subpackage form
 * @author     Your name here
 */
    class HeroForm extends BaseHeroForm
    {
          public function configure()
          {
              $this->setWidgets(array(
              'id'                   => new sfWidgetFormInputHidden(),
              'name'                 => new sfWidgetFormInputText(),
              'legend'               => new sfWidgetFormInputText(),
              'image_filename'       => new sfWidgetFormInputFile(),
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
              'name'                 => new sfValidatorString(array('max_length' => 100, 'required' => true)),
              'legend'               => new sfValidatorString(array('max_length' => 100, 'required' => true)),
              'image_filename'       => new sfValidatorFile(array('mime_types' => array('image/jpeg', 'image/png', 'image/gif'), 'required' => true), array('mime_types' => 'JPG/PNG/GIF files are the only allowable file to be uploaded.')),
              'primary_attribute_id' => new sfValidatorPropelChoice(array('model' => 'PrimaryAttribute', 'column' => 'id')),
              'intro'                => new sfValidatorString(array('required' => true)),
              'background'           => new sfValidatorString(array('required' => true)),
              'type_id'              => new sfValidatorPropelChoice(array('model' => 'HeroType', 'column' => 'id', 'required' => true)),
              'affiliation_id'       => new sfValidatorPropelChoice(array('model' => 'HeroAffiliation', 'column' => 'id', 'required' => true)),
              'basic_strength'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => true)),
              'basic_agility'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => true)),
              'basic_intelligence'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => true)),
              'add_strength'         => new sfValidatorNumber(array('required' => true)),
              'add_agility'          => new sfValidatorNumber(array('required' => true)),
              'add_intelligence'     => new sfValidatorNumber(array('required' => true)),
              'hp'                   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => true)),
              'mana'                 => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => true)),
              'min_damage'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => true)),
              'max_damage'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => true)),
            ));

            $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

            $this->widgetSchema->setNameFormat('hero[%s]');
          }
  
  
      public function doSave($con = null) {
            if(null !== $this->getValue('image_filename')) {
                if(!$this->getObject()->isNew() && '' != $this->getObject()->getImageFilename()) {
                    @unlink(sfConfig::get('sf_upload_dir').'/hero_images/'.$this->getObject()->getImageFilename());
                }
            }

            parent::doSave($con);

            if(null !== $this->getValue('image_filename')) {
                $file_name = preg_replace('/\W+/', '_', $this->getObject()->getName());
                $file_name = strtolower(trim($file_name, '_'));
                $file_name = 'hero'.$this->getObject()->getId().'_'.$file_name.".gif";

                $this->getValue('image_filename')->save(sfConfig::get('sf_upload_dir').'/hero_images/'.$file_name, 0666, true);
                $this->getObject()->setImageFilename($file_name);
                $this->getObject()->save();
            }
    }
}
