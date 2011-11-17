<?php


/**
 * This class defines the structure of the 'heroes' table.
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
class HeroTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.HeroTableMap';

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
		$this->setName('heroes');
		$this->setPhpName('Hero');
		$this->setClassname('Hero');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 100, null);
		$this->addColumn('LEGEND', 'Legend', 'VARCHAR', true, 100, null);
		$this->addColumn('IMAGE_FILENAME', 'ImageFilename', 'VARCHAR', true, 200, null);
		$this->addForeignKey('PRIMARY_ATTRIBUTE_ID', 'PrimaryAttributeId', 'INTEGER', 'primary_attributes', 'ID', true, 10, null);
		$this->addColumn('INTRO', 'Intro', 'LONGVARCHAR', false, null, null);
		$this->addColumn('BACKGROUND', 'Background', 'LONGVARCHAR', false, null, null);
		$this->addForeignKey('TYPE_ID', 'TypeId', 'INTEGER', 'hero_types', 'ID', true, 10, null);
		$this->addForeignKey('AFFILIATION_ID', 'AffiliationId', 'INTEGER', 'hero_affiliations', 'ID', true, 10, null);
		$this->addColumn('BASIC_STRENGTH', 'BasicStrength', 'INTEGER', true, 10, null);
		$this->addColumn('BASIC_AGILITY', 'BasicAgility', 'INTEGER', true, 10, null);
		$this->addColumn('BASIC_INTELLIGENCE', 'BasicIntelligence', 'INTEGER', true, 10, null);
		$this->addColumn('ADD_STRENGTH', 'AddStrength', 'FLOAT', true, null, null);
		$this->addColumn('ADD_AGILITY', 'AddAgility', 'FLOAT', true, null, null);
		$this->addColumn('ADD_INTELLIGENCE', 'AddIntelligence', 'FLOAT', true, null, null);
		$this->addColumn('HP', 'Hp', 'INTEGER', true, 10, null);
		$this->addColumn('MANA', 'Mana', 'INTEGER', true, 10, null);
		$this->addColumn('MIN_DAMAGE', 'MinDamage', 'INTEGER', true, 10, null);
		$this->addColumn('MAX_DAMAGE', 'MaxDamage', 'INTEGER', true, 10, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('PrimaryAttribute', 'PrimaryAttribute', RelationMap::MANY_TO_ONE, array('primary_attribute_id' => 'id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('HeroType', 'HeroType', RelationMap::MANY_TO_ONE, array('type_id' => 'id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('HeroAffiliation', 'HeroAffiliation', RelationMap::MANY_TO_ONE, array('affiliation_id' => 'id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('HeroSkill', 'HeroSkill', RelationMap::ONE_TO_MANY, array('id' => 'hero_id', ), 'RESTRICT', 'RESTRICT');
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

} // HeroTableMap
