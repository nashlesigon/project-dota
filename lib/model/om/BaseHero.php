<?php

/**
 * Base class that represents a row from the 'heroes' table.
 *
 * 
 *
 * @package    lib.model.om
 */
abstract class BaseHero extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        HeroPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * The value for the legend field.
	 * @var        string
	 */
	protected $legend;

	/**
	 * The value for the image_filename field.
	 * @var        string
	 */
	protected $image_filename;

	/**
	 * The value for the primary_attribute_id field.
	 * @var        int
	 */
	protected $primary_attribute_id;

	/**
	 * The value for the intro field.
	 * @var        string
	 */
	protected $intro;

	/**
	 * The value for the background field.
	 * @var        string
	 */
	protected $background;

	/**
	 * The value for the type_id field.
	 * @var        int
	 */
	protected $type_id;

	/**
	 * The value for the affiliation_id field.
	 * @var        int
	 */
	protected $affiliation_id;

	/**
	 * The value for the basic_strength field.
	 * @var        int
	 */
	protected $basic_strength;

	/**
	 * The value for the basic_agility field.
	 * @var        int
	 */
	protected $basic_agility;

	/**
	 * The value for the basic_intelligence field.
	 * @var        int
	 */
	protected $basic_intelligence;

	/**
	 * The value for the add_strength field.
	 * @var        double
	 */
	protected $add_strength;

	/**
	 * The value for the add_agility field.
	 * @var        double
	 */
	protected $add_agility;

	/**
	 * The value for the add_intelligence field.
	 * @var        double
	 */
	protected $add_intelligence;

	/**
	 * The value for the hp field.
	 * @var        int
	 */
	protected $hp;

	/**
	 * The value for the mana field.
	 * @var        int
	 */
	protected $mana;

	/**
	 * The value for the min_damage field.
	 * @var        int
	 */
	protected $min_damage;

	/**
	 * The value for the max_damage field.
	 * @var        int
	 */
	protected $max_damage;

	/**
	 * @var        PrimaryAttribute
	 */
	protected $aPrimaryAttribute;

	/**
	 * @var        HeroType
	 */
	protected $aHeroType;

	/**
	 * @var        HeroAffiliation
	 */
	protected $aHeroAffiliation;

	/**
	 * @var        array HeroSkill[] Collection to store aggregation of HeroSkill objects.
	 */
	protected $collHeroSkills;

	/**
	 * @var        Criteria The criteria used to select the current contents of collHeroSkills.
	 */
	private $lastHeroSkillCriteria = null;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	// symfony behavior
	
	const PEER = 'HeroPeer';

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [name] column value.
	 * 
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the [legend] column value.
	 * 
	 * @return     string
	 */
	public function getLegend()
	{
		return $this->legend;
	}

	/**
	 * Get the [image_filename] column value.
	 * 
	 * @return     string
	 */
	public function getImageFilename()
	{
		return $this->image_filename;
	}

	/**
	 * Get the [primary_attribute_id] column value.
	 * 
	 * @return     int
	 */
	public function getPrimaryAttributeId()
	{
		return $this->primary_attribute_id;
	}

	/**
	 * Get the [intro] column value.
	 * 
	 * @return     string
	 */
	public function getIntro()
	{
		return $this->intro;
	}

	/**
	 * Get the [background] column value.
	 * 
	 * @return     string
	 */
	public function getBackground()
	{
		return $this->background;
	}

	/**
	 * Get the [type_id] column value.
	 * 
	 * @return     int
	 */
	public function getTypeId()
	{
		return $this->type_id;
	}

	/**
	 * Get the [affiliation_id] column value.
	 * 
	 * @return     int
	 */
	public function getAffiliationId()
	{
		return $this->affiliation_id;
	}

	/**
	 * Get the [basic_strength] column value.
	 * 
	 * @return     int
	 */
	public function getBasicStrength()
	{
		return $this->basic_strength;
	}

	/**
	 * Get the [basic_agility] column value.
	 * 
	 * @return     int
	 */
	public function getBasicAgility()
	{
		return $this->basic_agility;
	}

	/**
	 * Get the [basic_intelligence] column value.
	 * 
	 * @return     int
	 */
	public function getBasicIntelligence()
	{
		return $this->basic_intelligence;
	}

	/**
	 * Get the [add_strength] column value.
	 * 
	 * @return     double
	 */
	public function getAddStrength()
	{
		return $this->add_strength;
	}

	/**
	 * Get the [add_agility] column value.
	 * 
	 * @return     double
	 */
	public function getAddAgility()
	{
		return $this->add_agility;
	}

	/**
	 * Get the [add_intelligence] column value.
	 * 
	 * @return     double
	 */
	public function getAddIntelligence()
	{
		return $this->add_intelligence;
	}

	/**
	 * Get the [hp] column value.
	 * 
	 * @return     int
	 */
	public function getHp()
	{
		return $this->hp;
	}

	/**
	 * Get the [mana] column value.
	 * 
	 * @return     int
	 */
	public function getMana()
	{
		return $this->mana;
	}

	/**
	 * Get the [min_damage] column value.
	 * 
	 * @return     int
	 */
	public function getMinDamage()
	{
		return $this->min_damage;
	}

	/**
	 * Get the [max_damage] column value.
	 * 
	 * @return     int
	 */
	public function getMaxDamage()
	{
		return $this->max_damage;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Hero The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = HeroPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     Hero The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = HeroPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [legend] column.
	 * 
	 * @param      string $v new value
	 * @return     Hero The current object (for fluent API support)
	 */
	public function setLegend($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->legend !== $v) {
			$this->legend = $v;
			$this->modifiedColumns[] = HeroPeer::LEGEND;
		}

		return $this;
	} // setLegend()

	/**
	 * Set the value of [image_filename] column.
	 * 
	 * @param      string $v new value
	 * @return     Hero The current object (for fluent API support)
	 */
	public function setImageFilename($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->image_filename !== $v) {
			$this->image_filename = $v;
			$this->modifiedColumns[] = HeroPeer::IMAGE_FILENAME;
		}

		return $this;
	} // setImageFilename()

	/**
	 * Set the value of [primary_attribute_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Hero The current object (for fluent API support)
	 */
	public function setPrimaryAttributeId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->primary_attribute_id !== $v) {
			$this->primary_attribute_id = $v;
			$this->modifiedColumns[] = HeroPeer::PRIMARY_ATTRIBUTE_ID;
		}

		if ($this->aPrimaryAttribute !== null && $this->aPrimaryAttribute->getId() !== $v) {
			$this->aPrimaryAttribute = null;
		}

		return $this;
	} // setPrimaryAttributeId()

	/**
	 * Set the value of [intro] column.
	 * 
	 * @param      string $v new value
	 * @return     Hero The current object (for fluent API support)
	 */
	public function setIntro($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->intro !== $v) {
			$this->intro = $v;
			$this->modifiedColumns[] = HeroPeer::INTRO;
		}

		return $this;
	} // setIntro()

	/**
	 * Set the value of [background] column.
	 * 
	 * @param      string $v new value
	 * @return     Hero The current object (for fluent API support)
	 */
	public function setBackground($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->background !== $v) {
			$this->background = $v;
			$this->modifiedColumns[] = HeroPeer::BACKGROUND;
		}

		return $this;
	} // setBackground()

	/**
	 * Set the value of [type_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Hero The current object (for fluent API support)
	 */
	public function setTypeId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->type_id !== $v) {
			$this->type_id = $v;
			$this->modifiedColumns[] = HeroPeer::TYPE_ID;
		}

		if ($this->aHeroType !== null && $this->aHeroType->getId() !== $v) {
			$this->aHeroType = null;
		}

		return $this;
	} // setTypeId()

	/**
	 * Set the value of [affiliation_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Hero The current object (for fluent API support)
	 */
	public function setAffiliationId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->affiliation_id !== $v) {
			$this->affiliation_id = $v;
			$this->modifiedColumns[] = HeroPeer::AFFILIATION_ID;
		}

		if ($this->aHeroAffiliation !== null && $this->aHeroAffiliation->getId() !== $v) {
			$this->aHeroAffiliation = null;
		}

		return $this;
	} // setAffiliationId()

	/**
	 * Set the value of [basic_strength] column.
	 * 
	 * @param      int $v new value
	 * @return     Hero The current object (for fluent API support)
	 */
	public function setBasicStrength($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->basic_strength !== $v) {
			$this->basic_strength = $v;
			$this->modifiedColumns[] = HeroPeer::BASIC_STRENGTH;
		}

		return $this;
	} // setBasicStrength()

	/**
	 * Set the value of [basic_agility] column.
	 * 
	 * @param      int $v new value
	 * @return     Hero The current object (for fluent API support)
	 */
	public function setBasicAgility($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->basic_agility !== $v) {
			$this->basic_agility = $v;
			$this->modifiedColumns[] = HeroPeer::BASIC_AGILITY;
		}

		return $this;
	} // setBasicAgility()

	/**
	 * Set the value of [basic_intelligence] column.
	 * 
	 * @param      int $v new value
	 * @return     Hero The current object (for fluent API support)
	 */
	public function setBasicIntelligence($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->basic_intelligence !== $v) {
			$this->basic_intelligence = $v;
			$this->modifiedColumns[] = HeroPeer::BASIC_INTELLIGENCE;
		}

		return $this;
	} // setBasicIntelligence()

	/**
	 * Set the value of [add_strength] column.
	 * 
	 * @param      double $v new value
	 * @return     Hero The current object (for fluent API support)
	 */
	public function setAddStrength($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->add_strength !== $v) {
			$this->add_strength = $v;
			$this->modifiedColumns[] = HeroPeer::ADD_STRENGTH;
		}

		return $this;
	} // setAddStrength()

	/**
	 * Set the value of [add_agility] column.
	 * 
	 * @param      double $v new value
	 * @return     Hero The current object (for fluent API support)
	 */
	public function setAddAgility($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->add_agility !== $v) {
			$this->add_agility = $v;
			$this->modifiedColumns[] = HeroPeer::ADD_AGILITY;
		}

		return $this;
	} // setAddAgility()

	/**
	 * Set the value of [add_intelligence] column.
	 * 
	 * @param      double $v new value
	 * @return     Hero The current object (for fluent API support)
	 */
	public function setAddIntelligence($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->add_intelligence !== $v) {
			$this->add_intelligence = $v;
			$this->modifiedColumns[] = HeroPeer::ADD_INTELLIGENCE;
		}

		return $this;
	} // setAddIntelligence()

	/**
	 * Set the value of [hp] column.
	 * 
	 * @param      int $v new value
	 * @return     Hero The current object (for fluent API support)
	 */
	public function setHp($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->hp !== $v) {
			$this->hp = $v;
			$this->modifiedColumns[] = HeroPeer::HP;
		}

		return $this;
	} // setHp()

	/**
	 * Set the value of [mana] column.
	 * 
	 * @param      int $v new value
	 * @return     Hero The current object (for fluent API support)
	 */
	public function setMana($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->mana !== $v) {
			$this->mana = $v;
			$this->modifiedColumns[] = HeroPeer::MANA;
		}

		return $this;
	} // setMana()

	/**
	 * Set the value of [min_damage] column.
	 * 
	 * @param      int $v new value
	 * @return     Hero The current object (for fluent API support)
	 */
	public function setMinDamage($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->min_damage !== $v) {
			$this->min_damage = $v;
			$this->modifiedColumns[] = HeroPeer::MIN_DAMAGE;
		}

		return $this;
	} // setMinDamage()

	/**
	 * Set the value of [max_damage] column.
	 * 
	 * @param      int $v new value
	 * @return     Hero The current object (for fluent API support)
	 */
	public function setMaxDamage($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->max_damage !== $v) {
			$this->max_damage = $v;
			$this->modifiedColumns[] = HeroPeer::MAX_DAMAGE;
		}

		return $this;
	} // setMaxDamage()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->legend = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->image_filename = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->primary_attribute_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->intro = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->background = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->type_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->affiliation_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->basic_strength = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->basic_agility = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->basic_intelligence = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->add_strength = ($row[$startcol + 12] !== null) ? (double) $row[$startcol + 12] : null;
			$this->add_agility = ($row[$startcol + 13] !== null) ? (double) $row[$startcol + 13] : null;
			$this->add_intelligence = ($row[$startcol + 14] !== null) ? (double) $row[$startcol + 14] : null;
			$this->hp = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
			$this->mana = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
			$this->min_damage = ($row[$startcol + 17] !== null) ? (int) $row[$startcol + 17] : null;
			$this->max_damage = ($row[$startcol + 18] !== null) ? (int) $row[$startcol + 18] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 19; // 19 = HeroPeer::NUM_COLUMNS - HeroPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Hero object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aPrimaryAttribute !== null && $this->primary_attribute_id !== $this->aPrimaryAttribute->getId()) {
			$this->aPrimaryAttribute = null;
		}
		if ($this->aHeroType !== null && $this->type_id !== $this->aHeroType->getId()) {
			$this->aHeroType = null;
		}
		if ($this->aHeroAffiliation !== null && $this->affiliation_id !== $this->aHeroAffiliation->getId()) {
			$this->aHeroAffiliation = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HeroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = HeroPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aPrimaryAttribute = null;
			$this->aHeroType = null;
			$this->aHeroAffiliation = null;
			$this->collHeroSkills = null;
			$this->lastHeroSkillCriteria = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HeroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseHero:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			
			    return;
			  }
			}

			if ($ret) {
				HeroPeer::doDelete($this, $con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseHero:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$this->setDeleted(true);
				$con->commit();
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(HeroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseHero:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			    $con->commit();
			
			    return $affectedRows;
			  }
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseHero:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				HeroPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aPrimaryAttribute !== null) {
				if ($this->aPrimaryAttribute->isModified() || $this->aPrimaryAttribute->isNew()) {
					$affectedRows += $this->aPrimaryAttribute->save($con);
				}
				$this->setPrimaryAttribute($this->aPrimaryAttribute);
			}

			if ($this->aHeroType !== null) {
				if ($this->aHeroType->isModified() || $this->aHeroType->isNew()) {
					$affectedRows += $this->aHeroType->save($con);
				}
				$this->setHeroType($this->aHeroType);
			}

			if ($this->aHeroAffiliation !== null) {
				if ($this->aHeroAffiliation->isModified() || $this->aHeroAffiliation->isNew()) {
					$affectedRows += $this->aHeroAffiliation->save($con);
				}
				$this->setHeroAffiliation($this->aHeroAffiliation);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = HeroPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = HeroPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += HeroPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collHeroSkills !== null) {
				foreach ($this->collHeroSkills as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aPrimaryAttribute !== null) {
				if (!$this->aPrimaryAttribute->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPrimaryAttribute->getValidationFailures());
				}
			}

			if ($this->aHeroType !== null) {
				if (!$this->aHeroType->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aHeroType->getValidationFailures());
				}
			}

			if ($this->aHeroAffiliation !== null) {
				if (!$this->aHeroAffiliation->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aHeroAffiliation->getValidationFailures());
				}
			}


			if (($retval = HeroPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collHeroSkills !== null) {
					foreach ($this->collHeroSkills as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HeroPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getName();
				break;
			case 2:
				return $this->getLegend();
				break;
			case 3:
				return $this->getImageFilename();
				break;
			case 4:
				return $this->getPrimaryAttributeId();
				break;
			case 5:
				return $this->getIntro();
				break;
			case 6:
				return $this->getBackground();
				break;
			case 7:
				return $this->getTypeId();
				break;
			case 8:
				return $this->getAffiliationId();
				break;
			case 9:
				return $this->getBasicStrength();
				break;
			case 10:
				return $this->getBasicAgility();
				break;
			case 11:
				return $this->getBasicIntelligence();
				break;
			case 12:
				return $this->getAddStrength();
				break;
			case 13:
				return $this->getAddAgility();
				break;
			case 14:
				return $this->getAddIntelligence();
				break;
			case 15:
				return $this->getHp();
				break;
			case 16:
				return $this->getMana();
				break;
			case 17:
				return $this->getMinDamage();
				break;
			case 18:
				return $this->getMaxDamage();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param      string $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                        BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. Defaults to BasePeer::TYPE_PHPNAME.
	 * @param      boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns.  Defaults to TRUE.
	 * @return     an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = HeroPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getLegend(),
			$keys[3] => $this->getImageFilename(),
			$keys[4] => $this->getPrimaryAttributeId(),
			$keys[5] => $this->getIntro(),
			$keys[6] => $this->getBackground(),
			$keys[7] => $this->getTypeId(),
			$keys[8] => $this->getAffiliationId(),
			$keys[9] => $this->getBasicStrength(),
			$keys[10] => $this->getBasicAgility(),
			$keys[11] => $this->getBasicIntelligence(),
			$keys[12] => $this->getAddStrength(),
			$keys[13] => $this->getAddAgility(),
			$keys[14] => $this->getAddIntelligence(),
			$keys[15] => $this->getHp(),
			$keys[16] => $this->getMana(),
			$keys[17] => $this->getMinDamage(),
			$keys[18] => $this->getMaxDamage(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = HeroPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setName($value);
				break;
			case 2:
				$this->setLegend($value);
				break;
			case 3:
				$this->setImageFilename($value);
				break;
			case 4:
				$this->setPrimaryAttributeId($value);
				break;
			case 5:
				$this->setIntro($value);
				break;
			case 6:
				$this->setBackground($value);
				break;
			case 7:
				$this->setTypeId($value);
				break;
			case 8:
				$this->setAffiliationId($value);
				break;
			case 9:
				$this->setBasicStrength($value);
				break;
			case 10:
				$this->setBasicAgility($value);
				break;
			case 11:
				$this->setBasicIntelligence($value);
				break;
			case 12:
				$this->setAddStrength($value);
				break;
			case 13:
				$this->setAddAgility($value);
				break;
			case 14:
				$this->setAddIntelligence($value);
				break;
			case 15:
				$this->setHp($value);
				break;
			case 16:
				$this->setMana($value);
				break;
			case 17:
				$this->setMinDamage($value);
				break;
			case 18:
				$this->setMaxDamage($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = HeroPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLegend($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setImageFilename($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPrimaryAttributeId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIntro($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setBackground($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTypeId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAffiliationId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setBasicStrength($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setBasicAgility($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setBasicIntelligence($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setAddStrength($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setAddAgility($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setAddIntelligence($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setHp($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setMana($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setMinDamage($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setMaxDamage($arr[$keys[18]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(HeroPeer::DATABASE_NAME);

		if ($this->isColumnModified(HeroPeer::ID)) $criteria->add(HeroPeer::ID, $this->id);
		if ($this->isColumnModified(HeroPeer::NAME)) $criteria->add(HeroPeer::NAME, $this->name);
		if ($this->isColumnModified(HeroPeer::LEGEND)) $criteria->add(HeroPeer::LEGEND, $this->legend);
		if ($this->isColumnModified(HeroPeer::IMAGE_FILENAME)) $criteria->add(HeroPeer::IMAGE_FILENAME, $this->image_filename);
		if ($this->isColumnModified(HeroPeer::PRIMARY_ATTRIBUTE_ID)) $criteria->add(HeroPeer::PRIMARY_ATTRIBUTE_ID, $this->primary_attribute_id);
		if ($this->isColumnModified(HeroPeer::INTRO)) $criteria->add(HeroPeer::INTRO, $this->intro);
		if ($this->isColumnModified(HeroPeer::BACKGROUND)) $criteria->add(HeroPeer::BACKGROUND, $this->background);
		if ($this->isColumnModified(HeroPeer::TYPE_ID)) $criteria->add(HeroPeer::TYPE_ID, $this->type_id);
		if ($this->isColumnModified(HeroPeer::AFFILIATION_ID)) $criteria->add(HeroPeer::AFFILIATION_ID, $this->affiliation_id);
		if ($this->isColumnModified(HeroPeer::BASIC_STRENGTH)) $criteria->add(HeroPeer::BASIC_STRENGTH, $this->basic_strength);
		if ($this->isColumnModified(HeroPeer::BASIC_AGILITY)) $criteria->add(HeroPeer::BASIC_AGILITY, $this->basic_agility);
		if ($this->isColumnModified(HeroPeer::BASIC_INTELLIGENCE)) $criteria->add(HeroPeer::BASIC_INTELLIGENCE, $this->basic_intelligence);
		if ($this->isColumnModified(HeroPeer::ADD_STRENGTH)) $criteria->add(HeroPeer::ADD_STRENGTH, $this->add_strength);
		if ($this->isColumnModified(HeroPeer::ADD_AGILITY)) $criteria->add(HeroPeer::ADD_AGILITY, $this->add_agility);
		if ($this->isColumnModified(HeroPeer::ADD_INTELLIGENCE)) $criteria->add(HeroPeer::ADD_INTELLIGENCE, $this->add_intelligence);
		if ($this->isColumnModified(HeroPeer::HP)) $criteria->add(HeroPeer::HP, $this->hp);
		if ($this->isColumnModified(HeroPeer::MANA)) $criteria->add(HeroPeer::MANA, $this->mana);
		if ($this->isColumnModified(HeroPeer::MIN_DAMAGE)) $criteria->add(HeroPeer::MIN_DAMAGE, $this->min_damage);
		if ($this->isColumnModified(HeroPeer::MAX_DAMAGE)) $criteria->add(HeroPeer::MAX_DAMAGE, $this->max_damage);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(HeroPeer::DATABASE_NAME);

		$criteria->add(HeroPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Hero (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setName($this->name);

		$copyObj->setLegend($this->legend);

		$copyObj->setImageFilename($this->image_filename);

		$copyObj->setPrimaryAttributeId($this->primary_attribute_id);

		$copyObj->setIntro($this->intro);

		$copyObj->setBackground($this->background);

		$copyObj->setTypeId($this->type_id);

		$copyObj->setAffiliationId($this->affiliation_id);

		$copyObj->setBasicStrength($this->basic_strength);

		$copyObj->setBasicAgility($this->basic_agility);

		$copyObj->setBasicIntelligence($this->basic_intelligence);

		$copyObj->setAddStrength($this->add_strength);

		$copyObj->setAddAgility($this->add_agility);

		$copyObj->setAddIntelligence($this->add_intelligence);

		$copyObj->setHp($this->hp);

		$copyObj->setMana($this->mana);

		$copyObj->setMinDamage($this->min_damage);

		$copyObj->setMaxDamage($this->max_damage);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getHeroSkills() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addHeroSkill($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);

		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value

	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Hero Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     HeroPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new HeroPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a PrimaryAttribute object.
	 *
	 * @param      PrimaryAttribute $v
	 * @return     Hero The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPrimaryAttribute(PrimaryAttribute $v = null)
	{
		if ($v === null) {
			$this->setPrimaryAttributeId(NULL);
		} else {
			$this->setPrimaryAttributeId($v->getId());
		}

		$this->aPrimaryAttribute = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the PrimaryAttribute object, it will not be re-added.
		if ($v !== null) {
			$v->addHero($this);
		}

		return $this;
	}


	/**
	 * Get the associated PrimaryAttribute object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     PrimaryAttribute The associated PrimaryAttribute object.
	 * @throws     PropelException
	 */
	public function getPrimaryAttribute(PropelPDO $con = null)
	{
		if ($this->aPrimaryAttribute === null && ($this->primary_attribute_id !== null)) {
			$this->aPrimaryAttribute = PrimaryAttributePeer::retrieveByPk($this->primary_attribute_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aPrimaryAttribute->addHeros($this);
			 */
		}
		return $this->aPrimaryAttribute;
	}

	/**
	 * Declares an association between this object and a HeroType object.
	 *
	 * @param      HeroType $v
	 * @return     Hero The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setHeroType(HeroType $v = null)
	{
		if ($v === null) {
			$this->setTypeId(NULL);
		} else {
			$this->setTypeId($v->getId());
		}

		$this->aHeroType = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the HeroType object, it will not be re-added.
		if ($v !== null) {
			$v->addHero($this);
		}

		return $this;
	}


	/**
	 * Get the associated HeroType object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     HeroType The associated HeroType object.
	 * @throws     PropelException
	 */
	public function getHeroType(PropelPDO $con = null)
	{
		if ($this->aHeroType === null && ($this->type_id !== null)) {
			$this->aHeroType = HeroTypePeer::retrieveByPk($this->type_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aHeroType->addHeros($this);
			 */
		}
		return $this->aHeroType;
	}

	/**
	 * Declares an association between this object and a HeroAffiliation object.
	 *
	 * @param      HeroAffiliation $v
	 * @return     Hero The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setHeroAffiliation(HeroAffiliation $v = null)
	{
		if ($v === null) {
			$this->setAffiliationId(NULL);
		} else {
			$this->setAffiliationId($v->getId());
		}

		$this->aHeroAffiliation = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the HeroAffiliation object, it will not be re-added.
		if ($v !== null) {
			$v->addHero($this);
		}

		return $this;
	}


	/**
	 * Get the associated HeroAffiliation object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     HeroAffiliation The associated HeroAffiliation object.
	 * @throws     PropelException
	 */
	public function getHeroAffiliation(PropelPDO $con = null)
	{
		if ($this->aHeroAffiliation === null && ($this->affiliation_id !== null)) {
			$this->aHeroAffiliation = HeroAffiliationPeer::retrieveByPk($this->affiliation_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aHeroAffiliation->addHeros($this);
			 */
		}
		return $this->aHeroAffiliation;
	}

	/**
	 * Clears out the collHeroSkills collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addHeroSkills()
	 */
	public function clearHeroSkills()
	{
		$this->collHeroSkills = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collHeroSkills collection (array).
	 *
	 * By default this just sets the collHeroSkills collection to an empty array (like clearcollHeroSkills());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initHeroSkills()
	{
		$this->collHeroSkills = array();
	}

	/**
	 * Gets an array of HeroSkill objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Hero has previously been saved, it will retrieve
	 * related HeroSkills from storage. If this Hero is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array HeroSkill[]
	 * @throws     PropelException
	 */
	public function getHeroSkills($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(HeroPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collHeroSkills === null) {
			if ($this->isNew()) {
			   $this->collHeroSkills = array();
			} else {

				$criteria->add(HeroSkillPeer::HERO_ID, $this->id);

				HeroSkillPeer::addSelectColumns($criteria);
				$this->collHeroSkills = HeroSkillPeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(HeroSkillPeer::HERO_ID, $this->id);

				HeroSkillPeer::addSelectColumns($criteria);
				if (!isset($this->lastHeroSkillCriteria) || !$this->lastHeroSkillCriteria->equals($criteria)) {
					$this->collHeroSkills = HeroSkillPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastHeroSkillCriteria = $criteria;
		return $this->collHeroSkills;
	}

	/**
	 * Returns the number of related HeroSkill objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related HeroSkill objects.
	 * @throws     PropelException
	 */
	public function countHeroSkills(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(HeroPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collHeroSkills === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(HeroSkillPeer::HERO_ID, $this->id);

				$count = HeroSkillPeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(HeroSkillPeer::HERO_ID, $this->id);

				if (!isset($this->lastHeroSkillCriteria) || !$this->lastHeroSkillCriteria->equals($criteria)) {
					$count = HeroSkillPeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collHeroSkills);
				}
			} else {
				$count = count($this->collHeroSkills);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a HeroSkill object to this object
	 * through the HeroSkill foreign key attribute.
	 *
	 * @param      HeroSkill $l HeroSkill
	 * @return     void
	 * @throws     PropelException
	 */
	public function addHeroSkill(HeroSkill $l)
	{
		if ($this->collHeroSkills === null) {
			$this->initHeroSkills();
		}
		if (!in_array($l, $this->collHeroSkills, true)) { // only add it if the **same** object is not already associated
			array_push($this->collHeroSkills, $l);
			$l->setHero($this);
		}
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collHeroSkills) {
				foreach ((array) $this->collHeroSkills as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collHeroSkills = null;
			$this->aPrimaryAttribute = null;
			$this->aHeroType = null;
			$this->aHeroAffiliation = null;
	}

	// symfony_behaviors behavior
	
	/**
	 * Calls methods defined via {@link sfMixer}.
	 */
	public function __call($method, $arguments)
	{
	  if (!$callable = sfMixer::getCallable('BaseHero:'.$method))
	  {
	    throw new sfException(sprintf('Call to undefined method BaseHero::%s', $method));
	  }
	
	  array_unshift($arguments, $this);
	
	  return call_user_func_array($callable, $arguments);
	}

} // BaseHero
