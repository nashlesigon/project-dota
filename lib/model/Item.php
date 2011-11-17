<?php


/**
 * Skeleton subclass for representing a row from the 'items' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Item extends BaseItem {

	public function getImagepath(){
		return "/uploads/assets/sample_item/".$this->getImageFilename();
	}
	
	public function isRecipe(){
		$itemRecipes = $this->getItemRecipes();
		if(is_null($itemRecipes)){
			return false;
		}
		return true;
	}
	
	public function getStore(){
		return $this->getItemStore();
	}
} // Item
