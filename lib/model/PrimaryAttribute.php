<?php


/**
 * Skeleton subclass for representing a row from the 'primary_attributes' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class PrimaryAttribute extends BasePrimaryAttribute {

    public function __toString() {
        return $this->getName();
    }
    
} // PrimaryAttribute
