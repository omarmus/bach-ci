<?php


/**
 * Base class that represents a row from the 'sys_files' table.
 *
 * 
 *
 * @package    propel.generator.bach.om
 */
abstract class BaseSysFiles extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'SysFilesPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        SysFilesPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_file field.
     * @var        int
     */
    protected $id_file;

    /**
     * The value for the filename field.
     * @var        string
     */
    protected $filename;

    /**
     * The value for the title field.
     * @var        string
     */
    protected $title;

    /**
     * The value for the type field.
     * @var        string
     */
    protected $type;

    /**
     * The value for the fullpath field.
     * @var        string
     */
    protected $fullpath;

    /**
     * The value for the size field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $size;

    /**
     * The value for the image_width field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $image_width;

    /**
     * The value for the image_height field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $image_height;

    /**
     * The value for the image_type field.
     * @var        string
     */
    protected $image_type;

    /**
     * The value for the is_image field.
     * Note: this column has a database default value of: 'NO'
     * @var        string
     */
    protected $is_image;

    /**
     * @var        PropelObjectCollection|SysUsers[] Collection to store aggregation of SysUsers objects.
     */
    protected $collSysUserss;
    protected $collSysUserssPartial;

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
    protected $sysUserssScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->size = '0';
        $this->image_width = 0;
        $this->image_height = 0;
        $this->is_image = 'NO';
    }

    /**
     * Initializes internal state of BaseSysFiles object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_file] column value.
     * 
     * @return int
     */
    public function getIdFile()
    {

        return $this->id_file;
    }

    /**
     * Get the [filename] column value.
     * 
     * @return string
     */
    public function getFilename()
    {

        return $this->filename;
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
     * Get the [type] column value.
     * 
     * @return string
     */
    public function getType()
    {

        return $this->type;
    }

    /**
     * Get the [fullpath] column value.
     * 
     * @return string
     */
    public function getFullpath()
    {

        return $this->fullpath;
    }

    /**
     * Get the [size] column value.
     * 
     * @return string
     */
    public function getSize()
    {

        return $this->size;
    }

    /**
     * Get the [image_width] column value.
     * 
     * @return int
     */
    public function getImageWidth()
    {

        return $this->image_width;
    }

    /**
     * Get the [image_height] column value.
     * 
     * @return int
     */
    public function getImageHeight()
    {

        return $this->image_height;
    }

    /**
     * Get the [image_type] column value.
     * 
     * @return string
     */
    public function getImageType()
    {

        return $this->image_type;
    }

    /**
     * Get the [is_image] column value.
     * 
     * @return string
     */
    public function getIsImage()
    {

        return $this->is_image;
    }

    /**
     * Set the value of [id_file] column.
     * 
     * @param  int $v new value
     * @return SysFiles The current object (for fluent API support)
     */
    public function setIdFile($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_file !== $v) {
            $this->id_file = $v;
            $this->modifiedColumns[] = SysFilesPeer::ID_FILE;
        }


        return $this;
    } // setIdFile()

    /**
     * Set the value of [filename] column.
     * 
     * @param  string $v new value
     * @return SysFiles The current object (for fluent API support)
     */
    public function setFilename($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->filename !== $v) {
            $this->filename = $v;
            $this->modifiedColumns[] = SysFilesPeer::FILENAME;
        }


        return $this;
    } // setFilename()

    /**
     * Set the value of [title] column.
     * 
     * @param  string $v new value
     * @return SysFiles The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->title !== $v) {
            $this->title = $v;
            $this->modifiedColumns[] = SysFilesPeer::TITLE;
        }


        return $this;
    } // setTitle()

    /**
     * Set the value of [type] column.
     * 
     * @param  string $v new value
     * @return SysFiles The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[] = SysFilesPeer::TYPE;
        }


        return $this;
    } // setType()

    /**
     * Set the value of [fullpath] column.
     * 
     * @param  string $v new value
     * @return SysFiles The current object (for fluent API support)
     */
    public function setFullpath($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->fullpath !== $v) {
            $this->fullpath = $v;
            $this->modifiedColumns[] = SysFilesPeer::FULLPATH;
        }


        return $this;
    } // setFullpath()

    /**
     * Set the value of [size] column.
     * 
     * @param  string $v new value
     * @return SysFiles The current object (for fluent API support)
     */
    public function setSize($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->size !== $v) {
            $this->size = $v;
            $this->modifiedColumns[] = SysFilesPeer::SIZE;
        }


        return $this;
    } // setSize()

    /**
     * Set the value of [image_width] column.
     * 
     * @param  int $v new value
     * @return SysFiles The current object (for fluent API support)
     */
    public function setImageWidth($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->image_width !== $v) {
            $this->image_width = $v;
            $this->modifiedColumns[] = SysFilesPeer::IMAGE_WIDTH;
        }


        return $this;
    } // setImageWidth()

    /**
     * Set the value of [image_height] column.
     * 
     * @param  int $v new value
     * @return SysFiles The current object (for fluent API support)
     */
    public function setImageHeight($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->image_height !== $v) {
            $this->image_height = $v;
            $this->modifiedColumns[] = SysFilesPeer::IMAGE_HEIGHT;
        }


        return $this;
    } // setImageHeight()

    /**
     * Set the value of [image_type] column.
     * 
     * @param  string $v new value
     * @return SysFiles The current object (for fluent API support)
     */
    public function setImageType($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->image_type !== $v) {
            $this->image_type = $v;
            $this->modifiedColumns[] = SysFilesPeer::IMAGE_TYPE;
        }


        return $this;
    } // setImageType()

    /**
     * Set the value of [is_image] column.
     * 
     * @param  string $v new value
     * @return SysFiles The current object (for fluent API support)
     */
    public function setIsImage($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->is_image !== $v) {
            $this->is_image = $v;
            $this->modifiedColumns[] = SysFilesPeer::IS_IMAGE;
        }


        return $this;
    } // setIsImage()

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
            if ($this->size !== '0') {
                return false;
            }

            if ($this->image_width !== 0) {
                return false;
            }

            if ($this->image_height !== 0) {
                return false;
            }

            if ($this->is_image !== 'NO') {
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

            $this->id_file = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->filename = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->title = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->type = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->fullpath = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->size = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->image_width = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->image_height = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->image_type = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->is_image = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 10; // 10 = SysFilesPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating SysFiles object", $e);
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
            $con = Propel::getConnection(SysFilesPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = SysFilesPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collSysUserss = null;

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
            $con = Propel::getConnection(SysFilesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = SysFilesQuery::create()
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
            $con = Propel::getConnection(SysFilesPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                SysFilesPeer::addInstanceToPool($this);
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

            if ($this->sysUserssScheduledForDeletion !== null) {
                if (!$this->sysUserssScheduledForDeletion->isEmpty()) {
                    foreach ($this->sysUserssScheduledForDeletion as $sysUsers) {
                        // need to save related object because we set the relation to null
                        $sysUsers->save($con);
                    }
                    $this->sysUserssScheduledForDeletion = null;
                }
            }

            if ($this->collSysUserss !== null) {
                foreach ($this->collSysUserss as $referrerFK) {
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

        $this->modifiedColumns[] = SysFilesPeer::ID_FILE;
        if (null !== $this->id_file) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SysFilesPeer::ID_FILE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SysFilesPeer::ID_FILE)) {
            $modifiedColumns[':p' . $index++]  = '`id_file`';
        }
        if ($this->isColumnModified(SysFilesPeer::FILENAME)) {
            $modifiedColumns[':p' . $index++]  = '`filename`';
        }
        if ($this->isColumnModified(SysFilesPeer::TITLE)) {
            $modifiedColumns[':p' . $index++]  = '`title`';
        }
        if ($this->isColumnModified(SysFilesPeer::TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`type`';
        }
        if ($this->isColumnModified(SysFilesPeer::FULLPATH)) {
            $modifiedColumns[':p' . $index++]  = '`fullpath`';
        }
        if ($this->isColumnModified(SysFilesPeer::SIZE)) {
            $modifiedColumns[':p' . $index++]  = '`size`';
        }
        if ($this->isColumnModified(SysFilesPeer::IMAGE_WIDTH)) {
            $modifiedColumns[':p' . $index++]  = '`image_width`';
        }
        if ($this->isColumnModified(SysFilesPeer::IMAGE_HEIGHT)) {
            $modifiedColumns[':p' . $index++]  = '`image_height`';
        }
        if ($this->isColumnModified(SysFilesPeer::IMAGE_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`image_type`';
        }
        if ($this->isColumnModified(SysFilesPeer::IS_IMAGE)) {
            $modifiedColumns[':p' . $index++]  = '`is_image`';
        }

        $sql = sprintf(
            'INSERT INTO `sys_files` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_file`':						
                        $stmt->bindValue($identifier, $this->id_file, PDO::PARAM_INT);
                        break;
                    case '`filename`':						
                        $stmt->bindValue($identifier, $this->filename, PDO::PARAM_STR);
                        break;
                    case '`title`':						
                        $stmt->bindValue($identifier, $this->title, PDO::PARAM_STR);
                        break;
                    case '`type`':						
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_STR);
                        break;
                    case '`fullpath`':						
                        $stmt->bindValue($identifier, $this->fullpath, PDO::PARAM_STR);
                        break;
                    case '`size`':						
                        $stmt->bindValue($identifier, $this->size, PDO::PARAM_STR);
                        break;
                    case '`image_width`':						
                        $stmt->bindValue($identifier, $this->image_width, PDO::PARAM_INT);
                        break;
                    case '`image_height`':						
                        $stmt->bindValue($identifier, $this->image_height, PDO::PARAM_INT);
                        break;
                    case '`image_type`':						
                        $stmt->bindValue($identifier, $this->image_type, PDO::PARAM_STR);
                        break;
                    case '`is_image`':						
                        $stmt->bindValue($identifier, $this->is_image, PDO::PARAM_STR);
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
        $this->setIdFile($pk);

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


            if (($retval = SysFilesPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collSysUserss !== null) {
                    foreach ($this->collSysUserss as $referrerFK) {
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
        $pos = SysFilesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdFile();
                break;
            case 1:
                return $this->getFilename();
                break;
            case 2:
                return $this->getTitle();
                break;
            case 3:
                return $this->getType();
                break;
            case 4:
                return $this->getFullpath();
                break;
            case 5:
                return $this->getSize();
                break;
            case 6:
                return $this->getImageWidth();
                break;
            case 7:
                return $this->getImageHeight();
                break;
            case 8:
                return $this->getImageType();
                break;
            case 9:
                return $this->getIsImage();
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
        if (isset($alreadyDumpedObjects['SysFiles'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SysFiles'][$this->getPrimaryKey()] = true;
        $keys = SysFilesPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdFile(),
            $keys[1] => $this->getFilename(),
            $keys[2] => $this->getTitle(),
            $keys[3] => $this->getType(),
            $keys[4] => $this->getFullpath(),
            $keys[5] => $this->getSize(),
            $keys[6] => $this->getImageWidth(),
            $keys[7] => $this->getImageHeight(),
            $keys[8] => $this->getImageType(),
            $keys[9] => $this->getIsImage(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach($virtualColumns as $key => $virtualColumn)
        {
            $result[$key] = $virtualColumn;
        }
        
        if ($includeForeignObjects) {
            if (null !== $this->collSysUserss) {
                $result['SysUserss'] = $this->collSysUserss->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = SysFilesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdFile($value);
                break;
            case 1:
                $this->setFilename($value);
                break;
            case 2:
                $this->setTitle($value);
                break;
            case 3:
                $this->setType($value);
                break;
            case 4:
                $this->setFullpath($value);
                break;
            case 5:
                $this->setSize($value);
                break;
            case 6:
                $this->setImageWidth($value);
                break;
            case 7:
                $this->setImageHeight($value);
                break;
            case 8:
                $this->setImageType($value);
                break;
            case 9:
                $this->setIsImage($value);
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
        $keys = SysFilesPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdFile($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setFilename($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTitle($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setType($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setFullpath($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setSize($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setImageWidth($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setImageHeight($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setImageType($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setIsImage($arr[$keys[9]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SysFilesPeer::DATABASE_NAME);

        if ($this->isColumnModified(SysFilesPeer::ID_FILE)) $criteria->add(SysFilesPeer::ID_FILE, $this->id_file);
        if ($this->isColumnModified(SysFilesPeer::FILENAME)) $criteria->add(SysFilesPeer::FILENAME, $this->filename);
        if ($this->isColumnModified(SysFilesPeer::TITLE)) $criteria->add(SysFilesPeer::TITLE, $this->title);
        if ($this->isColumnModified(SysFilesPeer::TYPE)) $criteria->add(SysFilesPeer::TYPE, $this->type);
        if ($this->isColumnModified(SysFilesPeer::FULLPATH)) $criteria->add(SysFilesPeer::FULLPATH, $this->fullpath);
        if ($this->isColumnModified(SysFilesPeer::SIZE)) $criteria->add(SysFilesPeer::SIZE, $this->size);
        if ($this->isColumnModified(SysFilesPeer::IMAGE_WIDTH)) $criteria->add(SysFilesPeer::IMAGE_WIDTH, $this->image_width);
        if ($this->isColumnModified(SysFilesPeer::IMAGE_HEIGHT)) $criteria->add(SysFilesPeer::IMAGE_HEIGHT, $this->image_height);
        if ($this->isColumnModified(SysFilesPeer::IMAGE_TYPE)) $criteria->add(SysFilesPeer::IMAGE_TYPE, $this->image_type);
        if ($this->isColumnModified(SysFilesPeer::IS_IMAGE)) $criteria->add(SysFilesPeer::IS_IMAGE, $this->is_image);

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
        $criteria = new Criteria(SysFilesPeer::DATABASE_NAME);
        $criteria->add(SysFilesPeer::ID_FILE, $this->id_file);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdFile();
    }

    /**
     * Generic method to set the primary key (id_file column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdFile($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdFile();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of SysFiles (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFilename($this->getFilename());
        $copyObj->setTitle($this->getTitle());
        $copyObj->setType($this->getType());
        $copyObj->setFullpath($this->getFullpath());
        $copyObj->setSize($this->getSize());
        $copyObj->setImageWidth($this->getImageWidth());
        $copyObj->setImageHeight($this->getImageHeight());
        $copyObj->setImageType($this->getImageType());
        $copyObj->setIsImage($this->getIsImage());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getSysUserss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSysUsers($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdFile(NULL); // this is a auto-increment column, so set to default value
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
     * @return SysFiles Clone of current object.
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
     * @return SysFilesPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new SysFilesPeer();
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
        if ('SysUsers' == $relationName) {
            $this->initSysUserss();
        }
    }

    /**
     * Clears out the collSysUserss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SysFiles The current object (for fluent API support)
     * @see        addSysUserss()
     */
    public function clearSysUserss()
    {
        $this->collSysUserss = null; // important to set this to null since that means it is uninitialized
        $this->collSysUserssPartial = null;

        return $this;
    }

    /**
     * reset is the collSysUserss collection loaded partially
     *
     * @return void
     */
    public function resetPartialSysUserss($v = true)
    {
        $this->collSysUserssPartial = $v;
    }

    /**
     * Initializes the collSysUserss collection.
     *
     * By default this just sets the collSysUserss collection to an empty array (like clearcollSysUserss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSysUserss($overrideExisting = true)
    {
        if (null !== $this->collSysUserss && !$overrideExisting) {
            return;
        }
        $this->collSysUserss = new PropelObjectCollection();
        $this->collSysUserss->setModel('SysUsers');
    }

    /**
     * Gets an array of SysUsers objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SysFiles is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SysUsers[] List of SysUsers objects
     * @throws PropelException
     */
    public function getSysUserss($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSysUserssPartial && !$this->isNew();
        if (null === $this->collSysUserss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSysUserss) {
                // return empty collection
                $this->initSysUserss();
            } else {
                $collSysUserss = SysUsersQuery::create(null, $criteria)
                    ->filterBySysFiles($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSysUserssPartial && count($collSysUserss)) {
                      $this->initSysUserss(false);

                      foreach ($collSysUserss as $obj) {
                        if (false == $this->collSysUserss->contains($obj)) {
                          $this->collSysUserss->append($obj);
                        }
                      }

                      $this->collSysUserssPartial = true;
                    }

                    $collSysUserss->getInternalIterator()->rewind();

                    return $collSysUserss;
                }

                if ($partial && $this->collSysUserss) {
                    foreach ($this->collSysUserss as $obj) {
                        if ($obj->isNew()) {
                            $collSysUserss[] = $obj;
                        }
                    }
                }

                $this->collSysUserss = $collSysUserss;
                $this->collSysUserssPartial = false;
            }
        }

        return $this->collSysUserss;
    }

    /**
     * Sets a collection of SysUsers objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sysUserss A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SysFiles The current object (for fluent API support)
     */
    public function setSysUserss(PropelCollection $sysUserss, PropelPDO $con = null)
    {
        $sysUserssToDelete = $this->getSysUserss(new Criteria(), $con)->diff($sysUserss);


        $this->sysUserssScheduledForDeletion = $sysUserssToDelete;

        foreach ($sysUserssToDelete as $sysUsersRemoved) {
            $sysUsersRemoved->setSysFiles(null);
        }

        $this->collSysUserss = null;
        foreach ($sysUserss as $sysUsers) {
            $this->addSysUsers($sysUsers);
        }

        $this->collSysUserss = $sysUserss;
        $this->collSysUserssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SysUsers objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SysUsers objects.
     * @throws PropelException
     */
    public function countSysUserss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSysUserssPartial && !$this->isNew();
        if (null === $this->collSysUserss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSysUserss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSysUserss());
            }
            $query = SysUsersQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySysFiles($this)
                ->count($con);
        }

        return count($this->collSysUserss);
    }

    /**
     * Method called to associate a SysUsers object to this object
     * through the SysUsers foreign key attribute.
     *
     * @param    SysUsers $l SysUsers
     * @return SysFiles The current object (for fluent API support)
     */
    public function addSysUsers(SysUsers $l)
    {
        if ($this->collSysUserss === null) {
            $this->initSysUserss();
            $this->collSysUserssPartial = true;
        }
        if (!in_array($l, $this->collSysUserss->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSysUsers($l);
        }

        return $this;
    }

    /**
     * @param	SysUsers $sysUsers The sysUsers object to add.
     */
    protected function doAddSysUsers($sysUsers)
    {
        $this->collSysUserss[]= $sysUsers;
        $sysUsers->setSysFiles($this);
    }

    /**
     * @param	SysUsers $sysUsers The sysUsers object to remove.
     * @return SysFiles The current object (for fluent API support)
     */
    public function removeSysUsers($sysUsers)
    {
        if ($this->getSysUserss()->contains($sysUsers)) {
            $this->collSysUserss->remove($this->collSysUserss->search($sysUsers));
            if (null === $this->sysUserssScheduledForDeletion) {
                $this->sysUserssScheduledForDeletion = clone $this->collSysUserss;
                $this->sysUserssScheduledForDeletion->clear();
            }
            $this->sysUserssScheduledForDeletion[]= $sysUsers;
            $sysUsers->setSysFiles(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SysFiles is new, it will return
     * an empty collection; or if this SysFiles has previously
     * been saved, it will retrieve related SysUserss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SysFiles.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SysUsers[] List of SysUsers objects
     */
    public function getSysUserssJoinSysRoles($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SysUsersQuery::create(null, $criteria);
        $query->joinWith('SysRoles', $join_behavior);

        return $this->getSysUserss($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_file = null;
        $this->filename = null;
        $this->title = null;
        $this->type = null;
        $this->fullpath = null;
        $this->size = null;
        $this->image_width = null;
        $this->image_height = null;
        $this->image_type = null;
        $this->is_image = null;
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
            if ($this->collSysUserss) {
                foreach ($this->collSysUserss as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collSysUserss instanceof PropelCollection) {
            $this->collSysUserss->clearIterator();
        }
        $this->collSysUserss = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SysFilesPeer::DEFAULT_STRING_FORMAT);
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
