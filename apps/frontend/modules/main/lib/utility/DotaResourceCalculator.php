<?php

class DotaResourceCalculator
{
     private static $instance = null;

     const HP_ADDITIONAL = 19,
           MP_ADDITIONAL = 13,
           PRIMARY_ATTRIB_STR = 1,
           PRIMARY_ATTRIB_AGI= 2,
           PRIMARY_ATTRIB_INT = 3;

     static public function getInstance()
     {
         if(is_null(self::$instance))
             self::$instance = new self;
         return self::$instance;
     }

     private function __construct(){}

     public function getCalculatedHeroStats(Hero $baseInformation, $heroLevel)
     {
        $information = new Information;

        $information->set('name',$baseInformation->getName()."(Level $heroLevel)");

        $baseAttrib = $baseInformation->getBasicIntelligence();
        $additionalInt = $this->getAdditionalAttribute($heroLevel, $baseInformation->getAddIntelligence());
        $information->set('int',$baseAttrib+$additionalInt);

        $baseMP = $baseInformation->getMana();
        $information->set('mana',$baseMP+($additionalInt*self::MP_ADDITIONAL));

        $baseAttrib = $baseInformation->getBasicStrength();
        $additionalStr = $this->getAdditionalAttribute($heroLevel, $baseInformation->getAddStrength());
        $information->set('str',$baseAttrib+$additionalStr);

        $baseHP = $baseInformation->getHp();
        $information->set('hp',$baseHP+($additionalStr*self::MP_ADDITIONAL));

        $additionalAttrib = $baseInformation->getBasicAgility();
        $additionalAgi = $this->getAdditionalAttribute($heroLevel, $baseInformation->getAddAgility());
        $information->set('agi',$additionalAttrib+$additionalAgi);

        $additionalDamage = 0;
        switch($baseInformation->getPrimaryAttributeId())
        {
          case self::PRIMARY_ATTRIB_STR:
            $additionalDamage = $additionalStr;
            break;
          case self::PRIMARY_ATTRIB_AGI:
            $additionalDamage = $additionalAgi;
            break;
          case self::PRIMARY_ATTRIB_INT:
            $additionalDamage = $additionalInt;
            break;
        }

        $information->set('minDamage',$baseInformation->getMinDamage()+$additionalDamage);
        $information->set('maxDamage',$baseInformation->getMaxDamage()+$additionalDamage);

        return $information;
     }

    private function getAdditionalAttribute($heroLevel,$additionalAttrib)
    {
        return  floor(($heroLevel-1)*$additionalAttrib);
    }

    private function getDamage(){

    }
}
?>
