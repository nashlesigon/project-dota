<?php


/**
 * Skeleton subclass for performing query and update operations on the 'items' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class ItemPeer extends BaseItemPeer {

	public static function retrieveAll(){
		$c = new Criteria;
		$c->addAscendingOrderByColumn(self::NAME);
		
		return self::doSelect($c);
	}
} // ItemPeer
