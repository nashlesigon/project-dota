<?php


/**
 * Skeleton subclass for representing a row from the 'heroes' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Hero extends BaseHero {
	
	public function getImagepath(){
		return "/uploads/hero_images/".$this->getImageFilename();
	}
	
	public function getSkills(){
		$c = new Criteria;
		$c->addAscendingOrderByColumn(HeroSkillPeer::ORDER);
		return $this->getHeroSkills($c);
	}
} // Hero
