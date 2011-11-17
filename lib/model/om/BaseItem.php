<?php

/**
 * Base class that represents a row from the 'items' table.
 *
 * 
 *
 * @package    lib.model.om
 */
abstract class BaseItem extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ItemPeer
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
	 * The value for the image_filename field.
	 * @var        string
	 */
	protected $image_filename;

	/**
	 * The value for the description field.
	 * @var        string
	 */
	protected $description;

	/**
	 * The value for the additional_info field.
	 * @var        string
	 */
	protected $additional_info;

	/**
	 * The value for the strength field.
	 * @var        int
	 */
	protected $strength;

	/**
	 * The value for the agility field.
	 * @var        int
	 */
	protected $agility;

	/**
	 * The value for the intelligence field.
	 * @var        int
	 */
	protected $intelligence;

	/**
	 * The value for the damage field.
	 * @var        int
	 */
	protected $damage;

	/**
	 * The value for the armor field.
	 * @var        int
	 */
	protected $armor;

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
	 * The value for the price field.
	 * @var        int
	 */
	protected $price;

	/**
	 * The value for the store_id field.
	 * @var        int
	 */
	protected $store_id;

	/**
	 * @var        ItemStore
	 */
	protected $aItemStore;

	/**
	 * @var        array ItemRecipe[] Collection to store aggregation of ItemRecipe objects.
	 */
	protected $collItemRecipes;

	/**
	 * @var        Criteria The criteria used to select the current contents of collItemRecipes.
	 */
	private $lastItemRecipeCriteria = null;

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
	
	const PEER = 'ItemPeer';

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
	 * Get the [image_filename] column value.
	 * 
	 * @return     string
	 */
	public function getImageFilename()
	{
		return $this->image_filename;
	}

	/**
	 * Get the [description] column value.
	 * 
	 * @return     string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Get the [additional_info] column value.
	 * 
	 * @return     string
	 */
	public function getAdditionalInfo()
	{
		return $this->additional_info;
	}

	/**
	 * Get the [strength] column value.
	 * 
	 * @return     int
	 */
	public function getStrength()
	{
		return $this->strength;
	}

	/**
	 * Get the [agility] column value.
	 * 
	 * @return     int
	 */
	public function getAgility()
	{
		return $this->agility;
	}

	/**
	 * Get the [intelligence] column value.
	 * 
	 * @return     int
	 */
	public function getIntelligence()
	{
		return $this->intelligence;
	}

	/**
	 * Get the [damage] column value.
	 * 
	 * @return     int
	 */
	public function getDamage()
	{
		return $this->damage;
	}

	/**
	 * Get the [armor] column value.
	 * 
	 * @return     int
	 */
	public function getArmor()
	{
		return $this->armor;
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
	 * Get the [price] column value.
	 * 
	 * @return     int
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * Get the [store_id] column value.
	 * 
	 * @return     int
	 */
	public function getStoreId()
	{
		return $this->store_id;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Item The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ItemPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     Item The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = ItemPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Set the value of [image_filename] column.
	 * 
	 * @param      string $v new value
	 * @return     Item The current object (for fluent API support)
	 */
	public function setImageFilename($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->image_filename !== $v) {
			$this->image_filename = $v;
			$this->modifiedColumns[] = ItemPeer::IMAGE_FILENAME;
		}

		return $this;
	} // setImageFilename()

	/**
	 * Set the value of [description] column.
	 * 
	 * @param      string $v new value
	 * @return     Item The current object (for fluent API support)
	 */
	public function setDescription($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = ItemPeer::DESCRIPTION;
		}

		return $this;
	} // setDescription()

	/**
	 * Set the value of [additional_info] column.
	 * 
	 * @param      string $v new value
	 * @return     Item The current object (for fluent API support)
	 */
	public function setAdditionalInfo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->additional_info !== $v) {
			$this->additional_info = $v;
			$this->modifiedColumns[] = ItemPeer::ADDITIONAL_INFO;
		}

		return $this;
	} // setAdditionalInfo()

	/**
	 * Set the value of [strength] column.
	 * 
	 * @param      int $v new value
	 * @return     Item The current object (for fluent API support)
	 */
	public function setStrength($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->strength !== $v) {
			$this->strength = $v;
			$this->modifiedColumns[] = ItemPeer::STRENGTH;
		}

		return $this;
	} // setStrength()

	/**
	 * Set the value of [agility] column.
	 * 
	 * @param      int $v new value
	 * @return     Item The current object (for fluent API support)
	 */
	public function setAgility($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->agility !== $v) {
			$this->agility = $v;
			$this->modifiedColumns[] = ItemPeer::AGILITY;
		}

		return $this;
	} // setAgility()

	/**
	 * Set the value of [intelligence] column.
	 * 
	 * @param      int $v new value
	 * @return     Item The current object (for fluent API support)
	 */
	public function setIntelligence($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->intelligence !== $v) {
			$this->intelligence = $v;
			$this->modifiedColumns[] = ItemPeer::INTELLIGENCE;
		}

		return $this;
	} // setIntelligence()

	/**
	 * Set the value of [damage] column.
	 * 
	 * @param      int $v new value
	 * @return     Item The current object (for fluent API support)
	 */
	public function setDamage($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->damage !== $v) {
			$this->damage = $v;
			$this->modifiedColumns[] = ItemPeer::DAMAGE;
		}

		return $this;
	} // setDamage()

	/**
	 * Set the value of [armor] column.
	 * 
	 * @param      int $v new value
	 * @return     Item The current object (for fluent API support)
	 */
	public function setArmor($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->armor !== $v) {
			$this->armor = $v;
			$this->modifiedColumns[] = ItemPeer::ARMOR;
		}

		return $this;
	} // setArmor()

	/**
	 * Set the value of [hp] column.
	 * 
	 * @param      int $v new value
	 * @return     Item The current object (for fluent API support)
	 */
	public function setHp($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->hp !== $v) {
			$this->hp = $v;
			$this->modifiedColumns[] = ItemPeer::HP;
		}

		return $this;
	} // setHp()

	/**
	 * Set the value of [mana] column.
	 * 
	 * @param      int $v new value
	 * @return     Item The current object (for fluent API support)
	 */
	public function setMana($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->mana !== $v) {
			$this->mana = $v;
			$this->modifiedColumns[] = ItemPeer::MANA;
		}

		return $this;
	} // setMana()

	/**
	 * Set the value of [price] column.
	 * 
	 * @param      int $v new value
	 * @return     Item The current object (for fluent API support)
	 */
	public function setPrice($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->price !== $v) {
			$this->price = $v;
			$this->modifiedColumns[] = ItemPeer::PRICE;
		}

		return $this;
	} // setPrice()

	/**
	 * Set the value of [store_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Item The current object (for fluent API support)
	 */
	public function setStoreId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->store_id !== $v) {
			$this->store_id = $v;
			$this->modifiedColumns[] = ItemPeer::STORE_ID;
		}

		if ($this->aItemStore !== null && $this->aItemStore->getId() !== $v) {
			$this->aItemStore = null;
		}

		return $this;
	} // setStoreId()

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
			$this->image_filename = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->description = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->additional_info = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->strength = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->agility = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->intelligence = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->damage = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->armor = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->hp = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->mana = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->price = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->store_id = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 14; // 14 = ItemPeer::NUM_COLUMNS - ItemPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Item object", $e);
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

		if ($this->aItemStore !== null && $this->store_id !== $this->aItemStore->getId()) {
			$this->aItemStore = null;
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
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ItemPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aItemStore = null;
			$this->collItemRecipes = null;
			$this->lastItemRecipeCriteria = null;

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
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseItem:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			
			    return;
			  }
			}

			if ($ret) {
				ItemPeer::doDelete($this, $con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseItem:delete:post') as $callable)
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
			$con = Propel::getConnection(ItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseItem:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseItem:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				ItemPeer::addInstanceToPool($this);
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

			if ($this->aItemStore !== null) {
				if ($this->aItemStore->isModified() || $this->aItemStore->isNew()) {
					$affectedRows += $this->aItemStore->save($con);
				}
				$this->setItemStore($this->aItemStore);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ItemPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ItemPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setId($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += ItemPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collItemRecipes !== null) {
				foreach ($this->collItemRecipes as $referrerFK) {
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

			if ($this->aItemStore !== null) {
				if (!$this->aItemStore->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aItemStore->getValidationFailures());
				}
			}


			if (($retval = ItemPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collItemRecipes !== null) {
					foreach ($this->collItemRecipes as $referrerFK) {
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
		$pos = ItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getImageFilename();
				break;
			case 3:
				return $this->getDescription();
				break;
			case 4:
				return $this->getAdditionalInfo();
				break;
			case 5:
				return $this->getStrength();
				break;
			case 6:
				return $this->getAgility();
				break;
			case 7:
				return $this->getIntelligence();
				break;
			case 8:
				return $this->getDamage();
				break;
			case 9:
				return $this->getArmor();
				break;
			case 10:
				return $this->getHp();
				break;
			case 11:
				return $this->getMana();
				break;
			case 12:
				return $this->getPrice();
				break;
			case 13:
				return $this->getStoreId();
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
		$keys = ItemPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getImageFilename(),
			$keys[3] => $this->getDescription(),
			$keys[4] => $this->getAdditionalInfo(),
			$keys[5] => $this->getStrength(),
			$keys[6] => $this->getAgility(),
			$keys[7] => $this->getIntelligence(),
			$keys[8] => $this->getDamage(),
			$keys[9] => $this->getArmor(),
			$keys[10] => $this->getHp(),
			$keys[11] => $this->getMana(),
			$keys[12] => $this->getPrice(),
			$keys[13] => $this->getStoreId(),
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
		$pos = ItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setImageFilename($value);
				break;
			case 3:
				$this->setDescription($value);
				break;
			case 4:
				$this->setAdditionalInfo($value);
				break;
			case 5:
				$this->setStrength($value);
				break;
			case 6:
				$this->setAgility($value);
				break;
			case 7:
				$this->setIntelligence($value);
				break;
			case 8:
				$this->setDamage($value);
				break;
			case 9:
				$this->setArmor($value);
				break;
			case 10:
				$this->setHp($value);
				break;
			case 11:
				$this->setMana($value);
				break;
			case 12:
				$this->setPrice($value);
				break;
			case 13:
				$this->setStoreId($value);
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
		$keys = ItemPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setImageFilename($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDescription($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAdditionalInfo($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStrength($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAgility($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIntelligence($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDamage($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setArmor($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setHp($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMana($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setPrice($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setStoreId($arr[$keys[13]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ItemPeer::DATABASE_NAME);

		if ($this->isColumnModified(ItemPeer::ID)) $criteria->add(ItemPeer::ID, $this->id);
		if ($this->isColumnModified(ItemPeer::NAME)) $criteria->add(ItemPeer::NAME, $this->name);
		if ($this->isColumnModified(ItemPeer::IMAGE_FILENAME)) $criteria->add(ItemPeer::IMAGE_FILENAME, $this->image_filename);
		if ($this->isColumnModified(ItemPeer::DESCRIPTION)) $criteria->add(ItemPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(ItemPeer::ADDITIONAL_INFO)) $criteria->add(ItemPeer::ADDITIONAL_INFO, $this->additional_info);
		if ($this->isColumnModified(ItemPeer::STRENGTH)) $criteria->add(ItemPeer::STRENGTH, $this->strength);
		if ($this->isColumnModified(ItemPeer::AGILITY)) $criteria->add(ItemPeer::AGILITY, $this->agility);
		if ($this->isColumnModified(ItemPeer::INTELLIGENCE)) $criteria->add(ItemPeer::INTELLIGENCE, $this->intelligence);
		if ($this->isColumnModified(ItemPeer::DAMAGE)) $criteria->add(ItemPeer::DAMAGE, $this->damage);
		if ($this->isColumnModified(ItemPeer::ARMOR)) $criteria->add(ItemPeer::ARMOR, $this->armor);
		if ($this->isColumnModified(ItemPeer::HP)) $criteria->add(ItemPeer::HP, $this->hp);
		if ($this->isColumnModified(ItemPeer::MANA)) $criteria->add(ItemPeer::MANA, $this->mana);
		if ($this->isColumnModified(ItemPeer::PRICE)) $criteria->add(ItemPeer::PRICE, $this->price);
		if ($this->isColumnModified(ItemPeer::STORE_ID)) $criteria->add(ItemPeer::STORE_ID, $this->store_id);

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
		$criteria = new Criteria(ItemPeer::DATABASE_NAME);

		$criteria->add(ItemPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Item (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setName($this->name);

		$copyObj->setImageFilename($this->image_filename);

		$copyObj->setDescription($this->description);

		$copyObj->setAdditionalInfo($this->additional_info);

		$copyObj->setStrength($this->strength);

		$copyObj->setAgility($this->agility);

		$copyObj->setIntelligence($this->intelligence);

		$copyObj->setDamage($this->damage);

		$copyObj->setArmor($this->armor);

		$copyObj->setHp($this->hp);

		$copyObj->setMana($this->mana);

		$copyObj->setPrice($this->price);

		$copyObj->setStoreId($this->store_id);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getItemRecipes() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addItemRecipe($relObj->copy($deepCopy));
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
	 * @return     Item Clone of current object.
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
	 * @return     ItemPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ItemPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a ItemStore object.
	 *
	 * @param      ItemStore $v
	 * @return     Item The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setItemStore(ItemStore $v = null)
	{
		if ($v === null) {
			$this->setStoreId(NULL);
		} else {
			$this->setStoreId($v->getId());
		}

		$this->aItemStore = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ItemStore object, it will not be re-added.
		if ($v !== null) {
			$v->addItem($this);
		}

		return $this;
	}


	/**
	 * Get the associated ItemStore object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ItemStore The associated ItemStore object.
	 * @throws     PropelException
	 */
	public function getItemStore(PropelPDO $con = null)
	{
		if ($this->aItemStore === null && ($this->store_id !== null)) {
			$this->aItemStore = ItemStorePeer::retrieveByPk($this->store_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aItemStore->addItems($this);
			 */
		}
		return $this->aItemStore;
	}

	/**
	 * Clears out the collItemRecipes collection (array).
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addItemRecipes()
	 */
	public function clearItemRecipes()
	{
		$this->collItemRecipes = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collItemRecipes collection (array).
	 *
	 * By default this just sets the collItemRecipes collection to an empty array (like clearcollItemRecipes());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initItemRecipes()
	{
		$this->collItemRecipes = array();
	}

	/**
	 * Gets an array of ItemRecipe objects which contain a foreign key that references this object.
	 *
	 * If this collection has already been initialized with an identical Criteria, it returns the collection.
	 * Otherwise if this Item has previously been saved, it will retrieve
	 * related ItemRecipes from storage. If this Item is new, it will return
	 * an empty collection or the current collection, the criteria is ignored on a new object.
	 *
	 * @param      PropelPDO $con
	 * @param      Criteria $criteria
	 * @return     array ItemRecipe[]
	 * @throws     PropelException
	 */
	public function getItemRecipes($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ItemPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collItemRecipes === null) {
			if ($this->isNew()) {
			   $this->collItemRecipes = array();
			} else {

				$criteria->add(ItemRecipePeer::ITEM_ID, $this->id);

				ItemRecipePeer::addSelectColumns($criteria);
				$this->collItemRecipes = ItemRecipePeer::doSelect($criteria, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return the collection.


				$criteria->add(ItemRecipePeer::ITEM_ID, $this->id);

				ItemRecipePeer::addSelectColumns($criteria);
				if (!isset($this->lastItemRecipeCriteria) || !$this->lastItemRecipeCriteria->equals($criteria)) {
					$this->collItemRecipes = ItemRecipePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastItemRecipeCriteria = $criteria;
		return $this->collItemRecipes;
	}

	/**
	 * Returns the number of related ItemRecipe objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ItemRecipe objects.
	 * @throws     PropelException
	 */
	public function countItemRecipes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ItemPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collItemRecipes === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ItemRecipePeer::ITEM_ID, $this->id);

				$count = ItemRecipePeer::doCount($criteria, false, $con);
			}
		} else {
			// criteria has no effect for a new object
			if (!$this->isNew()) {
				// the following code is to determine if a new query is
				// called for.  If the criteria is the same as the last
				// one, just return count of the collection.


				$criteria->add(ItemRecipePeer::ITEM_ID, $this->id);

				if (!isset($this->lastItemRecipeCriteria) || !$this->lastItemRecipeCriteria->equals($criteria)) {
					$count = ItemRecipePeer::doCount($criteria, false, $con);
				} else {
					$count = count($this->collItemRecipes);
				}
			} else {
				$count = count($this->collItemRecipes);
			}
		}
		return $count;
	}

	/**
	 * Method called to associate a ItemRecipe object to this object
	 * through the ItemRecipe foreign key attribute.
	 *
	 * @param      ItemRecipe $l ItemRecipe
	 * @return     void
	 * @throws     PropelException
	 */
	public function addItemRecipe(ItemRecipe $l)
	{
		if ($this->collItemRecipes === null) {
			$this->initItemRecipes();
		}
		if (!in_array($l, $this->collItemRecipes, true)) { // only add it if the **same** object is not already associated
			array_push($this->collItemRecipes, $l);
			$l->setItem($this);
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
			if ($this->collItemRecipes) {
				foreach ((array) $this->collItemRecipes as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collItemRecipes = null;
			$this->aItemStore = null;
	}

	// symfony_behaviors behavior
	
	/**
	 * Calls methods defined via {@link sfMixer}.
	 */
	public function __call($method, $arguments)
	{
	  if (!$callable = sfMixer::getCallable('BaseItem:'.$method))
	  {
	    throw new sfException(sprintf('Call to undefined method BaseItem::%s', $method));
	  }
	
	  array_unshift($arguments, $this);
	
	  return call_user_func_array($callable, $arguments);
	}

} // BaseItem
