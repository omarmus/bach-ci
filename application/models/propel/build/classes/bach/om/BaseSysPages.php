<?php


/**
 * Base class that represents a row from the 'sys_pages' table.
 *
 * 
 *
 * @package    propel.generator.bach.om
 */
abstract class BaseSysPages extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'SysPagesPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        SysPagesPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_page field.
     * @var        int
     */
    protected $id_page;

    /**
     * The value for the title field.
     * @var        string
     */
    protected $title;

    /**
     * The value for the slug field.
     * @var        string
     */
    protected $slug;

    /**
     * The value for the order field.
     * @var        int
     */
    protected $order;

    /**
     * The value for the id_module field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $id_module;

    /**
     * The value for the id_section field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $id_section;

    /**
     * The value for the state field.
     * Note: this column has a database default value of: 'ACTIVE'
     * @var        string
     */
    protected $state;

    /**
     * The value for the visible field.
     * Note: this column has a database default value of: 'YES'
     * @var        string
     */
    protected $visible;

    /**
     * @var        PropelObjectCollection|SysPermissions[] Collection to store aggregation of SysPermissions objects.
     */
    protected $collSysPermissionss;
    protected $collSysPermissionssPartial;

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

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sysPermissionssScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->id_module = 0;
        $this->id_section = 0;
        $this->state = 'ACTIVE';
        $this->visible = 'YES';
    }

    /**
     * Initializes internal state of BaseSysPages object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_page] column value.
     * 
     * @return int
     */
    public function getIdPage()
    {

        return $this->id_page;
    }

    /**
     * Get the [title] column value.
     * 
     * @return string
     */
    public function getTitle()
    {

        return $this->title;
    }

    /**
     * Get the [slug] column value.
     * 
     * @return string
     */
    public function getSlug()
    {

        return $this->slug;
    }

    /**
     * Get the [order] column value.
     * 
     * @return int
     */
    public function getOrder()
    {

        return $this->order;
    }

    /**
     * Get the [id_module] column value.
     * 
     * @return int
     */
    public function getIdModule()
    {

        return $this->id_module;
    }

    /**
     * Get the [id_section] column value.
     * 
     * @return int
     */
    public function getIdSection()
    {

        return $this->id_section;
    }

    /**
     * Get the [state] column value.
     * 
     * @return string
     */
    public function getState()
    {

        return $this->state;
    }

    /**
     * Get the [visible] column value.
     * 
     * @return string
     */
    public function getVisible()
    {

        return $this->visible;
    }

    /**
     * Set the value of [id_page] column.
     * 
     * @param  int $v new value
     * @return SysPages The current object (for fluent API support)
     */
    public function setIdPage($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_page !== $v) {
            $this->id_page = $v;
            $this->modifiedColumns[] = SysPagesPeer::ID_PAGE;
        }


        return $this;
    } // setIdPage()

    /**
     * Set the value of [title] column.
     * 
     * @param  string $v new value
     * @return SysPages The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[] = SysPagesPeer::TITLE;
        }


        return $this;
    } // setTitle()

    /**
     * Set the value of [slug] column.
     * 
     * @param  string $v new value
     * @return SysPages The current object (for fluent API support)
     */
    public function setSlug($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->slug !== $v) {
            $this->slug = $v;
            $this->modifiedColumns[] = SysPagesPeer::SLUG;
        }


        return $this;
    } // setSlug()

    /**
     * Set the value of [order] column.
     * 
     * @param  int $v new value
     * @return SysPages The current object (for fluent API support)
     */
    public function setOrder($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->order !== $v) {
            $this->order = $v;
            $this->modifiedColumns[] = SysPagesPeer::ORDER;
        }


        return $this;
    } // setOrder()

    /**
     * Set the value of [id_module] column.
     * 
     * @param  int $v new value
     * @return SysPages The current object (for fluent API support)
     */
    public function setIdModule($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_module !== $v) {
            $this->id_module = $v;
            $this->modifiedColumns[] = SysPagesPeer::ID_MODULE;
        }


        return $this;
    } // setIdModule()

    /**
     * Set the value of [id_section] column.
     * 
     * @param  int $v new value
     * @return SysPages The current object (for fluent API support)
     */
    public function setIdSection($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_section !== $v) {
            $this->id_section = $v;
            $this->modifiedColumns[] = SysPagesPeer::ID_SECTION;
        }


        return $this;
    } // setIdSection()

    /**
     * Set the value of [state] column.
     * 
     * @param  string $v new value
     * @return SysPages The current object (for fluent API support)
     */
    public function setState($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->state !== $v) {
            $this->state = $v;
            $this->modifiedColumns[] = SysPagesPeer::STATE;
        }


        return $this;
    } // setState()

    /**
     * Set the value of [visible] column.
     * 
     * @param  string $v new value
     * @return SysPages The current object (for fluent API support)
     */
    public function setVisible($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->visible !== $v) {
            $this->visible = $v;
            $this->modifiedColumns[] = SysPagesPeer::VISIBLE;
        }


        return $this;
    } // setVisible()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->id_module !== 0) {
                return false;
            }

            if ($this->id_section !== 0) {
                return false;
            }

            if ($this->state !== 'ACTIVE') {
                return false;
            }

            if ($this->visible !== 'YES') {
                return false;
            }

        // otherwise, everything was equal, so return true
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
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which resultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->id_page = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->title = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->slug = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->order = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
            $this->id_module = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->id_section = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->state = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->visible = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 8; // 8 = SysPagesPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating SysPages object", $e);
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
     * @throws PropelException
     */
    public function ensureConsistency()
    {

    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
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
            $con = Propel::getConnection(SysPagesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = SysPagesPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collSysPermissionss = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(SysPagesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = SysPagesQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
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
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(SysPagesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
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
                SysPagesPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
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
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->sysPermissionssScheduledForDeletion !== null) {
                if (!$this->sysPermissionssScheduledForDeletion->isEmpty()) {
                    SysPermissionsQuery::create()
                        ->filterByPrimaryKeys($this->sysPermissionssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sysPermissionssScheduledForDeletion = null;
                }
            }

            if ($this->collSysPermissionss !== null) {
                foreach ($this->collSysPermissionss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[] = SysPagesPeer::ID_PAGE;
        if (null !== $this->id_page) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SysPagesPeer::ID_PAGE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SysPagesPeer::ID_PAGE)) {
            $modifiedColumns[':p' . $index++]  = '`id_page`';
        }
        if ($this->isColumnModified(SysPagesPeer::TITLE)) {
            $modifiedColumns[':p' . $index++]  = '`title`';
        }
        if ($this->isColumnModified(SysPagesPeer::SLUG)) {
            $modifiedColumns[':p' . $index++]  = '`slug`';
        }
        if ($this->isColumnModified(SysPagesPeer::ORDER)) {
            $modifiedColumns[':p' . $index++]  = '`order`';
        }
        if ($this->isColumnModified(SysPagesPeer::ID_MODULE)) {
            $modifiedColumns[':p' . $index++]  = '`id_module`';
        }
        if ($this->isColumnModified(SysPagesPeer::ID_SECTION)) {
            $modifiedColumns[':p' . $index++]  = '`id_section`';
        }
        if ($this->isColumnModified(SysPagesPeer::STATE)) {
            $modifiedColumns[':p' . $index++]  = '`state`';
        }
        if ($this->isColumnModified(SysPagesPeer::VISIBLE)) {
            $modifiedColumns[':p' . $index++]  = '`visible`';
        }

        $sql = sprintf(
            'INSERT INTO `sys_pages` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_page`':						
                        $stmt->bindValue($identifier, $this->id_page, PDO::PARAM_INT);
                        break;
                    case '`title`':						
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case '`slug`':						
                        $stmt->bindValue($identifier, $this->slug, PDO::PARAM_STR);
                        break;
                    case '`order`':						
                        $stmt->bindValue($identifier, $this->order, PDO::PARAM_INT);
                        break;
                    case '`id_module`':						
                        $stmt->bindValue($identifier, $this->id_module, PDO::PARAM_INT);
                        break;
                    case '`id_section`':						
                        $stmt->bindValue($identifier, $this->id_section, PDO::PARAM_INT);
                        break;
                    case '`state`':						
                        $stmt->bindValue($identifier, $this->state, PDO::PARAM_STR);
                        break;
                    case '`visible`':						
                        $stmt->bindValue($identifier, $this->visible, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', $e);
        }
        $this->setIdPage($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
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
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggregated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objects otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = SysPagesPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collSysPermissionss !== null) {
                    foreach ($this->collSysPermissionss as $referrerFK) {
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
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_PHPNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = SysPagesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdPage();
                break;
            case 1:
                return $this->getTitle();
                break;
            case 2:
                return $this->getSlug();
                break;
            case 3:
                return $this->getOrder();
                break;
            case 4:
                return $this->getIdModule();
                break;
            case 5:
                return $this->getIdSection();
                break;
            case 6:
                return $this->getState();
                break;
            case 7:
                return $this->getVisible();
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
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['SysPages'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SysPages'][$this->getPrimaryKey()] = true;
        $keys = SysPagesPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdPage(),
            $keys[1] => $this->getTitle(),
            $keys[2] => $this->getSlug(),
            $keys[3] => $this->getOrder(),
            $keys[4] => $this->getIdModule(),
            $keys[5] => $this->getIdSection(),
            $keys[6] => $this->getState(),
            $keys[7] => $this->getVisible(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach($virtualColumns as $key => $virtualColumn)
        {
            $result[$key] = $virtualColumn;
        }
        
        if ($includeForeignObjects) {
            if (null !== $this->collSysPermissionss) {
                $result['SysPermissionss'] = $this->collSysPermissionss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_PHPNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
    {
        $pos = SysPagesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdPage($value);
                break;
            case 1:
                $this->setTitle($value);
                break;
            case 2:
                $this->setSlug($value);
                break;
            case 3:
                $this->setOrder($value);
                break;
            case 4:
                $this->setIdModule($value);
                break;
            case 5:
                $this->setIdSection($value);
                break;
            case 6:
                $this->setState($value);
                break;
            case 7:
                $this->setVisible($value);
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
     * The default key type is the column's BasePeer::TYPE_PHPNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
    {
        $keys = SysPagesPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdPage($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setTitle($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setSlug($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setOrder($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setIdModule($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setIdSection($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setState($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setVisible($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SysPagesPeer::DATABASE_NAME);

        if ($this->isColumnModified(SysPagesPeer::ID_PAGE)) $criteria->add(SysPagesPeer::ID_PAGE, $this->id_page);
        if ($this->isColumnModified(SysPagesPeer::TITLE)) $criteria->add(SysPagesPeer::TITLE, $this->title);
        if ($this->isColumnModified(SysPagesPeer::SLUG)) $criteria->add(SysPagesPeer::SLUG, $this->slug);
        if ($this->isColumnModified(SysPagesPeer::ORDER)) $criteria->add(SysPagesPeer::ORDER, $this->order);
        if ($this->isColumnModified(SysPagesPeer::ID_MODULE)) $criteria->add(SysPagesPeer::ID_MODULE, $this->id_module);
        if ($this->isColumnModified(SysPagesPeer::ID_SECTION)) $criteria->add(SysPagesPeer::ID_SECTION, $this->id_section);
        if ($this->isColumnModified(SysPagesPeer::STATE)) $criteria->add(SysPagesPeer::STATE, $this->state);
        if ($this->isColumnModified(SysPagesPeer::VISIBLE)) $criteria->add(SysPagesPeer::VISIBLE, $this->visible);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(SysPagesPeer::DATABASE_NAME);
        $criteria->add(SysPagesPeer::ID_PAGE, $this->id_page);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdPage();
    }

    /**
     * Generic method to set the primary key (id_page column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdPage($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdPage();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of SysPages (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTitle($this->getTitle());
        $copyObj->setSlug($this->getSlug());
        $copyObj->setOrder($this->getOrder());
        $copyObj->setIdModule($this->getIdModule());
        $copyObj->setIdSection($this->getIdSection());
        $copyObj->setState($this->getState());
        $copyObj->setVisible($this->getVisible());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getSysPermissionss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSysPermissions($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdPage(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return SysPages Clone of current object.
     * @throws PropelException
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
     * @return SysPagesPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new SysPagesPeer();
        }

        return self::$peer;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('SysPermissions' == $relationName) {
            $this->initSysPermissionss();
        }
    }

    /**
     * Clears out the collSysPermissionss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SysPages The current object (for fluent API support)
     * @see        addSysPermissionss()
     */
    public function clearSysPermissionss()
    {
        $this->collSysPermissionss = null; // important to set this to null since that means it is uninitialized
        $this->collSysPermissionssPartial = null;

        return $this;
    }

    /**
     * reset is the collSysPermissionss collection loaded partially
     *
     * @return void
     */
    public function resetPartialSysPermissionss($v = true)
    {
        $this->collSysPermissionssPartial = $v;
    }

    /**
     * Initializes the collSysPermissionss collection.
     *
     * By default this just sets the collSysPermissionss collection to an empty array (like clearcollSysPermissionss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSysPermissionss($overrideExisting = true)
    {
        if (null !== $this->collSysPermissionss && !$overrideExisting) {
            return;
        }
        $this->collSysPermissionss = new PropelObjectCollection();
        $this->collSysPermissionss->setModel('SysPermissions');
    }

    /**
     * Gets an array of SysPermissions objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SysPages is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SysPermissions[] List of SysPermissions objects
     * @throws PropelException
     */
    public function getSysPermissionss($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSysPermissionssPartial && !$this->isNew();
        if (null === $this->collSysPermissionss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSysPermissionss) {
                // return empty collection
                $this->initSysPermissionss();
            } else {
                $collSysPermissionss = SysPermissionsQuery::create(null, $criteria)
                    ->filterBySysPages($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSysPermissionssPartial && count($collSysPermissionss)) {
                      $this->initSysPermissionss(false);

                      foreach ($collSysPermissionss as $obj) {
                        if (false == $this->collSysPermissionss->contains($obj)) {
                          $this->collSysPermissionss->append($obj);
                        }
                      }

                      $this->collSysPermissionssPartial = true;
                    }

                    $collSysPermissionss->getInternalIterator()->rewind();

                    return $collSysPermissionss;
                }

                if ($partial && $this->collSysPermissionss) {
                    foreach ($this->collSysPermissionss as $obj) {
                        if ($obj->isNew()) {
                            $collSysPermissionss[] = $obj;
                        }
                    }
                }

                $this->collSysPermissionss = $collSysPermissionss;
                $this->collSysPermissionssPartial = false;
            }
        }

        return $this->collSysPermissionss;
    }

    /**
     * Sets a collection of SysPermissions objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sysPermissionss A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SysPages The current object (for fluent API support)
     */
    public function setSysPermissionss(PropelCollection $sysPermissionss, PropelPDO $con = null)
    {
        $sysPermissionssToDelete = $this->getSysPermissionss(new Criteria(), $con)->diff($sysPermissionss);


        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->sysPermissionssScheduledForDeletion = clone $sysPermissionssToDelete;

        foreach ($sysPermissionssToDelete as $sysPermissionsRemoved) {
            $sysPermissionsRemoved->setSysPages(null);
        }

        $this->collSysPermissionss = null;
        foreach ($sysPermissionss as $sysPermissions) {
            $this->addSysPermissions($sysPermissions);
        }

        $this->collSysPermissionss = $sysPermissionss;
        $this->collSysPermissionssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SysPermissions objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SysPermissions objects.
     * @throws PropelException
     */
    public function countSysPermissionss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSysPermissionssPartial && !$this->isNew();
        if (null === $this->collSysPermissionss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSysPermissionss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSysPermissionss());
            }
            $query = SysPermissionsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySysPages($this)
                ->count($con);
        }

        return count($this->collSysPermissionss);
    }

    /**
     * Method called to associate a SysPermissions object to this object
     * through the SysPermissions foreign key attribute.
     *
     * @param    SysPermissions $l SysPermissions
     * @return SysPages The current object (for fluent API support)
     */
    public function addSysPermissions(SysPermissions $l)
    {
        if ($this->collSysPermissionss === null) {
            $this->initSysPermissionss();
            $this->collSysPermissionssPartial = true;
        }
        if (!in_array($l, $this->collSysPermissionss->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSysPermissions($l);
        }

        return $this;
    }

    /**
     * @param	SysPermissions $sysPermissions The sysPermissions object to add.
     */
    protected function doAddSysPermissions($sysPermissions)
    {
        $this->collSysPermissionss[]= $sysPermissions;
        $sysPermissions->setSysPages($this);
    }

    /**
     * @param	SysPermissions $sysPermissions The sysPermissions object to remove.
     * @return SysPages The current object (for fluent API support)
     */
    public function removeSysPermissions($sysPermissions)
    {
        if ($this->getSysPermissionss()->contains($sysPermissions)) {
            $this->collSysPermissionss->remove($this->collSysPermissionss->search($sysPermissions));
            if (null === $this->sysPermissionssScheduledForDeletion) {
                $this->sysPermissionssScheduledForDeletion = clone $this->collSysPermissionss;
                $this->sysPermissionssScheduledForDeletion->clear();
            }
            $this->sysPermissionssScheduledForDeletion[]= clone $sysPermissions;
            $sysPermissions->setSysPages(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SysPages is new, it will return
     * an empty collection; or if this SysPages has previously
     * been saved, it will retrieve related SysPermissionss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SysPages.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SysPermissions[] List of SysPermissions objects
     */
    public function getSysPermissionssJoinSysRoles($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SysPermissionsQuery::create(null, $criteria);
        $query->joinWith('SysRoles', $join_behavior);

        return $this->getSysPermissionss($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_page = null;
        $this->title = null;
        $this->slug = null;
        $this->order = null;
        $this->id_module = null;
        $this->id_section = null;
        $this->state = null;
        $this->visible = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volume/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collSysPermissionss) {
                foreach ($this->collSysPermissionss as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collSysPermissionss instanceof PropelCollection) {
            $this->collSysPermissionss->clearIterator();
        }
        $this->collSysPermissionss = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SysPagesPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
