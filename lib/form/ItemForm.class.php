<?php

/**
 * Item form.
 *
 * @package    dota_resource
 * @subpackage form
 * @author     Your name here
 */
class ItemForm extends BaseItemForm
{
  public function configure()
  {
    $arrStores = array('0' => '--- Select a Store ---') + ItemStorePeer::retrieveForSelect();
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'name'            => new sfWidgetFormInputText(),
      'image_filename'  => new sfWidgetFormInputFile(),
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
      'store_id'        => new sfWidgetFormSelect(array('choices' => $arrStores)),//new sfWidgetFormPropelChoice(array('model' => 'ItemStore', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorInteger(array('required' => false)),
      'name'            => new sfValidatorString(array('max_length' => 100, 'required' => true)),
      'image_filename'  => new sfValidatorFile(array(
            'mime_types' => 'web_images',
            'path' => sfConfig::get('sf_upload_dir').'/item_images',
          )),//new sfValidatorFile(array( 'required' => true)),
      'description'     => new sfValidatorString(array('required' => false)),
      'additional_info' => new sfValidatorString(array('required' => true)),
      'strength'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => true)),
      'agility'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => true)),
      'intelligence'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => true)),
      'damage'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => true)),
      'armor'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => true)),
      'hp'              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => true)),
      'mana'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => true)),
      'price'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => true)),
      'store_id'        => new sfValidatorChoice(array('choices' => array_keys($arrStores), 'required' => TRUE)),//new sfValidatorPropelChoice(array('model' => 'ItemStore', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);   
  }
}
