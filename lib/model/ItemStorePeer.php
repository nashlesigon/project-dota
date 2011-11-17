<?php


/**
 * Skeleton subclass for performing query and update operations on the 'item_stores' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class ItemStorePeer extends BaseItemStorePeer {
    
    public static function retrieveForSelect() {
        $c = new Criteria();
		$c->addAscendingOrderByColumn(self::NAME);

		$results = self::doSelect($c);

		$arrStores = array();
		foreach ( $results as $store ) {
			$arrStores[$store->getId()] = (string) $store;
		}

		return $arrStores;
    }

	public static function retrieveAll(){
		return self::doSelect(new Criteria());
	}

} // ItemStorePeer
