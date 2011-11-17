<?php


/**
 * This class defines the structure of the 'items' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class ItemTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ItemTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('items');
		$this->setPhpName('Item');
		$this->setClassname('Item');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 100, null);
		$this->addColumn('IMAGE_FILENAME', 'ImageFilename', 'VARCHAR', true, 200, null);
		$this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
		$this->addColumn('ADDITIONAL_INFO', 'AdditionalInfo', 'LONGVARCHAR', true, null, null);
		$this->addColumn('STRENGTH', 'Strength', 'INTEGER', true, 10, null);
		$this->addColumn('AGILITY', 'Agility', 'INTEGER', true, 10, null);
		$this->addColumn('INTELLIGENCE', 'Intelligence', 'INTEGER', true, 10, null);
		$this->addColumn('DAMAGE', 'Damage', 'INTEGER', true, 10, null);
		$this->addColumn('ARMOR', 'Armor', 'INTEGER', true, 10, null);
		$this->addColumn('HP', 'Hp', 'INTEGER', true, 10, null);
		$this->addColumn('MANA', 'Mana', 'INTEGER', true, 10, null);
		$this->addColumn('PRICE', 'Price', 'INTEGER', true, 10, null);
		$this->addForeignKey('STORE_ID', 'StoreId', 'INTEGER', 'item_stores', 'ID', true, 10, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ItemStore', 'ItemStore', RelationMap::MANY_TO_ONE, array('store_id' => 'id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('ItemRecipe', 'ItemRecipe', RelationMap::ONE_TO_MANY, array('id' => 'item_id', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // ItemTableMap
