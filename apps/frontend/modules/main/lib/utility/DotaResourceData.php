<?php
 class DotaResourceData
{
    private static $instance = null;
    private $calculator = null;

    const HERO_LEVEL_START = 1;

    static public function getInstance(){
       if( is_null(self::$instance) )
          self::$instance = new self;
       return self::$instance;
    }

    private function __construct(){
    }

    public function getData($hero,$heroLevel,$items = array())
    {
        $data = array();

        //array_merge($data,$this->getHeroData(HeroPeer::retrieveByPK($hero),$heroLevel));

        $data = $this->getHeroData(HeroPeer::retrieveByPK($hero), $heroLevel);

        if( !empty($items) )
        {
            foreach($items as $item){
                $data[] = $this->getItemData(ItemPeer::retrieveByPK($item));
            }
        }
        return $data;
    }

    private function getHeroData(Hero $heroInformation,$heroLevel){
       $data = array();

       $information = new Information;
       //set everything base on display with respect to hero
       $information->set('name',$heroInformation->getName().'(Level '.DotaResourceData::HERO_LEVEL_START.')');
       $information->set('agi',$heroInformation->getBasicAgility());
       $information->set('str',$heroInformation->getBasicStrength());
       $information->set('int',$heroInformation->getBasicIntelligence());
       $information->set('minDamage',$heroInformation->getMinDamage());
       $information->set('maxDamage',$heroInformation->getMaxDamage());
       $information->set('hp',$heroInformation->getHp());
       $information->set('mana',$heroInformation->getMana());
       $data[] = $information;

       if($heroLevel > 1)
       {
           $data[] = DotaResourceCalculator::getInstance()->getCalculatedHeroStats($heroInformation,$heroLevel);
       }
       return $data;
    }

    private function getItemData(Item $itemInformation)
    {
       $information = new Information;

       $information->set('name',$itemInformation->getName());
       $information->set('agi',$itemInformation->getAgility());
       $information->set('str',$itemInformation->getStrength());
       $information->set('int',$itemInformation->getIntelligence());
       $information->set('minDamage',$itemInformation->getDamage());
       $information->set('maxDamage',$itemInformation->getDamage());
       $information->set('hp',$itemInformation->getHp());
       $information->set('mana',$itemInformation->getMana());

       return $information;
    }

    private function updateTotal(Information $info){
       return $total;
    }
}
?>
