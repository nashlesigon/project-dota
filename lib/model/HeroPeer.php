<?php


/**
 * Skeleton subclass for performing query and update operations on the 'heroes' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class HeroPeer extends BaseHeroPeer {
	
	
	public static function retrieveAll(){
		$c = new Criteria;
		$c->addAscendingOrderByColumn(self::NAME);
		
		return self::doSelect($c);
	}
	
	public static function retrieveByAffiliation(HeroAffiliation $affiliation){
		$c = new Criteria;
		
		$c->add(self::AFFILIATION_ID, $affiliation->getID());
		return self::doSelect($c);
	}
} // HeroPeer
