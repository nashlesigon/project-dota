<?php


/**
 * Skeleton subclass for representing a row from the 'hero_skills' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class HeroSkill extends BaseHeroSkill {
	
	public function getImagepath(){
		return "/uploads/assets/sample_hero/".$this->getImageFilename();
	}
} // HeroSkill
