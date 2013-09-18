<?php


/**
 * Base class that represents a row from the 'sys_notifications' table.
 *
 * 
 *
 * @package    propel.generator.bach.om
 */
abstract class BaseSysNotifications extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'SysNotificationsPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        SysNotificationsPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_notification field.
     * @var        int
     */
    protected $id_notification;

    /**
     * The value for the id_sender field.
     * @var        int
     */
    protected $id_sender;

    /**
     * The value for the id_receiver field.
     * @var        int
     */
    protected $id_receiver;

    /**
     * The value for the type field.
     * @var        string
     */
    protected $type;

    /**
     * The value for the reference field.
     * @var        string
     */
    protected $reference;

    /**
     * The value for the message field.
     * @var        string
     */
    protected $message;

    /**
     * The value for the state field.
     * Note: this column has a database default value of: 'CREATED'
     * @var        string
     */
    protected $state;

    /**
     * The value for the created field.
     * @var        string
     */
    protected $created;

    /**
     * @var        SysUsers
     */
    protected $aSysUsersRelatedByIdSender;

    /**
     * @var        SysUsers
     */
    protected $aSysUsersRelatedByIdReceiver;

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
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->state = 'CREATED';
    }

    /**
     * Initializes internal state of BaseSysNotifications object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_notification] column value.
     * 
     * @return int
     */
    public function getIdNotification()
    {

        return $this->id_notification;
    }

    /**
     * Get the [id_sender] column value.
     * 
     * @return int
     */
    public function getIdSender()
    {

        return $this->id_sender;
    }

    /**
     * Get the [id_receiver] column value.
     * 
     * @return int
     */
    public function getIdReceiver()
    {

        return $this->id_receiver;
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
     * Get the [reference] column value.
     * 
     * @return string
     */
    public function getReference()
    {

        return $this->reference;
    }

    /**
     * Get the [message] column value.
     * 
     * @return string
     */
    public function getMessage()
    {

        return $this->message;
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
     * Get the [optionally formatted] temporal [created] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreated($format = 'Y-m-d H:i:s')
    {
        if ($this->created === null) {
            return null;
        }

        if ($this->created === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->created);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);
        
    }

    /**
     * Set the value of [id_notification] column.
     * 
     * @param  int $v new value
     * @return SysNotifications The current object (for fluent API support)
     */
    public function setIdNotification($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_notification !== $v) {
            $this->id_notification = $v;
            $this->modifiedColumns[] = SysNotificationsPeer::ID_NOTIFICATION;
        }


        return $this;
    } // setIdNotification()

    /**
     * Set the value of [id_sender] column.
     * 
     * @param  int $v new value
     * @return SysNotifications The current object (for fluent API support)
     */
    public function setIdSender($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_sender !== $v) {
            $this->id_sender = $v;
            $this->modifiedColumns[] = SysNotificationsPeer::ID_SENDER;
        }

        if ($this->aSysUsersRelatedByIdSender !== null && $this->aSysUsersRelatedByIdSender->getIdUser() !== $v) {
            $this->aSysUsersRelatedByIdSender = null;
        }


        return $this;
    } // setIdSender()

    /**
     * Set the value of [id_receiver] column.
     * 
     * @param  int $v new value
     * @return SysNotifications The current object (for fluent API support)
     */
    public function setIdReceiver($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_receiver !== $v) {
            $this->id_receiver = $v;
            $this->modifiedColumns[] = SysNotificationsPeer::ID_RECEIVER;
        }

        if ($this->aSysUsersRelatedByIdReceiver !== null && $this->aSysUsersRelatedByIdReceiver->getIdUser() !== $v) {
            $this->aSysUsersRelatedByIdReceiver = null;
        }


        return $this;
    } // setIdReceiver()

    /**
     * Set the value of [type] column.
     * 
     * @param  string $v new value
     * @return SysNotifications The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[] = SysNotificationsPeer::TYPE;
        }


        return $this;
    } // setType()

    /**
     * Set the value of [reference] column.
     * 
     * @param  string $v new value
     * @return SysNotifications The current object (for fluent API support)
     */
    public function setReference($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->reference !== $v) {
            $this->reference = $v;
            $this->modifiedColumns[] = SysNotificationsPeer::REFERENCE;
        }


        return $this;
    } // setReference()

    /**
     * Set the value of [message] column.
     * 
     * @param  string $v new value
     * @return SysNotifications The current object (for fluent API support)
     */
    public function setMessage($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->message !== $v) {
            $this->message = $v;
            $this->modifiedColumns[] = SysNotificationsPeer::MESSAGE;
        }


        return $this;
    } // setMessage()

    /**
     * Set the value of [state] column.
     * 
     * @param  string $v new value
     * @return SysNotifications The current object (for fluent API support)
     */
    public function setState($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->state !== $v) {
            $this->state = $v;
            $this->modifiedColumns[] = SysNotificationsPeer::STATE;
        }


        return $this;
    } // setState()

    /**
     * Sets the value of [created] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return SysNotifications The current object (for fluent API support)
     */
    public function setCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created !== null || $dt !== null) {
            $currentDateAsString = ($this->created !== null && $tmpDt = new DateTime($this->created)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created = $newDateAsString;
                $this->modifiedColumns[] = SysNotificationsPeer::CREATED;
            }
        } // if either are not null


        return $this;
    } // setCreated()

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
            if ($this->state !== 'CREATED') {
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

            $this->id_notification = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->id_sender = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->id_receiver = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->type = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->reference = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->message = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->state = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->created = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 8; // 8 = SysNotificationsPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating SysNotifications object", $e);
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

        if ($this->aSysUsersRelatedByIdSender !== null && $this->id_sender !== $this->aSysUsersRelatedByIdSender->getIdUser()) {
            $this->aSysUsersRelatedByIdSender = null;
        }
        if ($this->aSysUsersRelatedByIdReceiver !== null && $this->id_receiver !== $this->aSysUsersRelatedByIdReceiver->getIdUser()) {
            $this->aSysUsersRelatedByIdReceiver = null;
        }
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
            $con = Propel::getConnection(SysNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = SysNotificationsPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSysUsersRelatedByIdSender = null;
            $this->aSysUsersRelatedByIdReceiver = null;
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
            $con = Propel::getConnection(SysNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = SysNotificationsQuery::create()
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
            $con = Propel::getConnection(SysNotificationsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                SysNotificationsPeer::addInstanceToPool($this);
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aSysUsersRelatedByIdSender !== null) {
                if ($this->aSysUsersRelatedByIdSender->isModified() || $this->aSysUsersRelatedByIdSender->isNew()) {
                    $affectedRows += $this->aSysUsersRelatedByIdSender->save($con);
                }
                $this->setSysUsersRelatedByIdSender($this->aSysUsersRelatedByIdSender);
            }

            if ($this->aSysUsersRelatedByIdReceiver !== null) {
                if ($this->aSysUsersRelatedByIdReceiver->isModified() || $this->aSysUsersRelatedByIdReceiver->isNew()) {
                    $affectedRows += $this->aSysUsersRelatedByIdReceiver->save($con);
                }
                $this->setSysUsersRelatedByIdReceiver($this->aSysUsersRelatedByIdReceiver);
            }

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

        $this->modifiedColumns[] = SysNotificationsPeer::ID_NOTIFICATION;
        if (null !== $this->id_notification) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SysNotificationsPeer::ID_NOTIFICATION . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SysNotificationsPeer::ID_NOTIFICATION)) {
            $modifiedColumns[':p' . $index++]  = '`id_notification`';
        }
        if ($this->isColumnModified(SysNotificationsPeer::ID_SENDER)) {
            $modifiedColumns[':p' . $index++]  = '`id_sender`';
        }
        if ($this->isColumnModified(SysNotificationsPeer::ID_RECEIVER)) {
            $modifiedColumns[':p' . $index++]  = '`id_receiver`';
        }
        if ($this->isColumnModified(SysNotificationsPeer::TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`type`';
        }
        if ($this->isColumnModified(SysNotificationsPeer::REFERENCE)) {
            $modifiedColumns[':p' . $index++]  = '`reference`';
        }
        if ($this->isColumnModified(SysNotificationsPeer::MESSAGE)) {
            $modifiedColumns[':p' . $index++]  = '`message`';
        }
        if ($this->isColumnModified(SysNotificationsPeer::STATE)) {
            $modifiedColumns[':p' . $index++]  = '`state`';
        }
        if ($this->isColumnModified(SysNotificationsPeer::CREATED)) {
            $modifiedColumns[':p' . $index++]  = '`created`';
        }

        $sql = sprintf(
            'INSERT INTO `sys_notifications` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_notification`':						
                        $stmt->bindValue($identifier, $this->id_notification, PDO::PARAM_INT);
                        break;
                    case '`id_sender`':						
                        $stmt->bindValue($identifier, $this->id_sender, PDO::PARAM_INT);
                        break;
                    case '`id_receiver`':						
                        $stmt->bindValue($identifier, $this->id_receiver, PDO::PARAM_INT);
                        break;
                    case '`type`':						
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_STR);
                        break;
                    case '`reference`':						
                        $stmt->bindValue($identifier, $this->reference, PDO::PARAM_STR);
                        break;
                    case '`message`':						
                        $stmt->bindValue($identifier, $this->message, PDO::PARAM_STR);
                        break;
                    case '`state`':						
                        $stmt->bindValue($identifier, $this->state, PDO::PARAM_STR);
                        break;
                    case '`created`':						
                        $stmt->bindValue($identifier, $this->created, PDO::PARAM_STR);
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
        $this->setIdNotification($pk);

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


            // We call the validate method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aSysUsersRelatedByIdSender !== null) {
                if (!$this->aSysUsersRelatedByIdSender->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSysUsersRelatedByIdSender->getValidationFailures());
                }
            }

            if ($this->aSysUsersRelatedByIdReceiver !== null) {
                if (!$this->aSysUsersRelatedByIdReceiver->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSysUsersRelatedByIdReceiver->getValidationFailures());
                }
            }


            if (($retval = SysNotificationsPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
        $pos = SysNotificationsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdNotification();
                break;
            case 1:
                return $this->getIdSender();
                break;
            case 2:
                return $this->getIdReceiver();
                break;
            case 3:
                return $this->getType();
                break;
            case 4:
                return $this->getReference();
                break;
            case 5:
                return $this->getMessage();
                break;
            case 6:
                return $this->getState();
                break;
            case 7:
                return $this->getCreated();
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
        if (isset($alreadyDumpedObjects['SysNotifications'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SysNotifications'][$this->getPrimaryKey()] = true;
        $keys = SysNotificationsPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdNotification(),
            $keys[1] => $this->getIdSender(),
            $keys[2] => $this->getIdReceiver(),
            $keys[3] => $this->getType(),
            $keys[4] => $this->getReference(),
            $keys[5] => $this->getMessage(),
            $keys[6] => $this->getState(),
            $keys[7] => $this->getCreated(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach($virtualColumns as $key => $virtualColumn)
        {
            $result[$key] = $virtualColumn;
        }
        
        if ($includeForeignObjects) {
            if (null !== $this->aSysUsersRelatedByIdSender) {
                $result['SysUsersRelatedByIdSender'] = $this->aSysUsersRelatedByIdSender->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSysUsersRelatedByIdReceiver) {
                $result['SysUsersRelatedByIdReceiver'] = $this->aSysUsersRelatedByIdReceiver->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = SysNotificationsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdNotification($value);
                break;
            case 1:
                $this->setIdSender($value);
                break;
            case 2:
                $this->setIdReceiver($value);
                break;
            case 3:
                $this->setType($value);
                break;
            case 4:
                $this->setReference($value);
                break;
            case 5:
                $this->setMessage($value);
                break;
            case 6:
                $this->setState($value);
                break;
            case 7:
                $this->setCreated($value);
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
        $keys = SysNotificationsPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdNotification($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setIdSender($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdReceiver($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setType($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setReference($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setMessage($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setState($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setCreated($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SysNotificationsPeer::DATABASE_NAME);

        if ($this->isColumnModified(SysNotificationsPeer::ID_NOTIFICATION)) $criteria->add(SysNotificationsPeer::ID_NOTIFICATION, $this->id_notification);
        if ($this->isColumnModified(SysNotificationsPeer::ID_SENDER)) $criteria->add(SysNotificationsPeer::ID_SENDER, $this->id_sender);
        if ($this->isColumnModified(SysNotificationsPeer::ID_RECEIVER)) $criteria->add(SysNotificationsPeer::ID_RECEIVER, $this->id_receiver);
        if ($this->isColumnModified(SysNotificationsPeer::TYPE)) $criteria->add(SysNotificationsPeer::TYPE, $this->type);
        if ($this->isColumnModified(SysNotificationsPeer::REFERENCE)) $criteria->add(SysNotificationsPeer::REFERENCE, $this->reference);
        if ($this->isColumnModified(SysNotificationsPeer::MESSAGE)) $criteria->add(SysNotificationsPeer::MESSAGE, $this->message);
        if ($this->isColumnModified(SysNotificationsPeer::STATE)) $criteria->add(SysNotificationsPeer::STATE, $this->state);
        if ($this->isColumnModified(SysNotificationsPeer::CREATED)) $criteria->add(SysNotificationsPeer::CREATED, $this->created);

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
        $criteria = new Criteria(SysNotificationsPeer::DATABASE_NAME);
        $criteria->add(SysNotificationsPeer::ID_NOTIFICATION, $this->id_notification);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdNotification();
    }

    /**
     * Generic method to set the primary key (id_notification column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdNotification($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdNotification();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of SysNotifications (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdSender($this->getIdSender());
        $copyObj->setIdReceiver($this->getIdReceiver());
        $copyObj->setType($this->getType());
        $copyObj->setReference($this->getReference());
        $copyObj->setMessage($this->getMessage());
        $copyObj->setState($this->getState());
        $copyObj->setCreated($this->getCreated());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdNotification(NULL); // this is a auto-increment column, so set to default value
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
     * @return SysNotifications Clone of current object.
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
     * @return SysNotificationsPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new SysNotificationsPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a SysUsers object.
     *
     * @param                  SysUsers $v
     * @return SysNotifications The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSysUsersRelatedByIdSender(SysUsers $v = null)
    {
        if ($v === null) {
            $this->setIdSender(NULL);
        } else {
            $this->setIdSender($v->getIdUser());
        }

        $this->aSysUsersRelatedByIdSender = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the SysUsers object, it will not be re-added.
        if ($v !== null) {
            $v->addSysNotificationsRelatedByIdSender($this);
        }


        return $this;
    }


    /**
     * Get the associated SysUsers object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return SysUsers The associated SysUsers object.
     * @throws PropelException
     */
    public function getSysUsersRelatedByIdSender(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSysUsersRelatedByIdSender === null && ($this->id_sender !== null) && $doQuery) {
            $this->aSysUsersRelatedByIdSender = SysUsersQuery::create()->findPk($this->id_sender, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSysUsersRelatedByIdSender->addSysNotificationssRelatedByIdSender($this);
             */
        }

        return $this->aSysUsersRelatedByIdSender;
    }

    /**
     * Declares an association between this object and a SysUsers object.
     *
     * @param                  SysUsers $v
     * @return SysNotifications The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSysUsersRelatedByIdReceiver(SysUsers $v = null)
    {
        if ($v === null) {
            $this->setIdReceiver(NULL);
        } else {
            $this->setIdReceiver($v->getIdUser());
        }

        $this->aSysUsersRelatedByIdReceiver = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the SysUsers object, it will not be re-added.
        if ($v !== null) {
            $v->addSysNotificationsRelatedByIdReceiver($this);
        }


        return $this;
    }


    /**
     * Get the associated SysUsers object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return SysUsers The associated SysUsers object.
     * @throws PropelException
     */
    public function getSysUsersRelatedByIdReceiver(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSysUsersRelatedByIdReceiver === null && ($this->id_receiver !== null) && $doQuery) {
            $this->aSysUsersRelatedByIdReceiver = SysUsersQuery::create()->findPk($this->id_receiver, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSysUsersRelatedByIdReceiver->addSysNotificationssRelatedByIdReceiver($this);
             */
        }

        return $this->aSysUsersRelatedByIdReceiver;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_notification = null;
        $this->id_sender = null;
        $this->id_receiver = null;
        $this->type = null;
        $this->reference = null;
        $this->message = null;
        $this->state = null;
        $this->created = null;
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
            if ($this->aSysUsersRelatedByIdSender instanceof Persistent) {
              $this->aSysUsersRelatedByIdSender->clearAllReferences($deep);
            }
            if ($this->aSysUsersRelatedByIdReceiver instanceof Persistent) {
              $this->aSysUsersRelatedByIdReceiver->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aSysUsersRelatedByIdSender = null;
        $this->aSysUsersRelatedByIdReceiver = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SysNotificationsPeer::DEFAULT_STRING_FORMAT);
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
