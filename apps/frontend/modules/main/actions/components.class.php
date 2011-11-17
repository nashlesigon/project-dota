<?php


class mainComponents extends sfComponents {
	
	public function executeSelectionSection(){
		// retrieve heroes
		// $this->heroes = HeroPeer::retrieveAll();
		// 
		$this->items = ItemPeer::retrieveAll();
		$this->groupItems($this->items);
		
		$this->sentinelHeroes = HeroPeer::retrieveByAffiliation(HeroAffiliationPeer::retrieveByName('Sentinel'));
		$this->groupHeroes($this->sentinelHeroes);
		
		$this->scourgeHeroes = HeroPeer::retrieveByAffiliation(HeroAffiliationPeer::retrieveByName('Scourge'));
		$this->groupHeroes($this->scourgeHeroes);
		
	}
	
	public function executeHeroSkills(){
		$this->skills = $this->hero->getSkills();
	}
	
	public function executeItemStats(){
		$this->stats = array();
		if($this->item->getStrength() > 0){
			$this->stats['strength'] = $this->item->getStrength();
		}
		
		if($this->item->getAgility() > 0){
			$this->stats['agility'] = $this->item->getAgility();
		}
		
		if($this->item->getIntelligence() > 0){
			$this->stats['intelligence'] = $this->item->getIntelligence();
		}
		
		if($this->item->getDamage() > 0){
			$this->stats['damage'] = $this->item->getDamage();
		}
		
	}
	
	// group heroes according to attribute
	private function groupHeroes(&$heroes){
		$primaryAttributes = PrimaryAttributePeer::retrieveAll();
		$_heroes = $heroes;
		$grpHeroes = array();
		foreach($primaryAttributes as $iObj){
			$grpHeroes[$iObj->getName()] = array();
		}
		
		foreach($_heroes as $hero){
			$attribute = $hero->getPrimaryAttribute();
			$grpHeroes[$attribute->getName()][] = $hero;
		}
		$heroes = $grpHeroes;
		// return 
	}
	
	// group items according to store
	private function groupItems(&$items){
		$stores = ItemStorePeer::retrieveAll();
		$_items = $items;
		$grpItems = array();
		foreach($stores as $iObj){
			$grpItems[$iObj->getName()] = array();
		}
		
		foreach($_items as $item){
			$itemStore = $item->getItemStore();
			$grpItems[$itemStore->getName()][] = $item;
		}
		
		$items = $grpItems;
	}
	
}