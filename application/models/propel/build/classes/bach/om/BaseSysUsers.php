<?php


/**
 * Base class that represents a row from the 'sys_users' table.
 *
 * 
 *
 * @package    propel.generator.bach.om
 */
abstract class BaseSysUsers extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'SysUsersPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        SysUsersPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinite loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_user field.
     * @var        int
     */
    protected $id_user;

    /**
     * The value for the username field.
     * @var        string
     */
    protected $username;

    /**
     * The value for the password field.
     * @var        string
     */
    protected $password;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the first_name field.
     * @var        string
     */
    protected $first_name;

    /**
     * The value for the last_name field.
     * @var        string
     */
    protected $last_name;

    /**
     * The value for the state field.
     * Note: this column has a database default value of: 'CREATED'
     * @var        string
     */
    protected $state;

    /**
     * The value for the id_rol field.
     * @var        int
     */
    protected $id_rol;

    /**
     * The value for the id_photo field.
     * @var        int
     */
    protected $id_photo;

    /**
     * The value for the created field.
     * @var        string
     */
    protected $created;

    /**
     * The value for the phone field.
     * @var        string
     */
    protected $phone;

    /**
     * The value for the modified field.
     * @var        string
     */
    protected $modified;

    /**
     * The value for the lang_code field.
     * Note: this column has a database default value of: 'english'
     * @var        string
     */
    protected $lang_code;

    /**
     * The value for the mobile field.
     * @var        string
     */
    protected $mobile;

    /**
     * @var        SysRoles
     */
    protected $aSysRoles;

    /**
     * @var        SysFiles
     */
    protected $aSysFiles;

    /**
     * @var        PropelObjectCollection|SysChats[] Collection to store aggregation of SysChats objects.
     */
    protected $collSysChatssRelatedByIdSender;
    protected $collSysChatssRelatedByIdSenderPartial;

    /**
     * @var        PropelObjectCollection|SysChats[] Collection to store aggregation of SysChats objects.
     */
    protected $collSysChatssRelatedByIdReceiver;
    protected $collSysChatssRelatedByIdReceiverPartial;

    /**
     * @var        PropelObjectCollection|SysNotifications[] Collection to store aggregation of SysNotifications objects.
     */
    protected $collSysNotificationssRelatedByIdSender;
    protected $collSysNotificationssRelatedByIdSenderPartial;

    /**
     * @var        PropelObjectCollection|SysNotifications[] Collection to store aggregation of SysNotifications objects.
     */
    protected $collSysNotificationssRelatedByIdReceiver;
    protected $collSysNotificationssRelatedByIdReceiverPartial;

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
    protected $sysChatssRelatedByIdSenderScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sysChatssRelatedByIdReceiverScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sysNotificationssRelatedByIdSenderScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sysNotificationssRelatedByIdReceiverScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->state = 'CREATED';
        $this->lang_code = 'english';
    }

    /**
     * Initializes internal state of BaseSysUsers object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_user] column value.
     * 
     * @return int
     */
    public function getIdUser()
    {

        return $this->id_user;
    }

    /**
     * Get the [username] column value.
     * 
     * @return string
     */
    public function getUsername()
    {

        return $this->username;
    }

    /**
     * Get the [password] column value.
     * 
     * @return string
     */
    public function getPassword()
    {

        return $this->password;
    }

    /**
     * Get the [email] column value.
     * 
     * @return string
     */
    public function getEmail()
    {

        return $this->email;
    }

    /**
     * Get the [first_name] column value.
     * 
     * @return string
     */
    public function getFirstName()
    {

        return $this->first_name;
    }

    /**
     * Get the [last_name] column value.
     * 
     * @return string
     */
    public function getLastName()
    {

        return $this->last_name;
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
     * Get the [id_rol] column value.
     * 
     * @return int
     */
    public function getIdRol()
    {

        return $this->id_rol;
    }

    /**
     * Get the [id_photo] column value.
     * 
     * @return int
     */
    public function getIdPhoto()
    {

        return $this->id_photo;
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
     * Get the [phone] column value.
     * 
     * @return string
     */
    public function getPhone()
    {

        return $this->phone;
    }

    /**
     * Get the [optionally formatted] temporal [modified] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null, and 0 if column value is 0000-00-00 00:00:00
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getModified($format = 'Y-m-d H:i:s')
    {
        if ($this->modified === null) {
            return null;
        }

        if ($this->modified === '0000-00-00 00:00:00') {
            // while technically this is not a default value of null,
            // this seems to be closest in meaning.
            return null;
        }

        try {
            $dt = new DateTime($this->modified);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->modified, true), $x);
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
     * Get the [lang_code] column value.
     * 
     * @return string
     */
    public function getLangCode()
    {

        return $this->lang_code;
    }

    /**
     * Get the [mobile] column value.
     * 
     * @return string
     */
    public function getMobile()
    {

        return $this->mobile;
    }

    /**
     * Set the value of [id_user] column.
     * 
     * @param  int $v new value
     * @return SysUsers The current object (for fluent API support)
     */
    public function setIdUser($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_user !== $v) {
            $this->id_user = $v;
            $this->modifiedColumns[] = SysUsersPeer::ID_USER;
        }


        return $this;
    } // setIdUser()

    /**
     * Set the value of [username] column.
     * 
     * @param  string $v new value
     * @return SysUsers The current object (for fluent API support)
     */
    public function setUsername($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->username !== $v) {
            $this->username = $v;
            $this->modifiedColumns[] = SysUsersPeer::USERNAME;
        }


        return $this;
    } // setUsername()

    /**
     * Set the value of [password] column.
     * 
     * @param  string $v new value
     * @return SysUsers The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[] = SysUsersPeer::PASSWORD;
        }


        return $this;
    } // setPassword()

    /**
     * Set the value of [email] column.
     * 
     * @param  string $v new value
     * @return SysUsers The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = SysUsersPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Set the value of [first_name] column.
     * 
     * @param  string $v new value
     * @return SysUsers The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[] = SysUsersPeer::FIRST_NAME;
        }


        return $this;
    } // setFirstName()

    /**
     * Set the value of [last_name] column.
     * 
     * @param  string $v new value
     * @return SysUsers The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[] = SysUsersPeer::LAST_NAME;
        }


        return $this;
    } // setLastName()

    /**
     * Set the value of [state] column.
     * 
     * @param  string $v new value
     * @return SysUsers The current object (for fluent API support)
     */
    public function setState($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->state !== $v) {
            $this->state = $v;
            $this->modifiedColumns[] = SysUsersPeer::STATE;
        }


        return $this;
    } // setState()

    /**
     * Set the value of [id_rol] column.
     * 
     * @param  int $v new value
     * @return SysUsers The current object (for fluent API support)
     */
    public function setIdRol($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_rol !== $v) {
            $this->id_rol = $v;
            $this->modifiedColumns[] = SysUsersPeer::ID_ROL;
        }

        if ($this->aSysRoles !== null && $this->aSysRoles->getIdRol() !== $v) {
            $this->aSysRoles = null;
        }


        return $this;
    } // setIdRol()

    /**
     * Set the value of [id_photo] column.
     * 
     * @param  int $v new value
     * @return SysUsers The current object (for fluent API support)
     */
    public function setIdPhoto($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_photo !== $v) {
            $this->id_photo = $v;
            $this->modifiedColumns[] = SysUsersPeer::ID_PHOTO;
        }

        if ($this->aSysFiles !== null && $this->aSysFiles->getIdFile() !== $v) {
            $this->aSysFiles = null;
        }


        return $this;
    } // setIdPhoto()

    /**
     * Sets the value of [created] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return SysUsers The current object (for fluent API support)
     */
    public function setCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->created !== null || $dt !== null) {
            $currentDateAsString = ($this->created !== null && $tmpDt = new DateTime($this->created)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->created = $newDateAsString;
                $this->modifiedColumns[] = SysUsersPeer::CREATED;
            }
        } // if either are not null


        return $this;
    } // setCreated()

    /**
     * Set the value of [phone] column.
     * 
     * @param  string $v new value
     * @return SysUsers The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[] = SysUsersPeer::PHONE;
        }


        return $this;
    } // setPhone()

    /**
     * Sets the value of [modified] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return SysUsers The current object (for fluent API support)
     */
    public function setModified($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->modified !== null || $dt !== null) {
            $currentDateAsString = ($this->modified !== null && $tmpDt = new DateTime($this->modified)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->modified = $newDateAsString;
                $this->modifiedColumns[] = SysUsersPeer::MODIFIED;
            }
        } // if either are not null


        return $this;
    } // setModified()

    /**
     * Set the value of [lang_code] column.
     * 
     * @param  string $v new value
     * @return SysUsers The current object (for fluent API support)
     */
    public function setLangCode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->lang_code !== $v) {
            $this->lang_code = $v;
            $this->modifiedColumns[] = SysUsersPeer::LANG_CODE;
        }


        return $this;
    } // setLangCode()

    /**
     * Set the value of [mobile] column.
     * 
     * @param  string $v new value
     * @return SysUsers The current object (for fluent API support)
     */
    public function setMobile($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->mobile !== $v) {
            $this->mobile = $v;
            $this->modifiedColumns[] = SysUsersPeer::MOBILE;
        }


        return $this;
    } // setMobile()

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

            if ($this->lang_code !== 'english') {
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

            $this->id_user = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->username = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->password = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->email = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->first_name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->last_name = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->state = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->id_rol = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->id_photo = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->created = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->phone = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->modified = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->lang_code = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->mobile = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);

            return $startcol + 14; // 14 = SysUsersPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating SysUsers object", $e);
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

        if ($this->aSysRoles !== null && $this->id_rol !== $this->aSysRoles->getIdRol()) {
            $this->aSysRoles = null;
        }
        if ($this->aSysFiles !== null && $this->id_photo !== $this->aSysFiles->getIdFile()) {
            $this->aSysFiles = null;
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
            $con = Propel::getConnection(SysUsersPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = SysUsersPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSysRoles = null;
            $this->aSysFiles = null;
            $this->collSysChatssRelatedByIdSender = null;

            $this->collSysChatssRelatedByIdReceiver = null;

            $this->collSysNotificationssRelatedByIdSender = null;

            $this->collSysNotificationssRelatedByIdReceiver = null;

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
            $con = Propel::getConnection(SysUsersPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = SysUsersQuery::create()
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
            $con = Propel::getConnection(SysUsersPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                SysUsersPeer::addInstanceToPool($this);
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

            if ($this->aSysRoles !== null) {
                if ($this->aSysRoles->isModified() || $this->aSysRoles->isNew()) {
                    $affectedRows += $this->aSysRoles->save($con);
                }
                $this->setSysRoles($this->aSysRoles);
            }

            if ($this->aSysFiles !== null) {
                if ($this->aSysFiles->isModified() || $this->aSysFiles->isNew()) {
                    $affectedRows += $this->aSysFiles->save($con);
                }
                $this->setSysFiles($this->aSysFiles);
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

            if ($this->sysChatssRelatedByIdSenderScheduledForDeletion !== null) {
                if (!$this->sysChatssRelatedByIdSenderScheduledForDeletion->isEmpty()) {
                    foreach ($this->sysChatssRelatedByIdSenderScheduledForDeletion as $sysChatsRelatedByIdSender) {
                        // need to save related object because we set the relation to null
                        $sysChatsRelatedByIdSender->save($con);
                    }
                    $this->sysChatssRelatedByIdSenderScheduledForDeletion = null;
                }
            }

            if ($this->collSysChatssRelatedByIdSender !== null) {
                foreach ($this->collSysChatssRelatedByIdSender as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sysChatssRelatedByIdReceiverScheduledForDeletion !== null) {
                if (!$this->sysChatssRelatedByIdReceiverScheduledForDeletion->isEmpty()) {
                    foreach ($this->sysChatssRelatedByIdReceiverScheduledForDeletion as $sysChatsRelatedByIdReceiver) {
                        // need to save related object because we set the relation to null
                        $sysChatsRelatedByIdReceiver->save($con);
                    }
                    $this->sysChatssRelatedByIdReceiverScheduledForDeletion = null;
                }
            }

            if ($this->collSysChatssRelatedByIdReceiver !== null) {
                foreach ($this->collSysChatssRelatedByIdReceiver as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sysNotificationssRelatedByIdSenderScheduledForDeletion !== null) {
                if (!$this->sysNotificationssRelatedByIdSenderScheduledForDeletion->isEmpty()) {
                    foreach ($this->sysNotificationssRelatedByIdSenderScheduledForDeletion as $sysNotificationsRelatedByIdSender) {
                        // need to save related object because we set the relation to null
                        $sysNotificationsRelatedByIdSender->save($con);
                    }
                    $this->sysNotificationssRelatedByIdSenderScheduledForDeletion = null;
                }
            }

            if ($this->collSysNotificationssRelatedByIdSender !== null) {
                foreach ($this->collSysNotificationssRelatedByIdSender as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sysNotificationssRelatedByIdReceiverScheduledForDeletion !== null) {
                if (!$this->sysNotificationssRelatedByIdReceiverScheduledForDeletion->isEmpty()) {
                    foreach ($this->sysNotificationssRelatedByIdReceiverScheduledForDeletion as $sysNotificationsRelatedByIdReceiver) {
                        // need to save related object because we set the relation to null
                        $sysNotificationsRelatedByIdReceiver->save($con);
                    }
                    $this->sysNotificationssRelatedByIdReceiverScheduledForDeletion = null;
                }
            }

            if ($this->collSysNotificationssRelatedByIdReceiver !== null) {
                foreach ($this->collSysNotificationssRelatedByIdReceiver as $referrerFK) {
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

        $this->modifiedColumns[] = SysUsersPeer::ID_USER;
        if (null !== $this->id_user) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . SysUsersPeer::ID_USER . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(SysUsersPeer::ID_USER)) {
            $modifiedColumns[':p' . $index++]  = '`id_user`';
        }
        if ($this->isColumnModified(SysUsersPeer::USERNAME)) {
            $modifiedColumns[':p' . $index++]  = '`username`';
        }
        if ($this->isColumnModified(SysUsersPeer::PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = '`password`';
        }
        if ($this->isColumnModified(SysUsersPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '`email`';
        }
        if ($this->isColumnModified(SysUsersPeer::FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`first_name`';
        }
        if ($this->isColumnModified(SysUsersPeer::LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`last_name`';
        }
        if ($this->isColumnModified(SysUsersPeer::STATE)) {
            $modifiedColumns[':p' . $index++]  = '`state`';
        }
        if ($this->isColumnModified(SysUsersPeer::ID_ROL)) {
            $modifiedColumns[':p' . $index++]  = '`id_rol`';
        }
        if ($this->isColumnModified(SysUsersPeer::ID_PHOTO)) {
            $modifiedColumns[':p' . $index++]  = '`id_photo`';
        }
        if ($this->isColumnModified(SysUsersPeer::CREATED)) {
            $modifiedColumns[':p' . $index++]  = '`created`';
        }
        if ($this->isColumnModified(SysUsersPeer::PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`phone`';
        }
        if ($this->isColumnModified(SysUsersPeer::MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = '`modified`';
        }
        if ($this->isColumnModified(SysUsersPeer::LANG_CODE)) {
            $modifiedColumns[':p' . $index++]  = '`lang_code`';
        }
        if ($this->isColumnModified(SysUsersPeer::MOBILE)) {
            $modifiedColumns[':p' . $index++]  = '`mobile`';
        }

        $sql = sprintf(
            'INSERT INTO `sys_users` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id_user`':						
                        $stmt->bindValue($identifier, $this->id_user, PDO::PARAM_INT);
                        break;
                    case '`username`':						
                        $stmt->bindValue($identifier, $this->username, PDO::PARAM_STR);
                        break;
                    case '`password`':						
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case '`email`':						
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case '`first_name`':						
                        $stmt->bindValue($identifier, $this->first_name, PDO::PARAM_STR);
                        break;
                    case '`last_name`':						
                        $stmt->bindValue($identifier, $this->last_name, PDO::PARAM_STR);
                        break;
                    case '`state`':						
                        $stmt->bindValue($identifier, $this->state, PDO::PARAM_STR);
                        break;
                    case '`id_rol`':						
                        $stmt->bindValue($identifier, $this->id_rol, PDO::PARAM_INT);
                        break;
                    case '`id_photo`':						
                        $stmt->bindValue($identifier, $this->id_photo, PDO::PARAM_INT);
                        break;
                    case '`created`':						
                        $stmt->bindValue($identifier, $this->created, PDO::PARAM_STR);
                        break;
                    case '`phone`':						
                        $stmt->bindValue($identifier, $this->phone, PDO::PARAM_STR);
                        break;
                    case '`modified`':						
                        $stmt->bindValue($identifier, $this->modified, PDO::PARAM_STR);
                        break;
                    case '`lang_code`':						
                        $stmt->bindValue($identifier, $this->lang_code, PDO::PARAM_STR);
                        break;
                    case '`mobile`':						
                        $stmt->bindValue($identifier, $this->mobile, PDO::PARAM_STR);
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
        $this->setIdUser($pk);

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

            if ($this->aSysRoles !== null) {
                if (!$this->aSysRoles->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSysRoles->getValidationFailures());
                }
            }

            if ($this->aSysFiles !== null) {
                if (!$this->aSysFiles->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSysFiles->getValidationFailures());
                }
            }


            if (($retval = SysUsersPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collSysChatssRelatedByIdSender !== null) {
                    foreach ($this->collSysChatssRelatedByIdSender as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSysChatssRelatedByIdReceiver !== null) {
                    foreach ($this->collSysChatssRelatedByIdReceiver as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSysNotificationssRelatedByIdSender !== null) {
                    foreach ($this->collSysNotificationssRelatedByIdSender as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSysNotificationssRelatedByIdReceiver !== null) {
                    foreach ($this->collSysNotificationssRelatedByIdReceiver as $referrerFK) {
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
        $pos = SysUsersPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdUser();
                break;
            case 1:
                return $this->getUsername();
                break;
            case 2:
                return $this->getPassword();
                break;
            case 3:
                return $this->getEmail();
                break;
            case 4:
                return $this->getFirstName();
                break;
            case 5:
                return $this->getLastName();
                break;
            case 6:
                return $this->getState();
                break;
            case 7:
                return $this->getIdRol();
                break;
            case 8:
                return $this->getIdPhoto();
                break;
            case 9:
                return $this->getCreated();
                break;
            case 10:
                return $this->getPhone();
                break;
            case 11:
                return $this->getModified();
                break;
            case 12:
                return $this->getLangCode();
                break;
            case 13:
                return $this->getMobile();
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
        if (isset($alreadyDumpedObjects['SysUsers'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SysUsers'][$this->getPrimaryKey()] = true;
        $keys = SysUsersPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdUser(),
            $keys[1] => $this->getUsername(),
            $keys[2] => $this->getPassword(),
            $keys[3] => $this->getEmail(),
            $keys[4] => $this->getFirstName(),
            $keys[5] => $this->getLastName(),
            $keys[6] => $this->getState(),
            $keys[7] => $this->getIdRol(),
            $keys[8] => $this->getIdPhoto(),
            $keys[9] => $this->getCreated(),
            $keys[10] => $this->getPhone(),
            $keys[11] => $this->getModified(),
            $keys[12] => $this->getLangCode(),
            $keys[13] => $this->getMobile(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach($virtualColumns as $key => $virtualColumn)
        {
            $result[$key] = $virtualColumn;
        }
        
        if ($includeForeignObjects) {
            if (null !== $this->aSysRoles) {
                $result['SysRoles'] = $this->aSysRoles->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSysFiles) {
                $result['SysFiles'] = $this->aSysFiles->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collSysChatssRelatedByIdSender) {
                $result['SysChatssRelatedByIdSender'] = $this->collSysChatssRelatedByIdSender->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSysChatssRelatedByIdReceiver) {
                $result['SysChatssRelatedByIdReceiver'] = $this->collSysChatssRelatedByIdReceiver->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSysNotificationssRelatedByIdSender) {
                $result['SysNotificationssRelatedByIdSender'] = $this->collSysNotificationssRelatedByIdSender->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSysNotificationssRelatedByIdReceiver) {
                $result['SysNotificationssRelatedByIdReceiver'] = $this->collSysNotificationssRelatedByIdReceiver->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = SysUsersPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdUser($value);
                break;
            case 1:
                $this->setUsername($value);
                break;
            case 2:
                $this->setPassword($value);
                break;
            case 3:
                $this->setEmail($value);
                break;
            case 4:
                $this->setFirstName($value);
                break;
            case 5:
                $this->setLastName($value);
                break;
            case 6:
                $this->setState($value);
                break;
            case 7:
                $this->setIdRol($value);
                break;
            case 8:
                $this->setIdPhoto($value);
                break;
            case 9:
                $this->setCreated($value);
                break;
            case 10:
                $this->setPhone($value);
                break;
            case 11:
                $this->setModified($value);
                break;
            case 12:
                $this->setLangCode($value);
                break;
            case 13:
                $this->setMobile($value);
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
        $keys = SysUsersPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdUser($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setUsername($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setPassword($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setEmail($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setFirstName($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setLastName($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setState($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setIdRol($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setIdPhoto($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCreated($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setPhone($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setModified($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setLangCode($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setMobile($arr[$keys[13]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SysUsersPeer::DATABASE_NAME);

        if ($this->isColumnModified(SysUsersPeer::ID_USER)) $criteria->add(SysUsersPeer::ID_USER, $this->id_user);
        if ($this->isColumnModified(SysUsersPeer::USERNAME)) $criteria->add(SysUsersPeer::USERNAME, $this->username);
        if ($this->isColumnModified(SysUsersPeer::PASSWORD)) $criteria->add(SysUsersPeer::PASSWORD, $this->password);
        if ($this->isColumnModified(SysUsersPeer::EMAIL)) $criteria->add(SysUsersPeer::EMAIL, $this->email);
        if ($this->isColumnModified(SysUsersPeer::FIRST_NAME)) $criteria->add(SysUsersPeer::FIRST_NAME, $this->first_name);
        if ($this->isColumnModified(SysUsersPeer::LAST_NAME)) $criteria->add(SysUsersPeer::LAST_NAME, $this->last_name);
        if ($this->isColumnModified(SysUsersPeer::STATE)) $criteria->add(SysUsersPeer::STATE, $this->state);
        if ($this->isColumnModified(SysUsersPeer::ID_ROL)) $criteria->add(SysUsersPeer::ID_ROL, $this->id_rol);
        if ($this->isColumnModified(SysUsersPeer::ID_PHOTO)) $criteria->add(SysUsersPeer::ID_PHOTO, $this->id_photo);
        if ($this->isColumnModified(SysUsersPeer::CREATED)) $criteria->add(SysUsersPeer::CREATED, $this->created);
        if ($this->isColumnModified(SysUsersPeer::PHONE)) $criteria->add(SysUsersPeer::PHONE, $this->phone);
        if ($this->isColumnModified(SysUsersPeer::MODIFIED)) $criteria->add(SysUsersPeer::MODIFIED, $this->modified);
        if ($this->isColumnModified(SysUsersPeer::LANG_CODE)) $criteria->add(SysUsersPeer::LANG_CODE, $this->lang_code);
        if ($this->isColumnModified(SysUsersPeer::MOBILE)) $criteria->add(SysUsersPeer::MOBILE, $this->mobile);

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
        $criteria = new Criteria(SysUsersPeer::DATABASE_NAME);
        $criteria->add(SysUsersPeer::ID_USER, $this->id_user);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdUser();
    }

    /**
     * Generic method to set the primary key (id_user column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdUser($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdUser();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of SysUsers (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setUsername($this->getUsername());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setFirstName($this->getFirstName());
        $copyObj->setLastName($this->getLastName());
        $copyObj->setState($this->getState());
        $copyObj->setIdRol($this->getIdRol());
        $copyObj->setIdPhoto($this->getIdPhoto());
        $copyObj->setCreated($this->getCreated());
        $copyObj->setPhone($this->getPhone());
        $copyObj->setModified($this->getModified());
        $copyObj->setLangCode($this->getLangCode());
        $copyObj->setMobile($this->getMobile());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getSysChatssRelatedByIdSender() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSysChatsRelatedByIdSender($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSysChatssRelatedByIdReceiver() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSysChatsRelatedByIdReceiver($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSysNotificationssRelatedByIdSender() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSysNotificationsRelatedByIdSender($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSysNotificationssRelatedByIdReceiver() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSysNotificationsRelatedByIdReceiver($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdUser(NULL); // this is a auto-increment column, so set to default value
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
     * @return SysUsers Clone of current object.
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
     * @return SysUsersPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new SysUsersPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a SysRoles object.
     *
     * @param                  SysRoles $v
     * @return SysUsers The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSysRoles(SysRoles $v = null)
    {
        if ($v === null) {
            $this->setIdRol(NULL);
        } else {
            $this->setIdRol($v->getIdRol());
        }

        $this->aSysRoles = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the SysRoles object, it will not be re-added.
        if ($v !== null) {
            $v->addSysUsers($this);
        }


        return $this;
    }


    /**
     * Get the associated SysRoles object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return SysRoles The associated SysRoles object.
     * @throws PropelException
     */
    public function getSysRoles(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSysRoles === null && ($this->id_rol !== null) && $doQuery) {
            $this->aSysRoles = SysRolesQuery::create()->findPk($this->id_rol, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSysRoles->addSysUserss($this);
             */
        }

        return $this->aSysRoles;
    }

    /**
     * Declares an association between this object and a SysFiles object.
     *
     * @param                  SysFiles $v
     * @return SysUsers The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSysFiles(SysFiles $v = null)
    {
        if ($v === null) {
            $this->setIdPhoto(NULL);
        } else {
            $this->setIdPhoto($v->getIdFile());
        }

        $this->aSysFiles = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the SysFiles object, it will not be re-added.
        if ($v !== null) {
            $v->addSysUsers($this);
        }


        return $this;
    }


    /**
     * Get the associated SysFiles object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return SysFiles The associated SysFiles object.
     * @throws PropelException
     */
    public function getSysFiles(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSysFiles === null && ($this->id_photo !== null) && $doQuery) {
            $this->aSysFiles = SysFilesQuery::create()->findPk($this->id_photo, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSysFiles->addSysUserss($this);
             */
        }

        return $this->aSysFiles;
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
        if ('SysChatsRelatedByIdSender' == $relationName) {
            $this->initSysChatssRelatedByIdSender();
        }
        if ('SysChatsRelatedByIdReceiver' == $relationName) {
            $this->initSysChatssRelatedByIdReceiver();
        }
        if ('SysNotificationsRelatedByIdSender' == $relationName) {
            $this->initSysNotificationssRelatedByIdSender();
        }
        if ('SysNotificationsRelatedByIdReceiver' == $relationName) {
            $this->initSysNotificationssRelatedByIdReceiver();
        }
    }

    /**
     * Clears out the collSysChatssRelatedByIdSender collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SysUsers The current object (for fluent API support)
     * @see        addSysChatssRelatedByIdSender()
     */
    public function clearSysChatssRelatedByIdSender()
    {
        $this->collSysChatssRelatedByIdSender = null; // important to set this to null since that means it is uninitialized
        $this->collSysChatssRelatedByIdSenderPartial = null;

        return $this;
    }

    /**
     * reset is the collSysChatssRelatedByIdSender collection loaded partially
     *
     * @return void
     */
    public function resetPartialSysChatssRelatedByIdSender($v = true)
    {
        $this->collSysChatssRelatedByIdSenderPartial = $v;
    }

    /**
     * Initializes the collSysChatssRelatedByIdSender collection.
     *
     * By default this just sets the collSysChatssRelatedByIdSender collection to an empty array (like clearcollSysChatssRelatedByIdSender());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSysChatssRelatedByIdSender($overrideExisting = true)
    {
        if (null !== $this->collSysChatssRelatedByIdSender && !$overrideExisting) {
            return;
        }
        $this->collSysChatssRelatedByIdSender = new PropelObjectCollection();
        $this->collSysChatssRelatedByIdSender->setModel('SysChats');
    }

    /**
     * Gets an array of SysChats objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SysUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SysChats[] List of SysChats objects
     * @throws PropelException
     */
    public function getSysChatssRelatedByIdSender($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSysChatssRelatedByIdSenderPartial && !$this->isNew();
        if (null === $this->collSysChatssRelatedByIdSender || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSysChatssRelatedByIdSender) {
                // return empty collection
                $this->initSysChatssRelatedByIdSender();
            } else {
                $collSysChatssRelatedByIdSender = SysChatsQuery::create(null, $criteria)
                    ->filterBySysUsersRelatedByIdSender($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSysChatssRelatedByIdSenderPartial && count($collSysChatssRelatedByIdSender)) {
                      $this->initSysChatssRelatedByIdSender(false);

                      foreach ($collSysChatssRelatedByIdSender as $obj) {
                        if (false == $this->collSysChatssRelatedByIdSender->contains($obj)) {
                          $this->collSysChatssRelatedByIdSender->append($obj);
                        }
                      }

                      $this->collSysChatssRelatedByIdSenderPartial = true;
                    }

                    $collSysChatssRelatedByIdSender->getInternalIterator()->rewind();

                    return $collSysChatssRelatedByIdSender;
                }

                if ($partial && $this->collSysChatssRelatedByIdSender) {
                    foreach ($this->collSysChatssRelatedByIdSender as $obj) {
                        if ($obj->isNew()) {
                            $collSysChatssRelatedByIdSender[] = $obj;
                        }
                    }
                }

                $this->collSysChatssRelatedByIdSender = $collSysChatssRelatedByIdSender;
                $this->collSysChatssRelatedByIdSenderPartial = false;
            }
        }

        return $this->collSysChatssRelatedByIdSender;
    }

    /**
     * Sets a collection of SysChatsRelatedByIdSender objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sysChatssRelatedByIdSender A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SysUsers The current object (for fluent API support)
     */
    public function setSysChatssRelatedByIdSender(PropelCollection $sysChatssRelatedByIdSender, PropelPDO $con = null)
    {
        $sysChatssRelatedByIdSenderToDelete = $this->getSysChatssRelatedByIdSender(new Criteria(), $con)->diff($sysChatssRelatedByIdSender);


        $this->sysChatssRelatedByIdSenderScheduledForDeletion = $sysChatssRelatedByIdSenderToDelete;

        foreach ($sysChatssRelatedByIdSenderToDelete as $sysChatsRelatedByIdSenderRemoved) {
            $sysChatsRelatedByIdSenderRemoved->setSysUsersRelatedByIdSender(null);
        }

        $this->collSysChatssRelatedByIdSender = null;
        foreach ($sysChatssRelatedByIdSender as $sysChatsRelatedByIdSender) {
            $this->addSysChatsRelatedByIdSender($sysChatsRelatedByIdSender);
        }

        $this->collSysChatssRelatedByIdSender = $sysChatssRelatedByIdSender;
        $this->collSysChatssRelatedByIdSenderPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SysChats objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SysChats objects.
     * @throws PropelException
     */
    public function countSysChatssRelatedByIdSender(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSysChatssRelatedByIdSenderPartial && !$this->isNew();
        if (null === $this->collSysChatssRelatedByIdSender || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSysChatssRelatedByIdSender) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSysChatssRelatedByIdSender());
            }
            $query = SysChatsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySysUsersRelatedByIdSender($this)
                ->count($con);
        }

        return count($this->collSysChatssRelatedByIdSender);
    }

    /**
     * Method called to associate a SysChats object to this object
     * through the SysChats foreign key attribute.
     *
     * @param    SysChats $l SysChats
     * @return SysUsers The current object (for fluent API support)
     */
    public function addSysChatsRelatedByIdSender(SysChats $l)
    {
        if ($this->collSysChatssRelatedByIdSender === null) {
            $this->initSysChatssRelatedByIdSender();
            $this->collSysChatssRelatedByIdSenderPartial = true;
        }
        if (!in_array($l, $this->collSysChatssRelatedByIdSender->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSysChatsRelatedByIdSender($l);
        }

        return $this;
    }

    /**
     * @param	SysChatsRelatedByIdSender $sysChatsRelatedByIdSender The sysChatsRelatedByIdSender object to add.
     */
    protected function doAddSysChatsRelatedByIdSender($sysChatsRelatedByIdSender)
    {
        $this->collSysChatssRelatedByIdSender[]= $sysChatsRelatedByIdSender;
        $sysChatsRelatedByIdSender->setSysUsersRelatedByIdSender($this);
    }

    /**
     * @param	SysChatsRelatedByIdSender $sysChatsRelatedByIdSender The sysChatsRelatedByIdSender object to remove.
     * @return SysUsers The current object (for fluent API support)
     */
    public function removeSysChatsRelatedByIdSender($sysChatsRelatedByIdSender)
    {
        if ($this->getSysChatssRelatedByIdSender()->contains($sysChatsRelatedByIdSender)) {
            $this->collSysChatssRelatedByIdSender->remove($this->collSysChatssRelatedByIdSender->search($sysChatsRelatedByIdSender));
            if (null === $this->sysChatssRelatedByIdSenderScheduledForDeletion) {
                $this->sysChatssRelatedByIdSenderScheduledForDeletion = clone $this->collSysChatssRelatedByIdSender;
                $this->sysChatssRelatedByIdSenderScheduledForDeletion->clear();
            }
            $this->sysChatssRelatedByIdSenderScheduledForDeletion[]= $sysChatsRelatedByIdSender;
            $sysChatsRelatedByIdSender->setSysUsersRelatedByIdSender(null);
        }

        return $this;
    }

    /**
     * Clears out the collSysChatssRelatedByIdReceiver collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SysUsers The current object (for fluent API support)
     * @see        addSysChatssRelatedByIdReceiver()
     */
    public function clearSysChatssRelatedByIdReceiver()
    {
        $this->collSysChatssRelatedByIdReceiver = null; // important to set this to null since that means it is uninitialized
        $this->collSysChatssRelatedByIdReceiverPartial = null;

        return $this;
    }

    /**
     * reset is the collSysChatssRelatedByIdReceiver collection loaded partially
     *
     * @return void
     */
    public function resetPartialSysChatssRelatedByIdReceiver($v = true)
    {
        $this->collSysChatssRelatedByIdReceiverPartial = $v;
    }

    /**
     * Initializes the collSysChatssRelatedByIdReceiver collection.
     *
     * By default this just sets the collSysChatssRelatedByIdReceiver collection to an empty array (like clearcollSysChatssRelatedByIdReceiver());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSysChatssRelatedByIdReceiver($overrideExisting = true)
    {
        if (null !== $this->collSysChatssRelatedByIdReceiver && !$overrideExisting) {
            return;
        }
        $this->collSysChatssRelatedByIdReceiver = new PropelObjectCollection();
        $this->collSysChatssRelatedByIdReceiver->setModel('SysChats');
    }

    /**
     * Gets an array of SysChats objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SysUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SysChats[] List of SysChats objects
     * @throws PropelException
     */
    public function getSysChatssRelatedByIdReceiver($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSysChatssRelatedByIdReceiverPartial && !$this->isNew();
        if (null === $this->collSysChatssRelatedByIdReceiver || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSysChatssRelatedByIdReceiver) {
                // return empty collection
                $this->initSysChatssRelatedByIdReceiver();
            } else {
                $collSysChatssRelatedByIdReceiver = SysChatsQuery::create(null, $criteria)
                    ->filterBySysUsersRelatedByIdReceiver($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSysChatssRelatedByIdReceiverPartial && count($collSysChatssRelatedByIdReceiver)) {
                      $this->initSysChatssRelatedByIdReceiver(false);

                      foreach ($collSysChatssRelatedByIdReceiver as $obj) {
                        if (false == $this->collSysChatssRelatedByIdReceiver->contains($obj)) {
                          $this->collSysChatssRelatedByIdReceiver->append($obj);
                        }
                      }

                      $this->collSysChatssRelatedByIdReceiverPartial = true;
                    }

                    $collSysChatssRelatedByIdReceiver->getInternalIterator()->rewind();

                    return $collSysChatssRelatedByIdReceiver;
                }

                if ($partial && $this->collSysChatssRelatedByIdReceiver) {
                    foreach ($this->collSysChatssRelatedByIdReceiver as $obj) {
                        if ($obj->isNew()) {
                            $collSysChatssRelatedByIdReceiver[] = $obj;
                        }
                    }
                }

                $this->collSysChatssRelatedByIdReceiver = $collSysChatssRelatedByIdReceiver;
                $this->collSysChatssRelatedByIdReceiverPartial = false;
            }
        }

        return $this->collSysChatssRelatedByIdReceiver;
    }

    /**
     * Sets a collection of SysChatsRelatedByIdReceiver objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sysChatssRelatedByIdReceiver A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SysUsers The current object (for fluent API support)
     */
    public function setSysChatssRelatedByIdReceiver(PropelCollection $sysChatssRelatedByIdReceiver, PropelPDO $con = null)
    {
        $sysChatssRelatedByIdReceiverToDelete = $this->getSysChatssRelatedByIdReceiver(new Criteria(), $con)->diff($sysChatssRelatedByIdReceiver);


        $this->sysChatssRelatedByIdReceiverScheduledForDeletion = $sysChatssRelatedByIdReceiverToDelete;

        foreach ($sysChatssRelatedByIdReceiverToDelete as $sysChatsRelatedByIdReceiverRemoved) {
            $sysChatsRelatedByIdReceiverRemoved->setSysUsersRelatedByIdReceiver(null);
        }

        $this->collSysChatssRelatedByIdReceiver = null;
        foreach ($sysChatssRelatedByIdReceiver as $sysChatsRelatedByIdReceiver) {
            $this->addSysChatsRelatedByIdReceiver($sysChatsRelatedByIdReceiver);
        }

        $this->collSysChatssRelatedByIdReceiver = $sysChatssRelatedByIdReceiver;
        $this->collSysChatssRelatedByIdReceiverPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SysChats objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SysChats objects.
     * @throws PropelException
     */
    public function countSysChatssRelatedByIdReceiver(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSysChatssRelatedByIdReceiverPartial && !$this->isNew();
        if (null === $this->collSysChatssRelatedByIdReceiver || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSysChatssRelatedByIdReceiver) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSysChatssRelatedByIdReceiver());
            }
            $query = SysChatsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySysUsersRelatedByIdReceiver($this)
                ->count($con);
        }

        return count($this->collSysChatssRelatedByIdReceiver);
    }

    /**
     * Method called to associate a SysChats object to this object
     * through the SysChats foreign key attribute.
     *
     * @param    SysChats $l SysChats
     * @return SysUsers The current object (for fluent API support)
     */
    public function addSysChatsRelatedByIdReceiver(SysChats $l)
    {
        if ($this->collSysChatssRelatedByIdReceiver === null) {
            $this->initSysChatssRelatedByIdReceiver();
            $this->collSysChatssRelatedByIdReceiverPartial = true;
        }
        if (!in_array($l, $this->collSysChatssRelatedByIdReceiver->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSysChatsRelatedByIdReceiver($l);
        }

        return $this;
    }

    /**
     * @param	SysChatsRelatedByIdReceiver $sysChatsRelatedByIdReceiver The sysChatsRelatedByIdReceiver object to add.
     */
    protected function doAddSysChatsRelatedByIdReceiver($sysChatsRelatedByIdReceiver)
    {
        $this->collSysChatssRelatedByIdReceiver[]= $sysChatsRelatedByIdReceiver;
        $sysChatsRelatedByIdReceiver->setSysUsersRelatedByIdReceiver($this);
    }

    /**
     * @param	SysChatsRelatedByIdReceiver $sysChatsRelatedByIdReceiver The sysChatsRelatedByIdReceiver object to remove.
     * @return SysUsers The current object (for fluent API support)
     */
    public function removeSysChatsRelatedByIdReceiver($sysChatsRelatedByIdReceiver)
    {
        if ($this->getSysChatssRelatedByIdReceiver()->contains($sysChatsRelatedByIdReceiver)) {
            $this->collSysChatssRelatedByIdReceiver->remove($this->collSysChatssRelatedByIdReceiver->search($sysChatsRelatedByIdReceiver));
            if (null === $this->sysChatssRelatedByIdReceiverScheduledForDeletion) {
                $this->sysChatssRelatedByIdReceiverScheduledForDeletion = clone $this->collSysChatssRelatedByIdReceiver;
                $this->sysChatssRelatedByIdReceiverScheduledForDeletion->clear();
            }
            $this->sysChatssRelatedByIdReceiverScheduledForDeletion[]= $sysChatsRelatedByIdReceiver;
            $sysChatsRelatedByIdReceiver->setSysUsersRelatedByIdReceiver(null);
        }

        return $this;
    }

    /**
     * Clears out the collSysNotificationssRelatedByIdSender collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SysUsers The current object (for fluent API support)
     * @see        addSysNotificationssRelatedByIdSender()
     */
    public function clearSysNotificationssRelatedByIdSender()
    {
        $this->collSysNotificationssRelatedByIdSender = null; // important to set this to null since that means it is uninitialized
        $this->collSysNotificationssRelatedByIdSenderPartial = null;

        return $this;
    }

    /**
     * reset is the collSysNotificationssRelatedByIdSender collection loaded partially
     *
     * @return void
     */
    public function resetPartialSysNotificationssRelatedByIdSender($v = true)
    {
        $this->collSysNotificationssRelatedByIdSenderPartial = $v;
    }

    /**
     * Initializes the collSysNotificationssRelatedByIdSender collection.
     *
     * By default this just sets the collSysNotificationssRelatedByIdSender collection to an empty array (like clearcollSysNotificationssRelatedByIdSender());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSysNotificationssRelatedByIdSender($overrideExisting = true)
    {
        if (null !== $this->collSysNotificationssRelatedByIdSender && !$overrideExisting) {
            return;
        }
        $this->collSysNotificationssRelatedByIdSender = new PropelObjectCollection();
        $this->collSysNotificationssRelatedByIdSender->setModel('SysNotifications');
    }

    /**
     * Gets an array of SysNotifications objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SysUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SysNotifications[] List of SysNotifications objects
     * @throws PropelException
     */
    public function getSysNotificationssRelatedByIdSender($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSysNotificationssRelatedByIdSenderPartial && !$this->isNew();
        if (null === $this->collSysNotificationssRelatedByIdSender || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSysNotificationssRelatedByIdSender) {
                // return empty collection
                $this->initSysNotificationssRelatedByIdSender();
            } else {
                $collSysNotificationssRelatedByIdSender = SysNotificationsQuery::create(null, $criteria)
                    ->filterBySysUsersRelatedByIdSender($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSysNotificationssRelatedByIdSenderPartial && count($collSysNotificationssRelatedByIdSender)) {
                      $this->initSysNotificationssRelatedByIdSender(false);

                      foreach ($collSysNotificationssRelatedByIdSender as $obj) {
                        if (false == $this->collSysNotificationssRelatedByIdSender->contains($obj)) {
                          $this->collSysNotificationssRelatedByIdSender->append($obj);
                        }
                      }

                      $this->collSysNotificationssRelatedByIdSenderPartial = true;
                    }

                    $collSysNotificationssRelatedByIdSender->getInternalIterator()->rewind();

                    return $collSysNotificationssRelatedByIdSender;
                }

                if ($partial && $this->collSysNotificationssRelatedByIdSender) {
                    foreach ($this->collSysNotificationssRelatedByIdSender as $obj) {
                        if ($obj->isNew()) {
                            $collSysNotificationssRelatedByIdSender[] = $obj;
                        }
                    }
                }

                $this->collSysNotificationssRelatedByIdSender = $collSysNotificationssRelatedByIdSender;
                $this->collSysNotificationssRelatedByIdSenderPartial = false;
            }
        }

        return $this->collSysNotificationssRelatedByIdSender;
    }

    /**
     * Sets a collection of SysNotificationsRelatedByIdSender objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sysNotificationssRelatedByIdSender A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SysUsers The current object (for fluent API support)
     */
    public function setSysNotificationssRelatedByIdSender(PropelCollection $sysNotificationssRelatedByIdSender, PropelPDO $con = null)
    {
        $sysNotificationssRelatedByIdSenderToDelete = $this->getSysNotificationssRelatedByIdSender(new Criteria(), $con)->diff($sysNotificationssRelatedByIdSender);


        $this->sysNotificationssRelatedByIdSenderScheduledForDeletion = $sysNotificationssRelatedByIdSenderToDelete;

        foreach ($sysNotificationssRelatedByIdSenderToDelete as $sysNotificationsRelatedByIdSenderRemoved) {
            $sysNotificationsRelatedByIdSenderRemoved->setSysUsersRelatedByIdSender(null);
        }

        $this->collSysNotificationssRelatedByIdSender = null;
        foreach ($sysNotificationssRelatedByIdSender as $sysNotificationsRelatedByIdSender) {
            $this->addSysNotificationsRelatedByIdSender($sysNotificationsRelatedByIdSender);
        }

        $this->collSysNotificationssRelatedByIdSender = $sysNotificationssRelatedByIdSender;
        $this->collSysNotificationssRelatedByIdSenderPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SysNotifications objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SysNotifications objects.
     * @throws PropelException
     */
    public function countSysNotificationssRelatedByIdSender(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSysNotificationssRelatedByIdSenderPartial && !$this->isNew();
        if (null === $this->collSysNotificationssRelatedByIdSender || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSysNotificationssRelatedByIdSender) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSysNotificationssRelatedByIdSender());
            }
            $query = SysNotificationsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySysUsersRelatedByIdSender($this)
                ->count($con);
        }

        return count($this->collSysNotificationssRelatedByIdSender);
    }

    /**
     * Method called to associate a SysNotifications object to this object
     * through the SysNotifications foreign key attribute.
     *
     * @param    SysNotifications $l SysNotifications
     * @return SysUsers The current object (for fluent API support)
     */
    public function addSysNotificationsRelatedByIdSender(SysNotifications $l)
    {
        if ($this->collSysNotificationssRelatedByIdSender === null) {
            $this->initSysNotificationssRelatedByIdSender();
            $this->collSysNotificationssRelatedByIdSenderPartial = true;
        }
        if (!in_array($l, $this->collSysNotificationssRelatedByIdSender->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSysNotificationsRelatedByIdSender($l);
        }

        return $this;
    }

    /**
     * @param	SysNotificationsRelatedByIdSender $sysNotificationsRelatedByIdSender The sysNotificationsRelatedByIdSender object to add.
     */
    protected function doAddSysNotificationsRelatedByIdSender($sysNotificationsRelatedByIdSender)
    {
        $this->collSysNotificationssRelatedByIdSender[]= $sysNotificationsRelatedByIdSender;
        $sysNotificationsRelatedByIdSender->setSysUsersRelatedByIdSender($this);
    }

    /**
     * @param	SysNotificationsRelatedByIdSender $sysNotificationsRelatedByIdSender The sysNotificationsRelatedByIdSender object to remove.
     * @return SysUsers The current object (for fluent API support)
     */
    public function removeSysNotificationsRelatedByIdSender($sysNotificationsRelatedByIdSender)
    {
        if ($this->getSysNotificationssRelatedByIdSender()->contains($sysNotificationsRelatedByIdSender)) {
            $this->collSysNotificationssRelatedByIdSender->remove($this->collSysNotificationssRelatedByIdSender->search($sysNotificationsRelatedByIdSender));
            if (null === $this->sysNotificationssRelatedByIdSenderScheduledForDeletion) {
                $this->sysNotificationssRelatedByIdSenderScheduledForDeletion = clone $this->collSysNotificationssRelatedByIdSender;
                $this->sysNotificationssRelatedByIdSenderScheduledForDeletion->clear();
            }
            $this->sysNotificationssRelatedByIdSenderScheduledForDeletion[]= $sysNotificationsRelatedByIdSender;
            $sysNotificationsRelatedByIdSender->setSysUsersRelatedByIdSender(null);
        }

        return $this;
    }

    /**
     * Clears out the collSysNotificationssRelatedByIdReceiver collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SysUsers The current object (for fluent API support)
     * @see        addSysNotificationssRelatedByIdReceiver()
     */
    public function clearSysNotificationssRelatedByIdReceiver()
    {
        $this->collSysNotificationssRelatedByIdReceiver = null; // important to set this to null since that means it is uninitialized
        $this->collSysNotificationssRelatedByIdReceiverPartial = null;

        return $this;
    }

    /**
     * reset is the collSysNotificationssRelatedByIdReceiver collection loaded partially
     *
     * @return void
     */
    public function resetPartialSysNotificationssRelatedByIdReceiver($v = true)
    {
        $this->collSysNotificationssRelatedByIdReceiverPartial = $v;
    }

    /**
     * Initializes the collSysNotificationssRelatedByIdReceiver collection.
     *
     * By default this just sets the collSysNotificationssRelatedByIdReceiver collection to an empty array (like clearcollSysNotificationssRelatedByIdReceiver());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSysNotificationssRelatedByIdReceiver($overrideExisting = true)
    {
        if (null !== $this->collSysNotificationssRelatedByIdReceiver && !$overrideExisting) {
            return;
        }
        $this->collSysNotificationssRelatedByIdReceiver = new PropelObjectCollection();
        $this->collSysNotificationssRelatedByIdReceiver->setModel('SysNotifications');
    }

    /**
     * Gets an array of SysNotifications objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SysUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SysNotifications[] List of SysNotifications objects
     * @throws PropelException
     */
    public function getSysNotificationssRelatedByIdReceiver($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSysNotificationssRelatedByIdReceiverPartial && !$this->isNew();
        if (null === $this->collSysNotificationssRelatedByIdReceiver || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSysNotificationssRelatedByIdReceiver) {
                // return empty collection
                $this->initSysNotificationssRelatedByIdReceiver();
            } else {
                $collSysNotificationssRelatedByIdReceiver = SysNotificationsQuery::create(null, $criteria)
                    ->filterBySysUsersRelatedByIdReceiver($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSysNotificationssRelatedByIdReceiverPartial && count($collSysNotificationssRelatedByIdReceiver)) {
                      $this->initSysNotificationssRelatedByIdReceiver(false);

                      foreach ($collSysNotificationssRelatedByIdReceiver as $obj) {
                        if (false == $this->collSysNotificationssRelatedByIdReceiver->contains($obj)) {
                          $this->collSysNotificationssRelatedByIdReceiver->append($obj);
                        }
                      }

                      $this->collSysNotificationssRelatedByIdReceiverPartial = true;
                    }

                    $collSysNotificationssRelatedByIdReceiver->getInternalIterator()->rewind();

                    return $collSysNotificationssRelatedByIdReceiver;
                }

                if ($partial && $this->collSysNotificationssRelatedByIdReceiver) {
                    foreach ($this->collSysNotificationssRelatedByIdReceiver as $obj) {
                        if ($obj->isNew()) {
                            $collSysNotificationssRelatedByIdReceiver[] = $obj;
                        }
                    }
                }

                $this->collSysNotificationssRelatedByIdReceiver = $collSysNotificationssRelatedByIdReceiver;
                $this->collSysNotificationssRelatedByIdReceiverPartial = false;
            }
        }

        return $this->collSysNotificationssRelatedByIdReceiver;
    }

    /**
     * Sets a collection of SysNotificationsRelatedByIdReceiver objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sysNotificationssRelatedByIdReceiver A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SysUsers The current object (for fluent API support)
     */
    public function setSysNotificationssRelatedByIdReceiver(PropelCollection $sysNotificationssRelatedByIdReceiver, PropelPDO $con = null)
    {
        $sysNotificationssRelatedByIdReceiverToDelete = $this->getSysNotificationssRelatedByIdReceiver(new Criteria(), $con)->diff($sysNotificationssRelatedByIdReceiver);


        $this->sysNotificationssRelatedByIdReceiverScheduledForDeletion = $sysNotificationssRelatedByIdReceiverToDelete;

        foreach ($sysNotificationssRelatedByIdReceiverToDelete as $sysNotificationsRelatedByIdReceiverRemoved) {
            $sysNotificationsRelatedByIdReceiverRemoved->setSysUsersRelatedByIdReceiver(null);
        }

        $this->collSysNotificationssRelatedByIdReceiver = null;
        foreach ($sysNotificationssRelatedByIdReceiver as $sysNotificationsRelatedByIdReceiver) {
            $this->addSysNotificationsRelatedByIdReceiver($sysNotificationsRelatedByIdReceiver);
        }

        $this->collSysNotificationssRelatedByIdReceiver = $sysNotificationssRelatedByIdReceiver;
        $this->collSysNotificationssRelatedByIdReceiverPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SysNotifications objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SysNotifications objects.
     * @throws PropelException
     */
    public function countSysNotificationssRelatedByIdReceiver(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSysNotificationssRelatedByIdReceiverPartial && !$this->isNew();
        if (null === $this->collSysNotificationssRelatedByIdReceiver || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSysNotificationssRelatedByIdReceiver) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getSysNotificationssRelatedByIdReceiver());
            }
            $query = SysNotificationsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySysUsersRelatedByIdReceiver($this)
                ->count($con);
        }

        return count($this->collSysNotificationssRelatedByIdReceiver);
    }

    /**
     * Method called to associate a SysNotifications object to this object
     * through the SysNotifications foreign key attribute.
     *
     * @param    SysNotifications $l SysNotifications
     * @return SysUsers The current object (for fluent API support)
     */
    public function addSysNotificationsRelatedByIdReceiver(SysNotifications $l)
    {
        if ($this->collSysNotificationssRelatedByIdReceiver === null) {
            $this->initSysNotificationssRelatedByIdReceiver();
            $this->collSysNotificationssRelatedByIdReceiverPartial = true;
        }
        if (!in_array($l, $this->collSysNotificationssRelatedByIdReceiver->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSysNotificationsRelatedByIdReceiver($l);
        }

        return $this;
    }

    /**
     * @param	SysNotificationsRelatedByIdReceiver $sysNotificationsRelatedByIdReceiver The sysNotificationsRelatedByIdReceiver object to add.
     */
    protected function doAddSysNotificationsRelatedByIdReceiver($sysNotificationsRelatedByIdReceiver)
    {
        $this->collSysNotificationssRelatedByIdReceiver[]= $sysNotificationsRelatedByIdReceiver;
        $sysNotificationsRelatedByIdReceiver->setSysUsersRelatedByIdReceiver($this);
    }

    /**
     * @param	SysNotificationsRelatedByIdReceiver $sysNotificationsRelatedByIdReceiver The sysNotificationsRelatedByIdReceiver object to remove.
     * @return SysUsers The current object (for fluent API support)
     */
    public function removeSysNotificationsRelatedByIdReceiver($sysNotificationsRelatedByIdReceiver)
    {
        if ($this->getSysNotificationssRelatedByIdReceiver()->contains($sysNotificationsRelatedByIdReceiver)) {
            $this->collSysNotificationssRelatedByIdReceiver->remove($this->collSysNotificationssRelatedByIdReceiver->search($sysNotificationsRelatedByIdReceiver));
            if (null === $this->sysNotificationssRelatedByIdReceiverScheduledForDeletion) {
                $this->sysNotificationssRelatedByIdReceiverScheduledForDeletion = clone $this->collSysNotificationssRelatedByIdReceiver;
                $this->sysNotificationssRelatedByIdReceiverScheduledForDeletion->clear();
            }
            $this->sysNotificationssRelatedByIdReceiverScheduledForDeletion[]= $sysNotificationsRelatedByIdReceiver;
            $sysNotificationsRelatedByIdReceiver->setSysUsersRelatedByIdReceiver(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_user = null;
        $this->username = null;
        $this->password = null;
        $this->email = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->state = null;
        $this->id_rol = null;
        $this->id_photo = null;
        $this->created = null;
        $this->phone = null;
        $this->modified = null;
        $this->lang_code = null;
        $this->mobile = null;
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
            if ($this->collSysChatssRelatedByIdSender) {
                foreach ($this->collSysChatssRelatedByIdSender as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSysChatssRelatedByIdReceiver) {
                foreach ($this->collSysChatssRelatedByIdReceiver as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSysNotificationssRelatedByIdSender) {
                foreach ($this->collSysNotificationssRelatedByIdSender as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSysNotificationssRelatedByIdReceiver) {
                foreach ($this->collSysNotificationssRelatedByIdReceiver as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aSysRoles instanceof Persistent) {
              $this->aSysRoles->clearAllReferences($deep);
            }
            if ($this->aSysFiles instanceof Persistent) {
              $this->aSysFiles->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collSysChatssRelatedByIdSender instanceof PropelCollection) {
            $this->collSysChatssRelatedByIdSender->clearIterator();
        }
        $this->collSysChatssRelatedByIdSender = null;
        if ($this->collSysChatssRelatedByIdReceiver instanceof PropelCollection) {
            $this->collSysChatssRelatedByIdReceiver->clearIterator();
        }
        $this->collSysChatssRelatedByIdReceiver = null;
        if ($this->collSysNotificationssRelatedByIdSender instanceof PropelCollection) {
            $this->collSysNotificationssRelatedByIdSender->clearIterator();
        }
        $this->collSysNotificationssRelatedByIdSender = null;
        if ($this->collSysNotificationssRelatedByIdReceiver instanceof PropelCollection) {
            $this->collSysNotificationssRelatedByIdReceiver->clearIterator();
        }
        $this->collSysNotificationssRelatedByIdReceiver = null;
        $this->aSysRoles = null;
        $this->aSysFiles = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SysUsersPeer::DEFAULT_STRING_FORMAT);
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
