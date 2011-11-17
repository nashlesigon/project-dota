<?php


/**
 * Skeleton subclass for performing query and update operations on the 'primary_attributes' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class PrimaryAttributePeer extends BasePrimaryAttributePeer {
	
	public static function retrieveAll(){
		return self::doSelect(new Criteria());
	}
} // PrimaryAttributePeer
